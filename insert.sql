SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

CREATE TABLE `users`(
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `bday` int(11) NOT NULL,
  `bmonth` int(11) NOT NULL,
  `byear` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;


      
/*

        INSERT INTO users ( 
        email,
        password,
        first_name,
        last_name,
        bday,
        bmonth,
        byear) VALUES(
          'testid',
          'TestF',
          'TestL',
          '14',
          '12',
          '1445'
        )


        INSERT INTO users ( 
        email
        ) VALUES (
          'testid'
        )
 
*/