<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dị Ứng Là Gì? Cách Đối Phó Với Dị Ứng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.8;
            max-width: 800px;
            margin: auto;
            padding: 20px;
            background-color: #f9f9fb;
            color: #333;
        }
        h1 {
            color: #4a90e2;
            text-align: center;
            font-size: 2em;
        }
        h2 {
            color: #333;
            border-bottom: 2px solid #4a90e2;
            padding-bottom: 5px;
            margin-top: 30px;
            font-size: 1.5em;
        }
        img {
            max-width: 100%;
            height: auto;
            margin: 20px auto;
            display: block;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        p, ul {
            font-size: 1.1em;
            margin: 15px 0;
        }
        ul {
            padding-left: 20px;
            list-style-type: square;
        }
        li {
            margin: 10px 0;
        }
        .footer {
            margin-top: 30px;
            font-size: 0.9em;
            color: #555;
            text-align: center;
        }
        a {
            color: #4a90e2;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <?php
        $title = "Dị Ứng Là Gì? Cách Đối Phó Với Dị Ứng";
        $intro = "Dị ứng là một tình trạng thường gặp, gây ra do phản ứng của hệ thống miễn dịch đối với một chất lạ (hay gọi là dị nguyên), những chất lạ này thường không gây hại cho cơ thể, nhưng cơ thể lại phản ứng một cách quá mức với nó. Những chất lạ này được gọi là chất gây dị ứng. Chúng có thể bao gồm một số loại như thực phẩm, thuốc, phấn hoa hoặc lông thú cưng... Bình thường hệ thống miễn dịch của chúng ta có nhiệm vụ là giữ cho cơ thể chúng ta khỏe mạnh bằng cách phản ứng để chống lại các mầm bệnh có hại. Tuy nhiên, ở những người bị bệnh dị ứng thì hệ thống miễn dịch coi nó như một kẻ gây hại từ bên ngoài đe dọa cơ thể và tấn công, gây ra những triệu chứng dị ứng.";
        
        $symptoms_title = "Triệu chứng của dị ứng bao gồm:";
        $symptoms = [
            "Ngứa ngáy, nổi mẩn đỏ",
            "Chảy nước mũi, hắt hơi",
            "Khó thở hoặc thở khò khè",
            "Sưng tấy ở các vùng bị dị ứng"
        ];
        
        $coping_title = "Cách đối phó với dị ứng:";
        $coping_methods = [
            "Tránh xa các tác nhân gây dị ứng đã biết.",
            "Sử dụng thuốc kháng histamin để giảm các triệu chứng.",
            "Tiêm ngừa dị ứng (immunotherapy) để giúp hệ miễn dịch thích nghi.",
            "Duy trì vệ sinh môi trường sống, giữ sạch sẽ để hạn chế tác nhân dị ứng."
        ];
    ?>

    <h1><?php echo $title; ?></h1>
    <p><?php echo $intro; ?></p>
    <!-- Hình ảnh minh họa dị ứng -->
    <img src="diung1.jpeg" alt="Hình ảnh minh họa dị ứng">

    <h2><?php echo $symptoms_title; ?></h2>
    <ul>
        <?php foreach ($symptoms as $symptom): ?>
            <li><?php echo $symptom; ?></li>
        <?php endforeach; ?>
    </ul>
    <!-- Hình ảnh minh họa triệu chứng dị ứng -->
    <img src="diungda.jpg" alt="Hình ảnh triệu chứng dị ứng da">
    <img src="diungthoitiet.jpg" alt="Hình ảnh triệu chứng dị ứng thời tiết">
    <img src="hathoi.jpg" alt="Hình ảnh triệu chứng hắt hơi do dị ứng">
    <img src="khotho.jpg" alt="Hình ảnh khó thở do dị ứng">

    <h2><?php echo $coping_title; ?></h2>
    <ul>
        <?php foreach ($coping_methods as $method): ?>
            <li><?php echo $method; ?></li>
        <?php endforeach; ?>
    </ul>
    <!-- Hình ảnh minh họa cách đối phó với dị ứng -->
    <img src="minhhoadiung.jpg" alt="Hình ảnh cách đối phó với dị ứng">

    <div class="footer">
        <p>Trang web này chỉ cung cấp thông tin cơ bản. Nếu bạn có bất kỳ triệu chứng nghiêm trọng nào, vui lòng tham khảo ý kiến bác sĩ.</p>
    </div>
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
        <form action="#.php" method="post">
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
