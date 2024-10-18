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
            height: 100vh;
            display: flex;
            justify-content: flex-start; /* Đặt căn giữa theo chiều dọc */
            align-items: flex-start; /* Căn giữa theo chiều ngang */
            margin: 0; 
            flex-direction: column; /* Đặt hướng chiều dọc */
        }

        .search-form {
            text-align: center;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            margin-top: 20px; /* Khoảng cách trên với các phần khác */
        }

        img {
            max-width: 200px;
            margin-top: 10px;
        }

        .search-result {
            text-align: center;
            margin-top: 20px;
        }

        .product-list {
            display: flex; /* Hiển thị theo hàng */
            flex-wrap: wrap; /* Bao gói lại các sản phẩm khi không đủ chỗ */
            justify-content: center; /* Căn giữa các sản phẩm */
        }

        .product-item {
            margin: 10px; /* Khoảng cách giữa các sản phẩm */
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="text-center py-4">
            <h1 class="display-4">Thực Phẩm Chức Năng Nhóm 8</h1>
            <p class="lead">Thực Phẩn Chức Năng Nhóm 8 Luôn Có, Đặt Là Giao Ngay</p>
        </header>
        
        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Trang chủ</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>   
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown" onmouseenter="showDropdown()" onmouseleave="hideDropdown()">
                            <a class="nav-link dropdown-toggle" href="sanphan.php" id="navbarDropdown" role="button" aria-expanded="false">
                                Sản phẩm
                            </a>
                            <ul class="dropdown-menu" id="productDropdown" aria-labelledby="navbarDropdown" style="display: none;">
                                <?php
                                $servername = "localhost";
                                $username = "root";
                                $password = "";
                                $dbname = "thuc_pham_chuc_nang";

                                $conn = mysqli_connect($servername, $username, $password, $dbname);
                                if (!$conn) {
                                    die("Kết nối thất bại: " . mysqli_connect_error());
                                }

                                $sql = "SELECT DISTINCT loai_mat_hang FROM mat_hang";
                                $result = mysqli_query($conn, $sql);

                                if ($result && mysqli_num_rows($result) > 0) {
                                    while($row = mysqli_fetch_assoc($result)) {
                                        echo "<li><a class='dropdown-item' href='#' onclick='showProducts(\"".$row['loai_mat_hang']."\")'>".$row['loai_mat_hang']."</a></li>";
                                    }
                                }
                                mysqli_close($conn);
                                ?>
                                
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="gioithieu.php">Giới thiệu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="lienhe.php">Liên hệ</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <div id="productList" class="product-list mt-4" style="display: none;"></div>

        <script>
        function showProducts(type) {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("productList").innerHTML = this.responseText;
                    document.getElementById("productList").style.display = 'flex';
                }
            };
            xhr.open("GET", "get_products.php?type=" + type, true);
            xhr.send();
        }

        function showDropdown() {
            document.getElementById("productDropdown").style.display = 'block';
        }

        function hideDropdown() {
            document.getElementById("productDropdown").style.display = 'none';
            document.getElementById("productList").style.display = 'none'; 
        }
        </script>

        <div class="search-form">
            <form action="timkiem.php" method="post" class="d-flex">
                <input class="form-control me-2" type="text" name="search" placeholder="Tìm kiếm sản phẩm" required>
                <button class="btn btn-primary" type="submit">Tìm kiếm</button>
            </form>
        </div>
    </div>
</body>
</html>
