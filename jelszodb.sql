CREATE DATABASE `dev`
CHARACTER SET utf8 COLLATE utf8_general_ci;

USE `dev`;
DB_PASSWORD="dev"

CREATE TABLE `felhasznalok` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `csalad_nev` varchar(45) NOT NULL default '',
  `kereszt_nev` varchar(45) NOT NULL default '',
  `bejelentkezes` varchar(12) NOT NULL default '',
  `jelszo` varchar(40) NOT NULL default '',
  PRIMARY KEY  (`id`)
)
ENGINE = MYISAM
CHARACTER SET utf8 COLLATE utf8_general_ci;

INSERT INTO `felhasznalok` (`id`,`csalad_nev`,`kereszt_nev`,`bejelentkezes`,`jelszo`) VALUES 
 (1,'Család_1','Keresztnév-1','Login1',sha1('login1')),
 (2,'Család_2','Keresztnév-2','Login2',sha1('login2')),
 (3,'Család_3','Keresztnév-3','Login3',sha1('login3')),
 (4,'Család_4','Keresztnév-4','Login4',sha1('login4')),
 (5,'Család_5','Keresztnév-5','Login5',sha1('login5')),
 (6,'Család_6','Keresztnév-6','Login6',sha1('login6')),
 (7,'Család_7','Keresztnév-7','Login7',sha1('login7')),
 (8,'Család_8','Keresztnév-8','Login8',sha1('login8')),
 (9,'Család_9','Keresztnév-9','Login9',sha1('login9')),
 (10,'Család_10','Keresztnév-10','Login10',sha1('login10')),
 (11,'Család_11','Keresztnév-11','Login11',sha1('login11')),
 (12,'Család_12','Keresztnév-12','Login12',sha1('login12'));
