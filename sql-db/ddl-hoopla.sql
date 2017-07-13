create schema hoopin;

set search_path to hoopin;

create table users(
admin_id serial,
username varchar(50),
password varchar(20) not null,
primary key (admin_id)
);

create table province(
province_id int,
province_name varchar(50),
primary key (province_id)
);

create table city(
city_id int,
province_id int,
city_name varchar(50),
primary key (city_id),
foreign key (province_id) references province (province_id) on update cascade on delete cascade
);

create table cutomer(
city_id serial,
cust_name varchar(100) not null,
baby_name varchar (100) not null,
baby_dob date not null,
phone_home text,
phone_mobile text,
line_id text,
email varchar(100),
address text,
city_id int,
province_id int,
ZIP int,
favorite_toys text,
milestones text,
primary key (cust_id),
foreign key (province_id) references province (province_id) on update cascade on delete cascade,
foreign key (city_id) references city (city_id) on update cascade on delete cascade
);


create table subscription(
sub_id serial,
cust_id serial,
status varchar(20),
subs_plan int,
num_ofToys int,
first_deliv date,
final_pickup date,
subs_price date,
subs_promo int,
deliv_price int,
deliv_promo int,
deposit int,
payment_terms varchar(20),
deposit_refund date,
deposit_status text,
primary key (subs_id),
foreign key (cust_id) references cutomer (cust_id) on update cascade on delete cascade,
);