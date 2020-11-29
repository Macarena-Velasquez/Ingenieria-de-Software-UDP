CREATE DATABASE IF NOT EXISTS Eaglecopters;

USE Eaglecopters;

CREATE TABLE IF NOT EXISTS Cliente(
	ID INT NOT NULL AUTO_INCREMENT,
	Nombre VARCHAR(256) NOT NULL,
	empresaID INT,
        email NCHAR(255),
        telefono INT,
	objetivoID INT,
	fecha INT NOT NULL,
	comentarios VARCHAR(1024),
	notificacion INT DEFAULT NULL,
	PRIMARY KEY(ID),
	FOREIGN KEY (empresaID) REFERENCES Empresa(ID),
	FOREIGN KEY (bbjetivoID) REFERENCES Helicopteros(ID)
    
);



CREATE TABLE IF NOT EXISTS Ejecutivos
(
    ID INT NOT NULL AUTO_INCREMENT, 
    nombre VARCHAR(256) NOT NULL,
    usuariosID INT NOT NULL,
    PRIMARY KEY(ID),
    FOREIGN KEY(datosID) REFERENCES usuarios(ID)
    
);




CREATE TABLE IF NOT EXISTS Administrador
(
    ID INT NOT NULL AUTO_INCREMENT, 
    nombre VARCHAR(256) NOT NULL,
    usuarioID INT NOT NULL,
    PRIMARY KEY (ID),
    FOREIGN  KEY(datosID) REFERENCES usuarios(ID)
   
    
);



CREATE TABLE IF NOT EXISTS Empresa
(
    ID INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(256) NOT NULL,
    rubroID INT NOT NULL,
    PRIMARY KEY(ID),
    FOREIGN KEY(rubroID) REFERENCES Rubros(ID)
    
);


CREATE TABLE IF NOT EXISTS Rubros
(
    ID INT NOT NULL AUTO_INCREMENT,
    nombre NCHAR(255) NOT NULL,
    PRIMARY KEY(ID)
    
);


CREATE TABLE IF NOT EXISTS Helicopteros
(
    ID INT NOT NULL AUTO_INCREMENT,
    modelo VARCHAR(50) NOT NULL,
    marca VARCHAR(50) NOT NULL,
    patente_tipo VARCHAR(50) NOT NULL,
    PRIMARY KEY(ID)
    
);


CREATE TABLE IF NOT EXISTS usuarios
(
    ID INT NOT NULL AUTO_INCREMENT, 
    mail VARCHAR(50) NOT NULL,
    pass NCHAR(70) NOT NULL,
    nombre VARCHAR(50) NOT NULL,
    telefono VARCHAR(50) NOT NULL,	
    PRIMARY KEY (ID)
    
);

