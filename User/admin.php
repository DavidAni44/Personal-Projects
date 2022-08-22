<?php 
include("navbar.php");
require_once("checkUserLogin.php");
include("session2.php");
include("createUserSQL.php");
$appIDErr = $posterr = $lnameerr = $invalidMesg = "";


if (isset($_POST['submit'])) {

    
    

    if ($_POST["application_id"]=="") {
        $appIDErr = "Application ID is required";
      } 
      
      if ($_POST["Post"]==null) {
        $posterr = "Postcode is required";
      }

      if ($_POST["lName"]==null) {
        $lnameerr = "Last name is required";
      }

    if($_POST['application_id'] != null && $_POST["Post"] !=null && $_POST["lName"] !=null)
    {
        $result = verifyUsers();//calling this function from SelectUser.php. The function returns an array


        if (count($result)>0) {
                session_start();
                $_SESSION['appId'] = $array_user[0]['application_id'];
                $_SESSION['Post'] = $array_user[0]['Postcode'];
                $_SESSION['lName'] = $array_user[0]['last_name'];
                $_SESSION['role'] = $array_user[0]['Role'];
               
                    header("Location: adminIndex.php");
        } 
  }
}

?>

<link rel ="stylesheet" type="text/css" href="site.css"/>

    <form method="post">
        <div class="form-group col-md-3">
            <label class="control-label labelFont">Application ID</label>
            <input class="form-control" type="text" name = "application_id">
            <span class="text-danger"><?php echo $appIDErr; ?></span>
        </div>

        <div class="form-group col-md-3">
             <label class="control-label labelFont">Postcode</label>
             <input class="form-control" type="text" name = "Post">
             <span class="text-danger"><?php echo $posterr; ?></span>
       </div>

       <div class="form-group col-md-3">
              <label class="control-label labelFont">Last Name</label>
              <input class="form-control" type="text" name = "lName">
              <span class="text-danger"><?php echo $lnameerr; ?></span>
       </div>

       <div class="form-group col-md-4">
              <input class="btn btn-primary" type="submit" value="Login" name ="submit" class = "btn btn-primary">
       </div>
       <div class="text-danger">
            <?php echo $invalidMesg ?>
      </div>

</form>


