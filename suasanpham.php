
<?php
require "template/header.php";
require "template/menu.php";

?>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Sửa sản phẩm</h1>
            </div>
        </div>
    </div>
    <!--<div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Trang chủ</li>
                </ol>
            </div>
        </div>
    </div>-->
</div>
<?php
require "connect.php";

/*$id = (int) $_GET['id'];
$sql = "SELECT * FROM sanpham WHERE idsanpham=".$id;
$result = $conn ->query($sql);
$row = $result -> fetch_assoc();*/

?>
<div class="content">
    <div class="container-fluid">

        <br>
        <br>
        <?php
        require "connect.php";

        $id = (int) $_GET['id'];
        $sql = "SELECT * FROM sanpham WHERE idsanpham=".$id;
        $result = $conn ->query($sql);
        $row = $result -> fetch_assoc();

        ?>
        <form name="bacsi" method="post" action="xulysuasanpham.php">
            <input type="hidden" name="idsanpham" value="<?php echo $row['idsanpham'] ?>" />
            <div class="form-group col-md-3  row">
                <label>Tên sản phẩm</label>
                <input type="text" name="ten" class="form-control" id="ten"  value="<?php echo $row['tensanpham'] ?>">
            </div>
            <div class="form-group col-md-3 offset-md-1 row">
                <label>Loại</label>
                <input type="text" name="loai" class="form-control" id="loai" placeholder="Loại (*)" value="<?php echo $row['loai'] ?>">
            </div>
            <div class="form-group col-md-3 offset-md-1 row">
                <label>Đơn vị tính</label>
                <input type="text" name="dvt" class="form-control " id="dvt" placeholder="Đơn vị tính (*) "value="<?php echo $row['donvitinh'] ?>" >
            </div>
            <div class="form-group col-md-12 row">
                <label>Mô tả</label>
                <textarea type="text" name="thongtin" class="form-control" id="thongtin" style="height: 300px;" ><?php echo $row['mota'] ?></textarea>
            </div>
            <div class="form-group col-md-3  row">
                <label>Giá nhập</label>
                <input type="number" name="gn" class="form-control" id="gn"  min="0" max="99999999999999999" value="<?php echo $row['gianhap'] ?>">
            </div>
            <div class="form-group col-md-3 offset-md-1 row">
                <label>Giá bán</label>
                <input type="number" name="gb" class="form-control" id="gb" min="0" max="99999999999999999" value="<?php echo $row['giaban'] ?>">
            </div>
            <div class="form-group col-md-3 offset-md-1 row">
                <label>Số lượng</label>
                <input type="number" name="sl" class="form-control" id="sl" min="0" max="9999999999999999" value="<?php echo $row['soluong'] ?>">
            </div>
            <div class="form-group col-md-3  row">
                <label>Thành tiền</label>
                <input type="number" name="tt" class="form-control " id="tt" value="<?php echo $row['thanhtien'] ?>" readonly min="0" max="99999999999999999999999999999999999">
                <script>
                    $('#gn').on('change paste keyup focusout', function () {
                        $('#tt').val(parseInt($('#gn').val()) * parseInt($('#sl').val()));
                    });
                    $('#sl').on('change paste keyup focusout', function () {
                        $('#tt').val(parseInt($('#gn').val()) * parseInt($('#sl').val()));
                    });
                </script>
            </div>
            <div class="clearfix"></div>
            <div class="form-group col-md-1">   <button href="index.php " id="suasp" name="suasp" class="btn btn-primary  " type="submit">Trở về</button></div>
            <div class="form-group col-md-3">


                <button id="suasp" name="suasp" class="btn btn-primary  " type="submit">Sửa sản phẩm</button>
            </div>

        </form>

    </div>
<?php
require "template/footer.php";


?>