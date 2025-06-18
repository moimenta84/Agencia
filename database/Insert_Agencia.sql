INSERT INTO DESTINO(PAIS, CUIDAD, REQ_PASS, PRECIOXDIA)
	VALUES ('España', 'Madrid', FALSE,'60'),
			('Alemania','Berlín', FALSE,'60'),
			('Francia','París', FALSE,'70'),
			('Italia','Roma',FALSE,'50'),
			('Bélgica','Bruselas', FALSE,'40'),
			('Estados Unidos','New York',TRUE,'90'),
			('República Dominicana','Santo Domingo',TRUE,'85'),
			('México','Ciudad de México',TRUE,'66'),
			('Venezuela','Caracas',TRUE,'65'),
			('Colombia','Bogotá',TRUE,'70');

INSERT INTO USUARIO(DNI, NOMBRE, APELLIDOS, F_NACIMIENTO, EDAD, EMAIL, CONTRASENA)
	VALUES ('02453626M', 'María', 'Pérez', '05/05/2001', '24', 'mariaperez1@gmail.com', '1234568'),
			('12345678T', 'Romina', 'Montenegro', '08/11/1995', '29', 'rominamontenegro2@gmail.com', '8mT69874'),
			('87654321V', 'Iker', 'López', '15/2/1992', '33', 'ikerlopez3@gmail.com', 'Pfi9876E'),
			('04353626A', 'David', 'Telonero', '25/03/2005', '20', 'davidtelonero4@gmail.com', 'KL253679'),
			('72453629N', 'Roxana', 'Toasa', '11/08/1978', '46', 'roxanatoasa5@gmail.com', 'n7Fy2568'),
			('32457652P', 'Virginia', 'Pozo', '30/06/1986', '38', 'virginiapozo6@gmail.com', '9F548796'),
			('53463648K', 'Scarlet', 'Brizuela', '19/10/1992', '33', 'scarletbrizuela7@gmail.com', 'D5698558'),
			('66453699R', 'Aaron', 'González', '07/07/1997','28', 'aarongonzalez8@gmail.com', 'Q9876523'),
			('92453626Q', 'Jose', 'Ángulo', '01/02/1993', '32', 'joseangulo10@gmail.com', '1234568'),
			('42453923G', 'Zoila', 'Cabeza', '27/4/1999', '26', 'zoilacabeza9@gmail.com', 'W7N2358I');

INSERT INTO PASAPORTE(NUMERO, PAIS_EXP, DNI_USU)
	VALUES ('X1234567','España','02453626M'),
			('B7654321','España','12345678T'),
			('M9081726','España','87654321V'),
			('Z1123581','España','04353626A'),
			('L3098457','España','72453629N'),
			('N4561238','España','32457652P'),
			('P8745610','España','53463648K'),
			('R2046893','España','66453699R'),
			('S7813492','España','92453626Q'),
			('A5678912','España','42453923G');
INSERT INTO GUIA(DNI, NOMBRE, APELLIDOS, ESPECIALIDAD, PAIS_DEST)
	VALUES ('32145678A', 'Johanna', 'Toro', 'Geografía', 'España'),
		('98765432B', 'Alejandro','Molina', 'Historia', 'Alemania' ),
		('45678901C', 'Valentina','Sánchez','Arquitectura','Francia'),
		('32165498D','Jonathan','Pasini','Comida','Italia'),
		('74185296E', 'Pedro', 'García', 'Historia', 'México'),
		('68765432J', 'Alejandra','Mendoza', 'Historia', 'Bélgica' ),
		('55678901L', 'Max','Guzmán','Arquitectura','Estados Unidos'),
		('11165498X','Christian','Colón','Comida','República Dominicana'),
		('99985296Z', 'Aquiles', 'Melchor', 'Historia', 'Venezuela'),
		('22298529M', 'Miriam', 'Osto', 'Historia', 'Colombia');


INSERT INTO HOTEL(NOMBRE, ESTRELLAS, DIRECCION, WIFI, PARKING, PAIS_DEST, PRECIOXNOCHE)
	VALUES ('Four Seasons','5','Calle de Sevilla, 3, 28014, Madrid', TRUE, TRUE,'España', '60'),
			('Berlin Alexanderplatz', '4', ' Karl-Liebknecht-Str. 32, 10178 Berlín',TRUE, FALSE,'Alemania','80'),
			('Muguet','3', '11 Rue Chevert, 75007 París',TRUE, FALSE,'Francia', '65'),
			('Filippo', '2','via Filippo Turati 163 Roma - 00185','TRUE','TRUE','Italia','45'),
			('NH Mexico City','4','Palma 42, Centro, 06000 Ciudad de México', TRUE, FALSE,'México','50'),
			('Corinthia Grand', '5','Rue Royale, 103 1000, Bruselas',TRUE, TRUE,'Bélgica','100'),
			('Carlton ARMS','2','160 Este de la calle 25, NY 10010', TRUE, FALSE,'Estados Unidos','80'),
			('Gran Hotel Europa','3', 'Calle Arzobispo Meriño,esq. Emiliano Tejera, 10210 Santo Domingo', TRUE, FALSE, 'República Dominicana','40'),
			('Tiburón', '2','Av. Las Acacias, Caracas 1050', TRUE, FALSE,'Venezuela', '50'),
			('Violeta Park', '1', 'Carretera 60 #44b-62, Bogotá', FALSE, FALSE,'Colombia','30');
INSERT INTO ELEGIR (DNI_USU, PAIS_DEST, PRECIO,F_IDA, F_VUELTA)
VALUES ('12345678T', 'Alemania', '184', '01/07/2025','15/07/2025'),
		('32457652P', 'Venezuela', '580.20', '15/09/2025','30/09/2025'),
		('66453699R', 'República Dominicana', '800.00', '17/08/2025','15/09/2025'),
		('42453923G', 'México', '1020.00', '01/08/2025','30/08/2025'),
		('72453629N', 'Francia', '95.00', '22/07/2025','10/08/2025');

INSERT INTO RESERVAR (DNI_USU, PAIS_DEST, COD_HOTEL, PRECIO_H, F_ENTRADA, F_SALIDA)
VALUES ('12345678T', 'Alemania', '2', '2184', '01/07/2025','15/07/2025'),
		('32457652P', 'Venezuela', '9', '1020.20', '15/09/2025','30/09/2025'),
		('66453699R', 'República Dominicana', '8', '1144.00', '17/08/2025','15/09/2025'),
		('42453923G', 'México', '5', '3284.00', '01/08/2025','30/08/2025'),
		('72453629N', 'Francia', '3', '995.00', '22/07/2025','10/08/2025');