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
INSERT INTO `mat_hang` (`id`, `loai_mat_hang`, `ten_mat_hang`, `cong_dung_mat_hang`,`so_luong`, `gia_mat_hang`, `hinh_anh`) VALUES
(1, 'Vitamins', 'Vitamin C', 'Tăng cường hệ miễn dịch, chống oxy hóa, hỗ trợ làm đẹp da, tăng sức đề kháng, giúp hấp thu sắt tốt hơn, thúc đẩy sản xuất collagen, làm lành vết thương nhanh hơn, bảo vệ tế bào khỏi tổn thương, giảm nguy cơ mắc bệnh mãn tính', 100, 150000.00, ''),
(2, 'Vitamins', 'Vitamin D3', 'Hỗ trợ hấp thu canxi và phát triển xương khớp, tăng cường hệ miễn dịch, cải thiện tâm trạng, hỗ trợ sức khỏe tim mạch, tăng cường sức khỏe răng miệng, hỗ trợ giảm cân, cải thiện sức khỏe cơ bắp', 150, 200000.00, ''),
(3, 'Vitamins', 'Vitamin B Complex', 'Bổ sung năng lượng, tăng cường trao đổi chất, cải thiện sức khỏe não bộ, hỗ trợ tạo tế bào máu, duy trì làn da khỏe mạnh, tăng cường thị lực, hỗ trợ tiêu hóa, cải thiện tâm trạng và giảm stress', 120, 180000.00, ''),
(4, 'Vitamins', 'Vitamin E', 'Chống lão hóa và bảo vệ tế bào, tăng cường hệ miễn dịch, bảo vệ da khỏi tia UV, cải thiện tuần hoàn máu, hỗ trợ sức khỏe tim mạch, bảo vệ mắt, tăng cường sinh sản, làm đẹp da từ bên trong', 80, 220000.00, ''),
(5, 'Vitamins', 'Multivitamin', 'Bổ sung tổng hợp các vitamin thiết yếu, tăng cường sức khỏe toàn diện, cải thiện năng lượng, hỗ trợ hệ miễn dịch, tăng cường trao đổi chất, cải thiện sức khỏe xương khớp, hỗ trợ tiêu hóa, tăng cường thị lực', 200, 250000.00, ''),
(6, 'Vitamins', 'Vitamin A', 'Hỗ trợ thị lực, tăng cường miễn dịch, duy trì làn da khỏe mạnh, hỗ trợ sinh sản, tăng cường sức khỏe xương, bảo vệ niêm mạc, cải thiện sức khỏe răng miệng, hỗ trợ tăng trưởng và phát triển', 90, 160000.00, ''),
(7, 'Vitamins', 'Vitamin K2', 'Hỗ trợ đông máu, tăng cường sức khỏe xương khớp, ngăn ngừa vôi hóa động mạch, cải thiện sức khỏe tim mạch, hỗ trợ chức năng não bộ, tăng cường hấp thu canxi, cải thiện sức khỏe răng miệng', 110, 190000.00, ''),
(8, 'Vitamins', 'Vitamin B12', 'Tăng cường tạo hồng cầu, cải thiện năng lượng, hỗ trợ chức năng thần kinh, cải thiện tâm trạng, tăng cường trí nhớ, hỗ trợ trao đổi chất, duy trì sức khỏe tim mạch, cải thiện giấc ngủ', 130, 170000.00, ''),
(9, 'Vitamins', 'Folic Acid', 'Hỗ trợ thai kỳ, tạo tế bào máu, ngăn ngừa dị tật thai nhi, cải thiện sức khỏe tim mạch, hỗ trợ chức năng não bộ, tăng cường hệ miễn dịch, cải thiện tâm trạng, hỗ trợ tạo DNA', 140, 140000.00, ''),
(10, 'Vitamins', 'Biotin', 'Cải thiện tóc, da và móng, tăng cường trao đổi chất, hỗ trợ chức năng gan, cải thiện sức khỏe thần kinh, duy trì đường huyết ổn định, tăng cường năng lượng, hỗ trợ tiêu hóa', 160, 180000.00, ''),
(11, 'Thực phẩm bổ sung', 'Omega 3', 'Hỗ trợ tim mạch, tăng cường chức năng não bộ, giảm viêm, cải thiện thị lực, hỗ trợ phát triển thai nhi, giảm trầm cảm, cải thiện sức khỏe khớp, tăng cường hệ miễn dịch, hỗ trợ giảm cân', 170, 300000.00, ''),
(12, 'Thực phẩm bổ sung', 'Canxi', 'Tăng cường xương khớp, hỗ trợ co cơ, duy trì nhịp tim đều, cải thiện sức khỏe răng, hỗ trợ đông máu, ngăn ngừa loãng xương, cải thiện dẫn truyền thần kinh, hỗ trợ chuyển hóa năng lượng', 180, 250000.00, ''),
(13, 'Thực phẩm bổ sung', 'Sắt', 'Bổ sung sắt cho người thiếu máu, tăng cường tạo hồng cầu, cải thiện sức khỏe thai nhi, tăng cường năng lượng, hỗ trợ hệ miễn dịch, cải thiện tập trung, hỗ trợ vận chuyển oxy', 120, 180000.00, ''),
(14, 'Thực phẩm bổ sung', 'Kẽm', 'Tăng cường miễn dịch, hỗ trợ sinh lý, cải thiện làn da, tăng cường chức năng não bộ, hỗ trợ tiêu hóa, cải thiện thị lực, hỗ trợ tăng trưởng và phát triển, tăng cường chức năng tuyến giáp', 130, 200000.00, ''),
(15, 'Thực phẩm bổ sung', 'Magie', 'Hỗ trợ thần kinh và cơ bắp, cải thiện giấc ngủ, giảm stress, hỗ trợ tim mạch, cải thiện tiêu hóa, tăng cường xương khớp, điều hòa đường huyết, hỗ trợ chuyển hóa năng lượng', 140, 220000.00, ''),
(16, 'Thực phẩm bổ sung', 'Collagen', 'Làm đẹp da, chống lão hóa, tăng cường sức khỏe khớp, cải thiện sức khỏe tóc và móng, hỗ trợ phục hồi cơ bắp, tăng cường xương, cải thiện đàn hồi da, hỗ trợ chữa lành vết thương', 90, 400000.00, ''),
(17, 'Thực phẩm bổ sung', 'Glucosamine', 'Bảo vệ sụn khớp, giảm đau khớp, tăng cường dịch khớp, cải thiện vận động, ngăn ngừa thoái hóa khớp, hỗ trợ phục hồi chấn thương, tăng cường linh hoạt khớp', 110, 350000.00, ''),
(18, 'Thực phẩm bổ sung', 'Probiotics', 'Hỗ trợ tiêu hóa, tăng cường miễn dịch, cải thiện hấp thu dinh dưỡng, giảm viêm đường ruột, cải thiện sức khỏe tâm thần, hỗ trợ giảm cân, cải thiện sức khỏe da, giảm dị ứng', 150, 280000.00, ''),
(19, 'Thực phẩm bổ sung', 'Coenzyme Q10', 'Tăng cường năng lượng tế bào, bảo vệ tim mạch, chống oxy hóa, hỗ trợ chức năng gan, cải thiện sức khỏe não bộ, tăng cường sinh lý, hỗ trợ vận động, làm chậm lão hóa', 80, 450000.00, ''),
(20, 'Thực phẩm bổ sung', 'Lutein', 'Bảo vệ mắt, ngăn ngừa thoái hóa điểm vàng, cải thiện thị lực ban đêm, giảm mỏi mắt, bảo vệ võng mạc, chống oxy hóa, tăng cường sức khỏe da, hỗ trợ chức năng nhận thức', 100, 320000.00, ''),
(21, 'Mẹ và bé', 'DHA cho bà bầu', 'Phát triển não bộ thai nhi, tăng cường thị lực cho bé, hỗ trợ phát triển hệ thần kinh, cải thiện khả năng học tập, tăng cường trí nhớ, hỗ trợ phát triển võng mạc, cải thiện khả năng tập trung', 120, 500000.00, ''),
(22, 'Mẹ và bé', 'Sắt cho bà bầu', 'Phòng ngừa thiếu máu thai kỳ, hỗ trợ phát triển thai nhi, tăng cường tạo hồng cầu, cải thiện sức khỏe mẹ, hỗ trợ vận chuyển oxy, tăng cường năng lượng, ngăn ngừa sinh non', 130, 280000.00, ''),
(23, 'Mẹ và bé', 'Canxi cho bà bầu', 'Phát triển xương thai nhi, ngăn ngừa loãng xương cho mẹ, hỗ trợ co cơ tử cung, tăng cường sức khỏe răng, hỗ trợ phát triển thần kinh, cải thiện huyết áp, ngăn ngừa tiền sản giật', 140, 320000.00, ''),
(24, 'Mẹ và bé', 'Vitamin tổng hợp cho bé', 'Bổ sung dinh dưỡng toàn diện cho trẻ, tăng cường miễn dịch, hỗ trợ phát triển não bộ, cải thiện tiêu hóa, tăng cường sức khỏe xương, hỗ trợ tăng trưởng, cải thiện thị lực', 160, 250000.00, ''),
(25, 'Mẹ và bé', 'Men vi sinh cho bé', 'Hỗ trợ tiêu hóa cho trẻ, tăng cường miễn dịch, giảm rối loạn tiêu hóa, cải thiện hấp thu dinh dưỡng, ngăn ngừa táo bón, giảm dị ứng, cải thiện hệ vi sinh đường ruột', 180, 200000.00, ''),
(26, 'Mẹ và bé', 'Vitamin D3 cho bé', 'Phát triển xương cho trẻ, tăng cường hấp thu canxi, hỗ trợ miễn dịch, cải thiện sức khỏe răng, ngăn ngừa còi xương, hỗ trợ phát triển chiều cao, tăng cường sức khỏe tim mạch', 150, 180000.00, ''),
(27, 'Mẹ và bé', 'Kẽm cho bé', 'Tăng cường miễn dịch cho trẻ, hỗ trợ phát triển não bộ, cải thiện tiêu hóa, tăng cường tăng trưởng, hỗ trợ chữa lành vết thương, cải thiện vị giác, tăng cường sức khỏe da', 170, 160000.00, ''),
(28, 'Mẹ và bé', 'Canxi cho bé', 'Phát triển chiều cao cho trẻ, tăng cường xương khớp, cải thiện sức khỏe răng, hỗ trợ co cơ, tăng cường dẫn truyền thần kinh, ngăn ngừa còi xương, hỗ trợ phát triển toàn diện', 140, 220000.00, ''),
(29, 'Mẹ và bé', 'Vitamin C cho bé', 'Tăng sức đề kháng cho trẻ, hỗ trợ hấp thu sắt, tăng cường phát triển xương, cải thiện làn da, hỗ trợ chữa lành vết thương, tăng cường sản xuất collagen, bảo vệ tế bào', 130, 150000.00, ''),
(30, 'Mẹ và bé', 'Sắt cho bé', 'Phòng ngừa thiếu máu ở trẻ, tăng cường tạo hồng cầu, hỗ trợ phát triển não bộ, tăng cường vận chuyển oxy, cải thiện sự tập trung, tăng cường năng lượng, hỗ trợ tăng trưởng', 120, 170000.00, ''),
(31, 'Kháng Chất', 'Selenium', 'Chống oxy hóa mạnh, tăng cường miễn dịch, bảo vệ tế bào, hỗ trợ chức năng tuyến giáp, cải thiện sức khỏe tim mạch, ngăn ngừa lão hóa sớm, hỗ trợ sinh sản, tăng cường sức khỏe tóc', 90, 280000.00, ''),
(32, 'Kháng Chất', 'Beta Carotene', 'Tiền vitamin A tự nhiên, tăng cường thị lực, bảo vệ da, chống oxy hóa, tăng cường miễn dịch, hỗ trợ sinh sản, cải thiện sức khỏe phổi, ngăn ngừa ung thư', 110, 250000.00, ''),
(33, 'Kháng Chất', 'Lycopene', 'Bảo vệ tế bào, ngăn ngừa ung thư tuyến tiền liệt, tăng cường sức khỏe tim mạch, bảo vệ da khỏi tia UV, chống oxy hóa mạnh, cải thiện thị lực, hỗ trợ xương khớp', 130, 300000.00, ''),
(34, 'Kháng Chất', 'Resveratrol', 'Chống lão hóa tự nhiên, bảo vệ tim mạch, chống viêm, cải thiện nhạy cảm insulin, bảo vệ não bộ, tăng cường tuổi thọ tế bào, hỗ trợ giảm cân, cải thiện sức khỏe khớp', 80, 400000.00, ''),
(35, 'Kháng Chất', 'Green Tea Extract', 'Tăng cường trao đổi chất, hỗ trợ giảm cân, chống oxy hóa, cải thiện sức khỏe não bộ, bảo vệ gan, tăng cường miễn dịch, cải thiện sức khỏe tim mạch, giảm stress', 150, 220000.00, ''),
(36, 'Kháng Chất', 'Quercetin', 'Kháng viêm tự nhiên, giảm dị ứng, bảo vệ tim mạch, chống oxy hóa, tăng cường miễn dịch, cải thiện sức khỏe não bộ, hỗ trợ hô hấp, giảm đau khớp', 120, 350000.00, ''),
(37, 'Kháng Chất', 'Astaxanthin', 'Chống oxy hóa cao cấp, bảo vệ da, cải thiện thị lực, tăng cường sức khỏe não bộ, hỗ trợ tim mạch, cải thiện sức bền, giảm mệt mỏi, bảo vệ tế bào', 100, 500000.00, ''),
(38, 'Kháng Chất', 'Curcumin', 'Kháng viêm từ nghệ, chống oxy hóa, hỗ trợ tiêu hóa, bảo vệ gan, cải thiện sức khỏe não bộ, giảm đau khớp, tăng cường miễn dịch, hỗ trợ giảm cân', 140, 320000.00, ''),
(39, 'Kháng Chất', 'Alpha Lipoic Acid', 'Chống oxy hóa đa năng, hỗ trợ chức năng gan, cải thiện đường huyết, bảo vệ thần kinh, giảm viêm, tăng cường năng lượng, hỗ trợ giảm cân, cải thiện trí nhớ', 160, 380000.00, ''),
(40, 'Kháng Chất', 'Grape Seed Extract', 'Bảo vệ mạch máu, chống oxy hóa mạnh, cải thiện tuần hoàn, tăng cường collagen, bảo vệ não bộ, hỗ trợ tim mạch, cải thiện thị lực, ngăn ngừa lão hóa sớm', 130, 290000.00, '');

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
