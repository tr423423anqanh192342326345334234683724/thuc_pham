<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm Kiếm Sản Phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            
            background-image: url(hihi.jpg);
            padding: 20px;
        }
        .container {
            max-width: 900px;
            margin: auto;
        }
        .search-result {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            margin: 10px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .search-result img {
            max-width: 100%;
            border-radius: 5px;
            margin-top: 10px;
        }
        .button-group {
            text-align: center;
            margin: 20px 0;
        }
        .button-group button {
            margin: 0 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Kết Quả Tìm Kiếm</h1>
        
        <div class="button-group">
            <form action="trangchu.php" method="post" style="display: inline;">
                <button type="submit" class="btn btn-secondary">Trang chủ</button>
            </form>
            <form action="muahang.php" method="post" style="display: inline;">
                <button type="submit" class="btn btn-primary">Mua hàng</button>
            </form>
        </div>

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "thuc_pham_chuc_nang";

        // Kết nối đến cơ sở dữ liệu
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("Connection Lỗi: " . mysqli_connect_error());
        }

        // Kiểm tra và xử lý tìm kiếm
        if (isset($_POST['search'])) {
            $search = mysqli_real_escape_string($conn, $_POST['search']); 
            $sql = "SELECT * FROM mat_hang WHERE ten_mat_hang LIKE '%$search%'";
            $result = mysqli_query($conn, $sql);
            
            if (!$result) {
                die("Lỗi truy vấn: " . mysqli_error($conn));
            }

            // Hiển thị kết quả
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='search-result'>";
                    echo "<h4>" . htmlspecialchars($row['ten_mat_hang']) . "</h4>"; 
                    echo "<p><strong>Loại:</strong> " . htmlspecialchars($row['loai_mat_hang']) . "</p>";
                    echo "<p><strong>Công dụng:</strong> " . htmlspecialchars($row['cong_dung_mat_hang']) . "</p>";
                    echo "<p><strong>Giá:</strong> " . number_format($row['gia_mat_hang'], 0, ',', '.') . " VNĐ</p>"; 
                    echo '<img src="data:image/jpeg;base64,' . base64_encode($row['hinh_anh']) . '" alt="Hình ảnh sản phẩm">';
                    echo "</div>";
                }
            } else {
                echo "<div class='search-result'><p>Không tìm thấy sản phẩm nào.</p></div>";
            }
        }

        // Đóng kết nối
        mysqli_close($conn);
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
