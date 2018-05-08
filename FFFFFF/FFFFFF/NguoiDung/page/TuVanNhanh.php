<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tư Vấn Nhanh</title>
    <meta charset="utf-8">
    <!--css-->
    <!--Khai báo các thư viện-->
    <?php
    include('../layout/link-script.php');
    ?>

</head>
<body>
<!--==============================header=================================-->
<?php
include('../layout/header.php');
?>
<?php
session_start();

// nếu đã tồn tại session đăng ký thì hủy để khởi tạo lại
if(isset($_SESSION['DK']))
{
    unset($_SESSION['DK']);
}

if(isset($_SESSION['cot_cau_hoi']))
{
    unset($_SESSION['cot_cau_hoi']);
}
if(isset($_SESSION['cauhoi']))
{
    unset($_SESSION['cauhoi']);
}

// khởi tạo session câu hởi
    $_SESSION['cauhoi']=1;
// lưu lại các thuộc tính tương ứng với mỗi cột
    $cot_cau_hoi = array(
    'thoitiet'=> array("MaThoiTiet","TenThoaiTiet","MoTa","HinhMinhHoa"),
    'khonggian'=> array("MaKhongGian","SoNguoiDi","MoTa","HinhMinhHoa"),
    'loaithucan'=> array("MaLoaiTA","TenLoaiThucAn","MoTa","HinhMinhHoa"),
    'luongtien'=> array("MaLT","TenLT","MoTa","HinhMinhHoa"),
    'thoigian'=> array("MaThoiGian","TenThoiGian","MoTa","HinhMinhHoa"),
    'phuongtien'=> array("MaPT","TenPT","MoTa","HinhMinhHoa"),
    'luatuoi'=> array("MaLuaTuoi","TenLuaTuoi","MoTa","HinhMinhHoa"),
    'treem'=> array("MaLuaChon","Ten","MoTa","HinhMinhHoa")
);

// khởi tạo session lưu lại mảng các điều kiện người dùng đã chọn.
$_SESSION['DK']= array();

// khởi tạo session lưu lại các cột
$_SESSION['cot_cau_hoi']=$cot_cau_hoi;

?>
<!--==============================content=================================-->
<section id="content">
    <div class="ic"></div>
    <div class="border-horiz"></div>
    <div class="main">
        <h3>Hệ Chuyên Gia : Tư Vấn Món Ăn Vặt</h3>
        <figure class="img-indent box-img"><img src="../images/uudiem/tuvan.jpg" alt="" /></figure>
        <div class="overflow padd-2">
            <p> Đây là chức năng chính của Trang web ,thông qua những câu trả lời của bạn, Hệ chuyên gia chúng tôi sẽ giải đáp và đưa ra món ăn phù hợp nhất cho bạn.Thông Tin chi tiết về hệ chuyên gia xem phía dưới</p>
            <a href="TracNghiemTuVan.php" class="button"><span>Làm Luôn </span></a>
        </div>
        <div class="clear"></div>
    </div>
</section>
<div class="border-horiz"></div>
<section id="content">
    <div class="main">
        <h3>Tại Sao Lại Chọn Chuyên Gia Của Chúng Tôi </h3>
        <!--Đoạn này  chém gió hơi quá tay thôi kệ =)) -->
        <div class="uu_diem">
            <figure class="img-indent box-img box-img1"><img src="../images/uudiem/ud1.jpg " alt="" /></figure>
            <div class="overflow padd-2">
                <h4 class="chuc_nang">Một hệ chuyên gia thông minh</h4>
                <p> Hệ chuyên Gia sẽ hỏi bạn những cấu hỏi trắc nghiệm nhanh , để thu thập dữ liệu từ bạn.</p>
            </div>
            <div class="clear">
            </div>
        </div>
        <div class="border-horiz"></div>
        <div class="uu_diem">
            <figure class="img-indent box-img box-img1"><img src="../images/uudiem/ud2.jpg " alt="" /></figure>
            <div class="overflow padd-2">
                <h4 class="chuc_nang">Một hệ chuyên gia thông thái </h4>
                <p> Suy luận nhanh , chính xác để đưa ra gợi ý những món ăn phù hợp nhất với bạn.</p>
            </div>
            <div class="clear"></div>
        </div>
        <div class="border-horiz"></div>
        <div  class="uu_diem">
            <figure class="img-indent box-img box-img1"><img src="../images/uudiem/ud3.jpg" alt="" /></figure>
            <div class="overflow padd-2">
                <h4 class="chuc_nang">Một hệ chuyên gia tinh tế </h4>
                <p>  gợi ý những quán ăn phù hợp với những yêu cầu của bạn, đồng thời có những món ăn bạn mong muôn </p>
            </div>
            <div class="clear"></div>
        </div>
        <div class="border-horiz"></div>
        <div  class="uu_diem">
            <figure class="img-indent box-img box-img1"><img src="../images/uudiem/ud4.jpg " alt="" /></figure>
            <div class="overflow padd-2">
                <h4 class="chuc_nang">Một hệ chuyên gia kinh nghiệm </h4>
                <p>Một hệ chuyên gia được đào tạo một cách quy mô bởi những  <q>chuyên gia ăn vặt</q> của chúng tôi.</p>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</section>
<!--==============================footer=================================-->
<?php
include('../layout/footer.php');
?>
</body>
</html>