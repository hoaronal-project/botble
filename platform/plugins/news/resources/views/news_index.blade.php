<div class="container">
    <div class="row">
        <div class="col-md-8">
            @isset($news)
                <div class="category_section camera">
                    <div class="article_title header_orange">
                        <h2><a href="{{route('public.news')}}" target="_self">NEWS</a></h2>
                    </div>
                    @foreach($news as $new)
                        <div class="category_article_wrapper">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="top_article_img">
                                        <a href="{{route('public.news.details',['slug' => $new->slug ?? ''])}}" target="_self">
                                            <img style="height: 230px;width: 100%" class="img-responsive"
                                                 src="{{asset($new->image ?? '')}}" alt="feature-top">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <span class="tag orange">{{$new->categories->name ?? 'Updating'}}</span>

                                    <div class="category_article_title">
                                        <h2><a href="{{route('public.news.details',['slug' => $new->slug ?? ''])}}" target="_self">{{$new->name ?? ''}}</a></h2>
                                    </div>
                                    <div class="article_date"><a
                                            href="#">{{$new->created_at->toFormattedDateString() ?? ''}}</a></div>
                                    <div class="category_article_content">
                                        {{str_limit($new->description,100) ?? ''}}
                                    </div>
                                    <div class="media_social">
                                        <span><a href="#"><i
                                                    class="fa fa-eye"></i>{{$new->views ?? 0}} </a> Views</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                @endforeach
                <!-- category_article_wrapper -->
                    <p class="divider"><a href="#">More News&nbsp;&raquo;</a></p>
                </div>
            @endisset
        </div>
        @includeIf('plugins/news::layouts.right_col')
    </div>
    @includeIf('main::views.home.supscriber')
</div>
