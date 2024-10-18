<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản phẩm Thực phẩm chức năng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background-color: #f8f9fa;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .product-list {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }
        .product-item {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 10px;
            width: calc(33.33% - 20px);
            box-sizing: border-box;
            background-color: #fff;
            transition: box-shadow 0.3s;
        }
        .product-item:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        img {
            max-width: 100%;
            border-radius: 5px;
        }
        .back-link {
            display: block;
            text-align: center;
            margin: 20px 0;
            text-decoration: none;
            color: #007bff;
        }
    </style>
</head>
<body>
    <h1>Sản phẩm Thực phẩm chức năng</h1>

    <a class="back-link" href="trangchu.php">Quay lại Trang Chính</a>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "thuc_pham_chuc_nang";

    // Kết nối đến cơ sở dữ liệu
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Kết nối thất bại: " . mysqli_connect_error());
    }

    // Tạo câu truy vấn SQL
    $sql = "SELECT * FROM mat_hang";

    // Thực thi câu truy vấn
    $result = mysqli_query($conn, $sql);

    // Kiểm tra và hiển thị kết quả
    if ($result && mysqli_num_rows($result) > 0) {
        echo "<div class='product-list'>";
        while($row = mysqli_fetch_assoc($result)) {
            echo "<div class='product-item'>";
            echo "<h3>" . htmlspecialchars($row['ten_mat_hang']) . "</h3>";
            echo "<p>Loại: " . htmlspecialchars($row['loai_mat_hang']) . "</p>";
            echo "<p>Công dụng: " . htmlspecialchars($row['cong_dung_mat_hang']) . "</p>";
            echo "<p>Giá: " . number_format($row['gia_mat_hang'], 0, ',', '.') . " VNĐ</p>";
            
            if (!empty($row['hinh_anh'])) {
                $imageData = base64_encode($row['hinh_anh']);
                echo '<img src="data:image/jpeg;base64,' . $imageData . '" alt="Hình ảnh sản phẩm">';
            } else {
                echo '<p>Không có hình ảnh</p>';
            }

            echo "</div>";
        }
        echo "</div>";
    } else {
        echo "<p>Không có sản phẩm nào.</p>";
    }

    // Đóng kết nối
    mysqli_close($conn);
    ?>
</body>
</html>
