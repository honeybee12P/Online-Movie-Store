DROP DATABASE IF EXISTS onlinemoviestore;
CREATE DATABASE onlinemoviestore;

USE onlinemoviestore;

CREATE TABLE IF NOT EXISTS `USERS` (
  `USERID` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `EMAILID` varchar(100) NOT NULL,
  `USER_NAME` varchar(100) NOT NULL,
  `PASSWORD`  varchar(255) NOT NULL,
  `COUNTRY` varchar(100) NOT NULL,
  `PHONE`  varchar(100) NOT NULL,
  `USERTYPE` varchar(100) NOT NULL
);

CREATE TABLE IF NOT EXISTS `MOVIE` (
  `MOVIEID` int(11) NOT NULL PRIMARY KEY,
  `TITLE` varchar(255) NOT NULL,
  `YEAR` int(5) NOT NULL,
  `DESCRIPTION`  TEXT NOT NULL,
  `DURATION` TIME NOT NULL,
  `RATING`  float NOT NULL,
  `QUANTITY` INT(100) NOT NULL,
  `GENRE` varchar(100) NOT NULL,
  `PRICE` varchar(100) NOT NULL,
  `IMAGE` VARCHAR(200) NOT NULL,
  `TRAILER` varchar(2000) NOT NULL,
  `IS_DELETED` tinyint(0) NOT NULL,
  `Director` TEXT NOT NULL
);

CREATE TABLE `Actor` (
  `actorid` int(11) NOT NULL,
  `actor_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `Actor` (`actorid`, `actor_name`) VALUES
(60, 'Anthony Gonzalez'),
(61, ' Gael García Bernal'),
(62, ' Craig T. Nelson'),
(63, ' Samuel L. Jackson'),
(64, 'Chadwick Boseman'),
(65, 'Michael B. Jordan'),
(66, 'Tye Sheridan'),
(67, 'Olivia Cooke'),
(68, ' Storm Reid'),
(69, ' Oprah Winfrey'),
(70, ' Natalie Portman'),
(71, ' Jennifer Jason Leigh'),
(72, 'Bryan Cranston'),
(73, 'Koyu Rankin'),
(74, 'Zach Galifianakis'),
(75, 'Bradley Cooper'),
(76, ' Simon Pegg'),
(77, ' Nick Frost');

CREATE TABLE `Actor_Movie` (
  `actorid` int(11) NOT NULL,
  `movieid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `Actor_Movie` (`actorid`, `movieid`) VALUES
(60, 1),
(61, 1),
(62, 2),
(63, 2),
(64, 3),
(65, 3),
(66, 4),
(67, 4),
(68, 5),
(69, 5),
(70, 6),
(71, 6),
(72, 7),
(73, 7),
(74, 8),
(75, 8),
(76, 9),
(77, 9);

INSERT INTO `MOVIE` (`MOVIEID`, `TITLE`, `YEAR`, `DESCRIPTION`, `DURATION`, `RATING`, `QUANTITY`, `GENRE`, `PRICE`, `IMAGE`, `TRAILER`, `IS_DELETED`, `Director`) VALUES
(1, 'Coco', 2017, 'Aspiring musician Miguel, confronted with his family ancestral ban on music, enters the Land of the Dead to find his great-great-grandfather, a legendary singer.', '01:45:00', 8, 3, 'animation', 4,'coco1.jpg', 'http://www.hd-trailers.net/movie/coco/', 0, 'Lee Unkrich'),
(2, 'The Incredibles', 2018, 'A family of undercover superheroes, while trying to live the quiet suburban life, are forced into action to save the world.', '01:55:00', 8, 2, 'animation', 2.99,'incredible.jpg', 'https://www.youtube.com/watch?v=sZwWCrFNfzQ', 0, 'Brad Bird'),
(3, 'Black Panther', 2018, 'Challa, the King of Wakanda, rises to the throne in the isolated, technologically advanced African nation, but his claim is challenged by a vengeful outsider who was a childhood victim of mistake of his father.', '02:14:00', 7.8, 1, 'action', 6.99,'black.jpg', 'http://www.hd-trailers.net/movie/black-panther/', 0, 'Ryan Coogler'),
(4, 'Ready Player One', 2018, 'When the creator of a virtual reality world called the OASIS dies, he releases a video in which he challenges all OASIS users to find his Easter Egg, which will give the finder his fortune.', '02:20:00', 8, 2, 'action', 5.99,'ready.jpg', 'http://www.hd-trailers.net/movie/ready-player-one/', 0, 'Steven Spielberg'),
(5, 'Wrinkle in Time', 2018, 'After the disappearance of her scientist father, three peculiar beings send Meg, her brother, and her friend to space in order to find him.', '01:49:00', 4.2, 1, 'sci-fi', 3.99,'wrinkle.jpeg', 'http://www.hd-trailers.net/movie/a-wrinkle-in-time/', 0, 'Ava DuVernay'),
(6, 'Annihilation', 2018, 'A biologist signs up for a dangerous, secret expedition into a mysterious zone where the laws of nature do not apply.', '02:00:00', 7.1, 3, 'thriller', 4.99,'annhilation.jpg', 'http://www.hd-trailers.net/movie/annihilation/', 0, 'Alex Garland'),
(7, 'Isle of Dogs', 2018, 'Set in Japan, Isle of Dogs follows a boy odyssey in search of his lost dog.', '01:41:00', 8.3, 3, 'animation', 4,'isle.jpg', 'http://www.hd-trailers.net/movie/isle-of-dogs/', 0, 'Wes Anderson'),
(8, 'The Hangover', 2009, 'Three buddies wake up from a bachelor party in Las Vegas, with no memory of the previous night and the bachelor missing. They make their way around the city in order to find their friend before his wedding.', '01:45:00', 7.7, 4, 'comedy', 2.99,'hang.jpg', 'http://www.hd-trailers.net/movie/the-hangover/', 0, 'Todd Phillips'),
(9, 'Shaun of the Dead', 2004, 'A man decides to turn his moribund life around by winning back his ex-girlfriend, reconciling his relationship with his mother, and dealing with an entire community that has returned from the dead to eat the living.', '01:39:00', 8, 3, 'comedy', 2.99,'shaun.jpg', 'https://www.youtube.com/watch?v=LIfcaZ4pC-4', 0, 'Edgar Wright');

CREATE TABLE `purchase_history` (
  `movieid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `date` text NOT NULL,
  `cancellation_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `cart` (
  `USERID` int(11) NOT NULL,
  `MOVIEID` int(11) NOT NULL,
  `QUANTITY` int(4) NOT NULL,
  `PRICE` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
