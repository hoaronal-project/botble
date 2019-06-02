@isset($posts)
    <section id="entity_section" class="entity_section">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="category_section camera">
                        @foreach($posts as $post)
                            <div class="category_article_wrapper">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="top_article_img">
                                            <a href="{{route('public.blog.details')}}/{{$post->slug ?? ''}}" target="_self">
                                                <img class="img-responsive" src="{{asset($post->image_link ?? '')}}"
                                                     alt="feature-top">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <span class="tag orange">{{$post->categories[0]->name ?? 'Updating'}}</span>

                                        <div class="category_article_title">
                                            <h2><a href="{{route('public.blog.details')}}/{{$post->slug ?? ''}}"
                                                   target="_self">{{str_limit($post->name,40) ?? 'Updating'}}</a></h2>
                                        </div>
                                        <div class="article_date"><a
                                                href="#">{{$post->created_at->toDateString() ?? 'Updating'}}</a>, by: <a
                                                href="#">{{$post->author->first_name ?? 'Anonymous'}}</a>
                                        </div>
                                        <div class="category_article_content">
                                            {{str_limit($post->description,120) ?? 'Updating'}}
                                        </div>
                                        <div class="media_social">
                                            <span><a href="#"><i class="fa fa-eye"></i>{{$post->views ?? 0}} </a> views</span>
                                            <span><i class="fa fa-comments-o"></i><a href="#">4</a> Comments</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <nav aria-label="Page navigation" class="pagination_section">
                        {{$posts->links() ?? ''}}
                    </nav>
                </div>
                @includeIf('main::views.general.right_sidebar')
            </div>
        </div>
    </section>
@endisset
