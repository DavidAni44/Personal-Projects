<link rel ="stylesheet" type="text/css" href="site.css"/>
<?php
include("navbar3.php"); 

$db = new SQLite3('/Applications/XAMPP/xamppfiles/htdocs/Myproject/data/StudentModule.db');
$sql = "SELECT first_name, last_name, Date_of_birth, application_id FROM assignemnt WHERE application_id = :ID";
$stmt = $db->prepare($sql);
$stmt->bindParam(':ID', $_GET['uid'], SQLITE3_TEXT);
$result= $stmt->execute();
$arrayResult = [];

while($row=$result->fetchArray(SQLITE3_NUM)){
    $arrayResult [] = $row;
}
if (isset($_POST['delete'])){

        $db = new SQLite3('/Applications/XAMPP/xamppfiles/htdocs/Myproject/data/StudentModule.db');
        
        $stmt = "DELETE FROM assignemnt WHERE application_id = :ID";
        $sql = $db->prepare($stmt);
        $sql->bindParam(':ID', $_GET['uid'], SQLITE3_TEXT);
        
        $sql->execute();
        header("Location:adminview.php?deleted=true");
    }
    
?>
<h2>Delete User for <?php echo $_GET['uid'];?></h2><br>
        <h4 style="color: red;">Are you sure want to delete this user?</h4><br>
        
        <div class="row">
            <div class="col-md-2 f">
                <label style="font-size: 20px; color:blue; font-weight: bold;">First Name</label>
            </div>
            <div class="col-md-6">
                <label style="font-size: 20px;"><?php echo $arrayResult[0][1] ?></label>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2 f">
                <label style="font-size: 20px; color:blue; font-weight: bold;">Last Name</label>
            </div>
            <div class="col-md-6">
                <label style="font-size: 20px;"><?php echo $arrayResult[0][2] ?></label>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2 f">
                <label style="font-size: 20px; color:blue; font-weight: bold;">Date of birth</label>
            </div>
            <div class="col-md-6">
                <label style="font-size: 20px;"><?php echo $arrayResult[0][3] ?></label>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2 f">
                <label style="font-size: 20px; color:blue; font-weight: bold;">Application ID</label>
            </div>
            <div class="col-md-6">
                <label style="font-size: 20px;"><?php echo $arrayResult[0][4] ?></label>
            </div>
        </div>

        <div class="row">
            <div class="col-5">
                <form method="post">
                     <input type="hidden" name="uid" value = "<?php echo $_GET['uid'] ?>"><br>
                    <input type="submit" value="Delete" class="btn btn-danger" name="delete"><a href="adminview.php" style="font-weight: bold; padding-left: 30px;">Back</a>
                </form>
            </div>
        </div>