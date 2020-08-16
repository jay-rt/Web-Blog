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
    , publication_date DATETIME DEFAULT NOW() ON UPDATE NOW() 
    , CONSTRAINT fk_author_blog_post
        FOREIGN KEY (author_email)
        REFERENCES author (email)
) ENGINE = InnoDB;

INSERT INTO author (email, first_name, last_name, password_hash) VALUES ("thapa.jayrt@gmail.com", "Jay", "Thapa", "123abc"), 
("zoldyckillua07@gmail.com", "Killua", "Zoldyck", "heaven@rena");

INSERT INTO blog_post (slug, post_name, post_context, publication_date, author_email) VALUES
("badPost", "Horrible Post", "OMG! what could be morse worse than this. How can someone be so horrible at something", NOW(), "thapa.jayrt@gmail.com"),

("donClick", "Don't Click", "Trust my advice and make sure you stay away. Trust me you don't want to check the post", NOW(), "thapa.jayrt@gmail.com"),

("listening", "Are you even listening to me", "What you are even more excited to see what's in there. My gosh! Some people", NOW(), "zoldyckillua07@gmail.com"),

("uHadItComing", "Well U had it coming", "Decided to click anywasy huh. Well dont tell me I didn't warn you.", NOW(), "zoldyckillua07@gmail.com");