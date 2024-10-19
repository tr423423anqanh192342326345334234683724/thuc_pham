<!DOCTYPE html>
<html lang="vi">
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
    <div style="padding-left: 1220px;">
                    <a href="dangki.php" style="text-decoration: none; color: black; ">
                        <img src="user.png" alt="User" style="width: 40px; height: 40px; margin-left: 20px;">
                        <button style="background-color: lightblue; border-radius: 50%; cursor: pointer;">Đăng kí</button>
                    </a>
                </div>
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
                        <li class="nav-item dropdown">
                            <a style="text-decoration: none; color: black; font-weight: bold;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button">
                                Sản phẩm
                            </a>
                            <ul class="dropdown-menu" id="productDropdown" aria-labelledby="navbarDropdown">
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
                                        switch ($row['loai_mat_hang']) {
                                            case "vitamins":
                                                echo "<li><a class='dropdown-item' href='vitamin.php'>{$row['loai_mat_hang']}</a></li>";
                                                break;
                                            case "Khoáng chất":
                                                echo "<li><a class='dropdown-item' href='khoangchat.php'>{$row['loai_mat_hang']}</a></li>";
                                                break;
                                            case "thực phẩm bổ sung":
                                                echo "<li><a class='dropdown-item' href='thucphamchucnang.php'>{$row['loai_mat_hang']}</a></li>";
                                                break;
                                            case "mẹ và bé":
                                                echo "<li><a class='dropdown-item' href='mevabe.php'>{$row['loai_mat_hang']}</a></li>";
                                                break;
                                            default:
                                                echo "<li><a class='dropdown-item' href='#'>{$row['loai_mat_hang']}</a></li>";
                                                break;
                                        }
                                    }
                                }
                                mysqli_close($conn);
                                ?>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a style="text-decoration: none; color: black; font-weight: bold;" class="nav-link" href="gioithieu.php">Giới thiệu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="lienhe.php">Liên hệ</a>
                        </li>
                    </ul>
                </div>
                <form action="timkiem.php" method="post" class="d-flex" style="flex-grow: 1;">
                    <input style="width: 600px;" class="form-control me-2" type="text" name="search" placeholder="Tìm kiếm sản phẩm" required>
                    <button class="btn btn-primary" type="submit">Tìm kiếm</button>
                </form>
                
            </div>
        </nav>
        <br>
        <div style="background-color: rgba(255, 255, 255, 0.8); padding: 20px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);">
            <h2 style="text-align: center;" class="text-center mb-4">Sản Phẩm Nổi Bật</h2>
            <div class="product-list d-flex justify-content-center">
                <div class="product-item mx-2">
                    <h3>Vitamin C</h3>
                    <img src="vitamin.jpg" alt="Sản phẩm 1" class="img-fluid" style="width: 200px; height: 200px;">
                    <p>Loại: Vitamin</p>
                    <p>Giá: 100.000 VNĐ</p>
                    <a href="#" class="btn btn-primary">Xem chi tiết</a>
                </div>
                <div class="product-item mx-2">
                    <h3>Calcium</h3>
                    <img src="vitamin.jpg" alt="Sản phẩm 1" class="img-fluid" style="width: 200px; height: 200px;">
                    <p>Loại: Khoáng chất</p>
                    <p>Giá: 100.000 VNĐ</p>
                    <a href="#" class="btn btn-primary">Xem chi tiết</a>
                </div>
                <div class="product-item mx-2">
                    <h3>Tăng Chiều Cao</h3>
                    <img src="vitamin.jpg" alt="Sản phẩm 1" class="img-fluid" style="width: 200px; height: 200px;">
                    <p>Loại: Mẹ và bé</p>
                    <p>Giá: 100.000 VNĐ</p>
                    <a href="#" class="btn btn-primary">Xem chi tiết</a>
                </div>
                <div class="product-item mx-2">
                    <h3>Bổ Não</h3>
                    <img src="vitamin.jpg" alt="Sản phẩm 1" class="img-fluid" style="width: 200px; height: 200px;">
                    <p>Loại: Thực phẩm bổ sung</p>
                    <p>Giá: 100.000 VNĐ</p>
                    <a href="#" class="btn btn-primary">Xem chi tiết</a>
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

        // Gắn sự kiện cho menu
        const dropdownToggle = document.getElementById("navbarDropdown");
        const dropdownMenu = document.getElementById("productDropdown");

        if (dropdownToggle && dropdownMenu) {
            dropdownToggle.addEventListener("mouseenter", showDropdown);
            dropdownToggle.addEventListener("mouseleave", hideDropdown);
            dropdownMenu.addEventListener("mouseenter", showDropdown);
            dropdownMenu.addEventListener("mouseleave", hideDropdown);
        }
    </script>
    <div>
        <h1 style="font-weight: bold; padding-left: 100px; font-size: 30px;">Góc Sức Khỏe</h1>
        <div>
            <img src="suckhoe.jpg" alt="" style="width: 100%; height: 300px;">
            <p>Bệnh vòng lương có thể chữa được không? cách chữa vòng lưng</p>
        </div>


    </div>
</body>
</html>
