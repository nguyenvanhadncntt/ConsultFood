<!--import thư viện kêt nối CSDL-->
<?php
include('../layout/KetNoi.php');
?>
<?php 

function tim_quan($MaKhongGian,$MaThoiGian,$MaLuaTuoi,$KhongGiaChoTre,$dsMon,$conn)
{

   /* câu truy vấn mẫu
   SELECT quanan.MaQuanAn,quanan.TenQuanAn,quanan.MoTa,quanan.HinhAnhDaiDien from quanan JOIN quanan_thoigian on
   quanan_thoigian.MaQuanAn=quanan.MaQuanAn JOIN quanan_luatuoi on quanan_luatuoi.MaQuanAn=quanan.MaQuanAn
   JOIN quanan_khonggian on quanan_khonggian.MaQuanAn=quanan.MaQuanAn WHERE quanan_khonggian.MaKhongGian='MKG2'
   AND quanan_thoigian.MaThoiGian='TG2' and quanan_luatuoi.MaLuaTuoi='MT1'
   and quanan.MaQuanAn in ( SELECT  quanan.MaQuanAn  from quanan_monan WHERE quanan_monan.MaMonAn='Ma1')
   and quanan.MaQuanAn in ( SELECT  quanan.MaQuanAn  from quanan_monan WHERE quanan_monan.MaMonAn='Ma2')*/

   // làm động truy vấn
   $truy_van_tim_quan="SELECT quanan.MaQuanAn,quanan.TenQuanAn,quanan.MoTa,quanan.HinhAnhDaiDien
   from quanan JOIN quanan_thoigian on quanan_thoigian.MaQuanAn=quanan.MaQuanAn
   JOIN quanan_luatuoi on quanan_luatuoi.MaQuanAn=quanan.MaQuanAn JOIN quanan_khonggian
   on quanan_khonggian.MaQuanAn=quanan.MaQuanAn WHERE quanan_khonggian.MaKhongGian='".$MaKhongGian."'
   AND quanan_thoigian.MaThoiGian='".$MaThoiGian."' and quanan_luatuoi.MaLuaTuoi='".$MaLuaTuoi."'";
   if($KhongGiaChoTre=='LC1'){
     $truy_van_tim_quan=$truy_van_tim_quan." AND quanan.KhongGiaChoTre=1 ";
   }
   // thêm điều kiện quán phải có những món người dùng đã chọn

   foreach($dsMon as $mon_da_chon)
   {
       // truy vấn yêu cầu quán phải có món ăn nguời dùng chọn
       $truy_van_tim_quan=$truy_van_tim_quan."  and quanan.MaQuanAn in ( SELECT  MaQuanAn  from quanan_monan WHERE quanan_monan.MaMonAn='".$mon_da_chon."') ";
   }
   $result_quan_goi_y = mysqli_query($conn,$truy_van_tim_quan);
   return $result_quan_goi_y;
}
?>