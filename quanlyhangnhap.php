

<?php
require "connect.php";
$sql = "SELECT * FROM sanpham ";
$result = $conn ->query($sql);

?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover ">
                    <div >
                        <div class="moi1">
                            <button id="themsanpham" name="themsanpham" class="btn btn-primary " type="submit">Thêm sản phẩm</button>

                       <!-- <form class="form-inline float-right" action="/action_page.php">
                            <div class="moi2">
                            <input class="form-control mr-sm-2" type="text" placeholder="Tìm mã">

                            <button class="btn btn-success fa fa-search" type="submit">Tìm mã</button>
                                <input class="form-control mr-sm-2" type="text" placeholder="Tìm tên">
                            <button class="btn btn-success fa fa-search" type="submit">Tìm tên</button>
                            </div>
                        </form>-->
                        </div>
                    </div>
                    <div id="themmoi" >

                    </div>
                    <div class="card-body table-full-width table-responsive ">
                        <table class="table table-hover table-striped text-center display" id="example">

                            <thead >
                            <th class="sorting">ID</th>
                            <th>Tên sản phẩm</th>
                            <th>Loại</th>
                            <th>Đơn vị tính</th>
                            <th>Mô tả</th>
                            <th>Giá nhập <nhập></nhập></th>
                            <th>Giá bán</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                            <th>Chức năng</th>
                            </thead>
                            <tbody>
                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result -> fetch_assoc()){ ?>
                                    <tr class="text-center">
                                        <td><?php echo $row['idsanpham']; ?></td>
                                        <td> <?php echo $row['tensanpham']; ?> </td>
                                        <td><?php echo $row['loai']?></td>
                                        <td><?php echo $row['donvitinh']?></td>
                                        <td><?php echo $row['mota']?></td>
                                        <td><?php echo $row['gianhap']?></td>
                                        <td><?php echo $row['giaban']?></td>
                                        <td><?php echo $row['soluong']?></td>
                                        <td><?php echo $row['thanhtien']?></td>
                                        <td>
                                            <a href="suasanpham.php?id=<?php echo $row['idsanpham']; ?>"
                                               class="btn fa fa-edit btn-primary" style="margin-right: 3px;color: white" id="sua">Sửa</div>
                                            <a href="xoasanpham.php?id=<?php echo $row['idsanpham']; ?>"
                                               class="btn fa fa-remove btn-danger remove au-btn--submit" style="margin-right: 3px;color: id="xoa" white">Xóa</a></td>
                                    </tr>
                                <?php }
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function () {
    $("#themsanpham").click(function () {
        $("#themmoi").load("themsanpham.php").toggle()
    })
})
$(document).ready(function () {

        $("#themmoi").load("themsanpham.php").show().toggle()
    })
$(document).ready(function () {
    $('#example').dataTable( {
        "pagingType": "full_numbers","lengthMenu": [ 5,10, 25, 50, 75, 100 ]
            ,"language": {
            "info":           "Hiển thị _START_ đến _END_ của _TOTAL_ bản ghi",
            "lengthMenu":     "Hiển thị _MENU_ bản ghi",
            "search":         "Tìm kiếm:",
            "paginate": {
                "first":      "Trang đầu",
                "last":       "Trang cuối",
                "next":       "Tiếp",
                "previous":   "Trở về"
            },"infoEmpty":      "",
            "infoFiltered":   "",
            "zeroRecords":    "Không tìm thấy sản phẩm nào"
                }
    });
});
$(document).ready(function(){
    $("a.remove").on('click', function (e) {
        e.preventDefault();

        var r = confirm("Bạn có chắc chắn muốn xóa sản phẩm này không ?");
        if (r == true) {
            var target = $(this).attr('href');
            console.log(target);
            window.location.href = target;
        } else {

        }
    });
});

</script>
<script>
$(document).ready(function() {
var table = $('#example').dataTable();

// Remove accented character from search input as well
$('#example').keyup( function () {
table
.search(
jQuery.fn.DataTable.ext.type.search.string( this.value )
)
.draw()
} );
} );
</script>
<script>
    (function(){

        function removeAccents ( data ) {
            return data
                .replace( /έ/g, 'ε' )
                .replace( /[ύϋΰ]/g, 'υ' )
                .replace( /ό/g, 'ο' )
                .replace( /ώ/g, 'ω' )
                .replace( /ά/g, 'α' )
                .replace( /[ίϊΐ]/g, 'ι' )
                .replace( /ή/g, 'η' )
                .replace( /\n/g, ' ' )
                .replace( /á/g, 'a' )
                .replace( /é/g, 'e' )
                .replace( /í/g, 'i' )
                .replace( /ó/g, 'o' )
                .replace( /ú/g, 'u' )
                .replace( /ê/g, 'e' )
                .replace( /î/g, 'i' )
                .replace( /ô/g, 'o' )
                .replace( /è/g, 'e' )
                .replace( /ï/g, 'i' )
                .replace( /ü/g, 'u' )
                .replace( /ã/g, 'a' )
                .replace( /õ/g, 'o' )
                .replace( /ç/g, 'c' )
                .replace( /ì/g, 'i' );
        }

        var searchType = jQuery.fn.DataTable.ext.type.search;

        searchType.string = function ( data ) {
            return ! data ?
                '' :
                typeof data === 'string' ?
                    removeAccents( data ) :
                    data;
        };

        searchType.html = function ( data ) {
            return ! data ?
                '' :
                typeof data === 'string' ?
                    removeAccents( data.replace( /<.*?>/g, '' ) ) :
                    data;
        };

    }());
    $(document).ready(function() {
        $('#example').dataTable({
            var table = $('#example').dataTable();

        // Remove accented character from search input as well
        $('#example').keyup( function () {
            table
                .search(
                    jQuery.fn.DataTable.ext.type.search.string( this.value )
                )
                .draw()
        } );
    } );
    } );
    $(document).ready(function() {
       );
</script>