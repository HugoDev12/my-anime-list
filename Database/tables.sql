-- CREATE user table and anime table with user_anime relation table

-- DROP TABLE IF EXISTS user;

CREATE TABLE IF NOT EXISTS user (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL,
    roles VARCHAR(15) NOT NULL,
    date DATETIME NOT NULL,
    last_login DATETIME
);

CREATE TABLE IF NOT EXISTS anime (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    synopsis TEXT,
    slug VARCHAR(50) NOT NULL,
    date DATETIME NOT NULL
);

CREATE TABLE IF NOT EXISTS user_anime (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    user_id INT, 
    anime_id INT,
    FOREIGN KEY (user_id) REFERENCES user(id), 
    FOREIGN KEY (anime_id) REFERENCES anime(id)
);

