-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2022 at 11:49 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_animal`
--

-- --------------------------------------------------------

--
-- Table structure for table `ad`
--

CREATE TABLE `ad` (
  `ad_ma` int(11) NOT NULL,
  `ad_hoten` text NOT NULL,
  `ad_sodienthoai` text NOT NULL,
  `ad_matkhau` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ad_ma` int(11) NOT NULL,
  `ad_hoten` text NOT NULL,
  `ad_sodienthoai` text NOT NULL,
  `ad_matkhau` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ad_ma`, `ad_hoten`, `ad_sodienthoai`, `ad_matkhau`) VALUES
(1, 'Nghị', '0365568815', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `baotontheocites`
--

CREATE TABLE `baotontheocites` (
  `bt_ma` int(11) NOT NULL,
  `bt_ten` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `baotontheocites`
--

INSERT INTO `baotontheocites` (`bt_ma`, `bt_ten`) VALUES
(1, 'CITES 1'),
(2, 'Không có trong danh mục'),
(3, 'Phụ lục 2: những loài chưa bị đe dọa nhưng có thể dẫn đến tuyệt chủng.');

-- --------------------------------------------------------

--
-- Table structure for table `baotontheonghidinh`
--

CREATE TABLE `baotontheonghidinh` (
  `bt_ma` int(11) NOT NULL,
  `bt_ten` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `baotontheonghidinh`
--

INSERT INTO `baotontheonghidinh` (`bt_ma`, `bt_ten`) VALUES
(1, 'a'),
(2, 'Không nằm trong danh mục bảo tồn'),
(3, 'Nhóm II: hạn chế khai thác, sử dụng vì mục đích thương mại, gồm những loài thực vật rừng, động vật rừng có giá trị về khoa học, môi trường hoặc có giá trị cao về kinh tế, số luợng quần thể còn ít trong tự nhiên hoặc có nguy cơ tuyệt chủng.');

-- --------------------------------------------------------

--
-- Table structure for table `baotontheouicn`
--

CREATE TABLE `baotontheouicn` (
  `bt_ma` int(11) NOT NULL,
  `bt_ten` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `baotontheouicn`
--

INSERT INTO `baotontheouicn` (`bt_ma`, `bt_ten`) VALUES
(1, 'asdsd'),
(2, 'LC (Least concern)'),
(3, 'Không có giá trị bảo tồn');

-- --------------------------------------------------------

--
-- Table structure for table `baotontheovn`
--

CREATE TABLE `baotontheovn` (
  `bt_ma` int(11) NOT NULL,
  `bt_ten` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `baotontheovn`
--

INSERT INTO `baotontheovn` (`bt_ma`, `bt_ten`) VALUES
(1, 'Bảo Tồn VN 11222'),
(3, 'Bao Ton 4'),
(4, 'Sắp nguy cấp'),
(5, 'Không có giá trị bảo tồn');

-- --------------------------------------------------------

--
-- Table structure for table `binhluan`
--

CREATE TABLE `binhluan` (
  `bl_id` int(11) NOT NULL,
  `bl_noidung` int(11) NOT NULL,
  `bl_user` int(11) NOT NULL,
  `report` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bo`
--

CREATE TABLE `bo` (
  `bo_ma` int(11) NOT NULL,
  `bo_ten` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bo`
--

INSERT INTO `bo` (`bo_ma`, `bo_ten`) VALUES
(1, 'Bộ 1'),
(2, 'GYMNOPHIONA (Muller, 1832)'),
(3, 'SQUAMATA OPPEL, 18411'),
(4, 'ANURA (Fischer, 1813)');

-- --------------------------------------------------------

--
-- Table structure for table `diadiem`
--

CREATE TABLE `diadiem` (
  `dd_ma` int(11) NOT NULL,
  `dd_ten` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diadiem`
--

INSERT INTO `diadiem` (`dd_ma`, `dd_ten`) VALUES
(1, ' Rừng Tràm Mỹ Phước, Mỹ Phước, Mỹ Tú, Sóc Trăng.');

-- --------------------------------------------------------

--
-- Table structure for table `dongvat`
--

CREATE TABLE `dongvat` (
  `dv_ma` int(11) NOT NULL,
  `dv_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `dv_tenkhoahoc` text NOT NULL,
  `dv_tentiengviet` text NOT NULL,
  `dv_tendiaphuong` text NOT NULL,
  `dv_gioi` int(11) NOT NULL,
  `dv_nganh` int(11) NOT NULL,
  `dv_lop` int(11) NOT NULL,
  `dv_bo` int(11) NOT NULL,
  `dv_ho` int(11) NOT NULL,
  `dv_dacdiemhinhthai` text NOT NULL,
  `dv_dacdiemsinhthai` text NOT NULL,
  `dv_giatrisudung` text NOT NULL,
  `dv_baotontheoUICN` int(11) NOT NULL,
  `dv_baotontheoVN` int(11) NOT NULL,
  `dv_baotontheoNGHIDINH` int(11) NOT NULL,
  `dv_baotontheoCITES` int(11) NOT NULL,
  `dv_phanbo` int(11) NOT NULL,
  `dv_tinhtrangmauvat` int(11) NOT NULL,
  `dv_ngaythumau` date NOT NULL,
  `dv_nguoithumau` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dongvat`
--

INSERT INTO `dongvat` (`dv_ma`, `dv_timestamp`, `dv_tenkhoahoc`, `dv_tentiengviet`, `dv_tendiaphuong`, `dv_gioi`, `dv_nganh`, `dv_lop`, `dv_bo`, `dv_ho`, `dv_dacdiemhinhthai`, `dv_dacdiemsinhthai`, `dv_giatrisudung`, `dv_baotontheoUICN`, `dv_baotontheoVN`, `dv_baotontheoNGHIDINH`, `dv_baotontheoCITES`, `dv_phanbo`, `dv_tinhtrangmauvat`, `dv_ngaythumau`, `dv_nguoithumau`) VALUES
(1, '2022-04-24 21:08:55', 'Ichthyophis nguyenorum Nishikawa, Matsui, and Orlov, 2012', 'Ếch giun nguyễn', 'Rắn trun đĩa', 3, 3, 4, 2, 12, 'Đặc điểm chẩn loại: cơ thể tròn, dẹt mặt bụng; chóp đuôi cùn, không có dạng mũ; không có đốm màu vàng mặt bụng; đầu rộng nhất ở góc mép miệng, hẹp dần về trước; mút mõm tròn; lỗ mũi nằm gần bờ trước mép miệng; số vòng quanh thân: 312 – 318; sọc vàng rộng chạy liên tục từ sau mắt đến huyệt (Nishikawa et al.,2012). \r\n        Đặc điểm hình thái: SVL 201,3 mm. Dài đuôi: 2,6 – 3,5; rộng đuôi: 2,8 – 3,5. Rộng đầu (HW: 6,6). Dài đầu hơn rộng đầu (HL/HW: 1,25-1,47). Cơ thể hơi tròn, dài, dạng rắn. Đầu dẹp, láng; rộng nhất ở mép miệng, hẹo về phía đầu. Mút mõm tròn; dài mõm bằng với ngang đầu ở vị trí mắt. Mắt nhỏ, không mi mắt, có một đôi râu (tentacle) ngắn nằm phía trước mắt. Hai bên thân có sọc  màu vàng bắt đầu từ sau mép miệng đến lỗ huyệt. Số nếp gấp quanh thân: 280 – 300; ở đuôi: 7-8. Đuôi ngắn hơi dẹt ở mặt bụng, phần đỉnh cùn, không có đốm màu cam hay vàng  ở mặt bụng. Mặt lưng có màu tím đen, bụng màu hoa cà nhạt, hai bên sườn có sọc màu vàng liên tục, không đứt quãng, chạy từ khoảng giữa hàm trên (mấu xúc - tu) đến gần mút đuôi. Mắt có viền mỏng màu trắng đục.\r\n        Ghi chú:  Loài Ichthyophis bannanicus phân biệt với Ichthyophis nguyenorum dựa trên các đặc điểm: số nếp vòng quanh cơ thể của I. nguyenorum (312 – 318) ít hơn so với I. bannanicus (340); sọc bên thân của I. nguyenorum kéo dài đến mút đuôi so với sọc bị đứt quãng ở phía sau đuôi của I. bannanicus Nishikawa et al. (2012).', 'Sống ở các vực nước (ao, vũng...) có nhiều bùn và lá mục, hay các khu vực đất nông nghiệp. Thức ăn gồm côn trùng, giun đất, nhện và những loài không xương sống nhỏ khác.', 'Chưa xác định', 2, 4, 2, 2, 2, 2, '0000-00-00', 0),
(2, '2022-04-24 21:12:01', 'Duttaphrynus melanostictus (Schneider, 1799)', 'Cóc nhà', 'Cóc', 3, 3, 4, 4, 3, 'Đặc điểm chẩn loại: Kích thước cơ thể trung bình, mắt khỏe; phía trên ổ mắt, phía sau ổ mắt, phía trên màng nhĩ và phía trước mắt có nhiều gai nhọn; mõm nhọn, tuyến mang tai lớn, có chều dài hơn chiều rộng; cơ thể có nhiều nốt sần lớn và nhỏ; ngón tay thứ I dài hơn ngón tay thứ II; khớp cổ chân chạm giữa tuyến mang tai khi xếp dọc theo thân', 'Duttaphrynus melanostictus là loài phổ biến, được bắt gặp trên sinh cảnh rừng tràm đặc dụng, rừng tràm khai thác; phân bố rộng khắp khu vực khảo sát .Là loài hoạt động về đêm, kiếm mồi trên nền rừng và trú ngụ trong các hốc cây. Đầu mùa mưa thường tập trung ở các vũng nước đọng trong khu vực và các con đực gọi bạn tình suốt từ tối đến khoảng 8 giờ sáng.', 'Làm thực phẩm', 3, 5, 2, 2, 2, 2, '0000-00-00', 0),
(3, '2022-04-24 21:14:54', 'Kaloula pulchra Gray, 1831', 'ỄN ương', 'Ễn ương', 3, 3, 4, 4, 4, 'Đặc điểm chẩn loại: Ngón chi dẹp và đầu ngón tay mở rộng; toàn bộ mặt lưng màu nâu với 2 dãy màu vàng sáng hoặc vàng nâu chạy dọc từ giữa 2 mắt qua phía trên mắt và kéo dai đến háng; trên ngón có vết tích của màng bơi.\r\nĐặc điểm hình thái: Kích thước trung bình (SVL: 80.3). Cơ thể có hình tam giác khi nhìn từ bên trên, đầu ngắn so với chiều dài thân (HL/SVL: 0,24); chiều dài đầu nhỏ hơn chiều rộng đầu (HL/HW: 0,74); khóe mắt nhỏ; vùng má xiên và hướng lên; mũi tù và ngắn, lỗ mũi nằm gần chóp mỏ và hướng sang 2 bên; khoảng cách giữa hai lỗ mũi tương đương mí mắt trên; màng nhĩ không rõ ràng; nếp gấp mờ vòng qua chẩm đến sau mắt và kết thúc ở ngay trước cánh tay.\r\nDa trơn láng với các nốt sần rải rác trên lưng, nhiều nhất ở phần dưới của mặt lưng, phía sau đùi và một số trên cánh tay. Mặt lưng màu nâu sẫm. Hai dảy màu vàng sáng được bao bọc bởi viền màu nâu đậm hoặc đen bắt đầu từ giữa hai mắt và kéo dài đến háng; hai dảy màu liền nhau ở giữa 2 mắt, hẹp ở sau mắt và nở rộng trên mặt lưng. Một số cá thể giữa lưng có vệt đen hoặc nâu sậm kéo dài từ giữa 2 mắt đến tận xương cụt. Các nốt sần trên lưng có màu tương tự màu của hai dảy màu trên lưng. Trên các chi có màu không đều, các mảng nhỏ màu vàng sáng không đều xen lẫn trên nền màu nâu sẫm; một vệt màu sáng không liên tục phía trên mặt lưng của ống chân sau. Mặt bụng màu trắng sáng với các hoa văn xám dạng khói, phần da trên cổ họng màu đậm hơn trên bụng.\r\nCánh tay hơi dài; ngón tay dài và có vết tích của màng bơi; to dần từ gốc ngón đến đầu ngón, đĩa ngón rộng theo chiều ngang. Ngón thứ nhất ngắn hơn ngón thứ 2; củ bàn vừa phải; có 3 củ bàn, củ bàn ngoài dài, củ bàn giữa nhỏ nhất, bàn tay trơn và không có nốt sần phụ. Thứ tự chiều dài tương đối của các ngón tay: III>IV>II>I.\r\nChân ngắn, chỉ 1/3 xương đùi tự do; cổ chân chạm đến nách khi xếp song song với trục cơ thể. Hai gót chân không chạm nhau khi gập gối và xếp vuông góc trục cơ thể. Bàn chân dài hơn bàn tay nhưng các ngón chân mảnh khảnh hơn; đĩa ngón chân nhỏ tròn, không rộng theo chiều ngang như đĩa ngón tay; ngón chân có vết tích của màng bơi. Có 2 củ bàn chân; củ bàn chân trong dài, nhô cao, cạnh không rõ ràng; củ bàn chân ngoài nhỏ tròn. Thứ tự chiều dài tương đối các ngón chân: IV>III>V>II>I.', 'Một mẫu cái duy nhất của loài này được tìm thấy trên nền rừng trong khu vực rừng tràm Mỹ Phước khai thác vào mùa mưa (tháng 7). Là loài hoạt động về đêm, thường ẩn nấp trong các hốc cây, hoặc bên dưới lớp lá mục trong mùa khô. Thường ra ngoài kiếm ăn khi độ ẩm không khí cao hoặc sau cơn mưa. Sinh sản vào mùa mưa, con đực thường phát tiếng kêu đặc trưng khi đang ngâm mình trên mặt nước (Kalamadi et al. 2002).\r\nGhi chú: qua phỏng vấn, người dân sinh sống xung quanh khu vực nghiên cứu cho biết trước đây chưa từng tìm thấy loài này trong tự nhiên.', 'Chưa xác định', 3, 5, 2, 2, 3, 2, '0000-00-00', 0),
(5, '2022-04-24 21:16:42', 'Hylarana erythraea (Schlegel, 1837)', 'Chàng xanh', 'Bù tọt', 3, 3, 4, 4, 4, 'Đặc điểm chẩn loại: Ngón chi dẹp và đầu ngón tay mở rộng; toàn bộ mặt lưng màu nâu với 2 dãy màu vàng sáng hoặc vàng nâu chạy dọc từ giữa 2 mắt qua phía trên mắt và kéo dai đến háng; trên ngón có vết tích của màng bơi.\r\nĐặc điểm hình thái: Kích thước trung bình (SVL: 80.3). Cơ thể có hình tam giác khi nhìn từ bên trên, đầu ngắn so với chiều dài thân (HL/SVL: 0,24); chiều dài đầu nhỏ hơn chiều rộng đầu (HL/HW: 0,74); khóe mắt nhỏ; vùng má xiên và hướng lên; mũi tù và ngắn, lỗ mũi nằm gần chóp mỏ và hướng sang 2 bên; khoảng cách giữa hai lỗ mũi tương đương mí mắt trên; màng nhĩ không rõ ràng; nếp gấp mờ vòng qua chẩm đến sau mắt và kết thúc ở ngay trước cánh tay.\r\nDa trơn láng với các nốt sần rải rác trên lưng, nhiều nhất ở phần dưới của mặt lưng, phía sau đùi và một số trên cánh tay. Mặt lưng màu nâu sẫm. Hai dảy màu vàng sáng được bao bọc bởi viền màu nâu đậm hoặc đen bắt đầu từ giữa hai mắt và kéo dài đến háng; hai dảy màu liền nhau ở giữa 2 mắt, hẹp ở sau mắt và nở rộng trên mặt lưng. Một số cá thể giữa lưng có vệt đen hoặc nâu sậm kéo dài từ giữa 2 mắt đến tận xương cụt. Các nốt sần trên lưng có màu tương tự màu của hai dảy màu trên lưng. Trên các chi có màu không đều, các mảng nhỏ màu vàng sáng không đều xen lẫn trên nền màu nâu sẫm; một vệt màu sáng không liên tục phía trên mặt lưng của ống chân sau. Mặt bụng màu trắng sáng với các hoa văn xám dạng khói, phần da trên cổ họng màu đậm hơn trên bụng.\r\nCánh tay hơi dài; ngón tay dài và có vết tích của màng bơi; to dần từ gốc ngón đến đầu ngón, đĩa ngón rộng theo chiều ngang. Ngón thứ nhất ngắn hơn ngón thứ 2; củ bàn vừa phải; có 3 củ bàn, củ bàn ngoài dài, củ bàn giữa nhỏ nhất, bàn tay trơn và không có nốt sần phụ. Thứ tự chiều dài tương đối của các ngón tay: III>IV>II>I.\r\nChân ngắn, chỉ 1/3 xương đùi tự do; cổ chân chạm đến nách khi xếp song song với trục cơ thể. Hai gót chân không chạm nhau khi gập gối và xếp vuông góc trục cơ thể. Bàn chân dài hơn bàn tay nhưng các ngón chân mảnh khảnh hơn; đĩa ngón chân nhỏ tròn, không rộng theo chiều ngang như đĩa ngón tay; ngón chân có vết tích của màng bơi. Có 2 củ bàn chân; củ bàn chân trong dài, nhô cao, cạnh không rõ ràng; củ bàn chân ngoài nhỏ tròn. Thứ tự chiều dài tương đối các ngón chân: IV>III>V>II>I.', 'Một mẫu cái duy nhất của loài này được tìm thấy trên nền rừng trong khu vực rừng tràm Mỹ Phước khai thác vào mùa mưa (tháng 7). Là loài hoạt động về đêm, thường ẩn nấp trong các hốc cây, hoặc bên dưới lớp lá mục trong mùa khô. Thường ra ngoài kiếm ăn khi độ ẩm không khí cao hoặc sau cơn mưa. Sinh sản vào mùa mưa, con đực thường phát tiếng kêu đặc trưng khi đang ngâm mình trên mặt nước (Kalamadi et al. 2002).\r\nGhi chú: qua phỏng vấn, người dân sinh sống xung quanh khu vực nghiên cứu cho biết trước đây chưa từng tìm thấy loài này trong tự nhiên.', 'Chưa xác định', 3, 5, 2, 2, 3, 2, '0000-00-00', 0),
(7, '2022-04-24 21:18:12', 'Calotes versicolor (Daudin, 1802)', 'Nhông xanh, Nhông hàng rào, Kì nhông', 'Kì nhông', 3, 3, 4, 4, 4, 'Đặc điểm chẩn loại: Ngón chi dẹp và đầu ngón tay mở rộng; toàn bộ mặt lưng màu nâu với 2 dãy màu vàng sáng hoặc vàng nâu chạy dọc từ giữa 2 mắt qua phía trên mắt và kéo dai đến háng; trên ngón có vết tích của màng bơi.\r\nĐặc điểm hình thái: Kích thước trung bình (SVL: 80.3). Cơ thể có hình tam giác khi nhìn từ bên trên, đầu ngắn so với chiều dài thân (HL/SVL: 0,24); chiều dài đầu nhỏ hơn chiều rộng đầu (HL/HW: 0,74); khóe mắt nhỏ; vùng má xiên và hướng lên; mũi tù và ngắn, lỗ mũi nằm gần chóp mỏ và hướng sang 2 bên; khoảng cách giữa hai lỗ mũi tương đương mí mắt trên; màng nhĩ không rõ ràng; nếp gấp mờ vòng qua chẩm đến sau mắt và kết thúc ở ngay trước cánh tay.\r\nDa trơn láng với các nốt sần rải rác trên lưng, nhiều nhất ở phần dưới của mặt lưng, phía sau đùi và một số trên cánh tay. Mặt lưng màu nâu sẫm. Hai dảy màu vàng sáng được bao bọc bởi viền màu nâu đậm hoặc đen bắt đầu từ giữa hai mắt và kéo dài đến háng; hai dảy màu liền nhau ở giữa 2 mắt, hẹp ở sau mắt và nở rộng trên mặt lưng. Một số cá thể giữa lưng có vệt đen hoặc nâu sậm kéo dài từ giữa 2 mắt đến tận xương cụt. Các nốt sần trên lưng có màu tương tự màu của hai dảy màu trên lưng. Trên các chi có màu không đều, các mảng nhỏ màu vàng sáng không đều xen lẫn trên nền màu nâu sẫm; một vệt màu sáng không liên tục phía trên mặt lưng của ống chân sau. Mặt bụng màu trắng sáng với các hoa văn xám dạng khói, phần da trên cổ họng màu đậm hơn trên bụng.\r\nCánh tay hơi dài; ngón tay dài và có vết tích của màng bơi; to dần từ gốc ngón đến đầu ngón, đĩa ngón rộng theo chiều ngang. Ngón thứ nhất ngắn hơn ngón thứ 2; củ bàn vừa phải; có 3 củ bàn, củ bàn ngoài dài, củ bàn giữa nhỏ nhất, bàn tay trơn và không có nốt sần phụ. Thứ tự chiều dài tương đối của các ngón tay: III>IV>II>I.\r\nChân ngắn, chỉ 1/3 xương đùi tự do; cổ chân chạm đến nách khi xếp song song với trục cơ thể. Hai gót chân không chạm nhau khi gập gối và xếp vuông góc trục cơ thể. Bàn chân dài hơn bàn tay nhưng các ngón chân mảnh khảnh hơn; đĩa ngón chân nhỏ tròn, không rộng theo chiều ngang như đĩa ngón tay; ngón chân có vết tích của màng bơi. Có 2 củ bàn chân; củ bàn chân trong dài, nhô cao, cạnh không rõ ràng; củ bàn chân ngoài nhỏ tròn. Thứ tự chiều dài tương đối các ngón chân: IV>III>V>II>I.', 'Một mẫu cái duy nhất của loài này được tìm thấy trên nền rừng trong khu vực rừng tràm Mỹ Phước khai thác vào mùa mưa (tháng 7). Là loài hoạt động về đêm, thường ẩn nấp trong các hốc cây, hoặc bên dưới lớp lá mục trong mùa khô. Thường ra ngoài kiếm ăn khi độ ẩm không khí cao hoặc sau cơn mưa. Sinh sản vào mùa mưa, con đực thường phát tiếng kêu đặc trưng khi đang ngâm mình trên mặt nước (Kalamadi et al. 2002).\r\nGhi chú: qua phỏng vấn, người dân sinh sống xung quanh khu vực nghiên cứu cho biết trước đây chưa từng tìm thấy loài này trong tự nhiên.', 'Chưa xác định', 3, 5, 2, 2, 3, 2, '0000-00-00', 0),
(9, '2022-04-24 21:14:54', 'Gehyra multilata (Weigmann,1835)', 'Thằn lằn 4 móng', 'Thằn lằn nhà', 3, 3, 4, 4, 4, 'Đặc điểm chẩn loại: Ngón chi dẹp và đầu ngón tay mở rộng; toàn bộ mặt lưng màu nâu với 2 dãy màu vàng sáng hoặc vàng nâu chạy dọc từ giữa 2 mắt qua phía trên mắt và kéo dai đến háng; trên ngón có vết tích của màng bơi.\r\nĐặc điểm hình thái: Kích thước trung bình (SVL: 80.3). Cơ thể có hình tam giác khi nhìn từ bên trên, đầu ngắn so với chiều dài thân (HL/SVL: 0,24); chiều dài đầu nhỏ hơn chiều rộng đầu (HL/HW: 0,74); khóe mắt nhỏ; vùng má xiên và hướng lên; mũi tù và ngắn, lỗ mũi nằm gần chóp mỏ và hướng sang 2 bên; khoảng cách giữa hai lỗ mũi tương đương mí mắt trên; màng nhĩ không rõ ràng; nếp gấp mờ vòng qua chẩm đến sau mắt và kết thúc ở ngay trước cánh tay.\r\nDa trơn láng với các nốt sần rải rác trên lưng, nhiều nhất ở phần dưới của mặt lưng, phía sau đùi và một số trên cánh tay. Mặt lưng màu nâu sẫm. Hai dảy màu vàng sáng được bao bọc bởi viền màu nâu đậm hoặc đen bắt đầu từ giữa hai mắt và kéo dài đến háng; hai dảy màu liền nhau ở giữa 2 mắt, hẹp ở sau mắt và nở rộng trên mặt lưng. Một số cá thể giữa lưng có vệt đen hoặc nâu sậm kéo dài từ giữa 2 mắt đến tận xương cụt. Các nốt sần trên lưng có màu tương tự màu của hai dảy màu trên lưng. Trên các chi có màu không đều, các mảng nhỏ màu vàng sáng không đều xen lẫn trên nền màu nâu sẫm; một vệt màu sáng không liên tục phía trên mặt lưng của ống chân sau. Mặt bụng màu trắng sáng với các hoa văn xám dạng khói, phần da trên cổ họng màu đậm hơn trên bụng.\r\nCánh tay hơi dài; ngón tay dài và có vết tích của màng bơi; to dần từ gốc ngón đến đầu ngón, đĩa ngón rộng theo chiều ngang. Ngón thứ nhất ngắn hơn ngón thứ 2; củ bàn vừa phải; có 3 củ bàn, củ bàn ngoài dài, củ bàn giữa nhỏ nhất, bàn tay trơn và không có nốt sần phụ. Thứ tự chiều dài tương đối của các ngón tay: III>IV>II>I.\r\nChân ngắn, chỉ 1/3 xương đùi tự do; cổ chân chạm đến nách khi xếp song song với trục cơ thể. Hai gót chân không chạm nhau khi gập gối và xếp vuông góc trục cơ thể. Bàn chân dài hơn bàn tay nhưng các ngón chân mảnh khảnh hơn; đĩa ngón chân nhỏ tròn, không rộng theo chiều ngang như đĩa ngón tay; ngón chân có vết tích của màng bơi. Có 2 củ bàn chân; củ bàn chân trong dài, nhô cao, cạnh không rõ ràng; củ bàn chân ngoài nhỏ tròn. Thứ tự chiều dài tương đối các ngón chân: IV>III>V>II>I.', 'Một mẫu cái duy nhất của loài này được tìm thấy trên nền rừng trong khu vực rừng tràm Mỹ Phước khai thác vào mùa mưa (tháng 7). Là loài hoạt động về đêm, thường ẩn nấp trong các hốc cây, hoặc bên dưới lớp lá mục trong mùa khô. Thường ra ngoài kiếm ăn khi độ ẩm không khí cao hoặc sau cơn mưa. Sinh sản vào mùa mưa, con đực thường phát tiếng kêu đặc trưng khi đang ngâm mình trên mặt nước (Kalamadi et al. 2002).\r\nGhi chú: qua phỏng vấn, người dân sinh sống xung quanh khu vực nghiên cứu cho biết trước đây chưa từng tìm thấy loài này trong tự nhiên.', 'Chưa xác định', 3, 5, 2, 2, 3, 2, '0000-00-00', 0),
(10, '2022-04-24 21:12:01', 'Hemidactylus garnotii (Conant and Collins, 1991)', 'Thạch sùng garnot', 'Thằn lằn', 3, 3, 4, 4, 3, 'Đặc điểm chẩn loại: Kích thước cơ thể trung bình, mắt khỏe; phía trên ổ mắt, phía sau ổ mắt, phía trên màng nhĩ và phía trước mắt có nhiều gai nhọn; mõm nhọn, tuyến mang tai lớn, có chều dài hơn chiều rộng; cơ thể có nhiều nốt sần lớn và nhỏ; ngón tay thứ I dài hơn ngón tay thứ II; khớp cổ chân chạm giữa tuyến mang tai khi xếp dọc theo thân', 'Duttaphrynus melanostictus là loài phổ biến, được bắt gặp trên sinh cảnh rừng tràm đặc dụng, rừng tràm khai thác; phân bố rộng khắp khu vực khảo sát .Là loài hoạt động về đêm, kiếm mồi trên nền rừng và trú ngụ trong các hốc cây. Đầu mùa mưa thường tập trung ở các vũng nước đọng trong khu vực và các con đực gọi bạn tình suốt từ tối đến khoảng 8 giờ sáng.', 'Làm thực phẩm', 3, 5, 2, 2, 2, 2, '0000-00-00', 0),
(11, '2022-04-24 21:18:12', 'Hemidactylus frenatus Schlegel in Duméril & Bibron, 1836', 'Thạch sùng đuôi sần', 'Thạch sùng', 3, 3, 4, 4, 4, 'Đặc điểm chẩn loại: Ngón chi dẹp và đầu ngón tay mở rộng; toàn bộ mặt lưng màu nâu với 2 dãy màu vàng sáng hoặc vàng nâu chạy dọc từ giữa 2 mắt qua phía trên mắt và kéo dai đến háng; trên ngón có vết tích của màng bơi.\r\nĐặc điểm hình thái: Kích thước trung bình (SVL: 80.3). Cơ thể có hình tam giác khi nhìn từ bên trên, đầu ngắn so với chiều dài thân (HL/SVL: 0,24); chiều dài đầu nhỏ hơn chiều rộng đầu (HL/HW: 0,74); khóe mắt nhỏ; vùng má xiên và hướng lên; mũi tù và ngắn, lỗ mũi nằm gần chóp mỏ và hướng sang 2 bên; khoảng cách giữa hai lỗ mũi tương đương mí mắt trên; màng nhĩ không rõ ràng; nếp gấp mờ vòng qua chẩm đến sau mắt và kết thúc ở ngay trước cánh tay.\r\nDa trơn láng với các nốt sần rải rác trên lưng, nhiều nhất ở phần dưới của mặt lưng, phía sau đùi và một số trên cánh tay. Mặt lưng màu nâu sẫm. Hai dảy màu vàng sáng được bao bọc bởi viền màu nâu đậm hoặc đen bắt đầu từ giữa hai mắt và kéo dài đến háng; hai dảy màu liền nhau ở giữa 2 mắt, hẹp ở sau mắt và nở rộng trên mặt lưng. Một số cá thể giữa lưng có vệt đen hoặc nâu sậm kéo dài từ giữa 2 mắt đến tận xương cụt. Các nốt sần trên lưng có màu tương tự màu của hai dảy màu trên lưng. Trên các chi có màu không đều, các mảng nhỏ màu vàng sáng không đều xen lẫn trên nền màu nâu sẫm; một vệt màu sáng không liên tục phía trên mặt lưng của ống chân sau. Mặt bụng màu trắng sáng với các hoa văn xám dạng khói, phần da trên cổ họng màu đậm hơn trên bụng.\r\nCánh tay hơi dài; ngón tay dài và có vết tích của màng bơi; to dần từ gốc ngón đến đầu ngón, đĩa ngón rộng theo chiều ngang. Ngón thứ nhất ngắn hơn ngón thứ 2; củ bàn vừa phải; có 3 củ bàn, củ bàn ngoài dài, củ bàn giữa nhỏ nhất, bàn tay trơn và không có nốt sần phụ. Thứ tự chiều dài tương đối của các ngón tay: III>IV>II>I.\r\nChân ngắn, chỉ 1/3 xương đùi tự do; cổ chân chạm đến nách khi xếp song song với trục cơ thể. Hai gót chân không chạm nhau khi gập gối và xếp vuông góc trục cơ thể. Bàn chân dài hơn bàn tay nhưng các ngón chân mảnh khảnh hơn; đĩa ngón chân nhỏ tròn, không rộng theo chiều ngang như đĩa ngón tay; ngón chân có vết tích của màng bơi. Có 2 củ bàn chân; củ bàn chân trong dài, nhô cao, cạnh không rõ ràng; củ bàn chân ngoài nhỏ tròn. Thứ tự chiều dài tương đối các ngón chân: IV>III>V>II>I.', 'Một mẫu cái duy nhất của loài này được tìm thấy trên nền rừng trong khu vực rừng tràm Mỹ Phước khai thác vào mùa mưa (tháng 7). Là loài hoạt động về đêm, thường ẩn nấp trong các hốc cây, hoặc bên dưới lớp lá mục trong mùa khô. Thường ra ngoài kiếm ăn khi độ ẩm không khí cao hoặc sau cơn mưa. Sinh sản vào mùa mưa, con đực thường phát tiếng kêu đặc trưng khi đang ngâm mình trên mặt nước (Kalamadi et al. 2002).\r\nGhi chú: qua phỏng vấn, người dân sinh sống xung quanh khu vực nghiên cứu cho biết trước đây chưa từng tìm thấy loài này trong tự nhiên.', 'Chưa xác định', 3, 5, 2, 2, 3, 2, '0000-00-00', 0),
(12, '2022-04-24 21:08:55', 'Fejervarya limnocharis (Gravenhorst, 1829)', 'Nhái Ngóe', 'Nhái ', 3, 3, 4, 2, 12, 'Đặc điểm chẩn loại: cơ thể tròn, dẹt mặt bụng; chóp đuôi cùn, không có dạng mũ; không có đốm màu vàng mặt bụng; đầu rộng nhất ở góc mép miệng, hẹp dần về trước; mút mõm tròn; lỗ mũi nằm gần bờ trước mép miệng; số vòng quanh thân: 312 – 318; sọc vàng rộng chạy liên tục từ sau mắt đến huyệt (Nishikawa et al.,2012). \r\n        Đặc điểm hình thái: SVL 201,3 mm. Dài đuôi: 2,6 – 3,5; rộng đuôi: 2,8 – 3,5. Rộng đầu (HW: 6,6). Dài đầu hơn rộng đầu (HL/HW: 1,25-1,47). Cơ thể hơi tròn, dài, dạng rắn. Đầu dẹp, láng; rộng nhất ở mép miệng, hẹo về phía đầu. Mút mõm tròn; dài mõm bằng với ngang đầu ở vị trí mắt. Mắt nhỏ, không mi mắt, có một đôi râu (tentacle) ngắn nằm phía trước mắt. Hai bên thân có sọc  màu vàng bắt đầu từ sau mép miệng đến lỗ huyệt. Số nếp gấp quanh thân: 280 – 300; ở đuôi: 7-8. Đuôi ngắn hơi dẹt ở mặt bụng, phần đỉnh cùn, không có đốm màu cam hay vàng  ở mặt bụng. Mặt lưng có màu tím đen, bụng màu hoa cà nhạt, hai bên sườn có sọc màu vàng liên tục, không đứt quãng, chạy từ khoảng giữa hàm trên (mấu xúc - tu) đến gần mút đuôi. Mắt có viền mỏng màu trắng đục.\r\n        Ghi chú:  Loài Ichthyophis bannanicus phân biệt với Ichthyophis nguyenorum dựa trên các đặc điểm: số nếp vòng quanh cơ thể của I. nguyenorum (312 – 318) ít hơn so với I. bannanicus (340); sọc bên thân của I. nguyenorum kéo dài đến mút đuôi so với sọc bị đứt quãng ở phía sau đuôi của I. bannanicus Nishikawa et al. (2012).', 'Sống ở các vực nước (ao, vũng...) có nhiều bùn và lá mục, hay các khu vực đất nông nghiệp. Thức ăn gồm côn trùng, giun đất, nhện và những loài không xương sống nhỏ khác.', 'Chưa xác định', 2, 4, 2, 2, 2, 2, '0000-00-00', 0),
(13, '2022-04-24 21:12:01', 'Fejervarya sp.', 'Nhái cơm', 'Nhái cơm', 3, 3, 4, 4, 3, 'Đặc điểm chẩn loại: Kích thước cơ thể trung bình, mắt khỏe; phía trên ổ mắt, phía sau ổ mắt, phía trên màng nhĩ và phía trước mắt có nhiều gai nhọn; mõm nhọn, tuyến mang tai lớn, có chều dài hơn chiều rộng; cơ thể có nhiều nốt sần lớn và nhỏ; ngón tay thứ I dài hơn ngón tay thứ II; khớp cổ chân chạm giữa tuyến mang tai khi xếp dọc theo thân', 'Duttaphrynus melanostictus là loài phổ biến, được bắt gặp trên sinh cảnh rừng tràm đặc dụng, rừng tràm khai thác; phân bố rộng khắp khu vực khảo sát .Là loài hoạt động về đêm, kiếm mồi trên nền rừng và trú ngụ trong các hốc cây. Đầu mùa mưa thường tập trung ở các vũng nước đọng trong khu vực và các con đực gọi bạn tình suốt từ tối đến khoảng 8 giờ sáng.', 'Làm thực phẩm', 3, 5, 2, 2, 2, 2, '0000-00-00', 0),
(14, '2022-04-24 21:14:54', 'Occidozyga lima (Gravenhorst, 1829)', 'Cóc nước sần', 'Nhái bầu', 3, 3, 4, 4, 4, 'Đặc điểm chẩn loại: Ngón chi dẹp và đầu ngón tay mở rộng; toàn bộ mặt lưng màu nâu với 2 dãy màu vàng sáng hoặc vàng nâu chạy dọc từ giữa 2 mắt qua phía trên mắt và kéo dai đến háng; trên ngón có vết tích của màng bơi.\r\nĐặc điểm hình thái: Kích thước trung bình (SVL: 80.3). Cơ thể có hình tam giác khi nhìn từ bên trên, đầu ngắn so với chiều dài thân (HL/SVL: 0,24); chiều dài đầu nhỏ hơn chiều rộng đầu (HL/HW: 0,74); khóe mắt nhỏ; vùng má xiên và hướng lên; mũi tù và ngắn, lỗ mũi nằm gần chóp mỏ và hướng sang 2 bên; khoảng cách giữa hai lỗ mũi tương đương mí mắt trên; màng nhĩ không rõ ràng; nếp gấp mờ vòng qua chẩm đến sau mắt và kết thúc ở ngay trước cánh tay.\r\nDa trơn láng với các nốt sần rải rác trên lưng, nhiều nhất ở phần dưới của mặt lưng, phía sau đùi và một số trên cánh tay. Mặt lưng màu nâu sẫm. Hai dảy màu vàng sáng được bao bọc bởi viền màu nâu đậm hoặc đen bắt đầu từ giữa hai mắt và kéo dài đến háng; hai dảy màu liền nhau ở giữa 2 mắt, hẹp ở sau mắt và nở rộng trên mặt lưng. Một số cá thể giữa lưng có vệt đen hoặc nâu sậm kéo dài từ giữa 2 mắt đến tận xương cụt. Các nốt sần trên lưng có màu tương tự màu của hai dảy màu trên lưng. Trên các chi có màu không đều, các mảng nhỏ màu vàng sáng không đều xen lẫn trên nền màu nâu sẫm; một vệt màu sáng không liên tục phía trên mặt lưng của ống chân sau. Mặt bụng màu trắng sáng với các hoa văn xám dạng khói, phần da trên cổ họng màu đậm hơn trên bụng.\r\nCánh tay hơi dài; ngón tay dài và có vết tích của màng bơi; to dần từ gốc ngón đến đầu ngón, đĩa ngón rộng theo chiều ngang. Ngón thứ nhất ngắn hơn ngón thứ 2; củ bàn vừa phải; có 3 củ bàn, củ bàn ngoài dài, củ bàn giữa nhỏ nhất, bàn tay trơn và không có nốt sần phụ. Thứ tự chiều dài tương đối của các ngón tay: III>IV>II>I.\r\nChân ngắn, chỉ 1/3 xương đùi tự do; cổ chân chạm đến nách khi xếp song song với trục cơ thể. Hai gót chân không chạm nhau khi gập gối và xếp vuông góc trục cơ thể. Bàn chân dài hơn bàn tay nhưng các ngón chân mảnh khảnh hơn; đĩa ngón chân nhỏ tròn, không rộng theo chiều ngang như đĩa ngón tay; ngón chân có vết tích của màng bơi. Có 2 củ bàn chân; củ bàn chân trong dài, nhô cao, cạnh không rõ ràng; củ bàn chân ngoài nhỏ tròn. Thứ tự chiều dài tương đối các ngón chân: IV>III>V>II>I.', 'Một mẫu cái duy nhất của loài này được tìm thấy trên nền rừng trong khu vực rừng tràm Mỹ Phước khai thác vào mùa mưa (tháng 7). Là loài hoạt động về đêm, thường ẩn nấp trong các hốc cây, hoặc bên dưới lớp lá mục trong mùa khô. Thường ra ngoài kiếm ăn khi độ ẩm không khí cao hoặc sau cơn mưa. Sinh sản vào mùa mưa, con đực thường phát tiếng kêu đặc trưng khi đang ngâm mình trên mặt nước (Kalamadi et al. 2002).\r\nGhi chú: qua phỏng vấn, người dân sinh sống xung quanh khu vực nghiên cứu cho biết trước đây chưa từng tìm thấy loài này trong tự nhiên.', 'Chưa xác định', 3, 5, 2, 2, 3, 2, '0000-00-00', 0),
(15, '2022-04-24 21:18:12', 'Occidozyga martensii (Peters, 1867)', 'Cóc nước marten', 'Nhái nhớt', 3, 3, 4, 4, 4, 'Đặc điểm chẩn loại: Ngón chi dẹp và đầu ngón tay mở rộng; toàn bộ mặt lưng màu nâu với 2 dãy màu vàng sáng hoặc vàng nâu chạy dọc từ giữa 2 mắt qua phía trên mắt và kéo dai đến háng; trên ngón có vết tích của màng bơi.\r\nĐặc điểm hình thái: Kích thước trung bình (SVL: 80.3). Cơ thể có hình tam giác khi nhìn từ bên trên, đầu ngắn so với chiều dài thân (HL/SVL: 0,24); chiều dài đầu nhỏ hơn chiều rộng đầu (HL/HW: 0,74); khóe mắt nhỏ; vùng má xiên và hướng lên; mũi tù và ngắn, lỗ mũi nằm gần chóp mỏ và hướng sang 2 bên; khoảng cách giữa hai lỗ mũi tương đương mí mắt trên; màng nhĩ không rõ ràng; nếp gấp mờ vòng qua chẩm đến sau mắt và kết thúc ở ngay trước cánh tay.\r\nDa trơn láng với các nốt sần rải rác trên lưng, nhiều nhất ở phần dưới của mặt lưng, phía sau đùi và một số trên cánh tay. Mặt lưng màu nâu sẫm. Hai dảy màu vàng sáng được bao bọc bởi viền màu nâu đậm hoặc đen bắt đầu từ giữa hai mắt và kéo dài đến háng; hai dảy màu liền nhau ở giữa 2 mắt, hẹp ở sau mắt và nở rộng trên mặt lưng. Một số cá thể giữa lưng có vệt đen hoặc nâu sậm kéo dài từ giữa 2 mắt đến tận xương cụt. Các nốt sần trên lưng có màu tương tự màu của hai dảy màu trên lưng. Trên các chi có màu không đều, các mảng nhỏ màu vàng sáng không đều xen lẫn trên nền màu nâu sẫm; một vệt màu sáng không liên tục phía trên mặt lưng của ống chân sau. Mặt bụng màu trắng sáng với các hoa văn xám dạng khói, phần da trên cổ họng màu đậm hơn trên bụng.\r\nCánh tay hơi dài; ngón tay dài và có vết tích của màng bơi; to dần từ gốc ngón đến đầu ngón, đĩa ngón rộng theo chiều ngang. Ngón thứ nhất ngắn hơn ngón thứ 2; củ bàn vừa phải; có 3 củ bàn, củ bàn ngoài dài, củ bàn giữa nhỏ nhất, bàn tay trơn và không có nốt sần phụ. Thứ tự chiều dài tương đối của các ngón tay: III>IV>II>I.\r\nChân ngắn, chỉ 1/3 xương đùi tự do; cổ chân chạm đến nách khi xếp song song với trục cơ thể. Hai gót chân không chạm nhau khi gập gối và xếp vuông góc trục cơ thể. Bàn chân dài hơn bàn tay nhưng các ngón chân mảnh khảnh hơn; đĩa ngón chân nhỏ tròn, không rộng theo chiều ngang như đĩa ngón tay; ngón chân có vết tích của màng bơi. Có 2 củ bàn chân; củ bàn chân trong dài, nhô cao, cạnh không rõ ràng; củ bàn chân ngoài nhỏ tròn. Thứ tự chiều dài tương đối các ngón chân: IV>III>V>II>I.', 'Một mẫu cái duy nhất của loài này được tìm thấy trên nền rừng trong khu vực rừng tràm Mỹ Phước khai thác vào mùa mưa (tháng 7). Là loài hoạt động về đêm, thường ẩn nấp trong các hốc cây, hoặc bên dưới lớp lá mục trong mùa khô. Thường ra ngoài kiếm ăn khi độ ẩm không khí cao hoặc sau cơn mưa. Sinh sản vào mùa mưa, con đực thường phát tiếng kêu đặc trưng khi đang ngâm mình trên mặt nước (Kalamadi et al. 2002).\r\nGhi chú: qua phỏng vấn, người dân sinh sống xung quanh khu vực nghiên cứu cho biết trước đây chưa từng tìm thấy loài này trong tự nhiên.', 'Chưa xác định', 3, 5, 2, 2, 3, 2, '0000-00-00', 0),
(16, '2022-04-24 21:12:01', 'Microhyla heymonsii Vogt, 1911', 'Nhái bầu heymon', 'Nhái bầu đỏ', 3, 3, 4, 4, 3, 'Đặc điểm chẩn loại: Kích thước cơ thể trung bình, mắt khỏe; phía trên ổ mắt, phía sau ổ mắt, phía trên màng nhĩ và phía trước mắt có nhiều gai nhọn; mõm nhọn, tuyến mang tai lớn, có chều dài hơn chiều rộng; cơ thể có nhiều nốt sần lớn và nhỏ; ngón tay thứ I dài hơn ngón tay thứ II; khớp cổ chân chạm giữa tuyến mang tai khi xếp dọc theo thân', 'Duttaphrynus melanostictus là loài phổ biến, được bắt gặp trên sinh cảnh rừng tràm đặc dụng, rừng tràm khai thác; phân bố rộng khắp khu vực khảo sát .Là loài hoạt động về đêm, kiếm mồi trên nền rừng và trú ngụ trong các hốc cây. Đầu mùa mưa thường tập trung ở các vũng nước đọng trong khu vực và các con đực gọi bạn tình suốt từ tối đến khoảng 8 giờ sáng.', 'Làm thực phẩm', 3, 5, 2, 2, 2, 2, '0000-00-00', 0),
(17, '2022-04-24 21:14:54', 'Takydromus sexlineatus Daudin, 1802', 'Thằn lằn đuôi dài', 'Thằn lằn đuôi dài', 3, 3, 4, 4, 4, 'Đặc điểm chẩn loại: Ngón chi dẹp và đầu ngón tay mở rộng; toàn bộ mặt lưng màu nâu với 2 dãy màu vàng sáng hoặc vàng nâu chạy dọc từ giữa 2 mắt qua phía trên mắt và kéo dai đến háng; trên ngón có vết tích của màng bơi.\r\nĐặc điểm hình thái: Kích thước trung bình (SVL: 80.3). Cơ thể có hình tam giác khi nhìn từ bên trên, đầu ngắn so với chiều dài thân (HL/SVL: 0,24); chiều dài đầu nhỏ hơn chiều rộng đầu (HL/HW: 0,74); khóe mắt nhỏ; vùng má xiên và hướng lên; mũi tù và ngắn, lỗ mũi nằm gần chóp mỏ và hướng sang 2 bên; khoảng cách giữa hai lỗ mũi tương đương mí mắt trên; màng nhĩ không rõ ràng; nếp gấp mờ vòng qua chẩm đến sau mắt và kết thúc ở ngay trước cánh tay.\r\nDa trơn láng với các nốt sần rải rác trên lưng, nhiều nhất ở phần dưới của mặt lưng, phía sau đùi và một số trên cánh tay. Mặt lưng màu nâu sẫm. Hai dảy màu vàng sáng được bao bọc bởi viền màu nâu đậm hoặc đen bắt đầu từ giữa hai mắt và kéo dài đến háng; hai dảy màu liền nhau ở giữa 2 mắt, hẹp ở sau mắt và nở rộng trên mặt lưng. Một số cá thể giữa lưng có vệt đen hoặc nâu sậm kéo dài từ giữa 2 mắt đến tận xương cụt. Các nốt sần trên lưng có màu tương tự màu của hai dảy màu trên lưng. Trên các chi có màu không đều, các mảng nhỏ màu vàng sáng không đều xen lẫn trên nền màu nâu sẫm; một vệt màu sáng không liên tục phía trên mặt lưng của ống chân sau. Mặt bụng màu trắng sáng với các hoa văn xám dạng khói, phần da trên cổ họng màu đậm hơn trên bụng.\r\nCánh tay hơi dài; ngón tay dài và có vết tích của màng bơi; to dần từ gốc ngón đến đầu ngón, đĩa ngón rộng theo chiều ngang. Ngón thứ nhất ngắn hơn ngón thứ 2; củ bàn vừa phải; có 3 củ bàn, củ bàn ngoài dài, củ bàn giữa nhỏ nhất, bàn tay trơn và không có nốt sần phụ. Thứ tự chiều dài tương đối của các ngón tay: III>IV>II>I.\r\nChân ngắn, chỉ 1/3 xương đùi tự do; cổ chân chạm đến nách khi xếp song song với trục cơ thể. Hai gót chân không chạm nhau khi gập gối và xếp vuông góc trục cơ thể. Bàn chân dài hơn bàn tay nhưng các ngón chân mảnh khảnh hơn; đĩa ngón chân nhỏ tròn, không rộng theo chiều ngang như đĩa ngón tay; ngón chân có vết tích của màng bơi. Có 2 củ bàn chân; củ bàn chân trong dài, nhô cao, cạnh không rõ ràng; củ bàn chân ngoài nhỏ tròn. Thứ tự chiều dài tương đối các ngón chân: IV>III>V>II>I.', 'Một mẫu cái duy nhất của loài này được tìm thấy trên nền rừng trong khu vực rừng tràm Mỹ Phước khai thác vào mùa mưa (tháng 7). Là loài hoạt động về đêm, thường ẩn nấp trong các hốc cây, hoặc bên dưới lớp lá mục trong mùa khô. Thường ra ngoài kiếm ăn khi độ ẩm không khí cao hoặc sau cơn mưa. Sinh sản vào mùa mưa, con đực thường phát tiếng kêu đặc trưng khi đang ngâm mình trên mặt nước (Kalamadi et al. 2002).\r\nGhi chú: qua phỏng vấn, người dân sinh sống xung quanh khu vực nghiên cứu cho biết trước đây chưa từng tìm thấy loài này trong tự nhiên.', 'Chưa xác định', 3, 5, 2, 2, 3, 2, '0000-00-00', 0),
(18, '2022-04-24 21:16:42', 'Eutropis multifasciata (Kuhl, 1820)', 'Thằn lằn bóng hoa', 'Rắn mối', 3, 3, 4, 4, 4, 'Đặc điểm chẩn loại: Ngón chi dẹp và đầu ngón tay mở rộng; toàn bộ mặt lưng màu nâu với 2 dãy màu vàng sáng hoặc vàng nâu chạy dọc từ giữa 2 mắt qua phía trên mắt và kéo dai đến háng; trên ngón có vết tích của màng bơi.\r\nĐặc điểm hình thái: Kích thước trung bình (SVL: 80.3). Cơ thể có hình tam giác khi nhìn từ bên trên, đầu ngắn so với chiều dài thân (HL/SVL: 0,24); chiều dài đầu nhỏ hơn chiều rộng đầu (HL/HW: 0,74); khóe mắt nhỏ; vùng má xiên và hướng lên; mũi tù và ngắn, lỗ mũi nằm gần chóp mỏ và hướng sang 2 bên; khoảng cách giữa hai lỗ mũi tương đương mí mắt trên; màng nhĩ không rõ ràng; nếp gấp mờ vòng qua chẩm đến sau mắt và kết thúc ở ngay trước cánh tay.\r\nDa trơn láng với các nốt sần rải rác trên lưng, nhiều nhất ở phần dưới của mặt lưng, phía sau đùi và một số trên cánh tay. Mặt lưng màu nâu sẫm. Hai dảy màu vàng sáng được bao bọc bởi viền màu nâu đậm hoặc đen bắt đầu từ giữa hai mắt và kéo dài đến háng; hai dảy màu liền nhau ở giữa 2 mắt, hẹp ở sau mắt và nở rộng trên mặt lưng. Một số cá thể giữa lưng có vệt đen hoặc nâu sậm kéo dài từ giữa 2 mắt đến tận xương cụt. Các nốt sần trên lưng có màu tương tự màu của hai dảy màu trên lưng. Trên các chi có màu không đều, các mảng nhỏ màu vàng sáng không đều xen lẫn trên nền màu nâu sẫm; một vệt màu sáng không liên tục phía trên mặt lưng của ống chân sau. Mặt bụng màu trắng sáng với các hoa văn xám dạng khói, phần da trên cổ họng màu đậm hơn trên bụng.\r\nCánh tay hơi dài; ngón tay dài và có vết tích của màng bơi; to dần từ gốc ngón đến đầu ngón, đĩa ngón rộng theo chiều ngang. Ngón thứ nhất ngắn hơn ngón thứ 2; củ bàn vừa phải; có 3 củ bàn, củ bàn ngoài dài, củ bàn giữa nhỏ nhất, bàn tay trơn và không có nốt sần phụ. Thứ tự chiều dài tương đối của các ngón tay: III>IV>II>I.\r\nChân ngắn, chỉ 1/3 xương đùi tự do; cổ chân chạm đến nách khi xếp song song với trục cơ thể. Hai gót chân không chạm nhau khi gập gối và xếp vuông góc trục cơ thể. Bàn chân dài hơn bàn tay nhưng các ngón chân mảnh khảnh hơn; đĩa ngón chân nhỏ tròn, không rộng theo chiều ngang như đĩa ngón tay; ngón chân có vết tích của màng bơi. Có 2 củ bàn chân; củ bàn chân trong dài, nhô cao, cạnh không rõ ràng; củ bàn chân ngoài nhỏ tròn. Thứ tự chiều dài tương đối các ngón chân: IV>III>V>II>I.', 'Một mẫu cái duy nhất của loài này được tìm thấy trên nền rừng trong khu vực rừng tràm Mỹ Phước khai thác vào mùa mưa (tháng 7). Là loài hoạt động về đêm, thường ẩn nấp trong các hốc cây, hoặc bên dưới lớp lá mục trong mùa khô. Thường ra ngoài kiếm ăn khi độ ẩm không khí cao hoặc sau cơn mưa. Sinh sản vào mùa mưa, con đực thường phát tiếng kêu đặc trưng khi đang ngâm mình trên mặt nước (Kalamadi et al. 2002).\r\nGhi chú: qua phỏng vấn, người dân sinh sống xung quanh khu vực nghiên cứu cho biết trước đây chưa từng tìm thấy loài này trong tự nhiên.', 'Chưa xác định', 3, 5, 2, 2, 3, 2, '0000-00-00', 0),
(19, '2022-04-24 21:08:55', 'Python molurus (Linnaeus, 1758)', 'Trăn lưới', 'Trăn đất', 3, 3, 4, 2, 12, 'Đặc điểm chẩn loại: cơ thể tròn, dẹt mặt bụng; chóp đuôi cùn, không có dạng mũ; không có đốm màu vàng mặt bụng; đầu rộng nhất ở góc mép miệng, hẹp dần về trước; mút mõm tròn; lỗ mũi nằm gần bờ trước mép miệng; số vòng quanh thân: 312 – 318; sọc vàng rộng chạy liên tục từ sau mắt đến huyệt (Nishikawa et al.,2012). \r\n        Đặc điểm hình thái: SVL 201,3 mm. Dài đuôi: 2,6 – 3,5; rộng đuôi: 2,8 – 3,5. Rộng đầu (HW: 6,6). Dài đầu hơn rộng đầu (HL/HW: 1,25-1,47). Cơ thể hơi tròn, dài, dạng rắn. Đầu dẹp, láng; rộng nhất ở mép miệng, hẹo về phía đầu. Mút mõm tròn; dài mõm bằng với ngang đầu ở vị trí mắt. Mắt nhỏ, không mi mắt, có một đôi râu (tentacle) ngắn nằm phía trước mắt. Hai bên thân có sọc  màu vàng bắt đầu từ sau mép miệng đến lỗ huyệt. Số nếp gấp quanh thân: 280 – 300; ở đuôi: 7-8. Đuôi ngắn hơi dẹt ở mặt bụng, phần đỉnh cùn, không có đốm màu cam hay vàng  ở mặt bụng. Mặt lưng có màu tím đen, bụng màu hoa cà nhạt, hai bên sườn có sọc màu vàng liên tục, không đứt quãng, chạy từ khoảng giữa hàm trên (mấu xúc - tu) đến gần mút đuôi. Mắt có viền mỏng màu trắng đục.\r\n        Ghi chú:  Loài Ichthyophis bannanicus phân biệt với Ichthyophis nguyenorum dựa trên các đặc điểm: số nếp vòng quanh cơ thể của I. nguyenorum (312 – 318) ít hơn so với I. bannanicus (340); sọc bên thân của I. nguyenorum kéo dài đến mút đuôi so với sọc bị đứt quãng ở phía sau đuôi của I. bannanicus Nishikawa et al. (2012).', 'Sống ở các vực nước (ao, vũng...) có nhiều bùn và lá mục, hay các khu vực đất nông nghiệp. Thức ăn gồm côn trùng, giun đất, nhện và những loài không xương sống nhỏ khác.', 'Chưa xác định', 2, 4, 2, 2, 2, 2, '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `dongvatdiadiem`
--

CREATE TABLE `dongvatdiadiem` (
  `dv_ma` int(11) NOT NULL,
  `dd_ma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dongvatdiadiem`
--

INSERT INTO `dongvatdiadiem` (`dv_ma`, `dd_ma`) VALUES
(1, 1),
(2, 1),
(3, 1),
(5, 1),
(7, 1),
(9, 1),
(10, 1),
(11, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dongvatsinhcanh`
--

CREATE TABLE `dongvatsinhcanh` (
  `dv_ma` int(11) NOT NULL,
  `sc_ma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dongvatsinhcanh`
--

INSERT INTO `dongvatsinhcanh` (`dv_ma`, `sc_ma`) VALUES
(1, 3),
(2, 7),
(3, 4),
(5, 2),
(7, 5),
(9, 2),
(10, 6),
(11, 3),
(12, 6),
(13, 4),
(14, 7),
(15, 6),
(16, 6),
(17, 5),
(18, 5),
(19, 3);

-- --------------------------------------------------------

--
-- Table structure for table `gioi`
--

CREATE TABLE `gioi` (
  `gioi_ma` int(11) NOT NULL,
  `gioi_ten` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gioi`
--

INSERT INTO `gioi` (`gioi_ma`, `gioi_ten`) VALUES
(1, 'Giới 1'),
(2, 'Giới 2'),
(3, 'Động vật (Animalia)');

-- --------------------------------------------------------

--
-- Table structure for table `hinhanh`
--

CREATE TABLE `hinhanh` (
  `ha_ma` int(11) NOT NULL,
  `ha_link` text NOT NULL,
  `dv_ma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hinhanh`
--

INSERT INTO `hinhanh` (`ha_ma`, `ha_link`, `dv_ma`) VALUES
(1, 'https://drive.google.com/open?id=1SPt5-5-Eu5eLhNXVGMijMrIqagolFZ4i', 7),
(2, 'https://drive.google.com/open?id=11e4vQj953s1KGSkE2yeDnUf6t_OUcfOI', 2),
(3, 'https://drive.google.com/open?id=13SdgByNjDXlZm4rEp0qBmgNnQTqpjjff', 18),
(4, 'https://drive.google.com/open?id=1dAspuOaa2rVuawgZGO2ZYLt7WlOqO8sW', 13),
(5, 'https://drive.google.com/open?id=1u-EnqYum36rkgofdJrBIanPmaMvufy2l', 9),
(6, 'https://drive.google.com/open?id=1P7EV53D8yg3ZOLwaNKtRiQdPLzBSCait', 11),
(7, 'https://drive.google.com/open?id=1yU01M0KhxmBINIkpYgPYr0-FdKHkHr4V', 10),
(8, 'https://drive.google.com/open?id=1dEO2xt0jbV5p4KXXtyIjQ0akIjgpLarq', 5),
(9, 'https://drive.google.com/open?id=1Pv4QpQ-XGXYkW3ledU52ga8n340JEecS', 1),
(10, 'https://drive.google.com/open?id=1QbchYJMpLVv9Bo7Fz8cXZDgavCVUTe4l', 3),
(11, 'https://drive.google.com/open?id=1ouKmdg13X3Gt9LvL2LYzzlp98s8SKlSP', 16),
(12, 'https://drive.google.com/open?id=1w1Fz6UOGglW9q-Noy3eg7oKfJshRGUHr', 14),
(13, 'https://drive.google.com/open?id=14vN4pz76NYcP3dk-gogAWCQdcJC-OHnQ', 15),
(14, 'https://drive.google.com/open?id=1w1Fz6UOGglW9q-Noy3eg7oKfJshRGUHr', 19),
(15, 'https://drive.google.com/open?id=1KDIOjdWe0WWtjnKOwiOjJQ8ZYMD6YoVT', 17);

-- --------------------------------------------------------

--
-- Table structure for table `ho`
--

CREATE TABLE `ho` (
  `ho_ma` int(11) NOT NULL,
  `ho_ten` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ho`
--

INSERT INTO `ho` (`ho_ma`, `ho_ten`) VALUES
(1, 'Họ 1'),
(2, 'Họ 22'),
(3, 'Bufonidae Gray, 1825'),
(4, 'Microhylidae (Cóc miệng nhỏ)'),
(5, 'Ranidae Rafinesque, 1814'),
(6, 'Rhacophoridae Hoffman, 1932'),
(7, 'Agamidae Gray, 1827'),
(8, 'Dicroglossidae Anderson, 1871 '),
(9, 'Lacertidae Gray, 1825'),
(10, 'Scincidae Opell, 1811'),
(11, 'Pythonidae Fitzinger, 1826'),
(12, 'Ichthyophiidae Taylor, 1968'),
(13, 'Gekkonidae Gray, 1825');

-- --------------------------------------------------------

--
-- Table structure for table `lop`
--

CREATE TABLE `lop` (
  `lop_ma` int(11) NOT NULL,
  `lop_ten` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lop`
--

INSERT INTO `lop` (`lop_ma`, `lop_ten`) VALUES
(1, 'Lớp 1'),
(3, 'Lớp 3'),
(4, 'AMPHIBIA (Linnaeus, 1758)'),
(5, 'REPTILIA LAURENTI, 1768');

-- --------------------------------------------------------

--
-- Table structure for table `nganh`
--

CREATE TABLE `nganh` (
  `nganh_ma` int(11) NOT NULL,
  `nganh_ten` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nganh`
--

INSERT INTO `nganh` (`nganh_ma`, `nganh_ten`) VALUES
(2, 'na1'),
(3, 'Động vật có dây sống (chordata)');

-- --------------------------------------------------------

--
-- Table structure for table `phanbo`
--

CREATE TABLE `phanbo` (
  `pb_ma` int(11) NOT NULL,
  `pb_ten` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `phanbo`
--

INSERT INTO `phanbo` (`pb_ma`, `pb_ten`) VALUES
(1, 'aa'),
(2, 'Phổ biến'),
(3, 'Ít gặp');

-- --------------------------------------------------------

--
-- Table structure for table `sinhcanh`
--

CREATE TABLE `sinhcanh` (
  `sc_ma` int(11) NOT NULL,
  `sc_ten` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sinhcanh`
--

INSERT INTO `sinhcanh` (`sc_ma`, `sc_ten`) VALUES
(1, 'ddaaa'),
(2, 'Rừng tràm đặc dụng,  rừng tràm trồng'),
(3, 'Rừng tràm trồng'),
(4, 'Rừng tràm đặc dụng'),
(5, 'Rừng trồng'),
(6, 'Rừng tràm khai thác'),
(7, 'Rừng tràm khai thác, rừng tràm trồng');

-- --------------------------------------------------------

--
-- Table structure for table `tinhtrangmauvat`
--

CREATE TABLE `tinhtrangmauvat` (
  `ttmv_ma` int(11) NOT NULL,
  `ttmv_ten` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tinhtrangmauvat`
--

INSERT INTO `tinhtrangmauvat` (`ttmv_ma`, `ttmv_ten`) VALUES
(1, 'a'),
(2, 'Thu được mẫu'),
(3, 'Quan sát');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_hoten` text NOT NULL,
  `user_sdt` text NOT NULL,
  `user_mk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ad_ma`);

--
-- Indexes for table `baotontheocites`
--
ALTER TABLE `baotontheocites`
  ADD PRIMARY KEY (`bt_ma`);

--
-- Indexes for table `baotontheonghidinh`
--
ALTER TABLE `baotontheonghidinh`
  ADD PRIMARY KEY (`bt_ma`);

--
-- Indexes for table `baotontheouicn`
--
ALTER TABLE `baotontheouicn`
  ADD PRIMARY KEY (`bt_ma`);

--
-- Indexes for table `baotontheovn`
--
ALTER TABLE `baotontheovn`
  ADD PRIMARY KEY (`bt_ma`);

--
-- Indexes for table `bo`
--
ALTER TABLE `bo`
  ADD PRIMARY KEY (`bo_ma`);

--
-- Indexes for table `diadiem`
--
ALTER TABLE `diadiem`
  ADD PRIMARY KEY (`dd_ma`);

--
-- Indexes for table `dongvat`
--
ALTER TABLE `dongvat`
  ADD PRIMARY KEY (`dv_ma`),
  ADD KEY `dv_baotontheoNGHIDINH` (`dv_baotontheoNGHIDINH`),
  ADD KEY `dv_baotontheoUICN` (`dv_baotontheoUICN`),
  ADD KEY `dv_tinhtrangmauvat` (`dv_tinhtrangmauvat`),
  ADD KEY `dv_baotontheoVN` (`dv_baotontheoVN`),
  ADD KEY `dv_bo` (`dv_bo`),
  ADD KEY `dv_ho` (`dv_ho`),
  ADD KEY `dv_lop` (`dv_lop`),
  ADD KEY `dv_gioi` (`dv_gioi`),
  ADD KEY `dv_nganh` (`dv_nganh`),
  ADD KEY `dv_phanbo` (`dv_phanbo`),
  ADD KEY `dv_baotontheoCITES` (`dv_baotontheoCITES`);

--
-- Indexes for table `dongvatdiadiem`
--
ALTER TABLE `dongvatdiadiem`
  ADD PRIMARY KEY (`dv_ma`,`dd_ma`),
  ADD KEY `dd_ma` (`dd_ma`);

--
-- Indexes for table `dongvatsinhcanh`
--
ALTER TABLE `dongvatsinhcanh`
  ADD PRIMARY KEY (`dv_ma`,`sc_ma`),
  ADD KEY `sc_ma` (`sc_ma`);

--
-- Indexes for table `gioi`
--
ALTER TABLE `gioi`
  ADD PRIMARY KEY (`gioi_ma`);

--
-- Indexes for table `hinhanh`
--
ALTER TABLE `hinhanh`
  ADD PRIMARY KEY (`ha_ma`),
  ADD KEY `dv_ma` (`dv_ma`);

--
-- Indexes for table `ho`
--
ALTER TABLE `ho`
  ADD PRIMARY KEY (`ho_ma`);

--
-- Indexes for table `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`lop_ma`);

--
-- Indexes for table `nganh`
--
ALTER TABLE `nganh`
  ADD PRIMARY KEY (`nganh_ma`);

--
-- Indexes for table `phanbo`
--
ALTER TABLE `phanbo`
  ADD PRIMARY KEY (`pb_ma`);

--
-- Indexes for table `sinhcanh`
--
ALTER TABLE `sinhcanh`
  ADD PRIMARY KEY (`sc_ma`);

--
-- Indexes for table `tinhtrangmauvat`
--
ALTER TABLE `tinhtrangmauvat`
  ADD PRIMARY KEY (`ttmv_ma`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ad_ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `baotontheocites`
--
ALTER TABLE `baotontheocites`
  MODIFY `bt_ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `baotontheonghidinh`
--
ALTER TABLE `baotontheonghidinh`
  MODIFY `bt_ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `baotontheouicn`
--
ALTER TABLE `baotontheouicn`
  MODIFY `bt_ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `baotontheovn`
--
ALTER TABLE `baotontheovn`
  MODIFY `bt_ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bo`
--
ALTER TABLE `bo`
  MODIFY `bo_ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `diadiem`
--
ALTER TABLE `diadiem`
  MODIFY `dd_ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dongvat`
--
ALTER TABLE `dongvat`
  MODIFY `dv_ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `gioi`
--
ALTER TABLE `gioi`
  MODIFY `gioi_ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hinhanh`
--
ALTER TABLE `hinhanh`
  MODIFY `ha_ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `ho`
--
ALTER TABLE `ho`
  MODIFY `ho_ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `lop`
--
ALTER TABLE `lop`
  MODIFY `lop_ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nganh`
--
ALTER TABLE `nganh`
  MODIFY `nganh_ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `phanbo`
--
ALTER TABLE `phanbo`
  MODIFY `pb_ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sinhcanh`
--
ALTER TABLE `sinhcanh`
  MODIFY `sc_ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tinhtrangmauvat`
--
ALTER TABLE `tinhtrangmauvat`
  MODIFY `ttmv_ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dongvat`
--
ALTER TABLE `dongvat`
  ADD CONSTRAINT `dongvat_ibfk_1` FOREIGN KEY (`dv_baotontheoNGHIDINH`) REFERENCES `baotontheonghidinh` (`bt_ma`),
  ADD CONSTRAINT `dongvat_ibfk_10` FOREIGN KEY (`dv_phanbo`) REFERENCES `phanbo` (`pb_ma`),
  ADD CONSTRAINT `dongvat_ibfk_11` FOREIGN KEY (`dv_baotontheoCITES`) REFERENCES `baotontheocites` (`bt_ma`),
  ADD CONSTRAINT `dongvat_ibfk_2` FOREIGN KEY (`dv_baotontheoUICN`) REFERENCES `baotontheouicn` (`bt_ma`),
  ADD CONSTRAINT `dongvat_ibfk_3` FOREIGN KEY (`dv_tinhtrangmauvat`) REFERENCES `tinhtrangmauvat` (`ttmv_ma`),
  ADD CONSTRAINT `dongvat_ibfk_4` FOREIGN KEY (`dv_baotontheoVN`) REFERENCES `baotontheovn` (`bt_ma`),
  ADD CONSTRAINT `dongvat_ibfk_5` FOREIGN KEY (`dv_bo`) REFERENCES `bo` (`bo_ma`),
  ADD CONSTRAINT `dongvat_ibfk_6` FOREIGN KEY (`dv_ho`) REFERENCES `ho` (`ho_ma`),
  ADD CONSTRAINT `dongvat_ibfk_7` FOREIGN KEY (`dv_lop`) REFERENCES `lop` (`lop_ma`),
  ADD CONSTRAINT `dongvat_ibfk_8` FOREIGN KEY (`dv_gioi`) REFERENCES `gioi` (`gioi_ma`),
  ADD CONSTRAINT `dongvat_ibfk_9` FOREIGN KEY (`dv_nganh`) REFERENCES `nganh` (`nganh_ma`);

--
-- Constraints for table `dongvatdiadiem`
--
ALTER TABLE `dongvatdiadiem`
  ADD CONSTRAINT `dongvatdiadiem_ibfk_1` FOREIGN KEY (`dv_ma`) REFERENCES `dongvat` (`dv_ma`),
  ADD CONSTRAINT `dongvatdiadiem_ibfk_2` FOREIGN KEY (`dd_ma`) REFERENCES `diadiem` (`dd_ma`);

--
-- Constraints for table `dongvatsinhcanh`
--
ALTER TABLE `dongvatsinhcanh`
  ADD CONSTRAINT `dongvatsinhcanh_ibfk_1` FOREIGN KEY (`dv_ma`) REFERENCES `dongvat` (`dv_ma`),
  ADD CONSTRAINT `dongvatsinhcanh_ibfk_2` FOREIGN KEY (`sc_ma`) REFERENCES `sinhcanh` (`sc_ma`);

--
-- Constraints for table `hinhanh`
--
ALTER TABLE `hinhanh`
  ADD CONSTRAINT `hinhanh_ibfk_1` FOREIGN KEY (`dv_ma`) REFERENCES `dongvat` (`dv_ma`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
