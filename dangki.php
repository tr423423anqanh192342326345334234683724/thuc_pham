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
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "thuc_pham_chuc_nang";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Kết nối thất bại: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM tai_khoan_khach_hang";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if ($row["taikhoan"] == $_POST['taikhoan']) {
                    $error = 'Tài khoản đã tồn tại.';
                    break;
                }
            }
        }
        if(
       
        ?>
        <form method="POST" action="">
           <input type="text" name="taikhoan" placeholder="Tài khoản" required><br>
           <input type="password" name="matkhau" placeholder="Mật khẩu" required><br>
           <input type="password" name="nhaplai" placeholder="Nhập lại mật khẩu" required><br>
           <input type="submit" value="Đăng ký">
        </form>
        <a href="dangnhap.php" class="toggle-link">Đã có tài khoản? Đăng nhập</a>
    </div>
</body>
</html>
