@extends ('layouts.app')
@section ('content')
    @if(0)
    <style>
       .secondary-nav-layout2, .secondary-nav-sticky {
    -webkit-transition: all .4s ease;
    transition: all .4s ease;
    background-color: #091d3e;
    border-bottom-color: #091d3e;
}
.secondary-nav {
    top: 94px;
    z-index: 600;
    border-bottom: 1px solid #e7ebef;
}   
.pb-0, .py-0 {
    padding-bottom: 0!important;
}
.pt-0, .py-0 {
    padding-top: 0!important;
}
@supports ((position:-webkit-sticky) or (position:sticky))
.sticky-top {
    position: -webkit-sticky;
    position: sticky;
    top: 10;
    z-index: 1020;
}
section {
    position: relative;
    padding-top: 110px;
    padding-bottom: 110px;
}
section {
    display: block;
}
   .nav-tabs {
    border-bottom: none;
}
.justify-content-center {
    -ms-flex-pack: center!important;
    justify-content: center!important;
}
.nav {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    padding-left: 0;
    margin-bottom: 0;
    list-style: none;
}
.secondary-nav-layout2 .nav-tabs .nav__link.active, .secondary-nav-layout2 .nav-tabs .nav__link:hover, .secondary-nav-sticky .nav-tabs .nav__link.active, .secondary-nav-sticky .nav-tabs .nav__link:hover {
    color: #fff;
}
.secondary-nav-layout2 .nav-tabs .nav__link, .secondary-nav-sticky .nav-tabs .nav__link {
    padding: 15px 0;
    font-size: 14px;
    color: #848e9f;
}
.nav-tabs .nav__link {
    display: block;
    position: relative;
    padding: 22px 0;
    margin: 0 30px 0 0;
    text-transform: capitalize;
    font-size: 15px;
    font-weight: 700;
    line-height: 1;
    color: #848e9f;
}
a {
    color: #0092ff;
    -webkit-transition: color .3s ease;
    transition: color .3s ease;
}
a {
    color: #007bff;
    text-decoration: none;
    background-color: transparent;
}

.mb-40 {
    margin-bottom: 40px!important;
}
.heading__subtitle {
    font-family: Roboto,sans-serif;
    font-size: 15px;
    color: #848e9f;
    margin-bottom: 12px;
}
.heading-layout2 .heading__title {
    font-size: 40px;
}
.heading__title {
    /*font-size: 37px;*/
    margin-bottom: 20px;
}
@media (min-width: 1200px)
.offset-xl-1 {
    margin-left: 8.333333%;
} 
@media (min-width: 1200px)
.col-xl-6 {
    -ms-flex: 0 0 50%;
    flex: 0 0 50%;
    max-width: 50%;
}
@media (min-width: 992px)
.col-lg-12 {
    -ms-flex: 0 0 100%;
    flex: 0 0 100%;
    max-width: 100%;
}   
@media (min-width: 768px)
.col-md-12 {
    -ms-flex: 0 0 100%;
    flex: 0 0 100%;
    max-width: 100%;
}    
@media (min-width: 576px)
.col-sm-12 {
    -ms-flex: 0 0 100%;
    flex: 0 0 100%;
    max-width: 100%;
}
h1, h2, h3, h4, h5, h6 {
    color: #1f314f;
    font-family: "IBM Plex Sans",sans-serif;
    text-transform: capitalize;
    font-weight: 700;
    line-height: 1.3;
    margin-bottom: 20px;
}
@media (min-width: 1200px)
.about-layout2 .about-text-wrapper {
    margin-left: 50px;
}
.about-layout2 .about__Text {
    position: relative;
    padding-left: 40px;
}
.about-layout2 .about__Text:before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 2px;
    height: 100%;
    background-color: #091d3e;
}
*, ::after, ::before {
    box-sizing: border-box;
}
.about__Text p {
    font-size: 16px;
}
.mb-30 {
    margin-bottom: 30px!important;
}
.font-weight-bold {
    font-weight: 700!important;
}
p {
    /*font-size: 15px;*/
    line-height: 1.6;
    /*margin-bottom: 15px;*/
}
p {
    margin-top: 0;
    /*margin-bottom: 1rem;*/
}
.btn:not(:disabled):not(.disabled) {
    cursor: pointer;
}
.btn__icon {
    display: -ms-inline-flexbox;
    /*display: -webkit-inline-box;*/
    display: inline-flex;
    -webkit-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between;
    -ms-flex-align: center;
    -webkit-box-align: center;
    align-items: center;
    padding: 0 20px;
}
.btn__primary {
    background-color: #0092ff;
    color: #fff;
}
.btn {
    text-transform: capitalize;
    position: relative;
    z-index: 1;
    font-size: 15px;
    font-weight: 700;
    min-width: 170px;
    height: 60px;
    line-height: 60px;
    text-align: center;
    /*padding: 0 15px;*/
    letter-spacing: 1px;
    border: 0;
    border-radius: 3px;
    overflow: hidden;
    /*-webkit-transition: all .3s linear;*/
    transition: all .3s linear;
}
.mt-30 {
    margin-top: 30px!important;
}
.btn:not(.btn__link):not(.btn__outlined):before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: -1;
    background-color: #091d3e;
    /*-webkit-transform: scaleX(0);*/
    transform: scaleX(0);
    /*-webkit-transform-origin: right center;*/
    transform-origin: right center;
    /*-webkit-transition: transform .24s cubic-bezier(.37,.31,.31,.9);*/
    /*-webkit-transition: -webkit-transform .24s cubic-bezier(.37,.31,.31,.9);*/
    /*transition: -webkit-transform .24s cubic-bezier(.37,.31,.31,.9);*/
    /*transition: transform .24s cubic-bezier(.37,.31,.31,.9);*/
    transition: transform .24s cubic-bezier(.37,.31,.31,.9),-webkit-transform .24s cubic-bezier(.37,.31,.31,.9);
}
.btn__primary .icon-arrow-left, .btn__primary .icon-arrow-right {
    color: #0092ff;
    background-color: #fff;
}
.btn .icon-arrow-left, .btn .icon-arrow-right {
    width: 24px;
    height: 24px;
    line-height: 24px;
    border-radius: 50%;
    text-align: center;
    display: inline-block;
    /*-webkit-transition: all .3s linear;*/
    transition: all .3s linear;
}
.btn__icon i, .btn__icon span {
    margin: 0 5px;
}
.icon-arrow-right {
    font-size: 65%;
}
[class*=" icon-"], [class^=icon-] {
    font-family: icomoon !important;
    speak: none;
    font-style: normal;
    font-weight: 400;
    font-variant: normal;
    text-transform: none;
    /*line-height: 1;*/
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
.about__img {
    position: relative;
}
.about__img img {
    border-radius: 3px;
    max-width: 100%;
    inline-size: -webkit-fill-available;
}
.about-layout2 .blockquote {
    position: absolute;
    bottom: 0;
    right: 0;
    padding: 45px;
    max-width: 340px;
    border-radius: 5px 0 5px 0;
    background-color: #091d3e;
}
.blockquote {
    margin-bottom: 1rem;
    font-size: 1.25rem;
}
.about-layout2 .blockquote:before {
    content: "";
    bottom: -10px;
    left: 45px;
    position: absolute;
    display: block;
    border-top: 0 solid transparent;
    border-bottom: 10px solid transparent;
    border-left: 12px solid #091d3e;
}   
.about-layout2 .blockquote .blockquote__title {
    color: #fff;
    font-size: 17px;
    font-weight: 600;
    font-style: italic;
    line-height: 1.5;
    margin-bottom: 17px;
}
.about-layout2 .blockquote:after {
    content: "\e91b";
    font-family: icomoon;
    position: absolute;
    left: 50px;
    top: -20px;
    font-size: 50px;
    line-height: 1;
    color: #fff;
}
.about-layout2 .blockquote .blockquote__author {
    position: relative;
    padding-left: 20px;
    font-size: 14px;
    font-weight: 700;
    color: #848e9f;
}
.about-layout2 .blockquote .blockquote__author:after {
    content: '';
    position: absolute;
    left: 0;
    top: 50%;
    /*-webkit-transform: translateY(-50%);*/
    transform: translateY(-50%);
    width: 10px;
    height: 2px;
    background-color: #0092ff;
    font-size: 14px;
    font-weight: 700;
}




        
    </style>
    
    <section class="page-title page-title-layout1 bg-overlay bg-overlay-gradient bg-parallax text-center bg-img" style="background-image: url(https://oohapp.io/uploads/0000/1/2023/02/22/rishikesh.jpg); background-size: cover; background-position: center center;">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6 offset-xl-3">
                    <h1 class="pagetitle__heading">About Us</h1>
                    <p class="pagetitle__desc mb-0">We are experienced professionals who understand that It services is
                        changing, and are true partners who care about your success.
                    </p>
                </div>
                <!-- /.col-xl-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    
    <section class="secondary-nav sticky-top py-0 secondary-nav-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="nav nav-tabs justify-content-center">
                        <a href="about-us.html" class="nav__link active">About Us</a>
                        <a href="why-us.html" class="nav__link">Why Choose Us</a>
                        <a href="leadership-team.html" class="nav__link">Leadership Team</a>
                        <a href="awards.html" class="nav__link">Awards &amp; Recognition</a>
                        <a href="pricing.html" class="nav__link">Pricing &amp; Plans</a>
                        <a href="faqs.html" class="nav__link">Help &amp; FAQs</a>
                        <a href="careers.html" class="nav__link">Careers</a>
                    </nav>
                </div>
                <!-- /.col-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    
    <section class="about-layout2 pt-130 pb-90">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-5">
                    <div class="about__img mb-40">
                        <img src="https://oohapp.io/uploads/0000/1/2023/02/22/rishikesh.jpg" alt="about">
                        <blockquote class="blockquote mb-0">
                            <h4 class="blockquote__title">You are helping to lead the charge; we can help you build on your
                                past successes and prepare for your great future.
                            </h4>
                            <span class="blockquote__author">John Peter, Founder</span>
                        </blockquote>
                    </div>
                    <!-- /.about-img -->
                </div>
                <!-- /.col-xl-5 -->
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6 offset-xl-1">
                    <div class="heading-layout2 mb-40">
                        <h2 class="heading__subtitle">Improve Efficiency and Provide Better Experiences!</h2>
                        <h3 class="heading__title">Keep Your Business Safe &amp; Ensure High Availability.</h3>
                    </div>
                    <!-- /heading -->
                    <div class="about-text-wrapper">
                        <div class="about__Text">
                            <p class="font-weight-bold mb-30">As one of the world's largest ITService Providers, our deep pool of
                                over
                                130 certified engineers and IT
                                support staff are ready to help.
                            </p>
                            <p>Provide users with appropriate view and access permissions to requests, problems, changes, contracts,
                                assets, solutions, and reports with our experienced professionals.
                            </p>
                        </div>
                        <a href="#" class="btn btn__primary btn__icon mt-30">
                        <span>Schedule An Appointment</span><i class="icon-arrow-right"></i>
                        </a>
                        <ul class="list-items list-items-layout2 list-unstyled mb-0 mt-60">
                            <li>Delivered in more than 450,000 client’s interactions </li>
                            <li>Provided by experts to help challenge critical activities</li>
                            <li>Complemented with peer perspectives and advice</li>
                        </ul>
                    </div>
                </div>
                <!-- /.col-xl-7 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    
    @endif

    @if($row->template_id)
        <div class="page-template-content sssssss">
            {!! $row->getProcessedContent() !!}
        </div>
    @else
        <div class="container " style="padding-top: 40px;padding-bottom: 40px;">
            <h1>{!! clean($translation->title) !!}</h1>
            <div class="blog-content">
                {!! $translation->content !!}
            </div>
        </div>
    @endif
@endsection
