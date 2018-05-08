<!DOCTYPE html>
<html lang="en">
<head>
    <title>Giới Thiệu Về Nhóm Chúng Tôi</title>
    <meta charset="utf-8">
    <!--Khai báo các thư viện-->
    <?php
    include('../layout/link-script.php');
    //kết nối CSDL
    include('../layout/KetNoi.php');
    include('../function/function_GioiThieu.php');
    ?>
    <?php
    // gọi function lay_danh_sach_thanh_vien() 
    $result_thanh_vien = lay_danh_sach_thanh_vien($conn);
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
            <article class="side-bar extra1">
                <div id="gt_he_chuyen_gia">
                    <h3><span>Về</span>Chuyên Gia </h3>
                    <figure style="background: pink!important;" class="box-img img-indent1"><img style="width: 240px;border: solid;" src="../images/uudiem/ud1.jpg " alt="" /></figure>
                    <div class="inner-1"> <a href="#" class="link-1">Hệ Chuyên Gia Tư Vấn Ăn Vặt </a>
                        <span>Hệ Chuyên Gia Tư Vấn của chúng tôi hy vọng có thế giúp được các bạn tìm ra những quán ăn có những món ăn phù hợp với mình nhất</span>
                        <span>Giúp tiết kiệm thời gian mà vẫn tìm được quán ăn như mong muốn.</span>
                    </div>
                </div>
                <div id="gt_y_tuong">
                    <h3><span>Về</span>Ý Tưởng </h3>
                    <figure style="background: pink!important;" class="box-img img-indent1"><img style="width: 240px;border: solid;" src="../images/uudiem/ud2.jpg " alt="" /></figure>
                    <div class="inner-1"> <a href="#" class="link-1">Hệ Chuyên Gia Tư Vấn Ăn Vặt </a>
                        <span>Lấy ý tưởng từ một buổi đi chơi với bạn nhưng lại lạc đường vì tìm không ra quán ăn, hoặc thông tin không chính xác từ các trang báo trên mạng</span>
                    </div>
                </div>
                <div id="gt_thanh_vien">
                    <h3><span>Về</span>Thành Viên </h3>
                    <figure style="background: pink!important;" class="box-img img-indent1"><img style="width: 240px;border: solid;" src="../images/uudiem/ud3.jpg " alt="" /></figure>
                    <div class="inner-1"> <a href="#" class="link-1">Hệ Chuyên Gia Tư Vấn Ăn Vặt </a>
                        <span>Được đạo tạo rất khoa học , logic bởi những chuyên gia ăn vặt</span>
                    </div>
                </div>
                <div id="gt_huong_dan">
                    <h3><span>Về</span>Giáo Viên Hướng dẫn </h3>
                    <figure style="background: pink!important;" class="box-img img-indent1"><img style="width: 240px;border: solid;" src="../images/uudiem/ud4.jpg " alt="" /></figure>
                    <div class="inner-1"> <a href="#" class="link-1">Hệ Chuyên Gia Tư Vấn Ăn Vặt </a>
                        <span>Xây dựng dựa vào góp ý và hộ trợ của cô <strong>Trần Uyên Trang</strong> , và thầy <strong>Đoàn Duy Bình</strong></span>
                    </div>
                </div>
            </article>
            <article class="grid_8">
                <h3>Những chú ong chúng tôi</h3>
                <ul class="list-recipes extra">

                    <?php

                //kiểm tra số lượng dòng trả về có lớn hơn không
                    if (mysqli_num_rows($result_thanh_vien) > 0) {
                //trường hợp lớn hơn hoặc bằng 1 dòng
                        while ($row = mysqli_fetch_assoc($result_thanh_vien)) {
                            ?>

                            <li class="mot_thanh_vien">
                                <figure style="background: pink!important;" class="box-img"><img src=<?php echo $row["img"];  ?> ></figure>
                                <div class="overflow">
                                    <h4 style="color:#ff4bd1"><?php echo '#'.$row["MaThanhVien"]; ?> <?php echo $row["HoTen"]; ?></h4>
                                    <span>Xin chào các bạn , biêt danh tôi là <strong><?php echo $row["BietDanh"];?></strong>.</span><br>
                                    <span style="color: #ff5cd7">Sở thích : <?php echo $row["SoThich"];?></span><br>
                                    <span style="color: #008000"><?php echo 'Châm ngôn yêu thích: " '.$row["ChamNgon"].' " ';?></span>
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