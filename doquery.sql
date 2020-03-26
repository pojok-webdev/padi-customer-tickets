drop database if exists localteknis;
create database localteknis;
grant all privileges on localteknis.* to teknis@localhost;
drop database if exists telemarketing;
create database telemarketing;
drop user  telemarketing@localhost;
grant all privileges on telemarketing.* to telemarketing@localhost;

use localteknis;
\. localteknismay23rd2015.sql

create user telemarketing@localhost identified by 'telemarketing';
create user teknis@localhost identified by 'teknis';


-- 20200321
create table ticketservers (id int primary key auto_increment,kdticket varchar(10),name varchar(100),ipaddress varchar(32),start datetime,end datetime,description text,createuser varchar(50),createdate timestamp default current_timestamp());
