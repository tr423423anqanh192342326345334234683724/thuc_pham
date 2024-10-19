<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Thực Phẩm Chức Năng Nhóm 8</title>
    <style>
        body {
            background-image: url('back.jpg');
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            margin: 0;
        }

        .search-form {
            text-align: center;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            margin-top: 20px;
        }

        

        img:hover {
            transform: scale(1.1); /* Phóng to logo khi di chuột */
        }
        .product-item:hover {
            transform: scale(1.1); /* Phóng to logo khi di chuột */
        }

        .search-result {
            text-align: center;
            margin-top: 20px;
        }

        .product-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .product-item {
            margin: 10px;
            text-align: center;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .dropdown-menu {
            max-height: 300px;
            overflow-y: auto;
        }

       
        .nav-link {
            font-size: 20px;
            padding-bottom: 10px; 

      
        .dropdown-item {
            padding: 8px 16px; 
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="text-center py-4">
            <h1 class="display-4">Thực Phẩm Chức Năng Nhóm 8</h1>
            <p class="lead">Thực Phẩm Chức Năng Nhóm 8 Luôn Có, Đặt Là Giao Ngay</p>
        </header>   
        
        <nav class="navbar navbar-expand-lg navbar-light" style="background: linear-gradient(to right, #87CEEB, #FFFFFF); border-radius: 10px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);">
            <div class="container-fluid">
                <a class="navbar-brand" href="trangchu.php">
                    <img src="logo.png" alt="Logo" style="width: 170px; height: 150px; padding-top: 40px;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>   
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
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
                                        try {
                                            $loai = strtolower($row['loai_mat_hang']);
                                            switch ($loai) {
                                                case 'vitamins':
                                                    echo "<li><a class='dropdown-item' href='vitamin.php'>{$row['loai_mat_hang']}</a></li>";
                                                    break;
                                                case 'thực phẩm bổ sung':
                                                    echo "<li><a class='dropdown-item' href='thucphamboxung.php'>{$row['loai_mat_hang']}</a></li>";
                                                    break;
                                                case 'khoáng chất':
                                                    echo "<li><a class='dropdown-item' href='khoangchat.php'>{$row['loai_mat_hang']}</a></li>";
                                                    break;
                                                case 'mẹ và bé':
                                                    echo "<li><a class='dropdown-item' href='mevabe.php'>{$row['loai_mat_hang']}</a></li>";
                                                    break;
                                                default:
                                                    echo "<li><a class='dropdown-item' href='sanpham.php?loai={$row['loai_mat_hang']}'>{$row['loai_mat_hang']}</a></li>";
                                                    break;
                                            }
                                        } catch (Exception $e) {
                                            echo "<li><a class='dropdown-item' href='sanpham.php?loai={$row['loai_mat_hang']}'>{$row['loai_mat_hang']}</a></li>";
                                        }
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
                <form action="timkiem.php" method="post" class="d-flex" style="flex-grow: 1;">
                    <input class="form-control me-2" style="width: 670px;" type="text" name="search" placeholder="Tìm kiếm sản phẩm" required>
                    <button class="btn btn-primary" type="submit">Tìm kiếm</button>
                </form>
            </div>
        </nav>
        
        <div id="productList" class="product-list mt-4" style="display: none;"></div>

        <script>
        function showDropdown() {
            document.getElementById("productDropdown").style.display = 'block';
        }

        function hideDropdown() {
            document.getElementById("productDropdown").style.display = 'none';
        }
        </script>
      
    </div>
    <div>
        <h1>Sản Phẩm Nổi Bật</h1>
        <div style="display: flex; flex-wrap: wrap;">
        <a href="vitamin.php" style="text-decoration: none; color: black;"> 
    <div class="product-item" style="margin: 10px; background-color: rgba(255, 255, 255, 0.8); padding: 20px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); ">
        <p>Vitamin C</p>
        <p>Loại: Vitamins</p>
        <img src="logo.png" alt="" style="width: 100px; height: 100px;"> 
        <p>Giá: 9.000 VNĐ</p>
    </div>
</a>

<div style="display: flex; flex-wrap: wrap;">
        <a href="vitamin.php" style="text-decoration: none; color: black;"> 
    <div class="product-item" style="margin: 10px; background-color: rgba(255, 255, 255, 0.8); padding: 20px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); ">
        <p>Vitamin C</p>
        <p>Loại: Vitamins</p>
        <img src="logo.png" alt="" style="width: 100px; height: 100px;"> 
        <p>Giá: 9.000 VNĐ</p>
    </div>
</a>
<div style="display: flex; flex-wrap: wrap;">
        <a href="vitamin.php" style="text-decoration: none; color: black;"> 
    <div class="product-item" style="margin: 10px; background-color: rgba(255, 255, 255, 0.8); padding: 20px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); ">
        <p>Vitamin C</p>
        <p>Loại: Vitamins</p>
        <img src="logo.png" alt="" style="width: 100px; height: 100px;"> 
        <p>Giá: 9.000 VNĐ</p>
    </div>
</a>
<div style="display: flex; flex-wrap: wrap;">
        <a href="vitamin.php" style="text-decoration: none; color: black;"> 
    <div class="product-item" style="margin: 10px; background-color: rgba(255, 255, 255, 0.8); padding: 20px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); ">
        <p>Vitamin C</p>
        <p>Loại: Vitamins</p>
        <img src="logo.png" alt="" style="width: 100px; height: 100px;"> 
        <p>Giá: 9.000 VNĐ</p>
    </div>
</a>
        </div>
    </div>
</body>
</html>
