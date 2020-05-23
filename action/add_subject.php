<?php  
include "../connection/conn.php";

if (isset($_POST['save'])) {
  $course_id = $_POST['course_id'];
  $sem_id = $_POST['sem_id'];
  $year_id = $_POST['year_id'];
  $code = $_POST['code'];
  $title = $_POST['title'];
  $units = $_POST['units'];
  $lec = $_POST['lec'];
  $lab = $_POST['lab'];  

  $rs = mysqli_query($conn, "
INSERT INTO `subjects` (`course_id`, `sem_id`, `year_id`, `code`, `title`, `units`, `lec`, `lab`, `active`) VALUES ({$course_id}, {$sem_id}, {$year_id}, '{$code}', '{$title}', {$units}, {$lec}, {$lab}, 1); 
     ");

  if ($rs == 1) {
    die("
    <script>
    alert('Successfully Added');
    location.href = '../subject.php';  
    </script> 
      ");
  }else{
    die("
    <script>
    alert('No Data Added');
    location.href = '../subject.php';  
    </script> 
      ");
  }
}


?>