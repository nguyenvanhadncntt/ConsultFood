<!-- Lấy Link page hiện hành-->
<?php
$current_page = $_SERVER["PHP_SELF"];
?>
<header>
    <div class="line-top"></div>
    <div class="main">
        <div class="row-top">
            <h1><a href="index.php"><img id="logo" alt="hinh anh logo" src="../images/FFFFFF.png"></a></h1>
            <nav>
                <ul class="sf-menu">
                <!-- Thêm class =active cho trang hiện hành-->
                    <li  <?php if ($current_page=="/FFFFFF/NguoiDung/page/index.php") echo 'class="active"' ?> ><a href="index.php">Trang Chủ</a></li>
                    <li <?php if ($current_page=="/FFFFFF/NguoiDung/page/QuanAn.php") echo 'class="active"' ?> ><a href="QuanAn.php">Quán Ăn</a> </li>
                    <li <?php if ($current_page=="/FFFFFF/NguoiDung/page/MonAn.php") echo 'class="active"' ?> ><a href="MonAn.php">Món Ăn</a></li>
                    <li <?php if ($current_page=="/FFFFFF/NguoiDung/page/TuVanNhanh.php") echo 'class="active"' ?> ><a href="TuVanNhanh.php">Tư Vấn Nhanh</a> </li>
                    <li <?php if ($current_page=="/FFFFFF/NguoiDung/page/GioiThieu.php") echo 'class="active"' ?> ><a href="GioiThieu.php">Giới Thiệu</a></li>
                    <li <?php if ($current_page=="/FFFFFF/NguoiDung/page/LienHe.php") echo 'class="active"' ?> ><a href="LienHe.php">Liên Hệ</a></li>
                </ul>
            </nav>
            <div class="clear"></div>
        </div>
    </div>
</header>

