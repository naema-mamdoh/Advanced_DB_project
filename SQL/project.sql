create database City;
use City;
create table Student(
Ssn varchar(14) primary key,
S_name varchar(60),
pass varchar(20),
Gender varchar(10),
BD date,
adress varchar(40),
Religion varchar(10),
Governorate varchar(30),
E_mail varchar(30),
State varchar(3),#new or old
Faculty varchar(60),
Gpa float,
S_Level int,
phone varchar(11),
accepted bool
);

create table Guardian(
G_ssn varchar(14) primary key,
G_name varchar(60),
Job varchar(60),
S_ssn varchar(14)  ,
phone varchar(11),
FOREIGN KEY (S_ssn) REFERENCES Student(Ssn) ON DELETE CASCADE ON UPDATE CASCADE
);

create table Governorates(
Gover_name varchar(20) primary key ,
distance int
);

insert into Governorates values ("Cairo",379) ,("Giza",374),("Minya",130),("Sohag",97),("Alexandria",570),("Suez",477),("Faiyum",317),("Qena",278),("Red Sea",419),("Beheira",582),("Ismailia",422),("Aswan",456),("Port Said",551),("Beni Suef",370),("New Valley",234),("Luxor",277),("Dakahlia",504),("Gharbia",463),("Matrouh",781),("Ash Sharqia",461),("Menofia",431),("South Sinai",596),("North Sinai",683),("Helwan",357),("Kafr el-Sheikh",555),("Qulyubia",471),("Damietta",603),("assuit",0)

delimiter //
create function calc(gpa float, dis int) 
returns bool
begin
if (gpa<2.0  )then
return false;
elseif ((dis>=90&&dis<=150)&&(gpa>=2.7)) then
return true;
elseif ((dis>=150)&&(gpa>=2.3)) then
return true;
elseif ((dis<90)&&(gpa>=3.0)) then
return true;
else
return false;
end if; 
end //
delimiter ;


delimiter //
create procedure push_student(s_ssn varchar(14), s_name varchar(60),pass_word varchar(20),gender varchar(10),bd date, address varchar(40),
religion varchar(20),governorate varchar(30),email varchar(30),state varchar(30),faculty nvarchar(60),grade float,s_level int,
g_ssn varchar(14),g_name varchar(60),job varchar(60),Gphone varchar(11),Sphone varchar(11))## will be called only after validation
begin
declare dd int;
select distance into dd from Governorates where Gover_name=governorate;
if( calc(grade, dd)) then
insert into Student values(s_ssn, s_name,pass_word,gender,bd,address,religion,governorate,email,state,faculty,grade,s_level,Sphone,true);
insert into Guardian values(g_ssn,g_name,job,s_ssn,Gphone);
else
insert into Student values(s_ssn, s_name,pass_word,gender,bd,address,religion,governorate,email,state,faculty,grade,s_level,Sphone,false);
insert into Guardian values(g_ssn,g_name,job,s_ssn,Gphone);
end if;
end//
delimiter ;
 

delimiter //
create procedure dis_result(snN varchar(14))
begin
declare s bool;
select accepted into s from Student where Ssn=snN;
if(s) then 
select "you are accepted" as message;
else
select "sorry , you are not accepted" as message;
end if;
end//
delimiter ;

call dis_result("11551");

delimiter //
create trigger encrypt
before insert on Student
for each row
begin
set new.pass=AES_ENCRYPT(new.pass,"FCI4");
end//
delimiter ;

call  push_student("9193175","aa","asd","mail",Date'2000-5-5',"street15","mm","Sohag","email@gamil.com","new","assuit",2.0,1,"94518921","bb","writer","12365484854","12345698741");
select * from Student; 
