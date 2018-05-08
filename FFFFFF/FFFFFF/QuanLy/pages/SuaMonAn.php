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
<title>Sửa món ăn</title>
<?php
include('../layout/link-script.php');
include('../function/MoKetNoi.php');
include('../function/function_admin.php');
if ($_SERVER["REQUEST_METHOD"] == "GET") {
	if(isset($_GET["MaMonAn"])){
		$mon_an=mysqli_fetch_assoc(lay_thong_tin_mon_an($conn,"WHERE MaMonAn='".$_GET["MaMonAn"]."'"));
	}
}
if($_SERVER["REQUEST_METHOD"] == "POST") {
	if(isset($_POST['ok'])){
		if($_FILES['hinhAnh']['name'] != NULL){ 
			$path = "../../NguoiDung/images/monan/"; 
			$tmp_name = $_FILES['hinhAnh']['tmp_name'];
			$name = $_FILES['hinhAnh']['name'];
			$type = $_FILES['hinhAnh']['type'];
			$size = $_FILES['hinhAnh']['size'];
			move_uploaded_file($tmp_name,$path.$name);
			$hinh_anh='../images/monan/'.$name;
		}	
			else $hinh_anh=$_POST["anhDaiDien"];
			sua_mon_an($_POST["maMonAn"],$_POST["tenMonAn"],$_POST["moTa"],$hinh_anh,$_POST["giaTien"],$_POST["monMoi"],$_POST["diem"],$conn);
			header("Location:ThongTinMon.php");
	}
}
?>
</head>
<body>
<?php
include('../layout/header.php');
?>

<div class="row">
    <h2>Sửa Món Ăn</h2>
    <form action="SuaMonAn.php" method="post" enctype="multipart/form-data" class="form-horizontal">
        <div class="form-group">
            <label class="control-label col-sm-2" for="tenMonAn">Tên Món Ăn:</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="tenMonAn" name="tenMonAn" placeholder="Nhập tên món ăn" value=<?php echo '"'.$mon_an["TenMonAn"].'"'?> required="required">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="moTa">Mô Tả:</label>
            <div class="col-sm-8">
                <textarea class="form-control" rows="5" id="moTa" name="moTa"  placeholder="Nhập mô tả món ăn" required="required"><?php echo $mon_an["MoTa"]?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="hinhAnh">Đổi Ảnh:</label>
            <div class="col-sm-8">
                <input type="file" class="form-control" id="hinhAnh" style="padding: 0px;" name="hinhAnh" size="20" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="giaTien">Giá Tiền:</label>
            <div class="col-sm-8">
                <input type="number" class="form-control" id="giaTien" value=<?php echo '"'.$mon_an["GiaTien"].'"'?> name="giaTien" placeholder="Nhập giá tiền món ăn" required="required">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="monMoi">Món Mới:</label>
            <div class="col-sm-8">
                <select class="form-control" name="monMoi"  id="monMoi">
                    <option value="1">Món Mới</option>
                    <option <?php if ($mon_an["MonMoi"]==0) echo 'selected';?> value="0">Món Cũ</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="diem">Điểm:</label>
            <div class="col-sm-8">
                <input type="number" step="0.1" max="10.0" min="0.0" class="form-control" id="diem" name="diem" placeholder="Nhập điểm món ăn" value=<?php echo '"'.$mon_an["Diem"].'"'?> required="required">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-8">
                <input type="submit" value="Sửa món ăn"  class="btn btn-primary " name="ok"/>
            </div>
            <input type="hidden" name="maMonAn" value=<?php echo '"'.$mon_an["MaMonAn"].'"'?>/>
            <input type="hidden" name="anhDaiDien" value=<?php echo '"'.$mon_an["HinhAnhDaiDien"].'"'?>/>
        </div>
    </form>
</div>
<?php
include('../function/DongKetNoi.php');
include('../layout/footer.php');
?>
</body>
</html>