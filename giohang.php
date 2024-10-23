<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('hihi.jpg');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body>
    
</body>
</html>
<?php

// Đặt phần kết nối cơ sở dữ liệu và xử lý session ở đầu file
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

// Kiểm tra nếu người dùng đã đăng nhập
if (!isset($_SESSION['user_id'])) {
    echo"<h1 class='text-center'>Vui Lòng Đăng Nhập Trước</h1>";
    echo"<a href='dangnhap.php' class='btn btn-primary text-center'style='display: block; margin: 0 auto;'>Đăng Nhập</a>";
    exit();
}

$user_id = $_SESSION['user_id'];

// Xử lý thêm sản phẩm vào giỏ hàng
if (isset($_POST['add_to_cart']) && isset($_POST['product_id']) && isset($_POST['quantity'])) {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    
    $sql = "INSERT INTO gio_hang (id_khach_hang, id_mat_hang, so_luong) 
            VALUES (?, ?, ?) 
            ON DUPLICATE KEY UPDATE so_luong = so_luong + VALUES(so_luong)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "iii", $user_id, $product_id, $quantity);
    
    if (mysqli_stmt_execute($stmt)) {
        echo "<p class='alert alert-success'>Sản phẩm đã được thêm vào giỏ hàng.</p>";
    } else {
        echo "<p class='alert alert-danger'>Có lỗi xảy ra khi thêm sản phẩm vào giỏ hàng.</p>";
    }
    mysqli_stmt_close($stmt);
}

// Xử lý cập nhật số lượng sản phẩm
if (isset($_POST['update_cart'])) {
    foreach ($_POST['quantity'] as $product_id => $quantity) {
        $sql = "UPDATE gio_hang SET so_luong = ? WHERE id_khach_hang = ? AND id_mat_hang = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "iii", $quantity, $user_id, $product_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    echo "<p class='alert alert-success'>Giỏ hàng đã được cập nhật.</p>";
}

// Xử lý xóa sản phẩm khỏi giỏ hàng
if (isset($_POST['remove_from_cart'])) {
    $product_id = $_POST['remove_from_cart'];
    $sql = "DELETE FROM gio_hang WHERE id_khach_hang = ? AND id_mat_hang = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ii", $user_id, $product_id);
    if (mysqli_stmt_execute($stmt)) {
        echo "<p class='alert alert-success'>Sản phẩm đã được xóa khỏi giỏ hàng.</p>";
    } else {
        echo "<p class='alert alert-danger'>Có lỗi xảy ra khi xóa sản phẩm khỏi giỏ hàng.</p>";
    }
    mysqli_stmt_close($stmt);
}

// Truy vấn để lấy thông tin các sản phẩm trong giỏ hàng
$sql = "SELECT g.id_mat_hang, g.so_luong, m.ten_mat_hang, m.gia_mat_hang, m.cong_dung_mat_hang
        FROM gio_hang g 
        JOIN mat_hang m ON g.id_mat_hang = m.id 
        WHERE g.id_khach_hang = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ Hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('hihi.jpg');
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            margin-top: 20px;
        }
        .table {
            margin-top: 20px;
        }
        .btn {
            display: block;
            width: 200px;
            margin: 20px auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Giỏ hàng của bạn</h1>

        <?php if (mysqli_num_rows($result) > 0): ?>
            <form method="post" action="">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                            <th>Tổng tiền</th>
                            <th>Công dụng</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $tong_gia_tri_gio_hang = 0;
                        while ($row = mysqli_fetch_assoc($result)): 
                            $tong_tien_san_pham = $row['so_luong'] * $row['gia_mat_hang'];
                            $tong_gia_tri_gio_hang += $tong_tien_san_pham;
                        ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['ten_mat_hang']); ?></td>
                                <td>
                                    <input type="number" name="quantity[<?php echo $row['id_mat_hang']; ?>]" value="<?php echo $row['so_luong']; ?>" min="1" max="10" style="width: 50px;">
                                </td>
                                <td><?php echo number_format($row['gia_mat_hang'], 0, ',', '.') . ' VNĐ'; ?></td>
                                <td><?php echo number_format($tong_tien_san_pham, 0, ',', '.') . ' VNĐ'; ?></td>
                                <td><?php echo htmlspecialchars($row['cong_dung_mat_hang']); ?></td>
                                <td>
                                    <button type="submit" name="remove_from_cart" value="<?php echo $row['id_mat_hang']; ?>" class="btn btn-danger btn-sm">Xóa</button>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                        <tr>
                            <td colspan="3" class="text-right"><strong>Tổng giá trị giỏ hàng:</strong></td>
                            <td colspan="3"><strong><?php echo number_format($tong_gia_tri_gio_hang, 0, ',', '.') . ' VNĐ'; ?></strong></td>
                        </tr>
                    </tbody>
                </table>
                <button type="submit" name="update_cart" class="btn btn-primary">Cập nhật giỏ hàng</button>
            </form>
        <?php else: ?>
            <p class="text-center">Giỏ hàng của bạn đang trống.</p>
        <?php endif; ?>

        <a href="sanphan.php" class="btn btn-primary mt-3">Tiếp tục mua sắm</a>
        <a href="muahang.php" class="btn btn-primary mt-3">Thanh toán</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Đóng kết nối cơ sở dữ liệu
mysqli_close($conn);
?>
