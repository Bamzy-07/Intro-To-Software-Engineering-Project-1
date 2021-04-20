USE form_demo;
CREATE TABLE user(id bigint(200)NOT NULL auto_increment,
user_id bigint(200) NOT NULL,
fname varchar(100) NOT NULL,
lname VARCHAR(100) NOT NULL,
username VARCHAR(100) NOT NULL,
email varchar(100) DEFAULT NULL,
phone_number integer(10) DEFAULT NULL,
course ENUM('computer engineering','biomedical engineering','food processing engineering') NOT NULL,
password varchar(50) NOT NULL,
PRIMARY KEY (id));
INSERT INTO user(fname,lname,username,email,phone_number,password)values('Bamzy','Bamiebo','kobbs','kobbie@gmail.com','0206754232','12345G');
INSERT INTO user(fname,lname,Email,phone_number,course,password)values('Bamzy','Bamiebo','kobbie@gmail.com','0206754232','diehfb ','12345G');
SELECT *FROM user;
drop table user;
show variables like 'sql_mode';
set global sql_mode='STRICT_TRANS_TABLES';
