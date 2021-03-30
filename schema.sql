CREATE DATABASE taskforce
    DEFAULT CHARACTER SET utf8
    DEFAULT COLLATE utf8_general_ci;

USE taskforce;

/*Таблица городов*/
CREATE TABLE city (
    id INT AUTO_INCREMENT PRIMARY KEY,
    town VARCHAR(126) NOT NULL
);

/*Таблица пользователей*/
CREATE TABLE users (
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    username VARCHAR(128) NOT NULL,
    email VARCHAR(128) NOT NULL UNIQUE,
    password CHAR(64) NOT NULL UNIQUE,
    dt_add TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    user_city INT,
    user_avatar VARCHAR(4000) NULL,
    birthday_add DATE DEFAULT NULL,
    user_info VARCHAR(4000) NULL,
    user_tel INT NULL,
    user_skype VARCHAR(128) NULL,
    user_telegrm VARCHAR(128) NULL,
    FOREIGN KEY (user_city) REFERENCES city (id) ON DELETE CASCADE
);

/*Таблица навыков*/
CREATE TABLE skills (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    skills_title VARCHAR(128) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE
);

/*Таблица настроек*/
CREATE TABLE settings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    messages_check INT(1) DEFAULT 0,
    task_check INT(1) DEFAULT 0,
    review_check INT(1) DEFAULT 0,
    contacts_check INT(1) DEFAULT 0,
    profile_chek INT(1) DEFAULT 0,
    FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE
);

/*Таблица отзывы*/
CREATE TABLE review (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    user_review VARCHAR(4000) NULL,
    FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE
);

/*Таблица статус задания*/
CREATE TABLE statе(
    id INT AUTO_INCREMENT PRIMARY KEY,
    task_status VARCHAR(255) NOT NULL
);

/*Таблица с заданиями*/
CREATE TABLE projects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    dt_add TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    pr_title VARCHAR(128) NOT NULL,
    pr_descr VARCHAR(4000) NULL,
    id_skills INT NOT NULL,
    pr_file VARCHAR(4000) NULL,
    id_town INT NULL,
    coordinates INT NULL,
    pr_money INT NOT NULL,
    task_status INT(1) DEFAULT 0,
    dt_end DATE DEFAULT NULL,
    FOREIGN KEY (task_status) REFERENCES statе (id) ON DELETE CASCADE
);


