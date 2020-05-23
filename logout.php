<?php
include('connection/conn.php');
include('connection/session.php');

session_destroy();


?>
<script type="text/javascript">
    alert("You are Successfully Logout!");
    window.location = "index.php";
</script>
