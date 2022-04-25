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

<!-- Modal THem DV -->
<div class="modal fade" id="themdv" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true"
    style="width: 40%;margin: 0 auto;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Thêm Động Vật</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="nf-email" class=" form-control-label">Mã động vật</label>
                    <input type="text" id="them_dv_ma" value="{{$ma_dv_moi_nhat}}"
                        placeholder="Enter Email.." class="form-control" readonly>
                </div>
                <div class="form-group"><label for="nf-password" class=" form-control-label">Tên khoa học</label>
                    <input type="text" id="them_dv_tenkhoahoc" placeholder="Nhập tên khoa học"
                        class="form-control">
                </div>
                <div class="form-group"><label for="nf-password" class=" form-control-label">Tên tiếng việt</label>
                    <input type="text" id="them_dv_tentiengviet" placeholder="Nhập tên tiếng việt"
                        class="form-control">
                </div>
                <div class="form-group"><label for="nf-password" class=" form-control-label">Tên địa phương</label>
                    <input type="text" id="them_dv_tendiaphuong" placeholder="Nhập tên địa phương"
                        class="form-control">
                </div>
                <div class="form-group"><label for="nf-password" class=" form-control-label">Đặc điểm hình thái</label>
                    <input type="text" id="them_dv_dacdiemhinhthai" placeholder="Nhập Đặc điểm hình thái"
                        class="form-control">
                </div>
                <div class="form-group"><label for="nf-password" class=" form-control-label">Đặc điểm sinh thái</label>
                    <input type="text" id="them_dv_dacdiemsinhthai" placeholder="Nhập Đặc điểm sinh thái"
                        class="form-control">
                </div>
                <div class="form-group"><label for="nf-password" class=" form-control-label">Giá trị sử dụng</label>
                    <input type="text"  id="them_dv_giatrisudung" placeholder="Nhập Giá trị sử dụng"
                        class="form-control">
                </div>
                <div class="form-group"><label for="nf-password" class=" form-control-label">Ngày thu mẫu</label>
                    <input type="date" id="them_dv_ngaythumau" 
                        class="form-control">
                </div>
                <div class="form-group"><label for="nf-password" class=" form-control-label">Người thu mẫu</label>
                    <select id="them_dv_nguoithumau" class="form-control color-dropdown">
                        <?php $i=1; ?>
                        @foreach($nguoithumau as $key)
                        @if($i==1)
                        <option value="{{$key->ad_ma}}" selected>{{$key->ad_ma}} - {{$key->ad_hoten}}</option>
                        <?php $i=2; ?>
                        @else
                        <option value="{{$key->ad_ma}}">{{$key->ad_ma}} - {{$key->ad_hoten}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group"><label for="nf-password" class=" form-control-label">Giới</label>
                    <select id="them_dv_gioi" class="form-control color-dropdown">
                        @foreach($gioi as $key)
                        @if($i==1)
                        <option value="{{$key->gioi_ma}}" selected>{{$key->gioi_ma}} - {{$key->gioi_ten}}</option>
                        <?php $i=2; ?>
                        @else
                        <option value="{{$key->gioi_ma}}">{{$key->gioi_ma}} - {{$key->gioi_ten}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group"><label for="nf-password" class=" form-control-label">Ngành</label>
                    <select id="them_dv_nganh" class="form-control color-dropdown">
                        @foreach($nganh as $key)
                        @if($i==1)
                        <option value="{{$key->nganh_ma}}" selected>{{$key->nganh_ma}} - {{$key->nganh_ten}}</option>
                        <?php $i=2; ?>
                        @else
                        <option value="{{$key->nganh_ma}}">{{$key->nganh_ma}} - {{$key->nganh_ten}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group"><label for="nf-password" class=" form-control-label">Lớp</label>
                    <select id="them_dv_lop" class="form-control color-dropdown">
                        @foreach($lop as $key)
                        @if($i==1)
                        <option value="{{$key->lop_ma}}" selected>{{$key->lop_ma}} - {{$key->lop_ten}}</option>
                        <?php $i=2; ?>
                        @else
                        <option value="{{$key->lop_ma}}">{{$key->lop_ma}} - {{$key->lop_ten}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group"><label for="nf-password" class=" form-control-label">Bộ</label>
                    <select id="them_dv_bo" class="form-control color-dropdown">
                        @foreach($bo as $key)
                        @if($i==1)
                        <option value="{{$key->bo_ma}}" selected>{{$key->bo_ma}} - {{$key->bo_ten}}</option>
                        <?php $i=2; ?>
                        @else
                        <option value="{{$key->bo_ma}}">{{$key->bo_ma}} - {{$key->bo_ten}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group"><label for="nf-password" class=" form-control-label">Họ</label>
                    <select id="them_dv_ho" name="them_sogiuong" class="form-control color-dropdown">
                        @foreach($ho as $key)
                        @if($i==1)
                        <option value="{{$key->ho_ma}}" selected>{{$key->ho_ma}} - {{$key->ho_ten}}</option>
                        <?php $i=2; ?>
                        @else
                        <option value="{{$key->ho_ma}}">{{$key->ho_ma}} - {{$key->ho_ten}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group"><label for="nf-password" class=" form-control-label">Bảo Tồn Theo UICN</label>
                    <select id="them_dv_baotontheouicn" class="form-control color-dropdown">
                        @foreach($baotontheouicn as $key)
                        @if($i==1)
                        <option value="{{$key->bt_ma}}" selected>{{$key->bt_ma}} - {{$key->bt_ten}}</option>
                        <?php $i=2; ?>
                        @else
                        <option value="{{$key->bt_ma}}">{{$key->bt_ma}} - {{$key->bt_ten}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group"><label for="nf-password" class=" form-control-label">Bảo Tồn Theo Việt
                        Nam</label>
                    <select id="them_dv_baotontheovn" class="form-control color-dropdown">
                        @foreach($baotontheovn as $key)
                        @if($i==1)
                        <option value="{{$key->bt_ma}}" selected>{{$key->bt_ma}} - {{$key->bt_ten}}</option>
                        <?php $i=2; ?>
                        @else
                        <option value="{{$key->bt_ma}}">{{$key->bt_ma}} - {{$key->bt_ten}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group"><label for="nf-password" class=" form-control-label">Bảo Tồn Theo Nghị
                        Định</label>
                    <select id="them_dv_baotontheonghidinh" class="form-control color-dropdown">
                        @foreach($baotontheonghidinh as $key)
                        @if($i==1)
                        <option value="{{$key->bt_ma}}" selected>{{$key->bt_ma}} - {{$key->bt_ten}}</option>
                        <?php $i=2; ?>
                        @else
                        <option value="{{$key->bt_ma}}">{{$key->bt_ma}} - {{$key->bt_ten}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group"><label for="nf-password" class=" form-control-label">Bảo Tồn Theo CITES</label>
                    <select id="them_dv_baotontheocites" class="form-control color-dropdown">
                        @foreach($baotontheocites as $key)
                        @if($i==1)
                        <option value="{{$key->bt_ma}}" selected>{{$key->bt_ma}} - {{$key->bt_ten}}</option>
                        <?php $i=2; ?>
                        @else
                        <option value="{{$key->bt_ma}}">{{$key->bt_ma}} - {{$key->bt_ten}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group"><label for="nf-password" class=" form-control-label">Phân Bố</label>
                    <select id="them_dv_phanbo" class="form-control color-dropdown">
                        @foreach($phanbo as $key)
                        @if($i==1)
                        <option value="{{$key->pb_ma}}" selected>{{$key->pb_ma}} - {{$key->pb_ten}}</option>
                        <?php $i=2; ?>
                        @else
                        <option value="{{$key->pb_ma}}">{{$key->pb_ma}} - {{$key->pb_ten}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group"><label for="nf-password" class=" form-control-label">Tình Trạng Mẫu Vật</label>
                    <select id="them_dv_ttmv" class="form-control color-dropdown">
                        @foreach($tinhtrangmauvat as $key)
                        @if($i==1)
                        <option value="{{$key->ttmv_ma}}" selected>{{$key->ttmv_ma}} - {{$key->ttmv_ten}}</option>
                        <?php $i=2; ?>
                        @else
                        <option value="{{$key->ttmv_ma}}">{{$key->ttmv_ma}} - {{$key->ttmv_ten}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                <button type="button" data-dismiss="modal" id="them_dv_moi" class="btn btn-primary">Thêm</button>
            </div>
        </div>
    </div>
</div>

<!-- Sua DV -->
<div class="modal fade" id="sua" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true"
    style="width: 40%;margin: 0 auto;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Sửa Động Vật</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="nf-email" class=" form-control-label">Mã động vật</label>
                    <input type="text" id="sua_dv_ma"
                        placeholder="Enter Email.." class="form-control" readonly>
                </div>
                <div class="form-group"><label for="nf-password" class=" form-control-label">Tên khoa học</label>
                    <input type="text" id="sua_dv_tenkhoahoc" placeholder="Nhập tên khoa học"
                        class="form-control">
                </div>
                <div class="form-group"><label for="nf-password" class=" form-control-label">Tên tiếng việt</label>
                    <input type="text" id="sua_dv_tentiengviet" placeholder="Nhập tên tiếng việt"
                        class="form-control">
                </div>
                <div class="form-group"><label for="nf-password" class=" form-control-label">Tên địa phương</label>
                    <input type="text" id="sua_dv_tendiaphuong" placeholder="Nhập tên địa phương"
                        class="form-control">
                </div>
                <div class="form-group"><label for="nf-password" class=" form-control-label">Đặc điểm hình thái</label>
                    <input type="text" id="sua_dv_dacdiemhinhthai" placeholder="Nhập Đặc điểm hình thái"
                        class="form-control">
                </div>
                <div class="form-group"><label for="nf-password" class=" form-control-label">Đặc điểm sinh thái</label>
                    <input type="text" id="sua_dv_dacdiemsinhthai" placeholder="Nhập Đặc điểm sinh thái"
                        class="form-control">
                </div>
                <div class="form-group"><label for="nf-password" class=" form-control-label">Giá trị sử dụng</label>
                    <input type="text"  id="sua_dv_giatrisudung" placeholder="Nhập Giá trị sử dụng"
                        class="form-control">
                </div>
                <div class="form-group"><label for="nf-password" class=" form-control-label">Ngày thu mẫu</label>
                    <input type="date" id="sua_dv_ngaythumau"
                        class="form-control">
                </div>
                <div class="form-group"><label for="nf-password" class=" form-control-label">Người thu mẫu</label>
                    <select id="sua_dv_nguoithumau" class="form-control color-dropdown">
                        <?php $i=1; ?>
                        @foreach($nguoithumau as $key)
                        <option value="{{$key->ad_ma}}">{{$key->ad_ma}} - {{$key->ad_hoten}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group"><label for="nf-password" class=" form-control-label">Giới</label>
                    <select id="sua_dv_gioi" class="form-control color-dropdown">
                        @foreach($gioi as $key)
                        <option value="{{$key->gioi_ma}}">{{$key->gioi_ma}} - {{$key->gioi_ten}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group"><label for="nf-password" class=" form-control-label">Ngành</label>
                    <select id="sua_dv_nganh" class="form-control color-dropdown">
                        @foreach($nganh as $key)
                        <option value="{{$key->nganh_ma}}">{{$key->nganh_ma}} - {{$key->nganh_ten}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group"><label for="nf-password" class=" form-control-label">Lớp</label>
                    <select id="sua_dv_lop" class="form-control color-dropdown">
                        @foreach($lop as $key)
                        <option value="{{$key->lop_ma}}">{{$key->lop_ma}} - {{$key->lop_ten}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group"><label for="nf-password" class=" form-control-label">Bộ</label>
                    <select id="sua_dv_bo" class="form-control color-dropdown">
                        @foreach($bo as $key)
                        <option value="{{$key->bo_ma}}">{{$key->bo_ma}} - {{$key->bo_ten}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group"><label for="nf-password" class=" form-control-label">Họ</label>
                    <select id="sua_dv_ho" name="them_sogiuong" class="form-control color-dropdown">
                        @foreach($ho as $key)
                        <option value="{{$key->ho_ma}}">{{$key->ho_ma}} - {{$key->ho_ten}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group"><label for="nf-password" class=" form-control-label">Bảo Tồn Theo UICN</label>
                    <select id="sua_dv_baotontheouicn" class="form-control color-dropdown">
                        @foreach($baotontheouicn as $key)
                        <option value="{{$key->bt_ma}}">{{$key->bt_ma}} - {{$key->bt_ten}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group"><label for="nf-password" class=" form-control-label">Bảo Tồn Theo Việt
                        Nam</label>
                    <select id="sua_dv_baotontheovn" class="form-control color-dropdown">
                        @foreach($baotontheovn as $key)
                        <option value="{{$key->bt_ma}}">{{$key->bt_ma}} - {{$key->bt_ten}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group"><label for="nf-password" class=" form-control-label">Bảo Tồn Theo Nghị
                        Định</label>
                    <select id="sua_dv_baotontheonghidinh" class="form-control color-dropdown">
                        @foreach($baotontheonghidinh as $key)
                        <option value="{{$key->bt_ma}}">{{$key->bt_ma}} - {{$key->bt_ten}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group"><label for="nf-password" class=" form-control-label">Bảo Tồn Theo CITES</label>
                    <select id="sua_dv_baotontheocites" class="form-control color-dropdown">
                        @foreach($baotontheocites as $key)
                        <option value="{{$key->bt_ma}}">{{$key->bt_ma}} - {{$key->bt_ten}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group"><label for="nf-password" class=" form-control-label">Phân Bố</label>
                    <select id="sua_dv_phanbo" class="form-control color-dropdown">
                        @foreach($phanbo as $key)
                        <option value="{{$key->pb_ma}}">{{$key->pb_ma}} - {{$key->pb_ten}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group"><label for="nf-password" class=" form-control-label">Tình Trạng Mẫu Vật</label>
                    <select id="sua_dv_tinhtrangmauvat" class="form-control color-dropdown">
                        @foreach($tinhtrangmauvat as $key)
                        <option value="{{$key->ttmv_ma}}">{{$key->ttmv_ma}} - {{$key->ttmv_ten}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                <button type="button" data-dismiss="modal" id="sua_dv" class="btn btn-primary">Lưu</button>
            </div>
        </div>
    </div>
</div>

<!-- xoa DV-->
<div class="modal fade" id="modalxoadv" data-backdrop="" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true"
    style="width: 40%;margin: 0 auto;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Xóa Hình Ảnh</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" id="xoa_dv_ma1">
                    Bạn có chắc xóa động vật này ?
                </div>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div id="imagePreview"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button id="xoadv"
                    type="button" data-dismiss="modal" class="btn btn-success">Xóa</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal chi tiest dv -->
<div class="modal fade" id="chitietdv" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true"
    style="width: 40%;margin: 0 auto;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Chi Tiết</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table" id="tablechitiet">
                        
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>

<!-- modal xem hinh anh -->
<div class="modal fade" id="hinhanhdv" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true"
    style="width: 40%;margin: 0 auto;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Hình Ảnh</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="hinhanh_dv_ma">
                <table class="table" id="tablehinhanh">
                    
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button id="themhinhanh" data-toggle="modal"
                    data-target="#modalthemhinhanh" data-dismiss="modal" type="button" class="btn btn-success">Thêm Hình Ảnh</button>
            </div>
        </div>
    </div>
</div>

<!-- modal them hinh anh -->
<div class="modal fade" id="modalthemhinhanh" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true"
    style="width: 40%;margin: 0 auto;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Thêm Hình Ảnh</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" id="ma_dv">
                    <label for="file" class=" form-control-label">Chọn Ảnh</label>
                    <input type="file" id="file" onchange="return fileValidation()" class="form-control">
                </div>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div id="imagePreview"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button id="themanh"
                    type="button" data-dismiss="modal" class="btn btn-success">Thêm Hình Ảnh</button>
            </div>
        </div>
    </div>
</div>

<!-- xoa anh -->
<div class="modal fade" id="modalxoahinhanh" data-backdrop="" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true"
    style="width: 40%;margin: 0 auto;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Xóa Hình Ảnh</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" id="xoa_ha_ma">
                    Bạn có chắc xóa hình ảnh này ?
                </div>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div id="imagePreview"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button id="xoaanh"
                    type="button" data-dismiss="modal" class="btn btn-success">Xóa</button>
            </div>
        </div>
    </div>
</div>

<!-- Đọc code để biết đoạn này ;> -->
<div class="hidden"></div>

<!-- modal xem địa điểm -->
<div class="modal fade" id="diadiemdv" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true"
    style="width: 40%;margin: 0 auto;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Địa Điểm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="dd_dv_ma">
                <table class="table" id="tablediadiem">
                    
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button id="themhinhanh" data-toggle="modal"
                    data-target="#modalthemdiadiem" data-role="laydsdiadiem" data-dismiss="modal" type="button" class="btn btn-success">Thêm Địa Điểm</button>
            </div>
        </div>
    </div>
</div>

<!-- modal thêm dia diem -->
<div class="modal fade" id="modalthemdiadiem" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true"
    style="width: 40%;margin: 0 auto;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Thêm Địa Điểm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" id="them_dv_dd">
                    <label for="file" class=" form-control-label">Chọn Địa Điểm</label>
                    <div id="select-dd"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button id="themddmoi"
                    type="button" data-dismiss="modal" class="btn btn-success">Thêm</button>
            </div>
        </div>
    </div>
</div>

<!-- xoa dd -->
<div class="modal fade" id="modalxoadiadiem" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true"
    style="width: 40%;margin: 0 auto;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Xóa Địa Điểm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" id="xoa_dv_ma">
                    <input type="hidden" id="xoa_dd_ma">
                    Bạn có chắc xóa địa điểm này ?
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button id="xoadd"
                    type="button" data-dismiss="modal" class="btn btn-success">Xóa</button>
            </div>
        </div>
    </div>
</div>

<!-- modal xem sinh cảnh -->
<div class="modal fade" id="sinhcanh" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true"
    style="width: 40%;margin: 0 auto;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Sinh Cảnh</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="sc_dv_ma">
                <table class="table" id="tablesinhcanh">
                    
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button id="themhinhanh" data-toggle="modal"
                    data-target="#modalthemsinhcanh" data-role="laydssinhcanh" data-dismiss="modal" type="button" class="btn btn-success">Thêm Sinh Cảnh</button>
            </div>
        </div>
    </div>
</div>

<!-- modal thêm sinh canh -->
<div class="modal fade" id="modalthemsinhcanh" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true"
    style="width: 40%;margin: 0 auto;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Thêm Sinh Cảnh</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" id="them_dv_sc">
                    <label for="file" class=" form-control-label">Chọn Sinh Cảnh</label>
                    <div id="select-sc"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button id="themscmoi"
                    type="button" data-dismiss="modal" class="btn btn-success">Thêm</button>
            </div>
        </div>
    </div>
</div>

<!-- xoa sc -->
<div class="modal fade" id="modalxoasinhcanh" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true"
    style="width: 40%;margin: 0 auto;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Xóa Sinh Cảnh</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" id="xoasc_dv_ma">
                    <input type="hidden" id="xoa_sc_ma">
                    Bạn có chắc xóa sinh cảnh này ?
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button id="xoasc"
                    type="button" data-dismiss="modal" class="btn btn-success">Xóa</button>
            </div>
        </div>
    </div>
</div>

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
                        <button type="button" id="them-dv" class="btn btn-success btn-sm" data-toggle="modal"
                            data-target="#themdv" style="margin-left:80%;">Thêm Động Vật</button>
                    </div>
                    <div class="table-stats order-table ov-h">
                        <table class="table " id="dongvat">
                            <thead>
                                <tr>
                                    <th>Mã ĐV</th>
                                    <th>Tên Khoa Học</th>
                                    <th>Tên Tiếng Việt</th>
                                    <th>Tên Địa Phương</th>
                                    <th>Địa Điểm</th>
                                    <th>Sinh Cảnh</th>
                                    <th>Hình Ảnh</th>
                                    <th>Chi Tiết</th>
                                    <th>Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>

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

function fileValidation() {
    var fileInput = document.getElementById('file');
    var filePath = fileInput.value; //lấy giá trị input theo id
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i; //các tập tin cho phép
    //Kiểm tra định dạng
    if (!allowedExtensions.exec(filePath)) {
        alert('Vui lòng upload các file có định dạng: .jpeg/.jpg/.png/.gif only.');
        fileInput.value = '';
        document.getElementById('imagePreview').innerHTML = '';
        return false;
    } else {
        //Image preview
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').innerHTML = '<img style="width:300px;height:200px;" src="' +
                    e.target.result + '"/>';
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
}
$(document).ready(() => {
    $('#quan-ly-dong-vat').addClass('active');
});

//Data table
$(function() {
    $('#dongvat').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ url('dong-vat/lay-danh-sach-dv') }}"
        },
        columns: [{
                "data": "dv_ma",
                name: 'dv_ma'
            },
            {
                "data": "dv_tenkhoahoc",
                name: 'dv_tenkhoahoc'
            },
            {
                "data": "dv_tentiengviet",
                name: 'dv_tentiengviet'
            },
            {
                "data": "dv_tendiaphuong",
                name: 'dv_tendiaphuong'
            },
            {
                "data": "dongvatdiadiem",
                name: 'dongvatdiadiem'
            },
            {
                "data": "dongvatsinhcanh",
                name: 'dongvatsinhcanh'
            },
            {
                "data": "hinhanh",
                name: 'hinhanh'
            },
            {
                "data": "chitiet",
                name: 'chitiet'
            },
            {
                "data": "action",
                name: 'action'
            }
        ]
    });
});

//Thêm Động Vật
$('#them_dv_moi').on('click', () => {
    var dv_ma = $('#them_dv_ma').val();
    var dv_tenkhoahoc = $('#them_dv_tenkhoahoc').val();
    var dv_tentiengviet = $('#them_dv_tentiengviet').val();
    var dv_tendiaphuong = $('#them_dv_tendiaphuong').val();
    var dv_gioi = $('#them_dv_gioi').val();
    var dv_nganh = $('#them_dv_nganh').val();
    var dv_lop = $('#them_dv_lop').val();
    var dv_ho = $('#them_dv_ho').val();
    var dv_bo = $('#them_dv_bo').val();
    var dv_dacdiemhinhthai = $('#them_dv_dacdiemhinhthai').val();
    var dv_dacdiemsinhthai = $('#them_dv_dacdiemsinhthai').val();
    var dv_giatrisudung = $('#them_dv_giatrisudung').val();
    var dv_baotontheouicn = $('#them_dv_baotontheouicn').val();
    var dv_baotontheovn = $('#them_dv_baotontheovn').val();
    var dv_baotontheonghidinh = $('#them_dv_baotontheonghidinh').val();
    var dv_baotontheocites = $('#them_dv_baotontheocites').val();
    var dv_phanbo = $('#them_dv_phanbo').val();
    var dv_tinhtrangmauvat = $('#them_dv_ttmv').val();
    var dv_ngaythumau = $('#them_dv_ngaythumau').val();
    var dv_nguoithumau = $('#them_dv_nguoithumau').val();
    var _token = $('input[name="_token"]').val();
    $.ajax({
        url: "{{url('/dong-vat/them-dong-vat')}}",
        method: 'POST',
        data: {
            dv_ma: dv_ma,
            dv_tenkhoahoc: dv_tenkhoahoc,
            dv_tentiengviet: dv_tentiengviet,
            dv_tendiaphuong: dv_tendiaphuong,
            dv_gioi: dv_gioi,
            dv_nganh: dv_nganh,
            dv_lop: dv_lop,
            dv_ho: dv_ho,
            dv_bo: dv_bo,
            dv_dacdiemhinhthai: dv_dacdiemhinhthai,
            dv_dacdiemsinhthai: dv_dacdiemsinhthai,
            dv_giatrisudung: dv_giatrisudung,
            dv_baotontheouicn: dv_baotontheouicn,
            dv_baotontheovn: dv_baotontheovn,
            dv_baotontheonghidinh: dv_baotontheonghidinh,
            dv_baotontheocites: dv_baotontheocites,
            dv_tinhtrangmauvat: dv_tinhtrangmauvat,
            dv_ngaythumau: dv_ngaythumau,
            dv_nguoithumau: dv_nguoithumau,
            dv_phanbo: dv_phanbo,
            _token: "{{csrf_token()}}"
        },
        success: function(response) {
            $('.modal').modal('hide');
            $('body').removeClass('modal-backdrop fade show');
            $('.modal-backdrop').remove();
            if (response == 'success') {
                alert('Thêm động vật thành công');
                mytable = $('#dongvat').DataTable();
                mytable.draw();
                $('#them_dv_tenkhoahoc').val('');
                $('#them_dv_tentiengviet').val('');
                $('#them_dv_tendiaphuong').val('');
                $('#them_dv_gioi').val('1');
                $('#them_dv_nganh').val('1');
                $('#them_dv_lop').val('1');
                $('#them_dv_ho').val('1');
                $('#them_dv_bo').val('1');
                $('#them_dv_dacdiemhinhthai').val('');
                $('#them_dv_dacdiemsinhthai').val('');
                $('#them_dv_giatrisudung').val('1');
                $('#them_dv_baotontheouicn').val('1');
                $('#them_dv_baotontheovn').val('1');
                $('#them_dv_baotontheonghidinh').val('1');
                $('#them_dv_baotontheocites').val('1');
                $('#them_dv_tinhtrangmauvat').val('1');
                $('#them_dv_ngaythumau').val('');
                $('#them_dv_nguoithumau').val('1');
                
            }
            else{
                alert('Thêm động vật thất bại');
            }
        }
    });
});

//Xem Chi Tiết
$(document).on('click', 'button[data-role=chitietdv]', (e) => {
        let id = e.target.getAttribute("chitietdv");
        console.log(id);
        $.ajax({
            url: "{{url('/dong-vat/xem-chi-tiet')}}",
            method: 'POST',
            data: {
                dv_ma: id,
                _token: "{{csrf_token()}}"
            },
            success: function(response) {
                $('#tablechitiet').html(response);
            }
        });
    });
//Xem Ảnh
$(document).on('click', 'button[data-role=hinhanhdv]', (e) => {
    let id = e.target.getAttribute("hinhanhdv");
    $('#hinhanh_dv_ma').val(id);
    console.log(id);
    $.ajax({
        url: "{{url('/dong-vat/xem-hinh-anh-dv')}}",
        method: 'POST',
        data: {
            dv_ma: id,
            _token: "{{csrf_token()}}"
        },
        success: function(response) {
            $('#tablehinhanh').html(response);
        }
    });
});

//Gọi Modal thêm ảnh và gán mã đv
$('#themhinhanh').on('click', () => {
    let dv_ma = $('#hinhanh_dv_ma').val();
    console.log(dv_ma);
    $('#ma_dv').val(dv_ma);
    
});

//thực hiện thêm ảnh
$('#themanh').on('click', () => {
    let formData = new FormData();
    let dv_ma = $('#ma_dv').val();
    let ha_link = $('#file')[0].files;
    formData.append('ha_link', ha_link[0]);
    formData.append('dv_ma', dv_ma);
    formData.append('_token', "{{csrf_token()}}");
    console.log(ha_link);
    $.ajax({
        url: "{{url('/dong-vat/them-hinh-anh-moi')}}",
        method: 'POST',
        cache: false,
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            if (response == 'success') {
                document.getElementById('imagePreview').innerHTML = '';
                $('#ma_dv').val('');
                $('#file').val('');
                alert('Thêm hình ảnh thành công!');
            }
        }
    });
});

//Gửi id ảnh lên modal xác nhận Xóa
$(document).on('click', 'button[data-role=xoahinhanh]', (e) => {
    let id = e.target.getAttribute("xoahinhanh");
    $('#xoa_ha_ma').val(id);
});

//xóa ảnh
$('#xoaanh').on('click', () => {
    let ha_ma = $('#xoa_ha_ma').val();
    $.ajax({
        url: "{{url('/dong-vat/xoa-hinh-anh')}}",
        method: 'POST',
        data: {
            ha_ma: ha_ma,
            _token: "{{csrf_token()}}"
        },
        success: function(response) {
            if(response == "success"){
                alert('Xóa hình ảnh thành công!');
            }            
        }
    });
});


//Lấy dữ liệu đưa lên modal sửa động vật
$(document).on('click', 'button[data-role=sua]', (e) => {
    e.preventDefault();
    let id = e.target.getAttribute("dv_ma");
    $.ajax({
        url: "{{url('/dong-vat/lay-cac-field-len-modal')}}",
        method: 'POST',
        data: {
            dv_ma: id,
            _token: "{{csrf_token()}}"
        },
        success: function(response) {
            $('.hidden').html(response);
            $('#sua_dv_ma').val(document.getElementById('sua_dv_ma1').value);
            $('#sua_dv_tenkhoahoc').val(document.getElementById('sua_dv_tenkhoahoc1').value);
            $('#sua_dv_tentiengviet').val(document.getElementById('sua_dv_tentiengviet1').value);
            $('#sua_dv_tendiaphuong').val(document.getElementById('sua_dv_tendiaphuong1').value);
            $('#sua_dv_gioi').val(document.getElementById('sua_dv_gioi1').value);
            $('#sua_dv_nganh').val(document.getElementById('sua_dv_nganh1').value);
            $('#sua_dv_lop').val(document.getElementById('sua_dv_lop1').value);
            $('#sua_dv_bo').val(document.getElementById('sua_dv_bo1').value);
            $('#sua_dv_ho').val(document.getElementById('sua_dv_ho1').value);
            $('#sua_dv_dacdiemhinhthai').val(document.getElementById('sua_dv_dacdiemhinhthai1').value);
            $('#sua_dv_dacdiemsinhthai').val(document.getElementById('sua_dv_dacdiemsinhthai1').value);
            $('#sua_dv_giatrisudung').val(document.getElementById('sua_dv_giatrisudung1').value);
            $('#sua_dv_baotontheouicn').val(document.getElementById('sua_dv_baotontheoUICN1').value);
            $('#sua_dv_baotontheovn').val(document.getElementById('sua_dv_baotontheoVN1').value);
            $('#sua_dv_baotontheonghidinh').val(document.getElementById('sua_dv_baotontheoNGHIDINH1').value);
            $('#sua_dv_baotontheocites').val(document.getElementById('sua_dv_baotontheoCITES1').value);
            $('#sua_dv_phanbo').val(document.getElementById('sua_dv_phanbo1').value);
            $('#sua_dv_tinhtrangmauvat').val(document.getElementById('sua_dv_tinhtrangmauvat1').value);
            $('#sua_dv_ngaythumau').val(document.getElementById('sua_dv_ngaythumau1').value);
            $('#sua_dv_nguoithumau').val(document.getElementById('sua_dv_nguoithumau1').value);

        }
    })
});

//Sửa Động Vật

$('#sua_dv').on('click', (e) => {
    console.log($('#sua_dv_ma').val());
    $.ajax({
        url: "{{url('/dong-vat/sua-dong-vat')}}",
        method: 'POST',
        data: {
            dv_ma: $('#sua_dv_ma').val(),
            dv_tenkhoahoc:  $('#sua_dv_tenkhoahoc').val(),
            dv_tentiengviet:  $('#sua_dv_tentiengviet').val(),
            dv_tendiaphuong:  $('#sua_dv_tendiaphuong').val(),
            dv_gioi:  $('#sua_dv_gioi').val(),
            dv_nganh:  $('#sua_dv_nganh').val(),
            dv_lop:  $('#sua_dv_lop').val(),
            dv_ho:  $('#sua_dv_ho').val(),
            dv_bo:  $('#sua_dv_bo').val(),
            dv_dacdiemhinhthai:  $('#sua_dv_dacdiemhinhthai').val(),
            dv_dacdiemsinhthai:  $('#sua_dv_dacdiemsinhthai').val(),
            dv_giatrisudung:  $('#sua_dv_giatrisudung').val(),
            dv_baotontheouicn:  $('#sua_dv_baotontheouicn').val(),
            dv_baotontheovn:  $('#sua_dv_baotontheovn').val(),
            dv_baotontheonghidinh:  $('#sua_dv_baotontheonghidinh').val(),
            dv_baotontheocites:  $('#sua_dv_baotontheocites').val(),
            dv_tinhtrangmauvat:  $('#sua_dv_tinhtrangmauvat').val(),
            dv_ngaythumau:  $('#sua_dv_ngaythumau').val(),
            dv_nguoithumau:  $('#sua_dv_nguoithumau').val(),
            dv_phanbo:  $('#sua_dv_phanbo').val(),
            _token: "{{csrf_token()}}"
        },
        success: function(response) {
            $('#sualoaiphong').modal('toggle');
            if (response == 'success') {
                $('#dongvat').DataTable().ajax.reload();
                alert('Cập nhật thành công');
            }
            else{
                alert('Lỗi dữ liệu, mời bạn kiểm tra lại');
            }
        }
    });
});


//Xem Địa Điểm
$(document).on('click', 'button[data-role=diadiem]', (e) => {
    let id = e.target.getAttribute("diadiem");
    console.log(id);
    $('#dd_dv_ma').val(id);
    $.ajax({
        url: "{{url('/dong-vat/xem-dia-diem')}}",
        method: 'POST',
        data: {
            dv_ma: id,
            _token: "{{csrf_token()}}"
        },
        success: function(response) {
            $('#tablediadiem').html(response);
        }
    });
});

//lấy danh sách địa điểm 
$(document).on('click', 'button[data-role=laydsdiadiem]', (e) => {
    let dv_ma = $('#dd_dv_ma').val();
    $('#them_dv_dd').val(dv_ma);
    $.ajax({
        url: "{{url('/dong-vat/lay-ds-diadiem')}}",
        method: 'POST',
        data: {
            dv_ma: dv_ma,
            _token: "{{csrf_token()}}"
        },
        success: function(response) {
            $('#select-dd').html(response);
        }
    });
});

//Thêm địa điểm
$('#themddmoi').on('click', (e) => {
    let dv_ma = $('#them_dv_dd').val();
    let dd_ma = $('#them_diadiem').val();
    console.log(dv_ma);
    console.log(dd_ma);
    $.ajax({
        url: "{{url('/dong-vat/them-dia-diem')}}",
        method: 'POST',
        data: {
            dv_ma: dv_ma,
            dd_ma: dd_ma,
            _token: "{{csrf_token()}}"
        },
        success: function(response) {
            if(response == 'success'){
                alert('Thêm địa điểm cho động vật này thành công.');
            }
            else{
                alert('Lỗi dữ liệu!');
            }
        }
    });
});

//Đưa dữ liệu lên modal xóa
$(document).on('click', 'button[data-role=modalxoadiadiem]', (e) => {
    let dd_ma = e.target.getAttribute("modalxoadiadiem");
    let dv_ma = $('#dd_dv_ma').val();
    $('#xoa_dd_ma').val(dd_ma);
    $('#xoa_dv_ma').val(dv_ma);
});

//Xóa Địa điểm
$('#xoadd').on('click', (e) => {

    $.ajax({
        url: "{{url('/dong-vat/xoa-dia-diem')}}",
        method: 'POST',
        data: {
            dv_ma: $('#xoa_dv_ma').val(),
            dd_ma: $('#xoa_dd_ma').val(),
            _token: "{{csrf_token()}}"
        },
        success: function(response) {
            if(response == 'success'){
                alert('Xóa địa điểm thành công.');
            }
            else{
                alert('Lỗi dữ liệu!');
            }
        }
    });
});

//Xem Sinh Cảnh
$(document).on('click', 'button[data-role=sinhcanh]', (e) => {
    let id = e.target.getAttribute("sinhcanh");
    console.log(id);
    $('#sc_dv_ma').val(id);
    $.ajax({
        url: "{{url('/dong-vat/xem-sinh-canh')}}",
        method: 'POST',
        data: {
            dv_ma: id,
            _token: "{{csrf_token()}}"
        },
        success: function(response) {
            $('#tablesinhcanh').html(response);
        }
    });
});

//lấy danh sách sinh cảnh
$(document).on('click', 'button[data-role=laydssinhcanh]', (e) => {
    let dv_ma = $('#sc_dv_ma').val();
    $('#them_dv_sc').val(dv_ma);
    $.ajax({
        url: "{{url('/dong-vat/lay-ds-sinhcanh')}}",
        method: 'POST',
        data: {
            dv_ma: dv_ma,
            _token: "{{csrf_token()}}"
        },
        success: function(response) {
            $('#select-sc').html(response);
        }
    });
});

//Thêm sinhcanhr
$('#themscmoi').on('click', (e) => {
    let dv_ma = $('#them_dv_sc').val();
    let sc_ma = $('#them_sinhcanh').val();
    console.log(dv_ma);
    console.log(sc_ma);
    $.ajax({
        url: "{{url('/dong-vat/them-sinh-canh')}}",
        method: 'POST',
        data: {
            dv_ma: dv_ma,
            sc_ma: sc_ma,
            _token: "{{csrf_token()}}"
        },
        success: function(response) {
            if(response == 'success'){
                alert('Thêm sinh cảnh cho động vật này thành công.');
            }
            else{
                alert('Lỗi dữ liệu!');
            }
        }
    });
});

//Đưa dữ liệu lên modal xóa
$(document).on('click', 'button[data-role=modalxoasinhcanh]', (e) => {
    let sc_ma = e.target.getAttribute("modalxoasinhcanh");
    let dv_ma = $('#sc_dv_ma').val();
    $('#xoa_sc_ma').val(sc_ma);
    $('#xoasc_dv_ma').val(dv_ma);
});

//Xóa Địa điểm
$('#xoasc').on('click', (e) => {
    $.ajax({
        url: "{{url('/dong-vat/xoa-sinhcanh')}}",
        method: 'POST',
        data: {
            dv_ma: $('#xoasc_dv_ma').val(),
            sc_ma: $('#xoa_sc_ma').val(),
            _token: "{{csrf_token()}}"
        },
        success: function(response) {
            if(response == 'success'){
                alert('Xóa sinh cảnh thành công.');
            }
            else{
                alert('Lỗi dữ liệu!');
            }
        }
    });
});

//Gửi id lên modal Xóa
$(document).on('click', 'button[data-role=modalxoadv]', (e) => {
    let dv_ma = e.target.getAttribute("modalxoadv");
    $('#xoa_dv_ma1').val(dv_ma);
});

//Xóa động Vật
$('#xoadv').on('click', (e) => {
    $.ajax({
        url: "{{url('/dong-vat/xoa-dv')}}",
        method: 'POST',
        data: {
            dv_ma: $('#xoa_dv_ma1').val(),
            _token: "{{csrf_token()}}"
        },
        success: function(response) {
            if(response == 'success'){
                $('#dongvat').DataTable().ajax.reload();
                alert('Xóa động vật thành công.');
            }
            else{
                alert('Lỗi dữ liệu!');
            }
        }
    });
});


</script>
@endsection