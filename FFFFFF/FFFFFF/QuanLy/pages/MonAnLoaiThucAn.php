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
    <title>Món ăn-Loại thức ăn</title>
    <?php
    include('../layout/link-script.php');
    include('../function/MoKetNoi.php');
    include('../function/function_admin.php');
    $danh_sach_mon=lay_thong_tin_mon_an($conn,"WHERE isNULL(MaLoaiTA)");
    If($_SERVER["REQUEST_METHOD"] == "GET") {
    	if(isset($_GET['ok'])){
    		them_ma_loai_mon_an($_GET["maMonAn"],$_GET["maLoai"],$conn);
    		header("Location:http://localhost/FFFFFF/QuanLy/pages/MonAnLoaiThucAn.php");
    	}
    }
    ?>
</head>
<body>
<?php
include('../layout/header.php');
?>

<div class="row">
    <h2>Thêm món ăn-loại thức ăn</h2>
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
               	else echo '<option>NONE</option>';?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="LoaiThucAn">Lọai Thức Ăn:</label>
            <div class="col-sm-8">
                <select class="form-control" name="maLoai">
                    <option value="ML1">Trong nước</option>
                    <option value="ML2">Nước ngoài</option>
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