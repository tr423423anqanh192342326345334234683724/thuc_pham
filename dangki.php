<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            margin-top: 50px;
        }
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            width: 400px;
            margin: 0 auto;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
        }
        .form-container h2 {
            color: #333;
        }
        .form-container input[type="text"],
        .form-container input[type="email"],
        .form-container input[type="password"] {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
        }
        .form-container input[type="submit"] {
            width: 95%;
            background-color: #1E90FF;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            border-radius: 7px;
        }
        .form-container input[type="submit"]:hover {
            background-color: #ADD8E6;
        }
        .toggle-link {
            display: block;
            margin-top: 10px;
            color: #007BFF;
            cursor: pointer;
            text-decoration: none;
        }
        .error {
            color: red; /* Màu đỏ cho thông báo lỗi */
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Đăng ký</h2>
        <?php
        session_start(); // Khởi động session
        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Lấy dữ liệu từ form và loại bỏ khoảng trắng
            $phone = trim($_POST['phone']);
            $email = trim($_POST['email']);
            $username = trim($_POST['username']);
            $address = trim($_POST['address']);
            $password = trim($_POST['password']);
            $confirm_password = trim($_POST['confirm_password']);

            // Kiểm tra thông tin nhập vào
            if (empty($phone) || empty($email) || empty($username) || empty($address) || empty($password) || empty($confirm_password)) {
                $error = 'Vui lòng điền đầy đủ thông tin.';
            } elseif (!is_numeric($phone) || strlen($phone) < 10) {
                $error = 'Số điện thoại không hợp lệ.';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = 'Email không hợp lệ.';
            } elseif (strlen($password) < 6) {
                $error = 'Mật khẩu phải có ít nhất 6 ký tự.';
            } elseif ($password !== $confirm_password) {
                $error = 'Mật khẩu xác nhận không khớp.';
            } else {
                // Xử lý đăng ký thành công
                $_SESSION['phone'] = $phone;
                $_SESSION['email'] = $email;
                $_SESSION['username'] = $username;  
                $_SESSION['address'] = $address;
                // Lưu mật khẩu vào cơ sở dữ liệu (mã hóa mật khẩu trước khi lưu nếu cần)
                // header('Location: dangkis2.php'); // Chuyển tới trang tiếp theo
                echo '<p>Đăng ký thành công!</p>'; // Thông báo đăng ký thành công
            }
        }

        if ($error) {
            echo '<p class="error">' . htmlspecialchars($error) . '</p>';
        }
        ?>
        <form method="POST" action="">
            <input type="text" name="phone" placeholder="Số điện thoại" required><br>
            <input type="email" name="email" placeholder="Email" required><br>
            <input type="text" name="username" placeholder="Tên tài khoản" required><br>
            <input type="text" name="address" placeholder="Địa chỉ" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <input type="password" name="confirm_password" placeholder="Nhập lại Password" required><br>
            <input type="submit" value="Đăng ký">
        </form>
        <a href="dangnhap.php" class="toggle-link">Đã có tài khoản? Đăng nhập</a>
    </div>
</body>
</html>
