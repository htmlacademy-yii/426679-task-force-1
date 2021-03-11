CREATE DATABASE doingsdone
    DEFAULT CHARACTER SET utf8
    DEFAULT COLLATE utf8_general_ci;

USE doingsdone;

/*Таблица пользователей*/
CREATE TABLE users (
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    username VARCHAR(128) NOT NULL,
    email VARCHAR(128) NOT NULL UNIQUE,
    password CHAR(64) NOT NULL UNIQUE,
    dt_add TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    user_avatar VARCHAR(4000) NULL,
    birthday_add DATE DEFAULT NULL CURRENT_TIMESTAMP,
    user_info VARCHAR(4000) NULL,
    user_tel INT NULL,
    user_skype VARCHAR(128) NULL,
    user_telegrm VARCHAR(128) NULL,
);

/*Таблица навыков*/
CREATE TABLE skills (
    id INT AUTO_INCREMENT PRIMARY KEY,
    skills_title VARCHAR(128) NOT NULL,
);

/*Таблица настроек*/
CREATE TABLE settings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    messages_check INT(1) DEFAULT 0,
    task_check INT(1) DEFAULT 0,
    review_check INT(1) DEFAULT 0,
    contacts_check INT(1) DEFAULT 0,
    profile_chek INT(1) DEFAULT 0
);

/*Таблиза с заданиями*/
CREATE TABLE projects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    task_title VARCHAR(128) NOT NULL,
    task_info VARCHAR(4000) NULL,
    task_file VARCHAR(4000) NULL,
    task_money INT NOT NULL,
    task_status INT(1) DEFAULT 0,
    dt_end DATE DEFAULT NULL,
);

CREATE TABLE tasks (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title_task VARCHAR(128) NOT NULL
);


