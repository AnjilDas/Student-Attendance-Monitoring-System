<?php 
session_start();
$t_id=$_SESSION['t_id'];
$year=$_GET['ye_ar'];
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title> ATTENDANCE PORTAL </title>
</head>
<body>
    <nav class="navbar navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
     <h1> ATTENDANCE PORTAL OF PRACTICAL CLASS</h1>
    </a>
  </div>
    </nav>
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                <div class="card-header bg-danger">
                        <h4>
                            ATTENDANCE PORTAL
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                            <label for=""><h5>SELECT DATE </h5></label>
                            <input type="date" class="form-control" id="DATE" name="date" required>
                            </div>
                            <div class="col-md-4">
                                <label for=""> <h5>SEMESTER</h5> </label>
                                <select class="form-control" name="semester" id="sem">
                                    <option value=""> SELECT SEMESTER</option>
                                    <?php
                                            if ($year == 1)
                                            {
                                                echo "<option id='1ST SEMESTER' value='1ST SEMESTER' >1ST SEMESTER</option>
                                                    <option id='2ND SEMESTER' value='2ND SEMESTER'>2ND SEMESTER</option>";
                                            }
                                            else if ($year == 2)
                                            {
                                                echo "<option id='3RD SEMESTER' value='3RD SEMESTER' >3RD SEMESTER</option>
                                                    <option id='4TH SEMESTER' value='4TH SEMESTER'>4TH SEMESTER</option>";
                                            }
                                            else if ($year == 3)
                                            {
                                                echo "<option id='5TH SEMESTER' value='5TH SEMESTER' >5TH SEMESTER</option>
                                                    <option id='6TH SEMESTER' value='6TH SEMESTER' >6TH SEMESTER</option>";
                                            }
                                        ?>
                                    </SELECT>   
                            </div>
                            <div class="col-md-4">
                                <label for=""><h5> SUBJECT </h5></label>
                                <select class="form-control" name="subject" id="sub">
                                    <option value="">SELECT SUBJECT</option>
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
                                        $query="select SUB_PRACTICAL_ID,subjectname from subject_PRACTICAL where SUB_PRACTICAL_ID in 
                                        (select sub_PRACTICAL_id from teaches_PRACTICAL where TEACHER_ID='$t_id') and ye_ar='$year';";
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
                                            echo "<option >No record Found</option>" ;   
                                        }
                                        mysqli_close($conn);
                                    ?>
                                    
                                    </SELECT>
                            </div>
                        </div>
                    <div class="card-body" align="center">
                            <br>
                            <input class="btn btn-primary smtbtn" type="submit" value="Submit">
                    </div>
                    </div>
                        <div class="card-body">
                        <table class="table table-bordered table-striped" >
                            <thead>
                                <tr>
                                    <th>COLLEGE ROLL NO</th>
                                    <th> STUDENT NAME </th>
                                    <th>YEAR</th>
                                    <th>SEMESTER</th>
                                    <th>SUBJECT NAME</th>
                                    <th>DATE</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody class="studentdata">
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="card-body" align="center">
                        <input class="btn btn-primary insertbtn" type="submit" value="ADD ATTENDANCE">
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
            var count = 0;
            var date,sub_id,tid,year,semester;
            var dep_id;
            $(document).on("click", ".smtbtn", function () 
            {
                date = document.getElementById("DATE").value ;
                if(date != "")
                {
                        semester = document.getElementById("sem").value;
                        sub_id = document.getElementById("sub").value;
                        tid = "<?php echo $t_id; ?>" ;
                        year = "<?php echo $year; ?>" ;
                        //alert(sub);
                        $.ajax(
                            {
                                type: "POST",
                                url: "practical_code_backend.php",
                                data: {
                                    'checking_edit': true,
                                    'semester': semester,
                                    'sub_id': sub_id,
                                    'tid': tid,
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
                                        $.each(response, function (key, studedit) 
                                        { 
                                            count=count+1;
                                            dep_id=studedit['DEPARTMENT_ID'];
                                            console.log(dep_id);
                                            $('.studentdata').append('<tr id="row_'+count+'">'+
                                                '<td id="roll_'+count+'" value="'+studedit['COLLEGE_ROLL_NUMBER']+'">'+studedit['COLLEGE_ROLL_NUMBER']+'</td>\
                                                <td id="name_'+count+'" value="'+studedit['STUDENT_NAME']+'">'+studedit['STUDENT_NAME']+'</td>\
                                                <td >'+year+'</td>\
                                                <td >'+semester+'</td>\
                                                <td >'+studedit['SUBJECTNAME']+'</td>\
                                                <td >'+date+'</td>\
                                                <td >\
                                                <div class="form-check form-check-inline">\
                                                <input class="form-check-input" type="radio" name="flexRadioDefault_'+count+'" id="p'+count+'" value="present">\
                                                <label class="form-check-label" for="flexRadioDefault1">Present</label>\
                                                </div>\
                                                <div class="form-check form-check-inline">\
                                                <input class="form-check-input" type="radio" name="flexRadioDefault_'+count+'" id="a'+count+'" value="absent" checked>\
                                                <label class="form-check-label" for="flexRadioDefault1">Absent</label>\
                                                </div>\
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
                    alert("Please Select the Date");
                }
            }); 
            
            
                 
            $(document).on("click", ".insertbtn", function () 
            {
                var roll,name,action,p_action,a_action;
                var att_arr=[];
                var f=1;
                
                for (let i = 1; i <= count; i++) 
                {
                    roll = document.getElementById("roll_"+i).innerText;
                    name = document.getElementById("name_"+i).innerText;
                    p_action = document.getElementById("p"+i);
                    a_action = document.getElementById("a"+i);
                    if(p_action.checked)
                    {
                        action ="present";
                    }
                    else{
                        action = "absent";
                    }
                    var arr=[roll,tid,sub_id,date,dep_id,year,semester,action];
                    att_arr.push(arr);
                }
                console.log(att_arr);
                $.ajax(
                        {
                            type: "POST",
                            url: "pratical_attendence_insert_code_backend.php",
                            data: {
                                'checking_insert': true,
                                'data': att_arr,
                            },
                            success: function (response) 
                            {
                                console.log(response);
                                //alert(response);
                                
                                if(response !== " ALREADY GIVEN THE ATTENDENCE ON THE SELECTED DATE AND SELECTED SUBJECT ")
                                {
                                    alert(response);
                                    location.reload();
                                }
                                else
                                {
                                    alert(response);
                                    location.reload();
                                }
                                
                            }
                        });
            
            });   

        });
           


    </script>
  </body>
</html>
