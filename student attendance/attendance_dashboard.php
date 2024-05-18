<?php 
session_start();
$t_id=$_SESSION['t_id'];
$_SESSION["t_id"] = $t_id;
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title> ATTENDANCE DASHBOARD</title>
   
</head>
<body>
    <nav class="navbar navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
     <h1> STUDENT ATTENDANCE DASHBOARD </h1>
    </a>
  </div>
    </nav>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            BTECH THEORY 
                        </h4>
                    </div>
                    <div class="card-body">
                    <div >
                            <a  class="btn btn-danger btn-lg"  href="attendance_portal_theory.php?ye_ar=1" role="button"><h1> 1ST YEAR </h1></a>
                            <a  class="btn btn-warning btn-lg"  href="attendance_portal_theory.php?ye_ar=2" role="button"> <h1>2ND YEAR </h1></a>
                            <a  class="btn btn-success btn-lg"  href="attendance_portal_theory.php?ye_ar=3" role="button"> <h1>3RD YEAR </h1></a>
                            <a  class="btn btn-secondary btn-lg"  href="attendance_portal_theory.php?ye_ar=4" role="button"> <h1>4TH YEAR </h1></a>  
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            BTECH PRACTICAL 
                        </h4>
                    </div>
                    <div class="card-body">
                    <div >
                            <a  class="btn btn-info btn-lg"  href="attendance_portal_practical.php?ye_ar=1" role="button"><h1> 1ST YEAR </h1></a>
                            <a  class="btn btn-warning btn-lg"  href="attendance_portal_practical.php?ye_ar=2" role="button"><h1> 2ND YEAR </h1></a>
                            <a  class="btn btn-success btn-lg"  href="attendance_portal_practical.php?ye_ar=3" role="button"><h1> 3RD YEAR </h1></a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            SHOW STUDENT RECORD 
                        </h4>
                    </div>
                    <div class="card-body">
                    <div >
                            <a  class="btn btn-info btn-lg"  href="showstudent.php" role="button"><h1> STUDENT DATA </h1></a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

  </body>
</html>
