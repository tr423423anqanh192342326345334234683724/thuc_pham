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
        .product-list {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            margin-top: 20px;
        }
        .product-item {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 10px;
            width: calc(33.33% - 20px);
            box-sizing: border-box;
            background-color: #fff;
            transition: box-shadow 0.3s;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .product-item:hover {
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
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "thuc_pham_chuc_nang";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Kết nối thất bại: " . mysqli_connect_error());
    }

    // Kiểm tra đăng nhập
    if (!isset($_SESSION['user_id'])) {
        echo "<h1><p style='color: red; font-weight: bold;'>Vui lòng đăng nhập để tiếp tục.</p></h1>";
        echo "<button style='background-color: #007bff; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; font-weight: bold; margin-top: 20px;'><a href='dangnhap.php' style='text-decoration: none; color: white;'>Đăng nhập</a></button>";
        exit;
    }

    $user_id = $_SESSION['user_id'];

    // Thêm sản phẩm vào giỏ hàng
    if (isset($_GET['product_id']) && isset($_GET['quantity'])) {
        $product_id = $_GET['product_id'];
        $quantity = $_GET['quantity'];
        
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }
        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id] += $quantity;
        } else {
            $_SESSION['cart'][$product_id] = $quantity;
        }
    }

    // Xử lý khi người dùng xác nhận mua hàng
    if (isset($_POST['confirm_purchase'])) {
        $order_date = date('Y-m-d H:i:s');
        $total_amount = 0;

        // Tính tổng tiền
        foreach ($_SESSION['cart'] as $product_id => $quantity) {
            $sql = "SELECT gia_mat_hang FROM mat_hang WHERE id = $product_id";
            $result = mysqli_query($conn, $sql);
            if ($row = mysqli_fetch_assoc($result)) {
                $total_amount += $row['gia_mat_hang'] * $quantity;
            }
        }

        // Tạo đơn hàng mới
        $sql = "INSERT INTO don_hang (id_khach_hang, ngay_dat_hang, tong_tien, trang_thai) VALUES ($user_id, '$order_date', $total_amount, 'Đang xử lý')";
        if (mysqli_query($conn, $sql)) {
            $order_id = mysqli_insert_id($conn);

            // Thêm chi tiết đơn hàng
            foreach ($_SESSION['cart'] as $product_id => $quantity) {
                $sql = "SELECT gia_mat_hang FROM mat_hang WHERE id = $product_id";
                $result = mysqli_query($conn, $sql);
                if ($row = mysqli_fetch_assoc($result)) {
                    $price = $row['gia_mat_hang'];
                    $sql = "INSERT INTO chi_tiet_don_hang (id_don_hang, id_hang_hoa, so_luong, gia) VALUES ($order_id, $product_id, $quantity, $price)";
                    mysqli_query($conn, $sql);
                }
            }

            // Xóa giỏ hàng sau khi đã lưu vào database
            unset($_SESSION['cart']);
            echo "<p style='color: green;'>Đơn hàng của bạn đã được xác nhận!</p>";
        } else {
            echo "<p style='color: red;'>Có lỗi xảy ra khi xử lý đơn hàng. Vui lòng thử lại.</p>";
        }
    }

    
    echo "<h1>Giỏ hàng của bạn</h1>";
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        echo "<form method='POST'>";
        echo "<table border='1'>";
        echo "<tr><th>Sản phẩm</th><th>Số lượng</th><th>Giá</th><th>Tổng</th></tr>";
        $total = 0;
        foreach ($_SESSION['cart'] as $product_id => $quantity) {
            $sql = "SELECT * FROM mat_hang WHERE id = $product_id";
            $result = mysqli_query($conn, $sql);
            if ($row = mysqli_fetch_assoc($result)) {
                $subtotal = $row['gia_mat_hang'] * $quantity;
                $total += $subtotal;
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['ten_mat_hang']) . "</td>";
                echo "<td>$quantity</td>";
                echo "<td>" . number_format($row['gia_mat_hang'], 0, ',', '.') . " VNĐ</td>";
                echo "<td>" . number_format($subtotal, 0, ',', '.') . " VNĐ</td>";
                echo "</tr>";
            }
        }
        echo "<tr><td colspan='3'>Tổng cộng:</td><td>" . number_format($total, 0, ',', '.') . " VNĐ</td></tr>";
        echo "</table>";
        echo "<button type='submit' name='confirm_purchase' style='background-color: #007bff; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; font-weight: bold; margin-top: 20px;'>Xác nhận mua hàng</button>";
        echo "</form>";
    } else {
        echo "<p>Giỏ hàng của bạn đang trống.</p>";
    }

    echo "<a href='sanphamchitiet.php' style='display: inline-block; margin-top: 20px; text-decoration: none; color: #007bff;'>Quay lại trang sản phẩm</a>";

    mysqli_close($conn);
    ?>
</html>
