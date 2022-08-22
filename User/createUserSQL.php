<?php

function createUser(){

    $created = false;//this variable is used to indicate the creation is successfull or not
    $db = new SQLITE3('/Applications/XAMPP/xamppfiles/htdocs/Myproject/data/StudentModule.db'); // db connection - get your db file here. Its strongly advised to place your db file outside htdocs. 
    $sql = 'INSERT INTO assignemnt(first_name, last_name, Date_of_birth, Month, Postcode, contact_number, Product, application_id, application_date, application_status, Role, lucky_draw) VALUES (:fName, :lName, :Dob, :montH, :Post, :Numb, :Prod, :ID, :appDate, :appStat, :rolE, :ldraw)';
    $stmt = $db->prepare($sql); //prepare the sql statement


    $lastname = $_POST['lname'];
    $mySubString = substr($lastname,0,2);

    $firstname = $_POST['fname'];
    $mySubString1 = substr($firstname,0,2);

    $postcode2 = $_POST['post'];
    $mySubString2 = substr($postcode2,-2);

    $myDate1 = date("d/m/Y");
    $myDate = strtotime($myDate1);
    $d = date("d", $myDate);

    $random = rand(10000,99999);

    $result1 = $mySubString.$mySubString1.$mySubString2.$d.$random;

    $status = 'New';


    $role = 'User';

    $luckydraw = $_POST['prod'];



    //give the values for the parameters
    $stmt->bindParam(':appStat', $status, SQLITE3_TEXT);
    $stmt->bindParam(':appDate', $myDate1, SQLITE3_TEXT);
    $stmt->bindParam(':ID', $result1, SQLITE3_TEXT);
    $stmt->bindParam(':fName', $_POST['fname'], SQLITE3_TEXT); //we use SQLITE3_TEXT for text/varchar. You can use SQLITE3_INTEGER or SQLITE3_REAL for numerical values
    $stmt->bindParam(':lName', $_POST['lname'], SQLITE3_TEXT); 
    $stmt->bindParam(':Dob', $_POST['dob'], SQLITE3_TEXT);
    $stmt->bindParam(':montH', $_POST['month'], SQLITE3_TEXT);
    $stmt->bindParam(':Post', $_POST['post'], SQLITE3_TEXT);
    $stmt->bindParam(':Numb', $_POST['numb'], SQLITE3_TEXT);
    $stmt->bindParam(':Prod', $_POST['prod'], SQLITE3_INTEGER);
    $stmt->bindParam(':rolE', $role , SQLITE3_TEXT);
    $stmt->bindParam(':ldraw', $luckydraw, SQLITE3_TEXT);

    //execute the sql statement
    $stmt->execute();

    //the logic
    if($stmt){
        $created = true;
    }

    
    return $result1;
}

?>