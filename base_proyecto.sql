create database pro;
use pro;

create table usuario(
id int primary key auto_increment not null,
usuario varchar(50) not null,
pass varchar(10) not null,
nivel int not null
);
create table materias(
id int primary key not null,
nombre varchar(40) not null
);
create table grado(
id int primary key not null,
grado varchar(50) not null
);
create table estudiante(
id int primary key auto_increment not null,
nombre varchar(70) not null,
apellidos varchar(70) not null,
edad int not null,
fechaNa varchar(30) not null,
contacto varchar(9) not null,
grado int not null,
representante varchar(50) not null,
direccion varchar(80) not null,
foreign key (grado) references grado (id)
);
create table notas(
idestudiante int not null,
idmateria int not null,
nota double not null,
foreign key (idestudiante) references estudiante (id),
foreign key (idmateria) references materias (id)
);

alter table notas drop column estado ;
insert into materias(id, nombre) values (3, "Ciencias"), (4, "Sociales");
insert into grado(id, grado) values (1,"Primero"), (2,"Segundo"),(3,"Tercero");
insert into estudiante(nombre, apellidos, edad, fechaNa, contacto, grado, representante, direccion ) values ("Kathelin Dayana", "Henriquez Hernandez",19,"05/10/2002","1234-1234",1, "Blanca Flor hernandez","20 calle poniente, colonia luz");
insert into usuario(usuario, pass, nivel) values ("admin","admin123",1);

select* from notas;

insert into notas (idestudiante, idmateria, nota) values (1,1,9.0), (1,2,8.0);

SELECT idestudiante, idmateria, nota FROM notas WHERE idestudiante = 1;


UPDATE notas 
SET idestudiante="1",idmateria="2", nota="7"  WHERE idestudiante="1" and idmateria="2";