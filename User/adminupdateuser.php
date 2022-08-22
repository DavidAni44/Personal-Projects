<link rel ="stylesheet" type="text/css" href="site.css"/>
<?php
include("navbar3.php");
include("createUserSQL.php");
$db = new SQLite3('/Applications/XAMPP/xamppfiles/htdocs/Myproject/data/StudentModule.db');
$sql = "SELECT * FROM assignemnt WHERE application_id = :ID";
$stmt = $db->prepare($sql);
$stmt->bindParam(':ID', $_GET['uid'], SQLITE3_TEXT);
$result= $stmt->execute();
$arrayResult = [];

while($row=$result->fetchArray(SQLITE3_NUM)){
    $arrayResult [] = $row;
}


if (isset($_POST['submit'])){

        $db = new SQLite3('/Applications/XAMPP/xamppfiles/htdocs/Myproject/data/StudentModule.db');
        $sql = "UPDATE assignemnt SET first_name = :fName, last_name = :lName, Date_of_birth = :Dob, Month = :montH, Postcode = :Post, contact_number = :Numb, Product = :Prod, application_status = :appStat, lucky_draw = :ldraw WHERE application_id = :ID";
        $stmt = $db->prepare($sql);
        $change = $_POST['application_status'];
        $luckydraw = $_POST['prod'];
        $stmt->bindParam(':fName', $_POST['fname'], SQLITE3_TEXT);
        $stmt->bindParam(':lName', $_POST['lname'], SQLITE3_TEXT); 
        $stmt->bindParam(':Dob', $_POST['dob'], SQLITE3_INTEGER);
        $stmt->bindParam(':montH', $_POST['month'], SQLITE3_TEXT);
        $stmt->bindParam(':Post', $_POST['post'], SQLITE3_TEXT);
        $stmt->bindParam(':Numb', $_POST['numb'], SQLITE3_TEXT);
        $stmt->bindParam(':Prod', $_POST['prod'], SQLITE3_TEXT);
        $stmt->bindParam(':ID',$_GET['uid'], SQLITE3_TEXT);
        $stmt->bindParam(':appStat', $change, SQLITE3_TEXT);
        $stmt->bindParam(':ldraw', $luckydraw , SQLITE3_INTEGER);

    
        $stmt->execute();
    
            header('Location: adminview.php');
}

?>



<div class="row">
                  <div class="col-11">
                    <form method="post">
                       <div class="form-group col-md-3">
                        <label class="control-label labelFont">First Name</label>
                        <input class="form-control" type="text" name = "fname" value="<?php echo $arrayResult[0][0]; ?>">
                   </div>

                   <div class="form-group col-md-3">
                        <label class="control-label labelFont">Last Name</label>
                        <input class="form-control" type="text" name = "lname" value="<?php echo $arrayResult[0][1]; ?>">
                   </div>

                   <div class="form-group col-md-3">
                        <label class="control-label labelFont">Date of birth</label>
                        <input class="form-control" type="text" name = "dob" value="<?php echo $arrayResult[0][2]; ?>">
                   </div>

                   <div class="form-group col-md-3">
                        <label class="control-label labelFont">Month</label>
                        <input class="form-control" type="text" name = "month" value="<?php echo $arrayResult[0][3]; ?>">
                   </div>

                   <div class="form-group col-md-3">
                        <label class="control-label labelFont">Postcode</label>
                        <input class="form-control" type="text" name = "post" value="<?php echo $arrayResult[0][4]; ?>">
                   </div>

                   <div class="form-group col-md-3">
                        <label class="control-label labelFont">Contact Number</label>
                        <input class="form-control" type="text" name = "numb" value="<?php echo $arrayResult[0][5] ?>">
                   </div>

                   <div class="form-group col-md-3">
                        <label class="control-label labelFont">Product</label>
                        <select name="prod" class="form-control">
                           <option value="100" <?php echo ($arrayResult[0][6]=="£100 | 6 | 10") ? "selected" : ""; ?>>£100 | 6 | 10</option>
                           <option value="300" <?php echo ($arrayResult[0][6]=="£300 | 5 | 15") ? "selected" : ""; ?>>£300 | 5 | 15</option>
                           <option value="500" <?php echo ($arrayResult[0][6]=="£500 | 3 | 25") ? "selected" : ""; ?>>£500 | 3 | 25</option>
                           <option value="800" <?php echo ($arrayResult[0][6]=="£800 | 3 | 35") ? "selected" : ""; ?>>£800 | 3 | 35</option>
                           <option value="1000" <?php echo ($arrayResult[0][6]=="£1000 | 3 | 45") ? "selected" : ""; ?>>£1000 | 3 | 45</option>
                           <option value="5000" <?php echo ($arrayResult[0][6]=="£5000 | 3 | 55") ? "selected" : ""; ?>>£5000 | 3 | 55</option>
                           <option value="10000" <?php echo ($arrayResult[0][6]=="£10,000 | 5 | 60") ? "selected" : ""; ?>>£10,000 | 5 | 60</option>
                           <option value="15000" <?php echo ($arrayResult[0][6]=="£15,000 | 5 | 65") ? "selected" : ""; ?>>£15,000 | 5 | 65</option>
                        </select>
                   </div>


                <div class="form-group col-md-3">
                        <label class="control-label labelFont">Application Status</label>
                        <select name="application_status" class="form-control">
                           <option value="new" <?php echo ($arrayResult[0][7]=="new") ? "selected" : ""; ?>>New</option>
                           <option value="in-process" <?php echo ($arrayResult[0][7]=="in-process") ? "selected" : ""; ?>>In-Process</option>
                           <option value="complete" <?php echo ($arrayResult[0][7]=="complete") ? "selected" : ""; ?>>Complete</option>
                           <option value="on-hold" <?php echo ($arrayResult[0][7]=="on-hold") ? "selected" : ""; ?>>On-hold</option>
                           <option value="Withdrawn" <?php echo ($arrayResult[0][7]=="withdrawn") ? "selected" : ""; ?>>Withdrawn</option>
                        </select>
                   </div>

                   <div class="form-group col-md-3">
                       <input type="submit" name="submit" value="Update" class="btn btn-primary">
                   </div>
                   <div class="form-group col-md-3"><a href="adminview.php">Back</a></div>
                </form>
            </div>
        </div>
