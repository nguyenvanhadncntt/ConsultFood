<!DOCTYPE html>
<html lang="en">
<head>
    <title>Chi Tiết Món Ăn</title>
    <meta charset="utf-8">
    <!--css-->
    <!--Khai báo các thư viện-->
    <?php
    include('../layout/link-script.php');
    include('../layout/KetNoi.php');
    include('../function/function_ChiTietMonAn.php');
    ?>
    <?php
    session_start();
    // tạo sesion lưu danh sách món người dùng truy cấp
    if(!isset($_SESSION['dsMonTruyCap']))
    {
         $_SESSION['dsMonTruyCap']=array();
    }     
    $ma_mon_an="";
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if(isset($_GET["MaMonAn"]))
        {
            $ma_mon_an=$_GET["MaMonAn"];
            $dsMon=$_SESSION['dsMonTruyCap'];
            // kiểm tra xem quán đó đã được thêm chưa , nếu thêm rồi thì không thêm một lượt truy cập nữa
            $index = array_search(  $ma_mon_an,  $dsMon); // $key = 2;                 
            // nếu có rồi thì không tăng lượt truy cập lên nữa
            if(!is_numeric ($index))
              {
                //thêm một lựa chọn món theo tháng
                them_mot_luachonmon($ma_mon_an,$conn);
                array_push($_SESSION['dsMonTruyCap'],$ma_mon_an);
              }
            
            }
        else {
            header('Location:index.php');
        }
    }
    If($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST["MaMonAn"]))
        {
            //    lấy dữ liệu người dùng nhập từ form bằng phương thức post
            $ma_mon_an=$_POST["MaMonAn"];$ten=$_POST["ten"];$SDT=$_POST["dienthoai"];$email=$_POST["email"];$NoiDung=$_POST["binhluan"];
            //khởi tạo biến duyệt =0 , nghĩa là bình luận vẫn chưa được hiển thị, tạm thời bằng 1 để kiểm tra
            $duyet=0;

            //gọi function them_binh_luan_mon($ma_mon_an,$ten,$SDT,$email,$NoiDung,$duyet,$conn) để thêm bình luận
            them_binh_luan_mon($ma_mon_an,$ten,$SDT,$email,$NoiDung,$duyet,$conn);

            //gọi function thong_bao_da_them();
            thong_bao_da_them();
            ?>
            <?php
        }
        else {
            header('Location:index.php');
        }
    }
    // gọi function thong_in_mon_an($ma_mon_an,$conn) , giữ nút ctrl + click vô hàm để xem mô tả
    $result_thong_tin_mon =thong_tin_mon_an($ma_mon_an,$conn);

    // gọi function thong_tin_hinh_anh($ma_mon_an,$conn)
    $result_hinh_anh_mon_an=thong_tin_hinh_anh($ma_mon_an,$conn);;

    // gọi function  thong_tin_binh_luan($ma_mon_an,$conn)
    $result_binh_luan=thong_tin_binh_luan($ma_mon_an,$conn);

    // gọi  function thong_tin_luot_truy_cap($ma_mon_an,$conn)
    $result_truy_cap=thong_tin_luot_truy_cap($ma_mon_an,$conn);

    //lấy thông tin bảng ghi đầu tiên (chỉ có duy nhất 1 bảng nên không cần bỏ vào while)
    $luot_truy_cap =mysqli_fetch_assoc($result_truy_cap);
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
        <div class="main">
            <?php  if(mysqli_num_rows($result_thong_tin_mon) == 0 )
            {
                echo 'Xin lỗi bạn, dữ Liệu món ăn đang được cập nhập <a href="index.php"> Quay Lại ở đây</a>';
            }
            else {
                $mon_an=mysqli_fetch_assoc($result_thong_tin_mon);
            // nếu có thông tin món ăn , thì mới hiện thị những thẻ phần phía dưới
                ?>
                <div id="mon_an">
                    <h3><?php echo $mon_an["TenMonAn"]; ?></h3>
                    <figure class="img-indent box-img-gt"><img src=<?php echo $mon_an["HinhAnhDaiDien"]; ?> " alt="" style="width: 330px; height: 185px" / ></figure>
                    <div class="overflow " style="padding: 25px;">
                        <div class="category-items">
                            Hình Thức:
                            <a href="/da-nang/food/cafe" title="Café/Dessert" style="color: #888;"> Đồ Ăn Vặt</a>
                        </div>
                        <div class="category-cuisines">
                            <div class="audiences">Đối Tượng: Sinh viên,&nbsp;Cặp đôi,&nbsp;Nhóm hội</div>
                        </div>
                        <a href="#"><img alt="" src="../images/quanan/icon-6.png"></a>&nbsp;&nbsp;<?php echo $mon_an["GiaTien"].' đ'; ?><br>
                        <a href="#"><img alt="" src="../images/quanan/icon-7.png"></a>&nbsp;&nbsp; <?php echo $mon_an["Diem"].' điểm'; ?> <br>
                    </strong> <strong>Lượt truy cập: <?php echo $luot_truy_cap["luottruycap"]; ?>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="border-horiz extra"></div>
            <div id="hinh_anh_quan_an">
                <h3>Thư Viện Ảnh Món Ăn</h3>
                <ul class="list-dropcap-quanan">
                    <?php
                    // kiểm tra có ảnh trả về
                    if(mysqli_num_rows($result_hinh_anh_mon_an) == 0 )
                    {
                        echo 'Xin lỗi bạn, dữ Liệu hình ảnh quán đang dược cập nhập';
                    }
                    else
                    {
                        while($hinh_anh_mon_an=mysqli_fetch_assoc($result_hinh_anh_mon_an)) {
                            ?>
                            <li>
                                <figure class="box-img-gt"><img src=<?php echo $hinh_anh_mon_an["Link"]; ?> alt="" /></figure>
                            </li>
                            <?php
                        }
                    }
                    ?>
                </ul>
            </div>
            <div class="border-horiz extra1"></div>
            <div class="Danh_Gia">
                <div id="danh_gia">
                    <h3 style="font-size:20px">Đánh giá</h3>
                    <?php
                    if(mysqli_num_rows($result_binh_luan) == 0 )
                    {
                        echo 'không có bình luận về món này, bạn hãy là người đầu tiên để lại bình luận ';
                    }
                    else
                    {
                        while($binh_luan=mysqli_fetch_assoc($result_binh_luan)) {
                            ?>
                            <div class="1_binh_luan binh_luan_odd">
                                <span style="color: red"> <?php echo $binh_luan["ThoiGian"]."-".$binh_luan["Ten"] ; ?> :</span> <br>
                                <p><?php echo $binh_luan["NoiDung"]; ?></p>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
                <div class="border-horiz extra1"></div>
                <div id="de_lai_danh_gia">
                    <div class="box-contact" style="margin: 60px -40px 0;">
                        <h3>Để Lại Bình Luận</h3>
                        <form action="ChiTietMonAn.php?#danh_gia" id="contact-form" method="POST">
                            <div class="success">Đánh giá của bạn sẽ được chúng tôi kiểm tra, trước khi được đăng! <strong>Cảm ơn bạn đã đánh giá.</strong> </div>
                            <fieldset>
                                <div class="coll-1">
                                    <div>
                                        <!-- thẻ hidden lưu lại món ăn người dùng đang xem , để truy vấn lại -->
                                        <input type="hidden" name="MaMonAn" value="<?php echo $mon_an["MaMonAn"]  ?>">
                                        <div class="form-txt"  >Tên của bạn:</div>
                                        <label class="name" >
                                            <input type="text" name="ten"  maxlength="100" required >
                                            <div class="clear"></div>
                                        </label>
                                    </div>
                                    <div>
                                        <div class="form-txt">Số Diện Thoại:</div>
                                        <label class="phone">
                                            <input type="tel"  name="dienthoai" pattern="^[0-9]{10,}$" title="vui lòng nhập đúng số điện thoại" required >
                                            <div class="clear"></div>
                                        </label>
                                    </div>
                                    <div>
                                        <div class="form-txt">Email:</div>
                                        <label class="email">
                                            <input type="email" name="email" required>
                                            <div class="clear"></div>
                                        </label>
                                    </div>
                                </div>
                                <div class="coll-2">
                                    <div>
                                        <div class="form-txt">Bình Luận Ở Đây:</div>
                                        <label class="message">
                                            <textarea name="binhluan" maxlength="150" required></textarea>
                                            <div class="clear"></div>
                                        </label>
                                    </div>
                                </div>
                                <div class="clear"></div>
                                <input class="gui_comment" type="submit" value="Gửi bình luận">
                            </fieldset>
                        </form>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="border-horiz extra1"></div>
            <?php
        }
        ?>
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