<?php
session_start(); // Khởi tạo session

// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";  // Thay bằng username MySQL của bạn
$password = "";      // Thay bằng mật khẩu MySQL của bạn
$dbname = "thuc_pham_chuc_nang";  // Thay bằng tên database của bạn

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Nhận dữ liệu từ form
    $tai_khoan = trim($_POST['tai_khoan']);
    $mat_khau = trim($_POST['mat_khau']);

    // Kiểm tra thông tin
    if (empty($tai_khoan) || empty($mat_khau)) {
        $error = 'Vui lòng điền đầy đủ thông tin.';
    } else {
        // Kiểm tra tên đăng nhập và mật khẩu
        $sql = "SELECT id, mat_khau FROM tai_khoan_khach_hang WHERE tai_khoan = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $tai_khoan);
        $stmt->execute();
        $stmt->store_result();
        
        if ($stmt->num_rows > 0) {
            // Nếu tài khoản tồn tại, kiểm tra mật khẩu
            $stmt->bind_result($id, $hashed_password);
            $stmt->fetch();

            // Kiểm tra mật khẩu
            if (password_verify($mat_khau, $hashed_password)) {
                // Lưu thông tin vào session
                $_SESSION['tai_khoan'] = $tai_khoan;
                $_SESSION['id_tai_khoan'] = $id;

                // Lấy thông tin khách hàng từ bảng khach_hang
                $sql = "SELECT * FROM khach_hang WHERE id_tai_khoan = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $result = $stmt->get_result();
                
                if ($result->num_rows > 0) {
                    $khach_hang = $result->fetch_assoc();
                    $_SESSION['ten_khach_hang'] = $khach_hang['ten_khach_hang'];
                    $_SESSION['email'] = $khach_hang['email'];
                    $_SESSION['so_dien_thoai'] = $khach_hang['so_dien_thoai'];
                    $_SESSION['dia_chi'] = $khach_hang['dia_chi'];
                }

                // Sau khi xác thực thành công
                $_SESSION['user_id'] = $id;
                $_SESSION['ten_khach_hang'] = $khach_hang['ten_khach_hang'];

                // Chuyển hướng đến trang chủ trangchu.php
                header('Location: trangchu.php');
                exit();
            }   
            elseif ($tai_khoan == 'admin' && $mat_khau == 'admin') {
                header('Location: admin.php');
                exit();
            }
            else {
                $error = 'Mật khẩu không đúng.';
            }
        } else {
            $error = 'Tên tài khoản không tồn tại.';
        }

        $stmt->close();
    }
}

if ($error) {
    echo '<p class="error">' . htmlspecialchars($error) . '</p>';
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <style>
        body {
            background-image: url('hihi.jpg'); /* Màu nền trắng */
            color: black; /* Màu chữ đen */
            font-family: Arial, sans-serif; /* Font chữ */
            padding: 20px; /* Khoảng cách cho body */
            text-align: center; /* Căn giữa văn bản */
        }

        h1 {
            margin-bottom: 20px; /* Khoảng cách dưới tiêu đề */
        }

        form {
            max-width: 400px; /* Chiều rộng tối đa cho form */
            margin: auto; /* Căn giữa form */
            padding: 20px; /* Khoảng cách bên trong form */
            border: 1px solid #ccc; /* Viền cho form */
            border-radius: 10px; /* Bo tròn góc cho form */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Hiệu ứng đổ bóng */
        }

        input[type="text"],
        input[type="password"] {
            width: calc(100% - 22px); /* Chiều rộng 100% - padding */
            padding: 10px; /* Khoảng cách bên trong input */
            margin: 10px 0; /* Khoảng cách giữa các input */
            border: 1px solid #ccc; /* Viền cho input */
            border-radius: 5px; /* Bo tròn góc cho input */
            box-sizing: border-box; /* Bao gồm padding và border vào kích thước */
        }

        input[type="submit"] {
            background-color: #007bff; /* Màu nền nút xanh */
            color: white; /* Màu chữ trong nút */
            border: none; /* Không có viền */
            border-radius: 5px; /* Bo tròn góc nút */
            padding: 10px 20px; /* Padding cho nút */
            cursor: pointer; /* Con trỏ chuột chuyển thành hình tay khi hover */
            transition: background-color 0.3s; /* Hiệu ứng chuyển màu */
            width: 100%; /* Chiều rộng 100% */
        }

        input[type="submit"]:hover {
            background-color: #0056b3; /* Màu nền nút khi hover */
        }

        .error {
            color: red; /* Màu chữ đỏ cho thông báo lỗi */
            margin-bottom: 15px; /* Khoảng cách dưới thông báo lỗi */
        }
    </style>
</head>
<body>

<h1>Đăng nhập</h1>

<form method="POST" action="">
    <input type="text" name="tai_khoan" placeholder="Tên tài khoản" required><br>
    <input type="password" name="mat_khau" placeholder="Mật khẩu" required><br>
    <input type="submit" value="Đăng nhập">
</form>

</body>
</html>
