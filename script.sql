-- Active: 1704645233287@@127.0.0.1@3306@wiki
USE wiki;

CREATE TABLE role(
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255)
);

CREATE TABLE users(
    id INT PRIMARY KEY AUTO_INCREMENT,
    firstname VARCHAR(255),
    lastname VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255),
    role_id INT,
    FOREIGN KEY (role_id) REFERENCES role(id)
);

CREATE TABLE tag(
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255)
);

CREATE TABLE categorie(
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255)
);

CREATE TABLE wikis(
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    content TEXT,
    creation_date TIMESTAMP,
    cat_id INT,
    FOREIGN KEY (cat_id) REFERENCES categorie(id)
);

ALTER TABLE wiki
DROP COLUMN tag_id ;

ALTER TABLE wikis
ADD COLUMN status BOOLEAN DEFAULT 1;

ALTER TABLE wikis
ADD COLUMN user_id INT;
ALTER TABLE wikis
ADD CONSTRAINT FOREIGN KEY (user_id) REFERENCES users(id);

CREATE TABLE wikitag(
    tag_id INT,
    FOREIGN KEY (tag_id) REFERENCES tag(id),
    wiki_id INT,
    FOREIGN KEY (wiki_id) REFERENCES wikis(id)
);