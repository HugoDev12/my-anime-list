-- CREATE user table and anime table with user_anime relation table

-- DROP TABLE IF EXISTS user;

CREATE TABLE IF NOT EXISTS user (
    id INTEGER PRIMARY KEY NOT NULL,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL,
    roles VARCHAR(10) NOT NULL,
    date DATETIME NOT NULL,
    last_login DATETIME NOT NULL
);

CREATE TABLE IF NOT EXISTS anime (
    id INTEGER PRIMARY KEY NOT NULL,
    name VARCHAR(50) NOT NULL,
    synopsis TEXT,
    slug VARCHAR(50) NOT NULL,
    date DATETIME NOT NULL
);

CREATE TABLE IF NOT EXISTS user_anime (
    id INTEGER PRIMARY KEY NOT NULL,
    user_id INTEGER, 
    anime_id INTEGER,
    FOREIGN KEY (user_id) REFERENCES user(id), 
    FOREIGN KEY (anime_id) REFERENCES anime(id)
);

