<link rel ="stylesheet" type="text/css" href="site.css"/>
<?php
include("navbar2.php");
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
        $sql = "UPDATE assignemnt SET Product = :Prod, application_status = :appStat WHERE application_id = :ID";
        $stmt = $db->prepare($sql); 
        $luckydraw = $_POST['prod'];
        $change = $_POST['application_status'];
        $stmt->bindParam(':ID',$_GET['uid'], SQLITE3_TEXT);
        $stmt->bindParam(':Prod', $_POST['prod'], SQLITE3_INTEGER);
        $stmt->bindParam(':appStat', $change, SQLITE3_TEXT);
        
    
        $stmt->execute();
    
            header('Location: Userview.php');
}

?>



    <div class="row">
                  <div class="col-11">
                    <form method="post">
                      <div class="form-group col-md-3">
                        <label class="control-label labelFont">Product</label>
                        <select name="prod" class="form-control">
                           <option value="100" <?php echo ($arrayResult[0][1]=="£100 | 6 | 10") ? "selected" : ""; ?>>£100 | 6 | 10</option>
                           <option value="300" <?php echo ($arrayResult[0][1]=="£300 | 5 | 15") ? "selected" : ""; ?>>£300 | 5 | 15</option>
                           <option value="500" <?php echo ($arrayResult[0][1]=="£500 | 3 | 25") ? "selected" : ""; ?>>£500 | 3 | 25</option>
                           <option value="800" <?php echo ($arrayResult[0][1]=="£800 | 3 | 35") ? "selected" : ""; ?>>£800 | 3 | 35</option>
                           <option value="1000" <?php echo ($arrayResult[0][1]=="£1000 | 3 | 45") ? "selected" : ""; ?>>£1000 | 3 | 45</option>
                           <option value="5000" <?php echo ($arrayResult[0][1]=="£5000 | 3 | 55") ? "selected" : ""; ?>>£5000 | 3 | 55</option>
                           <option value="10000" <?php echo ($arrayResult[0][1]=="£10,000 | 5 | 60") ? "selected" : ""; ?>>£10,000 | 5 | 60</option>
                           <option value="15000" <?php echo ($arrayResult[0][1]=="£15,000 | 5 | 65") ? "selected" : ""; ?>>£15,000 | 5 | 65</option>
                        </select>
                   </div>


                <div class="form-group col-md-3">
                        <label class="control-label labelFont">Application Status</label>
                        <select name="application_status" class="form-control">
                           <option value="new" <?php echo ($arrayResult[0][2]=="new") ? "selected" : ""; ?>>New</option>
                           <option value="Withdrawn" <?php echo ($arrayResult[0][2]=="withdrawn") ? "selected" : ""; ?>>Withdrawn</option>
                        </select>
                   </div>

                   <div class="form-group col-md-3">
                       <input type="submit" name="submit" value="Update" class="btn btn-primary">
                   </div>
                   <div class="form-group col-md-3"><a href="Userview.php">Back</a></div>
                </form>
            </div>
        </div>
