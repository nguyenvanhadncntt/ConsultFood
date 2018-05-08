<html>
<head>
    <title>Gợi ý món ăn</title>
    <meta charset="utf-8">
    <?php
    include('../layout/link-script.php');
    include('../layout/KetNoi.php');
    include('../function/function_GoiYMonAnTuKetQua.php');
    ?>
    <link rel="stylesheet" href="../css/goiymon_an.css"/>
    <link rel="stylesheet" href="../css/progressbar.css"/>
    <script type="text/javascript" src="../js/progressbar.js"></script>
    <?php
    session_start();

     if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if(isset($_SESSION["dsMon"]))
        {
            unset($_SESSION["dsMon"]);
        }       
     }

    // lấy danh sách món ăn người dùng chọn
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // mảng các giá trị lấy được từ phương thức Post
        if(isset($_POST["dsMon"]))
        {
            // lấy danh sách các mã món ăn người dùng đã chọn bằng phương thức post
            $dsMonThem=$_POST["dsMon"];
            if(!isset($_SESSION['dsMon']))
            {
                //khởi tạo session lưu danh sách người dụng lựa chọn
                $_SESSION['dsMon']=$dsMonThem;
            }
            else {
                // kiểm tra đã tồn tại trong mảng hay chưa, nếu không tồn tại mới thêm vào
                if(!var_dump(in_array($dsMonThem,  $_SESSION['dsMon']))){
                    $_SESSION['dsMon']=array_merge($_SESSION['dsMon'],$_POST["dsMon"]);
                }
            }   
        }
        
    }
   
    
    //lấy các sư lựa chọn của người dùng từ session
    $DK=$_SESSION['DK'];
    
    // gán các biến để truy vấn
    $MaThoiTiet=$DK[0];
    $MaLoaiTA=$DK[2];
    $GiaTien=$DK[3];
    $trang=1;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //lấy ra trang cần hiển thị từ thẻ hidden
        if(isset($_POST["trang"]))
            $trang=0+$_POST["trang"];
    }

    // gọi function tong_so_trang($MaThoiTiet,$MaLoaiTA,$GiaTien,$conn);
    $tong_so_trang=tong_so_trang($MaThoiTiet,$MaLoaiTA,$GiaTien,$conn);
   
    //kiểm tra xem đã hết trang chưa
    if($trang>$tong_so_trang)
    {
      //nếu đã hoàn thành chuyển trang đến gợi ý quán ăn
        header("Location:GoiYQuanAnTuKetQua.php");
    }
    // gọi fuction function tim_mon($MaThoiTiet,$MaLoaiTA,$GiaTien,$trang,$conn);
    $result_mon_goi_y=tim_mon($MaThoiTiet,$MaLoaiTA,$GiaTien,$trang,$conn);

    ?>
</head>
<body>
    <!--==============================header=================================-->
    <?php
    include('../layout/header.php');
    ?>
    <!--==============================content=================================-->
    <section class="main">
        <h3 style="font-size:32px;color: red">Các món ăn phù hợp với kết quả mà bạn đã chọn</h3>

        <form action="GoiYMonAnTuKetQua.php" method="post" style="margin-bottom: 40px">
            <!-- khởi tạo 1 thẻ input ẩn chứa trang để lật trang -->
            <input type="hidden" name="trang" value="<?php echo ($trang+1)  ?>">
            <ul class="list-recipes extra">
                <?php if (mysqli_num_rows($result_mon_goi_y) > 0) {

                    while ($mon_an = mysqli_fetch_assoc($result_mon_goi_y)) {
                        ?>
                        <li class="goi_y_1_quan_an">
                            <div style="height: 290px;  ">
                                <div style="height: auto; float: left;">
                                    <figure class="box-img-kq" style="margin-bottom: 15px;">
                                        <img src=<?php echo '"'.$mon_an["HinhAnhDaiDien"].'"'; ?> alt="hình ảnh món ăn" >
                                    </figure>
                                    <div style="clear: both;margin-left: -27px;">
                                        <div class="slideThree">
                                            <input type="checkbox" id= <?php echo '"'.$mon_an["MaMonAn"].'"'; ?> value=<?php echo '"'.$mon_an["MaMonAn"].'"'; ?> name="dsMon[]" />
                                            <label for=<?php echo '"'.$mon_an["MaMonAn"].'"'; ?>></label>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <h4><?php echo $mon_an["TenMonAn"] ?></h4>
                                    <p><?php echo $mon_an["MoTa"] ?>
                                        <br> <a href=<?php echo "ChiTietMonAn.php?MaMonAn=".$mon_an["MaMonAn"] ?> class="button btn-ct"><span>Xem Chi Tiết </span></a>
                                    </p>
                                </div>
                            </div>
                        </li>
                        <?php
                    }
                }
                else {
                    echo '<h1>Chúng tôi không tìm thấy món bạn yêu cầu, vui lòng <a href="TuVanNhanh.php">thử lại</a> </h1>';
                }
                ?>
            </ul>

            <?php tao_thanh_progress($MaThoiTiet,$MaLoaiTA,$GiaTien,$trang,$conn); ?>
            <input type="submit" class="btn btn btn-gt" style="cursor: pointer;width: 325px;padding: 10px;" value="Chọn Xong">
        </form>
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