# eksam
Veebiprogrammeerimise eksam

Lehestiku lingid greeny-s:
http://greeny.cs.tlu.ee/~heinparn/eksam/page/


Andmebaas:

CREATE TABLE `margid` (
  `mark` varchar(100) NOT NULL PRIMARY KEY
 
);
    
  CREATE TABLE `varuosad` (
  
  `varuosa`varchar(100) NOT NULL PRIMARY KEY
  
);


CREATE TABLE `kuulutus` (
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `tehing` varchar(10) NOT NULL,
  `kommentaar` varchar(250) NOT NULL,
  `mark`varchar(100) NOT NULL,
  `varuosa`varchar(100) NOT NULL,
  
  
   FOREIGN KEY(mark) REFERENCES margid(mark),
   FOREIGN KEY(varuosa) REFERENCES varuosad(varuosa)
);
