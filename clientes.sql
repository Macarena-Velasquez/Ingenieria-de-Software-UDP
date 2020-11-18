-- Create a new database called 'DatabaseName'
-- Connect to the 'master' database to run this snippet
USE master
GO
-- Create the new database if it does not exist already
IF NOT EXISTS (
    SELECT name
        FROM sys.databases
        WHERE name = N'DB_Eaglecopters'
)
CREATE DATABASE DatabaseName
GO


-- Create a new table called 'admin' in schema 'DB_Eaglecopters'
-- Drop the table if it already exists
IF OBJECT_ID('DB_Eaglecopters.cliente', 'U') IS NOT NULL
DROP TABLE DB_Eaglecopters.cliente
GO
-- Create the table in the specified schema
CREATE TABLE DB_Eaglecopters.cliente
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
IF OBJECT_ID('DB_Eaglecopters.Ejecutivos', 'U') IS NOT NULL
DROP TABLE DB_Eaglecopters.Ejecutivos
GO
-- Create the table in the specified schema
CREATE TABLE DB_Eaglecopters.Ejecutivos
(
    EmpresaID INT NOT NULL PRIMARY KEY, -- primary key column
    nombre [NVARCHAR](256) NOT NULL,
    FOREIGN KEY(datosID) REFERENCES users(usersID)
    --correo [NVARCHAR](50) NOT NULL,
    --pass [NVARCHAR](256) NOT NULL
    
);
GO

-- Create a new table called 'admin' in schema 'DB_Eaglecopters'
-- Drop the table if it already exists
IF OBJECT_ID('DB_Eaglecopters.admin', 'U') IS NOT NULL
DROP TABLE DB_Eaglecopters.admin
GO
-- Create the table in the specified schema
CREATE TABLE DB_Eaglecopters.admin
(
    adminID INT NOT NULL PRIMARY KEY, -- primary key column
    nombre [NVARCHAR](50) NOT NULL,
    FOREIGN  KEY(datosID) REFERENCES users(usersId)
    --correo [NVARCHAR](50) NOT NULL,
    --pass  [NVARCHAR](50) NOT NULL
    
);
GO

-- Create a new table called 'Empresa' in schema 'DB_Eaglecopters'
-- Drop the table if it already exists
IF OBJECT_ID('DB_Eaglecopters.Empresa', 'U') IS NOT NULL
DROP TABLE DB_Eaglecopters.Empresa
GO
-- Create the table in the specified schema
CREATE TABLE DB_Eaglecopters.Empresa
(
    EmpresaID INT NOT NULL PRIMARY KEY, -- primary key column
    nombre [NVARCHAR](256) NOT NULL,
    FOREIGN KEY (rubroID) REFERENCES rubro(rubroID)
    
);
GO

-- Create a new table called 'rubro' in schema 'DB_Eaglecopters'
-- Drop the table if it already exists
IF OBJECT_ID('DB_Eaglecopters.rubro', 'U') IS NOT NULL
DROP TABLE DB_Eaglecopters.rubro
GO
-- Create the table in the specified schema
CREATE TABLE DB_Eaglecopters.rubro
(
    rubroID INT NOT NULL PRIMARY KEY, -- primary key column
    nombre [NVARCHAR](256) NOT NULL,
    tipo [NVARCHAR](256) NOT NULL
    
);
GO

-- Create a new table called 'Heli' in schema 'DB_Eaglecopters'
-- Drop the table if it already exists
IF OBJECT_ID('DB_Eaglecopters.Heli', 'U') IS NOT NULL
DROP TABLE DB_Eaglecopters.Heli
GO
-- Create the table in the specified schema
CREATE TABLE DB_Eaglecopters.Heli
(
    HeliId INT NOT NULL PRIMARY KEY, -- primary key column
    modelo [NVARCHAR](50) NOT NULL,
    marca [NVARCHAR](50) NOT NULL,
    patente_tipo [NVARCHAR](50) NOT NULL
    
);
GO

-- Create a new table called 'users' in schema 'BD_Eaglecopters'
-- Drop the table if it already exists
IF OBJECT_ID('BD_Eaglecopters.users', 'U') IS NOT NULL
DROP TABLE BD_Eaglecopters.users
GO
-- Create the table in the specified schema
CREATE TABLE BD_Eaglecopters.users
(
    usersId INT NOT NULL PRIMARY KEY, -- primary key column
    correo [NVARCHAR](50) NOT NULL,
    pass [NVARCHAR](50) NOT NULL
    
);
GO