<!DOCTYPE HTML>
<html>
<head>
    <title>web lam tra nghiem</title>
    <?php
    include('../layout/link-script-TNTV.php');
    include('../layout/KetNoi.php');
    include('../function/function_TracNghiemTuVan.php');
    ?>
    <?php
    // bắt session , để session có hiệu lực với trang này

    session_start();
    // kiếm tra đã khởi tạo session chưa , không lùi về trang trắc nghiệm tư vấn

    if(!isset($_SESSION['DK']) || !isset($_SESSION['cot_cau_hoi']) || !isset($_SESSION['cauhoi'])){
        header('location:TuVanNhanh.php');
    }

    // lấy session điều kiện
    $DK=$_SESSION['DK'];
    if ( $_SERVER["REQUEST_METHOD"] == "GET") {

        if(isset($_GET["luachon"]))
        {
           array_push($DK,$_GET["luachon"]);
           $_SESSION['DK']=$DK;
            // tăng giá trị câu hỏi lên 1
           $_SESSION['cauhoi']++;
        }
    }
    else {
        header('Location:index.php');
    }
    $truy_van_SL_cau_hoi="select * from cauhoi";
    $result_so_hang= mysqli_query($conn,$truy_van_SL_cau_hoi) ;
    $cau_hoi=$_SESSION['cauhoi'];
    if( $cau_hoi > mysqli_num_rows($result_so_hang))
    {
        // đã hết câu hỏi thì chuyển trang (8 câu hỏi tất cả)
        header('location:GoiYMonAnTuKetQua.php');
    }


    $result_thong_tin_cau_hoi=thong_tin_cau_hoi($cau_hoi,$conn);
    $cot_cau_hoi=$_SESSION['cot_cau_hoi'];

    ?>
</head>
<body>
<?php
include('../layout/header.php');
?>
<div class="container">
    <?php
    if( mysqli_num_rows($result_thong_tin_cau_hoi) > 0)
    {
        // không có thôn tin trả về
        while ($tt_cau_hoi = mysqli_fetch_assoc($result_thong_tin_cau_hoi)) {

            // truy vấn các lựa chọn tương ứng chơi câu hỏi
            $truy_van_cac_lua_chon="select * from ".$tt_cau_hoi["BangChuaMoTa"];
            $result_truy_lua_chon=mysqli_query($conn,$truy_van_cac_lua_chon);
            ?>
            <div>
                <div class="TracNghiem">
                        <div class="container" style="border: solid white 10px;margin-bottom: 20px;margin-top: 40px;">
                        <div id="animated_div">Câu hỏi thứ <?php echo $tt_cau_hoi["MaCauHoi"] ?> :<br><span style="font-size:10px;"><?php echo $tt_cau_hoi["ChuDe"] ?></span></div>
                        <h4 id="cau_hoi_trac_nghiem"><?php echo $tt_cau_hoi["MoTa"] ?></h4>
                        <?php
                        // số lượng câu hỏi
                        $so_lua_chon=mysqli_num_rows($result_truy_lua_chon);
                        // không có thôn tin trả về
                        if(   $so_lua_chon > 0)
                        {
                            $first=0;
                            while ($tt_luachon = mysqli_fetch_assoc($result_truy_lua_chon)) {

                                // căn chỉnh hiển thị câu hỏi
                                //nếu chỉ có 2 hoặc 4 ảnh thì bố trí 2-4-4-2 , 2 ảnh 1 dòng(4 cột 1 ảnh) ,2 cột đầu bỏ trống
                                // còn không bố trí 4-4-4 với 3 ảnh 1 dòng
                                if (($so_lua_chon == 2 || $so_lua_chon == 4) && ($first == 0)) echo '<div class="row" > <div class=" col-md-2 "></div>';
                                if (($so_lua_chon == 2 || $so_lua_chon == 4) && ($first == 2)) {
                                    echo ' </div> <div class="col-md-2"></div>';
                                }
                                $first++;
                                // lấy thông tin các cột tương ứng với câu hỏi
                                $bang=$tt_cau_hoi["BangChuaMoTa"];
                                $cot_Ma=$cot_cau_hoi[$bang][0];
                                $cot_Ten=$cot_cau_hoi[$bang][1];
                                $cot_MoTa=$cot_cau_hoi[$bang][2];
                                $cot_HinhAnh=$cot_cau_hoi[$bang][3];
                                ?>

                                <div class="why-us-block wow bounceIn col-md-4 col1 gallery-grid" data-wow-delay="0.4s">
                                    <a href= <?php echo '"TracNghiemTuVan.php?luachon='.$tt_luachon[$cot_Ma].'"'; ?>
                                       >
                                        <figure class="effect-bubba why-us-img1" style="margin-bottom: 15px;">
                                            <img class="img-responsive" class="img-responsive zoom-img"
                                                 src=<?php echo '"'.$tt_luachon[$cot_HinhAnh].'"' ?> alt="" name="chon">
                                            <figcaption>
                                                <h4 class="gal">Lựa Chọn</h4>
                                            </figcaption>
                                        </figure>
                                        <h4 style=""><?php
                                            echo $tt_luachon[$cot_Ten];
                                            ?> </h4>
                                    </a>

                                    <p><?php echo $tt_luachon[$cot_MoTa]; ?></p>
                                </div>
                            <?php
                            }
                        }
                        else{
                            echo 'câu hỏi đang được cập nhập, mời bạn về lại <a href="index.php"> trang chủ</a>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        <?php
        }
    }
    else{
        echo 'hệ thống xảy ra lỗi , xin lỗi bạn , mời bạn về lại <a href="index.php"> trang chủ</a>';
    }
    ?>
</div>
<?php
include('../layout/footer.php');
?>
<?php
// ngắt kết nối CSDL
include('../layout/ngatketnoi.php');
?>
</body>
</html>