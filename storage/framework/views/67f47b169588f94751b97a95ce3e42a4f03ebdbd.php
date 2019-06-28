<section id="header_section_wrapper" class="header_section_wrapper">
    <div class="container">
        <div class="header-section">
            <div class="row">
                <div class="col-md-4">
                    <div class="left_section">
                        <!-- Time -->
                        <span class="date"><?php echo e(Carbon\Carbon::now()->englishDayOfWeek ?? ''); ?> .</span>
                        <span class="time"><?php echo e(Carbon\Carbon::now()->day ?? 0); ?> <?php echo e(Carbon\Carbon::now()->englishMonth ?? ''); ?>. <?php echo e(Carbon\Carbon::now()->year ?? 2019); ?></span>
                        <!-- Time -->
                        <div class="social">
                            <a class="icons-sm fb-ic" href="<?php echo e(route('social.facebook.redirect')); ?>" title="<?php echo e(trans('plugins/member::social.login.fb')); ?>">
                                <i class="fab fa-facebook"></i>
                            </a>
                            <!--Google +-->
                            <a class="icons-sm inst-ic" href="<?php echo e(route('social.instagram.redirect')); ?>"
                               title="<?php echo e(trans('plugins/member::social.login.in')); ?>"><i class="fab fa-instagram"></i></a>
                            <a class="icons-sm inst-ic" href="<?php echo e(route('social.linkedin.redirect')); ?>"
                               title="<?php echo e(trans('plugins/member::social.login.li')); ?>"><i
                                    class="fab fa-linkedin-in"></i></a>
                            <!--Linkedin-->
                            <a class="icons-sm tmb-ic" href="<?php echo e(route('social.google.redirect')); ?>"
                               title="<?php echo e(trans('plugins/member::social.login.gg')); ?>"><i
                                    class="fab fa-google-plus"></i></a>
                            <!--Pinterest-->
                            <a class="icons-sm rss-ic" href="<?php echo e(route('social.github.redirect')); ?>"
                               title="<?php echo e(trans('plugins/member::social.login.git')); ?>"><i class="fab fa-github"></i></a>
                        </div>
                        <!-- Top Social Section -->
                    </div>
                    <!-- Left Header Section -->
                </div>
                <div class="col-md-4">
                    <div class="logo">
                        <a href="<?php echo e(route('public.index') ?? 'javascript:;'); ?>"><img src="<?php echo e(asset('assets/img/logo.png')); ?>" alt="Tech NewsLogo"></a>
                    </div>
                    <!-- Logo Section -->
                </div>
                <div class="col-md-4">
                    <div class="right_section">
                        <ul class="nav navbar-nav">
                            <?php if(auth()->guard('member')->check()): ?>
                                <li><img width="20px" height="20px"
                                         src="<?php echo e(auth()->guard('member')->user()->social_avatar ?? auth()->guard('member')->user()->avatar_url); ?>"
                                         alt="Avatar">
                                </li>
                                <li>
                                    <a href="javascript:;"><?php echo e(auth()->guard('member')->user()->first_name ?? 'Anonymous'); ?></a>
                                </li>
                                <li>
                                    <a class="no-underline mr2 black-50 hover-black-70 pv1 ph2 db"
                                       style="text-decoration: none;" href="#"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                       title="<?php echo e(trans('plugins/member::dashboard.header_logout_link')); ?>">
                                        <i class="fas fa-sign-out-alt mr1"></i><span
                                            class="dn-ns"><?php echo e(trans('plugins/member::dashboard.header_logout_link')); ?></span>
                                    </a>
                                    <form id="logout-form" action="<?php echo e(route('public.member.logout')); ?>" method="POST"
                                          style="display: none;">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </li>
                            <?php endif; ?>
                            <?php if(auth()->guard('member')->guest()): ?>
                                <li><a href="<?php echo e(route('public.member.login') ?? 'javascript:;'); ?>">Login</a></li>
                                <li><a href="<?php echo e(route('public.member.register') ?? 'javascript:;'); ?>">Register</a></li>
                            <?php endif; ?>
                            <li class="dropdown lang">
                                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">En <i
                                        class="fa fa-angle-down"></i></button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <li><a href="#">VI</a></li>
                                </ul>
                            </li>
                        </ul>
                        <!-- Language Section -->

                        <ul class="nav-cta hidden-xs">
                            <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle"><i
                                        class="fa fa-search"></i></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <div class="head-search">
                                            <form role="form">
                                                <!-- Input Group -->
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="Type Something"> <span class="input-group-btn">
                                                        <button type="submit" class="btn btn-primary">Search</button></span></div>
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <!-- Search Section -->
                    </div>
                    <!-- Right Header Section -->
                </div>
            </div>
        </div>
        <!-- Header Section -->

        <div class="navigation-section">
            <nav class="navbar m-menu navbar-default">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#navbar-collapse-1"><span class="sr-only">Toggle navigation</span> <span
                                class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
                        </button>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="#navbar-collapse-1">
                        <ul class="nav navbar-nav main-nav">
                            <li class="active"><a href="<?php echo e(route('public.index') ?? 'javascript:;'); ?>">Home</a></li>
                            <li><a href="<?php echo e(route('public.blog') ?? 'javascript:;'); ?>">Post</a></li>
                            <li><a href="<?php echo e(route('public.news') ?? 'javascript:;'); ?>">News</a></li>

                            <li class="dropdown m-menu-fw"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Categories
                                    <span><i class="fa fa-angle-down"></i></span></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <div class="m-menu-content">
                                            <?php if(isset($listCategories)): ?>
                                                <?php $__currentLoopData = $listCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <ul class="col-sm-3">
                                                        <li class="dropdown-header"><a
                                                                href="<?php echo e(route('public.categories',['tags' => $category->slug ?? ''])); ?>"><?php echo e($category->name ?? ''); ?></a>
                                                        </li>
                                                        <?php ($posts = $category->posts->take(5)); ?>
                                                        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li>
                                                                <a href="<?php echo e(route('public.blog.details')); ?>/<?php echo e($post->slug ?? ''); ?>"><?php echo e(str_limit($post->name,25) ?? 'Updating'); ?></a>
                                                            </li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            
                            <li class="dropdown m-menu-fw"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Practices
                                    <span><i class="fa fa-angle-down"></i></span></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <div class="m-menu-content">
                                            <ul class="col-sm-3">
                                                <li><a href="<?php echo e(route('practice.export')); ?>">Fast Excel import/export for Laravel</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- .navbar-collapse -->
                </div>
                <!-- .container -->
            </nav>
            <!-- .nav -->
        </div>
        <!-- .navigation-section -->
    </div>
    <!-- .container -->
</section>
<!-- header_section_wrapper -->
<?php /**PATH C:\xampp\htdocs\botble\platform\themes/general/partials/header.blade.php ENDPATH**/ ?>