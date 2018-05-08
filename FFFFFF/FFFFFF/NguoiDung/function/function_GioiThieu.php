<!--import thư viện kêt nối CSDL-->
<?php
include('../layout/KetNoi.php');
?>
<?php 

function lay_danh_sach_thanh_vien($conn)
{
  //truy vấn lấy thông tin các thành viên
	$truy_van_lay_danh_sach_thanh_vien="SELECT MaThanhVien,HoTen,BietDanh,SoThich,ChamNgon,img from thanhvien" ;
	$result_thanh_vien = mysqli_query($conn, $truy_van_lay_danh_sach_thanh_vien);
	return $result_thanh_vien;
}
?>