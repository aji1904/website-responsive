<?php
session_start();
if (!$_SESSION['jabatan']) {
    session_destroy();
    header("Location: ../");
  }
?>