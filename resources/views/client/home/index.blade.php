@extends('client.template.master')

@section('banner')

    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <!-- <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                            
                        </div>
                        <ul>
                            <li><a href="#">Fresh Meat</a></li>
                            <li><a href="#">Vegetables</a></li>
                            <li><a href="#">Fruit & Nut Gifts</a></li>
                            <li><a href="#">Fresh Berries</a></li>
                            <li><a href="#">Ocean Foods</a></li>
                            <li><a href="#">Butter & Eggs</a></li>
                            <li><a href="#">Fastfood</a></li>
                            <li><a href="#">Fresh Onion</a></li>
                            <li><a href="#">Papayaya & Crisps</a></li>
                            <li><a href="#">Oatmeal</a></li>
                            <li><a href="#">Fresh Bananas</a></li>
                        </ul>
                    </div> -->
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <!-- <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div> -->
                                <input type="text" placeholder="What do you want to search?">
                                <button type="submit" class="site-btn">Search</button>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

<section class="hero">
        <div class="container">
            <div class="row">
            
            <div class="col-lg-12">
       
            <div class="hero__item set-bg" data-setbg="{{asset('client-template/img/banner/header_banner.jpg')}}">
                                    <div class="hero__text">
                                       
                                        <h2>Discover cute, wild, and weird animals using the search bar below, or scroll to see popular animal lists!</h2>
                                        <br>
                                        <a href="#" class="primary-btn">SEE THEM ALL</a>
                                    </div>
                                </div>
                                </div>
                                </div>
                    </div>
                </section>
@endsection    

@section('content')    
    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                @foreach($dsdv as $dv)                              
                
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{asset('client-template/img/animal')}}/{{$dv->ha_link}}">
                            <img src="{{asset('client-template/img/animal')}}/{{$dv->ha_link}}" alt="">
                        <h5><a href="#">{{$dv->dv_tentiengviet}}</a></h5>
                        </div>
                    </div>
                    @endforeach   
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Bird</h2>
                    </div>
                    
                </div>
            </div>
            <div class="row featured__filter">
                
              
                @foreach($dsdv as $dv)                              
                
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg">
                        <img src="{{asset('client-template/img/animal')}}/{{$dv->ha_link}}" alt="">
                      
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">{{$dv->dv_tentiengviet}}</a></h6>
                            <h5></h5>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="banner__pic">
                        <img src="{{asset('client-template/img/banner/banner.jpg')}}" alt="">
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- Banner End -->

   

    <!-- Blog Section Begin -->
    <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>Newest</h2>
                    </div>
                </div>
            </div>
            <div class="row">
            @foreach($ds as $dv)                              
                
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="{{asset('client-template/img/animal')}}/{{$dv->ha_link}}" alt="">
                        </div>
                        <div class="blog__item__text">
                            <!-- <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul> -->
                            <h5><a href="{{{route('chi-tiet',['id'=>$dv->dv_ma])}}}">{{$dv->dv_tentiengviet}}</a></h5>
                            <p>{{$dv->dv_sinhcanh}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
               
              
            </div>
        </div>
    </section>
    <!-- Blog Section End -->
    @endsection