<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Chi Tiết Quán Ăn</title>
      <meta charset="utf-8">
      <!--Khai báo các thư viện-->
      <?php
         include('../layout/link-script.php');
         include('../layout/KetNoi.php');
         include('../function/function_ChiTietQuanAn.php');
         ?>
      <?php
        session_start();

        // tạo sesion lưu danh sách quan người dùng truy cấp
        if(!isset($_SESSION['dsQuanTruyCap']))
        {
          $_SESSION['dsQuanTruyCap']=array();
        }

        if ($_SERVER["REQUEST_METHOD"] == "GET") {
          if(isset($_GET["MaQuanAn"]))
          {
               $ma_quan_an=$_GET["MaQuanAn"];     
               $dsQuan=$_SESSION['dsQuanTruyCap'];
              // kiểm tra xem quán đó đã được thêm chưa , nếu thêm rồi thì không thêm một lượt truy cập nữa
              $index = array_search( $ma_quan_an,  $dsQuan); // $key = 2;                 
               // nếu có rồi thì không tăng lượt truy cập lên nữa
              if(!is_numeric ($index))
              {
                // thêm một lần truy cập quán trong tháng ở đây
                them_mot_luachonquan($ma_quan_an,$conn);
                array_push($_SESSION['dsQuanTruyCap'],$ma_quan_an);
              }
          }
          else {
              header('Location:index.php');
          }
         }
         If($_SERVER["REQUEST_METHOD"] == "POST"){
          if(isset($_POST["MaQuanAn"]))
          {
                        //    lấy dữ liệu người dùng nhập từ form bằng phương thức post
              $ma_quan_an=$_POST["MaQuanAn"];$ten=$_POST["ten"];$SDT=$_POST["dienthoai"];$email=$_POST["email"];$NoiDung=$_POST["binhluan"];
                        //khởi tạo biến duyệt =0 , nghĩa là bình luận vẫn chưa được hiển thị, tạm thời bằng 1 để kiểm tra
              $duyet=1;
         
                        //gọi function them_binh_luan_mon($ma_quan_an,$ten,$SDT,$email,$NoiDung,$duyet,$conn) để thêm bình luận
              them_binh_luan_quan($ma_quan_an,$ten,$SDT,$email,$NoiDung,$duyet,$conn);
         
                        //gọi function thong_bao_da_them();
              thong_bao_da_them();
          }
          else {
              header('Location:index.php');
          }
         }
                // gọi function thong_tin_quan_an($ma_quan_an,$conn)
         $result_thong_tin_quan =thong_tin_quan_an($ma_quan_an,$conn);
         
                // gọi function thong_tin_hinh_anh($ma_quan_an,$conn)
         $result_hinh_anh_quan_an=thong_tin_hinh_anh($ma_quan_an,$conn);;
         
                // gọi function  thong_tin_binh_luan($ma_quan_an,$conn)
         $result_binh_luan=thong_tin_binh_luan($ma_quan_an,$conn);
         
                // gọi  function thong_tin_luot_truy_cap($ma_quan_an,$conn)
         $result_truy_cap=thong_tin_luot_truy_cap($ma_quan_an,$conn);
         
                //lấy thông tin bảng ghi đầu tiên (chỉ có duy nhất 1 bảng nên không cần bỏ vào while)
         $luot_truy_cap =mysqli_fetch_assoc($result_truy_cap);
         
                // gọi function thong_tin_monan_quanan($ma_quan_an,$conn)
         $result_mon_an=thong_tin_monan_quanan($ma_quan_an,$conn);
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
            <?php  
            if(mysqli_num_rows($result_thong_tin_quan) == 0 )
               {
                echo 'Xin lỗi bạn, dữ Liệu Quán Đang Được Cập Nhập <a href="index.php"> Quay Lại ở đây</a>';
               }
               else {
                $quan_an=mysqli_fetch_assoc($result_thong_tin_quan);
                          // nếu có thông tin quán , thì mới hiện thị những thẻ phần phía dưới
                ?>
            <div id="quan_an">
               <h3><?php echo $quan_an["TenQuanAn"] ?></h3>
               <figure class="img-indent box-img-gt"><img src=<?php echo $quan_an["HinhAnhDaiDien"]  ?> alt= <?php echo  $quan_an["TenQuanAn"] ?> style="width: 330px; height: 185px" / ></figure>
               <div class="overflow " style="padding: 20px;">
                  <div class="category-items">
                     Hình Thức:
                     <span style="color: #888;"> <?php echo $quan_an["HinhThuc"] ?></span>
                     <ul itemprop="servesCuisine">
                        <li class="cuisines-list-items"> Địa Điểm:
                           <span class="microsite-cuisine" style="color: #888;">
                           <?php echo $quan_an["DiaDiem"]   ?></span>
                        </li>
                     </ul>
                  </div>
                  <div class="category-cuisines">
                     <div class="audiences">Đối Tượng: <?php echo $quan_an["DoiTuong"]   ?> </div>
                  </div>
                  <a href="#"><img alt="" src="../images/quanan/icon-5.png"></a>&nbsp;&nbsp;<?php echo $quan_an["ThoiGianMoCua"]   ?> <br>
                  <a href="#"><img alt="" src="../images/quanan/icon-6.png"></a>&nbsp;&nbsp;<?php echo $quan_an["GiaTien"] ?><br>
                  <a href="#"><img alt="" src="../images/quanan/icon-7.png"></a>&nbsp;&nbsp;<?php echo $quan_an["Diem"]   ?> Điểm<br>
                  </strong> <strong>Lượt truy cập: <?php echo $luot_truy_cap["luottruycap"]; ?>
                  <div class="clear"></div>
               </div>
            </div>
            <div class="border-horiz extra"></div>
            <div id="hinh_anh_quan_an">
               <h3>Thư Viện Ảnh Quán Ăn</h3>
               <ul class="list-dropcap-quanan">
                  <?php
                     // kiểm tra có ảnh trả về
                     if(mysqli_num_rows($result_hinh_anh_quan_an) == 0 )
                     {
                     echo 'Xin lỗi bạn, dữ Liệu hình ảnh quán đang dược cập nhập';
                     }
                     else
                     {
                     while($hinh_anh_quan_an=mysqli_fetch_assoc($result_hinh_anh_quan_an)) {
                     ?>
                  <li>
                     <figure class="box-img-gt"><img src=<?php echo $hinh_anh_quan_an["link"] ?> alt="Hình ảnh quán ăn"/></figure>
                  </li>
                  <?php
                     }
                     }
                     ?>
               </ul>
            </div>
            <div class="border-horiz extra"></div>
            <div id="bangdo">
               <h3>Hình Ảnh Qua Bản Đồ</h3>
               <div class="box-img" style="width: 100%;height: 350px;">
                  <iframe src=<?php echo $quan_an["SrcMap"] ?>  width="960" height="370" frameborder="0" style="border:0" allowfullscreen></iframe>
               </div>
            </div>
            <div class="border-horiz extra"></div>
            <div id="danh sach mon an">
               <h3>Những Món ăn vặt nổi bật</h3>
               <blockquote class="quote-1">danh sách những món ăn quán phục vụ </blockquote>
               <div class="name-author"></div>
               <ul class="list-mon-an">
                  <?php
                     // kiểm tra món ăn trả về
                     if(mysqli_num_rows($result_mon_an) == 0 )
                     {
                     echo 'Xin lỗi bạn, dữ liệu hình ảnh món ăn của quán đang dược cập nhập';
                     }
                     else
                     {
                     while($mon_an=mysqli_fetch_assoc($result_mon_an)) {
                     ?>
                  <li id="1_mon_an">
                     <div class="wrapper">
                        <div class="dropcap"> <?php $chu_dau_tien=substr($mon_an["TenMonAn"],0,1); echo $chu_dau_tien;   ?> </div>
                        <a href=<?php echo "ChiTietMonAn.php?MaMonAn=".$mon_an["MaMonAn"] ?>> <?php echo $mon_an["TenMonAn"]; ?> </a>
                     </div>
                     <figure class="box-img"><img src=<?php echo $mon_an["HinhAnhDaiDien"]; ?> alt="hinh anh thuc an" /></figure>
                  </li>
                  <?php
                     }
                     }
                     ?>
               </ul>
            </div>
            <div class="border-horiz extra1"></div>
            <div class="Danh_Gia">
               <div id="danh gia">
                  <h3 style="font-size:20px">Đánh giá của thực khách</h3>
                  <?php
                     if(mysqli_num_rows($result_binh_luan) == 0 )
                     {
                      echo 'không có bình luận về quán này, bạn hãy là người đầu tiên để lại bình luận ';
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
                       <form action="ChiTietQuanAn.php?#danh gia" id="contact-form" method="POST">
                            <div class="success">Đánh giá của bạn sẽ được chúng tôi kiểm tra, trước khi được đăng! <strong>Cảm ơn bạn đã đánh giá.</strong> </div>
                            <fieldset>
                                <div class="coll-1">
                                    <div>
                                        <input type="hidden" name="MaQuanAn" value="<?php echo $quan_an["MaQuanAn"]  ?>" >
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
            <div class="clear"></div>
         <?php
            }
            ?>
         <div class="border-horiz extra1"></div>
         <div class="container_12 tham_khao">
            <div class="main padd-1" >
               <h3 style="font-size: 30px">Tham Khảo Thêm:</h3>
            </div>
            <article class="grid_6">
               <figure class="img-indent box-img"><img src="../images/quanan/qa1_1.jpg" alt="" /></figure>
               <div class="overflow padd-1">
                  <h3 style="font-size: 30px">Cô Giang</h3>
                  <a href="#" class="btn">Xem Chi Tiết</a>
                  <div class="clear"></div>
               </div>
               <div class="clear"></div>
            </article>
            <article class="grid_6">
               <figure class="img-indent box-img"><img src="../images/quanan/page4-img6.jpg " alt="" /></figure>
               <div class="overflow padd-1">
                  <h3 style="font-size: 30px">Memories</h3>
                  <a href="#" class="btn">Xem Chi Tiết</a>
                  <div class="clear"></div>
                  <div class="clear"></div>
               </div>
            </article>
            <div class="clear"></div>
         </div>
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