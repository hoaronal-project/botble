<section id="category_section" class="category_section">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                @isset($feature_news)
                    <div class="category_section mobile">
                        <div class="article_title header_purple">
                            <h2><a href="javascript:;"
                                   target="_self">{{$feature_news['top_views']->categories[0]->name ?? 'Updating'}}</a>
                            </h2>
                        </div>
                        <!----article_title------>
                        @if(!empty($feature_news['top_views']))
                            <div class="category_article_wrapper">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="top_article_img">
                                            <a href="javascript:;" target="_self"><img class="img-responsive"
                                                                                       src="{{asset($feature_news['top_views']->image_link ?? '')}}"
                                                                                       alt="feature-top">
                                            </a>
                                        </div>
                                        <!----top_article_img------>
                                    </div>
                                    <div class="col-md-6">
                                        <span
                                            class="tag purple">{{$feature_news['top_views']->categories[0]->name ?? 'Updating'}}</span>

                                        <div class="category_article_title">
                                            <h2><a href="javascript:;"
                                                   target="_self">{{$feature_news['top_views']->name ?? 'Updating'}}</a>
                                            </h2>
                                        </div>
                                        <!----category_article_title------>
                                        <div class="category_article_date"><a
                                                href="#">{{($feature_news['top_views']->created_at->toDateString()) ?? 'Updating'}}</a>,
                                            by: <a
                                                href="#">{{($feature_news['top_views']->author->first_name.' '.$feature_news['top_views']->author->last_name) ?? 'Updating'}}</a>
                                        </div>
                                        <!----category_article_date------>
                                        <div class="category_article_content">
                                            {{$feature_news['top_views']->description ?? 'Updating'}}
                                        </div>
                                        <!----category_article_content------>
                                        <div class="media_social">
                                            <span><a href="#"><i
                                                        class="fa fa-eye"></i>{{$feature_news['top_views']->views ?? 0}} </a> views</span>
                                            <span><i class="fa fa-comments-o"></i><a href="#">4</a> Comments</span>
                                        </div>
                                        <!----media_social------>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(!empty($feature_news['featured_post']))
                            <div class="category_article_wrapper">
                                <div class="row">
                                    @foreach($feature_news['featured_post'] as $post)
                                        <div class="col-md-6">
                                            <div class="media">
                                                <div class="media-left">
                                                    <a href="#"><img class="media-object post-image"
                                                                     src="{{asset($post->image_link) ?? ''}}"
                                                                     alt="Generic placeholder image"></a>
                                                </div>
                                                <div class="media-body">
                                                    <span
                                                        class="tag purple">{{$post->categories[0]->name ?? 'Updating'}}</span>

                                                    <h3 class="media-heading"><a href="javascript:;"
                                                                                 target="_self">{{(str_limit($post->name,20)) ?? 'Updating'}}</a>
                                                    </h3>
                                                    <span class="media-date"><a
                                                            href="#">{{($post->created_at->toDateString()) ?? 'Updating'}}</a>,  by: <a
                                                            href="#">{{($post->author->first_name.' '.$post->author->last_name) ?? 'Updating'}}</a></span>

                                                    <div class="media_social">
                                                    <span><a href="#"><i
                                                                class="fa fa-eye"></i>{{$post->views ?? 0}}</a> Views</span>
                                                        <span><a href="#"><i
                                                                    class="fa fa-comments-o"></i>4</a> Comments</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <p class="divider"><a href="javascript:;">More News&nbsp;&raquo;</a></p>
                        @endif
                    </div>
                @endisset
            <!--Laravel-->
                @isset($feature_news_js)
                    <div class="category_section mobile">
                        <div class="article_title header_purple">
                            <h2><a href="javascript:;"
                                   target="_self">{{$feature_news_js['top_views']->categories[0]->name ?? 'Updating'}}</a>
                            </h2>
                        </div>
                        <!----article_title------>
                        @if(!empty($feature_news_js['top_views']))
                            <div class="category_article_wrapper">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="top_article_img">
                                            <a href="javascript:;" target="_self"><img class="img-responsive"
                                                                                       src="{{asset($feature_news_js['top_views']->image_link ?? '')}}"
                                                                                       alt="feature-top">
                                            </a>
                                        </div>
                                        <!----top_article_img------>
                                    </div>
                                    <div class="col-md-6">
                                        <span
                                            class="tag purple">{{$feature_news_js['top_views']->categories[0]->name ?? 'Updating'}}</span>

                                        <div class="category_article_title">
                                            <h2><a href="javascript:;"
                                                   target="_self">{{$feature_news_js['top_views']->name ?? 'Updating'}}</a>
                                            </h2>
                                        </div>
                                        <!----category_article_title------>
                                        <div class="category_article_date"><a
                                                href="#">{{($feature_news_js['top_views']->created_at->toDateString()) ?? 'Updating'}}</a>,
                                            by: <a
                                                href="#">{{($feature_news_js['top_views']->author->first_name.' '.$feature_news_js['top_views']->author->last_name) ?? 'Updating'}}</a>
                                        </div>
                                        <!----category_article_date------>
                                        <div class="category_article_content">
                                            {{$feature_news['top_views']->description ?? 'Updating'}}
                                        </div>
                                        <!----category_article_content------>
                                        <div class="media_social">
                                            <span><a href="#"><i
                                                        class="fa fa-eye"></i>{{$feature_news_js['top_views']->views ?? 0}} </a> views</span>
                                            <span><i class="fa fa-comments-o"></i><a href="#">4</a> Comments</span>
                                        </div>
                                        <!----media_social------>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(!empty($feature_news_js['featured_post']))
                            <div class="category_article_wrapper">
                                <div class="row">
                                    @foreach($feature_news_js['featured_post'] as $post)
                                        <div class="col-md-6">
                                            <div class="media">
                                                <div class="media-left">
                                                    <a href="#"><img class="media-object post-image"
                                                                     src="{{asset($post->image_link) ?? ''}}"
                                                                     alt="Generic placeholder image"></a>
                                                </div>
                                                <div class="media-body">
                                                    <span
                                                        class="tag purple">{{$post->categories[0]->name ?? 'Updating'}}</span>

                                                    <h3 class="media-heading"><a href="javascript:;"
                                                                                 target="_self">{{(str_limit($post->name,20)) ?? 'Updating'}}</a>
                                                    </h3>
                                                    <span class="media-date"><a
                                                            href="#">{{($post->created_at->toDateString()) ?? 'Updating'}}</a>,  by: <a
                                                            href="#">{{($post->author->first_name.' '.$post->author->last_name) ?? 'Updating'}}</a></span>

                                                    <div class="media_social">
                                                    <span><a href="#"><i
                                                                class="fa fa-eye"></i>{{$post->views ?? 0}}</a> Views</span>
                                                        <span><a href="#"><i
                                                                    class="fa fa-comments-o"></i>4</a> Comments</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <p class="divider"><a href="javascript:;">More News&nbsp;&raquo;</a></p>
                        @endif
                    </div>
                @endisset
            <!--js-->
                @isset($feature_news_css)
                    <div class="category_section mobile">
                        <div class="article_title header_purple">
                            <h2><a href="javascript:;"
                                   target="_self">{{$feature_news_css['top_views']->categories[0]->name ?? 'Updating'}}</a>
                            </h2>
                        </div>
                        <!----article_title------>
                        @if(!empty($feature_news_css['top_views']))
                            <div class="category_article_wrapper">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="top_article_img">
                                            <a href="javascript:;" target="_self"><img class="img-responsive"
                                                                                       src="{{asset($feature_news_css['top_views']->image_link ?? '')}}"
                                                                                       alt="feature-top">
                                            </a>
                                        </div>
                                        <!----top_article_img------>
                                    </div>
                                    <div class="col-md-6">
                                        <span
                                            class="tag purple">{{$feature_news_css['top_views']->categories[0]->name ?? 'Updating'}}</span>

                                        <div class="category_article_title">
                                            <h2><a href="javascript:;"
                                                   target="_self">{{$feature_news_css['top_views']->name ?? 'Updating'}}</a>
                                            </h2>
                                        </div>
                                        <!----category_article_title------>
                                        <div class="category_article_date"><a
                                                href="#">{{($feature_news_css['top_views']->created_at->toDateString()) ?? 'Updating'}}</a>,
                                            by: <a
                                                href="#">{{($feature_news_css['top_views']->author->first_name.' '.$feature_news_css['top_views']->author->last_name) ?? 'Updating'}}</a>
                                        </div>
                                        <!----category_article_date------>
                                        <div class="category_article_content">
                                            {{$feature_news_css['top_views']->description ?? 'Updating'}}
                                        </div>
                                        <!----category_article_content------>
                                        <div class="media_social">
                                            <span><a href="#"><i
                                                        class="fa fa-eye"></i>{{$feature_news_css['top_views']->views ?? 0}} </a> views</span>
                                            <span><i class="fa fa-comments-o"></i><a href="#">4</a> Comments</span>
                                        </div>
                                        <!----media_social------>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(!empty($feature_news_css['featured_post']))
                            <div class="category_article_wrapper">
                                <div class="row">
                                    @foreach($feature_news_css['featured_post'] as $post)
                                        <div class="col-md-6">
                                            <div class="media">
                                                <div class="media-left">
                                                    <a href="#"><img class="media-object post-image"
                                                                     src="{{asset($post->image_link) ?? ''}}"
                                                                     alt="Generic placeholder image"></a>
                                                </div>
                                                <div class="media-body">
                                                    <span
                                                        class="tag purple">{{$post->categories[0]->name ?? 'Updating'}}</span>

                                                    <h3 class="media-heading"><a href="javascript:;"
                                                                                 target="_self">{{(str_limit($post->name,20)) ?? 'Updating'}}</a>
                                                    </h3>
                                                    <span class="media-date"><a
                                                            href="#">{{($post->created_at->toDateString()) ?? 'Updating'}}</a>,  by: <a
                                                            href="#">{{($post->author->first_name.' '.$post->author->last_name) ?? 'Updating'}}</a></span>

                                                    <div class="media_social">
                                                    <span><a href="#"><i
                                                                class="fa fa-eye"></i>{{$post->views ?? 0}}</a> Views</span>
                                                        <span><a href="#"><i
                                                                    class="fa fa-comments-o"></i>4</a> Comments</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <p class="divider"><a href="javascript:;">More News&nbsp;&raquo;</a></p>
                        @endif
                    </div>
                @endisset
            <!--css-->
                @isset($feature_news_ruby)
                    <div class="category_section mobile">
                        <div class="article_title header_purple">
                            <h2><a href="javascript:;"
                                   target="_self">{{$feature_news_ruby['top_views']->categories[0]->name ?? 'Updating'}}</a>
                            </h2>
                        </div>
                        <!----article_title------>
                        @if(!empty($feature_news_ruby['top_views']))
                            <div class="category_article_wrapper">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="top_article_img">
                                            <a href="javascript:;" target="_self"><img class="img-responsive"
                                                                                       src="{{asset($feature_news_ruby['top_views']->image_link ?? '')}}"
                                                                                       alt="feature-top">
                                            </a>
                                        </div>
                                        <!----top_article_img------>
                                    </div>
                                    <div class="col-md-6">
                                        <span
                                            class="tag purple">{{$feature_news_ruby['top_views']->categories[0]->name ?? 'Updating'}}</span>

                                        <div class="category_article_title">
                                            <h2><a href="javascript:;"
                                                   target="_self">{{$feature_news_ruby['top_views']->name ?? 'Updating'}}</a>
                                            </h2>
                                        </div>
                                        <!----category_article_title------>
                                        <div class="category_article_date"><a
                                                href="#">{{($feature_news_ruby['top_views']->created_at->toDateString()) ?? 'Updating'}}</a>,
                                            by: <a
                                                href="#">{{($feature_news_ruby['top_views']->author->first_name.' '.$feature_news_ruby['top_views']->author->last_name) ?? 'Updating'}}</a>
                                        </div>
                                        <!----category_article_date------>
                                        <div class="category_article_content">
                                            {{$feature_news_ruby['top_views']->description ?? 'Updating'}}
                                        </div>
                                        <!----category_article_content------>
                                        <div class="media_social">
                                            <span><a href="#"><i
                                                        class="fa fa-eye"></i>{{$feature_news_ruby['top_views']->views ?? 0}} </a> views</span>
                                            <span><i class="fa fa-comments-o"></i><a href="#">4</a> Comments</span>
                                        </div>
                                        <!----media_social------>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(!empty($feature_news_ruby['featured_post']))
                            <div class="category_article_wrapper">
                                <div class="row">
                                    @foreach($feature_news_ruby['featured_post'] as $post)
                                        <div class="col-md-6">
                                            <div class="media">
                                                <div class="media-left">
                                                    <a href="#"><img class="media-object post-image"
                                                                     src="{{asset($post->image_link) ?? ''}}"
                                                                     alt="Generic placeholder image"></a>
                                                </div>
                                                <div class="media-body">
                                                    <span
                                                        class="tag purple">{{$post->categories[0]->name ?? 'Updating'}}</span>

                                                    <h3 class="media-heading"><a href="javascript:;"
                                                                                 target="_self">{{(str_limit($post->name,20)) ?? 'Updating'}}</a>
                                                    </h3>
                                                    <span class="media-date"><a
                                                            href="#">{{($post->created_at->toDateString()) ?? 'Updating'}}</a>,  by: <a
                                                            href="#">{{($post->author->first_name.' '.$post->author->last_name) ?? 'Updating'}}</a></span>

                                                    <div class="media_social">
                                                    <span><a href="#"><i
                                                                class="fa fa-eye"></i>{{$post->views ?? 0}}</a> Views</span>
                                                        <span><a href="#"><i
                                                                    class="fa fa-comments-o"></i>4</a> Comments</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <p class="divider"><a href="javascript:;">More News&nbsp;&raquo;</a></p>
                        @endif
                    </div>
            @endisset
            <!--ror-->
            </div>
            <!-- Left Section -->
        @includeIf('main::views.general.right_sidebar')

        </div>
    </div>
</section>
