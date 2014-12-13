create database books;
use books;

create table customers(
	customer_id int unsigned not null auto_increment primary key,
	name char(50) not null,
	address char(100) not null,
	city char(30) not null
);

create table orders(
	order_id int unsigned not null auto_increment primary key,
	customer_id int unsigned not null,
	amount float(6,2),
	date date not null
);

create table books(
	isbn char(13) not null primary key,
	author char(50),
	title char(100),
	price float(4,2)
);

create table order_items(
	order_id int unsigned not null,
	isbn char(13) not null,
	quantity tinyint unsigned,

	primary key(order_id, isbn)
);

create table book_reviews(
	isbn char(13) not null primary key,
	review text
);