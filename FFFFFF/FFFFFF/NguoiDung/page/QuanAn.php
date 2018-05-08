<!DOCTYPE html>
<html lang="en">
<head>
    <title>Quán Ăn</title>
    <meta charset="utf-8">

    <!--Khai báo các thư viện-->
    <?php
    include('../layout/KetNoi.php');
    include('../layout/link-script.php');

    // khai báo các function
    include('../function/function_phantrang.php');
    ?>
    <link rel="stylesheet" href="../css/goiymon_an.css"/>
    <?php
    $trang=1;
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if(isset($_GET["trang"]))
        $trang=0+$_GET["trang"];
    }
    //liệt kê danh sách các món ăn mới

    //gọi function phan_trang($tenCot, $tenBang, $dieuKien, $soLuongMotTrang, $trang,$conn)

    //gọi  function tao_trang($tenBang,$dieuKien,$soLuongMotTrang,$trang,$dieuKienTrang,$conn);

    $result_quan_an=phan_trang("MaQuanAn,TenQuanAn,MoTa,HinhAnhDaiDien","quanan","WHERE QuanMoi=1",2,$trang,$conn);
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
                    Một Quán Ăn Vặt
                </em>
            </h3>
            <ul class="list-dropcap1">
                <li>
                    <div class="wrapper">
                        <div class="dropcap">1</div>
                        <h4>Quán Ăn Vặt<br>Ngon
                        </h4>
                    </div>
                    <p>Quán ăn vặt ngon chính là quán ăn đáp ứng được đầy đủ cả 3 tiêu chí món ăn của chúng tôi đó chính là:"Ngon, Rẻ, Sạch"..</p>
                </li>
                <li>
                    <div class="wrapper">
                        <div class="dropcap">2</div>
                        <h4>Quán ăn Vặt</br>Phù Hợp
                        </h4>
                    </div>
                    <p>Thời tiết hôm nay rất đẹp? Hay ánh nắng chói chan mọi nơi? Hoặc bạn đang đứng trú mưa ở nơi nào đó? Còn gì tuyệt hơn là được ăn những món ăn ngon vào đúng thời điểm nhỉ. Mau mau click để tìm những món ăn mình thích nào.</p>
                </li>
                <li>
                    <div class="wrapper">
                        <div class="dropcap">3</div>
                        <h4>Món ăn Vặt<br>
                            Không Gian Đẹp
                        </h4>
                    </div>
                    <p>Bạn là vị khách khó tính? Thích ăn ở những nơi sạch sẽ hay thậm chí là những khuôn viên tráng lệ lãng mạn. Chúng tôi luôn đáp ứng được yêu cầu của bạn. Hãy ủng hộ chúng tôi, chúng tôi luôn cố gắng không ngừng để mang đến những món ăn ngon, giá tốt, chất lượng cùng những quán ăn phù hợp nhất cho bạn. </p>
                </li>
            </ul>
        </article>
        <article class="grid_8">
            <ul class="list-recipes extra">
                <?php
                //kiểm tra số lượng dòng trả về có lớn hơn không
                if (mysqli_num_rows($result_quan_an) > 0) {
                    //trường hợp lớn hơn hoặc bằng 1 dòng
                    while ($row = mysqli_fetch_assoc($result_quan_an)) {
                        ?>
                        <li class="goi_y_1_quan_an">
                            <div>
                                <div class="box-img-qa" style="margin-bottom: 15px;">
                                    <img src=<?php echo $row["HinhAnhDaiDien"]; ?>  >
                                </div>
                                <div id="mota">
                                    <h4 style="text-align: center"><?php echo $row["TenQuanAn"]; ?></h4>
                                    <p><?php echo $row["MoTa"] ?>
                                        <br> <a href=<?php echo "ChiTietQuanAn.php?MaQuanAn=".$row["MaQuanAn"];  ?> class="button btn-qa"><span>Xem Chi Tiết </span></a>
                                    </p>
                                </div>
                            </div>
                        </li>
                    <?php
                    }
                }
                else{

                    //trường hợp không có dữ liệu trả về
                    echo "Dữ liệu đang được cập nhập <a href='index.php'> vui lòng trở về</a>";
                }

                ?>
            </ul>
            <?php
            // tạo list các trang để lật
            //funtion tao_trang($tenBang,$dieuKien,$soLuongMotTrang,$trang,$dieuKienTrang,$conn);
            tao_trang("quanan","WHERE QuanMoi=1",2,$trang,"",$conn);
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