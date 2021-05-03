CREATE TABLE testidemail (
        item_id int(11) NOT NULL AUTO_INCREMENT,
        name varchar(255) NOT NULL,
        description varchar(255) NOT NULL,
        quantity varchar(255) NOT NULL,
        q_type varchar(255) NOT NULL,
        PRIMARY KEY (`item_id`) USING BTREE
      ) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8


INSERT INTO testidemail( 
        name,
        description,
        quantity,
        q_type) VALUES(
          'testmed1',
          'decription testmed1',
          '12',
          'pills'
        )