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
    <title>Thống Kê Quán Ăn</title>
    <?php
    include('../layout/link-script.php');
    include('../function/function_admin.php');
    $danh_sach_mon=thong_ke_quan_an($conn);
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
        <h1 class="page-header">Thống Kê Quán Ăn</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Thống Kê Món Ăn
            </div>
            <!--        jquery ni tự phân trang với tìm kiếm rồi nghe Thành-->
            <div class="panel-body">

                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th>Tên Món Ăn</th>
                        <th>Hình Ảnh</th>
                        <th>Tháng</th>
                        <th>Năm</th>
                        <th>Lượt Truy Cập</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if (mysqli_num_rows($danh_sach_mon) > 0) {
                        while ($row = mysqli_fetch_assoc($danh_sach_mon)) {
                            ?>
                            <tr class="gradeU">
                                <td><?php echo $row["TenQuanAn"]?></td>
                                <td>
                                    <img src= <?php echo'"../../NguoiDung'. substr($row["HinhAnhDaiDien"],2) .'"' ?> height="100px" width="100px">
                                </td>
                                <td><?php echo $row["thang"]?></td>
                                <td><?php echo $row["nam"]?></td>
                                <td><?php echo $row["luottruycap"]?></td>
                            </tr>
                        <?php
                        }
                    }?>
                    </tbody>
                </table>
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