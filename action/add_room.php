<?php  
include "../connection/conn.php";

if (isset($_POST['save'])) {
  $room_name = $_POST['room_name'];
  $room_type = $_POST['room_type'];
 

  $rs = mysqli_query($conn, "
INSERT INTO `room` (`name`, `room_type`, `active`) VALUES ('{$room_name}', '{$room_type}', 1);
     ");


  if ($rs == 1) {
    die("
    <script>
    alert('Successfully Added');
    location.href = '../room.php';  
    </script> 
      ");
  }else{
    die("
    <script>
    alert('No Data Added');
    location.href = '../room.php';  
    </script> 
      ");
  }
}


?>