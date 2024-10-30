<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bệnh Võng Lưng - Khả Năng Chữa Trị và Phương Pháp Điều Trị</title>
    <!-- Link Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f9f9fb;
            font-family: Arial, sans-serif;
        }
        h1, h2, h3 {
            color: #4a90e2;
        }
        .lead, .footer-text {
            color: #555;
        }
        img {
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .footer {
            margin-top: 30px;
            font-size: 0.9em;
            text-align: center;
        }
        .related-posts img {
            width: 100%;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        .comment-section textarea {
            width: 100%;
            height: 100px;
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            resize: none;
        }
        .comment-section button {
            background-color: #0056b3;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body class="container my-5">

    <?php
        $title = "Bệnh Võng Lưng - Khả Năng Chữa Trị và Phương Pháp Điều Trị";
        $intro = "Bệnh võng lưng (hay thoát vị đĩa đệm cột sống lưng) là một tình trạng phổ biến, gây ra bởi các đĩa đệm cột sống bị tổn thương, dẫn đến thoát vị ra ngoài và chèn ép dây thần kinh. Bệnh thường gây đau lưng, tê bì chân tay và ảnh hưởng đến chất lượng cuộc sống.";

        $can_be_cured = "Bệnh võng lưng có thể chữa được không?";
        $cure_description = "Khả năng chữa trị bệnh võng lưng phụ thuộc vào mức độ nghiêm trọng của bệnh và phương pháp điều trị được sử dụng. Trong nhiều trường hợp, nếu phát hiện sớm và điều trị đúng cách, bệnh có thể được cải thiện đáng kể, thậm chí có thể chữa khỏi. Tuy nhiên, nếu bệnh đã tiến triển nặng, khả năng phục hồi hoàn toàn có thể sẽ thấp hơn.";

        $treatment_methods_title = "Phương pháp điều trị bệnh võng lưng phổ biến:";
        $treatment_methods = [
            "Điều trị nội khoa: Sử dụng thuốc giảm đau, kháng viêm để giảm triệu chứng.",
            "Vật lý trị liệu: Các bài tập giãn cơ, phục hồi chức năng giúp cải thiện sự linh hoạt của cột sống.",
            "Châm cứu: Phương pháp y học cổ truyền giúp giảm đau và tăng tuần hoàn máu.",
            "Phẫu thuật: Áp dụng trong trường hợp nghiêm trọng, khi các phương pháp khác không mang lại hiệu quả."
        ];
    ?>

    <h1 class="text-center mb-4"><?php echo $title; ?></h1>
    <p class="lead"><?php echo $intro; ?></p>

    <h2 class="mt-5"><?php echo $can_be_cured; ?></h2>
    <p><?php echo $cure_description; ?></p>

    <!-- Hình ảnh minh họa về bệnh võng lưng -->
    <div class="text-center">
        <img src="vonglung2.png" alt="Hình ảnh minh họa bệnh võng lưng" class="img-fluid my-4">
        <img src="vonglung1.jpeg" alt="Hình ảnh minh họa bệnh võng lưng" class="img-fluid my-4">
    </div>

    <h2 class="mt-5"><?php echo $treatment_methods_title; ?></h2>
    <ul class="list-group list-group-flush mb-4">
        <?php foreach ($treatment_methods as $method): ?>
            <li class="list-group-item"><?php echo $method; ?></li>
        <?php endforeach; ?>
    </ul>

    <div class="footer">
        <p class="footer-text">Thông tin trong trang web chỉ mang tính tham khảo. Nếu bạn gặp các triệu chứng của bệnh võng lưng, hãy tham khảo ý kiến bác sĩ để được tư vấn và điều trị phù hợp.</p>
    </div>

    <div class="related-posts mt-5">
        <h3>Bài viết liên quan</h3>
        <div class="d-flex flex-wrap">
            <div class="col-md-4 mb-4">
                <a href="suimaoga.php" style="text-decoration: none;">
                    <img src="suimaoga.png" alt="Sùi mào gà âm đạo">
                    <h4>Sùi mào gà âm đạo là gì? Mức độ nguy hiểm của bệnh lý này ra sao?</h4>
                </a>
            </div>
        </div>
    </div>

    <div class="comment-section mt-5">
        <h3>Để lại bình luận của bạn</h3>
        <form action="#.php" method="post">
            <textarea name="binhluan" placeholder="Viết bình luận của bạn..." required></textarea>
            <button type="submit">Gửi</button>
        </form>
    </div>
</body>
</html>
