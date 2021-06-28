CREATE DATABASE `BDHotela`; 
USE `BDHotela`;


CREATE TABLE IF NOT EXISTS `TEmpleado` (

  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(50) NOT NULL,
  `Apellido` VARCHAR(50) NOT NULL,
  `Correo` VARCHAR(50) NOT NULL,
  `Telefono` VARCHAR(50) NOT NULL,
  `FechaNacimiento` DATE NOT NULL,
  `Usuario` VARCHAR(50) NOT NULL,
  `Passwor` VARCHAR(50) NOT NULL,
  `TipoUsuario` INTEGER NOT NULL,
  PRIMARY KEY (`id`)
  
) ENGINE=INNODB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `TCliente` (

  `documento` VARCHAR(8) NOT NULL,
  `TipoDocumento` VARCHAR(8) NOT NULL,
  `Nombre` VARCHAR(50) NOT NULL,
  `Apellidos` VARCHAR(50) NOT NULL,
  `Correo` VARCHAR(50) NOT NULL,
  `Telefono` VARCHAR(50) NOT NULL,
  `FechaNacimiento` DATE NOT NULL,
  PRIMARY KEY (`documento`)
  
) ENGINE=INNODB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `THabitacion` (

  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(50) NOT NULL,
  `Descripcion` VARCHAR(200) NOT NULL,
  `Tipo` VARCHAR(50) NOT NULL,
  `NroCamas` INTEGER(2) NOT NULL,
  `Precio` DECIMAL(6,2) NOT NULL,
  `Habilitada` INTEGER(1) NOT NULL,
  `Imagen` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`)
  
) ENGINE=INNODB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `TServicios` (

  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(50) NOT NULL,
  `Descripcion` VARCHAR(200) NOT NULL,
  `Precio` DECIMAL(6,2) NOT NULL,
  PRIMARY KEY (`id`)
  
) ENGINE=INNODB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `TReserva` (

  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `Habilitada` INTEGER(1) NOT NULL,
  `FechaRegistro` DATE NOT NULL,
  `FechaVencimiento` DATE NOT NULL,
  `Aprobada` INTEGER(1) NULL,
  `Codigo` VARCHAR(15) NOT NULL,
  `Habitacion` INT(11) NULL,
  `Empleado` INT(11) NULL,
  `Cliente` VARCHAR(8) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (Habitacion) REFERENCES THabitacion(id),
  FOREIGN KEY (Empleado) REFERENCES TEmpleado(id),
  FOREIGN KEY (Cliente) REFERENCES TCliente(documento)
  
) ENGINE=INNODB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `TEntrada` (

  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `Fecha` DATE NOT NULL,
  `SubTotal` DECIMAL(6,2) NOT NULL,
  `Servicio` INT(11) NULL,
  `Cliente` VARCHAR(8) NOT NULL,
  `Empleado` INT(11) NOT NULL,
  `Reserva` INT(11) NOT NULL UNIQUE,
  PRIMARY KEY (`id`),
  FOREIGN KEY (Cliente) REFERENCES TCliente(documento),
  FOREIGN KEY (Empleado) REFERENCES TEmpleado(id),
  FOREIGN KEY (Reserva) REFERENCES TReserva(id),
  FOREIGN KEY (Servicio) REFERENCES TServicios(id)

) ENGINE=INNODB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `TSalida` (

  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `PrecioTotal` DECIMAL(6,2) NOT NULL,
  `Entrada` INT(11) NOT NULL,
  `Habitacion` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (Entrada) REFERENCES TEntrada(id),
  FOREIGN KEY (Habitacion) REFERENCES THabitacion(id)
  
) ENGINE=INNODB DEFAULT CHARSET=latin1;

create trigger trRegReserva 
AFTER INSERT on treserva 
for EACH ROW 
UPDATE thabitacion set Habilitada = 2 where id = new.habitacion

create trigger trRegEntrada
AFTER INSERT on tentrada 
for EACH ROW 
UPDATE treserva set Habilitada = 0 where id = new.reserva