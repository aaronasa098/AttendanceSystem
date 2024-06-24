-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2024 at 09:56 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aclc_attendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `dailyattendance`
--

CREATE TABLE `dailyattendance` (
  `entryID` text NOT NULL,
  `DATE` text NOT NULL,
  `TIME` text NOT NULL,
  `USN` text NOT NULL,
  `NAME` text NOT NULL,
  `ATTENDEE` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dailyattendance`
--

INSERT INTO `dailyattendance` (`entryID`, `DATE`, `TIME`, `USN`, `NAME`, `ATTENDEE`) VALUES
('1', '7/30/2023', '8:16 PM', '76-878-3669', 'Dale Sambles', 'Quality Control Specialist'),
('2', '2/7/2024', '10:56 PM', '01-009-7799', 'Kilian Gilogly', 'Paralegal'),
('3', '3/25/2024', '4:32 PM', '69-466-2649', 'Amberly Blankett', 'Actuary'),
('4', '3/26/2024', '6:28 PM', '47-552-7799', 'Gabby Linkie', 'Staff Scientist'),
('5', '7/13/2023', '4:50 PM', '08-305-0277', 'Jules Enrique', 'Health Coach II'),
('6', '6/3/2024', '2:49 AM', '46-273-6084', 'Charita Woolpert', 'Programmer Analyst III'),
('7', '2/13/2024', '5:00 PM', '91-511-2530', 'Cynthea Coppins', 'Actuary'),
('8', '1/28/2024', '12:04 AM', '97-498-5720', 'Berrie Adamsen', 'Financial Advisor'),
('9', '3/27/2024', '12:22 PM', '62-664-9622', 'Analise MacAdam', 'Human Resources Assistant III'),
('10', '2/9/2024', '6:04 PM', '03-704-3651', 'Marlo Dartan', 'Design Engineer'),
('11', '10/26/2023', '4:23 AM', '80-838-0589', 'Nessie Bilyard', 'Biostatistician II'),
('12', '12/5/2023', '8:10 PM', '42-069-9937', 'Alejandro Thowless', 'Financial Analyst'),
('13', '4/25/2024', '4:40 PM', '77-910-9126', 'Jere Kikke', 'Mechanical Systems Engineer'),
('14', '3/25/2024', '3:38 AM', '54-551-1239', 'Lilith Rowlinson', 'Software Engineer II'),
('15', '12/15/2023', '7:31 PM', '67-712-4743', 'Fredelia Tubbs', 'Registered Nurse'),
('16', '8/23/2023', '3:41 AM', '56-008-5980', 'Nicol Peyzer', 'Teacher'),
('17', '4/17/2024', '11:20 PM', '43-108-3234', 'Hilary Blancowe', 'Account Representative IV'),
('18', '9/14/2023', '3:45 PM', '43-410-0586', 'Del Battlestone', 'Mechanical Systems Engineer'),
('19', '3/6/2024', '2:06 AM', '43-265-4870', 'Cecil Le Friec', 'Business Systems Development Analyst'),
('20', '5/10/2024', '2:59 AM', '61-897-1897', 'Howard Osborn', 'Research Nurse'),
('21', '1/22/2024', '1:13 AM', '70-754-2075', 'Kliment Greader', 'Tax Accountant'),
('22', '7/29/2023', '4:00 PM', '51-744-1566', 'Ferd Girardini', 'Programmer IV'),
('23', '10/15/2023', '5:52 AM', '03-674-4325', 'Lynea McGraffin', 'Quality Engineer'),
('24', '12/5/2023', '10:59 PM', '28-430-9415', 'Fernandina Bissex', 'Web Designer III'),
('25', '12/9/2023', '7:04 AM', '30-133-9707', 'Gert Chin', 'Community Outreach Specialist'),
('26', '7/14/2023', '1:44 AM', '41-192-2665', 'Rollins Greated', 'Information Systems Manager'),
('27', '9/7/2023', '4:10 PM', '57-303-5517', 'Husein Caser', 'Help Desk Operator'),
('28', '10/8/2023', '12:16 PM', '26-162-0836', 'Kiele Stenbridge', 'Paralegal'),
('29', '10/26/2023', '6:36 PM', '38-945-7835', 'Garfield Barwise', 'GIS Technical Architect'),
('30', '4/20/2024', '6:27 AM', '74-798-4325', 'Dennie Warrior', 'Research Assistant I'),
('31', '5/6/2024', '4:38 AM', '89-305-7162', 'Robyn Lloyd', 'Data Coordinator'),
('32', '4/26/2024', '11:23 AM', '12-823-9864', 'Madge Grieswood', 'Operator'),
('33', '7/20/2023', '8:14 PM', '89-421-7239', 'Isa Dyde', 'Software Consultant'),
('34', '7/23/2023', '4:03 AM', '35-702-5620', 'Oates Greenhill', 'Associate Professor'),
('35', '4/28/2024', '11:44 AM', '39-228-6879', 'Erminia Rickford', 'Chief Design Engineer'),
('36', '2/13/2024', '11:21 AM', '97-112-6371', 'Mayer Huws', 'Data Coordinator'),
('37', '12/8/2023', '11:02 AM', '87-562-1385', 'Vin Grubb', 'Human Resources Manager'),
('38', '8/8/2023', '6:01 AM', '19-415-6859', 'Charo Witten', 'Mechanical Systems Engineer'),
('39', '8/20/2023', '10:06 PM', '90-622-3766', 'Ab Michiel', 'Assistant Professor'),
('40', '3/24/2024', '10:59 AM', '22-318-0397', 'Laura Warwick', 'Financial Analyst'),
('41', '2/28/2024', '7:20 PM', '05-791-8448', 'Etta Paolacci', 'Office Assistant II'),
('42', '2/23/2024', '4:45 PM', '06-623-7794', 'Art Kenson', 'Tax Accountant'),
('43', '2/11/2024', '2:26 PM', '89-289-3204', 'Fiann Lockyer', 'Professor'),
('44', '9/11/2023', '10:14 AM', '02-982-9560', 'Laurel Oake', 'Editor'),
('45', '2/26/2024', '10:11 PM', '51-432-6104', 'Alister Casina', 'Software Consultant'),
('46', '4/30/2024', '1:33 PM', '49-282-5805', 'Berget Batiste', 'Project Manager'),
('47', '5/2/2024', '2:47 PM', '75-830-9212', 'Rafaela Evill', 'Staff Scientist'),
('48', '5/4/2024', '3:36 AM', '44-522-5508', 'Tedda Longworth', 'Automation Specialist IV'),
('49', '1/4/2024', '2:45 PM', '68-456-7412', 'Flori Leirmonth', 'Web Developer III'),
('50', '3/28/2024', '1:24 AM', '88-222-7786', 'Clerkclaude Timeby', 'Staff Accountant I'),
('51', '10/26/2023', '6:45 AM', '22-935-4297', 'Jarrid Lennie', 'Geologist I'),
('52', '9/18/2023', '9:37 AM', '09-563-5094', 'Babita Westwood', 'Staff Scientist'),
('53', '5/31/2024', '11:55 PM', '07-782-9235', 'Zorah Goldstone', 'Geologist I'),
('54', '12/24/2023', '8:47 AM', '00-727-5960', 'Cayla Shubotham', 'VP Accounting'),
('55', '2/18/2024', '5:18 PM', '94-733-6150', 'Darrin Ryde', 'VP Product Management'),
('56', '7/30/2023', '10:25 AM', '89-946-6607', 'Ambrose Fernan', 'Teacher'),
('57', '6/2/2024', '7:05 AM', '64-443-5424', 'Gavin Spittle', 'Help Desk Operator'),
('58', '5/14/2024', '4:10 AM', '03-166-4266', 'Annora Gallichan', 'Paralegal'),
('59', '1/24/2024', '12:30 PM', '88-941-8692', 'Obediah Chastan', 'Associate Professor'),
('60', '12/10/2023', '8:54 AM', '46-548-8892', 'Cecily Fernie', 'Actuary'),
('61', '2/9/2024', '8:48 PM', '56-128-5790', 'Salomo Calder', 'Chemical Engineer'),
('62', '7/29/2023', '7:40 PM', '90-955-1879', 'Stearne Giffen', 'Sales Associate'),
('63', '7/9/2023', '5:15 AM', '94-621-6353', 'Dalt Jobes', 'Structural Analysis Engineer'),
('64', '6/28/2023', '7:10 PM', '98-848-1594', 'Shannon Burkill', 'Programmer Analyst III'),
('65', '1/31/2024', '3:03 AM', '80-405-8592', 'Beverly Casemore', 'VP Quality Control'),
('66', '7/26/2023', '7:01 PM', '67-267-6505', 'Davita Wardhough', 'Web Developer I'),
('67', '7/27/2023', '1:43 AM', '56-527-0696', 'Micki Kenninghan', 'Software Consultant'),
('68', '7/8/2023', '7:51 PM', '89-067-8120', 'Venus Habben', 'Administrative Assistant I'),
('96', 'Monday, June 24, 2024', '3:45:48 AM', '12312321', '111111', 'SHS student'),
('', 'June 24, 2024', '2:08:57 PM', '12312321', '12312313123123123', 'SHS student'),
('', 'June 24, 2024', '2:12:57 PM', '12312321', 'wdadsadsadas', 'SHS student'),
('', 'June 24, 2024', '2:15:00 PM', '12312312', '12312312', 'College Student'),
('', '2024-06-24', '09:21:21', '000000000000', '000000000000', 'COLLEGE STUDENT'),
('', '2024-06-24', '09:21:52', '000000000000', '000000000000', 'COLLEGE STUDENT'),
('', 'June 24, 2024', '3:23:17 PM', '12312', '123123', 'SHS STUDENT'),
('', 'June 24, 2024', '3:23:29 PM', '00000000000', '0000000000000', 'SHS STUDENT'),
('', 'June 24, 2024', '3:24:45 PM', '1231', '555555', 'SHS STUDENT'),
('', 'June 24, 2024', '3:24:45 PM', '1231', '555555', 'SHS STUDENT'),
('', 'June 24, 2024', '3:25:22 PM', '00000000000000000BANANANAN', 'BANANANAN', 'Others'),
('', 'June 24, 2024', '3:25:37 PM', 'pppppppppppppppp', 'ppppppppppppppppp', 'SHS STUDENT');

-- --------------------------------------------------------

--
-- Table structure for table `user_accounts`
--

CREATE TABLE `user_accounts` (
  `User_username` text NOT NULL,
  `User_password` text NOT NULL,
  `User_type` text NOT NULL,
  `User_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_accounts`
--

INSERT INTO `user_accounts` (`User_username`, `User_password`, `User_type`, `User_status`) VALUES
('aaronazopardo@gmail.com', '123123123', 'Admin', 'Active');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
