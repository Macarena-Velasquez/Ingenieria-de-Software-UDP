

CREATE DATABASE IF NOT EXISTS 'BD_Eaglecopters';

USE BD_Eaglecopters;


-- Create a new table called 'admin' in schema 'DB_Eaglecopters'
-- Drop the table if it already exists


CREATE TABLE IF NOT EXISTS cliente
(
    clienteID INT NOT NULL PRIMARY KEY, -- primary key column
    Nombre [NVARCHAR](256) NOT NULL,
    FOREIGN KEY (EmpresaID) REFERENCES Empresas(EmpresaID)
    --Empresa [NVARCHAR](256) NOT NULL,
    Objetivo [NVARCHAR](256) NOT NULL,
    Tiempo INT NOT NULL,
    Apuntes [NVARCHAR](1024)
    
);


-- Create a new table called 'Ejecutivos' in schema 'DB_Eaglecopters'
-- Drop the table if it already exists

CREATE TABLE IF NOT EXISTS Ejecutivos
(
    EmpresaID INT NOT NULL PRIMARY KEY, -- primary key column
    nombre [NVARCHAR](256) NOT NULL,
    FOREIGN KEY(datosID) REFERENCES users(usersID)
    --correo [NVARCHAR](50) NOT NULL,
    --pass [NVARCHAR](256) NOT NULL
    
);


-- Create a new table called 'Administrador' in schema 'DB_Eaglecopters'
-- Drop the table if it already exists

CREATE TABLE IF NOT EXISTS Administrador
(
    adminID INT NOT NULL PRIMARY KEY, -- primary key column
    nombre [NVARCHAR](50) NOT NULL,
    FOREIGN  KEY(datosID) REFERENCES users(usersId)
    --correo [NVARCHAR](50) NOT NULL,
    --pass  [NVARCHAR](50) NOT NULL
    
);



CREATE TABLE IF NOT EXISTS Empresa
(
    EmpresaID INT NOT NULL PRIMARY KEY, -- primary key column
    nombre [NVARCHAR](256) NOT NULL,
    FOREIGN KEY (rubroID) REFERENCES rubro(rubroID)
    
);


CREATE TABLE DB_Eaglecopters.rubro
(
    rubroID INT NOT NULL PRIMARY KEY, -- primary key column
    nombre [NVARCHAR](256) NOT NULL,
    tipo [NVARCHAR](256) NOT NULL
    
);
GO

-- Create a new table called 'Helicopteros' in schema 'DB_Eaglecopters'
-- Drop the table if it already exists

CREATE TABLE IF NOT EXISTS Helicopteros
(
    HeliId INT NOT NULL PRIMARY KEY, -- primary key column
    modelo [NVARCHAR](50) NOT NULL,
    marca [NVARCHAR](50) NOT NULL,
    patente_tipo [NVARCHAR](50) NOT NULL
    
);
GO

-- Create a new table called 'users' in schema 'BD_Eaglecopters'
-- Drop the table if it already exists


CREATE TABLE IF NOT EXISTS users
(
    usersId INT NOT NULL PRIMARY KEY, -- primary key column
    correo [NVARCHAR](50) NOT NULL,
    pass [NVARCHAR](50) NOT NULL
    
);

