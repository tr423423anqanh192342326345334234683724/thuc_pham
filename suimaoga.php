<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f9f9f9;
            font-family: Arial, sans-serif;
            color: #333;
        }
        nav.navbar {
            background: linear-gradient(to right, #87CEEB, #FFFFFF);
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            height: 80px;
            margin-bottom: 30px;
        }
        nav.navbar a.navbar-brand {
            transition: transform 0.2s;
        }
        nav.navbar a.navbar-brand:hover {
            transform: scale(1.1);
        }
        .dropdown-menu a.dropdown-item:hover {
            background-color: #f0f0f0;
        }
        .content {
            max-width: 1200px;
            margin: auto;
            padding: 0 20px;
        }
        .hero-img {
            width: 100%;
            height: auto;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }
        h1, h3 {
            color: #0056b3;
        }
        p.intro-text {
            font-size: 18px;
            font-weight: 500;
            font-style: italic;
            color: #555;
        }
        ul {
            list-style-type: square;
            padding-left: 20px;
        }
        .related-posts img {
            width: 100%;
            height: auto;
            border-radius: 15px;
            margin-bottom: 15px;
            transition: transform 0.3s;
        }
        .related-posts img:hover {
            transform: scale(1.05);
        }
        .related-posts h4 {
            font-size: 18px;
            color: #0056b3;
            font-weight: bold;
        }
        .footer {
            background-color: #0056b3;
            color: #fff;
            padding: 15px;
            text-align: center;
            margin-top: 30px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="trangchu.php">
                <img  src="logo.png" alt="Logo" style="width: 180px; height: auto; padding-top: 90px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>   
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="sanphan.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                                    echo "<li><a class='dropdown-item' href='{$row['loai_mat_hang']}.php'>{$row['loai_mat_hang']}</a></li>";
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
                <form action="timkiem.php" method="post" class="d-flex" style="flex-grow: 1;">
                    <input class="form-control me-2" type="text" name="search" placeholder="Tìm kiếm sản phẩm" required style="max-width: 500px;">
                    <button class="btn btn-primary" type="submit">Tìm kiếm</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="content">
        <img src="suimaoga.png" alt="" class="hero-img">
        <h1>Sùi mào gà âm đạo là gì? Mức độ nguy hiểm của bệnh lý này ra sao?</h1>
        <p class="intro-text">Sùi mào gà âm đạo gây ảnh hưởng như thế nào đến sức khỏe của chị em phụ nữ? Phương pháp điều trị và ngăn ngừa bệnh lý về đường sinh dục này là gì? Cùng tìm hiểu kỹ hơn về sùi mào gà âm đạo qua bài viết dưới đây nhé!</p>
        <h3>1. Sùi mào gà âm đạo là gì?</h3>
        <p>HPV – Chủng virus gây u nhú ở người là nguyên nhân chính gây nên sùi mào gà...</p>
        <img src="suimaoga1.png" alt="" class="hero-img">
        <p>Sùi mào gà âm đạo có thể gây ảnh hưởng xấu đến chất lượng cuộc sống của phụ nữ...</p>
        <h3>Cách điều trị sùi mào gà âm đạo</h3>
        <ul>
            <li><strong>Dùng thuốc bôi:</strong> Bệnh nhân có thể tự bôi thuốc trực tiếp lên các nốt...</li>
            <li><strong>Phương pháp phẫu thuật:</strong> Bác sĩ sẽ thực hiện cắt, đốt hoặc dùng tia laser...</li>
            <li><strong>Phương pháp áp lạnh:</strong> Đây là phương pháp áp lạnh các nốt sùi bằng nitơ lỏng...</li>
        </ul>

        <div class="related-posts mt-5">
            <h3>Bài viết liên quan</h3>
            <div class="d-flex flex-wrap">
                <div class="col-md-4 mb-4">
                    <a href="vonglung.php" style="text-decoration: none;">
                        <img src="vonglung.png" alt="">
                        <h4>Bệnh võng mạch có thể chữa được không? cách chữa võng lưng</h4>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <div class="comment-section" style="max-width: 1200px; margin: auto;">
        <h3>Để lại bình luận của bạn</h3>
        <form action="xulybinhluan.php" method="post">
            <textarea name="binhluan" placeholder="Viết bình luận của bạn..." required></textarea>
            <br>
            <button style="background-color: #0056b3; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;" type="submit">Gửi</button>
        </form>
    </div>
    <br>
    <br>
    <br>
    <br>
    
   

   </body>
</html>
