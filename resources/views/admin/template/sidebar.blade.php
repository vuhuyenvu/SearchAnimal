 <!-- Left Panel -->
 <aside id="left-panel" class="left-panel">
     <nav class="navbar navbar-expand-sm navbar-default">
         <div id="main-menu" class="main-menu collapse navbar-collapse">
             <ul class="nav navbar-nav">
                 <li id="admin-dashboard">
                     <a href="{{URL::to('admin-dashboard')}}"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                 </li>
                 <li class="menu-title">ĐỘNG VẬT</li><!-- /.menu-title -->
                 <li class="menu-item-has-children" id="bo">
                     <a href="{{URL::to('/bo')}}" class="dropdown-toggle" aria-haspopup="true"
                         aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Bộ</a>
                 </li>
                 <li class="menu-item-has-children" id="diadiem">
                     <a href="{{URL::to('/diadiem')}}" class="dropdown-toggle" aria-haspopup="true"
                         aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Địa Điểm</a>
                 </li>
                 <li class="menu-item-has-children" id="ho">
                     <a href="{{URL::to('/ho')}}" class="dropdown-toggle" aria-haspopup="true"
                         aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Họ</a>
                 </li>
                 <li class="menu-item-has-children" id="gioi">
                     <a href="{{URL::to('/gioi')}}" class="dropdown-toggle" aria-haspopup="true"
                         aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Giới</a>
                 </li>
                 <li class="menu-item-has-children" id="lop">
                     <a href="{{URL::to('/lop')}}" class="dropdown-toggle" aria-haspopup="true"
                         aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Lớp</a>
                 </li>
                 <li class="menu-item-has-children" id="nganh">
                     <a href="{{URL::to('/nganh')}}" class="dropdown-toggle" aria-haspopup="true"
                         aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Ngành</a>
                 </li>
                 <li class="menu-item-has-children" id="sinh-canh">
                     <a href="{{URL::to('/sinh-canh')}}" class="dropdown-toggle" aria-haspopup="true"
                         aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Sinh Cảnh</a>
                 </li>

                 <li class="menu-item-has-children" id="phan-bo">
                     <a href="{{URL::to('/phan-bo')}}" class="dropdown-toggle" aria-haspopup="true"
                         aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Phân Bố</a>
                 </li>
                 <li class="menu-item-has-children" id="tinh-trang-mau-vat">
                     <a href="{{URL::to('/tinhtrangmauvat')}}" class="dropdown-toggle" aria-haspopup="true"
                         aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Tình Trạng Mẫu Vật</a>
                 </li>

                 <li class="menu-item-has-children" id="bao-ton-theo-vn">
                     <a href="{{URL::to('/bao-ton-theo-vn')}}" class="dropdown-toggle" aria-haspopup="true"
                         aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Bảo Tồn Theo Việt
                                 Nam</a>
                 </li>
                 <li class="menu-item-has-children" id="bao-ton-theo-nghi-dinh">
                     <a href="{{URL::to('/bao-ton-theo-nghi-dinh')}}" class="dropdown-toggle" aria-haspopup="true"
                         aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Bảo Tồn Theo
                                 Nghị Định</a>
                 </li>
                 <li class="menu-item-has-children" id="bao-ton-theo-uicn">
                     <a href="{{URL::to('/bao-ton-theo-uicn')}}" class="dropdown-toggle" aria-haspopup="true"
                         aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Bảo Tồn Theo
                                 UICN</a>
                 </li>
                 <li class="menu-item-has-children" id="bao-ton-theo-cites">
                     <a href="{{URL::to('/bao-ton-theo-cites')}}" class="dropdown-toggle" aria-haspopup="true"
                         aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Bảo Tồn Theo
                                 CITES</a>
                 </li>
                 <li class="menu-item-has-children" id="quan-ly-dong-vat">
                     <a href="{{URL::to('/dong-vat')}}" class="dropdown-toggle" aria-haspopup="true"
                         aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Quản Lý Động Vật</a>
                 </li>
                 <li class="menu-item-has-children" id="quan-ly-binh-luan">
                     <a href="{{URL::to('/binh-luan')}}" class="dropdown-toggle" aria-haspopup="true"
                         aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Quản Lý Bình Luận</a>
                 </li>
                 <!-- <li class="menu-item-has-children dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                         aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Forms</a>
                     <ul class="sub-menu children dropdown-menu">
                         <li><i class="menu-icon fa fa-th"></i><a href="forms-basic.html">Basic Form</a></li>
                         <li><i class="menu-icon fa fa-th"></i><a href="forms-advanced.html">Advanced Form</a></li>
                     </ul>
                 </li> -->

                 <!-- <li class="menu-title">Icons</li> /.menu-title -->

                 <!-- <li class="menu-item-has-children dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                         aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Icons</a>
                     <ul class="sub-menu children dropdown-menu">
                         <li><i class="menu-icon fa fa-fort-awesome"></i><a href="font-fontawesome.html">Font
                                 Awesome</a></li>
                         <li><i class="menu-icon ti-themify-logo"></i><a href="font-themify.html">Themefy Icons</a></li>
                     </ul>
                 </li>
                 <li>
                     <a href="widgets.html"> <i class="menu-icon ti-email"></i>Widgets </a>
                 </li> -->
                 <!-- <li class="menu-item-has-children dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                         aria-expanded="false"> <i class="menu-icon fa fa-bar-chart"></i>Charts</a>
                     <ul class="sub-menu children dropdown-menu">
                         <li><i class="menu-icon fa fa-line-chart"></i><a href="charts-chartjs.html">Chart JS</a></li>
                         <li><i class="menu-icon fa fa-area-chart"></i><a href="charts-flot.html">Flot Chart</a></li>
                         <li><i class="menu-icon fa fa-pie-chart"></i><a href="charts-peity.html">Peity Chart</a></li>
                     </ul>
                 </li> -->

                 <!-- <li class="menu-item-has-children dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                         aria-expanded="false"> <i class="menu-icon fa fa-area-chart"></i>Maps</a>
                     <ul class="sub-menu children dropdown-menu">
                         <li><i class="menu-icon fa fa-map-o"></i><a href="maps-gmap.html">Google Maps</a></li>
                         <li><i class="menu-icon fa fa-street-view"></i><a href="maps-vector.html">Vector Maps</a></li>
                     </ul>
                 </li>
                 <li class="menu-title">Extras</li> -->
                 <!-- <li class="menu-item-has-children dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                         aria-expanded="false"> <i class="menu-icon fa fa-glass"></i>Pages</a>
                     <ul class="sub-menu children dropdown-menu">
                         <li><i class="menu-icon fa fa-sign-in"></i><a href="page-login.html">Login</a></li>
                         <li><i class="menu-icon fa fa-sign-in"></i><a href="page-register.html">Register</a></li>
                         <li><i class="menu-icon fa fa-paper-plane"></i><a href="pages-forget.html">Forget Pass</a></li>
                     </ul>
                 </li> -->
             </ul>
         </div><!-- /.navbar-collapse -->
     </nav>
 </aside>