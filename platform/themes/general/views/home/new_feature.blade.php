<section id="feature_news_section" class="feature_news_section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="feature_article_wrapper">
                    <div class="swiper-container swiper-home">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            <div class="swiper-slide">
                                <div class="feature_article_img">
                                    <img class="img-responsive top_static_article_img" src="{!! asset(setting('slide_one')) ?? '' !!}"
                                         alt="feature-top">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="feature_article_img">
                                    <img class="img-responsive top_static_article_img" src="{!! asset(setting('slide_two')) ?? '' !!}"
                                         alt="feature-top">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="feature_article_img">
                                    <img class="img-responsive top_static_article_img" src="{!! asset(setting('slide_three')) ?? '' !!}"
                                         alt="feature-top">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="feature_article_img">
                                    <img class="img-responsive top_static_article_img" src="{!! asset(setting('slide_four')) ?? '' !!}"
                                         alt="feature-top">
                                </div>
                            </div>
                        </div>
                        <!-- If we need pagination -->
                        <div class="swiper-pagination"></div>
                    </div>

                    <!-- feature_article_img -->


                </div>
                <!-- feature_article_wrapper -->

            </div>
            <!-- col-md-7 -->
            @isset($top_view)
                <div class="col-md-5">
                    <div class="feature_static_wrapper">
                        <div class="feature_article_img">
                            <img class="img-responsive" src="{{asset($top_view[0]->image_link ?? '')}}"
                                 alt="feature-top">
                        </div>
                        <!-- feature_article_img -->

                        <div class="feature_article_inner clear-fix">
                            <div class="tag_lg purple"><a href="javascript:;">Top Viewed</a></div>
                            <div class="feature_article_title">
                                <h1><a href="javascript:;" target="_self">{{str_limit($top_view[0]->name,25) ?? ''}}</a></h1>
                            </div>
                            <!-- feature_article_title -->

                            <div class="feature_article_date"><a href="#"
                                                                 target="_self">{{$top_view[0]->author->first_name.' '.$top_view[0]->author->last_name}}</a>,<a
                                    href="#"
                                    target="_self">{{$top_view[0]->created_at->toDateString()}}</a></div>
                            <!-- feature_article_date -->

                            <div class="feature_article_content">
                                {{str_limit($top_view[0]->description,70) ?? ''}}
                            </div>
                            <!-- feature_article_content -->

                            <div class="article_social">
                                <span><i class="fa fa-eye"></i><a href="javascript:;">{{$top_view[0]->views ?? 0}}</a>Views</span>
                                <span><i class="fal fa-comments"></i><a href="#">4</a>Comments</span>
                            </div>
                            <!-- article_social -->

                        </div>
                        <!-- feature_article_inner -->

                    </div>
                    <!-- feature_static_wrapper -->

                </div>
                <!-- col-md-5 -->

                <div class="col-md-5">
                    <div class="feature_static_last_wrapper">
                        <div class="feature_article_img">
                            <img class="img-responsive" src="{{asset($top_view[1]->image_link ?? '')}}"
                                 alt="feature-top">
                        </div>
                        <!-- feature_article_img -->

                        <div class="feature_article_inner clear-fix">
                            <div class="tag_lg purple"><a href="javascript:;">Top Viewed</a></div>
                            <div class="feature_article_title">
                                <h1><a href="javascript:;" target="_self">{{str_limit($top_view[1]->name,25) ?? ''}}</a></h1>
                            </div>
                            <!-- feature_article_title -->

                            <div class="feature_article_date"><a href="#"
                                                                 target="_self">{{$top_view[1]->author->first_name.' '.$top_view[1]->author->last_name}}</a>,<a
                                    href="#"
                                    target="_self">{{$top_view[1]->created_at->toDateString()}}</a></div>
                            <!-- feature_article_date -->

                            <div class="feature_article_content">
                                {{str_limit($top_view[1]->description,70) ?? ''}}
                            </div>
                            <!-- feature_article_content -->

                            <div class="article_social">
                                <span><i class="fa fa-eye"></i><a href="javascript:;">{{$top_view[1]->views ?? 0}}</a>Views</span>
                                <span><i class="fal fa-comments"></i></i><a href="#">4</a>Comments</span>
                            </div>
                            <!-- article_social -->

                        </div>

                    </div>
                    <!-- feature_static_wrapper -->

                </div>
                <!-- col-md-5 -->
            @endisset
        </div>
        <!-- Row -->

    </div>
    <!-- container -->

</section>
<!-- Feature News Section -->
