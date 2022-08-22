<?php 
include_once("createUserSQL.php");
include("navbar.php");



$errorfname = $errorlname = $errordob = $errormonth = $errorpost = $errornumb = $errorrole = "";
$allFields = "yes";

if (isset($_POST['submit'])){
    
    if ($_POST['fname']==""){
        $errorfname = "First name is mandatory";
        $allFields = "no";
        }
    if ($_POST['lname']==null){
        $errorlname = "Last name is mandatory";
        $allFields = "no";
        }
    if ($_POST['dob']==""){
        $erroruname = "Date of birth is mandatory";
        $allFields = "no";
        }
    if ($_POST['month']==""){
        $errormonth = "Month is mandatory";
        $allFields = "no";
        }
    if ($_POST['post']==""){
        $errorpost = "Postcode is mandatory";
        $allFields = "no";
        }
    if ($_POST['numb']==""){
        $errornumb = "Contact number is mandatory";
        $allFields = "no";
        }
    if($allFields == "yes")
        {
        $createUser = createUser();
            header('Location: userCreationSummary.php?createUser='.$createUser);
        }
}
?>

<link rel ="stylesheet" type="text/css" href="site.css"/>

<div class="container pb-5">
<main role="main" class="pb-3">
<div class="row">
            <div class="col-6">
                <form method="post">
                   <div class="form-group col-md-6">
                        <label class="control-label labelFont">First Name</label>
                        <input class="form-control" type="text" name = "fname">
                        <span class="text-danger"><?php echo $errorfname; ?></span>
                   </div>

                   <div class="form-group col-md-6">
                        <label class="control-label labelFont">Last Name</label>
                        <input class="form-control" type="text" name = "lname">
                        <span class="text-danger"><?php echo $errorlname; ?></span>
                   </div>

                   <div class="form-group col-md-6">
                        <label class="control-label labelFont">Date of birth</label>
                        <input class="form-control" type="date" name = "dob">
                        <span class="text-danger"><?php echo $errordob; ?></span>
                   </div>

                   <div class="form-group col-md-6">
                        <label class="control-label labelFont">Month</label>
                        <input class="form-control" type="text" name = "month">
                        <span class="text-danger"><?php echo $errormonth; ?></span>
                   </div>

                   <div class="form-group col-md-6">
                        <label class="control-label labelFont">Postcode</label>
                        <input class="form-control" type="text" name = "post">
                        <span class="text-danger"><?php echo $errorpost; ?></span>
                   </div>

                   <div class="form-group col-md-4">
                        <label class="control-label labelFont">Contact Number</label>
                           <input class="form-control" type="text" name = "numb">
                           <span class="text-danger"><?php echo $errornumb; ?></span>
                   </div>

                   <div class="form-group col-md-4">
                        <label class="control-label labelFont">Product</label>
                            <select name="prod" class="form-control">
                                <option value="100">£100 | 6 | 10</option>
                                <option value="300">£300 | 5 | 15</option>
                                <option value="500">£500 | 3 | 25</option>
                                <option value="800">£800 | 3 | 35</option>
                                <option value="1000">£1000 | 3 | 45</option>
                                <option value="5000">£5000 | 3 | 55</option>
                                <option value="10000">£10,000 | 5 | 60</option>
                                <option value="15000">£15,000 | 5 | 65</option>
                            </select>
                    </div>
                            <div class="form-group col-md-4">
                        <input class="btn btn-primary" type="submit" value="Create User" name ="submit">
                   </div>
                </form>
            </div>
        </div>
    </main>
</div>
<?php
include("footer.php"); 
?>

