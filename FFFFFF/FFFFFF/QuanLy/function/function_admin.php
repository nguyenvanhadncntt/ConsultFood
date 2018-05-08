<?php
include('../layout/KetNoi.php');
?>
<?php
function blmonan_chua_duyet($conn){
	$query="SELECT ma.MaMonAn,ma.TenMonAn,bl.ten,bl.ThoiGian,bl.SDT,bl.NoiDung from blmonan bl join monan ma on bl.maMonAn=ma.maMonAn WHERE bl.Duyet=0";
	return  mysqli_query($conn,$query);
}
function blquanan_chua_duyet($conn){
	$query="SELECT qa.MaQuanAn,qa.TenQuanAn,bl.ten,bl.ThoiGian,bl.SDT,bl.NoiDung from blquanan bl join quanan qa on bl.maQuanAn=qa.maQuanAn WHERE bl.Duyet=0";
	return  mysqli_query($conn,$query);
}
function lay_thong_tin_mon_an($conn,$dieu_kien){
	$query="SELECT MaMonAn,TenMonAn,MoTa,HinhAnhDaiDien,GiaTien,Diem,MonMoi from monan ".$dieu_kien;
	return  mysqli_query($conn,$query);
}
function lay_anh($conn){
	$query="SELECT * from hinhanhmonan";
	return  mysqli_query($conn,$query);
}
function them_mon_an($ten_mon_an,$mo_ta,$hinh_anh,$gia_tien,$mon_moi,$diem,$conn)
{
	$stmt = $conn->prepare("INSERT INTO monan(TenMonAn, MoTa, HinhAnhDaiDien,GiaTien,MonMoi,Diem) VALUES  (?,?,?,?,?,?)");
	$stmt->bind_param("sssiis", $ten_mon_an,$mo_ta,$hinh_anh,$gia_tien,$mon_moi,$diem);
	$stmt->execute();
	$stmt->close();
}
function them_anh_mon_an($link,$conn){
	$stmt = $conn->prepare("INSERT INTO hinhanhmonan(Link) VALUES (?)");
	$stmt->bind_param("s", $link);
	$stmt->execute();
	$stmt->close();
}
function them_mon_an_thoi_tiet($ma_mon_an,$ma_thoi_tiet,$conn){
	$stmt = $conn->prepare("INSERT INTO monan_thoitiet(MaMonAn,MaThoiTiet) VALUES (?,?)");
	$stmt->bind_param("ss", $ma_mon_an,$ma_thoi_tiet);
	$stmt->execute();
	$stmt->close();
}
function them_mon_an_hinh_anh($ma_mon_an,$link,$conn)
{
	$query="SELECT MaHinhAnh FROM hinhanhmonan where Link='".$link."'";
	$tmp=mysqli_query($conn,$query);
	$ma_hinh_anh=mysqli_fetch_assoc($tmp)["MaHinhAnh"];
	$stmt = $conn->prepare("INSERT INTO monan_hinhanh(MaMonAn,MaHinhAnh) VALUES (?,?)");
	$stmt->bind_param("ss", $ma_mon_an,$ma_hinh_anh);
	$stmt->execute();
	$stmt->close();
}
function them_ma_loai_mon_an($ma_mon_an,$ma_loai,$conn)
{
	$stmt = $conn->prepare("UPDATE monan set MaLoaiTA=? WHERE MaMonAn=?");
	$stmt->bind_param("ss", $ma_loai,$ma_mon_an);
	$stmt->execute();
	$stmt->close();
}
function xoa_mon_an($ma_mon_an,$conn){
	$query="delete from monan_hinhanh where MaMonAn=".$ma_mon_an."";
	mysqli_query($conn,$query);
	$query="Delete from monan_thoitiet where MaMonAn=".$ma_mon_an."";
	mysqli_query($conn,$query);
	$query="Delete from luachonmon where ChonMon=".$ma_mon_an."";
	mysqli_query($conn,$query);
	$query="Delete from blMonAn where MaMonAn=".$ma_mon_an."";
	mysqli_query($conn,$query);
	$query="Delete from monan where MaMonAn=".$ma_mon_an."";

	mysqli_query($conn,$query);
}
function sua_mon_an($ma_mon_an,$ten_mon_an,$mo_ta,$hinh_anh,$gia_tien,$mon_moi,$diem,$conn)
{
	$stmt = $conn->prepare("UPDATE monan set TenMonAn=?,MoTa=?,HinhAnhDaiDien=?,GiaTien=?,MonMoi=?,Diem=? WHERE MaMonAn=? ");
	$stmt->bind_param("sssiisi", $ten_mon_an,$mo_ta,$hinh_anh,$gia_tien,$mon_moi,$diem,$ma_mon_an);
	$stmt->execute();
	$stmt->close();
}
function duyet_binh_luan_mon_an($ma_mon_an,$thoi_gian,$conn)
{
	$query="Update blmonan set Duyet=1 where MaMonAn='".$ma_mon_an."' and ThoiGian='".$thoi_gian."'";
	return  mysqli_query($conn,$query);
}
function huy_binh_luan_mon_an($ma_mon_an,$thoi_gian,$conn)
{
	$query="Delete from blmonan where MaMonAn='".$ma_mon_an."' and ThoiGian='".$thoi_gian."'";
	return  mysqli_query($conn,$query);
}
function duyet_binh_luan_quan_an($ma_quan_an,$thoi_gian,$conn)
{
	$query="Update blquanan set Duyet=1 where MaQuanAn='".$ma_quan_an."' and ThoiGian='".$thoi_gian."'";
	return  mysqli_query($conn,$query);
}
function huy_binh_luan_quan_an($ma_quan_an,$thoi_gian,$conn)
{
	$query="Delete from blquanan where MaQuanAn='".$ma_quan_an."' and ThoiGian='".$thoi_gian."'";
	return  mysqli_query($conn,$query);
}
function thong_ke_mon_an($conn)
{
    $truy_van_mon_an="SELECT month(luachonmon.Ngay) as nam
	,year(luachonmon.Ngay) as thang,monan.MaMonAn,monan.TenMonAn,monan.HinhAnhDaiDien
	,COUNT(*) as luottruycap FROM luachonmon JOIN monan ON monan.MaMonAn=luachonmon.ChonMon
	GROUP by month(luachonmon.Ngay),year(luachonmon.Ngay),luachonmon.ChonMon,monan.TenMonAn,monan.HinhAnhDaiDien
	ORDER by  year(luachonmon.Ngay)desc ";
    $result_mon_an = mysqli_query($conn, $truy_van_mon_an);
    return $result_mon_an;
}
function thong_ke_quan_an($conn){
    $truy_van_quan_an="SELECT month(luachonquan.Ngay) as thang,year(luachonquan.Ngay) as nam,quanan.MaQuanAn,quanan.TenQuanAn,quanan.HinhAnhDaiDien,COUNT(*)
	as luottruycap FROM luachonquan JOIN quanan on quanan.MaQuanAn=luachonquan.ChonQuan
	GROUP by month(luachonquan.Ngay),year(luachonquan.Ngay),luachonquan.chonquan ORDER by year(luachonquan.Ngay) desc ";
    $result_quan_an = mysqli_query($conn, $truy_van_quan_an);
    return $result_quan_an;
}
?>