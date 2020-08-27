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

INSERT INTO author (email, first_name, last_name, password_hash) VALUES ("itachi_sharingan@konoha.com", "Itachi", "Uchiha", "$2y$10$c8oi3xhK2QJYrzVpTQQYguptd0oB1G31WJPlP5ZQPwN5QV6g3n0EK"), 
("nagato_rinnegan@akatsuki.com", "Nagato", "Uzumaki", "$2y$10$gjVGsS15XPGhi2SvdNzk6erSfMi/x1R/dVhB310zIUYPxLWY3GTfS");
-- passowrd for itachi = tsukuyomi
-- password for nagato = shinratensei

INSERT INTO blog_post (slug, post_name, post_context, publication_date, author_email) VALUES
("badpost", "Horrible Post", "OMG! What could be more worse than this? How can someone be so horrible at something?", NOW(), "itachi_sharingan@konoha.com"),

("donclick", "Don't Click", "Trust me when I say stay away from this. You do not want to check this post.", NOW(), "nagato_rinnegan@akatsuki.com"),

("listening", "Are you even listening to me", "What! You are even more excited to see what's in there. My gosh! Some people", NOW(), "nagato_rinnegan@akatsuki.com"),

("uhaditcoming", "Well U had it coming", "Decided to click anyway, huh! Well, don't tell me I didn't warn you.", NOW(), "itachi_sharingan@konoha.com");