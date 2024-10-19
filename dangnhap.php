<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
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
        <h2>Đăng nhập</h2>
        <?php
        session_start(); // Khởi động session
        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Lấy dữ liệu từ form và loại bỏ khoảng trắng
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);

            // Kiểm tra thông tin đăng nhập (đối với ví dụ này, giả sử thông tin đã được lưu trong session)
            // Trong thực tế, bạn sẽ kiểm tra thông tin trong cơ sở dữ liệu
            if (empty($username) || empty($password)) {
                $error = 'Vui lòng điền đầy đủ thông tin.';
            } else {
                // Giả sử đây là thông tin hợp lệ
                $valid_username = 'user123'; // Tên tài khoản hợp lệ (mẫu)
                $valid_password = 'password'; // Mật khẩu hợp lệ (mẫu)

                // Kiểm tra tên tài khoản và mật khẩu
                if ($username === $valid_username && $password === $valid_password) {
                    // Đăng nhập thành công
                    $_SESSION['username'] = $username;
                    echo '<p>Đăng nhập thành công!</p>'; // Thông báo đăng nhập thành công
                    // header('Location: dashboard.php'); // Chuyển tới trang quản lý (ví dụ)
                    // exit();
                } else {
                    $error = 'Tên tài khoản hoặc mật khẩu không chính xác.';
                }
            }
        }

        if ($error) {
            echo '<p class="error">' . htmlspecialchars($error) . '</p>';
        }
        ?>
        <form method="POST" action="">
            <input type="text" name="username" placeholder="Tên tài khoản" required><br>
            <input type="password" name="password" placeholder="Mật khẩu" required><br>
            <input type="submit" value="Đăng nhập">
        </form>
        <a href="register.php" class="toggle-link">Chưa có tài khoản? Đăng ký</a>
    </div>
</body>
</html>
