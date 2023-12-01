<div class="top-bar bg-dark " id="top-bar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="top-bar-left text-white">
                        <i class="fa fa-map-marker"></i>
                        <span class="ml-2"></span>
                    </div>
                </div>

                <div class="col-lg-4 ml-lg-auto col-md-6">
                    <ul class="d-flex list-unstyled header-socials float-lg-right">
                        <?php if(!Application::$app->auth->checkLogin()):?>
                        <li><a title="Giriş Yap" href="<?php echo SITEADRESS?>login"> <i class="fas fa-share-square"></i></a></li>
                        <li><a title="Üye Ol" href="<?php echo SITEADRESS?>register"> <i class="fas fa-user-plus"></i></a></li>
                        <?php else:?>
                        <li><a href="<?php echo BASEURL?>/admin" title="Admin Sayfasına Git"> <i class="fas fa-user-alt mr-1"></i>Admin Sayfası</a></li>
                        <li><a href="<?php echo BASEURL?>/user/logout" title="Oturumu Kapat"> <i class="fas fa-power-off text-danger"></i></a></li>
                        <?php endif;?>
                        <!--
                        <li><a href="#"> <i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"> <i class="fab fa-pinterest-p"></i></a></li>
                        <li><a href="#"> <i class="fab fa-linkedin"></i></a></li> -->
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="logo-bar d-none d-md-block d-lg-block bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="logo d-none d-lg-block">
                        <!-- Brand -->
                        <a class="navbar-brand js-scroll-trigger" href="<?php echo SITEADRESS?>anasayfa">
                            <h2>CMGTEKNİK</h2>
                        </a>
                    </div>
                </div>

                <div class="col-lg-8 justify-content-end ml-lg-auto d-flex col-12 col-md-12 justify-content-md-center">
                    <!-- <div class="top-info-block d-inline-flex">
                        <div class="icon-block">
                            <i class="ti-mobile"></i>
                        </div>
                        <div class="info-block">
                            <h5 class="font-weight-500"></h5>
                            <p>7/24</p>
                        </div>
                    </div> -->

                    <div class="top-info-block d-inline-flex">
                        <div class="icon-block">
                            <i class="ti-email"></i>
                        </div>
                        <div class="info-block">
                            <h5 class="font-weight-500">info@cmgtechnic.com</h5>
                            <p>Email</p>
                        </div>
                    </div>
                    <div class="top-info-block d-inline-flex">
                        <div class="icon-block">
                            <i class="ti-time"></i>
                        </div>
                        <div class="info-block">
                            <h5 class="font-weight-500">Pzt-Cum 8:00-18.00 </h5>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>