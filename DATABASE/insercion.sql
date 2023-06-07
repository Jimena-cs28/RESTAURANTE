USE restaurante;

SELECT * FROM administrador	

INSERT INTO clientes (nombres,apellidos, telefono,dni) VALUES
	('Saidi Ariela','Fajardo Anampa','965412410','89361200'),
	('Adriana','Duran Buenamarca','947512308','83647102'),
	('Ariel','Carbajal Perez','957481364','72140657'),
	('Luis','Salazar Urbano','987451203','37412905');

INSERT INTO administrador (nombres,apellidos,nombreusu,claveacceso) VALUES
	('Adriana','Montero Alba','AdriM8','123456');
	

INSERT INTO tipopagos (Tipopago)VALUES
	('Yape'),
	('Plin'),
	('Tarjeta Credito'),
	('efectivo');

INSERT INTO turnos (turno,horainicio,horafin) VALUES
	('Tarde','11:00:00','17:30:00'),
	('Noche','17:30:00','22:00:00');
	
	
SELECT * FROM turnos
SELECT * FROM tipopagos


INSERT INTO tipoPlatos (tipo) VALUES
	('plato entrada'),
	('plato principal'),
	('bebidas');
INSERT INTO platos(platos) VALUES
-- plato entrada
	('Causa'),
	('Leche tigre'),
	('Tamales'),
	('Huane'),
	('Papa a la hiancaina'),
-- plato principal
	('Carapulcra'),
	('Ceviche'),
	('Pollo la Olla'),
	('Arroz con pollo'),
-- bebodas
	('Gaseosa inka'),
	('Gaseosa coca cola')
	('Cifrut'),
	('Kr'),
	('Agua')

SELECT * FROM tipoPlatos

INSERT INTO ventas (idturno,idadmi,idcliente,idTplato,idTplato,numMesa,numMesa)VALUES
	(1,1,3,'1','Carapulcra');
	
SELECT * FROM ventas
SELECT * FROM detalleVenta

INSERT INTO detalleVenta (idventa,cantidad, precioTotal,comprobante) VALUES
	(1,1,'15','2','30',1,1);
	
	
	
	
	
	