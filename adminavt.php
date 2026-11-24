<?php
  session_start();

  $script_avt = 'admin.html';

	if($_SERVER["REQUEST_METHOD"] !== "POST"){
		header("Location: $script_avt");
	  exit();
	}

  $login = trim($_POST['login']);
  $pas = trim($_POST['password']);

  if ($login == '' || $pas == '') {
		header("Location: $script_avt");
		exit('');
	}

  if ($login == 'admin' && $pas == 'admin') {
      $_SESSION['admin'] = true;
      $script = 'adminpanel.php';

      if (file_exists($script)) {
          header("Location: $script");
          exit();
      } else {
          echo "<script>alert('Not found');</script>";
      }
  } else {
      echo "<script>alert('Invalid username and/or password'); window.location.href='".$script_avt."';</script>";
  }
?>
