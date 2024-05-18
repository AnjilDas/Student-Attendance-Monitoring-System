<?php 
 $servername ='localhost';
 $username = 'root';
 $password = '';
 $database = 'student_attendance_system';
$conn = mysqli_connect($servername,$username,$password,$database);

if(isset($_POST['checking_stud']))
{
    $year = $_POST['year'];
    $dep_id = $_POST['dep_id'];
   
    $result_arr=[];
    $query="select * from students S , DEPARTMENT D where S.DEPARTMENT_ID = D.DEPARTMENT_ID AND S.department_id='$dep_id' and S.ye_ar='$year';";
    $result = mysqli_query($conn, $query);
    $num = mysqli_num_rows($result);
    if ($num > 0)
    {
            foreach($result as $row) 
            {
                  array_push($result_arr,$row);
            }
            header('content-type: application/json');
            echo json_encode($result_arr);
    }
    else
    {
        echo $return = "No Students Found" ;   
    }
    mysqli_close($conn);

}
?>