DROP TABLE IF EXISTS Agenda;
CREATE TABLE Agenda(
id_agenda SERIAL NOT NULL PRIMARY KEY,
Nombre VARCHAR(100) NOT NULL,
Direccion VARCHAR(100) NOT NULL,
Telefono INT NOT NULL
);

INSERT INTO Agenda(Nombre, Direccion, Telefono) VALUES
--1
('Carlos Soto','Los frenos 23',2236578),
--2
('Luna Díaz','Las espinas 2511',47852632),
--3
('Isabel Castro','Las bellotas 2078',5557896),
--4
('Pilar Castro','Las aguilas 77',4442215),
--5
('Domitila Zuñiga','Lotta 3654',1487853),
--6
('Tomás Todo','Avenida Matta 7756',3336547),
--7
('Felipe Diez','Bingo 7410',4410366),
--8
('Camelia Luana','Esperanza 1101',50365477),
--9
('Camila Meza','Coltauco 236 Block A n°36',93365478),
--10
('Victor Tuga','pasaje 3 2365-V',10587000),
--11
('Constanza Raña','Dos Oriente 12',40365875),
--12
('Elba Lazo','Santa Clotilde 3069',444383),
--13
('Rommina Rica','Catalia 1208',30698753),
--14
('Leopoldo Rosales','Calle las Anclas 15',20664700);