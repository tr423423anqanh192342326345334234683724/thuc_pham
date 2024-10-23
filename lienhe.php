<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên hệ</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom, #2587db, #6da9e8);
            color: white;
            text-align: center;
            padding: 20px;
        }
        .contact-info {
            background-color: #0056b3;
            padding: 40px;
            border-radius: 15px;
            width: 1000px;
            margin: 0 auto;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
        }
        .contact-info h2 {
            margin-bottom: 20px;
        }
        .contact-info p {
            margin: 10px 0;
        }
        .contact-info a {
            color: white;
            text-decoration: none;
        }
        .address {
            margin-top: 20px;
        }

        /* Đường kẻ ngang giữa thông tin liên hệ và các phần dưới */
        .divider-horizontal {
            height: 5px;
            width: 90%;
            background-color: #7bb3ff;
            border-radius: 25px;
            margin: 30px auto;
        }

        /* Bố cục flexbox chia ngang các phần */
        .social-app-container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-top: 20px;
        }
        .social-follow {
            width: 40%; /* Phần "Theo dõi chúng tôi" nhỏ hơn */
            text-align: left;
            margin-left: 70px; /* Lùi vào bên trong thêm nữa */
        }
        .app-download {
            width: 40%;
            text-align: left;
        }
        .social-follow img, .app-download img {
            width: 30px;
            margin-right: 10px;
        }
        .app-download img.qr-code {
            width: 100px;
            margin: 10px 0;
        }
        .social-follow h3, .app-download h3 {
            color: white;
        }

        /* Căn chỉnh icon với văn bản */
        .social-follow p img {
            vertical-align: middle; /* Căn giữa icon với văn bản */
        }

        /* Đường kẻ dọc chia phần theo dõi và tải ứng dụng */
        .divider-vertical {
            height: 200px; /* Chiều cao của đường kẻ dọc */
            width: 5px; /* Độ dày của đường kẻ */
            background-color: #7bb3ff;
            border-radius: 25px;
            margin: auto 30px; /* Đảm bảo nó ở giữa hai phần */
        }

        /* Đảm bảo responsive */
        @media (max-width: 1024px) {
            .contact-info {
                width: 90%;
            }
            .social-app-container {
                flex-direction: column;
                align-items: center;
            }
            .social-follow, .app-download {
                width: 100%;
                margin-bottom: 20px;
            }
            .divider-vertical {
                height: 5px; 
                width: 80%;
                margin: 20px 0;
            }
        }
    </style>
</head>
<body>

    <div class="contact-info">
        <h2>Thông tin liên hệ</h2>
        <p><i class="fa fa-map-marker"></i> THỰC PHẨM CHỨC NĂNG NHÓM 8</p>
        <p><i class="fa fa-phone"></i> +84 908 562750</p>
        <p><i class="fa fa-envelope"></i> <a href="mailto:Thucphamchucnang.n8@gmail.com">Thucphamchucnang.n8@gmail.com</a></p>
        
        <div class="address">
            <p>Địa chỉ: 218 Lĩnh Nam, Hoàng Mai, Hà Nội</p>
        </div>

        <div class="divider-horizontal"></div>

        <div class="social-app-container">
            <div class="social-follow">
                <h3>Theo dõi chúng tôi trên</h3>
                <p>
                    <a href="https://www.facebook.com/PharmacityVN" target="_blank">
                        <img src="fbb.png" alt="Facebook" style="width: 33px; height: 33px;">
                    </a> 
                    Facebook
                </p>
                <p>
                    <a href="https://www.youtube.com/channel/UC34rPqjyb_WCq6dMu2khYQA" target="_blank">
                        <img src="youtube.png" alt="Youtube" style="width: 33px; height: 33px;">
                    </a> 
                    Youtube
                </p>
                <p>
                    <a href="https://zalo.me/1123198001548302988?src=qr" target="_blank">
                        <img src="zallo.png" alt="Zalo" style="width: 31px; height: 31px;">
                    </a> 
                    Zalo
                </p>
            </div>

            <div class="divider-vertical"></div>

            <div class="app-download">
                <h3>Tải ứng dụng TPCNN8 ngay thôi</h3>
                <p>Quét mã để tải ứng dụng</p>
                <img src="qrcode.png" alt="QR Code" class="qr-code">
                <p>Hoặc</p>
                <p>
                    <a href="https://apps.apple.com/us/app/pharmacity-nh%C3%A0-thu%E1%BB%91c-uy-t%C3%ADn/id1414835869" target="_blank">
                        <img src="appstoree.png" alt="App Store" style="width: 90px; height: 25px;">
                    </a>
                    <a href="https://play.google.com/store/apps/details?id=com.pharmacity_extracare&pli=1" target="_blank">
                        <img src="chplay.png" alt="Google Play" style="width: 90px; height: 25px;">
                    </a>
                </p>
            </div>
        </div>
    </div>

</body>
</html>
