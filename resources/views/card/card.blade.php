<!doctype html>
<html>
    @php
    use App\Cms;
    $favicon=Cms::where('slug','=','favicon')->first();
    $title=Cms::where('slug','=','title')->first();
    $meta_title=Cms::where('slug','=','meta_title')->first();
    $meta_keyword=Cms::where('slug','=','meta_keyword')->first();
    $meta_description=Cms::where('slug','=','meta_description')->first();
    $copyright_text=Cms::where('slug','=','copyright_text')->first();
    $wp_number=isset($model['whatsapp_no'])?$user->countryCode.' '.$model['whatsapp_no']:'';
    @endphp
    <head>
        <meta charset="utf-8">
        <title>{{isset($model['name'])?$model['name'].'-':''}}{{isset($title->content_body) && $title->content_body!=''?strip_tags($title->content_body):'Fast Card'}}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="title" content="{{isset($model['name'])?$model['name']:'Visiting Card'}}-{{isset($model['position'])?$model['position']:'Fast Card'}}">
        
        <meta name="description" content="{{isset($model['about_us'])?strip_tags($model['about_us']):''}}">
        
        
        <meta property="og:title" content="{{isset($model['name'])?$model['name']:'Visiting Card'}}-{{isset($model['position'])?$model['position']:'Fast Card'}}" />
        <meta property="og:image" content="{{isset($model['profile_picture'])?URL::asset('public/uploads/card/original').'/'.$model['profile_picture']:URL::asset('favicon.png')}}" />
        <meta property="og:description" content="{{isset($model['about_us'])?strip_tags($model['about_us']):''}}" />
        <!--title-->

        <link href="{{ URL::asset('/public/card/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ URL::asset('/public/card/css/all.css') }}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/card/css/jquery.fancybox.min.css') }}">
        <!-- modal -->
        <link rel="stylesheet" href="{{ URL::asset('/public/card/css/remodal.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('/public/card/css/remodal-default-theme.css') }}">
        @if(isset($model['theme_color']) && $model['theme_color']=='1')
        <link href="{{ URL::asset('/public/card/css/style-one.css') }}" rel="stylesheet" type="text/css">
        <!-- Chrome, Firefox OS and Opera -->
		<meta name="theme-color" content="#871c83">
		<!-- Windows Phone -->
		<meta name="msapplication-navbutton-color" content="#871c83">
		<!-- iOS Safari -->
		<meta name="apple-mobile-web-app-status-bar-style" content="#871c83">
        @elseif(isset($model['theme_color']) && $model['theme_color']=='2')
        <link href="{{ URL::asset('/public/card/css/style-two.css') }}" rel="stylesheet" type="text/css">
        <!-- Chrome, Firefox OS and Opera -->
		<meta name="theme-color" content="#f2026d">
		<!-- Windows Phone -->
		<meta name="msapplication-navbutton-color" content="#f2026d">
		<!-- iOS Safari -->
		<meta name="apple-mobile-web-app-status-bar-style" content="#f2026d">
        @elseif(isset($model['theme_color']) && $model['theme_color']=='3')
        <link href="{{ URL::asset('/public/card/css/style-three.css') }}" rel="stylesheet" type="text/css">
        <!-- Chrome, Firefox OS and Opera -->
		<meta name="theme-color" content="#002869">
		<!-- Windows Phone -->
		<meta name="msapplication-navbutton-color" content="#002869">
		<!-- iOS Safari -->
		<meta name="apple-mobile-web-app-status-bar-style" content="#002869">
        @elseif(isset($model['theme_color']) && $model['theme_color']=='4')
        <link href="{{ URL::asset('/public/card/css/style-four.css') }}" rel="stylesheet" type="text/css">
        <!-- Chrome, Firefox OS and Opera -->
		<meta name="theme-color" content="#53a200">
		<!-- Windows Phone -->
		<meta name="msapplication-navbutton-color" content="#53a200">
		<!-- iOS Safari -->
		<meta name="apple-mobile-web-app-status-bar-style" content="#53a200">
        @elseif(isset($model['theme_color']) && $model['theme_color']=='5')
        <link href="{{ URL::asset('/public/card/css/style-five.css') }}" rel="stylesheet" type="text/css">
        <!-- Chrome, Firefox OS and Opera -->
		<meta name="theme-color" content="#07847e">
		<!-- Windows Phone -->
		<meta name="msapplication-navbutton-color" content="#07847e">
		<!-- iOS Safari -->
		<meta name="apple-mobile-web-app-status-bar-style" content="#07847e">
        @elseif(isset($model['theme_color']) && $model['theme_color']=='6')
        <link href="{{ URL::asset('/public/card/css/style-six.css') }}" rel="stylesheet" type="text/css">
        <!-- Chrome, Firefox OS and Opera -->
		<meta name="theme-color" content="#009fd0">
		<!-- Windows Phone -->
		<meta name="msapplication-navbutton-color" content="#009fd0">
		<!-- iOS Safari -->
		<meta name="apple-mobile-web-app-status-bar-style" content="#009fd0">
        @elseif(isset($model['theme_color']) && $model['theme_color']=='7')
        <link href="{{ URL::asset('/public/card/css/style-seven.css') }}" rel="stylesheet" type="text/css">
        <!-- Chrome, Firefox OS and Opera -->
		<meta name="theme-color" content="#ae0610">
		<!-- Windows Phone -->
		<meta name="msapplication-navbutton-color" content="#ae0610">
		<!-- iOS Safari -->
		<meta name="apple-mobile-web-app-status-bar-style" content="#ae0610">
        @elseif(isset($model['theme_color']) && $model['theme_color']=='8')
        <link href="{{ URL::asset('/public/card/css/style-eight.css') }}" rel="stylesheet" type="text/css">
        <!-- Chrome, Firefox OS and Opera -->
		<meta name="theme-color" content="#ebaa0f">
		<!-- Windows Phone -->
		<meta name="msapplication-navbutton-color" content="#ebaa0f">
		<!-- iOS Safari -->
		<meta name="apple-mobile-web-app-status-bar-style" content="#ebaa0f">
        @elseif(isset($model['theme_color']) && $model['theme_color']=='9')
        <link href="{{ URL::asset('/public/card/css/style-nine.css') }}" rel="stylesheet" type="text/css">
        <!-- Chrome, Firefox OS and Opera -->
		<meta name="theme-color" content="#4b4b4b">
		<!-- Windows Phone -->
		<meta name="msapplication-navbutton-color" content="#4b4b4b">
		<!-- iOS Safari -->
		<meta name="apple-mobile-web-app-status-bar-style" content="#4b4b4b">
        @elseif(isset($model['theme_color']) && $model['theme_color']=='10')
        <link href="{{ URL::asset('/public/card/css/style-ten.css') }}" rel="stylesheet" type="text/css">
        <!-- Chrome, Firefox OS and Opera -->
		<meta name="theme-color" content="#f06102">
		<!-- Windows Phone -->
		<meta name="msapplication-navbutton-color" content="#f06102">
		<!-- iOS Safari -->
		<meta name="apple-mobile-web-app-status-bar-style" content="#f06102">
        @elseif(isset($model['theme_color']) && $model['theme_color']=='11')
        <link href="{{ URL::asset('/public/card/css/style-eleven.css') }}" rel="stylesheet" type="text/css">
        <!-- Chrome, Firefox OS and Opera -->
		<meta name="theme-color" content="#0e0e0e">
		<!-- Windows Phone -->
		<meta name="msapplication-navbutton-color" content="#0e0e0e">
		<!-- iOS Safari -->
		<meta name="apple-mobile-web-app-status-bar-style" content="#0e0e0e">
        @elseif(isset($model['theme_color']) && $model['theme_color']=='12')
        <link href="{{ URL::asset('/public/card/css/style-twelve.css') }}" rel="stylesheet" type="text/css">
        <!-- Chrome, Firefox OS and Opera -->
		<meta name="theme-color" content="#024901">
		<!-- Windows Phone -->
		<meta name="msapplication-navbutton-color" content="#024901">
		<!-- iOS Safari -->
		<meta name="apple-mobile-web-app-status-bar-style" content="#024901">
        @else
        <link href="{{ URL::asset('/public/card/css/style-one.css') }}" rel="stylesheet" type="text/css">
        <!-- Chrome, Firefox OS and Opera -->
		<meta name="theme-color" content="#871c83">
		<!-- Windows Phone -->
		<meta name="msapplication-navbutton-color" content="#871c83">
		<!-- iOS Safari -->
		<meta name="apple-mobile-web-app-status-bar-style" content="#871c83">
        @endif
        <!--favicon icon-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="{{ URL::asset('public/frontend/custom/iao-alert/iao-alert.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- javascript -->
        <script type="text/javascript" src="{{ URL::asset('/public/card/js/jquery-2.2.4.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('/public/card/js/bootstrap.min.js') }}"></script>
        <script src="{{ URL::asset('/public/card/js/jquery.fancybox.min.js') }}"></script>
        <!--own css-->

        <link rel="shortcut icon" href="{{$favicon->content_body!=''?URL::asset('public/uploads/frontend/cms/pictures/'.$favicon->content_body):URL::asset('favicon.png')}}">
        <style>
            .help-block{
                color: red;
            }
            
        </style>
    </head>

    <body>
        <?php

        function raf_create_vcard($user_id) {
            $card = App\Card::where('user_id', $user_id)->where('status', '1')->first();
            $format_name = utf8_encode($card['name']);
            $format_email = utf8_encode($card['email']);
            $format_tel = utf8_encode($card['phone']);
            $format_www = utf8_encode($card['website']);
            $format_address = utf8_encode($card['residential_address']);

            return 'BEGIN%3AVCARD%0D%0AVERSION%3A3.0%0D%0AN%3BCHARSET=utf-8%3A' . $format_name . '%0D%0AFN%3BCHARSET=utf-8%3A' . $format_name . '%0D%0AEMAIL%3BINTERNET%3A' . $format_email . '%0D%0ATEL%3A' . $format_tel . '%0D%0AURL%3Btype%3Dpref%3A' . $format_www . '%0D%0AADR%3A%3B' . $format_address . '%0D%0AEND%3AVCARD';
        }
        ?>

        <main class="content-wrap">
            <section id="home" class="home mb-3">


                <div class="profile">
                    <div class="view">
                        <i class="fa fa-eye"></i> View: {{isset($model['views'])?$model['views']:'1'}}

                    </div>
                    <div class="power">
                        <a href="{{route('login')}}"><i class="fa fa-power-off"></i></a>
                    </div>
                    <img src="{{isset($model['profile_picture'])?URL::asset('public/uploads/card/preview').'/'.$model['profile_picture']:URL::asset('public/images/user/form-user.png')}}" alt="" class="img-fluid">

                </div>
                <div class="content">
                    <h2>
                        {{isset($model['name'])?$model['name']:'Test'}}

                        <small>{{isset($model['position'])?$model['position']:'Test'}}</small>
                    </h2>

                    <p><a href="tel:{{isset($model['phone'])?$model['phone']:'1234567890'}}"><i class="fa fa-mobile"></i>{{$user->countryCode}}{{isset($model['phone'])?$model['phone']:'1234567890'}}</a></p>

                    <p id="mailid"> <a href="mailto:{{isset($model['email'])?$model['email']:''}}"><i class="fa fa-envelope"></i>{{isset($model['email'])?$model['email']:''}}</a></p>

                    <p> <a href="//{{isset($model['website'])?$model['website']:''}}" target="blank"><i class="fa fa-globe"></i>{{isset($model['website'])?$model['website']:''}}</a></p>

                    <p>
                        <a href="https://api.whatsapp.com/send?phone={{$wp_number}}&text=Hi {{isset($model['name'])?$model['name']:'Test'}}, It was nice talking with you, Got Reference from your Digital card,  Want to know more about your products and services." target="blank">
                            <i class="fa fa-whatsapp" ></i>{{$user->countryCode}} {{isset($model['whatsapp_no'])?$model['whatsapp_no']:''}}
                        </a>
                    </p>

                    <p>
                        <a href="https://www.google.com/maps/search/{{isset($model['residential_address'])?$model['residential_address']:''}}" target="_blank">
                            <i class="fa fa-map-marker"></i>{{isset($model['residential_address'])?$model['residential_address']:''}}
                        </a>
                    </p>

                </div>
                <div class="other-pt">

                    <div class="share-whatsapp mb-3">
                        <input type="text" id="txtWhatsappNo" placeholder="Whatsapp No." maxlength="10">
                        <button type="submit" class="whatsapp-button" onclick="shareViaWhatsapp()"><i class="fa fa-whatsapp  mr-2" style="font-size:20px"></i> Share on Whatsapp</button>
                    </div>

                    <div class="save-pt">
                        <a href="data:text/plain;charset=UTF-8,<?php echo raf_create_vcard($user_id); ?>" download="contact.vcf"><i class="fa fa-arrow-down mr-2"></i> Add to Phonebook</a>
                        <a href="#share"><i class="fa fa-share-square-o mr-2"></i> Share Card</a>
                    </div>
                    <div class="social-container px-4 mb-4 mt-2">
                        @if(isset($model['facebook']))
                        <a href="{{$model['facebook']}}" target="_blank" title="Facebook" class="facebook"><i class="fa fa-facebook-f"></i></a>
                        @endif
                        @if(isset($model['twitter']))
                        <a href="{{$model['twitter']}}" target="_blank" title="twitter" class="twitter"><i class="fa fa-twitter"></i></a>
                        @endif
                        @if(isset($model['instagram']))
                        <a href="{{$model['instagram']}}" target="_blank" title="Instagram" class="instagram"><i class="fa fa-instagram"></i></a>
                        @endif
                        @if(isset($model['pinterest']))
                        <a href="{{$model['pinterest']}}" target="_blank" title="Pinterest" class="pinterest"><i class="fa fa-pinterest"></i></a>
                        @endif
                        @if(isset($model['linkedin']))
                        <a href="{{$model['linkedin']}}" target="_blank" title="Linkedin" class="linkedin"><i class="fa fa-linkedin-in"></i></a>
                        @endif
                        @if(isset($model['youtube']))                                                                                                
                        <a href="{{$model['youtube']}}" target="_blank" title="Youtube" class="youtube"><i class="fa fa-youtube"></i></a>
                        @endif
                        @if(isset($model['blogger']))
                        <a href="{{$model['blogger']}}" target="_blank" title="Blogger" class="blog"><i class="fa fa-rss"></i></a>
                        @endif
                        @if(isset($model['snapchat']))                                                                                      
                        <a href="{{$model['snapchat']}}" target="_blank" title="Snapchat" class="snapchat"><i class="fa fa-snapchat-ghost"></i></a>
                        @endif
                        @if(isset($model['telegram']))
                        <a href="{{$model['telegram']}}" target="_blank" title="Telegram" class="telegram"><i class="fa fa-telegram"></i></a>
                        @endif
                        @if(isset($model['location_and_google']))
                        <a href="{{$model['location_and_google']}}" target="_blank" title="location and Google" class="location_and_google"><i class="fa fa-map-marker"></i></a>
                        @endif
                    </div>
                </div>
            </section>

            <!-- About Us -->
            @if(isset($model['company_name']) || isset($model['company_email']) || isset($model['company_nature']) || isset($model['about_us']) || isset($model['brochure']))
            <section id="about" class="about mb-3">
                <h2 class="h2">About Us</h2>
                <table>
                    <tr>
                        <td><b>Company Name</b></td>
                        <td class="ml-2 d-block">:</td>
                        <td>{{isset($model['company_name'])?$model['company_name']:'Test'}}</td>
                    </tr>
                    <tr>
                        <td><b>Company Email ID</b></td>
                        <td class="ml-2 d-block">:</td>
                        <td>{{isset($model['company_email'])?$model['company_email']:'test@test.com'}}</td>
                    </tr>
                    <tr>
                        <td><b>Nature of Business</b></td>
                        <td class="ml-2 d-block">:</td>
                        <td>{{isset($model['company_nature'])?$model['company_nature']:'IT company'}}</td>
                    </tr>
                </table>
                <p><strong>ABOUT US:</strong></p>

                <p>{!! isset($model['about_us'])?$model['about_us']:'' !!}</p>

<!--                <p>WELL, WAIT! NO ADVANCE PAYMENT!!!!</p>

                <p>YOU HAVE&nbsp;&nbsp;30 DAYS TRIAL BEFORE CHOOSE ANY PLAN.</p>-->

<!--                <p><strong>WHY Fastcard?</strong></p>

                <ol>
                    <li>LOWEST PRICE IN MARKET</li>
                    <li>NO DEPENDENCY IN CARD CREATION</li>
                    <li>NO ADVANCE PAYMENT</li>
                    <li>BEST DESIGN</li>
                    <li>BEST SERVICE</li>
                </ol>

                <p><strong>WHY DIGITAL VISITING CARD?</strong></p>

                <ul>
                    <li>NO EXTRA PRINTING COST</li>
                    <li>NO EXTRA DESIGN COST</li>
                    <li>NO CARRYING</li>
                    <li>NO NEW WEBSITE FOR PORTFOLIO</li>
                    <li>GET NUMBER OF CARD VIEWERS</li>
                    <li>Click, Call and map integration!</li>
                    <li>You can share your card through whatsapp without saving any number.</li>
                    <li>Gallery.</li>
                    <li>About us Display.</li>
                    <li>Show your products/ Services with photos.</li>
                    <li>Enquiry form to capture lead.</li>
                    <li>Track your lead</li>
                </ul>

                <blockquote>
                    <p>GO ONLINE WITH FASTCARD AT JUST RS. 99. STOP WORRING ABOUT LOCKDOWN. PROMOTE AND SHARE YOUR BUSINESS ONLINE. WHY WAIT??? CONTACT US AT <a href="tel:+918013200659">+91 8013200659</a> or MAIL US at <a href="mailto:support@fastcard.in">support@fastcard.in</a></p>
                </blockquote>-->

                @if(isset($model['brochure']))
                <a class="document-wrapper" href="{{isset($model['brochure'])?URL::asset('public/uploads/card/brochure').'/'.$model['brochure']:''}}" download target="_blank">
                    <div class="pdf-icon"><i class="fa fa-file-pdf"></i></div>
                    <div class="pdf-number">Brochure.pdf</div>
                    <div class="download-icon"><i class="fa fa-download"></i></div>
                </a>
                @endif
                @if(isset($model['cv']))
                <a class="document-wrapper" href="{{isset($model['cv'])?URL::asset('public/uploads/card/cv').'/'.$model['cv']:''}}" download target="_blank">
                    <div class="pdf-icon"><i class="fa fa-file-pdf"></i></div>
                    <div class="pdf-number">CV.pdf</div>
                    <div class="download-icon"><i class="fa fa-download"></i></div>
                </a>
                @endif

            </section>
            @endif



            <!-- Services -->
            @if(isset($model['service1']) || isset($model['service2'])  || isset($model['service3'])  || isset($model['service4'])  || isset($model['service5'])  || isset($model['service6'])  || isset($model['service7'])  || isset($model['service8'])  || isset($model['service9'])  || isset($model['service10']))
            <section id="services" class="gallery mb-3">
                <h3>SERVICES</h3>
                <div class="gallery-main">
                    @if(isset($model['service1']))
                    <a href="{{isset($model['service1'])?URL::asset('public/uploads/card/original').'/'.$model['service1']:''}}" data-fancybox="gallery"><img src="{{isset($model['service1'])?URL::asset('public/uploads/card/original').'/'.$model['service1']:''}}" class="img-fluid"></a>
                    @endif
                    @if(isset($model['service2']))
                    <a href="{{isset($model['service2'])?URL::asset('public/uploads/card/original').'/'.$model['service2']:''}}" data-fancybox="gallery"><img src="{{isset($model['service2'])?URL::asset('public/uploads/card/original').'/'.$model['service2']:''}}" class="img-fluid"></a>
                    @endif
                    @if(isset($model['service3']))
                    <a href="{{isset($model['service3'])?URL::asset('public/uploads/card/original').'/'.$model['service3']:''}}" data-fancybox="gallery"><img src="{{isset($model['service3'])?URL::asset('public/uploads/card/original').'/'.$model['service3']:''}}" class="img-fluid"></a>
                    @endif
                    @if(isset($model['service4']))
                    <a href="{{isset($model['service4'])?URL::asset('public/uploads/card/original').'/'.$model['service4']:''}}" data-fancybox="gallery"><img src="{{isset($model['service4'])?URL::asset('public/uploads/card/original').'/'.$model['service4']:''}}" class="img-fluid"></a>
                    @endif
                    @if(isset($model['service5']))
                    <a href="{{isset($model['service5'])?URL::asset('public/uploads/card/original').'/'.$model['service5']:''}}" data-fancybox="gallery"><img src="{{isset($model['service5'])?URL::asset('public/uploads/card/original').'/'.$model['service5']:''}}" class="img-fluid"></a>
                    @endif
                    @if(isset($model['service6']))
                    <a href="{{isset($model['service6'])?URL::asset('public/uploads/card/original').'/'.$model['service6']:''}}" data-fancybox="gallery"><img src="{{isset($model['service6'])?URL::asset('public/uploads/card/original').'/'.$model['service6']:''}}" class="img-fluid"></a>
                    @endif
                    @if(isset($model['service7']))
                    <a href="{{isset($model['service7'])?URL::asset('public/uploads/card/original').'/'.$model['service7']:''}}" data-fancybox="gallery" ><img src="{{isset($model['service7'])?URL::asset('public/uploads/card/original').'/'.$model['service7']:''}}" class="img-fluid"></a>
                    @endif
                    @if(isset($model['service8']))
                    <a href="{{isset($model['service8'])?URL::asset('public/uploads/card/original').'/'.$model['service8']:''}}" data-fancybox="gallery" ><img src="{{isset($model['service8'])?URL::asset('public/uploads/card/original').'/'.$model['service8']:''}}" class="img-fluid"></a>
                    @endif
                    @if(isset($model['service9']))
                    <a href="{{isset($model['service9'])?URL::asset('public/uploads/card/original').'/'.$model['service9']:''}}" data-fancybox="gallery" ><img src="{{isset($model['service9'])?URL::asset('public/uploads/card/original').'/'.$model['service9']:''}}" class="img-fluid"></a>
                    @endif
                    @if(isset($model['service10']))
                    <a href="{{isset($model['service10'])?URL::asset('public/uploads/card/original').'/'.$model['service10']:''}}" data-fancybox="gallery" ><img src="{{isset($model['service10'])?URL::asset('public/uploads/card/original').'/'.$model['service10']:''}}" class="img-fluid"></a>
                    @endif
                </div>
                

            </section>
            @endif

            <!-- Product -->
            @if(isset($model['product1_image']) || isset($model['product2_image'])  || isset($model['product3_image'])  || isset($model['product4_image'])  || isset($model['product5_image'])  || isset($model['product6_image'])  || isset($model['product7_image'])  || isset($model['product8_image'])  || isset($model['product9_image'])  || isset($model['product10_image']))
            <section id="product" class="product mb-3">
                <h2 class="h2">PRODUCTS</h2>
                @if(isset($model['product1_image']) && isset($model['product1_title']) && isset($model['product1_details']) && isset($model['product1_price']) )
                <div class="card p-3">
                    <img src="{{isset($model['product1_image'])?URL::asset('public/uploads/card/original').'/'.$model['product1_image']:''}}" class="img-fluid">

                    <h5>{{isset($model['product1_title'])?$model['product1_title']:'Basic'}}</h5>
                    <p>
                        {{isset($model['product1_details'])?$model['product1_details']:''}}
                    </p>
                    <div class="d-flex align-items-center justify-content-between">
                        <h6 class=" py-2 px-3 m-0">Price: {{isset($model['product1_price'])?$model['product1_price']:'00'}}/-</h6>

                        <a href="https://api.whatsapp.com/send?phone={{$wp_number}}&text=Hi {{isset($model['name'])?$model['name']:''}}, I want to know more about your {{isset($model['product2_title'])?$model['product1_title']:'Basic'}}" target="blank" class="btn1">Enquiry</a>
                    </div>
                </div>
                @endif
                @if(isset($model['product2_image']) && isset($model['product2_title']) && isset($model['product2_details']) && isset($model['product2_price']))
                <div class="card p-3">
                    <img src="{{isset($model['product2_image'])?URL::asset('public/uploads/card/original').'/'.$model['product2_image']:''}}" class="img-fluid">

                    <h5>{{isset($model['product2_title'])?$model['product2_title']:'Basic'}}</h5>
                    <p>
                        {{isset($model['product2_details'])?$model['product2_details']:''}}
                    </p>
                    <div class="d-flex align-items-center justify-content-between">
                        <h6 class=" py-2 px-3 m-0">Price: {{isset($model['product2_price'])?$model['product2_price']:'00'}}/-</h6>

                        <a href="https://api.whatsapp.com/send?phone={{$wp_number}}&text=Hi {{isset($model['name'])?$model['name']:''}}, I want to know more about your {{isset($model['product2_title'])?$model['product2_title']:'Basic'}}" target="blank" class="btn1">Enquiry</a>
                    </div>
                </div>
                @endif
                @if(isset($model['product3_image']) && isset($model['product3_title']) && isset($model['product3_details']) && isset($model['product3_price']))
                <div class="card p-3">
                    <img src="{{isset($model['product3_image'])?URL::asset('public/uploads/card/original').'/'.$model['product3_image']:''}}" class="img-fluid">

                    <h5>{{isset($model['product3_title'])?$model['product3_title']:'Basic'}}</h5>
                    <p>
                        {{isset($model['product3_details'])?$model['product3_details']:''}}
                    </p>
                    <div class="d-flex align-items-center justify-content-between">
                        <h6 class=" py-2 px-3 m-0">Price: {{isset($model['product3_price'])?$model['product3_price']:'00'}}/-</h6>

                        <a href="https://api.whatsapp.com/send?phone={{$wp_number}}&text=Hi {{isset($model['name'])?$model['name']:''}}, I want to know more about your {{isset($model['product2_title'])?$model['product3_title']:'Basic'}}" target="blank" class="btn1">Enquiry</a>
                    </div>
                </div>
                @endif

                @if(isset($model['product4_image']) && isset($model['product4_title']) && isset($model['product4_details']) && isset($model['product4_price']))
                <div class="card p-3">
                    <img src="{{isset($model['product4_image'])?URL::asset('public/uploads/card/original').'/'.$model['product4_image']:''}}" class="img-fluid">

                    <h5>{{isset($model['product4_title'])?$model['product4_title']:'Basic'}}</h5>
                    <p>
                        {{isset($model['product4_details'])?$model['product4_details']:''}}
                    </p>
                    <div class="d-flex align-items-center justify-content-between">
                        <h6 class=" py-2 px-3 m-0">Price: {{isset($model['product1_price'])?$model['product4_price']:'00'}}/-</h6>

                        <a href="https://api.whatsapp.com/send?phone={{$wp_number}}&text=Hi {{isset($model['name'])?$model['name']:''}}, I want to know more about your {{isset($model['product2_title'])?$model['product4_title']:'Basic'}}" target="blank" class="btn1">Enquiry</a>
                    </div>
                </div>
                @endif
                @if(isset($model['product5_image']) && isset($model['product5_title']) && isset($model['product5_details']) && isset($model['product5_price']))
                <div class="card p-3">
                    <img src="{{isset($model['product5_image'])?URL::asset('public/uploads/card/original').'/'.$model['product5_image']:''}}" class="img-fluid">

                    <h5>{{isset($model['product5_title'])?$model['product5_title']:'Basic'}}</h5>
                    <p>
                        {{isset($model['product5_details'])?$model['product5_details']:''}}
                    </p>
                    <div class="d-flex align-items-center justify-content-between">
                        <h6 class=" py-2 px-3 m-0">Price: {{isset($model['product5_price'])?$model['product5_price']:'00'}}/-</h6>

                        <a href="https://api.whatsapp.com/send?phone={{$wp_number}}&text=Hi {{isset($model['name'])?$model['name']:''}}, I want to know more about your {{isset($model['product2_title'])?$model['product5_title']:'Basic'}}" target="blank" class="btn1">Enquiry</a>
                    </div>
                </div>
                @endif
                @if(isset($model['product6_image']) && isset($model['product6_title']) && isset($model['product6_details']) && isset($model['product6_price']))
                <div class="card p-3">
                    <img src="{{isset($model['product6_image'])?URL::asset('public/uploads/card/original').'/'.$model['product6_image']:''}}" class="img-fluid">

                    <h5>{{isset($model['product6_title'])?$model['product6_title']:'Basic'}}</h5>
                    <p>
                        {{isset($model['product6_details'])?$model['product6_details']:''}}
                    </p>
                    <div class="d-flex align-items-center justify-content-between">
                        <h6 class=" py-2 px-3 m-0">Price: {{isset($model['product6_price'])?$model['product6_price']:'00'}}/-</h6>

                        <a href="https://api.whatsapp.com/send?phone={{$wp_number}}&text=Hi {{isset($model['name'])?$model['name']:''}}, I want to know more about your {{isset($model['product2_title'])?$model['product6_title']:'Basic'}}" target="blank" class="btn1">Enquiry</a>
                    </div>
                </div>
                @endif
                @if(isset($model['product7_image']) && isset($model['product7_title']) && isset($model['product7_details']) && isset($model['product7_price']))
                <div class="card p-3">
                    <img src="{{isset($model['product7_image'])?URL::asset('public/uploads/card/original').'/'.$model['product7_image']:''}}" class="img-fluid">

                    <h5>{{isset($model['product7_title'])?$model['product7_title']:'Basic'}}</h5>
                    <p>
                        {{isset($model['product7_details'])?$model['product7_details']:''}}
                    </p>
                    <div class="d-flex align-items-center justify-content-between">
                        <h6 class=" py-2 px-3 m-0">Price: {{isset($model['product7_price'])?$model['product7_price']:'00'}}/-</h6>

                        <a href="https://api.whatsapp.com/send?phone={{$wp_number}}&text=Hi {{isset($model['name'])?$model['name']:''}}, I want to know more about your {{isset($model['product2_title'])?$model['product7_title']:'Basic'}}" target="blank" class="btn1">Enquiry</a>
                    </div>
                </div>
                @endif
                @if(isset($model['product8_image']) && isset($model['product8_title']) && isset($model['product8_details']) && isset($model['product8_price']))
                <div class="card p-3">
                    <img src="{{isset($model['product8_image'])?URL::asset('public/uploads/card/original').'/'.$model['product8_image']:''}}" class="img-fluid">

                    <h5>{{isset($model['product8_title'])?$model['product8_title']:'Basic'}}</h5>
                    <p>
                        {{isset($model['product8_details'])?$model['product8_details']:''}}
                    </p>
                    <div class="d-flex align-items-center justify-content-between">
                        <h6 class=" py-2 px-3 m-0">Price: {{isset($model['product8_price'])?$model['product8_price']:'00'}}/-</h6>

                        <a href="https://api.whatsapp.com/send?phone={{$wp_number}}&text=Hi {{isset($model['name'])?$model['name']:''}}, I want to know more about your {{isset($model['product2_title'])?$model['product8_title']:'Basic'}}" target="blank" class="btn1">Enquiry</a>
                    </div>
                </div>
                @endif
                @if(isset($model['product9_image']) && isset($model['product9_title']) && isset($model['product9_details']) && isset($model['product9_price']))
                <div class="card p-3">
                    <img src="{{isset($model['product9_image'])?URL::asset('public/uploads/card/original').'/'.$model['product9_image']:''}}" class="img-fluid">

                    <h5>{{isset($model['product9_title'])?$model['product9_title']:'Basic'}}</h5>
                    <p>
                        {{isset($model['product9_details'])?$model['product9_details']:''}}
                    </p>
                    <div class="d-flex align-items-center justify-content-between">
                        <h6 class=" py-2 px-3 m-0">Price: {{isset($model['product9_price'])?$model['product9_price']:'00'}}/-</h6>

                        <a href="https://api.whatsapp.com/send?phone={{$wp_number}}&text=Hi {{isset($model['name'])?$model['name']:''}}, I want to know more about your {{isset($model['product9_title'])?$model['product2_title']:'Basic'}}" target="blank" class="btn1">Enquiry</a>
                    </div>
                </div>
                @endif
                @if(isset($model['product10_image']) && isset($model['product10_title']) && isset($model['product10_details']) && isset($model['product10_price']))
                <div class="card p-3">
                    <img src="{{isset($model['product10_image'])?URL::asset('public/uploads/card/original').'/'.$model['product10_image']:''}}" class="img-fluid">

                    <h5>{{isset($model['product10_title'])?$model['product10_title']:'Basic'}}</h5>
                    <p>
                        {{isset($model['product10_details'])?$model['product10_details']:''}}
                    </p>
                    <div class="d-flex align-items-center justify-content-between">
                        <h6 class=" py-2 px-3 m-0">Price: {{isset($model['product10_price'])?$model['product10_price']:'00'}}/-</h6>

                        <a href="https://api.whatsapp.com/send?phone={{$wp_number}}&text=Hi {{isset($model['name'])?$model['name']:''}}, I want to know more about your {{isset($model['product10_title'])?$model['product2_title']:'Basic'}}" target="blank" class="btn1">Enquiry</a>
                    </div>
                </div>
                @endif
            </section>
            @endif

            <!-- Gallery -->
            @if(isset($model['gallery1_image']) || isset($model['gallery2_image'])  || isset($model['gallery3_image'])  || isset($model['gallery4_image'])  || isset($model['gallery5_image'])  || isset($model['gallery6_image'])  || isset($model['gallery7_image'])  || isset($model['gallery8_image'])  || isset($model['gallery9_image'])  || isset($model['gallery10_image']))
            <section id="gallerypt" class="gallery mb-3">
                <h3>PHOTOS</h3>
                <div class="gallery-main">
                    @if(isset($model['gallery1_image']))
                    <a href="{{isset($model['gallery1_image'])?URL::asset('public/uploads/card/original').'/'.$model['gallery1_image']:''}}" data-fancybox="gallery"><img src="{{isset($model['gallery1_image'])?URL::asset('public/uploads/card/original').'/'.$model['gallery1_image']:''}}" class="img-fluid"></a>
                    @endif
                    @if(isset($model['gallery2_image']))
                    <a href="{{isset($model['gallery2_image'])?URL::asset('public/uploads/card/original').'/'.$model['gallery2_image']:''}}" data-fancybox="gallery"><img src="{{isset($model['gallery2_image'])?URL::asset('public/uploads/card/original').'/'.$model['gallery2_image']:''}}" class="img-fluid"></a>
                    @endif
                    @if(isset($model['gallery3_image']))
                    <a href="{{isset($model['gallery3_image'])?URL::asset('public/uploads/card/original').'/'.$model['gallery3_image']:''}}" data-fancybox="gallery"><img src="{{isset($model['gallery3_image'])?URL::asset('public/uploads/card/original').'/'.$model['gallery3_image']:''}}" class="img-fluid"></a>
                    @endif
                    @if(isset($model['gallery4_image']))
                    <a href="{{isset($model['gallery4_image'])?URL::asset('public/uploads/card/original').'/'.$model['gallery4_image']:''}}" data-fancybox="gallery"><img src="{{isset($model['gallery4_image'])?URL::asset('public/uploads/card/original').'/'.$model['gallery4_image']:''}}" class="img-fluid"></a>
                    @endif
                    @if(isset($model['gallery5_image']))
                    <a href="{{isset($model['gallery5_image'])?URL::asset('public/uploads/card/original').'/'.$model['gallery5_image']:''}}" data-fancybox="gallery"><img src="{{isset($model['gallery5_image'])?URL::asset('public/uploads/card/original').'/'.$model['gallery5_image']:''}}" class="img-fluid"></a>
                    @endif
                    @if(isset($model['gallery6_image']))
                    <a href="{{isset($model['gallery6_image'])?URL::asset('public/uploads/card/original').'/'.$model['gallery6_image']:''}}" data-fancybox="gallery"><img src="{{isset($model['gallery6_image'])?URL::asset('public/uploads/card/original').'/'.$model['gallery6_image']:''}}" class="img-fluid"></a>
                    @endif
                    @if(isset($model['gallery7_image']))
                    <a href="{{isset($model['gallery7_image'])?URL::asset('public/uploads/card/original').'/'.$model['gallery7_image']:''}}" data-fancybox="gallery" style="display:none" class="divGalleries"><img src="{{isset($model['gallery7_image'])?URL::asset('public/uploads/card/original').'/'.$model['gallery7_image']:''}}" class="img-fluid"></a>
                    @endif
                    @if(isset($model['gallery8_image']))
                    <a href="{{isset($model['gallery8_image'])?URL::asset('public/uploads/card/original').'/'.$model['gallery8_image']:''}}" data-fancybox="gallery" style="display:none" class="divGalleries"><img src="{{isset($model['gallery8_image'])?URL::asset('public/uploads/card/original').'/'.$model['gallery8_image']:''}}" class="img-fluid"></a>
                    @endif
                    @if(isset($model['gallery9_image']))
                    <a href="{{isset($model['gallery9_image'])?URL::asset('public/uploads/card/original').'/'.$model['gallery9_image']:''}}" data-fancybox="gallery" style="display:none" class="divGalleries"><img src="{{isset($model['gallery9_image'])?URL::asset('public/uploads/card/original').'/'.$model['gallery9_image']:''}}" class="img-fluid"></a>
                    @endif
                    @if(isset($model['gallery10_image']))
                    <a href="{{isset($model['gallery10_image'])?URL::asset('public/uploads/card/original').'/'.$model['gallery10_image']:''}}" data-fancybox="gallery" style="display:none" class="divGalleries"><img src="{{isset($model['gallery10_image'])?URL::asset('public/uploads/card/original').'/'.$model['gallery10_image']:''}}" class="img-fluid"></a>
                    @endif
                </div>
                <a style="text-align:center;font-weight:bold;" onclick="showGalleries()" id="btnShowGalleries">Show More</a>

            </section>
            @endif
            <!-- Video -->
            @if(isset($model['youtube_video_1']) || isset($model['youtube_video_1']))
            <section id="videos" class="gallery mb-3">
                <h3>VIDEOS</h3>
                <div class="gallery-main">
                    @if(isset($model['youtube_video_1']))
                    <div class="card p-3" style="width:100%;height:15rem;">
                        <iframe src="https://www.youtube.com/embed/{{isset($model['youtube_video_1'])?$model['youtube_video_1']:''}}" width="100%" height="100%"
                                frameborder="0"
                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                    </div>
                    @endif
                    @if(isset($model['youtube_video_2']))
                    <div class="card p-3" style="width:100%;height:15rem;">
                        <iframe src="https://www.youtube.com/embed/{{isset($model['youtube_video_2'])?$model['youtube_video_2']:''}}" width="100%" height="100%"
                                frameborder="0"
                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                    </div>
                    @endif
                    @if(isset($model['youtube_video_3']))
                    <div class="card p-3" style="width:100%;height:15rem;">
                        <iframe src="https://www.youtube.com/embed/{{isset($model['youtube_video_3'])?$model['youtube_video_3']:''}}" width="100%" height="100%"
                                frameborder="0"
                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                    </div>
                    @endif
                    @if(isset($model['youtube_video_4']))
                    <div class="card p-3" style="width:100%;height:15rem;">
                        <iframe src="https://www.youtube.com/embed/{{isset($model['youtube_video_4'])?$model['youtube_video_4']:''}}" width="100%" height="100%"
                                frameborder="0"
                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                    </div>
                    @endif
                </div>

            </section>
            @endif
            <!-- Payment Details -->
            @if(isset($model['gpay_number']) || isset($model['phonepay_number'])  || isset($model['paytm_number'])  || isset($model['upi_number'])  || isset($model['bank_name'])  || isset($model['branch_name'])  || isset($model['account_no'])  || isset($model['customer_id'])  || isset($model['swift_code'])  || isset($model['account_holder']) || isset($model['ifsc_code']) || isset($model['micr_code']) || isset($model['bank_address']))
            <section id="payment" class="product mb-3">
                <h2 class="h2">Payment Details</h2>
                <p><strong>WALLET:</strong></p>

                <ul>
                    @if(isset($model['gpay_number']))
                    <li>Gpay&nbsp; &nbsp; &nbsp;: {{isset($model['gpay_number'])?$model['gpay_number']:''}} @if(isset($model['gpay_QR']))<img src="{{URL::asset('public/uploads/card/original').'/'.$model['gpay_QR']}}"  width="auto" style="padding-left:0px;height:250px;width:100%;">@endif</li>
                    @endif
                    @if(isset($model['phonepay_number']))
                    <li>PhonePe : {{isset($model['phonepay_number'])?$model['phonepay_number']:''}} @if(isset($model['phonepay_QR']))<img src="{{URL::asset('public/uploads/card/original').'/'.$model['phonepay_QR']}}" style="padding-left:0px;height:250px;width:100%;" width="auto">@endif</li>
                    @endif
                    @if(isset($model['paytm_number']))
                    <li>PayTM&nbsp; &nbsp;: {{isset($model['paytm_number'])?$model['paytm_number']:''}} @if(isset($model['paytm_QR']))<img src="{{URL::asset('public/uploads/card/original').'/'.$model['paytm_QR']}}" style="padding-left:0px;height:250px;width:100%;">@endif</li>
                    @endif
                </ul>

                <p><strong>UPI:</strong></p>
                @if(isset($model['upi_number']))
                <p>{{isset($model['upi_number'])?$model['upi_number']:''}}@if(isset($model['upi_QR'])) <img src="{{URL::asset('public/uploads/card/original').'/'.$model['upi_QR']}}" style="padding-left:10rem;">@endif</p>
                @endif
            @if( isset($model['bank_name'])  || isset($model['branch_name'])  || isset($model['account_no'])  || isset($model['customer_id'])  || isset($model['swift_code'])  || isset($model['account_holder']) || isset($model['ifsc_code']) || isset($model['micr_code']) || isset($model['bank_address']))

                <p><strong>BANK DETAILS:</strong></p>

                <p>
                @if(isset($model['bank_name']))
                Bank Name - {{isset($model['bank_name'])?$model['bank_name']:''}}<br />
                @endif
                @if(isset($model['branch_name']))
                    Branch - {{isset($model['branch_name'])?$model['branch_name']:''}}<br />
                    @endif
                @if(isset($model['account_no']))
                    Account no - {{isset($model['account_no'])?$model['account_no']:''}}<br />
                    @endif
                @if(isset($model['customer_id']))
                    Customer Id - {{isset($model['customer_id'])?$model['customer_id']:''}}<br />
                    @endif
                @if(isset($model['swift_code']))
                    Swift code - {{isset($model['swift_code'])?$model['swift_code']:''}}<br />
                    @endif
                @if(isset($model['account_holder']))
                    Account Holder - {{isset($model['account_holder'])?$model['account_holder']:''}}<br />
                    @endif
                @if(isset($model['ifsc_code']))
                    IFSC CODE - {{isset($model['ifsc_code'])?$model['ifsc_code']:''}}&nbsp;<br />
                    @endif
                @if(isset($model['micr_code']))
                    MICR Code - {{isset($model['micr_code'])?$model['micr_code']:''}}<br />
                    @endif
                @if(isset($model['bank_address']))
                    Address - {{isset($model['bank_address'])?$model['bank_address']:''}}&nbsp;
                    &nbsp;
                    @endif
                </p>
            @endif

            </section>
            @endif


            <!-- Enquiry -->
            <section id="enquiry" class="enquiry">
                <h3>ENQUIRY FORM</h3>

                <form class="mb-3 login-input" id="contact-form" action="{{ Route('contactUs') }}" method="POST">
                    @csrf
                    <div>
                        <input type="hidden" class="form-control" name="user_id" id="user_id" value="{{$user_id}}">
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Enter name">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Enter email">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="phone"   placeholder="Your Phone">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <textarea name="message" class="form-control" rows="3" cols="5" placeholder="Message"></textarea>
                            <span class="help-block"></span>
                        </div>
                        <button type="submit" class="btn1" id="btnSubmitc">
                            Send Message
                        </button>
                    </div>
                </form>
            </section>
            <section class="mt-1 p-1 copy-right">
                <div class="text-center">
                    <a href="{{route('/')}}" target="_blank" class="text-white"><p>{!! $copyright_text->content_body !!}</p></a>
                </div>
            </section>

            <!-- footer navigation -->
            <footer>
            <div class="footer-menu">
                <ul>
                    <li><a href="#home"><i class="fa fa-home"></i>Home</a></li>
                        <li><a href="#about"><i class="fa fa-pencil-square-o" ></i>About Us</a></li>
                        <li><a href="#services"><i class="fa fa-cogs"></i>Services</a></li>
                        <li><a href="#product"><i class="fa fa-gift"></i>Products</a></li>
        
                        <li><a href="#gallerypt"><i class="fa fa-image"></i>Photos</a></li>

                        <li><a href="#videos"><i class="fa fa-video-camera"></i>Videos</a></li>
                        <li><a href="#payment"><i class="fa fa-money"></i>Payment</a></li>
                    <li><a href="#enquiry"><i class="fa fa-list-alt"></i>Enquiry</a></li>
                </ul>
            </div>
        </footer>
            <!-- // footer navigation -->



        </main>

        <div class="remodal" data-remodal-id="share" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
            <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
            <div>
                <h6 id="modal1Title">Share Profile</h6>
                <h5 style="font-weight: 300; margin-top: 30px">Share This Digital Business Card.</h5>
                <div class="social-container mb-4 mt-4">
                    <!-- AddToAny BEGIN -->
                    <?php
                    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
                        $url = "https%3A%2F%2F";
                    else
                        $url = "http%3A%2F%2F";
                    // Append the host(domain name, ip) to the URL.   
                    $url .= $_SERVER['HTTP_HOST'];

                    // Append the requested resource location to the URL   
                    $url .= $_SERVER['REQUEST_URI'];

                    
                    ?> 
                    <div>
                        <a href="https://www.addtoany.com/add_to/facebook?linkurl={{$url}}&amp;linkname=Please check my new digital visiting card" target="_blank"><img src="https://static.addtoany.com/buttons/facebook.svg" width="32" height="32" style="background-color:royalblue"></a>
                        <a href="https://www.addtoany.com/add_to/twitter?linkurl={{$url}}&amp;linkname=Please check my new digital visiting card" target="_blank"><img src="https://static.addtoany.com/buttons/twitter.svg" width="32" height="32" style="background-color:royalblue"></a>
                        <a href="https://www.addtoany.com/add_to/email?linkurl={{$url}}&amp;linkname=Please check my new digital visiting card" target="_blank"><img src="https://static.addtoany.com/buttons/email.svg" width="32" height="32" style="background-color:royalblue"></a>
                        <a href="https://www.addtoany.com/add_to/linkedin?linkurl={{$url}}&amp;linkname=Please check my new digital visiting card" target="_blank"><img src="https://static.addtoany.com/buttons/linkedin.svg" width="32" height="32" style="background-color:royalblue"></a>
                        <a href="https://www.addtoany.com/add_to/whatsapp?linkurl={{$url}}&amp;linkname=Please check my new digital visiting card" target="_blank"><img src="https://static.addtoany.com/buttons/whatsapp.svg" width="32" height="32" style="background-color:royalblue"></a>
                        <a href="https://www.addtoany.com/add_to/skype?linkurl={{$url}}&amp;linkname=Please check my new digital visiting card" target="_blank"><img src="https://static.addtoany.com/buttons/skype.svg" width="32" height="32" style="background-color:royalblue"></a>
                        <a href="https://www.addtoany.com/add_to/sms?linkurl={{$url}}&amp;linkname=Please check my new digital visiting card" target="_blank"><img src="https://static.addtoany.com/buttons/sms.svg" width="32" height="32" style="background-color:royalblue"></a>
                        <a href="https://www.addtoany.com/add_to/wechat?linkurl={{$url}}&amp;linkname=Please check my new digital visiting card" target="_blank"><img src="https://static.addtoany.com/buttons/wechat.svg" width="32" height="32" style="background-color:royalblue"></a>
                        <a href="https://www.addtoany.com/add_to/yahoo_mail?linkurl={{$url}}&amp;linkname=Please check my new digital visiting card" target="_blank"><img src="https://static.addtoany.com/buttons/yahoo.svg" width="32" height="32" style="background-color:royalblue"></a>
                        <a href="https://www.addtoany.com/add_to/google_gmail?linkurl={{$url}}&amp;linkname=Please check my new digital visiting card" target="_blank"><img src="https://static.addtoany.com/buttons/gmail.svg" width="32" height="32" style="background-color:royalblue"></a>
                        <a href="https://www.addtoany.com/add_to/facebook_messenger?linkurl={{$url}}&amp;linkname=Please check my new digital visiting card" target="_blank"><img src="https://static.addtoany.com/buttons/facebook_messenger.svg" width="32" height="32" style="background-color:royalblue"></a>
                    </div>
                </div>
            </div>
        </div>

        <script src="{{ URL::asset('/public/card/js/remodal.js') }}"></script>
        <script src="{{ URL::asset('/public/card/js/Contact.js') }}"></script>
        <script src="{{ URL::asset('/public/card/js/notify.min.js') }}"></script>
        <script src="{{ URL::asset('public/frontend/custom/iao-alert/iao-alert.min.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('public/frontend/custom/js/script.js') }}" type="text/javascript"></script>
        <script>
                    function showServices() {
                        
                        $('.divServices').show();
                        $('#btnShowServices').attr('style', 'display:none');
                    }

                    function showGalleries() {
                        
                        $('.divGalleries').show();
                        $('#btnShowGalleries').attr('style', 'display:none');
                    }

                    function showVideos() {
                        $('.divVideos').show();
                        $('#btnShowVideos').hide();
                    }

                    function shareViaWhatsapp() {
                        var phoneNo = $('#txtWhatsappNo').val().replace('+', '');
                        var newPhone='91'+phoneNo;
                        // alert(newPhone);
                        window.open('https://api.whatsapp.com/send?phone=' + newPhone + '&text=Please Check My Digital Business Card. ' + window.location.href, '_blank');
                    }
        </script>
    </body>
</html>
