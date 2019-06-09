<section id="header_section_wrapper" class="header_section_wrapper">
    <div class="container">
        <div class="header-section">
            <div class="row">
                <div class="col-md-4">
                    <div class="left_section">
                                            <span class="date">
                                                {{ Carbon\Carbon::now()->englishDayOfWeek ?? ''}} .
                                            </span>
                        <!-- Date -->
                        <span class="time">
                                                {{Carbon\Carbon::now()->day ?? 0}} {{Carbon\Carbon::now()->englishMonth ?? ''}}
                            . {{Carbon\Carbon::now()->year ?? 2019}}
                                            </span>
                        <!-- Time -->
                        <div class="social">
                            <a class="icons-sm fb-ic" href="{{route('social.facebook.redirect')}}" title="{{trans('plugins/member::social.login.fb')}}"><i
                                    class="fa fa-facebook"></i></a>
                            <!--Twitter-->
                            <a class="icons-sm tw-ic"><i class="fa fa-twitter" title="{{trans('plugins/member::social.login.tw')}}"></i></a>
                            <!--Google +-->
                            <a class="icons-sm inst-ic" href="{{route('social.instagram.redirect')}}" title="{{trans('plugins/member::social.login.in')}}"><i class="fa fa-instagram"> </i></a>
                            <a class="icons-sm inst-ic" href="{{route('social.linkedin.redirect')}}" title="{{trans('plugins/member::social.login.li')}}"><i class="fa fa-linkedin"></i></a>
                            <!--Linkedin-->
                            <a class="icons-sm tmb-ic" href="{{route('social.google.redirect')}}" title="{{trans('plugins/member::social.login.gg')}}"><i class="fa fa-google"></i></a>
                            <!--Pinterest-->
                            <a class="icons-sm rss-ic" href="{{route('social.github.redirect')}}" title="{{trans('plugins/member::social.login.git')}}"><i class="fa fa-github-alt"></i></a>
                        </div>
                        <!-- Top Social Section -->
                    </div>
                    <!-- Left Header Section -->
                </div>
                <div class="col-md-4">
                    <div class="logo">
                        <a href="{{route('public.index') ?? 'javascript:;'}}"><img
                                src="{{asset('assets/img/logo.png')}}"
                                alt="Tech NewsLogo"></a>
                    </div>
                    <!-- Logo Section -->
                </div>
                <div class="col-md-4">
                    <div class="right_section">
                        <ul class="nav navbar-nav">
                            @auth('member')
                                <li><img width="20px" height="20px"
                                         src="{{auth()->guard('member')->user()->social_avatar ?? auth()->guard('member')->user()->avatar_url}}"
                                         alt="Avatar">
                                </li>
                                <li>
                                    <a href="javascript:;">{{auth()->guard('member')->user()->first_name ?? 'Anonymous'}}</a>
                                </li>
                                <li>
                                    <a class="no-underline mr2 black-50 hover-black-70 pv1 ph2 db" style="text-decoration: none;" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" title="{{ trans('plugins/member::dashboard.header_logout_link') }}">
                                        <i class="fas fa-sign-out-alt mr1"></i><span class="dn-ns">{{ trans('plugins/member::dashboard.header_logout_link') }}</span>
                                    </a>
                                    <form id="logout-form" action="{{ route('public.member.logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            @endauth
                            @guest('member')
                                <li><a href="{{route('public.member.login') ?? 'javascript:;'}}">Login</a></li>
                                <li><a href="{{route('public.member.register') ?? 'javascript:;'}}">Register</a></li>
                            @endguest
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
                                                    <input type="text" class="form-control"
                                                           placeholder="Type Something"> <span class="input-group-btn">
                                                                            <button type="submit"
                                                                                    class="btn btn-primary">Search
                                                                            </button>
                                                                        </span></div>
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
                            <li class="active"><a href="{{route('public.index') ?? 'javascript:;'}}">Home</a></li>
                            <li><a href="{{route('public.blog') ?? 'javascript:;'}}">Post</a></li>
                            <li><a href="{{route('public.news') ?? 'javascript:;'}}">News</a></li>

                            <li class="dropdown m-menu-fw"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Categories
                                    <span><i class="fa fa-angle-down"></i></span></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <div class="m-menu-content">
                                            @isset($listCategories)
                                                @foreach($listCategories as $category)
                                                    <ul class="col-sm-3">
                                                        <li class="dropdown-header"><a
                                                                href="{{route('public.categories',['tags' => $category->slug ?? ''])}}">{{$category->name ?? ''}}</a>
                                                        </li>
                                                        @php($posts = $category->posts->take(5))
                                                        @foreach($posts as $post)
                                                            <li>
                                                                <a href="{{route('public.blog.details')}}/{{$post->slug ?? ''}}">{{str_limit($post->name,25) ?? 'Updating'}}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endforeach
                                            @endisset
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
