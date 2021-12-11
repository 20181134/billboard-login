drop database if exists login_db;
create database login_db character set utf8 collate utf8_general_ci;
grant all on login_db.* to 'admin'@'localhost' identified by 'password';
use login;

create table login (
    username varchar(30) not null,
    password varchar(30) not null
)