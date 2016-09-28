<?php
	session_start();
?>
<h2>
<!-- Welcome, -->
<?php
	echo"<pre>";
		print_r($_SESSION['username']);
	echo"</pre>";
	exit();
    
    if(!empty($_SESSION)) {
        echo $_SESSION['username'];
    } else {
        echo 'Guest | <a href="proses.php">Login?</a>';
	}
?>
</h2>