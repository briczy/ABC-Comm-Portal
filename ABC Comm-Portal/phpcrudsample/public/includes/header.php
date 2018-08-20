<strong>Welcome to ABC Community Portal</strong> <br/><br/>
<?php 
    if($_SESSION["is_block"] == 1){
//        echo $_SESSION["is_block"];
  //      echo $_SESSION["is_admin"];
			echo "Your Account Has Been Blocked.";
       ?>
       
       <br>
       <br>
       <br>
       <?php 
   } else if($_SESSION["is_admin"] == 1) {
       ?>
       <a href="/students/m1/run8/bzychiong/phpcrudsample/public/home.php">Home</a> &nbsp;
       <a href="/students/m1/run8/bzychiong/phpcrudsample/public/modules/user/admindelete.php">Delete Users</a> &nbsp;
       <a href="/students/m1/run8/bzychiong/phpcrudsample/public/modules/user/userlist.php">View Users</a> &nbsp;
       <a href="/students/m1/run8/bzychiong/phpcrudsample/public/modules/user/searchusers.php">Search Users</a> &nbsp; 
	   <a href="/students/m1/run8/bzychiong/phpcrudsample/public/modules/user/bulk.php">Send Bulk Email</a> &nbsp;
       <a href="/students/m1/run8/bzychiong/phpcrudsample/public/logout.php">Logout</a> &nbsp; 
       <br>
       <br>
       <br>
       <?php 
   } else if(isset($_SESSION["user"])) {
       ?>
       <a href="/students/m1/run8/bzychiong/phpcrudsample/public/home.php">Home</a> &nbsp;
       <a href="/students/m1/run8/bzychiong/phpcrudsample/public/modules/user/updateprofile.php">Update Profile</a> &nbsp;
       <a href="/students/m1/run8/bzychiong/phpcrudsample/public/modules/user/userlist.php">View Users</a> &nbsp;
       <a href="/students/m1/run8/bzychiong/phpcrudsample/public/modules/user/searchusers.php">Search Users</a> &nbsp; 
       <a href="/students/m1/run8/bzychiong/phpcrudsample/public/logout.php">Logout</a> &nbsp; 
       <br>
       <br>
       <br>
       <?php 
       }
       ?>
   