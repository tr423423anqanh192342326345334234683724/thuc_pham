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

$ket_noi = mysqli_connect($servername, $username, $password, $dbname);
if (!$ket_noi) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

// Kiểm tra nếu người dùng đã đăng nhập
if (!isset($_SESSION['user_id'])) {
    echo"<h1 class='text-center'>Vui Lòng Đăng Nhập Trước</h1>";
    echo"<a href='dangnhap.php' class='btn btn-primary text-center'style='display: block; margin: 0 auto;'>Đăng Nhập</a>";
    exit();
}

$id_nguoi_dung = $_SESSION['user_id'];

// Xử lý thêm sản phẩm vào giỏ hàng
if (isset($_POST['add_to_cart']) && isset($_POST['product_id']) && isset($_POST['quantity'])) {
    $id_san_pham = $_POST['product_id'];
    $so_luong = $_POST['quantity'];
    
    // Kiểm tra số lượng tồn kho
    $kiem_tra_ton_kho = "SELECT so_luong FROM mat_hang WHERE id = ?";
    $lenh = mysqli_prepare($ket_noi, $kiem_tra_ton_kho);
    mysqli_stmt_bind_param($lenh, "i", $id_san_pham);
    mysqli_stmt_execute($lenh);
    $ket_qua = mysqli_stmt_get_result($lenh);
    $ton_kho = mysqli_fetch_assoc($ket_qua)['so_luong'];
    
    if($ton_kho >= $so_luong) {
        $truy_van = "INSERT INTO gio_hang (id_khach_hang, id_mat_hang, so_luong) 
                VALUES (?, ?, ?) 
                ON DUPLICATE KEY UPDATE so_luong = so_luong + VALUES(so_luong)";
        $lenh = mysqli_prepare($ket_noi, $truy_van);
        mysqli_stmt_bind_param($lenh, "iii", $id_nguoi_dung, $id_san_pham, $so_luong);
        
        if (mysqli_stmt_execute($lenh)) {
            // Cập nhật số lượng trong kho
            $cap_nhat_ton_kho = "UPDATE mat_hang SET so_luong = so_luong - ? WHERE id = ?";
            $lenh = mysqli_prepare($ket_noi, $cap_nhat_ton_kho);
            mysqli_stmt_bind_param($lenh, "ii", $so_luong, $id_san_pham);
            mysqli_stmt_execute($lenh);
            
            echo "<p class='alert alert-success'>Sản phẩm đã được thêm vào giỏ hàng.</p>";
        } else {
            echo "<p class='alert alert-danger'>Có lỗi xảy ra khi thêm sản phẩm vào giỏ hàng.</p>";
        }
    } else {
        echo "<p class='alert alert-danger'>Số lượng sản phẩm trong kho không đủ.</p>";
    }
    mysqli_stmt_close($lenh);
}

// Xử lý cập nhật số lượng sản phẩm
if (isset($_POST['update_cart'])) {
    foreach ($_POST['quantity'] as $id_san_pham => $so_luong_moi) {
        // Lấy số lượng cũ trong giỏ hàng
        $lay_so_luong_cu = "SELECT so_luong FROM gio_hang WHERE id_khach_hang = ? AND id_mat_hang = ?";
        $lenh = mysqli_prepare($ket_noi, $lay_so_luong_cu);
        mysqli_stmt_bind_param($lenh, "ii", $id_nguoi_dung, $id_san_pham);
        mysqli_stmt_execute($lenh);
        $ket_qua = mysqli_stmt_get_result($lenh);
        $so_luong_cu = mysqli_fetch_assoc($ket_qua)['so_luong'];
        
        // Tính chênh lệch số lượng
        $chenh_lech = $so_luong_moi - $so_luong_cu;
        
        // Kiểm tra số lượng tồn kho nếu tăng số lượng
        if($chenh_lech > 0) {
            $kiem_tra_ton_kho = "SELECT so_luong FROM mat_hang WHERE id = ?";
            $lenh = mysqli_prepare($ket_noi, $kiem_tra_ton_kho);
            mysqli_stmt_bind_param($lenh, "i", $id_san_pham);
            mysqli_stmt_execute($lenh);
            $ket_qua = mysqli_stmt_get_result($lenh);
            $ton_kho = mysqli_fetch_assoc($ket_qua)['so_luong'];
            
            if($ton_kho < $chenh_lech) {
                echo "<p class='alert alert-danger'>Số lượng sản phẩm trong kho không đủ.</p>";
                continue;
            }
        }
        
        // Cập nhật giỏ hàng
        $truy_van = "UPDATE gio_hang SET so_luong = ? WHERE id_khach_hang = ? AND id_mat_hang = ?";
        $lenh = mysqli_prepare($ket_noi, $truy_van);
        mysqli_stmt_bind_param($lenh, "iii", $so_luong_moi, $id_nguoi_dung, $id_san_pham);
        mysqli_stmt_execute($lenh);
        
        // Cập nhật số lượng trong kho
        $cap_nhat_ton_kho = "UPDATE mat_hang SET so_luong = so_luong - ? WHERE id = ?";
        $lenh = mysqli_prepare($ket_noi, $cap_nhat_ton_kho);
        mysqli_stmt_bind_param($lenh, "ii", $chenh_lech, $id_san_pham);
        mysqli_stmt_execute($lenh);
    }
    echo "<p class='alert alert-success'>Giỏ hàng đã được cập nhật.</p>";
}

// Xử lý xóa sản phẩm khỏi giỏ hàng
if (isset($_POST['remove_from_cart'])) {
    $id_san_pham = $_POST['remove_from_cart'];
    
    // Lấy số lượng sản phẩm trong giỏ hàng
    $lay_so_luong = "SELECT so_luong FROM gio_hang WHERE id_khach_hang = ? AND id_mat_hang = ?";
    $lenh = mysqli_prepare($ket_noi, $lay_so_luong);
    mysqli_stmt_bind_param($lenh, "ii", $id_nguoi_dung, $id_san_pham);
    mysqli_stmt_execute($lenh);
    $ket_qua = mysqli_stmt_get_result($lenh);
    $so_luong = mysqli_fetch_assoc($ket_qua)['so_luong'];
    
    // Xóa sản phẩm khỏi giỏ hàng
    $truy_van = "DELETE FROM gio_hang WHERE id_khach_hang = ? AND id_mat_hang = ?";
    $lenh = mysqli_prepare($ket_noi, $truy_van);
    mysqli_stmt_bind_param($lenh, "ii", $id_nguoi_dung, $id_san_pham);
    if (mysqli_stmt_execute($lenh)) {
        // Hoàn trả số lượng vào kho
        $cap_nhat_ton_kho = "UPDATE mat_hang SET so_luong = so_luong + ? WHERE id = ?";
        $lenh = mysqli_prepare($ket_noi, $cap_nhat_ton_kho);
        mysqli_stmt_bind_param($lenh, "ii", $so_luong, $id_san_pham);
        mysqli_stmt_execute($lenh);
        
        echo "<p class='alert alert-success'>Sản phẩm đã được xóa khỏi giỏ hàng.</p>";
    } else {
        echo "<p class='alert alert-danger'>Có lỗi xảy ra khi xóa sản phẩm khỏi giỏ hàng.</p>";
    }
    mysqli_stmt_close($lenh);
}

// Truy vấn để lấy thông tin các sản phẩm trong giỏ hàng
$truy_van = "SELECT g.id_mat_hang, g.so_luong, m.ten_mat_hang, m.gia_mat_hang, m.cong_dung_mat_hang, m.so_luong as ton_kho
        FROM gio_hang g 
        JOIN mat_hang m ON g.id_mat_hang = m.id 
        WHERE g.id_khach_hang = ?";
$lenh = mysqli_prepare($ket_noi, $truy_van);
mysqli_stmt_bind_param($lenh, "i", $id_nguoi_dung);
mysqli_stmt_execute($lenh);
$ket_qua = mysqli_stmt_get_result($lenh);
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

        <?php if (mysqli_num_rows($ket_qua) > 0): ?>
            <form method="post" action="">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Tồn kho</th>
                            <th>Giá</th>
                            <th>Tổng tiền</th>
                            <th>Công dụng</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $tong_gia_tri_gio_hang = 0;
                        while ($hang = mysqli_fetch_assoc($ket_qua)): 
                            $tong_tien_san_pham = $hang['so_luong'] * $hang['gia_mat_hang'];
                            $tong_gia_tri_gio_hang += $tong_tien_san_pham;
                        ?>
                            <tr>
                                <td><?php echo htmlspecialchars($hang['ten_mat_hang']); ?></td>
                                <td>
                                    <input type="number" name="quantity[<?php echo $hang['id_mat_hang']; ?>]" value="<?php echo $hang['so_luong']; ?>" min="1" max="<?php echo $hang['ton_kho'] + $hang['so_luong']; ?>" style="width: 50px;">
                                </td>
                                <td><?php echo $hang['ton_kho']; ?></td>
                                <td><?php echo number_format($hang['gia_mat_hang'], 0, ',', '.') . ' VNĐ'; ?></td>
                                <td><?php echo number_format($tong_tien_san_pham, 0, ',', '.') . ' VNĐ'; ?></td>
                                <td><?php echo htmlspecialchars($hang['cong_dung_mat_hang']); ?></td>
                                <td>
                                    <button type="submit" name="remove_from_cart" value="<?php echo $hang['id_mat_hang']; ?>" class="btn btn-danger btn-sm">Xóa</button>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                        <tr>
                            <td colspan="4" class="text-right"><strong>Tổng giá trị giỏ hàng:</strong></td>
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
mysqli_close($ket_noi);
?>
