
CREATE DATABASE `netSpeeds`;

CREATE TABLE `log` (
  `name` varchar(120) DEFAULT NULL,
  `host` varchar(120) DEFAULT NULL,
  `download` varchar(120) DEFAULT NULL,
  `upload` varchar(120) DEFAULT NULL,
  `ping` varchar(120) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE USER 'netLog'@'localhost' IDENTIFIED BY 'abcd';
GRANT ALL ON netSpeeds.* TO 'netLog'@localhost;


