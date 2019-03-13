create database demo;

use demo;

create table usuario(
	id int(11) not null auto_increment ,
    username varchar(45) not null ,
    password varchar(45) not null,
    constraint pk_usuario primary key (id)
);

select * from usuario;

insert into usuario (username ,password) 
values ('mortegalex27@outlook.es' , 'abc123**');

SELECT *
						 FROM usuario
						 WHERE username = 'system'
						 AND password = 'nanita';
                         
                         SELECT *
						 FROM usuario
						 WHERE username = 'system'
						 AND password = 'nanita';

alter table usuario 
add column name varchar(45) not null;

update usuario 
set name = "Marlon Ortega" 
where id = 1 ;


INSERT INTO usuario (name , username , password)
						 VALUES( 'Alex' , 'mortegalex27@outlook.es' , 'abc123**' );
                         
create table nota (
	id int(11) not null auto_increment ,
    usuario int(11) not null,
    titulo varchar(100) not null ,
    description varchar(100) not null ,
    create_at timestamp default current_timestamp ,
    constraint pk_nota primary key(id) ,
    constraint fk_nota_usuario foreign key (usuario) references usuario(id)
);

select * from usuario;
insert into nota (usuario , titulo , description ) 
values (2 , 'new note' , 'desde mysql');

SELECT * from nota;

INSERT INTO nota ( usuario , titulo , description)
					 VALUES (2 , 'new note for view' , 'desde web') ;

SELECT * FROM nota WHERE usuario = 2 order by create_at desc;

delete from nota where id = 4;


			
            
            

