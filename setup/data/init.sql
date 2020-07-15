CREATE TABLE `author` (
    `email` varchar(255) primary key
    , `name` varchar(255) not null
    , `password_hash` varchar(255) not null
)
------ Blog Post Fields
-- slug = post_name varchar(40)
-- post_name varchar(255)
-- post_content text
-- author (FK -> author table) varchar(255)
-- publication_date date