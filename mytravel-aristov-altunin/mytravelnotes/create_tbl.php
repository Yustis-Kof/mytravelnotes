//формирование запроса
$query = "CREATE TABLE notes
 (id SMALLINT NOT NULL
AUTO_INCREMENT,
 PRIMARY KEY (id),
 created DATE,
 title VARCHAR (20),
article VARCHAR (255))";