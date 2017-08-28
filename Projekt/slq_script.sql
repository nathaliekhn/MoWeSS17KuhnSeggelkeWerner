DROP DATABASE IF EXISTS bilder_gallerie;
CREATE DATABASE bilder_gallerie;
USE bilder_gallerie;

CREATE TABLE users (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(40) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    name VARCHAR(255) NOT NULL,
    vorname VARCHAR(255) NOT NULL
);

CREATE TABLE gallerien (
    id INT PRIMARY KEY AUTO_INCREMENT,
	user_id INT NOT NULL,
    name VARCHAR(80) NOT NULL,
    kommentar VARCHAR(255) NOT NULL,
	CONSTRAINT gallerien_fk FOREIGN KEY (user_id) REFERENCES users (user_id)
);