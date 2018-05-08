<!--import thư viện kêt nối CSDL-->
<?php
include('../layout/KetNoi.php');
?>

<?php
/** Hàm này giúp phân trang, dựa vào hàm limit mysql
 * @param $tenCot
 * @param $tenBang
 * @param $dieuKien
 * @param $soLuongMotTrang
 * @param $trang
 * @param $conn
 * @return mysqli_result, trả về một bảng $result_MonAn , với các cột của $TenCot
 */
function phan_trang($tenCot, $tenBang, $dieuKien, $soLuongMotTrang, $trang,$conn)
{
$spbatdau = ($trang-1) * $soLuongMotTrang;
$lay_mon_an = " SELECT " . $tenCot . " FROM " . $tenBang . " " . $dieuKien . " LIMIT " . $spbatdau . "," . $soLuongMotTrang;
$result_MonAn = mysqli_query($conn,$lay_mon_an);
return $result_MonAn;

}

?>

<?php
/**
 * @param $tenBang
 * @param $dieuKien
 * @param $soLuongMotTrang
 * @param $trang
 * @param $dieuKienTrang
 * @param $conn
 * return hàm này trả về pagination để người dùng lật trang
 */
function tao_trang($tenBang,$dieuKien,$soLuongMotTrang,$trang,$dieuKienTrang,$conn)
{
    $truy_van_lay_so_bang_ghi=" SELECT * FROM " . $tenBang . " " . $dieuKien;
    $result =mysqli_query($conn,$truy_van_lay_so_bang_ghi);
    $tong_so_luong = mysqli_num_rows($result);
    $tongsotrang = $tong_so_luong / $soLuongMotTrang;
    // nếu còn thừa trang
    if($tongsotrang > (int)$tongsotrang)
    {
        $tongsotrang=(int)$tongsotrang+1;
    }
    $script="  <script>
        $('.disabled').click(function(e){
            e.preventDefault();
        })
    </script>";
    echo $script;
    $css='<link rel="stylesheet" href="../css/pagination.css">';
    echo $css;
?>
 <div id="phan_trang">
    <div id="wrapper">
                <!--Pagination Start-->
                <section class="archive-pages">
                    <ul>
                        <li class="first  "  ><a href="<?php echo $_SERVER["PHP_SELF"]."?trang=1".$dieuKienTrang ?>" title="first page">first page</a></li>
                        <li class="previous <?php if($trang==1) echo 'disabled'   ?> " ><a href="<?php echo $_SERVER["PHP_SELF"]."?trang=".($trang-1).$dieuKienTrang ?> "title="previous page">previous page</a></li>
                        <?php
                        for($index=1;$index<=$tongsotrang;$index++)
                        {
                        ?>
                            <li class="<?php if($trang==$index) echo 'selected disabled';?>"><a href="<?php echo $_SERVER["PHP_SELF"]."?trang=".$index.$dieuKienTrang; ?> " title="<?php echo "Pagina ".$index ?>"><?php echo $index ?></a></li>
                       <?php
                        }
                        ?>
                        <li class="next <?php if($trang==$tongsotrang) echo 'disabled';   ?> "><a href="<?php echo $_SERVER["PHP_SELF"]."?trang=".($trang+1).$dieuKienTrang ?>" title="next page">next page</a></li>
                        <li class="last  "><a href="<?php echo $_SERVER["PHP_SELF"]."?trang=".$tongsotrang.$dieuKienTrang ?>" title="last page">last page</a></li>
                    </ul>
                </section>
                <!--End-->
      </div>
  </div>
<?php
}
?>
