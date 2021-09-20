<?php

/*
 * PHP coding challenges.
 * Challenge Name: Questionnaire
 * Myteletsis Dimos <dimos.mitel@gmail.com>
 * In this file we are creating our Tables
 * You can check the Database Schema in DatabaseSchema/questionnairedb_database_schema.pdf file
 */

// SQL statement for creating new tables
$statements = [

    /*
    * Explain of responders table:
    * email: We need email field to identify each responder
    * is_admin: if we want, we can use this field to check if the responder has an Admin role (0 for regular users, 1 for admins)
    */
    'CREATE TABLE IF NOT EXISTS responders( 
        responder_id INT NOT NULL AUTO_INCREMENT,
        first_name VARCHAR(50) NOT NULL,
        last_name VARCHAR(50) NOT NULL,
        email VARCHAR(50) NOT NULL,
        is_admin TINYINT(1) NOT NULL DEFAULT 0,
        registered_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
        updated_at DATETIME NULL DEFAULT NULL,
        PRIMARY KEY(responder_id)
    );',

    /*
    * Explain of questionnaires table:
    * questionnaire_type: if we want, we can use it to check what type is the question (YES/NO, 1 TO 10, A/B)
    * answered_at: has the date from the last answer posted for this questionnaire
    */
    'CREATE TABLE IF NOT EXISTS questionnaires(
        questionnaire_id INT NOT NULL AUTO_INCREMENT,
        responder_id INT NOT NULL,
        title VARCHAR(75) NOT NULL,
        meta_title VARCHAR(100) NULL,
        questionnaire_type VARCHAR(50) NOT NULL,
        created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
        updated_at DATETIME NULL DEFAULT NULL,
        answered_at DATETIME NULL DEFAULT NULL,
        PRIMARY KEY(questionnaire_id), 
            FOREIGN KEY(responder_id) 
            REFERENCES responders(responder_id) 
            ON DELETE NO ACTION
    );',

    /*
    * Explain of questionnaires_meta table:
    * Each questionnaire might have extra data (metadata) for every need
    * Key: The key identifying the meta
    * content: The column used to store the questionnaire metadata
    */
    'CREATE TABLE IF NOT EXISTS questionnaires_meta( 
        questionnaires_meta_id INT NOT NULL AUTO_INCREMENT,
        questionnaire_id INT NOT NULL,
        questionnaire_key VARCHAR(50) NOT NULL,
        content TEXT NULL DEFAULT NULL,
        PRIMARY KEY(questionnaires_meta_id),
            FOREIGN KEY(questionnaire_id) 
            REFERENCES questionnaires(questionnaire_id) 
            ON DELETE NO ACTION
    );',

    /*
    * Explain of questions table:
    * active: if we want, with this field we can disable or enable a question (0 or 1)
    * content: The content of the question
    */
    'CREATE TABLE IF NOT EXISTS questions( 
        question_id INT NOT NULL AUTO_INCREMENT,
        questionnaire_id INT NOT NULL,
        content TEXT NOT NULL,
        active TINYINT(1) NOT NULL DEFAULT 0,
        created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
        updated_at DATETIME NULL DEFAULT NULL,
        PRIMARY KEY(question_id), 
            FOREIGN KEY(questionnaire_id) 
            REFERENCES questionnaires(questionnaire_id)
            ON DELETE NO ACTION
    );',    

    /*
    * Explain of answers table:
    * active: if we want, with this field we can disable or enable an answer (0 or 1)
    * answer: This field can be null because questions might have an answer, or not
    * created_at: we need this field to check when an answer was posted
    */
    'CREATE TABLE IF NOT EXISTS answers( 
        answer_id INT NOT NULL AUTO_INCREMENT,
        questionnaire_id INT NOT NULL,
        question_id INT NOT NULL,
        responder_id INT NOT NULL,
        answer INT NULL DEFAULT NULL,
        active TINYINT(1) NOT NULL DEFAULT 0,
        created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY(answer_id),
            FOREIGN KEY(questionnaire_id)
            REFERENCES questionnaires(questionnaire_id) 
            ON DELETE NO ACTION, 
                FOREIGN KEY(question_id) 
                REFERENCES questions(question_id) 
                ON DELETE NO ACTION,
                    FOREIGN KEY(responder_id) 
                    REFERENCES responders(responder_id) 
                    ON DELETE NO ACTION
    );',
    ];

// connect to the database
$pdo = require 'Connection.php';

try {

    // execute SQL statements
    foreach ( $statements as $statement ) {

        $pdo->exec( $statement );
        
    }

    echo "Everything works fine";

} catch ( PDOException $e ) {

    die( $e->getMessage() );

}