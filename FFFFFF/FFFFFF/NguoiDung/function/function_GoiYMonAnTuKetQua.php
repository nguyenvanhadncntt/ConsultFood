<!--import thư viện kêt nối CSDL-->
<?php
include('../layout/KetNoi.php');
?>
<?php 

function tim_mon($MaThoiTiet,$MaLoaiTA,$GiaTien,$trang,$conn)
{
      //hiển thị lần 2 cái;
  $soLuongMotTrang=4;
  $spbatdau = ($trang-1) * 4;
	/*truy vấn ví dụ để chọn món
    SELECT monan.MaMonAn,TenMonAn,MoTa from monan
    JOIN monan_thoitiet ON monan_thoitiet.MaMonAn=monan.MaMonAn
    WHERE MaThoiTiet='MTT1' and MaLoaiTA='ML1' and GiaTien<=15000  ;s*/
    $DK_tien="";
    if($GiaTien=="MLT1 ") {
        $DK_tien="and GiaTien <= 15000";
    }
    //làm động câu truy vấn
    $truy_van_tim_mon="SELECT monan.MaMonAn,TenMonAn,MoTa,HinhAnhDaiDien from monan
    JOIN monan_thoitiet ON monan_thoitiet.MaMonAn=monan.MaMonAn
    WHERE MaThoiTiet='".$MaThoiTiet."' and MaLoaiTA='".$MaLoaiTA."' ".$DK_tien."  LIMIT " . $spbatdau . "," . $soLuongMotTrang;
    $result_mon_goi_y = mysqli_query($conn, $truy_van_tim_mon);
    return $result_mon_goi_y;
}
function tong_so_trang($MaThoiTiet,$MaLoaiTA,$GiaTien,$conn)
{
   $soLuongMotTrang=4;
   $DK_tien="";
   if($GiaTien=="MLT1 ") {
    $DK_tien="and GiaTien <= 15000";
}
$truy_van_lay_so_bang_ghi="SELECT monan.MaMonAn from monan
JOIN monan_thoitiet ON monan_thoitiet.MaMonAn=monan.MaMonAn
WHERE MaThoiTiet='".$MaThoiTiet."' and MaLoaiTA='".$MaLoaiTA."' ".$DK_tien;

$result =mysqli_query($conn,$truy_van_lay_so_bang_ghi);
$tong_so_luong = mysqli_num_rows($result);
$tongsotrang = $tong_so_luong / $soLuongMotTrang;
    // nếu còn thừa trang nghĩa là có 1 trang <4 sản phẩm
if($tongsotrang>(int)$tongsotrang)
{
    $tongsotrang=(int)$tongsotrang+1;
}
return $tongsotrang;
}
?>
<?php 
function tao_thanh_progress($MaThoiTiet,$MaLoaiTA,$GiaTien,$trang,$conn)
{
    $tongsotrang=tong_so_trang($MaThoiTiet,$MaLoaiTA,$GiaTien,$conn);
    $trang=(double)$trang;
    $tongsotrang=(double)$tongsotrang;
    $phan_tram_qua_trinh=(int) (($trang/$tongsotrang)*100);
    $color="";
    if($phan_tram_qua_trinh<=25) {
        $color="color4";
    }
    else if($phan_tram_qua_trinh<=50)
    {
        $color="color3";
    }
    else if($phan_tram_qua_trinh<=75)
    {
        $color="color2";
    }
    else $color="color1";
    ?>

    <div class="progressbar" data-perc="<?php echo $phan_tram_qua_trinh; ?>">
        <div class="bar <?php echo $color; ?>"><span></span></div>
        <div class="label"><span></span></div>
    </div>
    <?php 
}
?>