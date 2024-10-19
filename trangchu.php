<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Thực Phẩm Chức Năng Nhóm 8</title>
    <style>
        body {
            background-image: url('hihi.jpg');
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            margin: 0;
        }

        .search-form, .product-item {
            text-align: center;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            margin-top: 20px;
        }

        .product-item {
            transition: transform 0.2s;
        }

        .product-item:hover {
            transform: scale(1.1);
        }

        .product-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px;
        }

        .dropdown-menu {
            max-height: 300px;
            overflow-y: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="text-center py-4">
            <h1 class="display-4">Thực Phẩm Chức Năng Nhóm 8</h1>
           
        </header>   
        
        <nav class="navbar navbar-expand-lg navbar-light" style="background: linear-gradient(to right, #87CEEB, #FFFFFF); border-radius: 10px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);">
            <div class="container-fluid">
                <a class="navbar-brand" href="trangchu.php">
                    <img src="logo.png" alt="Logo" style="width: 140px; height: auto;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>   
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item dropdown" onmouseenter="showDropdown()" onmouseleave="hideDropdown()">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" aria-expanded="false">
                                Sản phẩm
                            </a>
                            <ul class="dropdown-menu" id="productDropdown" aria-labelledby="navbarDropdown" style="display: none;">
                                <?php   
                                // Database connection details
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
                                        echo "<li><a class='dropdown-item' href='sanpham.php?loai=" . urlencode($row['loai_mat_hang']) . "'>{$row['loai_mat_hang']}</a></li>";
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
                    </ul>
                </div>
                <form action="timkiem.php" method="post" class="d-flex" style="flex-grow: 1;">
                    <input style="width: 600px;" class="form-control me-2" type="text" name="search" placeholder="Tìm kiếm sản phẩm" required>
                    <button class="btn btn-primary" type="submit">Tìm kiếm</button>
                </form>
                <div>
                    <a href="dangki.php" style="text-decoration: none; color: black;">
                        <img src="user.png" alt="User" style="width: 40px; height: 40px; margin-left: 20px;">
                        <p>Đăng kí</p>
                    </a>
                </div>
            </div>
        </nav>
        
        <div class="product-list mt-4">
            <h2 style="text-align: center;" class="text-center mb-4">Sản Phẩm Nổi Bật</h2>
            <div class="row justify-content-center">
                <div class="col-md-3 mb-4">
                    <div class="product-item card h-100">
                        <img src="vitamin_c.jpg" alt="Vitamin C" class="card-img-top" style="height: 200px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Vitamin C</h5>
                            <p class="card-text">Loại: Vitamins</p>
                            <p class="card-text mt-auto"><strong>Giá: 9.000 VNĐ</strong></p>
                            <a href="#" class="btn btn-primary mt-2">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="product-item card h-100">
                        <img src="bo_nao.jpg" alt="Bổ Não" class="card-img-top" style="height: 200px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Bổ Não</h5>
                            <p class="card-text">Loại: Thực Phẩm Bổ Sung</p>
                            <p class="card-text mt-auto"><strong>Giá: 15.000 VNĐ</strong></p>
                            <a href="#" class="btn btn-primary mt-2">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="product-item card h-100">
                        <img src="khoang_chat.jpg" alt="Khoáng Chất" class="card-img-top" style="height: 200px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Khoáng Chất</h5>
                            <p class="card-text">Loại: Khoáng Chất</p>
                            <p class="card-text mt-auto"><strong>Giá: 15.000 VNĐ</strong></p>
                            <a href="#" class="btn btn-primary mt-2">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="product-item card h-100">
                        <img src="tang_chieu_cao.jpg" alt="Tăng Chiều Cao" class="card-img-top" style="height: 200px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Tăng Chiều Cao</h5>
                            <p class="card-text">Loại: Mẹ Và Bé</p>
                            <p class="card-text mt-auto"><strong>Giá: 15.000 VNĐ</strong></p>
                            <a href="#" class="btn btn-primary mt-2">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
        function showDropdown() {
            document.getElementById("productDropdown").style.display = 'block';
        }

        function hideDropdown() {
            document.getElementById("productDropdown").style.display = 'none';
        }
        </script>
    </div>
    
</body>
</html>
