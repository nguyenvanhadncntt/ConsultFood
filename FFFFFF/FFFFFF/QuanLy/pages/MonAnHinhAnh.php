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
    <title>Món ăn-Hình ảnh</title>
    <?php
    include('../layout/link-script.php');
    include('../function/MoKetNoi.php');
    include('../function/function_admin.php');
    $danh_sach_mon=lay_thong_tin_mon_an($conn,"");
    $danh_sach_anh=lay_anh($conn);
    If($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['ok'])){
    	if($_FILES['hinhAnh']['name'] != NULL){ // Đã chọn file
    		$path = "../../NguoiDung/images/monan/"; // file sẽ lưu vào thư mục data
    		$tmp_name = $_FILES['hinhAnh']['tmp_name'];
    		$name = $_POST['tenAnh'];
    		$type = $_FILES['hinhAnh']['type'];
    		$size = $_FILES['hinhAnh']['size'];
    		// Upload file
    		move_uploaded_file($tmp_name,$path.$name);
    		$link='../images/monan/'.$name;
    		them_anh_mon_an($link,$conn);
    		them_mon_an_hinh_anh($_POST["maMonAn"],$link,$conn);
    	}
    }
   }
    ?>
</head>
<body>
<?php
include('../layout/header.php');

?>

<div class="row">
    <h2>Thêm Món Ăn-Hình Ảnh</h2>
    <form action="MonAnHinhAnh.php" method="post"  enctype="multipart/form-data" class="form-horizontal">
        <div class="form-group">
            <label class="control-label col-sm-2" for="maMonAn">Chọn Món Ăn:</label>
            <div class="col-sm-8">
                <select class="form-control" name="maMonAn" id="maMonAn">
                <?php if (mysqli_num_rows($danh_sach_mon) > 0) {
                 	while ($row = mysqli_fetch_assoc($danh_sach_mon)) {
         			?>
         			<option value=<?php echo '"'.$row["MaMonAn"].'"';?> ><?php echo $row["TenMonAn"]; ?></option>
         			<?php 
                 	} 
               	}?>
                </select>
            </div>
        </div>
        <div class="form-group"> 
            <label class="control-label col-sm-2" " for="hinhAnh">Chọn Ảnh:</label>
            <div class="col-sm-8">
<!--                    chắc chỗ ni cho bảng hình ảnh thêm 1 cột tên nữa nghe Thành :D -->
             <input type="file" class="form-control" style="padding: 0px;" name="hinhAnh" size="20" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="tenAnh">Tên Ảnh:</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="tenAnh" placeholder="Nhập tên ảnh" required="required">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-8">
                <button type="submit" class="btn btn-primary" name="ok">Thêm Hình Ảnh</button>
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