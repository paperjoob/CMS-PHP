-- database name is cms

CREATE TABLE categories (
    cat_id INT(3) PRIMARY KEY AUTO_INCREMENT,
    cat_title VARCHAR(255)
);

-- Select from the categories table - ALL
SELECT * FROM `categories`;

-- Insert into the categories table
INSERT INTO `categories` (`cat_title`) VALUES ('Bootstrap'), ('Javascript'), ('PHP'), ('Java');

-- POSTS TABLE
CREATE TABLE posts (
    post_id INT(3) PRIMARY KEY AUTO_INCREMENT,
    post_category_id INT(3),
    post_title varchar(255),
    post_author varchar(255),
    post_date date,
    post_image text,
    post_content text,
    post_tags varchar(255),
    post_comment_count INT(11),
    post_status varchar(255) DEFAULT draft
);

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`) VALUES (NULL, '1', 'Learning PHP Course', 'See Yang', '2019-11-23', NULL, 'I really like this course!', 'see, javascript, php', '1', 'draft');