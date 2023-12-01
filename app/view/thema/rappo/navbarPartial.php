<?php
$menuler = Application::$app->menuler;
?>
<div class="main-navigation" id="mainmenu-area">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary main-nav navbar-togglable rounded-radius">

            <a class="navbar-brand d-lg-none d-block" href="">
                <h4>CMGTEKNİK</h4>
            </a>
            <!-- Toggler -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars"></span>
            </button>

            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <!-- Links -->
                <ul class="navbar-nav ">
                    <?php echo $menuler->createMenuItems(); ?>
                </ul>
                <ul class="ml-lg-auto list-unstyled m-0">
                    <li><a href="mailto:info@cmgtechnic.com" class="btn btn-white btn-circled">Teklif Al</a></li>
                </ul>
            </div> <!-- / .navbar-collapse -->
        </nav>
    </div> <!-- / .container -->
</div>