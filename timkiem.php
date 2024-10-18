<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>timkiem</title>
    <style>
        .search-result {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <form action="trangchu.php" method="post">
       <button type="submit">Trang chủ</button>
      
    </form>
    <form action="muahang.php" method="post">
       <button type="submit">Mua hàng</button>
    </form>
</body>
</html>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "thuc_pham_chuc_nang";

   
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection Lỗi: " . mysqli_connect_error());
    }

    
    if (isset($_POST['search'])) {
        $search = mysqli_real_escape_string($conn, $_POST['search']); 
        $sql = "SELECT * FROM mat_hang WHERE ten_mat_hang LIKE '%$search%'";
        $result = mysqli_query($conn, $sql);
        
        if (!$result) {
            die("Lỗi truy vấn: " . mysqli_error($conn));
        }

        
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='search-result'>";
                echo "<h4>" . htmlspecialchars($row['ten_mat_hang']) . "</h4>"; 
                echo "<p>Thuộc loại: " . htmlspecialchars($row['loai_mat_hang']) . "</p>";
                echo "<p>Công dụng: " . htmlspecialchars($row['cong_dung_mat_hang']) . "</p>";
                echo "<p>Giá: " . number_format($row['gia_mat_hang'], 0, ',', '.') . " VNĐ</p>"; 
                $imageData = base64_encode($row['hinh_anh']);
                echo '<img src="data:image/jpeg;base64,' . $imageData . '" alt="Hình ảnh sản phẩm"><br>';
                echo "</div>";
            }
        } else {
            echo "<div class='search-result'><p>Không tìm thấy sản phẩm nào.</p></div>";
        }
    }

   
    mysqli_close($conn);
    ?>