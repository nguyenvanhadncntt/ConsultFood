<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Liên Hệ Chúng Tôi</title>
      <meta charset="utf-8">
      <!--Khai báo các thư viện-->
      <?php
         include('../layout/link-script.php');
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
            <h3>Thông Tin Liên Hệ </h3>
            <div class="box-address">
               <h4>Tư Vấn Ăn vặt</h4>
               <dl class="address">
                  <dt>Khoa Tin Học<br>
                     Đại Học Sư Phạm Đà Nẵng.
                  </dt>
                  <dd> <span>Telephone:</span> +841648283144</dd>
                  <dd> <span>Telephone1:</span> +841648283144</dd>
                  <dd> <span>Telephone2:</span> +841648283144</dd>
                  <dd> E-mail: <a class="mail-1" href="#">tuvanav@gmail.com</a> </dd>
               </dl>
            </div>
            <div class="map box-img">
               <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3834.0579408765607!2d108.1579059097111!3d16.062482828966605!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314219243fd02eff%3A0xa691cb5163d76dae!2zxJDhuqFpIEjhu41jIFPGsCBQaOG6oW0gxJDDoCBO4bq1bmc!5e0!3m2!1svi!2s!4v1479403709171" width="650" height="202" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
            <div class="clear"></div>
         </div>

         <div id="lienhe" class="box-contact">
            <h3>Liên Hệ Chúng Tôi</h3>
            <form action="LienHe.php?#lienhe" id="contact-form" method="POST">
               <div class="success">Đánh giá của bạn sẽ được chúng tôi kiểm tra, trước khi được đăng! <strong>Cảm ơn bạn đã đánh giá.</strong> </div>
               <fieldset>
                  <div class="coll-1">
                     <div>
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
      </section>
      <!--==============================footer=================================-->
      <?php
         include('../layout/footer.php');
         ?>
   </body>
</html>