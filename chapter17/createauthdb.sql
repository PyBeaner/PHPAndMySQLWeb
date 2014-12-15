create database auth_test;
use auth_test;
create table users(
	name varchar(20),
	password varchar(40),
	primary key (name)
);

insert into users values('username','password');
insert into users values('test_user',sha1('password'));

grant select on auth_test.*
	to "web_auth"@"localhost" identified by "web_auth123";