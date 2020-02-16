DROP TABLE client;
CREATE TABLE client(
	id INTEGER NOT NULL AUTO_INCREMENT,
	name VARCHAR(100),
	email VARCHAR(100),
	PRIMARY KEY (id)
);

INSERT INTO client(name, email) values ('Pepe', 'pepe@pprios.com');
INSERT INTO client(name, email) values ('Pedro', 'pedro@pprios.com');
INSERT INTO client(name, email) values ('Jobo', 'jobo@pprios.com');
