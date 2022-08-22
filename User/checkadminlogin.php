<?php
function verifyUsers () {

if (!isset($_POST['application_id']) or !isset($_POST['Post']) or !isset($_POST['lName'])) {
    return;  // <-- return null;  
}

$db = new SQLite3('/Applications/XAMPP/xamppfiles/htdocs/Myproject/data/StudentModule.db');
$stmt = $db->prepare('SELECT application_id, Postcode, last_name, Role FROM assignemnt WHERE application_id = :appId');
$stmt->bindParam(':appId', $_POST['application_id'], SQLITE3_TEXT);
$stmt->bindParam(':Post', $_POST['Post'], SQLITE3_TEXT);
$stmt->bindParam(':lName', $_POST['lName'], SQLITE3_TEXT);

$result = $stmt->execute();

$rows_array = [];
while ($row=$result->fetchArray())
{
    $rows_array[]=$row;
}

return $rows_array;
}

?>

