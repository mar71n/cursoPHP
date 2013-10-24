CREATE TABLE usuario(
	usuario int not null, 
	nombre varchar(50), 
	apellido varchar(50), 
	clave varchar(50), 
	dni varchar(10), 
	idsector int, 
	sexo int, 
	ruta_imagen varchar(100), 
	fecha_alta datetime
);

INSERT INTO usuario (usuario, nombre, apellido, clave, dni, idsector, sexo, ruta_imagen , fecha_alta )
values (1, 'nombre1', 'apellido1', 'clave1', '11000221', 1, 1, '', now() ),
	   (2, 'nombre2', 'apellido2', 'clave2', '11000222', 1, 1, '', now() ),
	   (3, 'nombre3', 'apellido3', 'clave3', '11000223', 1, 1, '', now() ),
	   (4, 'nombre4', 'apellido4', 'clave4', '11000224', 1, 1, '', now() ),
	   (5, 'nombre5', 'apellido5', 'clave5', '11000225', 1, 1, '', now() );
