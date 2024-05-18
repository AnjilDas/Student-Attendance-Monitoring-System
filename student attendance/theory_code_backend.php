<?php 
 $servername ='localhost';
 $username = 'root';
 $password = '';
 $database = 'student_attendance_system';
$conn = mysqli_connect($servername,$username,$password,$database);

if(isset($_POST['checking_edit']))
{
    $semester = $_POST['semester'];
    $sub_id = $_POST['sub_id'];
    $tid = $_POST['tid'];
    $year = $_POST['year'];
    //echo $return = $semester.$sub_id.$tid.$year;
    $result_arr=[];
    $query="SELECT S.COLLEGE_ROLL_NUMBER, S.STUDENT_NAME, ST.SUBJECTNAME, S.DEPARTMENT_ID FROM students S, subject_theory ST,enroll_theory ET 
    WHERE S.COLLEGE_ROLL_NUMBER = ET.COLLEGE_ROLL_NUMBER and et.sub_theory_id = st.sub_theory_id AND  ST.SUB_THEORY_ID= '$sub_id' AND 
    S.YE_AR= $year AND S.SEMESTER = '$semester';";
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