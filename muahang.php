<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "thuc_pham_chuc_nang";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

// Kiểm tra đăng nhập
if (!isset($_SESSION['user_id'])) {
    echo "<h1 class='text-center'>Vui lòng đăng nhập trước</h1>";
    echo "<a href='dangnhap.php' class='btn btn-primary'>Đăng nhập</a>";
    exit();
}

$user_id = $_SESSION['user_id'];

// Xử lý khi người dùng xác nhận thanh toán
if (isset($_POST['xac_nhan_thanh_toan'])) {
    // Bắt đầu transaction
    mysqli_begin_transaction($conn);
    
    try {
        // Lấy tất cả sản phẩm từ giỏ hàng
        $sql = "SELECT g.*, m.gia_mat_hang FROM gio_hang g 
                JOIN mat_hang m ON g.id_mat_hang = m.id 
                WHERE g.id_khach_hang = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $user_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        
        while ($cart_item = mysqli_fetch_assoc($result)) {
            $tong_tien = $cart_item['so_luong'] * $cart_item['gia_mat_hang'];
            // Thêm vào bảng đơn hàng
            $sql_insert = "INSERT INTO don_hang (id_khach_hang, id_mat_hang, so_luong, tong_tien, ngay_dat_hang) 
                          VALUES (?, ?, ?, ?, NOW())";
            $stmt_insert = mysqli_prepare($conn, $sql_insert);
            mysqli_stmt_bind_param($stmt_insert, "iiid", 
                $cart_item['id_khach_hang'],
                $cart_item['id_mat_hang'],
                $cart_item['so_luong'],
                $tong_tien
            );
            mysqli_stmt_execute($stmt_insert);
        }
        
        // Xóa giỏ hàng sau khi đã chuyển sang đơn hàng
        $sql_delete = "DELETE FROM gio_hang WHERE id_khach_hang = ?";
        $stmt_delete = mysqli_prepare($conn, $sql_delete);
        mysqli_stmt_bind_param($stmt_delete, "i", $user_id);
        mysqli_stmt_execute($stmt_delete);
        
        // Commit transaction
        mysqli_commit($conn);
        
        echo "<div class='alert alert-success'>Đặt hàng thành công!</div>";
        echo "<a href='sanphan.php' class='btn btn-primary'>Tiếp tục mua sắm</a>";
        
    } catch (Exception $e) {
        // Rollback nếu có lỗi
        mysqli_rollback($conn);
        echo "<div class='alert alert-danger'>Có lỗi xảy ra: " . $e->getMessage() . "</div>";
    }
} else {
    // Hiển thị form xác nhận thanh toán
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác nhận thanh toán</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Xác nhận thanh toán</h2>
        
        <?php
        // Hiển thị thông tin giỏ hàng
        $sql = "SELECT g.*, m.ten_mat_hang, m.gia_mat_hang 
                FROM gio_hang g 
                JOIN mat_hang m ON g.id_mat_hang = m.id 
                WHERE g.id_khach_hang = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $user_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        
        if (mysqli_num_rows($result) > 0):
        ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Tổng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $tong_tien = 0;
                    while ($row = mysqli_fetch_assoc($result)): 
                        $thanh_tien = $row['so_luong'] * $row['gia_mat_hang'];
                        $tong_tien += $thanh_tien;
                    ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['ten_mat_hang']); ?></td>
                            <td><?php echo $row['so_luong']; ?></td>
                            <td><?php echo number_format($row['gia_mat_hang'], 0, ',', '.') . ' VNĐ'; ?></td>
                            <td><?php echo number_format($thanh_tien, 0, ',', '.') . ' VNĐ'; ?></td>
                        </tr>
                    <?php endwhile; ?>
                    <tr>
                        <td colspan="3" class="text-end"><strong>Tổng cộng:</strong></td>
                        <td><strong><?php echo number_format($tong_tien, 0, ',', '.') . ' VNĐ'; ?></strong></td>
                    </tr>
                </tbody>
            </table>
            
            <form method="post" class="text-center">
                <button type="submit" name="xac_nhan_thanh_toan" class="btn btn-success">Xác nhận thanh toán</button>
                <a href="giohang.php" class="btn btn-secondary">Quay lại giỏ hàng</a>
            </form>
            
        <?php else: ?>
            <p class="text-center">Giỏ hàng trống</p>
            <a href="sanphan.php" class="btn btn-primary">Quay lại mua sắm</a>
        <?php endif; ?>
    </div>
</body>
</html>

<?php
}
mysqli_close($conn);
?>