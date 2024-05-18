<?php 
 $servername ='localhost';
 $username = 'root';
 $password = '';
 $database = 'student_attendance_system';
$conn = mysqli_connect($servername,$username,$password,$database);

if(isset($_POST['checking_insert']))
{
    $data = $_POST['data'];
    $query = '';
    $result_arr=[];
    $date=$data[0][3];
    $sub_id=$data[0][2];
    $query1="SELECT * FROM `attend_practical_class` WHERE DA_TE='$date' AND SUB_PRACTICAL_ID='$sub_id';";
    $result = mysqli_query($conn, $query1);
    $num = mysqli_num_rows($result);
    if ($num == 0)
    {
        foreach($data as $row) 
        {
            $query .= "INSERT INTO attend_practical_class(COLLEGE_ROLL_NUMBER,TEACHER_ID,SUB_PRACTICAL_ID,DA_TE,DEPARTMENT_ID,YE_AR,SEMESTER,
            ATTENDANCE_STATUS)VALUES ('".$row[0]."', '".$row[1]."', '".$row[2]."','".$row[3]."','".$row[4]."','".$row[5]."','".$row[6]."',
            '".$row[7]."'); ";
        }
        if(mysqli_multi_query($conn, $query)) //Run Mutliple Insert Query
        {
            echo $return ="ATTENDANCE SUBMITTED SUCCESSFULLY FOR DATE";
        }
    }
    else{
        echo $return =" ALREADY GIVEN THE ATTENDENCE ON THE SELECTED DATE AND SELECTED SUBJECT ";
    }
}
?>
