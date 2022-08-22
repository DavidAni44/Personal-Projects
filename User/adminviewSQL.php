<?php

function getUsers(){
    $db = new SQLITE3('/Applications/XAMPP/xamppfiles/htdocs/Myproject/data/StudentModule.db');
    $sql = "SELECT * FROM assignemnt";
    $stmt = $db->prepare($sql);
    $result = $stmt->execute();

    $arrayResult = [];//prepare an empty array first
    while ($row = $result->fetchArray()){ // use fetchArray(SQLITE3_NUM) - another approach
    $arrayResult [] = $row; //adding a record until end of records
    }
    return $arrayResult;
}
?>