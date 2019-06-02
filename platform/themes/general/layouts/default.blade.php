<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="canonical" href="{{ url('/') }}">
    <meta http-equiv="content-language" content="en">
    {!! Theme::header() !!}
    @include('main::views.layouts.head')
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar">
<div id="main-wrapper">
    <!-- Page Preloader -->
    <div id="preloader">
        <div id="status">
            <div class="status-mes"></div>
        </div>
    </div>
    <!-- preloader -->
    <div class="uc-mobile-menu-pusher">
        <div class="content-wrapper">
            {!! Theme::partial('header',[
            'listCategories' => (new Botble\Blog\Repositories\Eloquent\BlogRepositories)->getListCategories(),
             ]) !!}
{{--            @includeIf('main::partials.header')--}}

            {!! Theme::content() !!}

            {{--@includeIf('main::partials.footer')--}}
            {!! Theme::partial('footer') !!}
        </div>
    </div>

    <!-- .offcanvas-pusher -->

    <a href="#" class="crunchify-top"><i class="fa fa-angle-up" aria-hidden="true"></i></a>

    <div class="uc-mobile-menu uc-mobile-menu-effect">
        <button type="button" class="close" aria-hidden="true" data-toggle="offcanvas"
                id="uc-mobile-menu-close-btn">&times;
        </button>
        <div>
            <div>
                <ul id="menu">
                    <li class="active"><a href="blog.html">News</a></li>
                    <li><a href="category.html">Mobile</a></li>
                    <li><a href="blog.html">Tablet</a></li>
                    <li><a href="category.html">Gadgets</a></li>
                    <li><a href="blog.html">Camera</a></li>
                    <li><a href="category.html">Design</a></li>
                    <li class="dropdown m-menu-fw"><a href="#" data-toggle="dropdown" class="dropdown-toggle">More
                            <span><i class="fa fa-angle-down"></i></span></a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="m-menu-content">
                                    <ul class="col-sm-3">
                                        <li class="dropdown-header">Widget Haeder</li>
                                        <li><a href="#">Awesome Features</a></li>
                                        <li><a href="#">Clean Interface</a></li>
                                        <li><a href="#">Available Possibilities</a></li>
                                        <li><a href="#">Responsive Design</a></li>
                                        <li><a href="#">Pixel Perfect Graphics</a></li>
                                    </ul>
                                    <ul class="col-sm-3">
                                        <li class="dropdown-header">Widget Haeder</li>
                                        <li><a href="#">Awesome Features</a></li>
                                        <li><a href="#">Clean Interface</a></li>
                                        <li><a href="#">Available Possibilities</a></li>
                                        <li><a href="#">Responsive Design</a></li>
                                        <li><a href="#">Pixel Perfect Graphics</a></li>
                                    </ul>
                                    <ul class="col-sm-3">
                                        <li class="dropdown-header">Widget Haeder</li>
                                        <li><a href="#">Awesome Features</a></li>
                                        <li><a href="#">Clean Interface</a></li>
                                        <li><a href="#">Available Possibilities</a></li>
                                        <li><a href="#">Responsive Design</a></li>
                                        <li><a href="#">Pixel Perfect Graphics</a></li>
                                    </ul>
                                    <ul class="col-sm-3">
                                        <li class="dropdown-header">Widget Haeder</li>
                                        <li><a href="#">Awesome Features</a></li>
                                        <li><a href="#">Clean Interface</a></li>
                                        <li><a href="#">Available Possibilities</a></li>
                                        <li><a href="#">Responsive Design</a></li>
                                        <li><a href="#">Pixel Perfect Graphics</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- .uc-mobile-menu -->

</div>
{!! Theme::footer() !!}
@include('main::views.layouts.script')
</body>
</html>
