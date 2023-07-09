@php
use App\Cms;
$logo=Cms::where('slug','=','logo')->first();
$favicon=Cms::where('slug','=','favicon')->first();
@endphp
<div class="nav-header">
    <div class="brand-logo">
        <a href="{{ Route('dashboard') }}">
            <b class="logo-abbr"><img src="{{$favicon->content_body!=''?URL::asset('public/uploads/frontend/cms/pictures/'.$favicon->content_body):URL::asset('public/images/logo-text.png')}}" alt="Visiting-card"> </b>
            <span class="brand-title">
                <img src="{{$logo->content_body!=''?URL::asset('public/uploads/frontend/cms/pictures/'.$logo->content_body):URL::asset('public/images/logo-text.png')}}" alt="Visiting-card">
            </span>
        </a>
    </div>
</div>
<div class="header">    
    <div class="header-content clearfix">

        <div class="nav-control">
            <div class="hamburger">
                <span class="toggle-icon"><i class="fa fa-bars" aria-hidden="true"></i></span>
            </div>
        </div>
        <!--        <div class="header-left">
                    <div class="input-group icons">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i class="mdi mdi-magnify"></i></span>
                        </div>
                        <input type="search" class="form-control" placeholder="Search Dashboard" aria-label="Search Dashboard">
                        <div class="drop-down animated flipInX d-md-none">
                            <form action="#">
                                <input type="text" class="form-control" placeholder="Search">
                            </form>
                        </div>
                    </div>
                </div>-->
        <div class="header-right">
            <ul class="clearfix">
                <!--                <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">
                                        <i class="mdi mdi-email-outline"></i>
                                        <span class="badge badge-pill gradient-1">3</span>
                                    </a>
                                    <div class="drop-down animated fadeIn dropdown-menu">
                                        <div class="dropdown-content-heading d-flex justify-content-between">
                                            <span class="">3 New Messages</span>  
                                            <a href="#" class="d-inline-block">
                                                <span class="badge badge-pill gradient-1">3</span>
                                            </a>
                                        </div>
                                        <div class="dropdown-content-body">
                                            <ul>
                                                <li class="notification-unread">
                                                    <a href="#">
                                                        <img class="float-left mr-3 avatar-img" src="images/avatar/1.jpg" alt="">
                                                        <div class="notification-content">
                                                            <div class="notification-heading">Lorem Ipsum</div>
                                                            <div class="notification-timestamp">08 Hours ago</div>
                                                            <div class="notification-text">It is a long established fact...</div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="notification-unread">
                                                    <a href="#">
                                                        <img class="float-left mr-3 avatar-img" src="images/avatar/1.jpg" alt="">
                                                        <div class="notification-content">
                                                            <div class="notification-heading">Lorem Ipsum</div>
                                                            <div class="notification-timestamp">08 Hours ago</div>
                                                            <div class="notification-text">Is it a long established fact?</div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <img class="float-left mr-3 avatar-img" src="images/avatar/1.jpg" alt="">
                                                        <div class="notification-content">
                                                            <div class="notification-heading">Lorem Ipsum</div>
                                                            <div class="notification-timestamp">08 Hours ago</div>
                                                            <div class="notification-text">It is a long established fact...</div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <img class="float-left mr-3 avatar-img" src="images/avatar/1.jpg" alt="">
                                                        <div class="notification-content">
                                                            <div class="notification-heading">Lorem Ipsum</div>
                                                            <div class="notification-timestamp">08 Hours ago</div>
                                                            <div class="notification-text">It is a long established fact...</div>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                
                                        </div>
                                    </div>
                                </li>-->
                <!--                <li class="icons dropdown"><a href="#" data-toggle="dropdown">
                                        <i class="mdi mdi-bell-outline"></i>
                                        <span class="badge badge-pill gradient-2">3</span>
                                    </a>
                                    <div class="drop-down animated fadeIn dropdown-menu dropdown-notfication">
                                        <div class="dropdown-content-heading d-flex justify-content-between">
                                            <span class="">2 New Notifications</span>  
                                            <a href="#" class="d-inline-block">
                                                <span class="badge badge-pill gradient-2">5</span>
                                            </a>
                                        </div>
                                        <div class="dropdown-content-body">
                                            <ul>
                                                <li>
                                                    <a href="#">
                                                        <span class="mr-3 avatar-icon bg-success-lighten-2"><i class="icon-present"></i></span>
                                                        <div class="notification-content">
                                                            <h6 class="notification-heading">Events near you</h6>
                                                            <span class="notification-text">Within next 5 days</span> 
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <span class="mr-3 avatar-icon bg-danger-lighten-2"><i class="icon-present"></i></span>
                                                        <div class="notification-content">
                                                            <h6 class="notification-heading">Event Started</h6>
                                                            <span class="notification-text">One hour ago</span> 
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <span class="mr-3 avatar-icon bg-success-lighten-2"><i class="icon-present"></i></span>
                                                        <div class="notification-content">
                                                            <h6 class="notification-heading">Event Ended Successfully</h6>
                                                            <span class="notification-text">One hour ago</span>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void()">
                                                        <span class="mr-3 avatar-icon bg-danger-lighten-2"><i class="icon-present"></i></span>
                                                        <div class="notification-content">
                                                            <h6 class="notification-heading">Events to Join</h6>
                                                            <span class="notification-text">After two days</span> 
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                
                                        </div>
                                    </div>
                                </li>
                                <li class="icons dropdown d-none d-md-flex">
                                    <a href="#" class="log-user"  data-toggle="dropdown">
                                        <span>English</span><i class="fa fa-angle-down f-s-14" aria-hidden="true"></i>
                                    </a>
                                    <div class="drop-down dropdown-language animated fadeIn  dropdown-menu">
                                        <div class="dropdown-content-body">
                                            <ul>
                                                <li><a href="#">English</a></li>
                                                <li><a href="#">Hindi</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>-->
                <li class="icons dropdown">
                    <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                        <span class="activity active"></span>
                        <img src="{{(Auth()->guard('frontend')->user()->image!='')? URL::asset('public/uploads/frontend/profile_picture/preview').'/'.Auth()->guard('frontend')->user()->image:URL::asset('public/images/default-pic.jpeg')  }}" height="40" width="40" alt="">
                    </div>
                    <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                        <div class="dropdown-content-body">
                            <ul>
                                <li>
                                    <a href="{{Route('my-profile')}}"><i class="icofont-user"></i> <span>Profile</span></a>
                                </li>
                                <hr class="my-2">
                                <li><a href="{{ Route('logout') }}"><i class="icofont-logout"></i> <span>Logout</span></a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>