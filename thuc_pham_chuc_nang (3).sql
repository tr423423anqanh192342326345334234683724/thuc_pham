-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 19, 2024 lúc 05:07 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


-- Đang đổ dữ liệu cho bảng `mat_hang`
INSERT INTO `mat_hang` (`id`, `loai_mat_hang`, `ten_mat_hang`, `cong_dung_mat_hang`, `gia_mat_hang`, `hinh_anh`) VALUES
(1, 'Vitamins', 'Vitamin C', 'Vitamin C được xem là loại vitamin quan trọng đối với việc chống oxy hóa, chính chức năng này của vitamin C được xem như một “vũ khí” lợi hại giúp bảo vệ các tế bào và hạn chế hiện tượng các ADN bị hư hại và đột biến. Vitamin C hỗ trợ hệ miễn dịch, ngăn ngừa tế bào ung thư “xâm chiếm” cơ thể.', 9000.00, NULL),
(2, 'Vitamins', 'Vitamins D3 Baby', 'Bổ sung hàm lượng Vitamin D3 cần thiết, phòng ngừa nguy cơ thiếu hụt Vitamin D3 ở trẻ sơ sinh giúp:\r\n\r\nThúc đẩy quá trình hấp thu, tổng hợp Canxi và photpho của cơ thể.\r\nKích thích quá trình hình thành và phát triển xương\r\nTham gia vào quá trình chuyển hóa hợp chất vô cơ trong cơ thể\r\nHỗ trợ tăng cường hệ miễn dịch, tăng sức đề kháng cho trẻ\r\nHỗ trợ duy trì cân bằng giữa nồng độ canxi trong máu và nồng độ oxi trong xương', 9000000.00, NULL),
(6, 'Vitamins', 'Vitamins E', 'Bổ sung sắt cho cơ thể, giúp tăng sản xuất hồng cầu, tăng vận chuyển oxy để thực hiện các chức năng sống của cơ thể.\r\n\r\nGiảm tình trạng đau đầu, hoa mắt, chóng mặt, thiếu máu lên não.\r\n\r\nHỗ trợ điều trị thiếu máu do thiếu sắt.\r\nGiúp bổ sung sắt cho bà bầu, tăng cường phát triển hệ thần kinh trẻ ngay từ khi trong bụng mẹ\r\n\r\nGiúp da trắng sáng, hồng hào, tươi trẻ.', 370000.00, NULL),
(7, 'Vitamins', 'Vitamins E', 'Giữ ẩm, khóa ẩm, hạn chế tình trạng da bong tróc, khô ráp do thời tiết hoặc lão hóa da.\r\nBảo vệ da, hỗ trợ tái tạo các tế bào da mới, phục hồi các tế bào da tổn thương do cháy nắng, giúp da đều màu và sáng màu hơn.\r\nGiảm nám da, sạm da, tàn nhang,…\r\nHỗ trợ làm lành vết thương, ngăn ngừa hình thành sẹo do mụn và bảo vệ da trước tác hại của tia UV.\r\nGiảm nếp nhăn, hỗ trợ làm chậm quá trình lão hóa da tự nhiên.\r\nCông dụng bảo vệ sức khỏe của Vitamin E:\r\n\r\nHỗ trợ cân bằng nội tiết tố, điều hòa kinh nguyệt, làm giảm triệu chứng khó chịu do kinh nguyệt gây ra.\r\nHỗ trợ cân bằng hormone, cải thiện chức năng sinh lý của cả nam và nữ.\r\nHỗ trợ cân bằng lượng cholesterol, chống oxi hóa bảo vệ và cải thiện thị lực.\r\nTăng cường sức bền và sức mạnh cơ bắp, nuôi dưỡng mạch máu\r\nDuy trì, hệ thần kinh khỏe mạnh, phòng ngừa bệnh Alzheimer.', 115000.00, NULL),
(8, 'Thực phẩm bổ sung', 'Bột ngủ ngon Orihiro', 'Những người gặp vấn đề về giấc ngủ: khó ngủ, hay thức giấc vào đêm, người mệt mỏi vào buổi sáng sau khi thức giấc\r\nNhững người thường xuyên bị căng thẳng, áp lực do công việc, gia đình…\r\nPhụ nữ sau tiền mãn kinh thường bị stress, căng thẳng, ngủ không ngon giấc.', 440000.00, NULL),
(9, 'Vitamins', 'Vitabiotics', 'amin A (443 IU) 133 mg RE (17%), Vitamin D (D3 280 IU) 7 mg (140%), Vitamin E 5 mg α-TE (42%), Vitamin C 30 mg (38%), Thiamin (Vitamin B1) 0.5 mg (45%), Riboflavin (Vitamin B2) 0.8 mg (57%), Niacin (Vitamin B3) 6 mg NE (38%), Vitamin B6 0,5 mg (36%), Folic Acid 80 mg (40%), Vitamin B12 1 mg (40%), Pantothenic Acid 2 mg (33%), Iron 4 mg (29%), Kẽm 2,5 mg (25%), Đồng 150 mg (15%), Malt Extract 500 mg.\r\nĐặc biệt, công thức Vitabiotics Wellbaby Multi-Vitamin Liquid tăng cường bổ sung Vitamin D hỗ trợ tăng trưởng và phát triển chiều cao của trẻ.', 350000.00, NULL),
(10, 'Thực phẩm bổ sung', 'An thần', 'Những người gặp vấn đề về giấc ngủ: khó ngủ, hay thức giấc vào đêm, người mệt mỏi vào buổi sáng sau khi thức giấc\r\nNhững người thường xuyên bị căng thẳng, áp lực do công việc, gia đình…\r\nPhụ nữ sau tiền mãn kinh thường bị stress, căng thẳng, ngủ không ngon giấc. có thể cái thiện', 440000.00, NULL);



COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
