<?php include(APPPATH . 'controllers/__ui/core/pages/backend/header.ui.php') ?>
<script type="text/javascript" src="<?=$assets?>plugins/pusaka/DataTable/PusakaDatatableClient.js"></script>

<!-- start page-wrapper -->
<div class="page-wrapper">

<!-- start preloader -->
<div class="preloader">
    <div class="inner">
        <span class="icon"><i class="fi flaticon-two"></i></span>
    </div>
</div>
<!-- end preloader -->


<!-- strat music-box -->
<div class="music-box">
    <button class="music-box-toggle-btn">
        <i class="fa fa-music"></i>
    </button>

    <div class="music-holder">
        <iframe
            src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/107132291&amp;auto_play=true&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true"></iframe>
    </div>
</div>
<!-- end music box -->


<!-- start of hero -->
<section class="hero">
    <!-- <div class="hero-slider hero-slider-s1">
        <div class="slide-item">
            <img src="<?=$assets?>wedding/images/slider/slide-1.jpg" alt class="slider-bg">
        </div>

        <div class="slide-item">
            <img src="<?=$assets?>wedding/images/slider/slide-2.jpg" alt class="slider-bg">
        </div>
    </div> -->

    <div class="static-hero"></div>
    <div id="spirit-header" class="spirit-header">
        <canvas id="spirit-canvas"></canvas>
    </div>

    <div class="wedding-announcement">
        <div class="couple-name-merried-text">
            <h2 class="wow slideInUp" data-wow-duration="1s">Wahyuni &amp; Ade</h2>
            <div class="married-text wow fadeIn" data-wow-delay="1s">
                <h4 class="">
                    <span class=" wow fadeInUp" data-wow-delay="1.05s">W</span>
                    <span class=" wow fadeInUp" data-wow-delay="1.10s">e</span>
                    <span class=" wow fadeInUp" data-wow-delay="1.15s">'</span>
                    <span class=" wow fadeInUp" data-wow-delay="1.20s">r</span>
                    <span class=" wow fadeInUp" data-wow-delay="1.25s">e</span>
                    <span>&nbsp;</span>
                    <span class=" wow fadeInUp" data-wow-delay="1.30s">g</span>
                    <span class=" wow fadeInUp" data-wow-delay="1.35s">e</span>
                    <span class=" wow fadeInUp" data-wow-delay="1.40s">t</span>
                    <span class=" wow fadeInUp" data-wow-delay="1.45s">t</span>
                    <span class=" wow fadeInUp" data-wow-delay="1.50s">i</span>
                    <span class=" wow fadeInUp" data-wow-delay="1.55s">n</span>
                    <span class=" wow fadeInUp" data-wow-delay="1.60s">g</span>
                    <span>&nbsp;</span>
                    <span class=" wow fadeInUp" data-wow-delay="1.65s">m</span>
                    <span class=" wow fadeInUp" data-wow-delay="1.70s">a</span>
                    <span class=" wow fadeInUp" data-wow-delay="1.75s">r</span>
                    <span class=" wow fadeInUp" data-wow-delay="1.80s">r</span>
                    <span class=" wow fadeInUp" data-wow-delay="1.85s">i</span>
                    <span class=" wow fadeInUp" data-wow-delay="1.90s">e</span>
                    <span class=" wow fadeInUp" data-wow-delay="1.95s">d</span>

                </h4>
            </div>
            <!-- <i class="fa fa-heart"></i> -->
        </div>

        <div class="save-the-date">
            <h4>Save the date</h4>
            <span class="date">Saturday, 15 August 2020</span>
        </div>
    </div>
</section>
<!-- end of hero slider -->


<!-- Start header -->
<header id="header" class="site-header header-style-1">
    <nav class="navigation navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="open-btn">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="couple-logo">
                    <h1><a href="#home">W <i class="fi flaticon-shape-1"></i> A</a></h1>
                </div>
            </div>
            <div id="navbar" class="navbar-collapse collapse navbar-right navigation-holder">
                <button class="close-navbar"><i class="fa fa-close"></i></button>
                <ul class="nav navbar-nav">
                    <li><a href="#home">Home</a></li>
                    <li><a href="#couple">Couple</a></li>
                    <li><a href="#story">Story</a></li>
                    <li><a href="#events">Events</a></li>
                    <li><a href="#gallery">Gallery</a></li>
                    <li><a href="#rsvp">Ucapan</a></li>
                    <li><a href="#gift">Gift</a></li>
                </ul>
            </div><!-- end of nav-collapse -->
        </div><!-- end of container -->
    </nav>
</header>
<!-- end of header -->


<!-- start wedding-couple-section -->
<section class="wedding-couple-section section-padding" id="couple">
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
                <div class="gb groom">
                    <div class="img-holder wow fadeInLeftSlow">
                        <img src="<?=$assets?>wedding/images/couple/img-1.jpg" alt>
                    </div>
                    <div class="details">
                        <div class="details-inner">
                            <h3>Pengantin Pria</h3>
                            <p>Hi I am Ade , dummy text of the printing and typesetting industry. Lorem Ipsum
                                has been the industry's standard dummy text ever since the 1500s, when an
                                unknown printer took a galley of type and scrambled it to make a type specimen
                                book. It has survived not only five centuries.</p>
                            <span class="signature">Ade Sulaeman</span>
                            <ul class="social-links">
                                <li><a href="https://www.facebook.com/adeessulaeman/" target="_blank"><i
                                            class="fa fa-facebook"></i></a></li>
                                <li><a href="https://www.twitter.com/adeesulaeman/" target="_blank"><i
                                            class="fa fa-twitter"></i></a></li>
                                <li><a href="https://www.instagram.com/adeesulaeman/" target="_blank"><i
                                            class="fa fa-instagram"></i></a></li>
                                <li><a href="https://www.linkedin.com/in/adesulaeman/" target="_blank"><i
                                            class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="gb bride">
                    <div class="details">
                        <div class="details-inner">
                            <h3>Pengantin Wanita</h3>
                            <p>Hi I am Wahyuni , dummy text of the printing and typesetting industry. Lorem
                                Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                unknown printer took a galley of type and scrambled it to make a type specimen
                                book. It has survived not only five centuries.</p>
                            <span class="signature">Wahyuni</span>
                            <ul class="social-links">
                                <li><a href="https://www.facebook.com/wahyuni.fazd/" target="_blank"><i
                                            class="fa fa-facebook"></i></a></li>
                                <li><a href="https://www.twitter.com/wahyuninee/" target="_blank"><i
                                            class="fa fa-twitter"></i></a></li>
                                <li><a href="https://www.instagram.com/wahyunine/" target="_blank"><i
                                            class="fa fa-instagram"></i></a></li>
                                <li><a href="https://www.linkedin.com/in/wahyuni-b-mgmt-s-m-4b8493175/"
                                        target="_blank"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="img-holder wow fadeInRightSlow">
                        <img src="<?=$assets?>wedding/images/couple/img-2.jpg" alt>
                    </div>
                </div>
            </div>
        </div> <!-- end row -->
    </div> <!-- end container -->
</section>
<!-- end wedding-couple-section -->


<!-- start count-down-section -->
<section class="count-down-section section-padding parallax" data-bg-image="<?=$assets?>wedding/images/countdown-bg.jpg"
    data-speed="7">
    <div class="container">
        <div class="row">
            <div class="col col-md-4">
                <h2><span>We are waiting for.....</span> The A &amp; W Journey</h2>
            </div>
            <div class="col col-md-7 col-md-offset-1">
                <div class="count-down-clock">
                    <div id="clock">

                    </div>
                </div>
            </div>
        </div> <!-- end row -->
    </div> <!-- end container -->
</section>
<!-- end count-down-section -->


<!-- start story-section -->
<section class="story-section section-padding" id="story">
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
                <div class="section-title">
                    <div class="vertical-line"><span><i class="fi flaticon-two"></i></span></div>
                    <h2>Our love story</h2>
                </div>
            </div>
        </div> <!-- end section-title -->

        <div class="row">
            <div class="col col-xs-12">
                <div class="story-timeline">
                    <div class="row">
                        <div class="col col-md-6">
                            <div class="story-text right-align-text">
                                <h3>Start Journey</h3>
                                <span class="date">Bandung, 7 Juli 2018</span>
                                <p>Awal perjalanan.</p>
                            </div>
                        </div>
                        <div class="col col-md-6">
                            <div class="img-holder right-align-text story-slider">
                                <img src="<?=$assets?>wedding/images/story/bandung/1.JPG" alt class="img img-responsive">
                                <img src="<?=$assets?>wedding/images/story/bandung/2.JPG" alt class="img img-responsive">
                                <img src="<?=$assets?>wedding/images/story/bandung/3.JPG" alt class="img img-responsive">
                                <img src="<?=$assets?>wedding/images/story/bandung/4.JPG" alt class="img img-responsive">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-6">
                            <div class="img-holder right-align-text story-slider">
                                <img src="<?=$assets?>wedding/images/story/cikole/1.JPG" alt class="img img-responsive">
                                <img src="<?=$assets?>wedding/images/story/cikole/2.JPG" alt class="img img-responsive">
                                <img src="<?=$assets?>wedding/images/story/cikole/3.JPG" alt class="img img-responsive">
                            </div>
                        </div>
                        <div class="col col-md-6 text-holder">
                            <span class="heart">
                                <i class="fa fa-heart"></i>
                            </span>
                            <div class="story-text">
                                <h3>Orchid Forest</h3>
                                <span class="date">Cikole, 2018</span>
                                <p>Memulai Perjalanan</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-6 text-holder right-heart">
                            <span class="heart">
                                <i class="fa fa-heart"></i>
                            </span>
                            <div class="story-text right-align-text">
                                <h3>Graduate</h3>
                                <span class="date">Jakarta, 2018</span>
                                <p>Meraih Pencapain Perjalanan</p>
                            </div>
                        </div>
                        <div class="col col-md-6">
                            <div class="img-holder right-align-text story-slider">
                                <img src="<?=$assets?>wedding/images/story/graduate/1.JPG" alt class="img img-responsive">
                                <img src="<?=$assets?>wedding/images/story/graduate/2.JPG" alt class="img img-responsive">
                                <img src="<?=$assets?>wedding/images/story/graduate/3.JPG" alt class="img img-responsive">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-6">
                            <div class="img-holder video-holder right-align-text story-slider">
                                <img src="<?=$assets?>wedding/images/story/venice/1.JPG" alt class="img img-responsive">
                                <img src="<?=$assets?>wedding/images/story/venice/2.JPG" alt class="img img-responsive">
                                <img src="<?=$assets?>wedding/images/story/venice/3.JPG" alt class="img img-responsive">
                                <img src="<?=$assets?>wedding/images/story/venice/4.JPG" alt class="img img-responsive">
                                <img src="<?=$assets?>wedding/images/story/venice/5.JPG" alt class="img img-responsive">
                                <img src="<?=$assets?>wedding/images/story/venice/6.JPG" alt class="img img-responsive">
                                <a href="https://www.youtube.com/embed/yQpMN1iMGPk?autoplay=1"
                                    data-type="iframe" class="video-play-btn">
                                    <i class="fa fa-play"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col col-md-6 text-holder">
                            <span class="heart">
                                <i class="fa fa-heart"></i>
                            </span>
                            <div class="story-text">
                                <h3>Venice</h3>
                                <span class="date">Kota Bunga, 2018</span>
                                <p>Mewujudkan Mimpi-Mimpi Perjalanan</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-6 text-holder right-heart">
                            <span class="heart">
                                <i class="fa fa-heart"></i>
                            </span>
                            <div class="story-text right-align-text">
                                <h3>Island</h3>
                                <span class="date">Jakarta, 2018</span>
                                <p>Mengarungi Perjalanan</p>
                            </div>
                        </div>
                        <div class="col col-md-6">
                            <div class="img-holder right-align-text story-slider">
                                <img src="<?=$assets?>wedding/images/story/island/1.JPG" alt class="img img-responsive">
                                <img src="<?=$assets?>wedding/images/story/island/2.JPG" alt class="img img-responsive">
                                <img src="<?=$assets?>wedding/images/story/island/3.JPG" alt class="img img-responsive">
                                <img src="<?=$assets?>wedding/images/story/island/5.JPG" alt class="img img-responsive">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-6">
                            <!-- <div class="img-holder video-holder">
                                <img src="<?=$assets?>wedding/images/story/img-8.jpg" alt class="img img-responsive">
                                <a href="https://www.youtube.com/embed/XSGBVzeBUbk?autoplay=1"
                                    data-type="iframe" class="video-play-btn">
                                    <i class="fa fa-play"></i>
                                </a>
                            </div> -->
                            <div class="img-holder right-align-text story-slider">
                                <img src="<?=$assets?>wedding/images/story/mangrove/1.JPG" alt class="img img-responsive">
                                <img src="<?=$assets?>wedding/images/story/mangrove/4.JPG" alt class="img img-responsive">
                                <img src="<?=$assets?>wedding/images/story/mangrove/3.JPG" alt class="img img-responsive">
                            </div>
                        </div>
                        <div class="col col-md-6 text-holder">
                            <span class="heart">
                                <i class="fa fa-heart"></i>
                            </span>
                            <div class="story-text">
                                <h3>Mangrove</h3>
                                <span class="date">Jakarta, 2019</span>
                                <p>Menemukan Jalan Perjalanan</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-6 text-holder right-heart">
                            <span class="heart">
                                <i class="fa fa-heart"></i>
                            </span>
                            <div class="story-text right-align-text">
                                <h3>Dream Park</h3>
                                <span class="date">Bandung, 2019</span>
                                <p>Menemukan Persinggahan</p>
                            </div>
                        </div>
                        <div class="col col-md-6">
                            <div class="img-holder right-align-text story-slider">
                                <img src="<?=$assets?>wedding/images/story/dreampark/1.JPG" alt class="img img-responsive">
                                <img src="<?=$assets?>wedding/images/story/dreampark/2.JPG" alt class="img img-responsive">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-6">
                            <div class="img-holder right-align-text story-slider">
                                <img src="<?=$assets?>wedding/images/story/floating/1.JPG" alt class="img img-responsive">
                                <img src="<?=$assets?>wedding/images/story/floating/2.JPG" alt class="img img-responsive">
                                <img src="<?=$assets?>wedding/images/story/floating/3.JPG" alt class="img img-responsive">
                                <img src="<?=$assets?>wedding/images/story/floating/4.JPG" alt class="img img-responsive">
                            </div>
                        </div>
                        <div class="col col-md-6 text-holder">
                            <span class="heart">
                                <i class="fa fa-heart"></i>
                            </span>
                            <div class="story-text">
                                <h3>Floating</h3>
                                <span class="date">Bandung, 2019</span>
                                <p>Menapaki Perjalanan</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-6 text-holder right-heart">
                            <span class="heart">
                                <i class="fa fa-heart"></i>
                            </span>
                            <div class="story-text right-align-text">
                                <h3>Kawah Rancah</h3>
                                <span class="date">Bandung, 2019</span>
                                <p>Menerjang Melompati Perjalanan</p>
                            </div>
                        </div>
                        <div class="col col-md-6">
                            <div class="img-holder right-align-text story-slider">
                                <img src="<?=$assets?>wedding/images/story/rancah/1.JPG" alt class="img img-responsive">
                                <img src="<?=$assets?>wedding/images/story/rancah/2.JPG" alt class="img img-responsive">
                                <img src="<?=$assets?>wedding/images/story/rancah/3.jpg" alt class="img img-responsive">
                                <img src="<?=$assets?>wedding/images/story/rancah/4.jpg" alt class="img img-responsive">
                                <img src="<?=$assets?>wedding/images/story/rancah/5.jpg" alt class="img img-responsive">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-6">
                            <div class="img-holder video-holder right-align-text story-slider">
                                <img src="<?=$assets?>wedding/images/story/devoyage/1.JPG" alt class="img img-responsive">
                                <img src="<?=$assets?>wedding/images/story/devoyage/2.JPG" alt class="img img-responsive">
                                <img src="<?=$assets?>wedding/images/story/devoyage/3.JPG" alt class="img img-responsive">
                                <img src="<?=$assets?>wedding/images/story/devoyage/4.JPG" alt class="img img-responsive">
                                <img src="<?=$assets?>wedding/images/story/devoyage/5.JPG" alt class="img img-responsive">
                                <img src="<?=$assets?>wedding/images/story/devoyage/6.JPG" alt class="img img-responsive">
                                <img src="<?=$assets?>wedding/images/story/devoyage/7.JPG" alt class="img img-responsive">
                                <img src="<?=$assets?>wedding/images/story/devoyage/8.JPG" alt class="img img-responsive">
                                <a href="https://www.instagram.com/p/B0uEsQ4FvEA/embed" data-type="iframe"
                                    class="video-play-btn">
                                    <i class="fa fa-play"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col col-md-6 text-holder">
                            <span class="heart">
                                <i class="fa fa-heart"></i>
                            </span>
                            <div class="story-text">
                                <h3>Devoyage</h3>
                                <span class="date">Bogor, 2019</span>
                                <p>Melintasi Perjalanan Waktu</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-6 text-holder right-heart">
                            <span class="heart">
                                <i class="fa fa-heart"></i>
                            </span>
                            <div class="story-text right-align-text">
                                <h3>Ocean Dream</h3>
                                <span class="date">Jakarta, 2019</span>
                                <p>Menikmati Perjalanan</p>
                            </div>
                        </div>
                        <div class="col col-md-6">
                            <div class="img-holder right-align-text story-slider">
                                <img src="<?=$assets?>wedding/images/story/ocean/1.JPG" alt class="img img-responsive">
                                <img src="<?=$assets?>wedding/images/story/ocean/2.JPG" alt class="img img-responsive">
                                <img src="<?=$assets?>wedding/images/story/ocean/3.JPG" alt class="img img-responsive">
                                <img src="<?=$assets?>wedding/images/story/ocean/5.JPG" alt class="img img-responsive">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-6">
                            <div class="img-holder right-align-text story-slider">
                                <img src="<?=$assets?>wedding/images/story/bunga/1.JPG" alt class="img img-responsive">
                                <img src="<?=$assets?>wedding/images/story/bunga/2.JPG" alt class="img img-responsive">
                                <img src="<?=$assets?>wedding/images/story/bunga/3.JPG" alt class="img img-responsive">
                                <img src="<?=$assets?>wedding/images/story/bunga/4.JPG" alt class="img img-responsive">
                                <img src="<?=$assets?>wedding/images/story/bunga/5.JPG" alt class="img img-responsive">
                            </div>
                        </div>
                        <div class="col col-md-6 text-holder">
                            <span class="heart">
                                <i class="fa fa-heart"></i>
                            </span>
                            <div class="story-text">
                                <h3>Taman Bunga Nusantara</h3>
                                <span class="date">Cianjur, 2019</span>
                                <p>Perjalanan Mekar</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-6 text-holder right-heart">
                            <span class="heart">
                                <i class="fa fa-heart"></i>
                            </span>
                            <div class="story-text right-align-text">
                                <h3>Engagement</h3>
                                <span class="date">Jakarta, 4 Januari 2020</span>
                                <p>Puncak Keyakinan Perjalanan</p>
                            </div>
                        </div>
                        <div class="col col-md-6">
                            <div class="img-holder right-align-text story-slider">
                                <img src="<?=$assets?>wedding/images/story/engagement/1.jpg" alt class="img img-responsive">
                                <img src="<?=$assets?>wedding/images/story/engagement/2.jpg" alt class="img img-responsive">
                                <img src="<?=$assets?>wedding/images/story/engagement/3.jpg" alt class="img img-responsive">
                                <img src="<?=$assets?>wedding/images/story/engagement/5.jpg" alt class="img img-responsive">
                                <img src="<?=$assets?>wedding/images/story/engagement/6.jpg" alt class="img img-responsive">
                                <img src="<?=$assets?>wedding/images/story/engagement/7.jpg" alt class="img img-responsive">
                                <img src="<?=$assets?>wedding/images/story/engagement/8.jpg" alt class="img img-responsive">
                                <img src="<?=$assets?>wedding/images/story/engagement/9.jpg" alt class="img img-responsive">
                                <img src="<?=$assets?>wedding/images/story/engagement/10.jpg" alt class="img img-responsive">
                                <img src="<?=$assets?>wedding/images/story/engagement/11.jpg" alt class="img img-responsive">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end row -->
    </div> <!-- end container -->
</section>
<!-- end story-section -->


<!-- start cta -->
<section class="cta section-padding parallax" data-bg-image="<?=$assets?>wedding/images/aw-bg.jpg" data-speed="7">
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
                <h2><span>We are going to...</span> Celebrate Our Love</h2>
            </div>
        </div> <!-- end row -->
    </div> <!-- end container -->
</section>
<!-- end cta -->


<!-- start events-section -->
<section class="events-section section-padding" id="events">
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
                <div class="section-title-white">
                    <div class="vertical-line"><span><i class="fi flaticon-two"></i></span></div>
                    <h2>Wedding events</h2>
                </div>
            </div>
        </div> <!-- end section-title -->

        <div class="row">
            <div class="col col-lg-10 col-lg-offset-1">
                <div class="event">
                    <div class="img-holder">
                        <img src="<?=$assets?>wedding/images/events/img-1.jpg" alt class="img img-responsive">
                    </div>
                    <div class="details">
                        <h3>Akad</h3>
                        <ul>
                            <li><i class="fa fa-map-marker"></i>Wahyuni's Garden House, Jombang - Jawa Timur
                            </li>
                            <li><i class="fa fa-clock-o"></i>Sabtu, 15 Agustus 2020 | 15.00 WIB</li>
                        </ul>
                        <p>The Intimate Wedding Virtual.</p>
                        <a class="see-location-btn popup-gmaps"
                            href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3954.8243148076963!2d112.2253227142817!3d-7.594091694523901!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7841ab7c186cdb%3A0xe8552032393a809e!2sTK%20AR%20RUSYDI%20KETANON!5e0!3m2!1sen!2sid!4v1595771205629!5m2!1sen!2sid">
                            See location <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div> <!-- end row -->
    </div> <!-- end container -->
</section>
<!-- end events-section -->

<!-- start gallery-section -->
<section class="gallery-section section-padding" id="gallery">
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
                <div class="section-title">
                    <div class="vertical-line"><span><i class="fi flaticon-two"></i></span></div>
                    <h2>Our gallery</h2>
                </div>
            </div>
        </div> <!-- end section-title -->

        <div class="row">
            <div class="col col-xs-12 sortable-gallery">
                <div class="gallery-filters">
                    <ul>
                        <li><a data-filter="*" href="#" class="current">All</a></li>
                        <li><a data-filter=".engagement" href="#">Engagement</a></li>
                        <li><a data-filter=".prawedding" href="#">Pra-Wedding</a></li>
                        <li><a data-filter=".moment" href="#">Best Moment</a></li>
                    </ul>
                </div>

                <div class="gallery-container gallery-fancybox masonry-gallery">
                    <div class="grid prawedding">
                        <a href="<?=$assets?>wedding/images/story/prawedding/10.JPG" class="fancybox" data-fancybox-group="gall-1">
                            <img src="<?=$assets?>wedding/images/story/prawedding/10.JPG" alt class="img img-responsive">
                        </a>
                    </div>
                    <div class="grid engagement">
                        <a href="<?=$assets?>wedding/images/story/engagement/2.jpg" class="fancybox" data-fancybox-group="gall-1">
                            <img src="<?=$assets?>wedding/images/story/engagement/2.jpg" alt class="img img-responsive">
                        </a>
                    </div>
                    <div class="grid prawedding">
                        <a href="<?=$assets?>wedding/images/story/prawedding/8.JPG" class="fancybox" data-fancybox-group="gall-1">
                            <img src="<?=$assets?>wedding/images/story/prawedding/8.JPG" alt class="img img-responsive">
                        </a>
                    </div>
                    <div class="grid prawedding">
                        <a href="<?=$assets?>wedding/images/story/prawedding/p2.jpg" class="fancybox" data-fancybox-group="gall-1">
                            <img src="<?=$assets?>wedding/images/story/prawedding/p2.jpg" alt class="img img-responsive">
                        </a>
                    </div>
                    <div class="grid engagement">
                        <a href="<?=$assets?>wedding/images/story/engagement/1.jpg" class="fancybox" data-fancybox-group="gall-1">
                            <img src="<?=$assets?>wedding/images/story/engagement/1.jpg" alt class="img img-responsive">
                        </a>
                    </div>
                    <div class="grid engagement">
                        <a href="<?=$assets?>wedding/images/story/engagement/3.jpg" class="fancybox" data-fancybox-group="gall-1">
                            <img src="<?=$assets?>wedding/images/story/engagement/3.jpg" alt class="img img-responsive">
                        </a>
                    </div>
                    <div class="grid prawedding">
                        <a href="<?=$assets?>wedding/images/story/prawedding/p10.jpg" class="fancybox" data-fancybox-group="gall-1">
                            <img src="<?=$assets?>wedding/images/story/prawedding/p10.jpg" alt class="img img-responsive">
                        </a>
                    </div>
                    <div class="grid prawedding">
                        <a href="<?=$assets?>wedding/images/story/prawedding/p12.jpg" class="fancybox" data-fancybox-group="gall-1">
                            <img src="<?=$assets?>wedding/images/story/prawedding/p12.jpg" alt class="img img-responsive">
                        </a>
                    </div>
                    <div class="grid prawedding">
                        <a href="<?=$assets?>wedding/images/story/prawedding/p4.jpg" class="fancybox" data-fancybox-group="gall-1">
                            <img src="<?=$assets?>wedding/images/story/prawedding/p4.jpg" alt class="img img-responsive">
                        </a>
                    </div>
                    <div class="grid prawedding">
                        <a href="<?=$assets?>wedding/images/story/prawedding/p5.jpg" class="fancybox" data-fancybox-group="gall-1">
                            <img src="<?=$assets?>wedding/images/story/prawedding/p5.jpg" alt class="img img-responsive">
                        </a>
                    </div>
                    <div class="grid prawedding">
                        <a href="<?=$assets?>wedding/images/story/prawedding/p3.jpg" class="fancybox" data-fancybox-group="gall-1">
                            <img src="<?=$assets?>wedding/images/story/prawedding/p3.jpg" alt class="img img-responsive">
                        </a>
                    </div>
                    <div class="grid prawedding">
                        <a href="<?=$assets?>wedding/images/story/prawedding/chalkart.jpg" class="fancybox"
                            data-fancybox-group="gall-1">
                            <img src="<?=$assets?>wedding/images/story/prawedding/chalkart.jpg" alt class="img img-responsive">
                        </a>
                    </div>
                    <div class="grid prawedding">
                        <a href="<?=$assets?>wedding/images/story/prawedding/15.JPG" class="fancybox" data-fancybox-group="gall-1">
                            <img src="<?=$assets?>wedding/images/story/prawedding/15.JPG" alt class="img img-responsive">
                        </a>
                    </div>
                    <div class="grid prawedding">
                        <a href="<?=$assets?>wedding/images/story/prawedding/p7.jpg" class="fancybox" data-fancybox-group="gall-1">
                            <img src="<?=$assets?>wedding/images/story/prawedding/p7.jpg" alt class="img img-responsive">
                        </a>
                    </div>
                    <div class="grid prawedding">
                        <a href="<?=$assets?>wedding/images/story/prawedding/kloning-hand.jpg" class="fancybox"
                            data-fancybox-group="gall-1">
                            <img src="<?=$assets?>wedding/images/story/prawedding/kloning-hand.jpg" alt class="img img-responsive">
                        </a>
                    </div>
                    <div class="grid prawedding">
                        <a href="<?=$assets?>wedding/images/story/prawedding/kloning.jpg" class="fancybox"
                            data-fancybox-group="gall-1">
                            <img src="<?=$assets?>wedding/images/story/prawedding/kloning.jpg" alt class="img img-responsive">
                        </a>
                    </div>
                    <div class="grid prawedding">
                        <a href="<?=$assets?>wedding/images/story/prawedding/p6.jpg" class="fancybox" data-fancybox-group="gall-1">
                            <img src="<?=$assets?>wedding/images/story/prawedding/p6.jpg" alt class="img img-responsive">
                        </a>
                    </div>
                    <div class="grid prawedding">
                        <a href="<?=$assets?>wedding/images/story/prawedding/p1.jpg" class="fancybox" data-fancybox-group="gall-1">
                            <img src="<?=$assets?>wedding/images/story/prawedding/p1.jpg" alt class="img img-responsive">
                        </a>
                    </div>
                    <div class="grid prawedding">
                        <a href="<?=$assets?>wedding/images/story/prawedding/p9.jpg" class="fancybox" data-fancybox-group="gall-1">
                            <img src="<?=$assets?>wedding/images/story/prawedding/p9.jpg" alt class="img img-responsive">
                        </a>
                    </div>
                    <div class="grid prawedding">
                        <a href="<?=$assets?>wedding/images/story/prawedding/p11.jpg" class="fancybox" data-fancybox-group="gall-1">
                            <img src="<?=$assets?>wedding/images/story/prawedding/p11.jpg" alt class="img img-responsive">
                        </a>
                    </div>
                    <div class="grid prawedding">
                        <a href="<?=$assets?>wedding/images/story/prawedding/tiny.jpg" class="fancybox"
                            data-fancybox-group="gall-1">
                            <img src="<?=$assets?>wedding/images/story/prawedding/tiny.jpg" alt class="img img-responsive">
                        </a>
                    </div>
                    <div class="grid prawedding">
                        <a href="<?=$assets?>wedding/images/story/prawedding/p14.jpg" class="fancybox" data-fancybox-group="gall-1">
                            <img src="<?=$assets?>wedding/images/story/prawedding/p14.jpg" alt class="img img-responsive">
                        </a>
                    </div>
                    <div class="grid prawedding">
                        <a href="<?=$assets?>wedding/images/story/prawedding/p13.jpg" class="fancybox" data-fancybox-group="gall-1">
                            <img src="<?=$assets?>wedding/images/story/prawedding/p13.jpg" alt class="img img-responsive">
                        </a>
                    </div>

                    
                    <div class="grid prawedding">
                        <a href="<?=$assets?>wedding/images/story/prawedding/p8.jpg" class="fancybox" data-fancybox-group="gall-1">
                            <img src="<?=$assets?>wedding/images/story/prawedding/p8.jpg" alt class="img img-responsive">
                        </a>
                    </div>
                    <div class="grid engagement">
                        <a href="<?=$assets?>wedding/images/story/engagement/7.jpg" class="fancybox" data-fancybox-group="gall-1">
                            <img src="<?=$assets?>wedding/images/story/engagement/7.jpg" alt class="img img-responsive">
                        </a>
                    </div>
                    <div class="grid moment">
                        <a href="<?=$assets?>wedding/images/countdown-bg.jpg" class="fancybox" data-fancybox-group="gall-1">
                            <img src="<?=$assets?>wedding/images/countdown-bg.jpg" alt class="img img-responsive">
                        </a>
                    </div>
                    <div class="grid engagement">
                        <a href="https://www.instagram.com/tv/B68IHruAUni/embed" data-type="iframe"
                            class="video-play-btn">
                            <img src="<?=$assets?>wedding/images/story/engagement/11.jpg" alt class="img img-responsive">
                            <i class="fa fa-play"></i>
                        </a>
                    </div>
                    <div class="grid prawedding">
                        <a href="<?=$assets?>wedding/images/story/prawedding/multiple.jpg" class="fancybox"
                            data-fancybox-group="gall-1">
                            <img src="<?=$assets?>wedding/images/story/prawedding/multiple.jpg" alt class="img img-responsive">
                        </a>
                    </div>
                </div>
            </div>
        </div> <!-- end row -->
    </div> <!-- end container -->
</section>
<!-- end gallery-section -->


<!-- start rsvp-section -->
<section class="rsvp-section section-padding parallax" data-bg-image="<?=$assets?>wedding/images/p3.jpg" data-speed="7"
    id="rsvp">
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
                <div class="section-title-white">
                    <div class="vertical-line"><span><i class="fi flaticon-two"></i></span></div>
                    <h2>Ucapan dan Doa</h2>
                </div>
            </div>
        </div> <!-- end section-title -->

        <div class="row content">
            <div class="col col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <form form-id="ucapandandoa" class="form validate-rsvp-form row" method="post">
                    <div class="col col-sm-6">
                        <input type="text" name="name" class="form-control" placeholder="Nama Lengkap*">
                    </div>
                    <div class="col col-sm-6">
                        <select class="form-control" name="circle">
                            <option disabled selected>Hubungan*</option>
                            <option value="Keluarga">Keluarga Ade/Wahyuni</option>
                            <option value="Teman">Teman Ade/Wahyuni</option>
                            <option value="Rekan Kerja">Rekan Kerja Ade/Wahyuni</option>
                            <option value="Guru/Dosen">Guru/Dosen Ade/Wahyuni</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>
                    <div class="col col-sm-12">
                        <textarea class="form-control" name="notes" placeholder="Tuliskan Ucapan dan Doa disini*"></textarea>
                    </div>
                    <div class="col col-sm-12 submit-btn">
                        <button onclick="formCtrl.btn_ucapandandoa(this)" type="button" class="submit">Kirim</button>
                        <span id="loader"><i class="fa fa-refresh fa-spin fa-3x fa-fw"></i></span>
                    </div>
                    <div class="col col-md-12 success-error-message">
                        <div id="success">Thank you</div>
                        <div id="error"> Error occurred while sending email. Please try again later. </div>
                    </div>
                </form>
            </div>
        </div> <!-- end row -->
    </div> <!-- end container -->
</section>
<!-- end rsvp-section -->

<!-- start gift-registration-section -->
<section class="gift-registration-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
                <div class="section-title">
                    <div class="vertical-line"><span><i class="fi flaticon-two"></i></span></div>
                    <h2>Ucapan dan Doa</h2>
                </div>
            </div>
        </div> <!-- end section-title -->

        <div class="row content">
            <div id="dt_ucapandandoa" class="pusaka-datatable"></div>
            <script type="text/javascript">
          var DtUcapan   = PusakaDatatableClient({
             id          : 'dt_ucapandandoa',
             url         : apiurl       + 'wedding/ucapandandoa.api/datatable',
             template    : ASSETS_URL   + 'plugins/pusaka/DataTable/PusakaDatatableTemplateBlog.php',
             header      : function(head) {
                head.append(`

                `);
             },
             footer      : function(foot) {
                // foot.append(`
                //    <tr>
                //       <td><input class="form-control" placeholder="Id"   name=""/></td>
                //       <td><input class="form-control" placeholder="Name"    name=""/></td>
                //    </tr>
                // `);   
             },
             body        : function(row, index) {
                return (`
            <div class="col col-lg-10 col-lg-offset-1">
                <h3>`+row.nama+`</h3>
                <p>`+row.ucapan+`</p>
            </div>
            <hr>
            `);
         },
         init : {
            limit:6
         },
         // next : function() {
         // },
         // prev : function() {
         // },
         // gotopage : function() {
         // },
         // limit : function() {
         // },
         // searchglobal: function() {
         // },
         // searchadvance: function() {
         // }
      });
    </script>
        </div> <!-- end row -->
    </div> <!-- end container -->
</section>
<!-- end gift-registration-section -->
<hr>
<!-- start gift-registration-section -->
<section class="gift-registration-section section-padding" id="gift">
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
                <div class="section-title">
                    <div class="vertical-line"><span><i class="fi flaticon-two"></i></span></div>
                    <h2>Gift</h2>
                </div>
            </div>
        </div> <!-- end section-title -->

        <div class="row content">
            <div class="col col-lg-10 col-lg-offset-1">
                <p>Jalan Mangga Blok A Gang 4 No. 18 RT/RW 09 Kel. Lagoa Kec. Koja Jakarta Utara.</p>
            </div>
            <hr>
            <div class="col col-lg-10 col-lg-offset-1">
                <h3>Saweria</h3>
                <center><a href="https://saweria.co/donate/adewahyuni" target="_blank"><img src="<?=$assets?>wedding/images/saweria.png" alt class="img img-responsive"></a></center>
            </div>
        </div> <!-- end row -->
    </div> <!-- end container -->
</section>
<!-- end gift-registration-section -->


<!-- start footer -->
<footer class="site-footer">
    <div class="back-to-top">
        <a href="#" class="back-to-top-btn"><span><i class="fi flaticon-cupid"></i></span></a>
    </div>
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
                <h2>Yang sudah ditakdirkan pasti tertakdirkan.</h2>
                <span>- Ade Sulaeman & Wahyuni</span>
            </div>
        </div> <!-- end row -->
    </div> <!-- end container -->
</footer>
<!-- end footer -->

</div>
<!-- end of page-wrapper -->

<?php include(APPPATH . 'controllers/__ui/core/pages/backend/footer.ui.php') ?>

