<?php 
  require_once("config.php");
  session_start();
  if(isset($_POST['login'])){

      $username = $_POST['username'];
      $password = $_POST['password'];

      $sql = "SELECT * FROM tb_users WHERE username='$username' AND password = '$password'";
      $result = mysqli_query($db, $sql);
      if(mysqli_num_rows($result)==0){
        echo $error = '<div class="alert alert-danger">Username Or Password Invalid!</div>';
      } else {
        $row = mysqli_fetch_assoc($result);
        $user = $row['jabatan'];
        $_SESSION['user']=$row['username'];
        $_SESSION['jabatan']=$row['jabatan'];
        $_SESSION['password']=$row['password'];
        $_SESSION['nama'] = $row['nama'];
        $_SESSION['nip'] = $row['nip_bk'];

        if ($user =="Admin") {
          header("Location: admin/");
        } else {
				echo "Anda bukan user!";
               }
      
      }
  }
?>


