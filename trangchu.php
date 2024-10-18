<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Thực Phẩm Chức Năng Nhóm 8</title>
    <style>
        body {
            background-image: url('img/bg.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh; /* Đảm bảo chiều cao toàn màn hình */
            display: flex;
            justify-content: center; /* Căn giữa theo chiều ngang */
            align-items: center; /* Căn giữa theo chiều dọc */
            margin: 0; /* Xóa margin mặc định */
        }

        .search-form {
            text-align: center;
            background-color: rgba(255, 255, 255, 0.8); /* Nền trắng với độ trong suốt */
            padding: 20px;
            border-radius: 10px; /* Bo tròn góc */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); /* Tạo bóng cho form */
        }

        img {
            max-width: 200px; /* Giới hạn chiều rộng ảnh */
            margin-top: 10px; /* Khoảng cách trên ảnh */
        }

        .search-result {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="search-form">
        <form action="timkiem.php" method="post">
            <p>Thuốc luôn có, Đặt là giao</p>
            <input type="text" name="search" placeholder="Nhập tên thuốc" required class="form-control mb-2">
            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
        </form>
    </div>

   

</body>
</html>
