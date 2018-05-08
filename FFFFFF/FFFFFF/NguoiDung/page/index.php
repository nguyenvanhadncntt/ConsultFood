<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <title>Trang Chủ</title>
    <meta charset="utf-8">
    <!--Khai báo các thư viện-->
    <link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
    <?php
    include('../layout/link-script.php');
    include('../layout/KetNoi.php');
    include('../function/function_index.php');
    ?>
    <?php
    session_start();
    session_destroy();
    // tạo sesion lưu danh sách món người dùng truy cấp
   
    // tạo sesion lưu danh sách quan người dùng truy cấp
    if(!isset($_SESSION['dsQuanTruyCap']))
    {
        $_SESSION['dsQuanTruyCap']=array();
    }
    //gọi function thong_tin_top_3_mon_an($conn)
    $result_mon_an = thong_tin_top_3_mon_an($conn);

    //gọi function thong_tin_top_3_quan_an($conn)
    $result_quan_an = thong_tin_top_3_quan_an($conn);
    ?>

    <script>
        jQuery(window).load(function() {
            jQuery('.flexslider').flexslider({
                animation: "fade",
                slideshow: true,
                slideshowSpeed: 7000,
                animationDuration: 600,
                prevText: "",
                nextText: "",
                controlNav: false
            })
        });
    </script>
    </head>
<body>
<!--==============================header=================================-->
<header>
    <div class="line-top"></div>
    <div class="main">
        <div class="row-top">
            <h1><a href="index.php"><img id="logo" alt="hinh anh logo" src="../images/FFFFFF.png"></a></h1>
            <nav>
                <ul class="sf-menu">
                    <li class="active"><a href="index.php">Trang Chủ</a></li>
                    <li><a href="QuanAn.php">Quán Ăn</a> </li>
                    <li><a href="MonAn.php">Món Ăn</a></li>
                    <li><a href="TuVanNhanh.php">Tư Vấn Nhanh</a> </li>
                    <li><a href="GioiThieu.php">Giới Thiệu</a></li>
                    <li><a href="LienHe.php">Liên Hệ</a></li>
                </ul>
            </nav>
            <div class="clear"></div>
        </div>
    </div>
    <div class="box-slider">
        <div class="flexslider">
            <ul class="slides">
                <li> <img alt="" src="../images/slide/slide-1.jpg"></li>
                <li> <img alt="" src="../images//slide/slide-2.jpg"></li>
            </ul>
        </div>
    </div>
    <div class="box-slogan">
        <h3>Chào mừng đến trang web của các chuyên gia ăn vặt !</h3>
    </div>
</header>
<!--==============================content=================================-->
<section id="content">
    <div class="ic"></div>
    <div class="border-horiz"></div>
    <div class="container_12 row-1">
        <article class="grid_4 thumbnail-1">
            <h3><span>Trắc Nghiệm</span> <br> </h3>
            <figure class="box-img-gt"><img src="../images/index/tracnghiem.jpg " alt="" /></figure>
            <p style="font-size: 12px">Trắc nghiệm tư vấn món ăn phù hợp với bạn.</p>
            <a href="TuVanNhanh.php" class="btn btn-gt">Đọc Thêm</a>
        </article>
        <article class="grid_4 thumbnail-1">
            <h3><span>Lựa chọn </span> <br>  </h3>
            <figure class="box-img-gt"><img src="../images/index/luachon.jpg" alt="" /></figure>
            <p style="font-size: 12px">Dựa vào món ăn bạn ăn, chọn ra quán phù hợp và chất lượng nhất.</p>
            <a href="TuVanNhanh.php" class="btn btn-gt">Đọc Thêm</a>
        </article>
        <article class="grid_4 thumbnail-1">
            <h3><span>Hướng dẫn</span> <br> </h3>
            <figure class="box-img-gt"><img src="../images/index/chiduong.jpg" alt="" /></figure>
            <p style="font-size: 12px">Hướng dẫn đường đi bằng bản đồ Google Map.</p>
            <a href="TuVanNhanh.php" class="btn btn-gt">Đọc Thêm</a>
        </article>
        <div class="clear"></div>
    </div>
    <div class="border-horiz"></div>
    <div class="container_12">
        <article class="grid_4">
            <h3>Quán Nổi Bật</h3>
           <div class="list-popular" >
               <blockquote class="quote-1" style="padding-bottom: 30px;">Quán được truy cập nhiều...</blockquote>
            <ul>
                <?php
//                 kiểm tra món ăn trả về
                if(mysqli_num_rows($result_quan_an) == 0 )
                {
                    echo 'Xin lỗi bạn, dữ liệu của quán đang dược cập nhập';
                }
                else
                {
                while($quan_an=mysqli_fetch_assoc($result_quan_an)) {

                ?>
                <li class="quan_an_pho_bien">
                    <a href=<?php echo "ChiTietQuanAn.php?MaQuanAn=".$quan_an["MaQuanAn"] ?>> <?php echo $quan_an["TenQuanAn"]; ?> </a><br>
                    <figure class="box-img"><img src=<?php echo $quan_an["HinhAnhDaiDien"]; ?> alt="hình ảnh món ăn" /></figure><br>
                   <strong>Lượt truy cập: <?php echo $quan_an["luottruycap"]; ?>   <span style="color: #ff0000;padding: 3px;
" class="glyphicon glyphicon-heart-empty"></span> </strong>
                </li>

                <?php
                }
                }
//                ?>
            </ul>
           </div>
        </article>
        <article class="grid_8">
            <h3>Những Món ăn vặt nổi bật</h3>
            <blockquote class="quote-1">danh sách những món ăn được chọn nhiều, và được đánh giá cao qua thống kê của chúng tôi </blockquote>
            <div class="name-author"></div>
            <ul class="list-dropcap">
                <?php
//                 kiểm tra món ăn trả về
                if(mysqli_num_rows($result_mon_an) == 0 )
                {
                    echo 'Xin lỗi bạn, dữ liệu món ăn đang dược cập nhập';
                }
                else
                {

                while($mon_an=mysqli_fetch_assoc($result_mon_an)) {

                ?>
                <li>
                    <div class="wrapper">
                        <div class="dropcap"> <?php $chu_dau_tien=substr($mon_an["TenMonAn"],0,1); echo $chu_dau_tien;   ?> </div>
                        <a href=<?php echo "ChiTietMonAn.php?MaMonAn=".$mon_an["MaMonAn"] ?> ><?php echo $mon_an["TenMonAn"]; ?></a>
                    </div>
                    <figure class="box-img"><img src=<?php echo $mon_an["HinhAnhDaiDien"]; ?> alt="hình ảnh món ăn" /></figure>
                </li>


                <?php
                }
                }
                ?>
            </ul>
        </article>
        <div class="clear"></div>
    </div>
</section>
<!--==============================footer=================================-->
<footer>
    <div class="main">
        <ul class="soc-list">
            <li><a href="#"><img alt="" src="../images/icon-1.png"></a></li>
            <li><a href="#"><img alt="" src="../images/icon-2.png"></a></li>
            <li><a href="#"><img alt="" src="../images/icon-3.png"></a></li>
            <li><a href="#"><img alt="" src="../images/icon-4.png"></a></li>
        </ul>
        <div class="policy">Sinh Viên Trường Đại Học Sư Phạm tại <a href="http://ued.udn.vn" target="_blank">   www.http://ued.udn.vn/.com</a>.<br>
            Giáo Viên Hướng dẫn: <b>Đoàn Duy Bình</b> - <b>	Trần Uyên Trang</b>
        </div>
        <div class="clear"></div>
    </div>
</footer>
</body>
</html>