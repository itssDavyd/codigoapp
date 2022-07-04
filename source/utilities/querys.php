<?php

/** ALMACEN DE CONSULTAS A REALIZAR: */


$GET_POSTS_SQL = 'SELECT P.ID_POST , P.Titulo , P.texto , concat(PE.Nombre," ",PE.Apellidos) as nombrePersona, P.fecha_Post FROM POST as P INNER JOIN Persona as PE ON ID_Persona_Post = ID_Persona WHERE fecha_Post < CURRENT_TIMESTAMP;';

$GET_ALL_PERSONS_SQL = 'SELECT ID_Persona , Nombre , Apellidos , email , foto, telefono , Provincia , Ciudad , Usuario, Pass FROM Persona';

$GET_PERSON_SQL = 'SELECT ID_Persona , Nombre , Apellidos , email , foto, telefono , Provincia , Ciudad , Usuario, Pass, rol FROM Persona WHERE Usuario = :USER';

$GET_POST_BY_ID_SQL = 'SELECT P.ID_POST , P.Titulo , P.texto , concat(PE.Nombre," ",PE.Apellidos) as nombrePersona, P.fecha_Post, P.ID_Persona_Post, P.ID_Categoria_Post FROM POST as P INNER JOIN Persona as PE ON ID_Persona_Post = ID_Persona WHERE P.ID_POST = :ID_POST';

$UPDATE_POST_BY_ID = "UPDATE POST SET Titulo = :TITULO, Texto = :TEXTO, fecha_Post = :FECHA_POST, ID_Persona_Post = :ID_PERSONA, ID_Categoria_Post = :ID_CATEGORIA WHERE ID_POST = :ID_POST;";

$GET_COMENTARIOS_BY_ID_SQL = 'SELECT PC.ID_Comentario, PC.ID_POST_Comentar, concat(PE.Nombre," ",PE.Apellidos) as nombrePersona, PC.ID_Persona_Comentar , PC.comentario , PC.fecha_comentario FROM POST_PERSONA_COMENTAR as PC INNER JOIN Persona as PE ON PC.ID_Persona_Comentar = PE.ID_Persona WHERE ID_POST_Comentar = :ID_POST;';

$DELETE_COMENTARIO_BY_ID = 'DELETE FROM POST_PERSONA_COMENTAR WHERE ID_Comentario = :ID_COMENTARIO;';

$INSERT_USUARIO = 'INSERT INTO Persona (Nombre,Apellidos,email ,telefono,Provincia,Ciudad,Usuario,Pass) VALUES (:NOMBRE,:APELLIDOS,:EMAIL,:TELEFONO,:PROVINCIA,:CIUDAD,:USUARIO,:PASS);';

$GET_STAT_LOL = "SELECT n_horas ,MMR , rol FROM Cat_Estadistica_LOL WHERE ID_Persona_StatLOL = :ID_PERSONA;";
$GET_STAT_CS = "SELECT n_horas ,MMR , n_kills , muertes FROM Cat_Estadistica_CSGO WHERE ID_Persona_StatCSGO = :ID_PERSONA;";

$INSERT_CREACION_POST_SQL = "INSERT INTO POST (Titulo,Texto,ID_persona_Post,ID_Categoria_Post,fecha_Post) VALUES (:titulo,:texto,:id_persona,:id_categoria,:fecha_post);";

$GET_CATEGORIAS_SQL = "SELECT ID_Categoria, Nombre_Cat FROM Categoria;";

$GET_POST_BY_ID_CATEGORIA_SQL = 'SELECT P.ID_POST , P.Titulo , P.texto , concat(PE.Nombre," ",PE.Apellidos) as nombrePersona, P.fecha_Post FROM POST as P INNER JOIN Persona as PE ON P.ID_Persona_Post = PE.ID_Persona where ID_Categoria_Post = :ID_Categoria;';
$GET_STAT_RL = "SELECT n_horas , MMR , goles , saves FROM Cat_Estadistica_RL WHERE ID_Persona_StatRL = :ID_PERSONA;";

$SET_STAT_LOL = "INSERT INTO Cat_Estadistica_LOL (n_horas,MMR, rol, ID_Persona_StatLOL, ID_Categoria_StatLOL) VALUES (:NHORAS, :MMR, :ROL, :ID_PERSONA, '3')";
$SET_STAT_CS = "INSERT INTO Cat_Estadistica_CSGO (n_horas, MMR, n_kills, muertes, ID_Persona_StatCSGO, ID_Categoria_StatCSGO) VALUES (:NHORAS, :MMR, :KILLS, :MUERTES, :ID_PERSONA, '1')";
$SET_STAT_RL = "INSERT INTO Cat_Estadistica_RL (n_horas, MMR, goles, saves, ID_Persona_StatRL, ID_Categoria_StatRL) VALUES (:NHORAS, :MMR, :GOLES, :SAVES, :ID_PERSONA, '2')";

$UPDATE_STAT_LOL = "UPDATE Cat_Estadistica_LOL SET n_horas = :NHORAS, MMR = :MMR, rol = :ROL WHERE ID_Persona_StatLOL = :ID_PERSONA;";;
$UPDATE_STAT_CS = "UPDATE Cat_Estadistica_CSGO SET n_horas = :NHORAS, MMR = :MMR, n_kills = :KILLS, muertes = :MUERTES WHERE ID_Persona_StatCSGO = :ID_PERSONA;";
$UPDATE_STAT_RL = "UPDATE Cat_Estadistica_RL SET n_horas = :NHORAS, MMR = :MMR, goles = :GOLES, saves = :SAVES WHERE ID_Persona_StatRL = :ID_PERSONA;";

$UPDATE_USUARIO = "UPDATE Persona SET Nombre = :NOMBRE, Apellidos = :APELLIDOS, email = :EMAIL, telefono = :TELEFONO, Provincia = :PROVINCIA, Ciudad = :CIUDAD, Usuario = :USER, Pass = :PASS WHERE ID_Persona = :ID_PERSONA;";

$DELETE_POST_BY_ID = "DELETE FROM POST WHERE ID_POST = :ID_POST;";

$SET_COMENTARIO = "INSERT INTO POST_PERSONA_COMENTAR (ID_POST_Comentar, ID_Persona_Comentar, comentario) VALUES (:ID_POST, :ID_PERSONA, :COMENTARIO );";

$UPDATE_FOTO = "UPDATE Persona SET foto = :URL_FOTO  WHERE ID_Persona = :ID_PERSONA;";

$FILTER_POSTS_BY_FECHA_SQL = 'SELECT P.ID_POST , P.Titulo , P.texto , concat(PE.Nombre," ",PE.Apellidos) as nombrePersona, P.fecha_Post FROM POST as P INNER JOIN Persona as PE ON ID_Persona_Post = ID_Persona WHERE fecha_Post BETWEEN :FECHA_FROM AND :FECHA_TO ORDER BY fecha_Post DESC;';

$SEARCH_FILTER_SQL = 'SELECT P.ID_POST , P.Titulo , P.texto , concat(PE.Nombre," ",PE.Apellidos) as nombrePersona, P.fecha_Post FROM POST as P INNER JOIN Persona as PE ON ID_Persona_Post = ID_Persona WHERE Titulo LIKE concat("%",:filtro,"%");';
