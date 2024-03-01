<?php

include 'config.php';
session_start();
error_reporting(0);
include('config.php');
if($_SESSION['alogin']!=''){
$_SESSION['alogin']='';
}

if(isset($_POST['login']))
{
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password= mysqli_real_escape_string($conn, md5($_POST['password']));

$select_users = mysqli_query($conn, "SELECT * FROM `admin` WHERE UserName = '$username' AND Password = '$password'") or die('query failed');

if(mysqli_num_rows($select_users) > 0){

    $_SESSION['alogin']=$_POST['username'];

    header('location:admin_dashboard.php');

}else{
    $message[] = 'incorrect username or password!';
 }

}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Library Management System</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>

<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>
    <!------MENU SECTION START-->
<?php include('iheader.php');?>
<!-- MENU SECTION END-->
<div class="content-wrapper">
<div class="container">
<div class="row pad-botm">
<div class="col-md-12">
<h4 class="header-line">ADMIN LOGIN FORM</h4>
</div>
</div>
             
<!--LOGIN PANEL START-->           
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" >
<div class="panel panel-info">
<div class="panel-heading">
 LOGIN FORM
</div>
<div class="panel-body">
<form role="form" method="post">

<div class="form-group">
<label>Enter Username</label>
<input class="form-control" type="text" name="username" autocomplete="off" required />
</div>
<div class="form-group">
<label>Password</label>
<input class="form-control" type="password" name="password" autocomplete="off" required />
</div>

 <button type="submit" name="login" class="btn btn-info">LOGIN </button>
</form>
 </div>
</div>
</div>
</div>  
<!---LOGIN PABNEL END-->            
             
 
    </div>
    </div>
     <!-- CONTENT-WRAPPER SECTION END-->
 <?php include('ifooter.php');?>
      <!-- FOOTER SECTION END-->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</script>
</body>
</html>













