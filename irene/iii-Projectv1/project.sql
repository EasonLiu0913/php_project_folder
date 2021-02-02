-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 
-- 伺服器版本： 10.4.11-MariaDB
-- PHP 版本： 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `project`
--
CREATE DATABASE IF NOT EXISTS `project` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `project`;

-- --------------------------------------------------------

--
-- 資料表結構 `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL COMMENT '流水號',
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '資料庫權限帳號',
  `pwd` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '資料庫密碼',
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT '創建時間',
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT '更新時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `admin`
--

INSERT INTO `admin` (`id`, `username`, `pwd`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', '2020-01-13 20:24:53', '2020-01-13 20:24:53');

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `ID` int(50) NOT NULL,
  `Account` varchar(50) NOT NULL,
  `AccountActivated` int(1) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Pwd` varchar(100) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Img` varchar(100) NOT NULL,
  `Birthday` date NOT NULL,
  `PhoneNumber` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Blocked` varchar(20) NOT NULL,
  `VIP` varchar(10) NOT NULL,
  `VIP_Start` date NOT NULL,
  `VIP_Due` date NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `member`
--

INSERT INTO `member` (`ID`, `Account`, `AccountActivated`, `Email`, `Pwd`, `Name`, `Gender`, `Img`, `Birthday`, `PhoneNumber`, `Address`, `Blocked`, `VIP`, `VIP_Start`, `VIP_Due`, `created_at`, `updated_at`) VALUES
(1, 'Brady0507', 1, 'nibh@Nam.com', '3565a686e7e365cd1902235baeda712efa9f3c6f', 'Brady Stanley', '男', '', '1994-12-28', '0901208666', '5724 Nulla. Ave', 'NO', 'YES', '2019-01-01', '2020-01-01', '2020-02-16 16:14:49', '2020-02-16 16:14:49'),
(2, 'Nicholas1111', 1, 'feugiat@Etiam.co.uk', '52253a27b6ea0a63bbd2a48b24ffc141ea8e752b', 'Nicholas Ferguson', '男', '', '1983-09-10', '0927600224', '434-5163 Porttitor Road', 'NO', 'NO', '0000-00-00', '0000-00-00', '2020-02-16 16:14:49', '2020-02-16 16:14:49'),
(3, 'Eden5468', 1, 'lacus.Nulla.tincidunt@tempuslorem.net', '6c0602ec5cb683c76e9eeec6b8fff8fea3b2dec2', 'Eden Irwin', '女', '', '2007-11-17', '0967188791', '7810 Sapien St.', 'NO', 'NO', '0000-00-00', '0000-00-00', '2020-02-16 16:14:49', '2020-02-16 16:14:49'),
(4, 'Colton780', 1, 'id.nunc@ideratEtiam.edu', 'a44a6c035ed805e4b3d9086c64c46fb2885fcadd', 'Colton Nicholson', '男', '', '2010-09-07', '0945386979', 'P.O. Box 138, 8133 A Avenue', 'NO', 'NO', '0000-00-00', '0000-00-00', '2020-02-16 16:14:49', '2020-02-16 16:14:49'),
(5, 'Isabelle65437', 1, 'pharetra@nasceturridiculusmus.co.uk', '4ef77757e8c3bef5f98016fabecb483860615c78', 'Isabelle Jacobson', '男', '', '1963-10-22', '0999424728', 'Ap #935-8367 Cum St.', 'NO', 'NO', '0000-00-00', '0000-00-00', '2020-02-16 16:14:49', '2020-02-16 16:14:49'),
(6, 'Kathleen89043', 1, 'mauris@vitaeodio.org', 'e58c994d320dac65758fee6f8712084d33af38b5', 'Kathleen Buck', '女', '', '1975-08-26', '0904214323', '7909 Malesuada Road', 'NO', 'NO', '0000-00-00', '0000-00-00', '2020-02-16 16:14:49', '2020-02-16 16:14:49'),
(7, 'Boris56803', 1, 'lobortis.Class.aptent@ac.co.uk', '5f3db71cf732c9cad0c9f2b2ff10adbfa93fb687', 'Boris Diaz', '女', '', '1997-12-04', '0912900648', 'Ap #890-9940 Suspendisse Avenue', 'NO', 'NO', '0000-00-00', '0000-00-00', '2020-02-16 16:14:49', '2020-02-16 16:14:49'),
(8, 'Xantha33', 1, 'purus@Inmipede.org', '720e54922f8ad00f207f845df03709c17b0e27f8', 'Xantha Bean', '男', '', '1975-08-07', '0902092983', '495-5505 Molestie Rd.', 'NO', 'NO', '0000-00-00', '0000-00-00', '2020-02-16 16:14:49', '2020-02-16 16:14:49'),
(9, 'Ulla4455', 1, 'ridiculus@turpis.net', '87793af5949f9f7b4aee0762084c83128169a02c', 'Ulla Hodges', '男', '', '1991-06-29', '0981849035', 'Ap #581-819 Non, Ave', 'NO', 'NO', '0000-00-00', '0000-00-00', '2020-02-16 16:14:49', '2020-02-16 16:14:49'),
(10, 'Sierra21', 1, 'nisi.dictum.augue@commodotincidunt.net', 'f97056fe7961dab9444af6be16614dc3c150879c', 'Sierra Palmer', '男', '', '1967-06-12', '0922039611', '998-344 In, Avenue', 'NO', 'NO', '0000-00-00', '0000-00-00', '2020-02-16 16:14:49', '2020-02-16 16:14:49'),
(11, 'Michelle', 1, 'Nulla@Fusce.edu', '187569f5bdd27560c0451eccd8f24cd22232637f', 'Michelle Ramirez', '女', '', '1963-09-29', '0975903708', '212-5577 Consectetuer Av.', 'NO', 'NO', '0000-00-00', '0000-00-00', '2020-02-16 16:14:49', '2020-02-16 16:14:49'),
(12, 'Ralph45', 1, 'Aenean@convallisantelectus.org', 'c587125d3df5c300c42b1600b4d9437c62d3afdc', 'Ralph Lott', '男', '', '1967-12-06', '0932312010', '845 Ultrices St.', 'NO', 'NO', '0000-00-00', '0000-00-00', '2020-02-16 16:14:49', '2020-02-16 16:14:49'),
(13, 'Devin00', 1, 'urna.Ut@a.ca', '3ff7ee5ef842c6e56ad367ee2937a127f3c76f5a', 'Devin Bradshaw', '男', '', '1977-09-23', '0980756070', 'Ap #183-415 Sit Av.', 'NO', 'NO', '0000-00-00', '0000-00-00', '2020-02-16 16:14:49', '2020-02-16 16:14:49'),
(14, 'Kyla', 1, 'sit.amet@loremDonecelementum.ca', 'b17fbb609146d64cc588cbad1abe88833c9a2975', 'Kyla Joyner', '男', '', '1992-09-01', '0953951377', 'Ap #602-5784 Dictum St.', 'NO', 'NO', '0000-00-00', '0000-00-00', '2020-02-16 16:14:49', '2020-02-16 16:14:49'),
(15, 'Sierra', 1, 'semper.pretium@ligulaNullamenim.org', '5f884cf5694022e258e7ab8cb717110d81776b84', 'Sierra Ramsey', '女', '', '1998-09-21', '0922038504', '289-841 Eu Rd.', 'NO', 'NO', '0000-00-00', '0000-00-00', '2020-02-16 16:14:49', '2020-02-16 16:14:49'),
(16, 'Julian567', 1, 'Donec@primisinfaucibus.ca', '8261bb7c51ec3cc7ebbcaf11f787b6fc9402c224', 'Julian Flores', '男', '', '1968-01-19', '0929003579', '8123 Augue Ave', 'NO', 'NO', '0000-00-00', '0000-00-00', '2020-02-16 16:14:49', '2020-02-16 16:14:49'),
(17, 'Russell777', 1, 'nascetur.ridiculus@libero.com', 'ac5497f20f46a45ae428559655066789aa5b9e25', 'Russell Kennedy', '男', '', '1990-02-25', '0960315189', 'Ap #899-9709 Nibh. Street', 'NO', 'NO', '0000-00-00', '0000-00-00', '2020-02-16 16:14:49', '2020-02-16 16:14:49'),
(18, 'Aiko99', 1, 'augue.ac.ipsum@Donecfeugiatmetus.ca', 'ec3f1cb6d0a113f98075deff829b91405e28a9e8', 'Aiko Ramos', '女', '', '1986-10-25', '0920200069', 'P.O. Box 463, 9738 Et Rd.', 'NO', 'NO', '0000-00-00', '0000-00-00', '2020-02-16 16:14:49', '2020-02-16 16:14:49'),
(19, 'Vielka', 1, 'sodales@sedconsequat.org', '8331a54fdd530cbeda32c4c35d03a0c64d8d8927', 'Vielka Beach', '女', '', '2008-07-19', '0930637539', '306-5098 Laoreet Road', 'NO', 'NO', '0000-00-00', '0000-00-00', '2020-02-16 16:14:49', '2020-02-16 16:14:49'),
(20, 'Karleigh', 1, 'molestie.pharetra@nec.ca', '3f90458111e78a8863283c921df4ad88658f3064', 'Karleigh Houston', '男', '', '1970-12-07', '0989893535', '3692 Nunc St.', 'NO', 'NO', '0000-00-00', '0000-00-00', '2020-02-16 16:14:49', '2020-02-16 16:14:49'),
(21, 'Keely7986', 1, 'sem@Aliquam.co.uk', '0c61e93e83827f94c3ae8704406e71f974cc450f', 'Keely Ross', '女', '', '1974-02-02', '0930557368', '9673 Malesuada St.', 'NO', 'NO', '0000-00-00', '0000-00-00', '2020-02-16 16:14:49', '2020-02-16 16:14:49'),
(22, 'Aurora', 1, 'augue@atpede.co.uk', 'f0c300ffd00f401b3a9cce514b2c3ebd905e1d39', 'Aurora Figueroa', '男', '', '2008-02-14', '0946141594', '802-9209 Tempor, Av.', 'NO', 'YES', '2019-05-01', '2020-05-01', '2020-02-16 16:14:49', '2020-02-16 16:14:49'),
(23, 'Leigh0894', 1, 'Ut.tincidunt.orci@rhoncusNullamvelit.com', '87b3dd56f808ceac5f02d7f955fe0757d0652764', 'Leigh Stout', '女', '', '1968-01-23', '0906057370', 'P.O. Box 541, 6412 Velit Av.', 'NO', 'NO', '0000-00-00', '0000-00-00', '2020-02-16 16:14:49', '2020-02-16 16:14:49'),
(24, 'Basil', 1, 'elit.elit@massalobortis.ca', '162ba2e40961fccd210e033ff2bce83f103e4dcf', 'Basil Galloway', '男', '', '1996-06-28', '0945421975', 'Ap #662-8812 Amet Ave', 'NO', 'YES', '2019-10-20', '2020-10-31', '2020-02-16 16:14:49', '2020-02-16 16:14:49'),
(25, 'Lee157', 1, 'eget.tincidunt@hendreritconsectetuercursus.co.uk', '1d9b48ca521d57df8c0b3bb316b323f6b625cdc3', 'Lee Cherry', '男', '', '1983-09-13', '0906246615', 'Ap #870-4061 Purus Ave', 'YES', 'YES', '2020-01-01', '2021-01-01', '2020-02-16 16:14:49', '2020-02-16 16:14:49'),
(26, 'Honorato', 1, 'interdum.Nunc@Maurisblandit.ca', '709d6b18bf0a274433ca3f47eeff071fc9974bf6', 'Honorato Wiley', '女', '', '1976-03-31', '0957932366', '791-2253 Aliquet, Av.', 'NO', 'NO', '0000-00-00', '0000-00-00', '2020-02-16 16:14:49', '2020-02-16 16:14:49'),
(27, 'Chancellor88', 1, 'magna@condimentumDonec.edu', 'a7b52067308457bba91955c4ca2ef0c376641973', 'Chancellor Campos', '男', '', '1973-08-02', '0983288305', 'Ap #839-6517 Placerat Street', 'NO', 'NO', '0000-00-00', '0000-00-00', '2020-02-16 16:14:49', '2020-02-16 16:14:49'),
(28, 'Hu', 1, 'vitae.sodales@magnaseddui.ca', '5cb7829bab81459668ef97549fa0d82fb2b399b4', 'Hu Mccarthy', '男', '', '1975-08-04', '0902561546', 'P.O. Box 940, 7217 Curabitur Street', 'NO', 'YES', '2020-02-03', '2020-02-03', '2020-02-16 16:14:49', '2020-02-16 16:14:49'),
(29, 'Amy', 1, 'arcu@orciPhasellus.com', '66f8ec6cc042a764e0990c2da0f836c3ec54eabe', 'Amy Rogers', '女', '', '1984-02-15', '0975911053', '4677 Mi Street', 'NO', 'NO', '0000-00-00', '0000-00-00', '2020-02-16 16:14:49', '2020-02-16 16:14:49'),
(30, 'Gil7115', 1, 'velit.justo.nec@Nullam.edu', '3068720b88c2fdd25e60f14ea051c9b94893f8f1', 'Gil Compton', '女', '', '1961-09-17', '0900284832', '331-7673 Sit St.', 'YES', 'NO', '0000-00-00', '0000-00-00', '2020-02-16 16:14:49', '2020-02-16 16:14:49'),
(31, 'Herman', 1, 'sed@pretiumneque.ca', 'a2fbf9b918a6b40edfcd1e51cff4c4bf42bbb411', 'Herman Anthony', '男', '', '1980-08-01', '0947710239', 'Ap #856-9889 Aliquet, St.', 'YES', 'NO', '0000-00-00', '0000-00-00', '2020-02-16 16:14:49', '2020-02-16 16:14:49'),
(32, 'Harrison', 1, 'molestie@malesuadaaugue.org', 'f7c305a529d5bc8d1bcbd3eb6c4784d10b8309bb', 'Harrison Dale', '女', '', '1974-12-16', '0907540660', 'Ap #390-4764 Accumsan Road', 'YES', 'NO', '0000-00-00', '0000-00-00', '2020-02-16 16:14:49', '2020-02-16 16:14:49'),
(33, 'Summer0876', 1, 'Morbi.non.sapien@ultrices.co.uk', '4146e5d02329bdffc3e1f9e0656bb863d059f2ef', 'Summer Estrada', '男', '', '1963-09-14', '0958242249', '6196 Ut, St.', 'NO', 'NO', '0000-00-00', '0000-00-00', '2020-02-16 16:14:49', '2020-02-16 16:14:49'),
(34, 'Tatiana', 1, 'Etiam.ligula@pharetrasedhendrerit.edu', 'ae0a44d8836092e9a5ba56d5a180146843eef99a', 'Tatiana Chambers', '男', '', '1963-09-10', '0959626921', 'P.O. Box 584, 2411 Lectus St.', 'NO', 'NO', '0000-00-00', '0000-00-00', '2020-02-16 16:14:49', '2020-02-16 16:14:49'),
(35, 'test', 1, 'test111@ntu.edu.tw', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', '', '', '', '1991-04-21', '0981999003', 'P.O. Box 571, 2411 Lectus St.', 'NO', 'YES', '0000-00-00', '0000-00-00', '2020-02-16 16:14:50', '2020-02-16 16:14:50'),
(36, 'Candice0887', 1, 'ac.facilisis@Aliquamtinciduntnunc.com', '5a6c027739911150b239b885770dc731e94fe4a4', 'Candice Burke', '女', '', '1974-07-19', '0943988182', 'P.O. Box 140, 8387 Velit. Av.', 'NO', 'NO', '0000-00-00', '0000-00-00', '2020-02-16 16:14:50', '2020-02-16 16:14:50');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Account` (`Account`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT COMMENT '流水號', AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `member`
--
ALTER TABLE `member`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
