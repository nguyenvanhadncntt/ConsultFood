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
    <title>Món ăn-Thời tiết</title>
    <?php
    include('../layout/link-script.php');
    include('../function/MoKetNoi.php');
    include('../function/function_admin.php');
    $danh_sach_mon=lay_thong_tin_mon_an($conn,"WHERE MaMonAn not in (SELECT maMonAn from monan_thoitiet)");
    If($_SERVER["REQUEST_METHOD"] == "GET") {
    	if(isset($_GET['ok'])){
    		them_mon_an_thoi_tiet($_GET["maMonAn"],$_GET["maThoiTiet"],$conn);
    		header("Location:MonAnThoiTiet.php");
    	}
    }
    ?>
</head>
<body>
<?php
include('../layout/header.php');
?>

<div class="row">
    <h2>Thêm Món Ăn-Thời tiết</h2>
    <form action="#" method="get" class="form-horizontal">
        <div class="form-group">
            <label class="control-label col-sm-2" for="maMonAn">Món Ăn:</label>
            <div class="col-sm-8">
                <select class="form-control" name="maMonAn" id="maMonAn">
                <?php if (mysqli_num_rows($danh_sach_mon) > 0) {
                 	while ($row = mysqli_fetch_assoc($danh_sach_mon)) {
         			?>
         			<option value=<?php echo '"'.$row["MaMonAn"].'"';?> ><?php echo $row["TenMonAn"]; ?></option>
         			<?php 
                 	} 
               	}
               	else echo '<option>NONE</option>' ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="thoiTiet">Thời Tiết:</label>
            <div class="col-sm-8">
                <select class="form-control" name="maThoiTiet">
                    <option value="MTT1">Nắng</option>
                    <option value="MTT2">Lạnh</option>
                    <option value="MTT3">Mát</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-8">
                <button type="submit" class="btn btn-primary" name="ok">Xác nhận</button>
            </div>
        </div>
    </form>
</div>
<?php
include('../function/DongKetNoi.php');
include('../layout/footer.php');
?>
</body>
</html>