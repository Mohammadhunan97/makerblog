-- createdb makerblog_db

DROP TABLE IF EXISTS users CASCADE;
DROP TABLE IF EXISTS posts CASCADE;

CREATE TABLE users(
ID SERIAL PRIMARY KEY,
username TEXT UNIQUE,
password TEXT,
background TEXT,
description TEXT,
timestamp   timestamp DEFAULT current_timestamp
);




CREATE TABLE posts(
ID SERIAL PRIMARY KEY,
title TEXT,
content TEXT,
image TEXT,
user_id INTEGER, FOREIGN KEY (user_id) references users(id), 
timestamp   timestamp DEFAULT current_timestamp
);