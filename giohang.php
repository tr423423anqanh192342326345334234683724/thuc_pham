<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ Hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-image: url('hihi.jpg');
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
            color: #333;
            margin-top: 20px;
            font-size: 24px;
        }
        .cart-list {
            display: flex;
            flex-direction: column;
            gap: 20px;
            justify-content: center;
            margin-top: 20px;
        }
        .cart-item {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 10px;
            width: 100%;
            box-sizing: border-box;
            background-color: #fff;
            transition: box-shadow 0.3s;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .cart-item:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transform: scale(1.05);
        }
        img {
            max-width: 100%;
            border-radius: 5px;
            margin: 10px 0;
        }
        .back-link {
            display: block;
            text-align: center;
            margin: 20px 0;
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }
        .search-form, .cart-item {
            text-align: center;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            margin-top: 20px;
        }
        .cart-item {
            transition: transform 0.2s;
        }

        .cart-item:hover {
            transform: scale(1.1);
        }

        .cart-list {
            display: flex;
            flex-direction: column;
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
    
</body>
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
                                                echo "<li><a class='dropdown-item' href='thucphamboxung 
                                                .php'>{$row['loai_mat_hang']}</a></li>";
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
    <?php
    
    ?>
</html>