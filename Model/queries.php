<?php include "./connection.php";
//create table student
$students = 'CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Surname` varchar(100) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `PhoneNumber` varchar(30) NOT NULL,
  `Password` varchar(1000) NOT NULL,
  `Pic` longblob DEFAULT NULL,
  PRIMARY KEY(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;';


//create table books
$books = 'CREATE TABLE `books` (
  `BookId` int(11) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Author` varchar(100) NOT NULL,
  `Stock` int(11) NOT NULL,
  `Image` longblob DEFAULT NULL,
  `Description` mediumtext DEFAULT NULL,
  `Genre` varchar(100) NOT NULL,
  `newsReview` text DEFAULT NULL,
  `moreRead` text DEFAULT NULL,
  PRIMARY KEY(`BookId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;';

//create table favorites
$favorites = 'CREATE TABLE `favorites` (
  `id` int(11) NOT NULL,
  `BookId` int(11) NOT NULL
  PRIMARY KEY (`id`,`BookId`),
  FOREIGN KEY (`id`) REFERENCES `student` (`id`),
  FOREIGN KEY (`BookId`) REFERENCES `books` (`BookId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci';

//create table ordered
$ordered = 'CREATE TABLE `ordered` (
  `id` int(11) NOT NULL,
  `BookId` int(11) NOT NULL,
  `DateOrdered` date NOT NULL,
  PRIMARY KEY (`id`,`BookId`),
  FOREIGN KEY (`id`) REFERENCES `student` (`id`),
  FOREIGN KEY (`BookId`) REFERENCES `books` (`BookId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
';

?>