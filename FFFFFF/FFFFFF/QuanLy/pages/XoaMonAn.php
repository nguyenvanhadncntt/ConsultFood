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
<title>Xóa món ăn</title>
<?php
include('../layout/link-script.php');
include('../function/MoKetNoi.php');
include('../function/function_admin.php');
if ($_SERVER["REQUEST_METHOD"] == "GET") {
	if(isset($_GET["MaMonAn"])){
		$mon_an=mysqli_fetch_assoc(lay_thong_tin_mon_an($conn,"WHERE MaMonAn='".$_GET["MaMonAn"]."'"));
	}
    else {
        header("Location:ThongTinMon.php");
    }
    }
    If($_SERVER["REQUEST_METHOD"] == "POST") {
       xoa_mon_an($_POST['maMonAn'],$conn);
       header("Location:ThongTinMon.php");
    }

?>
</head>
<body>
<?php
include('../layout/header.php');
?>

<div class="row">
    <h2>Xóa Món Ăn</h2>
    <form action="XoaMonAn.php" method="post" class="form-horizontal">
        <div class="form-group">
            <label class="control-label col-sm-2" for="tenMonAn">Tên Món Ăn:</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="tenMonAn" name="tenMonAn" placeholder="Nhập tên món ăn" value=<?php echo '"'.$mon_an["TenMonAn"].'"'?> required="required" readonly>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="moTa">Mô Tả:</label>
            <div class="col-sm-8">
                <textarea class="form-control" rows="5" id="moTa" name="moTa"  placeholder="Nhập mô tả món ăn" required="required" readonly><?php echo $mon_an["MoTa"]?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="hinhAnh">Đổi Ảnh:</label>
            <div class="col-sm-8">
                <img src= <?php echo'"../../NguoiDung'. substr($mon_an["HinhAnhDaiDien"],2) .'"' ?> height="100px" width="100px"> 
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="giaTien">Giá Tiền:</label>
            <div class="col-sm-8">
                <input type="number" class="form-control" id="giaTien" value=<?php echo '"'.$mon_an["GiaTien"].'"'?> name="giaTien" placeholder="Nhập giá tiền món ăn" required="required" readonly>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="monMoi">Món Mới:</label>
            <div class="col-sm-8">
                <select class="form-control" name="monMoi"  id="monMoi" readonly>
                    <option value="1">Món Mới</option>
                    <option <?php if ($mon_an["MonMoi"]==0) echo 'selected';?> value="0">Món Cũ</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="diem">Điểm:</label>
            <div class="col-sm-8">
                <input type="number" step="0.1" max="10.0" min="0.0" class="form-control" id="diem" name="diem" placeholder="Nhập điểm món ăn" value=<?php echo '"'.$mon_an["Diem"].'"'?> required="required" readonly>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-8">
                <input type="submit" value="Xóa món ăn"  class="btn btn-primary " name="ok"/>
            </div>
            <input type="hidden" name="maMonAn" value=<?php echo '"'.$mon_an["MaMonAn"].'"'?>/>
        </div>
    </form>
</div>
<?php
include('../function/DongKetNoi.php');
include('../layout/footer.php');
?>
</body>
</html>