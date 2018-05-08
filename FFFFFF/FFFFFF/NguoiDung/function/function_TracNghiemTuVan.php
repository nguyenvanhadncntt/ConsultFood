<!--import thư viện kêt nối CSDL-->
<?php
include('../layout/KetNoi.php');
?>

<?php 

function thong_tin_cau_hoi($cau_hoi,$conn)
{
  //truy vấn lấy thông tin các thành viên
	$truy_van_thong_tin_cau_hoi="select MaCauHoi,ChuDe,MoTa,BangChuaMoTa from cauhoi where MaCauHoi='".$cau_hoi."'";
    $result_thong_tin_cau_hoi=mysqli_query($conn,$truy_van_thong_tin_cau_hoi);
    return $result_thong_tin_cau_hoi;
}
?>