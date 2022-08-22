<?php 
include_once("adminviewSQL.php");
include("navbar3.php");
$user = getUsers();
?>
<link rel ="stylesheet" type="text/css" href="site.css"/>
<div class="container pb-5">
    <main role="main" class="pb-3">
        <h2>View User</h2><br>

<?php if(isset($_GET['deleted'])): ?>
            <div class="alert alert-danger alert-dismissible fade show col-10" role="alert" style="font-weight: bold;">
                The user has been deleted
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
<?php endif; ?>

<div class="row">
            <div class="col-10">
                <table class="table table-striped">
                    <thead class="table-dark">
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>Date of birth</td>
                        <td>Month</td>
                        <td>Postcode</td>
                        <td>Contact Number</td>
                        <td>Product</td>
                        <td>Application ID</td>
                        <td>Application Date</td>
                        <td>Application Status</td>
                        <td>Role</td>
                        <td>Lucky Draw</td>
                        <td>Action</td>
                    </thead>

                    <?php
                for ($i=0; $i<count($user); $i++):
                    ?>
                    <tr>
                        <td><?php echo $user[$i]['first_name']?></td>
                        <td><?php echo $user[$i]['last_name']?></td>
                        <td><?php echo $user[$i]['Date_of_birth']?></td>
                        <td><?php echo $user[$i]['Month']?></td>
                        <td><?php echo $user[$i]['Postcode']?></td>
                        <td><?php echo $user[$i]['contact_number']?></td>
                        <td><?php echo $user[$i]['Product']?></td>
                        <td><?php echo $user[$i]['application_id']?></td>
                        <td><?php echo $user[$i]['application_date']?></td>
                        <td><?php echo $user[$i]['application_status']?></td>
                        <td><?php echo $user[$i]['Role']?></td>
                        <td><?php echo $user[$i]['lucky_draw']?></td>
                        <td><a href="adminupdateuser.php?uid=<?php echo $user[$i]['application_id']; ?>">Update | </a><a href="deleteUser.php?uid=<?php echo $user[$i]['application_id']; ?>">Delete</a></td>
                    </tr>
                   <?php endfor;?>
                </table>    
            </div>
        </div>
        <div class="form-group col-md-3"><a href="adminview.php">Back</a></div>
   </main>
</div>
<div>
            <a href="userpdf.php" target="_blank">Generate PDF</a>
</div>
