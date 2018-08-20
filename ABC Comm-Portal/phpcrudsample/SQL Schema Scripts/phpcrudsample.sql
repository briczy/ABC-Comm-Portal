-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 17, 2018 at 01:01 PM
-- Server version: 5.0.96-community-nt
-- PHP Version: 5.4.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `phpcrudsample`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `procSaveUser`(IN `i_id` INT, IN `i_firstname` VARCHAR(50), IN `i_lastname` VARCHAR(50), IN `i_email` VARCHAR(50), IN `i_password` VARCHAR(20), IN `i_is_admin` INT(1), IN `i_is_block` INT(1))
BEGIN
    if(i_id=0) then
      insert into tb_user(firstname,lastname,email,password,is_admin,is_block) 
      values(i_firstname,i_lastname,i_email,i_password,i_is_admin,i_is_block);
    Else
	  update tb_user set 
      firstname=i_firstname,
      lastname=i_lastname,
      email=i_email,
      password=i_password,
	  is_admin=i_is_admin,
 	  is_block=i_is_block
where id=i_id;
    end if;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `id` int(11) NOT NULL auto_increment,
  `firstname` varchar(50) default NULL,
  `lastname` varchar(50) default NULL,
  `email` varchar(50) default NULL,
  `password` varchar(20) default NULL,
  `is_admin` int(11) default NULL,
  `is_block` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `firstname`, `lastname`, `email`, `password`, `is_admin`, `is_block`) VALUES
(8, 'new', 'val', 'c@b.com', 'lol', 1, 1),
(9, 'lol', 'lel', 'lel@lel.com', '1111', 1, 0),
(10, 'john', 'wick', 'g@g.com', '1', 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
