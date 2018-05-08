<?php
session_start();
if(!isset($_SESSION["taiKhoan"]))
{
    header('location:DangNhap.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Thông tin món</title>
    <?php
    include('../layout/link-script.php');
    include('../function/MoKetNoi.php');
    include('../function/function_admin.php');
    $danh_sach_mon=lay_thong_tin_mon_an($conn,"");

    ?>
    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<?php
include('../layout/header.php');
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Thông Tin Món</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Dánh sách Món
            </div>
            <!--        jquery ni tự phân trang với tìm kiếm rồi nghe Thành-->
            <div class="panel-body">
            <form action="ThongTinMon.php" method="get">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th>Tên Món Ăn</th>
                        <th>Mô Tả</th>
                        <th>Hình Ảnh</th>
                        <th>Giá Tiền</th>
                        <th>Món Mơi</th>
                        <th>Điểm</th>
                        <th>Cập Nhật</th>
                        <th>Xóa</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if (mysqli_num_rows($danh_sach_mon) > 0) {
                 	while ($row = mysqli_fetch_assoc($danh_sach_mon)) {
                 	
         			?>
         			<tr class="gradeU">
                        <td><?php echo $row["TenMonAn"]?></td>
                        <td><?php echo $row["MoTa"]?></td>
                        <td>
                            <img src= <?php echo'"../../NguoiDung'. substr($row["HinhAnhDaiDien"],2) .'"' ?> height="100px" width="100px">
                        </td>
                        <td ><?php echo $row["GiaTien"] ?></td>
                        <td><?php echo $row["MonMoi"]?></td>
                        <td><?php echo $row["Diem"]?></td>
                        <td class="center"><a href=<?php echo '"SuaMonAn.php?MaMonAn='.$row["MaMonAn"].'"'?>><span class="fa  fa-gears "></span> </a></td>
                        <td class="center"><a href=<?php echo '"XoaMonAn.php?MaMonAn='.$row["MaMonAn"].'"'?> o><span class="fa fa-bitbucket-square"></span> </a></td>
                       </tr>
                    <?php
                 }
             }
             else {
                 echo '<h1>Chúng tôi xin lỗi về sự cố,Dữ liệu đang được cập nhập</h1>';
             }
             ?>
                    </tbody>
                </table>
             </form>
            </div>
        </div>
    </div>
</div>
<?php
include('../function/DongKetNoi.php');
include('../layout/footer.php');
?>
<!-- jQuery -->
<script src="../vendor/jquery/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<!-- Metis Menu Plugin JavaScript -->
<script src="../vendor/metisMenu/metisMenu.min.js"></script>
<!-- DataTables JavaScript -->
<script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>
<!-- Custom Theme JavaScript -->
<script src="../dist/js/sb-admin-2.js"></script>
<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>
</body>
</html>