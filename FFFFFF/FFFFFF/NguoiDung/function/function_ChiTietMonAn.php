<!--import thư viện kêt nối CSDL-->
<?php
include('../layout/KetNoi.php');
?>
<?php

/** hàm này tác dụng thêm một bình luận món ăn
 * @param $ma_mon_an
 * @param $ten
 * @param $SDT
 * @param $email
 * @param $NoiDung
 * @param $duyet
 */
function them_binh_luan_mon($ma_mon_an,$ten,$SDT,$email,$NoiDung,$duyet,$conn)
{
//    sử dụng prepare để đặt chỗ cho biến
$stmt = $conn->prepare("INSERT INTO blmonan(MaMonAn, Ten, SDT, Email, NoiDung, Duyet) VALUES  (?,?,?,?,?,?)");
$stmt->bind_param("sssssi", $ma_mon_an, $ten, $SDT,$email,$NoiDung,$duyet);
$stmt->execute();
$stmt->close();
}

/** hàm này để hiển thị input có class .success để thông báo người dùng đã thêm thành công bình luận
 *
 */
function thong_bao_da_them()
{
    echo "<style> #contact-form .success { display: block !important; }</style>";
}


/** hàm này trả về result 1 bảng ghi thông tin tương ứng các cột của món ăn
 * @param $ma_mon_an
 * @param $conn
 * @return mysqli_result
 */
function thong_tin_mon_an($ma_mon_an,$conn)
{
    //truy vấn lấy thông tin món ăn vừa được chọn
    $truy_van_mon="SELECT monan.MaMonAn,monan.TenMonAn,monan.HinhAnhDaiDien,monan.GiaTien,monan.Diem from monan WHERE monan.MaMonAn='".$ma_mon_an."'"  ;
    $result_thong_tin_mon=mysqli_query($conn,$truy_van_mon);
    return $result_thong_tin_mon;
}

/** hàm này trả về result 1 danh sách các bảng ghi thông tin các  tương ứng các cột của món ăn
 * @param $ma_mon_an
 * @param $conn
 * @return mysqli_result
 */
function thong_tin_hinh_anh($ma_mon_an,$conn)
{
    // truy vấn lấy hình ảnh món ăn vừa được chọn
    $truy_van_hinhanh="SELECT hinhanhmonan.Link from monan_hinhanh join hinhanhmonan on monan_hinhanh.MaHinhAnh=hinhanhmonan.MaHinhAnh WHERE MaMonAn='".$ma_mon_an."'";
    $result_thong_tin_hinh_anh=mysqli_query($conn,$truy_van_hinhanh);
    return $result_thong_tin_hinh_anh;
}

/**hàm này trả về result 1 danh sách các bảng ghi bình luận các  tương ứng các cột của món ăn
 * @param $ma_mon_an
 * @param $conn
 * @return bool|mysqli_result
 */
function thong_tin_binh_luan($ma_mon_an,$conn)
{
    // truy vấn lấy bình luận
    $truy_van_binhluan="SELECT blmonan.ThoiGian,blmonan.Ten,blmonan.NoiDung from blmonan WHERE Duyet=1 and MaMonAn='".$ma_mon_an."' order by ThoiGian DESC limit 5  ";
    $result_thong_tin_binh_luan=mysqli_query($conn,$truy_van_binhluan);
    return $result_thong_tin_binh_luan;
}

/**  hàm này trả về result 1 bảng ghi thông tin lượt truy cập tương ứng các cột của món ăn
 * @param $ma_mon_an
 * @param $conn
 * @return bool|mysqli_result
 */
function thong_tin_luot_truy_cap($ma_mon_an,$conn)
{
    //truy vấn lấy lượng truy cập trong tháng của năm
    $truy_van_luot_truy_cap="SELECT month(luachonmon.Ngay) as nam ,year(luachonmon.Ngay) as thang,luachonmon.ChonMon
                            ,COUNT(*) as luottruycap FROM luachonmon WHERE month(luachonmon.Ngay)=month(now()) and year(luachonmon.Ngay)=year(now())
                            AND luachonmon.ChonMon='".$ma_mon_an."'" ;
    $result_thong_tin_luot_truy_cap=mysqli_query($conn,$truy_van_luot_truy_cap);
    return $result_thong_tin_luot_truy_cap;
}
function them_mot_luachonmon($ma_mon_an,$conn)
{
    $stmt = $conn->prepare("INSERT INTO luachonmon(ChonMon) VALUES (?) ");
    $stmt->bind_param("s", $ma_mon_an);
    $stmt->execute();
    $stmt->close();
}

?>