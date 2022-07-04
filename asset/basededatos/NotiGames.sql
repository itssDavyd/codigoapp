CREATE DATABASE IF NOT EXISTS notigames;

USE notigames;

CREATE TABLE IF NOT EXISTS Persona
(
ID_Persona integer unsigned auto_increment primary key,
Nombre varchar(25) not null,
Apellidos varchar(50) not null,
email varchar(50) not null,
telefono char(9) not null,
Provincia varchar(25) not null,
Ciudad varchar(25) not null,
foto varchar(200) null,
Usuario varchar(25) not null,
Pass varchar(60) not null,
rol enum('admin','user') not null default 'user'
);

CREATE TABLE IF NOT EXISTS Categoria
(
ID_Categoria integer unsigned auto_increment primary key,
Nombre_Cat varchar(20) not null
);

CREATE TABLE IF NOT EXISTS POST
(
ID_POST Integer unsigned auto_increment primary key,
Titulo varchar(50) not null,
Texto varchar(1500) not null,
fecha_Post datetime not null default CURRENT_TIMESTAMP,
ID_Persona_Post integer unsigned,
ID_Categoria_Post integer unsigned,
CONSTRAINT fk_ID_Categoria_Post FOREIGN KEY (ID_Categoria_Post) REFERENCES Categoria(ID_Categoria),
CONSTRAINT fk_ID_Persona_Post FOREIGN KEY (ID_Persona_Post) REFERENCES Persona(ID_Persona)
);

CREATE TABLE IF NOT EXISTS POST_PERSONA_COMENTAR
(
ID_Comentario integer unsigned auto_increment PRIMARY KEY,
ID_POST_Comentar integer unsigned,
ID_Persona_Comentar integer unsigned,
comentario varchar(200) not null, 
fecha_Comentario datetime not null default CURRENT_TIMESTAMP,
CONSTRAINT fk_ID_Post_comentario FOREIGN KEY (ID_POST_Comentar) REFERENCES POST(ID_POST),
CONSTRAINT fk_ID_Persona_comentario FOREIGN KEY (ID_Persona_Comentar) REFERENCES Persona(ID_Persona)
);

CREATE TABLE IF NOT EXISTS Cat_Estadistica_CSGO
(
ID_Estadistica integer unsigned auto_increment primary key,
n_horas varchar(10) null,
MMR varchar(20) null,
n_kills varchar(10) null,
muertes varchar(10) null,
ID_Categoria_StatCSGO integer unsigned,
ID_Persona_StatCSGO integer unsigned,
CONSTRAINT fk_ID_Persona_StatCSGO FOREIGN KEY (ID_Persona_StatCSGO) REFERENCES Persona(ID_Persona),
CONSTRAINT fk_ID_Categoria_StatCSGO FOREIGN KEY (ID_Categoria_StatCSGO) REFERENCES Categoria(ID_Categoria)
);

CREATE TABLE IF NOT EXISTS Cat_Estadistica_LOL
(
ID_Estadistica integer unsigned auto_increment primary key,
n_horas varchar(10) null,
MMR varchar(15) null,
rol varchar(10) null,
ID_Persona_StatLOL integer unsigned,
CONSTRAINT fk_ID_Persona_StatLOL FOREIGN KEY (ID_Persona_StatLOL) REFERENCES Persona(ID_Persona),
ID_Categoria_StatLOL integer unsigned,
CONSTRAINT fk_ID_Categoria_StatLOL FOREIGN KEY (ID_Categoria_StatLOL) REFERENCES Categoria(ID_Categoria)
);

CREATE TABLE IF NOT EXISTS Cat_Estadistica_RL
(
ID_Estadistica integer unsigned auto_increment primary key,
n_horas varchar(10) null,
MMR varchar(20) null,
goles varchar(10) null,
saves varchar(10) null,
ID_Persona_StatRL integer unsigned,
CONSTRAINT fk_ID_Persona_StatRL FOREIGN KEY (ID_Persona_StatRL) REFERENCES Persona(ID_Persona),
ID_Categoria_StatRL integer unsigned,
CONSTRAINT fk_ID_Categoria_StatRL FOREIGN KEY (ID_Categoria_StatRL) REFERENCES Categoria(ID_Categoria)
);

INSERT INTO Categoria (Nombre_Cat) 
        VALUES ("Counter-Striker"),
                ("Rocket League"),
                ("League Of Legends");

INSERT INTO Persona (Nombre,Apellidos,email,telefono,Provincia,Ciudad,Usuario,Pass,rol)
        VALUES ("Administrador","De NotiGames","admin@gmail.com","258666951","Pontevedra","Vigo","Admin","$2y$10$Ko.85WnLKILD7RJ/veymKOOdmt2B30PwFE9D4RV4CmESDf04ifQBK", 'admin');

INSERT INTO Persona(Nombre,Apellidos,email,telefono,Provincia,Ciudad,Usuario,Pass) 
        VALUES ("David", "Fernandez", "david@gmail.com","123456789","Pontevedra","Vigo","itsDavyd","$2y$10$AavdW/OUVZLa5.c0o3CPveF7Z6yXlSMEwq1teIidxRGZn/kqnGr9G"),
                ("Jose","Chavez" ,"jose@gmail.com","789321546","Pontevedra","Vigo","Jose","$2y$10$Ko.85WnLKILD7RJ/veymKOOdmt2B30PwFE9D4RV4CmESDf04ifQBK"),
                ("Yampi","tryndamer","yampi@hotmail.com","987654321","Pontevedra","Vigo","yampi","$2y$10$CLm8X1ETcTh.xPq2Le7hzuuEtbooTK/FRctzHkLKddCnAoSlOGct2"),
                ("VickyG","Gutierrez","vicky_G@gmail.com","654789321","Pontevedra","Vigo","vicky","$2y$10$Ik1XWXhWcrJ1GsM0r7AyTOJG2Ejr2mh2D0erjIyG4qFRKCOKNTAUW");


INSERT INTO POST (Titulo,Texto,ID_Persona_Post,ID_Categoria_Post,fecha_Post) 
                        VALUES ("CSGO_POST","hola este post es de CSGOhola este post es de CSGOhola este post es de CSGOhola este post es de CSGOhola este post es de CSGOhola este post es de CSGOhola este post es de CSGOhola este post es de CSGOhola este post es de CSGOhola este post es de CSGOhola este post es de CSGOhola este post es de CSGOhola este post es de CSGOhola este post es de CSGOhola este post es de CSGOhola este post es de CSGOhola este post es de CSGOhola este post es de CSGOhola este post es de CSGOhola este post es de CSGOhola este post es de CSGOhola este post es de CSGOhola este post es de CSGOhola este post es de CSGOhola este post es de CSGOhola este post es de CSGO",4,1,'2021-03-12 06:15:01'),
                                ("RL_POST","este post es de rl",2,2,'2020-03-12 03:15:01'),
                                ("LOL_POST","este post es de LOL",3,3,'2022-05-11 02:12:01'),
                                ("CSGO_NUEVO","este post es de CSGO ULTIMO",4,1,'2021-05-13 07:15:01'),
                                ("RL_NUEVO_COCHE","Nuevo coche",2,2,'2022-03-12 05:15:01');

INSERT INTO POST_PERSONA_COMENTAR (ID_POST_Comentar, ID_Persona_Comentar, comentario,fecha_Comentario) VALUES ('5', '4', 'Esta bueno', '2022-03-12 05:15:01'),
                                                                                                                ('5', '2', 'Si ta bueno', '2022-03-11 12:05:48');

INSERT INTO Cat_Estadistica_CSGO (n_horas, MMR, n_kills, muertes, ID_Categoria_StatCSGO, ID_Persona_StatCSGO) VALUES ('1500', 'Aguila Dorada', '15000', '10000', '1', '2'), 
                                                                                                                        ('2000', 'Global', '10000', '15000', '1', '3');

INSERT INTO Cat_Estadistica_LOL (n_horas,MMR, rol, ID_Persona_StatLOL, ID_Categoria_StatLOL) VALUES ('1500', 'Diamante', 'Support', '2', '3'),
                                                                                                        ('2000', 'Platino', 'Adc', '3', '3');

INSERT INTO Cat_Estadistica_RL (n_horas, MMR, goles, saves, ID_Persona_StatRL, ID_Categoria_StatRL) VALUES ('1000', 'Grand Champion', '15000', '25000', '2', '2'), 
                                                                                                                ('1500', 'Champion', '5000', '7000', '3', '2');                                                                            