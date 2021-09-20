<?php

/*
 * PHP coding challenges.
 * Challenge Name: Questionnaire
 * Myteletsis Dimos <dimos.mitel@gmail.com>
 * In this file we are creating our Database queries
 * You can check the Database Schema in DatabaseSchema/questionnairedb_database_schema.pdf file
 */

// connect to the database
$pdo = require 'connection.php';

//We need to check first if the user is admin because only admins can fetch results
$is_admin = 1;

if ( $is_admin )
{

    /*
    //1. Get all the questionnaires with their questions
    $sql = 'SELECT a.title AS Questionnaire_Title, b.content AS Question_Content
            FROM questionnaires a
            INNER JOIN questions b
            ON a.questionnaire_id = b.questionnaire_id
            ORDER BY a.questionnaire_id ASC';

    $statement = $pdo->prepare( $sql );
    $statement->execute();

    while ( ( $row = $statement->fetch( PDO::FETCH_ASSOC ) ) !== false ) 
    {

        echo 'Questionnaire Title: ' . $row['Questionnaire_Title'] . ' | Question: ' . $row['Question_Content'] . '<br />';

    }
    */

    /*
    * 2. Get all the questionnaires that were answered in the last month
    * We assuming that in the questionnaires table there is a column named "answered_at" where the datetime of the last answer have been stored
    */
    /*
    $sql = 'SELECT a.title AS Questionnaire_Title, a.answered_at AS Answer_date, b.content AS Question_Content
            FROM questionnaires a
            INNER JOIN questions b
            ON a.questionnaire_id = b.questionnaire_id
            WHERE a.answered_at >= ( NOW() - INTERVAL 1 MONTH )
            ORDER BY a.questionnaire_id ASC'; 

    $statement = $pdo->prepare( $sql );
    $statement->execute();

    while ( ( $row = $statement->fetch( PDO::FETCH_ASSOC ) ) !== false ) 
    {

        echo 'Questionnaire Title: ' . $row['Questionnaire_Title'] . ' | Question: ' . $row['Question_Content'] . ' | Answer Date: ' . $row['Answer_date'] . ' <br />';

    }
    */
    /*
    //3.Get all the questionnaires with more than 5 questions answered in the last month
    $sql = 'SELECT a.title AS Questionnaire_Title, a.answered_at AS Answer_date, COUNT( b.questionnaire_id ) AS questionnaire_count
            FROM questionnaires a
            INNER JOIN questions b
            ON a.questionnaire_id = b.questionnaire_id
            GROUP BY b.questionnaire_id
            HAVING questionnaire_count > 5 AND Answer_date >= ( NOW() - INTERVAL 1 MONTH )
            ORDER BY a.title ';

    $statement = $pdo->prepare( $sql );
    $statement->execute();

    while ( ( $row = $statement->fetch( PDO::FETCH_ASSOC ) ) !== false ) 
    {

        echo 'Questionnaire Title: ' . $row['Questionnaire_Title'] . ' | Answer Date: ' . $row['Answer_date'] . ' | Total questions: ' . $row['questionnaire_count'] . ' <br />';

    }
    */
    /*
    //4. Get all the answers for a given questionnaire in the last month

    // The given unique id of questionnaire
    $questionnnaire = 3;

    $sql = 'SELECT answers.answer, answers.created_at 
            FROM answers
            WHERE answers.questionnaire_id = :id AND answers.created_at >= ( NOW() - INTERVAL 1 MONTH )
            ORDER BY answers.answer ASC';

    $statement = $pdo->prepare( $sql );
    $statement->bindParam( ':id', $questionnnaire, PDO::PARAM_INT );
    $statement->execute();

    while ( ( $row = $statement->fetch( PDO::FETCH_ASSOC ) ) !== false ) 
    {

        echo 'Answer: ' . $row['answer'] . ' | Answer Date: ' . $row['created_at'] . ' <br />';

    }
    */

    /*
    * 5. Get all the questionnaires that were answered the most in the last month
    * We need to check the answer date in both questionnaire and answers tables
    */
    /*
    $sql = 'SELECT a.title AS Questionnaire_Title, a.answered_at, b.created_at AS Answer_date, COUNT( b.answer ) AS answers_count
            FROM questionnaires a
            INNER JOIN answers b
            ON a.questionnaire_id = b.questionnaire_id
            WHERE b.created_at  >= ( NOW() - INTERVAL 1 MONTH )
            GROUP BY a.questionnaire_id
            HAVING a.answered_at >= ( NOW() - INTERVAL 1 MONTH ) 
            ORDER BY answers_count DESC ';

    $statement = $pdo->prepare( $sql );
    $statement->execute();

    while ( ( $row = $statement->fetch( PDO::FETCH_ASSOC ) ) !== false ) 
    {

        echo 'Questionnaire Title: ' . $row['Questionnaire_Title'] . ' | Answers Count: ' . $row['answers_count'] . ' <br />';

    }
    */
    /*
    //6.Get the min, max and average for every question in the last month (3 queries)

    //First query: MIN

    $sql = 'SELECT a.content AS Questions_Content, a.question_id AS ID, b.created_at, MIN( b.answer ) AS answers_min
            FROM questions a
            INNER JOIN answers b
            ON a.question_id = b.question_id
            GROUP BY b.question_id
            HAVING b.created_at  >= ( NOW() - INTERVAL 1 MONTH )
            ORDER BY a.question_id ASC ';

    $statement = $pdo->prepare( $sql );
    $statement->execute();

    while ( ( $row = $statement->fetch( PDO::FETCH_ASSOC ) ) !== false ) 
    {

        echo 'Question Id: ' . $row['ID'] . ' | Question: ' . $row['Questions_Content'] . ' | Answers Min: ' . $row['answers_min'] . ' <br />';

    }
    */

    /*
    //Second query: MAX
    $sql = 'SELECT a.content AS Questions_Content, a.question_id AS ID, b.created_at, MAX( b.answer ) AS answers_max
            FROM questions a
            INNER JOIN answers b
            ON a.question_id = b.question_id
            GROUP BY b.question_id
            HAVING b.created_at  >= ( NOW() - INTERVAL 1 MONTH )
            ORDER BY a.question_id ASC ';

    $statement = $pdo->prepare( $sql );
    $statement->execute();

    while ( ( $row = $statement->fetch( PDO::FETCH_ASSOC ) ) !== false ) 
    {

        echo 'Question Id: ' . $row['ID'] . ' | Questions Content: ' . $row['Questions_Content'] . ' | Answers Max: ' . $row['answers_max'] . ' <br />';

    }
    */
    /*
    //Third query: AVERAGE
    $sql = 'SELECT a.content AS Questions_Content, a.question_id AS ID, b.created_at, FORMAT( AVG( b.answer ), 2 ) AS answers_avg
            FROM questions a
            INNER JOIN answers b
            ON a.question_id = b.question_id
            GROUP BY b.question_id
            HAVING b.created_at  >= ( NOW() - INTERVAL 1 MONTH )
            ORDER BY a.question_id ASC ';

    $statement = $pdo->prepare( $sql );
    $statement->execute();

    while ( ( $row = $statement->fetch( PDO::FETCH_ASSOC ) ) !== false ) 
    {

        echo 'Question Id: ' . $row['ID'] . ' | Questions Content: ' . $row['Questions_Content'] . ' | Answers Average: ' . $row['answers_avg'] . ' <br />';

    }
    */

} 
else
{

    echo "You don't have the credentials for fetching results";

} //close is_admin condition