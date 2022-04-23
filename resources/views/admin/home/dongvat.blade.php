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


<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Quản Lý Động Vật</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Quản Lý</a></li>
                            <li class="active">Động Vật</li>
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
                        <strong class="card-title">Danh Sách Động Vật</strong>
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#thempb"
                            style="margin-left:80%;">Thêm Động Vật</button>
                    </div>
                    <form method="post"  action="{{URL::to('tim-kiem-phan-bo')}}" class="form-horizontal">
                        <div class="row form-group">
                            <div class="col col-md-12">
                                <div class="input-group">

                                    {{ csrf_field() }}
                                    <input type="text" id="input1-group2" name="timbo"
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
                        <table class="table " id="phanbo">
                            <thead>
                                <tr>
                                    <th class="serial">#</th>
                                    <th>Mã ĐV</th>
                                    <th>Tên ĐV</th>
                                    <th>Tên Khoa Học</th>
                                    <th>Tên Tiếng Việt</th>
                                    <th>Tên Địa Phương</th>
                                    <th>Hình Ảnh</th>
                                    <th>Video</th>
                                    <th>Chi Tiết</th>
                                    <th>Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; ?>

                            </tbody>
                        </table>
                    </div> <!-- /.table-stats -->
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(() => {
    $('#quan-ly-dong-vat').addClass('active');

});
</script>
@endsection