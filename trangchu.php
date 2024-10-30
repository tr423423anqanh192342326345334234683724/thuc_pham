<?php
session_start(); // Đảm bảo session đã được bắt đầu
?>
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
    <br>
    <br>
    <br>
    <div class="container">
    <div style="display: flex; justify-content: flex-end; gap: 20px;">
        <?php
        if(isset($_SESSION['user_id']) && isset($_SESSION['ten_khach_hang'])) {
            // Người dùng đã đăng nhập
            echo '<span style="display: flex; align-items: center;">';
            echo '<img src="anhnguoidung.png" alt="User" style="width: 40px; height: 40px;">';
            echo '<span style="margin-left: 10px;">Xin chào, ' . htmlspecialchars($_SESSION['ten_khach_hang']) . '</span>';
            echo '</span>';
            echo '<a href="logout.php" style="text-decoration: none; color: black; display: flex; align-items: center;">';
            echo '<button style="background-color: lightblue; border-radius: 20%; cursor: pointer; margin-left: 10px;">Đăng xuất</button>';
            echo '</a>';
        } else {
            // Người dùng chưa đăng nhập
            echo '<a href="dangki.php" style="text-decoration: none; color: black; display: flex; align-items: center;">';
            echo '<img src="registered.png" alt="User" style="width: 40px; height: 40px;">';
            echo '<button style="background-color: lightblue; border-radius: 20%; cursor: pointer; margin-left: 10px;">Đăng ký</button>';
            echo '</a>';
        }
        ?>
        <a href="giohang.php" style="text-decoration: none; color: black; display: flex; align-items: center;">
            <img src="giohang.png" alt="User" style="width: 40px; height: 40px;">
            <button style="background-color: lightblue; border-radius: 20%; cursor: pointer; margin-left: 10px;">Giỏ hàng</button>
        </a>
        <a href="ttnguoidung.php" style="text-decoration: none; color: black; display: flex; align-items: center;">
            <img src="anhnguoidung.png" alt="User" style="width: 40px; height: 40px;">
            <button style="background-color: lightblue; border-radius: 20%; cursor: pointer; margin-left: 10px;">Thông tin người dùng</button>
        </a>
    </div>
        <header class="text-center py-4">
            <h1 class="display-4" style="font-weight: bold; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">Sức Khỏe Tối Ưu - Thực Phẩm Chất Lượng</h1>
        </header>   
        
        <nav class="navbar navbar-expand-lg navbar-light" style="background: linear-gradient(to right, #87CEEB, #FFFFFF); border-radius: 10px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); height: 100px;">
            <div class="container-fluid">
                <a class="navbar-brand" href="trangchu.php" style="padding-top: 100px; transition: transform 0.2s; transform: scale(1.1);   ">
                    <img src="logo.png" alt="Logo" style="width: 200px; height: auto;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>   
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item dropdown">
                            <a style="text-decoration: none; color: black; font-weight: bold;" class="nav-link dropdown-toggle" href="sanphan.php" id="navbarDropdown" role="button">
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
                                            case "Vitamins":
                                                echo "<li><a class='dropdown-item' href='vitamin.php'>{$row['loai_mat_hang']}</a></li>";
                                                break;
                                            case "Khoáng chất":
                                                echo "<li><a class='dropdown-item' href='khoangchat.php'>{$row['loai_mat_hang']}</a></li>";
                                                break;
                                            case "Thực phẩm bổ sung":
                                                echo "<li><a class='dropdown-item' href='thucphamboxung.php'>{$row['loai_mat_hang']}</a></li>";
                                                break;
                                            case "Mẹ và bé":
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
                            <a style="text-decoration: none; color: black; font-weight: bold;" class="nav-link" href="lienhe.php">Liên hệ</a>
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
            <h2 style="text-align: center;" class="text-center mb-4"><img src="banchay.png" alt="" style="width: 50px; height: 50px;">Sản Phẩm Nổi Bật</h2>
            <div class="product-list d-flex justify-content-center">
                <?php
                 $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "thuc_pham_chuc_nang";

                $conn = mysqli_connect($servername, $username, $password, $dbname);
                if (!$conn) {
                    die("Kết nối thất bại: " . mysqli_connect_error());
                }

    
                $sql = "SELECT * FROM mat_hang ORDER BY RAND() LIMIT 3";
                $result = mysqli_query($conn, $sql);

                if ($result && mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<div class='product-item mx-2'>";
                        echo "<h3>" . htmlspecialchars($row['ten_mat_hang']) . "</h3>";
                        
                        if (!empty($row['hinh_anh'])) {
                            $imageData = base64_encode($row['hinh_anh']);
                            echo '<img src="data:image/jpeg;base64,' . $imageData . '" alt="Hình ảnh sản phẩm" class="img-fluid" style="width: 200px; height: 200px;">';
                        } else {
                            echo '<img src="vitamin.jpg" alt="Hình ảnh mặc định" class="img-fluid" style="width: 200px; height: 200px;">';
                        }
                        
                        echo "<p>Loại: " . htmlspecialchars($row['loai_mat_hang']) . "</p>";
                        echo "<p>Giá: " . number_format($row['gia_mat_hang'], 0, ',', '.') . " VNĐ</p>";
                        echo "<a href='sanphamchitiet.php?id=" . $row['id'] . "' class='btn btn-primary'>Xem chi tiết</a>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>Không có sản phẩm nào.</p>";
                }

                mysqli_close($conn);
                ?>
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


        const dropdownToggle = document.getElementById("navbarDropdown");
        const dropdownMenu = document.getElementById("productDropdown");

        if (dropdownToggle && dropdownMenu) {
            dropdownToggle.addEventListener("mouseenter", showDropdown);
            dropdownToggle.addEventListener("mouseleave", hideDropdown);
            dropdownMenu.addEventListener("mouseenter", showDropdown);
            dropdownMenu.addEventListener("mouseleave", hideDropdown);
        }
        
    </script>
    <br>
    <div >
    <h1 style="padding-left: 20px;"><img style="width: 70px; height: 70px;" src="sk.png" alt="">Góc Sức Khỏe</h1>
    <div class="product-list d-flex justify-content-center">
        <div class="product-item mx-2">
        <a href="diung.php" style="text-decoration: none; color: black;">

            <img src="diung.jpg" alt="" style="width: 300px; height: 300px; margin-bottom: 10px;">
            <h3 > Dị ứng là gì? cách đối phó với dị ứng </h3>
        </a></div>
        <div class="product-item mx-2">
        <a href="suimaoga.php" style="text-decoration: none; color: black;">
            <img src="suimaoga.png" alt="" style="width: 400px; height: 300px; margin-bottom: 10px;">
            <h3 >Sùi mào gà âm đạo là gì? Mức độ nguy hiểm của bệnh lý này ra sao?</h3>
        </a></div>
        <div class="product-item mx-2">
        <a href="vonglung.php" style="text-decoration: none; color: black;">
            <img src="vonglung.png" alt="" style="width: 300px  ; height: 300px;">
            <h3 >Bệnh võng mạch có thể chữa được không? cách chữa võng lưng</h3>
        </a></div>
    </div>
</div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
    <footer class="footer" style="background-color: lightblue; color: black; padding: 40px; width: 100%;">
    <div class="container">
        <div class="row">
            <div class="col-md-4 text-center">
                <img src="logo.png" alt="Logo" style="width: 200px; height: auto; margin-top: 20px;margin-left: 550px;">
                <p>Địa chỉ: 218 Lĩnh Nam, Hoàng Mai, Hà Nội</p>
                <p>Điện thoại: 0123 456 789</p>
                <p>Email: Thucphamchucnang.n8@gmail.com</p>
                <div class="social-icons" style="margin-top: 10px;">
                    <a href="#" style="color: white; margin-right: 10px;">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" style="color: white; margin-right: 10px;">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" style="color: white; margin-right: 10px;">
                        <i class="fab fa-google-plus-g"></i>
                    </a>
                    <a href="#" style="color: white;">
                        <i class="fab fa-pinterest"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-4 text-center" style="padding-top: 200px;">
                <h5>Về chúng tôi</h5>
                <ul class="list-unstyled">
                    <li><a href="trangchu.php" style="color: black; text-decoration: none;">Trang chủ</a></li>
                    <li><a href="sanpham.php" style="color: black; text-decoration: none;">Sản phẩm</a></li>
                    <li><a href="suckhoe.php" style="color: black; text-decoration: none;">Sức khỏe</a></li>
                    <li><a href="lienhe.php" style="color: black; text-decoration: none;">Liên hệ</a></li>
                </ul>
            </div>
            <div class="col-md-4 text-center" style="padding-top: 200px;">
                <h5>Chính sách</h5>
                <ul class="list-unstyled">
                    <li><a href="#" style="color: black; text-decoration: none;">Bảo Mật</a></li>
                    <li><a href="#" style="color: black; text-decoration: none;">Mua Hàng</a></li>
                    <li><a href="#" style="color: black; text-decoration: none;">Trả Hàng</a></li>
                    <li><a href="#" style="color: black; text-decoration: none;">Giảm Giá</a></li>
                </ul>
            </div>
        </div>
        <div class="text-center mt-4">
            <p>&copy; Bản quyền thuộc về N8</p>
        </div>
    </div>
</footer>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    </div>


    
</body>
</html>
