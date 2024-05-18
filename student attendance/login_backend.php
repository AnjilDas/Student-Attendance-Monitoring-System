<?php
session_start();

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
 
$emai =$_REQUEST['email'];
$pass1 = $_REQUEST['password'];

echo $emai;
$query = "SELECT * FROM teacher where email_address='$emai';";

$result = mysqli_query($conn, $query);

   $num = mysqli_num_rows($result);
   echo $num;
   if ($num > 0)
   {
           while ($row = mysqli_fetch_row($result)) 
           {
               $t_id = $row[0];
               $t_name = $row[1];
               $email_address= $row[2];
               $password = $row[3];
               $t_num = $row[4];
               $dept_id = $row[5];
           }
               
               if($pass1 == $password)
               {
                   $_SESSION["t_id"] = $t_id;
                   header("Location: attendance_dashboard.php");
               }
               else
               {
                   $_SESSION['msg']="Invalid password";
                   header("Location: login.php");
                   
               }
           mysqli_free_result($result);
   }
   else
   {
       $_SESSION['msg']="Invalid email";
       header("Location: login.php");
   }
?>