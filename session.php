<?php
include("connect/connection.php");

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

if (!isset($_SESSION['id']) || ($_SESSION['id'] == '')) {
    ?>
    <script>
        window.location = '../login.php?=Error';
    </script>	
    <?php
}

$id = $_SESSION['id'];
$query=mysqli_query ($connect,"SELECT * FROM members WHERE member_id ='$id'");
$rowCount=mysqli_fetch_array($query);
// $cover_picture = $rowCount['cover_picture'];
$userpicture=$rowCount['image'];
$firstname=$rowCount['first_name'];
$lastname=$rowCount['last_name'];
$username=$rowCount['username'];
$id2 = $rowCount['member_id'];
$userfullname = $rowCount['first_name']." ".$rowCount['middle_name']." ".$rowCount['last_name'];
?>

<!-- $session_id=$_SESSION['id'];
$user_query = $conn->query("select * from members where member_id = '$session_id'");
$user_row = $user_query->fetch();
$name = $user_row['firstname'];
$imgxyz = $user_row['image'];
$member_type = $user_row['access'];
$access = "Member";
?> -->
