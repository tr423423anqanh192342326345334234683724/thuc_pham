<?php
session_start(); // Sử dụng session để lấy id tài khoản đã đăng ký

// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";  // Thay bằng username MySQL của bạn
$password = "";      // Thay bằng mật khẩu MySQL của bạn
$dbname = "tai_khoan_khach_hang";  // Thay bằng tên database của bạn

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
echo "Kết nối thành công!";
// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Nhận dữ liệu từ form
    $email = trim($_POST['email']);
    $so_dien_thoai = trim($_POST['so_dien_thoai']);
    $dia_chi = trim($_POST['dia_chi']);
    $ten_khach_hang = trim($_POST['ten_khach_hang']);

    // Kiểm tra thông tin
    if (empty($email) || empty($so_dien_thoai) || empty($dia_chi) || empty($ten_khach_hang)) {
        $error = 'Vui lòng điền đầy đủ thông tin.';
    } elseif (!is_numeric($so_dien_thoai) || strlen($so_dien_thoai) != 10) {
        $error = 'Số điện thoại phải đủ 10 số.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Email không hợp lệ.';
    } elseif (!preg_match("/^[a-zA-Z\s]+$/", $ten_khach_hang)) {
        $error = 'Họ và Tên chỉ được chứa ký tự chữ cái.';
    } else {
        // Lấy id_tai_khoan từ bảng tai_khoan_khach_hang dựa trên session
        $tai_khoan = $_SESSION['tai_khoan'];
        $sql = "SELECT id FROM tai_khoan_khach_hang WHERE tai_khoan = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $tai_khoan);
        $stmt->execute();
        $stmt->bind_result($id_tai_khoan);
        $stmt->fetch();
        $stmt->close();

        // Thêm thông tin khách hàng vào bảng khach_hang
        $sql = "INSERT INTO khach_hang (id_tai_khoan, ten_khach_hang, email, so_dien_thoai, dia_chi)
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("issss", $id_tai_khoan, $ten_khach_hang, $email, $so_dien_thoai, $dia_chi);

        if ($stmt->execute()) {
            echo "Đăng ký thành công!";
        } else {
            $error = "Lỗi khi lưu thông tin khách hàng.";
        }

        $stmt->close();
    }
}

if ($error) {
    echo '<p class="error">' . htmlspecialchars($error) . '</p>';
}

$conn->close();
?>

<form method="POST" action="">
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="text" name="so_dien_thoai" placeholder="Số điện thoại" required><br>
    <input type="text" name="dia_chi" placeholder="Địa chỉ" required><br>
    <input type="text" name="ten_khach_hang" placeholder="Họ và Tên" required><br>
    <input type="submit" value="Hoàn tất đăng ký">
</form>
