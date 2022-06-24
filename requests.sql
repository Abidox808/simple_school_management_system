create table students(
id int(11) primary key not null auto_increment,
first_name varchar(45),
last_name varchar(45),
gender varchar(45),
birthday varchar(45),
email varchar(45),
phone varchar(45),
package varchar(45)
);

create table teachers(
id int(11) primary key not null auto_increment,
fullname varchar(45),
filiere varchar(45),
levell varchar(45)
);

create table users(
id int(11) primary key not null auto_increment,
username varchar(45) not null,
pass varchar(45) not null
);

insert into users (username,pass) values ('admin','admin');
insert into users (username,pass) values ('manager','manager');