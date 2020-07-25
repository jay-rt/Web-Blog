DROP DATABASE `database` IF EXIST;
CREATE DATABASE `database` CHARSET utf8;
USE `database`

CREATE TABLE `author` (
    `email` varchar(255) primary key not null
    , `first_name` varchar(50) not null
    ,`last_name` varchar(50) not null
    , `password_hash` varchar(255) not null
) ENGINE = InnoDB;  
------ Blog Post Fields
-- slug = post_name varchar(40)
-- post_name varchar(255)
-- post_content text
-- author (FK -> author table) varchar(255)
-- publication_date date

CREATE TABLE `blogPost` (
    `slug` varchar(40) primary key not null
    ,`post_name` varchar(255) not null
    ,`post_context` text not null
    ,`ublication_date` date
    ,`author_email` varchar(255) not null
    CONSTRAINT fk_author_blogPost
        FOREIGN KEY (email)
        REFERENCES author (email)
) ENGINE = InnoDB;

INSERT INTO `authors` (email, first_name, last_name, password_hash) VALUES ("thapa.jayrt@gmail.com", "Jay", "Thapa", "123abc");

INSERT INTO `blogPost` (slug, post_name, post_context, publication_date, author_email) VALUES
("BadPost", "Horrible Post", "OMG! what could be morse worse than this. How can someone be so horrible at something", NOW(), "thapa.jayrt@gmail.com"),

("NoClick", "Don't Click", "Trust my advice and make sure you stay away. Trust me you don't want to check the post", NOW(), "thapa.jayrt@gmail.com"),

("Listening", "Are you even listening to me", "What you are even more excited to see what's in there. My gosh! Some people", NOW(), "thapa.jayrt@gmail.com");