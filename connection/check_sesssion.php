<?php

if(empty($_SESSION['username'])){
	// header("Location: ../index.php?error=2");
	die("<script>
 	location.href = 'index.php?error=2'; 
		</script>");
}

?>