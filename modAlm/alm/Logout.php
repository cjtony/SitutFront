<?php 
session_start();
unset($_SESSION['keyAlm']);
session_destroy();
header("Location:../../");
