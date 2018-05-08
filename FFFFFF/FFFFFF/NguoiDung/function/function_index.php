<!--import thư viện kêt nối CSDL-->
<?php
include('../layout/KetNoi.php');
?>
<?php 

function thong_tin_top_3_mon_an($conn)
{
    //lấy ra 6 món ăn có lượt chọn lớn nhất
	$truy_van_top_3_mon_an="SELECT month(luachonmon.Ngay) as thang
	,year(luachonmon.Ngay) as nam,monan.MaMonAn,monan.TenMonAn,monan.HinhAnhDaiDien
	,COUNT(*) as luottruycap FROM luachonmon JOIN monan ON monan.MaMonAn=luachonmon.ChonMon
	WHERE month(luachonmon.Ngay)=month(now()) and year(luachonmon.Ngay)=year(now())
	GROUP by month(luachonmon.Ngay),year(luachonmon.Ngay),luachonmon.ChonMon,monan.TenMonAn,monan.HinhAnhDaiDien
	ORDER by COUNT(*) desc LIMIT 6";
	$result_mon_an = mysqli_query($conn, $truy_van_top_3_mon_an);
	return $result_mon_an;
}

function thong_tin_top_3_quan_an($conn){
	$truy_van_top_3_quan_an="SELECT month(luachonquan.Ngay),year(luachonquan.Ngay),quanan.MaQuanAn,quanan.TenQuanAn,quanan.HinhAnhDaiDien,COUNT(*)
	as luottruycap FROM luachonquan JOIN quanan on quanan.MaQuanAn=luachonquan.ChonQuan
	WHERE month(luachonquan.Ngay)=month(now()) and year(luachonquan.Ngay)=year(now())
	GROUP by month(luachonquan.Ngay),year(luachonquan.Ngay),luachonquan.chonquan ORDER by COUNT(*) desc LIMIT 2";
	$result_quan_an = mysqli_query($conn, $truy_van_top_3_quan_an);
	return $result_quan_an;
}
?>