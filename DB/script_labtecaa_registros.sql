#Base de datos "labtecaa_registros"

#drop database if exists labtecaa_registros;
create database labtecaa_registros;
use labtecaa_registros;

create table datos_usuario(
	id int not null auto_increment primary key,
    nombre varchar(45) not null,
    a_paterno varchar(45) not null,
    a_materno varchar(45) not null,
    email varchar(60) not null
);

select * from datos_usuario;





delete from datos_usuario where id=3;
drop table datos_usuario;