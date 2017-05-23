create table sexo
(
	sexo text NOT NULL,
	PRIMARY KEY (sexo)
	
	);
	
create table Carreras
(
	id bigserial NOT NULL,
	nombre text NOT NULL,
	PRIMARY KEY (id)
	
	);

create table semestres
(
	id bigserial NOT NULL,
	nombre text NOT NULL,
	PRIMARY KEY (id)

	);

create table grupos
(
	id bigserial NOT NULL,
	nombre text NOT NULL,
	nu_carrera bigint NOT NULL,
	nu_semestre text,
	PRIMARY KEY (id),
FOREIGN KEY (nu_carrera) REFERENCES Carreras(id)

	); 
	
create table Alumnos
(
	id bigserial NOT NULL,
	nombre text NOT NULL,
	paterno text NOT NULL,
	materno text,
	matricula text NOT NULL,
	direccion text,
	telefono text,
	email text,
	sexo text NOT NULL,
	edad integer NOT NULL,
	nu_carrera bigint NOT NULL,
	PRIMARY KEY (id),
	FOREIGN KEY (nu_carrera) REFERENCES Carreras(id),
CHECK (edad >=0)

	);

create table docentes
(
	id bigserial NOT NULL,
	nombre text NOT NULL,
	paterno text NOT NULL,
	materno text NOT NULL,
	telefono text NOT NULL,
	email text,
	direccion text,
	facebook text,
	PRIMARY KEY (id)
	);

create table diagnostico_grupal
(
	id bigserial NOT NULL,
	descripcion_general text NOT NULL,
	nu_alumnos bigint NOT NULL,
	nu_docentes bigint NOT NULL,
	sesion text NOT NULL,
	PRIMARY KEY (id),
FOREIGN KEY (nu_alumnos) REFERENCES alumnos(id),
FOREIGN KEY (nu_docentes) REFERENCES docentes(id)
	);


create table sesionesdeplantutorial
(
	id bigserial NOT NULL,
	actividad text NOT NULL,
	nombre text NOT NULL,
	objetivo text NOT NULL,
	fecha text NOT NULL,
	PRIMARY KEY (id)

	);

create table periodossemestral
(
	id bigserial NOT NULL,
	nu_carrera bigint NOT NULL,
	nu_grupo bigint NOT NULL,
	nu_semestre bigint NOT NULL,
	periodo text NOT NULL,
	PRIMARY KEY (id),
FOREIGN KEY (nu_grupo) REFERENCES grupos(id),
FOREIGN KEY (nu_semestre) REFERENCES semestres(id)

	);