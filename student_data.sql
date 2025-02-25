
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `student_data` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `age` int(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `caste` varchar(10) NOT NULL,
  `school` varchar(30) NOT NULL,
  `area` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `desc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `student_data` (`id`, `name`, `age`, `gender`, `caste`, `school`, `area`, `city`, `desc`) VALUES
(7, 'utsav', 19, 'M', 'Open', 'SSGV', 'Katargam', 'Surat', 'NA'),
(10, 'abc', 20, 'M', 'sc', 'nbvcx', 'Katargam', 'Porbandar', 'NA'),
(13, 'sdfgb sadf', 25, 'M', 'open', 'nbvcx', 'Katargam', 'Junagadh', 'NA'),
(15, 'sdfgb sadf', 10, 'M', 'xcv', 'SSGV', 'Katargam', 'Junagadh', 'NA'),
(18, 'jainam', 20, 'M', 'open', 'SSGV', 'changa', 'Anand', 'NA'),
(19, 'Saral', 20, 'M', 'open', 'SSGV', 'changa', 'Anand', 'NA');

ALTER TABLE `student_data`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `student_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;
