<?php 
include('connection/conn.php');
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
$sql = "SELECT * from user where username = '$username' and password = SHA1('$password');";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $sql2 = mysqli_query($conn, "SELECT * FROM `default`");
    $fetch = mysqli_fetch_assoc($sql2);
     $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['sem_id'] = $fetch['sem_id'];
        $_SESSION['sy_id'] = $fetch['sy_id'];
    ?>    <script type="text/javascript">
                    alert("You are Successfully Login.");
                    window.location = "dashboard.php";
                    </script>
            <?php

    

    }

    else{
      
      ?>    <script type="text/javascript">
                    alert("Opss!!! Username or Password are Invalid! Please Contact Your Administrator.");
                    window.location = "index.php";
                    </script>
            <?php
    }
    $conn->close();
    ?>