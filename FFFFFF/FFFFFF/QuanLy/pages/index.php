<?php
session_start();
if(!isset($_SESSION["taiKhoan"]))
{
    header('location:DangNhap.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>index</title>
	<?php 

	include('../layout/link-script.php');

	 ?>
</head>
<body>
<?php 	
	include('../layout/header.php'); 
?>
<h1 style="text-align: center">Trang Quản Lý<h1>
<?php
 	include('../layout/footer.php'); 
?>
</body>
</html>