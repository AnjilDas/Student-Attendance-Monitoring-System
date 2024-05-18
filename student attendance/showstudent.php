<?php 
session_start();
$t_id=$_SESSION['t_id'];
//echo $t_id;
//echo $year;
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title> STUDENT RECORD </title>
</head>
<body>
    <nav class="navbar navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
     <h1> STUDENTS RECORD</h1>
    </a>
  </div>
</nav>
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-danger">
                        <h4>
                            STUDENT RECORD PORTAL
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label for=""> <h5>DEPARTMENT</h5> </label>
                                <select class="form-control" name="department" id="dep">
                                    <option value="" > SELECT DEPARTMENT</option>
                                    <?php
                                            $servername ='localhost';
                                            $username = 'root';
                                            $password = '';
                                            $database = 'student_attendance_system';
                                            $conn = mysqli_connect($servername,$username,$password,$database);
                                            // Check connection
                                            if($conn === false){
                                                die("ERROR: Could not connect. "
                                                    . mysqli_connect_error());
                                            }
                                            else{
                                               echo "Connection suss";
                                            }
                                            $query="SELECT * FROM DEPARTMENT;";
                                            $result = mysqli_query($conn, $query);
                                            $num = mysqli_num_rows($result);
                                            echo $num;
                                            if ($num > 0)
                                            {
                                                    while ($row = mysqli_fetch_row($result)) 
                                                    {
                                                        echo "<option value=$row[0]>$row[1]</option>" ;   
                                                    }
                                            }
                                            else
                                            {
                                                echo "<option value='no'>No record Found</option>" ;   
                                            }
                                            mysqli_close($conn);
                                        ?>
                                    </SELECT>   
                            </div>
                            <div class="col-md-4">
                                <label for=""><h5> YEAR </h5></label>
                                <select class="form-control" id="year">
                                    <option value="" name="year">SELECT YEAR</option>
                                    <option value="1" >FIRST YEAR</option>
                                    <option value="2" >SECOND YEAR</option>
                                    <option value="3" >THIRD YEAR</option>
                                    <option value="4" >FOURTH YEAR</option>
                                           
                                    </SELECT>
                            </div>
                            <div class="col-md-4">
                                <br>
                                <br>
                                    <input class="btn btn-primary smtbtn" type="submit" value="SHOW">
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>UNIVERSITY ROLL NUMBER</th>
                                    <th>COLLEGE ROLL NO</th>
                                    <th> STUDENT NAME </th>
                                    <th>DEPARTMENT</th>
                                    <th>YEAR</th>
                                    <th>SEMESTER</th>
                                    <th>EMAIL</th>
                                    <th>HOUSE ADDRESS</th>
                                    <th>PHONE NUMBER</th>
                                    <th>FATHER NAME</th>
                                    <th>MOTHER NAME</th> 
                                </tr>
                            </thead>
                            <tbody class="studentdata">
                                
                            </tbody>
                        </table>
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
    <script>
        $(document).ready(function () 
        {
            var year;
            var dep_id,dep_name;
            $(document).on("click", ".smtbtn", function () 
            {
                year = document.getElementById("year").value ;
                dep_id = document.getElementById("dep").value ;
                if(year != "" && dep_id !="")
                {
                        console.log(dep_id);
                        console.log(year);
                        //alert(sub);
                        $.ajax(
                            {
                                type: "POST",
                                url: "fetch_student.php",
                                data: {
                                    'checking_stud': true,
                                    'dep_id': dep_id,
                                    'year': year,
                                },
                                success: function (response) 
                                {
                                    console.log(response.length);
                                    console.log(response);
                                    //alert(response);
                                    $('.studentdata').html("");
                                    if(response !== "No Students Found")
                                    {
                                        $.each(response, function (key, value) 
                                        { 
                                            $('.studentdata').append('<tr >'+
                                                '<td>'+value['UNIVERSITY_ROLL_NUMBER']+'</td>\
                                                <td >'+value['COLLEGE_ROLL_NUMBER']+'</td>\
                                                <td >'+value['STUDENT_NAME']+'</td>\
                                                <td >'+value['DEPARTMENT_NAME']+'</td>\
                                                <td >'+value['YE_AR']+'</td>\
                                                <td >'+value['SEMESTER']+'</td>\
                                                <td >'+value['EMAIL']+'</td>\
                                                <td >'+value['HOUSE_ADDRESS']+'</td>\
                                                <td >'+value['PHONE_NUMBER']+'</td>\
                                                <td >'+value['FATHER_NAME']+'</td>\
                                                <td >'+value['MOTHER_NAME']+'</td>\
                                                </tr>');   
                                        });
                                    }
                                    else
                                    {
                                        alert(response);
                                    }
                                    
                                }
                            });
                }
                else{
                    alert("DEPARTMENT OR YEAR IS NOT SELECTED");
                }
            }); 
        });
           


    </script>

  </body>
</html>
