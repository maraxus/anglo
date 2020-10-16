CREATE DATABASE IF NOT EXISTS `ci4` COLLATE 'utf8_general_ci' ;
CREATE USER 'root'@'%' IDENTIFIED BY 'root';
#
GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' WITH GRANT OPTION;
GRANT ALL ON `ci4`.* TO 'root'@'%' ;
FLUSH PRIVILEGES ;