-- database name is cms

CREATE TABLE categories (
    cat_id INT(3) PRIMARY KEY AUTO_INCREMENT,
    cat_title VARCHAR(255)
);

-- Select from the categories table - ALL
SELECT * FROM `categories`;

-- Insert into the categories table
INSERT INTO `categories` (`cat_title`) VALUES ('Bootstrap'), ('Javascript'), ('PHP'), ('Java');