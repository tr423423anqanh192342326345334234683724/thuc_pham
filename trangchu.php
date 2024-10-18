<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Thực Phẩm Trức Năng Nhóm 8</title>
    <style>
        body {
            background-image: url('img/bg.jpg');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body>
    <form action="" method="post" style="text-align: center; margin-top: 100px;  margin-left: 500px; margin-right: 500px;" >
        <p>Thuốc luôn có, Đặt là giao</p>
        <input type="text" name="search" placeholder="Nhập tên thuốc" required>
        <button type="submit">Tìm kiếm</button>
        <form action="upload.php" method="post" enctype="multipart/form-data">
    
</form>

    
    <?php
$severname = "localhost";
$username = "root";
$password = "";
$dbname = "thuc_pham_chuc_nang";

$conn = mysqli_connect($severname, $username, $password, $dbname);
if (!$conn) {
    die("Connection Lỗi: " . mysqli_connect_error());
}

if (isset($_POST['search'])) {
    $search = $_POST['search'];
    $sql = "SELECT * FROM mat_hang WHERE ten_mat_hang LIKE '%$search%'";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("Lỗi truy vấn: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
           echo $row['loai_mat_hang'] . "<br> " . $row['ten_mat_hang'] ."<br>". $row['cong_dung_mat_hang'] ."<br>". $row['gia_mat_hang'] ."<br>". $row['hinh_anh'] ."<br>";
        }
    } else {
        echo "Không tìm thấy sản phẩm nào.";
    }
}

?>

</body>
</html>
