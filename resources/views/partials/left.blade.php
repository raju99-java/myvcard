<div class="nk-sidebar">           
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <!--<li class="nav-label">Dashboard</li>-->
            <li>
                <a class="" href="{{ Route('/') }}" aria-expanded="false">
                    <i class="fa fa-home" aria-hidden="true"></i><span class="nav-text">Home</span>
                </a>
            </li>
            <li>
                <a class="" href="{{ Route('dashboard') }}" aria-expanded="false">
                    <i class="icofont-rocket"></i><span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li>
                <a class="" href="{{Route('my-profile')}}" aria-expanded="false">
                    <i class="icofont-ui-user"></i><span class="nav-text">My Account</span>
                </a>
            </li>

            
            <!--<li class="nav-label">Forms</li>-->
            @if(Auth()->guard('frontend')->user()->type_id=='2')
            <li>
                <a  href="#"  class="has-arrow"  aria-expanded="false">
                    <i class="icon-note menu-icon"></i><span class="nav-text">Business Card Details</span>
                </a>
                <ul aria-expanded="true" class="in">
                <li><a href="{{ Route('basicdetails_form') }}">Basic Details</a></li>
                </ul>
                <ul aria-expanded="true" class="in">
                <li><a href="{{ Route('sociallinksdetails_form') }}">Social Media Links</a></li>
                </ul>
                <ul aria-expanded="true" class="in">
                <li><a href="{{ Route('aboutdetails_form') }}">About Details</a></li>
                </ul>
                <ul aria-expanded="true" class="in">
                <li><a href="{{ Route('servicedetails_form') }}">Services</a></li>
                </ul>
                <ul aria-expanded="true" class="in">
                <li><a href="{{ Route('productdetails_form') }}">Products</a></li>
                </ul>
                <ul aria-expanded="true" class="in">
                <li><a href="{{ Route('photodetails_form') }}">Photos</a></li>
                </ul>
                <ul aria-expanded="true" class="in">
                <li><a href="{{ Route('videodetails_form') }}">Videos</a></li>
                </ul>
                <ul aria-expanded="true" class="in">
                <li><a href="{{ Route('paymentdetails_form') }}">Payment Options</a></li>
                </ul>
            </li>
            @endif
            @if(Auth()->guard('frontend')->user()->type_id=='1')
            
            <li>
                <a class="" href="{{ Route('admin-settings') }}" aria-expanded="false">
                    <i class="fa fa-cog"></i><span class="nav-text">Settings</span>
                </a>
            </li>
            <li>
                <a class="{{ (in_array(Route::currentRouteName(), ['admin-emails', 'admin-viewemail', 'admin-updateemail'])) ? 'active' : '' }}" href="{{ Route('admin-emails') }}" aria-expanded="false">
                    <i class="fa fa-envelope"></i><span class="nav-text">Email</span>
                </a>
            </li>
            <li class="{{ (in_array(Route::currentRouteName(), ['cms.index', 'cms.show', 'cms.edit'])) ? 'active' : '' }}">
                <a class="" href="{{ Route('cms.index') }}" aria-expanded="false">
                    <i class="fa fa-picture-o"></i><span class="nav-text">CMS</span>
                </a>
            </li>
            <li class="{{ (in_array(Route::currentRouteName(), ['testimonial.index','testimonial.create', 'testimonial.show', 'testimonial.edit'])) ? 'active' : '' }}">
                <a class="" href="{{ Route('testimonial.index') }}" aria-expanded="false">
                    <i class="fa fa-quote-left" aria-hidden="true"></i><span class="nav-text">Testimonials</span>
                </a>
            </li>
            <li class="{{ (in_array(Route::currentRouteName(), ['cardarena.index','cardarena.create', 'cardarena.show', 'cardarena.edit'])) ? 'active' : '' }}">
                <a class="" href="{{ Route('cardarena.index') }}" aria-expanded="false">
                    <i class="fa fa-picture-o" aria-hidden="true"></i><span class="nav-text">Card Arena</span>
                </a>
            </li>
            <li class="{{ (in_array(Route::currentRouteName(), ['feature.index','feature.create', 'feature.show', 'feature.edit'])) ? 'active' : '' }}">
                <a class="" href="{{ Route('feature.index') }}" aria-expanded="false">
                    <i class="fa fa-picture-o" aria-hidden="true"></i><span class="nav-text">Features</span>
                </a>
            </li>
            <li class="{{ (in_array(Route::currentRouteName(), ['customer.index','customer.create', 'customer.show', 'customer.edit'])) ? 'active' : '' }}">
                <a class="" href="{{ Route('customer.index') }}" aria-expanded="false">
                    <i class="fa fa-users" aria-hidden="true"></i><span class="nav-text">Users</span>
                </a>
            </li>
          	<li class="{{ (in_array(Route::currentRouteName(), ['franchise-registration','post-franchise-registration'])) ? 'active' : '' }}">
                <a class="" href="{{ Route('franchise-registration') }}" aria-expanded="false">
                    <i class="fa fa-users" aria-hidden="true"></i><span class="nav-text">Franchises Registration</span>
                </a>
            </li>
          	<li class="{{ (in_array(Route::currentRouteName(), ['franchise.index','franchise.create', 'franchise.show', 'franchise.edit'])) ? 'active' : '' }}">
                <a class="" href="{{ Route('franchise.index') }}" aria-expanded="false">
                    <i class="fa fa-users" aria-hidden="true"></i><span class="nav-text">Franchises</span>
                </a>
            </li>
          	
            <li>
                <a class="{{ (in_array(Route::currentRouteName(), ['coupon','coupon-add','coupon-edit'])) ? 'active' : '' }}" href="{{ Route('coupon') }}" aria-expanded="false">
                    <i class="icofont-ticket"></i><span class="nav-text">Coupon</span>
                </a>
            </li>
            @endif
          	@if(Auth()->guard('frontend')->user()->type_id=='3')
          	
            <li class="{{ (in_array(Route::currentRouteName(), ['franchise-user'])) ? 'active' : '' }}">
                <a class="" href="{{ Route('franchise-user') }}" aria-expanded="false">
                    <i class="fa fa-users" aria-hidden="true"></i><span class="nav-text">Users</span>
                </a>
            </li>
          	
            @endif
            <li>
                <a class="" href="{{ Route('logout') }}" aria-expanded="false">
                    <i class="icofont-logout"></i><span class="nav-text">Logout</span>
                </a>
            </li>
            
        </ul>
    </div>
</div>