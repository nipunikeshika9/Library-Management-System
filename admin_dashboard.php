<?php
session_start();
error_reporting(0);
include('config.php');
if(strlen($_SESSION['alogin'])==0)
  { 
header('location:index.php');
}
else{?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Library Management System | Admin DashBoard</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
      <!------MENU SECTION START-->
<?php include('admin_header.php');?>
<!-- MENU SECTION END-->
    <div class="content-wrapper">
         <div class="container">
            <div class="row pad-botm">
                 <div class="col-md-12">
                 <h4 class="header-line">ADMIN DASHBOARD</h4>
                </div>
            </div>

            
             
            <div class="row">
              <a href="a_manage-books.php">
                 <div class="col-md-3 col-sm-3 col-xs-6">
                     <div class="alert alert-success back-widget-set text-center">
                         <i class="fa fa-book fa-5x"></i>
                         <?php 
                         $select_books = mysqli_query($conn, "SELECT * FROM `tblbooks`") or die('query failed');
                         $number_of_books = mysqli_num_rows($select_books);
                         ?>
                         <h3><?php echo $number_of_books; ?></h3>
                         <p>Books Listed</p>
                     </div>
                 </div>
              </a>

              <a href="manage-issued-books.php">
               <div class="col-md-3 col-sm-3 col-xs-6">
                      <div class="alert alert-warning back-widget-set text-center">
                            <i class="fa fa-recycle fa-5x"></i> 
                            <?php 
                              $select_issuedbooks = mysqli_query($conn, "SELECT id from tblissuedbookdetails where (RetrunStatus='' || RetrunStatus is null)") or die('query failed');
                              $number_of_issuedbooks = mysqli_num_rows($select_issuedbooks);
                            ?>
                         <h3><?php echo $number_of_issuedbooks; ?></h3>
                         <p>Books Not Returned Yet</p>

                        </div>
                </div>
              </a>

              <a href="reg-students.php">
               <div class="col-md-3 col-sm-3 col-xs-6">
                      <div class="alert alert-danger back-widget-set text-center">
                            <i class="fa fa-users fa-5x"></i>
                            <?php 
                              $select_users = mysqli_query($conn, "SELECT id from tblstudents") or die('query failed');
                              $number_of_users = mysqli_num_rows($select_users);
                            ?>
                         <h3><?php echo $number_of_users; ?></h3>
                         <p>Registered Users</p>

                        </div>
                </div>
              </a>

              <a href="manage-authors.php">
                <div class="col-md-3 col-sm-3 col-xs-6">
                      <div class="alert alert-success back-widget-set text-center">
                            <i class="fa fa-user fa-5x"></i>
                            <?php 
                              $select_authors = mysqli_query($conn, "SELECT id from tblauthors") or die('query failed');
                              $number_of_authors = mysqli_num_rows($select_authors);
                            ?>
                         <h3><?php echo $number_of_authors; ?></h3>
                         <p>Authors Listed</p>

                        </div>
                </div>
              </a>
            </div>



            <div class="row">
             <a href="manage-categories.php">            
                 <div class="col-md-3 col-sm-3 rscol-xs-6">
                     <div class="alert alert-info back-widget-set text-center">
                         <i class="fa fa-file-archive-o fa-5x"></i>
                         <?php 
                              $select_category = mysqli_query($conn, "SELECT id from tblcategory") or die('query failed');
                              $number_of_category = mysqli_num_rows($select_category);
                            ?>
                         <h3><?php echo $number_of_category; ?></h3>
                         <p>Listed Categories</p>

                    </div>
                </div>
             </a>
             </div> 
        </div>
             
    </div>

     <!-- CONTENT-WRAPPER SECTION END-->


<?php include('ifooter.php');?>
      <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
<?php } ?>