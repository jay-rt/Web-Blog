DROP DATABASE IF EXISTS database;
CREATE DATABASE database;
USE database;

CREATE TABLE author (
    email VARCHAR(255) PRIMARY KEY NOT NULL
    , first_name VARCHAR(50) NOT NULL
    , last_name VARCHAR(50) NOT NULL
    , password_hash VARCHAR(255) NOT NULL
) ENGINE = InnoDB;

CREATE TABLE blog_post (
    slug VARCHAR(40) PRIMARY KEY NOT NULL
    , post_name VARCHAR(255) NOT NULL
    , post_context TEXT NOT NULL
    , author_email VARCHAR(255) NOT NULL
    , publication_date DATETIME NOT NULL
    , CONSTRAINT fk_author_blog_post
        FOREIGN KEY (author_email)
        REFERENCES author (email)
) ENGINE = InnoDB;

INSERT INTO author (email, first_name, last_name, password_hash) VALUES ("thapa.jayrt@gmail.com", "Jay", "Thapa", "123abc");

INSERT INTO blog_post (slug, post_name, post_context, publication_date, author_email) VALUES
("BadPost", "Horrible Post", "OMG! what could be morse worse than this. How can someone be so horrible at something", NOW(), "thapa.jayrt@gmail.com"),

("NoClick", "Don't Click", "Trust my advice and make sure you stay away. Trust me you don't want to check the post", NOW(), "thapa.jayrt@gmail.com"),

("Listening", "Are you even listening to me", "What you are even more excited to see what's in there. My gosh! Some people", NOW(), "thapa.jayrt@gmail.com");