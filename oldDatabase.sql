-- Generation Time: Apr 05, 2018 at 10:36 PM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `MOVIE_STORE`
--

-- --------------------------------------------------------

--
-- Table structure for table `MOVIE`
--

CREATE TABLE `MOVIE` (
  `MOVIEID` int(11) NOT NULL,
  `TITLE` varchar(255) NOT NULL,
  `YEAR` int(5) NOT NULL,
  `DESCRIPTION` text NOT NULL,
  `DURATION` time NOT NULL,
  `RATING` int(5) NOT NULL,
  `QUANTITY` varchar(100) NOT NULL,
  `PRICE` varchar(100) NOT NULL,
  `INSTOCK` tinyint(1) NOT NULL,
  `IMAGE` varchar(200) NOT NULL,
  `IS_AVAILABLE` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `MOVIE`
--

INSERT INTO `MOVIE` (`MOVIEID`, `TITLE`, `YEAR`, `DESCRIPTION`, `DURATION`, `RATING`, `QUANTITY`, `PRICE`, `INSTOCK`, `IMAGE`, `IS_AVAILABLE`) VALUES
(1, 'Avatar', 2014, 'New', '00:00:12', 2, '0', ' 23', 1, 'avatarNew.jpg', 0),
(2, 'Dark Knight Rises', 2017, 'The Dark Knight Rises is a 2012 superhero film directed by Christopher Nolan, who co-wrote the screenplay\nwith his brother Jonathan Nolan, and the story with David S. Goyer. Featuring the DC Comics character Batman, the film is the final installment in Nolan\'s\nThe Dark Knight Trilogy, and the sequel to The Dark Knight (2008). Christian Bale reprises the lead role of Bruce Wayne/Batman, with a returning cast of allies:\n Michael Caine as Alfred Pennyworth, Gary Oldman as James Gordon, and Morgan Freeman as Lucius Fox. The film introduces Selina Kyle (Anne Hathaway) and Bane (Tom Hardy).\n Eight years after the events of The Dark Knight,merciless revolutionary Bane forces an older Bruce Wayne to resume his role as Batman and\n save Gotham City from nuclear destruction.', '02:45:00', 5, '0', '30$', 1, 'darknightrises.jpg', 1),
(3, 'John Carter', 2016, 'The Dark Knight Rises is a 2012 superhero film directed by Christopher Nolan, who co-wrote the screenplay\nwith his brother Jonathan Nolan, and the story with David S. Goyer. Featuring the DC Comics character Batman, the film is the final installment in Nolan\'s\nThe Dark Knight Trilogy, and the sequel to The Dark Knight (2008). Christian Bale reprises the lead role of Bruce Wayne/Batman, with a returning cast of allies:\nMichael Caine as Alfred Pennyworth, Gary Oldman as James Gordon, and Morgan Freeman as Lucius Fox. The film introduces Selina Kyle (Anne Hathaway) and Bane (Tom Hardy). Eight years after the events of The Dark Knight,\n merciless revolutionary Bane forces an older Bruce Wayne to resume his role as Batman and save Gotham City from nuclear destruction.', '02:12:00', 3, '0', '30$', 1, 'johncarter.jpeg', 0),
(4, 'Spectre', 2015, 'Spectre is a 2015 spy film, the twenty-fourth in the James Bond film series produced by Eon Productions for Metro-Goldwyn-Mayer\nand Columbia Pictures. It is Daniel Craig\'s fourth performance as James Bond, and the second film in the series\ndirected by Sam Mendes following Skyfall. It was written by John Logan, Neal Purvis, Robert Wade and Jez Butterworth.', '02:40:00', 2, '0', '32$', 1, 'spectre.jpg', 0),
(5, 'Pirates Of The Caribbean', 2014, 'The Curse of the Black Pearl (2003) Blacksmith Will Turner teams up\n  with eccentric pirate Captain Jack Sparrow to save Turner\'s love, Elizabeth Swann, from cursed pirates led by Jack\'s mutinous former\n  first mate, Captain Barbossa.', '02:22:00', 5, '0', '32$', 1, 'PiratesOfTheCaribbean.jpg', 0),
(6, 'Sherlock Gnomes', 2018, 'Sherlock Gnomes is a 2018 3D computer-animated mystery comedy film directed by John Stevenson.[1] A sequel to 2011\'s Gnomeo & Juliet, the film starred the voices of James McAvoy, Emily Blunt, Chiwetel Ejiofor, Mary J. Blige, and Johnny Depp. It was produced by Paramount Animation, Metro-Goldwyn-Mayer, and Rocket Pictures,[4] with the animation service provided by Mikros Image.[4] It was the first film from Paramount Animation to be entirely animated, and the first animated film from Metro-Goldwyn-Mayer since 2008\'s Igor. The film was released in the United States on March 23, 2018, by Paramount Pictures, unlike its predecessor, which was distributed by Touchstone Pictures.[2] It received generally unfavorable reviews from critics and has grossed $27 million worldwide.', '01:26:00', 4, ' 2', ' 23', 1, 'gnomes.jpeg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `USERS`
--

CREATE TABLE `USERS` (
  `USERID` int(11) NOT NULL,
  `EMAILID` varchar(100) NOT NULL,
  `USER_NAME` varchar(100) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `COUNTRY` varchar(100) NOT NULL,
  `PHONE` varchar(100) NOT NULL,
  `USERTYPE` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `USERS`
--

INSERT INTO `USERS` (`USERID`, `EMAILID`, `USER_NAME`, `PASSWORD`, `COUNTRY`, `PHONE`, `USERTYPE`) VALUES
(1, 'kruthika.vishwa@gmail.com', 'kruthika', 'kruvish11', 'India', '+16822560308', 'user'),
(2, 'lombada11@gmail.com', 'Navneeth', 'Nav24', 'India', '+16822560309', 'admin'),
(3, 'aish@gmail.com', 'Aishwarya', '$2y$10$w85dGSD9V6Sb1dOtzNGcW.C2JMIFAALMtwNAObZ4U517UD06tGWRC', 'India', '6822560308', 'admin'),
(4, 'kavitha.vishwa@gmail.com', 'kavitha', '$2y$10$ebcOCjj.hk2Wt9a7ABI2aeTZf4lcTjCA5LUkr7Gik31ZMWwhpufhK', 'India', '6822560308', 'user'),
(5, 'kruvish@gmail.com', 'kruthika', '$2y$10$fUAXgQUqmtUa5Iq/pBlHxOO.GiTHkL.nIsmOHC/RA2Yv1U687dZJe', 'India', '6822560308', 'user'),
(6, 'kruthika@gmail.com', 'kru', '$2y$10$V6jaPtMzRNANLBH/r0csnu1JfNpO4cDCTPfElIIEnRdK3UJ2iSrze', 'india', '6822560308', 'admin'),
(7, 'aishvish@gmail.com', 'aish', '$2y$10$hiF6XxrC9iF/.ObwatkdJuK25Gtaqz4OT0HL.hD68nmF2FbJakA0W', 'india', '6822560308', 'user'),
(8, 'dad@gmail.com', 'dad', '$2y$10$ZRPTL2L0ElWokKa.drR4/.RaLBNAwJLpx9f1OnciYrlrLdyLqEdUe', 'india', '6822560308', 'user'),
(9, 'nav@gmail.com', 'navneethk', '$2y$10$3ith6nZQo83seE9NTspzjudemcIYJ7kg3T3R1c3lu5Ijg7HzGJM6a', 'india', '6822560308', 'admin'),
(10, 'baba@gmail.com', 'kruvish', '$2y$10$Pj/8nRo5YAhQA3NpXRdchuWe9si6yE6dD/zmFDPmoGwgF2NJNuaIy', 'india', '6822560308', 'admin'),
(11, 'aa@gmail.com', 'aa', '$2y$10$4YoYBLbDYVN0SVxnhpFxDe5iNeMW4Jqe1V0vux31P3Wxak5mKeeBK', 'United States', '6822560308', 'admin'),
(12, 'ab@gmail.com', 'ab', '$2y$10$Y5Wi1id0Uuuk98/SjQobs.81z3r5oBbhTGD0SmlKI3KDA3I8ZbRSq', 'india', '6822560308', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `MOVIE`
--
ALTER TABLE `MOVIE`
  ADD PRIMARY KEY (`MOVIEID`);

--
-- Indexes for table `USERS`
--
ALTER TABLE `USERS`
  ADD PRIMARY KEY (`USERID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `USERS`
--
ALTER TABLE `USERS`
  MODIFY `USERID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
