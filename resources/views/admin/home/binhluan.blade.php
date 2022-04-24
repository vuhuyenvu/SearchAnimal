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
                        <h1>Quản Lý Bình Luận</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Quản Lý</a></li>
                            <li class="active">Bình Luận</li>
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
                        <strong class="card-title">Danh Sách Bình Luận Bị Báo Cáo</strong>
                    </div>
                    <div class="table-stats order-table ov-h">
                        <table class="table " id="bo">
                            <thead>
                                <tr>
                                    <th class="serial">#</th>
                                    <th>Người Bình Luận</th>
                                    <th>Nội Dung Bình Luận</th>
                                    <th>Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; ?>
                                @foreach($ds_bl as $key)
                                    <tr>
                                        <td>{{$key->bl_id}}</td>
                                        <td>{{$key->user_hoten}}</td>
                                        <td>{{$key->bl_noidung}}</td>
                                        <td><a href="{{URL::to('/xoa-binh-luan/'.$key->bl_id)}}" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có muốn xóa bình luận này?');">Xóa</a></td>
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
    $('#binh-luan').addClass('active');
});
</script>
@endsection