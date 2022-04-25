@extends('admin.template.master')

@section('content')

<?php 
    $message = Session::get('message');
    $fail = Session::get('fail');
    if($message){
        ?>
<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
    <span class="badge badge-pill badge-success">Success</span>
    {{$message}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php
    }
    else if($fail){
        ?>
<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
    <span class="badge badge-pill badge-danger">Success</span>
    You successfully read this important alert.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php
    }
    Session::put('message',null);
    Session::put('fail',null);
?>


<!-- Modal Them Bo -->
<div class="modal fade" id="thembttvn" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="smallmodalLabel">Thêm Bộ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{URL::to('/them-bao-ton-theo-vn')}}" class="">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="card-body card-block">

                        <div class="form-group">
                            <label for="nf-email" class=" form-control-label">Mã Bảo Tồn</label>
                            <input type="text" id="nf-email" name="bt_ma" placeholder="Enter Email.."
                                class="form-control" value="{{$ma_bttvn_moi}}" readonly>
                        </div>
                        <div class="form-group"><label for="nf-password" class=" form-control-label">Tên Bảo Tồn</label>
                            <input type="text" id="nf-password" name="bt_ten" placeholder="Nhập tên bảo tồn"
                                class="form-control">
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Sửa Bo -->
<div class="modal fade" id="suabt" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="smallmodalLabel">Sửa Bảo Tồn</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{URL::to('/sua-bao-ton-theo-vn')}}" class="">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="card-body card-block">

                        <div class="form-group">
                            <label for="sua_bt_ma" class=" form-control-label">Mã bảo tồn</label>
                            <input type="text" id="sua_bt_ma" name="bt_ma" placeholder="Enter Email.."
                                class="form-control" value="" readonly>
                        </div>
                        <div class="form-group"><label for="sua_bt_ten" class=" form-control-label">Tên bảo tồn</label>
                            <input type="text" id="sua_bt_ten" name="bt_ten" placeholder="Nhập tên bộ"
                                class="form-control">
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Xóa Bo -->
<div class="modal fade" id="xoabt" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="smallmodalLabel">Xóa Bộ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{URL::to('/xoa-bao-ton-theo-vn')}}" class="">
                {{ csrf_field() }}
                <div class="modal-body">
                    Bạn có chắc chắn xóa Bảo Tồn này ?
                    <input type="hidden" id="xoa_bt_ma" name="bt_ma" placeholder="Enter Email.." class="form-control"
                        value="" readonly>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-primary">Xóa</button>
                </div>
            </form>
        </div>
    </div>
</div>



<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Bảo Tồn Theo Việt Nam</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Quản Lý</a></li>
                            <li class="active">Bảo Tồn Theo Việt Nam</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="animated fadeIn">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Bảo Tồn Theo Việt Nam</strong>
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#thembttvn"
                            style="margin-left:80%;">Thêm Bảo Tồn Mới</button>
                    </div>
                    <form method="post"  action="{{URL::to('tim-kiem-bao-ton-theo-vn')}}" class="form-horizontal">
                        <div class="row form-group">
                            <div class="col col-md-12">
                                <div class="input-group">

                                    {{ csrf_field() }}
                                    <input type="text" id="input1-group2" name="tim_bt"
                                        placeholder="Nhập từ khóa cần tìm" class="form-control">
                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-search"></i> Tìm
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="table-stats order-table ov-h">
                        <table class="table " id="baotontheovn">
                            <thead>
                                <tr>
                                    <th class="serial">#</th>
                                    <th>Mã Bảo Tồn</th>
                                    <th>Tên Bảo Tồn</th>
                                    <th>Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; ?>
                                @foreach($ds_bttvn as $bt)
                                <tr>
                                    <td class="serial"><?php echo $i++; ?>.</td>
                                    <td> {{$bt->bt_ma}} </td>
                                    <td>{{$bt->bt_ten}}</td>
                                    <td><a href="" class="btn btn-primary btn-sm" data-toggle="modal"
                                            data-target="#suabt" onclick="sua_baotontheovn()">Sửa</a> <a href=""
                                            class="btn btn-danger btn-sm" data-toggle="modal" data-target="#xoabt"
                                            onclick="xoa_baotontheovn()">Xóa</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> <!-- /.table-stats -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('javascript')
<script type="text/javascript">
$(document).ready(() => {
    $('#bao-ton-theo-vn').addClass('active');
});
function sua_baotontheovn() {
    var Index, table = document.getElementById('baotontheovn');
    for (var i = 1; i < table.rows.length; i++) {
        table.rows[i].onclick = function() {
            Index = this.rowIndex;
            document.getElementById('sua_bt_ma').value = this.cells[1].innerHTML;
            document.getElementById('sua_bt_ten').value = this.cells[2].innerHTML;
        }
    }
}

function xoa_baotontheovn() {
    var Index, table = document.getElementById('baotontheovn');
    for (var i = 1; i < table.rows.length; i++) {
        table.rows[i].onclick = function() {
            Index = this.rowIndex;
            document.getElementById('xoa_bt_ma').value = this.cells[1].innerHTML;
        }
    }
}
</script>
@endsection