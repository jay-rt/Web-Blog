CREATE TABLE `author` (
    `email` varchar(255) primary key not null
    , `name` varchar(255) not null
    , `password_hash` varchar(255) not null
)
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
    ,publication_date date
    ,`author_email` varchar(255) not null
    CONSTRAINT fk_author_blogPost
        FOREIGN KEY (email)
        REFERENCES author (email)
)