<html>
<head>
    <title>Gợi ý Quán Ăn</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/goiymon_an.css"/>
    <?php
    include('../layout/link-script.php');
    include('../layout/KetNoi.php');
    include('../function/function_GoiYQuanAnTuKetQua.php');
    ?>
    
    <?php
    session_start();
    $dsMon= $_SESSION['dsMon'];

    // lấy các lựa chọn của người sử dụng
    $DK=$_SESSION['DK'];
    // gán giá trị cho các biên
    $MaKhongGian=$DK[1];
    $MaThoiGian=$DK[4];
    $MaLuaTuoi=$DK[6];
    $KhongGiaChoTre=$DK[7];

    // gọi function tim_quan($MaKhongGian,$MaThoiGian,$MaLuaTuoi,$KhongGiaChoTre,$dsMon,$conn)
    $result_quan_goi_y =  tim_quan($MaKhongGian,$MaThoiGian,$MaLuaTuoi,$KhongGiaChoTre,$dsMon,$conn);
    ?>
</head>
<body>
    <!--==============================header=================================-->
    <?php
    include('../layout/header.php');
    ?>
    <!--==============================content=================================-->
    <section class="main">
        <h3 style="font-size:32px;color: red">Các quán ăn phù hợp với kết quả mà bạn đã chọn</h3>
        <form action="GoiYQuanAnTuKeQua.php">
            <ul class="list-recipes extra">
                <?php
                if(mysqli_num_rows($result_quan_goi_y) > 0) {
                    while ($quan_an = mysqli_fetch_assoc($result_quan_goi_y)) {
                        ?>
                        <li class="goi_y_1_quan_an">
                            <div style="height: 290px;">
                                <div style="height: auto; float: left;">
                                    <figure class="box-img-kq" style="margin-bottom: 15px;">
                                        <img src=<?php echo '"'.$quan_an["HinhAnhDaiDien"].'"'; ?> alt="" >
                                    </figure>
                                </div>
                                <div>
                                    <h4> <?php echo $quan_an["TenQuanAn"] ?> </h4>
                                    <p> <?php  echo $quan_an["MoTa"] ?> </p>
                                    <br> <a href=<?php echo "ChiTietQuanAn.php?MaQuanAn=".$quan_an["MaQuanAn"] ?> class="button btn-ct"><span>Xem Chi Tiết </span></a>
                                </div>
                            </div>
                        </li>
                        <?php
                    }
                }
                else {
                    echo '<h1>Chúng tôi không tìm thấy quán bạn yêu cầu, vui lòng <a href="GoiYMonAnTuKetQua.php">thử lại</a> </h1>';
                }
                ?>
            </ul>
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