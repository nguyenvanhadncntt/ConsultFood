<?php
session_start();
$message="";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $taiKhoan="";
    $matKhau="";
    if(isset($_POST["taiKhoan"]))
    {
        $taiKhoan=$_POST["taiKhoan"];
    }
    if(isset($_POST["matKhau"]))
    {
        $matKhau=$_POST["matKhau"];
    }
    if($taiKhoan=="admin" && $matKhau=="admin")
    {
        $_SESSION["taiKhoan"]="admin";
    }
    else {
        $message = "tên đăng nhập hoặc mật khẩu bị sai";
    }
}
if(isset($_SESSION["taiKhoan"]))
{
    header("Location:index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Đăng Nhập</title>
    <?php
    include('../layout/link-script.php');
    ?>
</head>
<body>
<?php
include('../layout/header.php');
?>
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Mời Bạn Đăng Nhập Trước </h3>
            </div>
            <div class="panel-body">
                <form action="DangNhap.php" method="post" >
                    <span style="color: #ff0000;"><?php echo $message ?></span>
                    <fieldset>
                        <div class="form-group">
                            <input class="form-control" placeholder="Nhập tài khoản" name="taiKhoan" value="admin" type="text" autofocus required="required">
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Nhập mật khẩu" name="matKhau" type="password" value="admin" required="required">
                        </div>
                        <input type="submit" class="btn btn-primary" value="Đăng Nhập">
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include('../layout/footer.php');
?>
</body>
</html