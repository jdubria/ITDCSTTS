<?php  
include "../connection/conn.php";

if (isset($_POST['save'])) {
  $facode_id = $_POST['facode_id'];
  $fac_name = $_POST['fac_name'];
 

  $rs = mysqli_query($conn, "
INSERT INTO `itdcstts`.`faculty` (`facode_id`, `fac_name`, `active`) VALUES ('{$facode_id}', '{$fac_name}', 1);
     ");


  if ($rs == 1) {
    die("
    <script>
    alert('Successfully Added');
    location.href = '../faculty.php';  
    </script> 
      ");
  }else{
    die("
    <script>
    alert('No Data Added');
    location.href = '../faculty.php';  
    </script> 
      ");
  }
}


?>