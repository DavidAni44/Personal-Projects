<?php include("navbar.php"); 
require("createUserSQL.php");


$result = $_GET['createUser']; //you can also use $_REQUEST[''] do reseach whats the difference!
?>

<div class="container pb-5">
        <main role="main" class="pb-3">
        <div>
 <?php
if($result){
echo "Thank you for your interest to open a Time Deposit Account with us under this
campaign. Your application ID $result you can find your lucky draw amount when you log-in after you have registered you interest";
}
else{
 echo "Error";
}
?>
<link rel ="stylesheet" type="text/css" href="site.css"/>
         <div><a href="createUser.php">Back</a></div>
    </div>
</div>

<?php
include("footer.php"); 
?>