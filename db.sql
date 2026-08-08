CREATE DATABASE IF NOT EXISTS forum_db CHARACTER SET utf8 COLLATE utf8_general_ci;
USE forum_db;


CREATE TABLE IF NOT EXISTS users (
    id      INT UNSIGNED NOT NULL AUTO_INCREMENT,
    pseudo  VARCHAR(50)  NOT NULL,
    nom     VARCHAR(100) NOT NULL,
    prenom  VARCHAR(100) NOT NULL,
    mdp     VARCHAR(255) NOT NULL,           
    PRIMARY KEY (id),
    UNIQUE KEY uq_users_pseudo (pseudo)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS questions (
    id                INT UNSIGNED NOT NULL AUTO_INCREMENT,
    titre             VARCHAR(255) NOT NULL,
    description       TEXT         NOT NULL,
    contenu           TEXT         NOT NULL,
    id_auteur         INT UNSIGNED NOT NULL,
    pseudo_auteur     VARCHAR(50)  NOT NULL,  
    date_publication  DATETIME     NOT NULL,
    PRIMARY KEY (id),
    KEY idx_questions_id_auteur (id_auteur),
    CONSTRAINT fk_questions_users
        FOREIGN KEY (id_auteur) REFERENCES users(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS answers (
    id             INT UNSIGNED NOT NULL AUTO_INCREMENT,
    id_auteur      INT UNSIGNED NOT NULL,
    pseudo_auteur  VARCHAR(50)  NOT NULL,     
    id_question    INT UNSIGNED NOT NULL,
    contenu        TEXT         NOT NULL,
    PRIMARY KEY (id),
    KEY idx_answers_id_auteur (id_auteur),
    KEY idx_answers_id_question (id_question),
    CONSTRAINT fk_answers_users
        FOREIGN KEY (id_auteur) REFERENCES users(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    CONSTRAINT fk_answers_questions
        FOREIGN KEY (id_question) REFERENCES questions(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
