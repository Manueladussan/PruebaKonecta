
CREATE TABLE Productos ( id int(6) auto_increment primary key, nombre_producto varchar(200) not null, referencia varchar(200) not null, precio integer not null, peso integer not null, categoria varchar(200) not null, stock integer not null, fecha_de_creacion date, fecha_ultima_venta timestamp);
