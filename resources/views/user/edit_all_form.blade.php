@extends('layouts.main')
@section('css')
<link href="{{ URL::asset('public/frontend/css/owl.carousel.min.css') }}" rel="stylesheet" type="text/css" />
<style>
    body {font-family: Arial, Helvetica, sans-serif;}
    * {box-sizing: border-box;}

    input[type=text], select, textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
    }

    input[type=tel], select, textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
    }

    input[type=email], select, textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
    }

    input[type=url], select, textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
    }

    input[type=file], select, textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
    }

    input[type=submit] {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type=submit]:hover {
        background-color: #45a049;
    }

    .container {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
    }
    .buttonn{
        display: inline-block;
        position: relative;
        width: 50px;
        height: 50px;
        cursor: pointer;
        top: 1.4rem;
    }

    .buttonn span {
        display: block;
        position: realtive;
        top: 50%;
        left: 50%;
        border: 1px solid transparent;
        border-radius: 50% !important;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        color: #1d1d1f;
        cursor: pointer;
        float: left;
        padding: 3px;
        width: 40px;
        height: 40px;
        z-index: 1;
    }
    .colornav-container {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }
    .violate .buttonn span {
        background: #9A3F96;
    }
    .pink .buttonn span {
        background: #f80c56;
    }
    .blue .buttonn span {
        background: #0044BA;
    }
    .green .buttonn span {
        background: #74B62E;
    }

    .layer {
        display: inline-block;
        position: relative;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        background: transparent;
        z-index: -1;
    }


</style>
@stop
@section('content')
<section class="main-body-section">
    <div class="content-body">
        <?php
        if (Auth()->guard('frontend')->user()->payment_status == '1' && Auth()->guard('frontend')->user()->subscription_end >= Carbon\Carbon::now()->format('Y-m-d')) {
            ?>
        <div class="container-fluid mt-3">
            <h3 class="head">CARD DETAILS</h3>

            <form class="mb-3 login-input" id="edit-all-form" action="{{ Route('edit-check-form') }}" method="POST">
                @csrf
                <input type="hidden" id="id" name="id" value="{{isset($card['id'])?$card['id']:''}}">

                <label for="avatar">Choose your theme colour</label>
                <div class="colornav-container d-flex">
                    <div class="colornav-item violate">
                        <input type="radio" name="theme_color" value="1" {{($card['theme_color']=='1')?'checked':''}}>
                        <div class="buttonn"><span></span></div>
                    </div>

                    <div class="colornav-item pink">
                        <input type="radio" name="theme_color" value="2" {{($card['theme_color']=='2')?'checked':''}}>
                        <div class="buttonn"><span></span></div>
                    </div>

                    <div class="colornav-item blue">
                        <input type="radio" name="theme_color" value="3" {{($card['theme_color']=='3')?'checked':''}}>
                        <div class="buttonn"><span></span></div>
                    </div>

                    <div class="colornav-item green">
                        <input type="radio" name="theme_color" value="4" {{($card['theme_color']=='4')?'checked':''}}>
                        <div class="buttonn"><span></span></div>
                    </div>
                    <div class="colornav-item yellow">
                        <input type="radio" name="theme_color" value="5" {{($card['theme_color']=='5')?'checked':''}}>
                        <div class="buttonn"><span></span></div>
                    </div>
                    <div class="colornav-item sky">
                        <input type="radio" name="theme_color" value="6" {{($card['theme_color']=='6')?'checked':''}}>
                        <div class="buttonn"><span></span></div>
                    </div>
                </div>

                <label for="avatar">Choose your profile picture</label>
                <input type="file" id="avatar" name="profile_picture" accept="image/png, image/jpeg">
                <div class="help-block" id="error-profile_picture"></div>

                <label for="fname">Name</label>
                <input type="text" id="name" name="name" placeholder="Your Name Please.." value="{{isset($card['name'])?$card['name']:''}}">
                <div class="help-block" id="error-name"></div>

                <label for="position">Position</label>
                <input type="text" id="position" name="position" placeholder="Position.." value="{{isset($card['position'])?$card['position']:''}}">
                <div class="help-block" id="error-position"></div>

                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone" placeholder="Phone Number.." value="{{isset($card['phone'])?$card['phone']:''}}">
                <div class="help-block" id="error-phone"></div>

                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="Email.." value="{{isset($card['email'])?$card['email']:''}}">
                <div class="help-block" id="error-email"></div>

                <label for="url">Website</label>
                <input type="url" name="website" id="website" placeholder="Website"  size="30"  value="{{isset($card['website'])?$card['website']:''}}">
                <div class="help-block" id="error-website"></div>

                <label for="phone">Whatsapp Number</label>
                <input type="tel" id="whatsapp_no" name="whatsapp_no" placeholder="Whatsapp No.." value="{{isset($card['whatsapp_no'])?$card['whatsapp_no']:''}}">
                <div class="help-block" id="error-whatsapp_no"></div>

                <label for="subject">Residential Address</label>
                <textarea id="residential_address" name="residential_address" placeholder="Residential Address.." style="height:80px">{{isset($card['residential_address'])?$card['residential_address']:''}}</textarea>
                <div class="help-block" id="error-residential_address"></div>

                <h3 class="head">SOCIAL LINKS</h3>
                <label for="text">Facebook</label>
                <input type="text" id="facebook" name="facebook" placeholder="Facebook url.." value="{{isset($card['facebook'])?$card['facebook']:''}}">
                <div class="help-block" id="error-facebook"></div>
                <label for="text">Twitter</label>
                <input type="text" id="twitter" name="twitter" placeholder="Twitter url.." value="{{isset($card['twitter'])?$card['twitter']:''}}">
                <div class="help-block" id="error-twitter"></div>
                <label for="text">Instagram</label>
                <input type="text" id="instagram" name="instagram" placeholder="Instagram url.." value="{{isset($card['instagram'])?$card['instagram']:''}}">
                <div class="help-block" id="error-instagram"></div>
                <label for="text">Pinterest</label>
                <input type="text" id="pinterest" name="pinterest" placeholder="Pinterest url.." value="{{isset($card['pinterest'])?$card['pinterest']:''}}">
                <div class="help-block" id="error-pinterest"></div>
                <label for="text">Linkedin</label>
                <input type="text" id="linkedin" name="linkedin" placeholder="Linkedin url.." value="{{isset($card['linkedin'])?$card['linkedin']:''}}">
                <div class="help-block" id="error-linkedin"></div>
                <label for="text">Youtube</label>
                <input type="text" id="youtube" name="youtube" placeholder="Youtube url.." value="{{isset($card['youtube'])?$card['youtube']:''}}">
                <div class="help-block" id="error-youtube"></div>
                <label for="text">Blogger</label>
                <input type="text" id="blogger" name="blogger" placeholder="Blogger url.." value="{{isset($card['blogger'])?$card['blogger']:''}}">
                <div class="help-block" id="error-blogger"></div>
                <label for="text">Snapchat</label>
                <input type="text" id="snapchat" name="snapchat" placeholder="Snapchat url.." value="{{isset($card['snapchat'])?$card['snapchat']:''}}">
                <div class="help-block" id="error-snapchat"></div>
                <label for="text">Telegram</label>
                <input type="text" id="telegram" name="telegram" placeholder="Telegram url.." value="{{isset($card['telegram'])?$card['telegram']:''}}">
                <div class="help-block" id="error-telegram"></div>

                <h3 class="head">ABOUT DETAILS</h3>
                <label for="fname">Company Name</label>
                <input type="text" id="company_name" name="company_name" placeholder="Company Name.." value="{{isset($card['company_name'])?$card['company_name']:''}}">
                <div class="help-block" id="error-company_name"></div>

                <label for="fname">Company Address</label>
                <input type="text" id="company_address" name="company_address" placeholder="Company Address.." value="{{isset($card['company_address'])?$card['company_address']:''}}">
                <div class="help-block" id="error-company_address"></div>

                <label for="email">Company Email ID</label>
                <input type="email" id="company_email" name="company_email"  placeholder="Company Email.." value="{{isset($card['company_email'])?$card['company_email']:''}}">
                <div class="help-block" id="error-company_email"></div>

                <label for="bnature">Nature of Business</label>
                <input type="text" id="company_nature" name="company_nature" placeholder="Nature of Business.." value="{{isset($card['company_nature'])?$card['company_nature']:''}}">
                <div class="help-block" id="error-company_nature"></div>

                <label for="subject">About Us</label>
                <textarea id="about_us" name="about_us" placeholder="About Us.." style="height:80px">{{isset($card['about_us'])?$card['about_us']:''}}</textarea>
                <div class="help-block" id="error-about_us"></div>

                <label for="file">Download Brochure</label>
                <input type="file" id="brochure" name="brochure" accept="application/pdf" placeholder="upload the Brochure">
                <div class="help-block" id="error-brochure"></div>
                
                <label for="file">CV/RESUME</label>
                <input type="file" id="cv" name="cv" accept="application/pdf" placeholder="upload the CV/RESUME">
                <div class="help-block" id="error-brochure"></div>


                <h3 class="head">SERVICE DETAILS</h3>
                <label for="avatar">Service One</label>
                <input type="file" id="service1" name="service1" accept="image/png, image/jpeg">
                <div class="help-block" id="error-service1"></div>

                <label for="avatar">Service Two</label>
                <input type="file" id="service2" name="service2"accept="image/png, image/jpeg">
                <div class="help-block" id="error-service2"></div>

                <label for="avatar">Service Three</label>
                <input type="file" id="service3" name="service3"accept="image/png, image/jpeg">
                <div class="help-block" id="error-service3"></div>

                <label for="avatar">Service Four</label>
                <input type="file" id="service4" name="service4"accept="image/png, image/jpeg">
                <div class="help-block" id="error-service4"></div>

                <label for="avatar">Service Five</label>
                <input type="file" id="service5" name="service5"accept="image/png, image/jpeg">
                <div class="help-block" id="error-service5"></div>

                <label for="avatar">Service Six</label>
                <input type="file" id="service6" name="service6"accept="image/png, image/jpeg">
                <div class="help-block" id="error-service6"></div>

                <label for="avatar">Service Seven</label>
                <input type="file" id="service7" name="service7"accept="image/png, image/jpeg">
                <div class="help-block" id="error-service7"></div>

                <label for="avatar">Service Eight</label>
                <input type="file" id="service8" name="service8"accept="image/png, image/jpeg">
                <div class="help-block" id="error-service8"></div>

                <label for="avatar">Service Nine</label>
                <input type="file" id="service9" name="service9"accept="image/png, image/jpeg">
                <div class="help-block" id="error-service9"></div>

                <label for="avatar">Service Ten</label>
                <input type="file" id="service10" name="service10"accept="image/png, image/jpeg">
                <div class="help-block" id="error-service10"></div>


                <h3 class="head">PRODUCT DETAILS</h3>
                <label for="avatar">Product One</label>
                <input type="file" id="product1_image" name="product1_image" accept="image/png, image/jpeg">
                <div class="help-block" id="error-product1_image"></div>

                <label for="subject">Product One Title</label>
                <input type="text" id="product1_title" name="product1_title" placeholder="Title..." value="{{isset($card['product1_title'])?$card['product1_title']:''}}">
                <div class="help-block" id="error-product1_title"></div>

                <label for="subject">Product One Details</label>
                <textarea id="product1_details" name="product1_details" placeholder="Details" style="height:80px">{{isset($card['product1_details'])?$card['product1_details']:''}}</textarea>
                <div class="help-block" id="error-product1_details"></div>

                <label for="phone">Product One Price</label>
                <input type="text" id="product1_price" name="product1_price" placeholder="Price" value="{{isset($card['product1_price'])?$card['product1_price']:''}}">
                <div class="help-block" id="error-product1_price"></div>

                <label for="avatar">Product Two</label>
                <input type="file" id="product2_image" name="product2_image" accept="image/png, image/jpeg">
                <div class="help-block" id="error-product2_image"></div>

                <label for="subject">Product Two Title</label>
                <input type="text" id="product2_title" name="product2_title" placeholder="Title..." value="{{isset($card['product2_title'])?$card['product2_title']:''}}">
                <div class="help-block" id="error-product2_title"></div>

                <label for="subject">Product Two Details</label>
                <textarea id="product2_details" name="product2_details" placeholder="Details" style="height:80px">{{isset($card['product2_details'])?$card['product2_details']:''}}</textarea>
                <div class="help-block" id="error-product2_details"></div>

                <label for="phone">Product Two Price</label>
                <input type="text" id="product2_price" name="product2_price" placeholder="Price" value="{{isset($card['product2_price'])?$card['product2_price']:''}}">
                <div class="help-block" id="error-product2_price"></div>


                <label for="avatar">Product Three</label>
                <input type="file" id="product3_image" name="product3_image" accept="image/png, image/jpeg">
                <div class="help-block" id="error-product3_image"></div>
                
                <label for="subject">Product Three Title</label>
                <input type="text" id="product3_title" name="product3_title" placeholder="Title..." value="{{isset($card['product3_title'])?$card['product3_title']:''}}">
                <div class="help-block" id="error-product3_title"></div>

                <label for="subject">Product Three Details</label>
                <textarea id="product3_details" name="product3_details" placeholder="Details" style="height:80px">{{isset($card['product3_details'])?$card['product3_details']:''}}</textarea>
                <div class="help-block" id="error-product3_details"></div>

                <label for="phone">Product Three Price</label>
                <input type="text" id="product3_price" name="product3_price" placeholder="Price" value="{{isset($card['product3_price'])?$card['product3_price']:''}}">
                <div class="help-block" id="error-product3_price"></div>


                <label for="avatar">Product Four</label>
                <input type="file" id="product4_image" name="product4_image" accept="image/png, image/jpeg">
                <div class="help-block" id="error-product4_image"></div>
                
                <label for="subject">Product Four Title</label>
                <input type="text" id="product4_title" name="product4_title" placeholder="Title..." value="{{isset($card['product4_title'])?$card['product4_title']:''}}">
                <div class="help-block" id="error-product4_title"></div>

                <label for="subject">Product Four Details</label>
                <textarea id="product4_details" name="product4_details" placeholder="Details" style="height:80px">{{isset($card['product4_details'])?$card['product4_details']:''}}</textarea>
                <div class="help-block" id="error-product4_details"></div>

                <label for="phone">Product Four Price</label>
                <input type="text" id="product4_price" name="product4_price" placeholder="Price" value="{{isset($card['product4_price'])?$card['product4_price']:''}}">
                <div class="help-block" id="error-product4_price"></div>
                

                <label for="avatar">Product Five</label>
                <input type="file" id="product5_image" name="product5_image" accept="image/png, image/jpeg">
                <div class="help-block" id="error-product5_image"></div>
                
                <label for="subject">Product Five Title</label>
                <input type="text" id="product5_title" name="product5_title" placeholder="Title..." value="{{isset($card['product5_title'])?$card['product5_title']:''}}">
                <div class="help-block" id="error-product5_title"></div>

                <label for="subject">Product Five Details</label>
                <textarea id="product5_details" name="product5_details" placeholder="Details" style="height:80px">{{isset($card['product5_details'])?$card['product5_details']:''}}</textarea>
                <div class="help-block" id="error-product5_details"></div>

                <label for="phone">Product Five Price</label>
                <input type="text" id="product5_price" name="product5_price" placeholder="Price" value="{{isset($card['product5_price'])?$card['product5_price']:''}}">
                <div class="help-block" id="error-product5_price"></div>


                <label for="avatar">Product Six</label>
                <input type="file" id="product6_image" name="product6_image" accept="image/png, image/jpeg">
                <div class="help-block" id="error-product6_image"></div>
                
                <label for="subject">Product Six Title</label>
                <input type="text" id="product6_title" name="product6_title" placeholder="Title..." value="{{isset($card['product6_title'])?$card['product6_title']:''}}">
                <div class="help-block" id="error-product6_title"></div>

                <label for="subject">Product Six Details</label>
                <textarea id="product6_details" name="product6_details" placeholder="Details" style="height:80px">{{isset($card['product6_details'])?$card['product6_details']:''}}</textarea>
                <div class="help-block" id="error-product6_details"></div>

                <label for="phone">Product Six Price</label>
                <input type="text" id="product6_price" name="product6_price" placeholder="Price" value="{{isset($card['product6_price'])?$card['product6_price']:''}}">
                <div class="help-block" id="error-product6_price"></div>
                
                
                <label for="avatar">Product Seven</label>
                <input type="file" id="product7_image" name="product7_image" accept="image/png, image/jpeg">
                <div class="help-block" id="error-product7_image"></div>
                
                <label for="subject">Product Seven Title</label>
                <input type="text" id="product7_title" name="product7_title" placeholder="Title..." value="{{isset($card['product7_title'])?$card['product7_title']:''}}">
                <div class="help-block" id="error-product7_title"></div>

                <label for="subject">Product Seven Details</label>
                <textarea id="product7_details" name="product7_details" placeholder="Details" style="height:80px">{{isset($card['product7_details'])?$card['product7_details']:''}}</textarea>
                <div class="help-block" id="error-product7_details"></div>

                <label for="phone">Product Seven Price</label>
                <input type="text" id="product7_price" name="product7_price" placeholder="Price" value="{{isset($card['product7_price'])?$card['product7_price']:''}}">
                <div class="help-block" id="error-product7_price"></div>
                
                
                <label for="avatar">Product Eight</label>
                <input type="file" id="product8_image" name="product8_image" accept="image/png, image/jpeg">
                <div class="help-block" id="error-product8_image"></div>
                
                <label for="subject">Product Eight Title</label>
                <input type="text" id="product8_title" name="product8_title" placeholder="Title..." value="{{isset($card['product8_title'])?$card['product8_title']:''}}">
                <div class="help-block" id="error-product8_title"></div>

                <label for="subject">Product Eight Details</label>
                <textarea id="product8_details" name="product8_details" placeholder="Details" style="height:80px">{{isset($card['product8_details'])?$card['product8_details']:''}}</textarea>
                <div class="help-block" id="error-product8_details"></div>

                <label for="phone">Product Eight Price</label>
                <input type="text" id="product8_price" name="product8_price" placeholder="Price" value="{{isset($card['product8_price'])?$card['product8_price']:''}}">
                <div class="help-block" id="error-product8_price"></div>
                
                
                <label for="avatar">Product Nine</label>
                <input type="file" id="product9_image" name="product9_image" accept="image/png, image/jpeg">
                <div class="help-block" id="error-product9_image"></div>
                
                <label for="subject">Product Nine Title</label>
                <input type="text" id="product9_title" name="product9_title" placeholder="Title..." value="{{isset($card['product9_title'])?$card['product9_title']:''}}">
                <div class="help-block" id="error-product9_title"></div>

                <label for="subject">Product Nine Details</label>
                <textarea id="product9_details" name="product9_details" placeholder="Details" style="height:80px">{{isset($card['product9_details'])?$card['product9_details']:''}}</textarea>
                <div class="help-block" id="error-product9_details"></div>

                <label for="phone">Product Nine Price</label>
                <input type="text" id="product9_price" name="product9_price" placeholder="Price" value="{{isset($card['product9_price'])?$card['product9_price']:''}}">
                <div class="help-block" id="error-product9_price"></div>
                
                
                <label for="avatar">Product Ten</label>
                <input type="file" id="product10_image" name="product10_image" accept="image/png, image/jpeg">
                <div class="help-block" id="error-product10_image"></div>
                
                <label for="subject">Product Ten Title</label>
                <input type="text" id="product10_title" name="product10_title" placeholder="Title..." value="{{isset($card['product10_title'])?$card['product10_title']:''}}">
                <div class="help-block" id="error-product10_title"></div>

                <label for="subject">Product Ten Details</label>
                <textarea id="product10_details" name="product10_details" placeholder="Details" style="height:80px">{{isset($card['product10_details'])?$card['product10_details']:''}}</textarea>
                <div class="help-block" id="error-product10_details"></div>

                <label for="phone">Product Ten Price</label>
                <input type="text" id="product10_price" name="product10_price" placeholder="Price" value="{{isset($card['product10_price'])?$card['product10_price']:''}}">
                <div class="help-block" id="error-product10_price"></div>
                
                                                                           

                <h3 class="head">PHOTO DETAILS</h3>

                <label for="avatar">Upload the photos</label>
                <input type="file" id="gallery1_image" name="gallery1_image" accept="image/png, image/jpeg">
                <div class="help-block" id="error-gallery1_image"></div>

                <input type="file" id="gallery2_image" name="gallery2_image"accept="image/png, image/jpeg">
                <div class="help-block" id="error-gallery2_image"></div>

                <input type="file" id="gallery3_image" name="gallery3_image"accept="image/png, image/jpeg">
                <div class="help-block" id="error-gallery3_image"></div>

                <input type="file" id="gallery4_image" name="gallery4_image"accept="image/png, image/jpeg">
                <div class="help-block" id="error-gallery4_image"></div>

                <input type="file" id="gallery5_image" name="gallery5_image"accept="image/png, image/jpeg">
                <div class="help-block" id="error-gallery5_image"></div>

                <input type="file" id="gallery6_image" name="gallery6_image"accept="image/png, image/jpeg">
                <div class="help-block" id="error-gallery6_image"></div>

                <input type="file" id="gallery7_image" name="gallery7_image"accept="image/png, image/jpeg">
                <div class="help-block" id="error-gallery7_image"></div>

                <input type="file" id="gallery8_image" name="gallery8_image"accept="image/png, image/jpeg">
                <div class="help-block" id="error-gallery8_image"></div>

                <input type="file" id="gallery9_image" name="gallery9_image"accept="image/png, image/jpeg">
                <div class="help-block" id="error-gallery9_image"></div>

                <input type="file" id="gallery10_image" name="gallery10_image"accept="image/png, image/jpeg">
                <div class="help-block" id="error-gallery10_image"></div>


                <h3 class="head">VIDEO DETAILS</h3>


                <label for="text">Youtube Video Link</label>
                <input type="text" id="youtube_video_1" name="youtube_video_1" placeholder="Youtube Video.." value="{{isset($card['youtube_video_1'])?$card['youtube_video_1']:''}}">
                <div class="help-block" id="error-youtube_video_1"></div>
                <input type="text" id="youtube_video_2" name="youtube_video_2" placeholder="Youtube Video.." value="{{isset($card['youtube_video_2'])?$card['youtube_video_2']:''}}">
                <div class="help-block" id="error-youtube_video_2"></div>



                <h3 class="head">PAYMENT DETAILS</h3>
                <h5>WALLET:</h5>
                <input type="tel" id="gpay_number" name="gpay_number" placeholder="Gpay Mobile Number" value="{{isset($card['gpay_number'])?$card['gpay_number']:''}}">
                <div class="help-block" id="error-gpay_number"></div>

                <label for="avatar">Gpay QR Code</label>
                <input type="file" id="gpay_QR" name="gpay_QR" accept="image/png, image/jpeg">
                <div class="help-block" id="error-gpay_QR"></div>

                <input type="tel" id="phonepay_number" name="phonepay_number" placeholder="PhonePe Mobile Number" value="{{isset($card['phonepay_number'])?$card['phonepay_number']:''}}">
                <div class="help-block" id="error-phonepay_number"></div>


                <label for="avatar">Phonepay QR Code</label>
                <input type="file" id="phonepay_QR" name="phonepay_QR" accept="image/png, image/jpeg">
                <div class="help-block" id="error-phonepay_QR"></div>

                <input type="tel" id="paytm_number" name="paytm_number" placeholder="PayTM Mobile Number" value="{{isset($card['paytm_number'])?$card['paytm_number']:''}}">
                <div class="help-block" id="error-paytm_number"></div>

                <label for="avatar">Paytm QR Code</label>
                <input type="file" id="paytm_QR" name="paytm_QR" accept="image/png, image/jpeg">
                <div class="help-block" id="error-paytm_QR"></div>

                <h5>UPI:</h5>
                <input type="tel" id="upi_number" name="upi_number" placeholder="UPI Mobile Name" value="{{isset($card['upi_number'])?$card['upi_number']:''}}">
                <div class="help-block" id="error-upi_number"></div>

                <label for="avatar">UPI QR Code</label>
                <input type="file" id="upi_QR" name="upi_QR" accept="image/png, image/jpeg">
                <div class="help-block" id="error-upi_QR"></div>

                <h5>BANK DETAILS:</h5>

                <label for="text">Bank Name</label>
                <input type="text" id="bank_name" name="bank_name" placeholder="Bank Name.." value="{{isset($card['bank_name'])?$card['bank_name']:''}}">
                <div class="help-block" id="error-bank_name"></div>
                <label for="text">Branch Name</label>
                <input type="text" id="branch_name" name="branch_name" placeholder="Branch Name.." value="{{isset($card['branch_name'])?$card['branch_name']:''}}">
                <div class="help-block" id="error-branch_name"></div>
                <label for="text">Account no</label>
                <input type="text" id="account_no" name="account_no" placeholder="Account no.." value="{{isset($card['account_no'])?$card['account_no']:''}}">
                <div class="help-block" id="error-account_no"></div>
                <label for="text">Customer Id</label>
                <input type="text" id="customer_id" name="customer_id" placeholder="Customer Id.." value="{{isset($card['customer_id'])?$card['customer_id']:''}}">
                <div class="help-block" id="error-customer_id"></div>
                <label for="text">Swift code</label>
                <input type="text" id="swift_code" name="swift_code" placeholder="Swift code.." value="{{isset($card['swift_code'])?$card['swift_code']:''}}">
                <div class="help-block" id="error-swift_code"></div>
                <label for="text">Account Holder</label>
                <input type="text" id="account_holder" name="account_holder" placeholder="Account Holder.." value="{{isset($card['account_holder'])?$card['account_holder']:''}}">
                <div class="help-block" id="error-account_holder"></div>
                <label for="text">IFSC CODE</label>
                <input type="text" id="ifsc_code" name="ifsc_code" placeholder="IFSC CODE.." value="{{isset($card['ifsc_code'])?$card['ifsc_code']:''}}">
                <div class="help-block" id="error-ifsc_code"></div>
                <label for="text">MICR Code</label>
                <input type="text" id="micr_code" name="micr_code" placeholder="MICR Code.." value="{{isset($card['micr_code'])?$card['micr_code']:''}}">
                <div class="help-block" id="error-micr_code"></div>
                <label for="subject">Bank Address</label>
                <textarea id="bank_address" name="bank_address" placeholder="Bank Address.." style="height:80px">{{isset($card['bank_address'])?$card['bank_address']:''}}</textarea>
                <div class="help-block" id="error-bank_address"></div>
                <div class="submit-btn">
                    <input type="submit" value="Submit">
                </div>  
            </form>
        </div>
    <?php } else { ?>
            <div class="col-lg-3 col-sm-6">
                <a href="{{route('pay')}}">
                    <div class="card gradient-1">
                        <div class="card-body">
                            <h3 class="card-title text-white">Subscription</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white"><i class="fa fa-inr" aria-hidden="true"></i> {{$subscription->value.'/-'}}</h2>
                                <p class="text-white mb-0">click here  for 1 year</p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                        </div>
                    </div>
                </a>
            </div>
        <?php } ?>
        <!--container -->
    </div>
</section>
@stop
@section('js')
<script src="{{ URL::asset('public/frontend/js/owl.carousel.min.js') }}" type="text/javascript"></script>

@stop