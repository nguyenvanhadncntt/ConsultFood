<!--import thư viện kêt nối CSDL-->
<?php
include('../layout/KetNoi.php');
?>
<?php

/** hàm này tác dụng thêm một bình luận món ăn
 * @param $ma_quan_an
 * @param $ten
 * @param $SDT
 * @param $email
 * @param $NoiDung
 * @param $duyet
 */
function them_binh_luan_quan($ma_quan_an,$ten,$SDT,$email,$NoiDung,$duyet,$conn)
{
//    sử dụng prepare để đặt chỗ cho biến
    $stmt = $conn->prepare("INSERT INTO blquanan(MaQuanAn, Ten, SDT, Email, NoiDung, Duyet) VALUES  (?,?,?,?,?,?)");
    $stmt->bind_param("sssssi", $ma_quan_an, $ten, $SDT,$email,$NoiDung,$duyet);
//   (sử dụng query sai nếu người dùng nhập ' hoặc  ; )
//   $query_them_mot_binh_luan="INSERT INTO blquanan(MaQuanAn, Ten, SDT, Email, NoiDung, Duyet) VALUES ('".$ma_quan_an."', '".$ten."', '".$SDT."', '".$email."', '".$binh_luan."', '0');";

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
 * @param $ma_quan_an
 * @param $conn
 * @return mysqli_result
 */
function thong_tin_quan_an($ma_quan_an,$conn)
{
    //truy vấn lấy thông tin món ăn vừa được chọn
    $truy_van_quan="SELECT MaQuanAn,TenQuanAn,HinhAnhDaiDien,HinhThuc,DiaDiem,DoiTuong,ThoiGianMoCua,Diem,SrcMap,GiaTien from quanan WHERE MaQuanAn='".$ma_quan_an."'"  ;
    $result_thong_tin_quan=mysqli_query($conn,$truy_van_quan);
    return $result_thong_tin_quan;
}

/** hàm này trả về result 1 danh sách các bảng ghi thông tin các  tương ứng các cột của món ăn
 * @param $ma_quan_an
 * @param $conn
 * @return mysqli_result
 */
function thong_tin_hinh_anh($ma_quan_an,$conn)
{
    // truy vấn lấy hình ảnh món ăn vừa được chọn
    $truy_van_hinhanh="SELECT link FROM quanan_hinhanh JOIN hinhanhquanan on quanan_hinhanh.MaHinhAnh=hinhanhquanan.MaHinhAnh WHERE quanan_hinhanh.MaQuanAn='".$ma_quan_an."'";
    $result_thong_tin_hinh_anh=mysqli_query($conn,$truy_van_hinhanh);
    return $result_thong_tin_hinh_anh;
}

/**hàm này trả về result 1 danh sách các bảng ghi bình luận các  tương ứng các cột của món ăn
 * @param $ma_quan_an
 * @param $conn
 * @return bool|mysqli_result
 */
function thong_tin_binh_luan($ma_quan_an,$conn)
{
    // truy vấn lấy bình luận
    $truy_van_binhluan="SELECT blquanan.ThoiGian,blquanan.Ten,blquanan.NoiDung from blquanan WHERE Duyet=1 and MaQuanAn='".$ma_quan_an."' order by blquanan.ThoiGian desc LIMIT 5";
    $result_thong_tin_binh_luan=mysqli_query($conn,$truy_van_binhluan);
    return $result_thong_tin_binh_luan;
}

/**  hàm này trả về result 1 bảng ghi thông tin lượt truy cập tương ứng các cột của món ăn
 * @param $ma_quan_an
 * @param $conn
 * @return bool|mysqli_result
 */
function thong_tin_luot_truy_cap($ma_quan_an,$conn)
{
    //truy vấn lấy lượng truy cập trong tháng của năm
    $truy_van_luot_truy_cap="SELECT month(luachonquan.Ngay) as nam ,year(luachonquan.Ngay) as thang,luachonquan.Chonquan
    ,COUNT(*) as luottruycap FROM luachonquan WHERE month(luachonquan.Ngay)=month(now()) and year(luachonquan.Ngay)=year(now())
    AND luachonquan.Chonquan='".$ma_quan_an."'" ;
    $result_thong_tin_luot_truy_cap=mysqli_query($conn,$truy_van_luot_truy_cap);
    return $result_thong_tin_luot_truy_cap;
}

function thong_tin_monan_quanan($ma_quan_an,$conn)
{
    // truy vấn lấy thông tin món ăn của quán
    $truy_van_monan="SELECT monan.MaMonAn,monan.TenMonAn,monan.HinhAnhDaiDien from quanan_monan join monan on monan.MaMonAn=quanan_monan.MaMonAn WHERE quanan_monan.MaQuanAn='".$ma_quan_an."'";

    $result_thong_tin_monan=mysqli_query($conn,$truy_van_monan);
    return $result_thong_tin_monan;
}

function them_mot_luachonquan($ma_quan_an,$conn)
{
    $stmt = $conn->prepare("INSERT INTO luachonquan(ChonQuan) VALUES (?) ");
    $stmt->bind_param("s", $ma_quan_an);
    $stmt->execute();
    $stmt->close();
}

?>
