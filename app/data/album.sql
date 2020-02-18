-- DROP TABLE album;
CREATE TABLE album (
	id INTEGER NOT NULL AUTO_INCREMENT,
	artist TEXT NOT NULL,
	title TEXT NOT NULL,
	PRIMARY KEY (id)
	);

INSERT INTO album (artist, title)
VALUES ('Eninem', 'The Marshall Mathers LP 2');

INSERT INTO album (artist, title)
VALUES ('James Arthur', 'James Arthur');

INSERT INTO album (artist, title)
VALUES ('Tinie Tempah', 'Demonstration');

INSERT INTO album (artist, title)
VALUES ('Andre Rieu', 'Music of the Night');

INSERT INTO album (artist, title)
VALUES ('The Overtones', 'Saturday Night at the Movies');
