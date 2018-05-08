<!DOCTYPE html>
<html lang="en">
<head>
    <title>Món Ăn</title>
    <meta charset="utf-8">
    <!--Khai báo các thư viện-->
    <?php
    include('../layout/KetNoi.php');
    // gọi các function
    include('../function/function_phantrang.php');
    include('../layout/link-script.php');
    ?>
    <link rel="stylesheet" href="../css/goiymon_an.css"/>
    <?php
    // trang mặc định
    $trang=1;
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if(isset($_GET["trang"]))
        $trang=0+$_GET["trang"];
    }
    //gọi function phan_trang($tenCot, $tenBang, $dieuKien, $soLuongMotTrang, $trang,$conn)

    //gọi  function tao_trang($tenBang,$dieuKien,$soLuongMotTrang,$trang,$dieuKienTrang,$conn);

    $result_mon_an=phan_trang("MaMonAn,TenMonAn,MoTa,HinhAnhDaiDien","monan","WHERE MonMoi=1",2,$trang,$conn);
    ?>

</head>
<body>
<!--==============================header=================================-->
<?php
include('../layout/header.php');
?>
<!--==============================content=================================-->
<section id="content">
    <div class="ic"></div>
    <div class="border-horiz"></div>
    <div class="container_12">
        <h3 style="text-align: center">Những Món Ăn Mới</h3>
        <article class="side-bar extra">
            <h3>
                <strong>3</strong> tiêu Chí
                <em>
                    Chọn<br>
                    Một Món Ăn Vặt
                </em>
            </h3>
            <ul class="list-dropcap1">
                <li>
                    <div class="wrapper">
                        <div class="dropcap">1</div>
                        <h4>Món Ăn Vặt<br>
                            Ngon
                        </h4>
                    </div>
                    <p>Trước tiên món ăn ngon phải phù hợp khẩu vị, tâm trạng và sức khỏe của thực khách. Về nguyên liệu, món ăn phải được chế biến từ những thực phẩm tươi ngon, hợp vệ sinh và tạo sự ngon miệng không chỉ bằng vị giác mà còn ở thị giác. Đồng thời, gia vị trong món ăn phải được phối hợp đúng cách, đúng liều lượng và đặc biệt cần gia nhiệt chính xác để làm dậy hương vị đặc trưng của nguyên liệu. </p>
                </li>
                <li>
                    <div class="wrapper">
                        <div class="dropcap">2</div>
                        <h4>Món ăn Vặt
                            Rẻ
                        </h4>
                    </div>
                    <p>Món ăn ngon nhưng không phù hợp với ví tiền của bạn? Đừng lo tiêu chí thứ 2 của chúng tôi chính là Rẻ, Vừa ngon vừa rẻ phù hợp với ví tiền của bạn thì còn gì bằng nữa, Hãy tham quan trang web của chúng tôi ngay nào. </p>
                </li>
                <li>
                    <div class="wrapper">
                        <div class="dropcap">3</div>
                        <h4>Món ăn Vặt<br>
                            Sạch
                        </h4>
                    </div>
                    <p>Và tất nhiên vấn đề thiết yếu chính là vệ sinh an toàn thực phẩm. Các bạn đừng lo lắng, đội ngũ kĩ thuật viên của chúng tôi luôn mong muốn mang đến cho các bạn sự hài lòng nhất, và nhất nhiên những món ăn chúng tôi tư vấn cho các bạn đã được kiểm định kĩ càng về khâu an toàn vệ sinh. Vậy thì còn chằn chừ gì nữa mà không nhanh tay liên hệ với chúng tôi ngay nào.</p>
                </li>
            </ul>
        </article>
        <article class="grid_8">

            <ul class="list-recipes extra">
             <?php if (mysqli_num_rows($result_mon_an) > 0) {
                 // output data of each row

                 while ($row = mysqli_fetch_assoc($result_mon_an)) {
                     ?>
                     <li class="goi_y_1_quan_an">
                         <div>
                             <div class="box-img-qa" style="margin-bottom: 15px;">
                                 <img src=<?php echo '"'.$row["HinhAnhDaiDien"].'"' ?> alt=<?php echo $row["TenMonAn"] ?> >
                             </div>
                             <div id="mota">
                                 <h4 style="text-align: center"><?php echo $row["TenMonAn"] ?></h4>

                                 <p> <?php echo $row["MoTa"] ?>
                                     <br> <a href= <?php echo "ChiTietMonAn.php?MaMonAn=".$row["MaMonAn"] ?>
                                             class="button btn-qa"><span>Xem Chi Tiết </span></a>
                                 </p>
                             </div>
                         </div>
                     </li>

                 <?php
                 }
             }
             else {
                 echo '<h1>Chúng tôi xin lỗi về sự cố,Dữ liệu đang được cập nhập</h1>';
             }
             ?>
            </ul>
            <?php
            // tạo list các trang để lật
            //funtion tao_trang($tenBang,$dieuKien,$soLuongMotTrang,$trang,$dieuKienTrang,$conn);
            tao_trang("monan","WHERE MonMoi=1",2,$trang,"",$conn);
            ?>
        </article>
        <div class="clear"></div>
    </div>
</section>
<!--==============================footer=================================-->
<?php
include('../layout/footer.php');
?>
<?php
include('../layout/ngatketnoi.php');
?>
</body>
</html>