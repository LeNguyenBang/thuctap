

<div class="content">
    <div class="container-fluid">

        <br>
        <br>
        <form name="bacsi" method="post" action="xulythemsanpham.php">
            <div class="form-group col-md-3  row">
                <label>Tên sản phẩm</label>
                <input type="text" name="ten" class="form-control" id="ten" placeholder="Tên sản phẩm (*)">
            </div>
            <div class="form-group col-md-3 offset-md-1 row">
                <label>Loại</label>
                <input type="text" name="loai" class="form-control" id="loai" placeholder="Loại (*)">
            </div>
            <div class="form-group col-md-3 offset-md-1 row">
                <label>Đơn vị tính</label>
                <input type="text" name="dvt" class="form-control " id="dvt" placeholder="Đơn vị tính (*)">
            </div>
            <div class="form-group col-md-12 row">
                <label>Mô tả</label>
                <textarea type="text" name="thongtin" class="form-control" id="thongtin" placeholder="Thông tin sản phẩm"></textarea>
            </div>
            <div class="form-group col-md-3  row">
                <label>Giá nhập</label>
                <input type="number" name="gn" class="form-control" id="gn" placeholder="Giá nhập" min="0" max="99999999999999999">
            </div>
            <div class="form-group col-md-3 offset-md-1 row">
                <label>Giá bán</label>
                <input type="number" name="gb" class="form-control" id="gb" placeholder="Giá bán"  min="0" max="99999999999999999">
            </div>
            <div class="form-group col-md-3 offset-md-1 row">
                <label>Số lượng</label>
                <input type="number" name="sl" class="form-control" id="sl" placeholder="Số lượng"  min="0" >
            </div>
            <div class="form-group col-md-3 offset-md- row">
                <label>Thành tiền</label>
                <input type="number" name="tt" class="form-control " id="tt" readonly>
                <script>
                    $('#gn').on('change paste keyup focusout', function () {
                        $('#tt').val(parseInt($('#gn').val()) * parseInt($('#sl').val()));
                    });
                    $('#sl').on('change paste keyup focusout', function () {
                        $('#tt').val(parseInt($('#gn').val()) * parseInt($('#sl').val()));
                    });
                </script>
            </div>
            <div class="form-group col-md-3 offset-md-1 row">
            <label></label>
            <button id="themmoisanpham" name="themsanpham" class="btn btn-primary " type="submit">Thêm mới</button>
            </div>
    </div>
    </form>

</div>
<script>
$(document).ready(function () {
    $("#themmoisanpham").click(function () {
    $("#themmoi").load("themsanpham.php").toggle()
    })
})
</script>