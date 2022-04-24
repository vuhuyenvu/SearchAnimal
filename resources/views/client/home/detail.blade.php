@extends('client.template.master')

@section('banner')
 <!-- Breadcrumb Section Begin -->
 <section class="breadcrumb-section set-bg" data-setbg="{{asset('client-template/img/breadcrumb.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                       
                        <h2></h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html"></a>
                            <a href="./index.html">Vegetables</a>
                            <span>Vegetable’s Package</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->


@endsection
@section('content')
<style>
      .comment  {
        width: 70%;
        height: 160px;
        padding: 10px;
        background-color: #d0e2bc;
        margin:auto;
        margin-bottom:10px
      }
      .comment_list  {
        /* margin-top:50px; */
        width: 70%;
        height: 160px;
        padding: 10px;
        background-color: #d0e2bc;
        margin:auto;
      }
    </style>
<!-- Product Details Section Begin -->
<section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                src="{{asset('client-template/img/animal/vang-anh-cac-loai-chim.jpg')}}" alt="">
                        </div>
                        <div class="product__details__pic__slider owl-carousel">
                            <img data-imgbigurl="{{asset('client-template/img/animal/BIRD1.jpg')}}"
                                src="{{asset('client-template/img/animal/BIRD1.jpg')}}" alt="">
                            <img data-imgbigurl="{{asset('client-template/img/animal/vang-anh-cac-loai-chim.jpg')}}"
                                src="{{asset('client-template/img/animal/vang-anh-cac-loai-chim.jpg')}}" alt="">
                            <img data-imgbigurl="{{asset('client-template/img/animal/chim-re-quat-vang.jpg')}}"
                                src="{{asset('client-template/img/animal/chim-re-quat-vang.jpg')}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3>{{$detail[0]->dv_tentiengviet}}</h3>
                        
                       <ul>
                            <li><b>Tên khoa học</b><span>{{$detail[0]->dv_tenkhoahoc}}</span></li>
                            <li><b>Tên địa phương</b><span>{{$detail[0]->dv_tendiaphuong}}</span></li>
                            <li><b>Tên khoa học</b><span>{{$detail[0]->dv_tenkhoahoc}}</span></li>
                        </ul>
                        
                        
                        <ul>
                            <li><b>Giới</b> <span>{{$gioi[0]->gioi_ten}}</span></li>
                        
                            <li><b>Lớp</b> <span>{{$lop[0]->lop_ten}}</span></li>
                            <li><b>Ngành</b> <span>{{$nganh[0]->nganh_ten}}</span></li>
                            <li><b>Họ</b> <span>{{$ho[0]->ho_ten}}</span></li>
                            <li><b>Bộ</b> <span>{{$bo[0]->bo_ten}}</span></li>
                           
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                       
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                <p><b>Đặc điểm hình thái : </b>
                                {{$detail[0]->dv_dacdiemhinhthai}}
                                <p><b>Đặc điểm sinh thái : </b>
                                {{$detail[0]->dv_dacdiemsinhthai}}</p>
                                </p>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <?php
        $id_user = 1;
    ?>
<!-- comment begin-->
<div class="container">
            <div class="row">
                  @if(Session::has('alert'))
                <script>                
                  swal({
                          type: 'success',
                          icon: 'success',
                          title: '{!! Session::get('alert') !!}',
                          showConfirmButton: false,
                          timer: 1500
                        });
                </script>
                @endif     
                @if(count($errors) > 0 )
                <div class = "alert alert-danger text-center">
                    @foreach($errors->all() as $err)
                      {{$err}}<br>
                    @endforeach
                </div>
                @endif
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Bình luận</h2>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="comment">
                    <!-- <label for="">Bình luận</label> -->
                        
                        <form action="comment/{{$id_user}}" method="post">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control"name="noidung" id="" cols="30" rows="3"></textarea>
                        
                        </div>
                        <button type="submit" class="btn btn-primary">Gửi</button>
                        </form>

                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="comment_list">
                        <h1>cm cm</h1>
                    </div>
                </div>

        </div>
</div>
<!-- comment end-->
    <!-- Related Product Section Begin -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Mới nhất</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($new as $dv)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{asset('client-template/img/animal/chim-re-quat-vang.jpg')}}">
                           
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">{{$dv->dv_tentiengviet}}</a></h6>
                           
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Related Product Section End -->
    @endsection