@isset($posts)
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="entity_wrapper">
                    <div class="entity_title header_purple">
                        <h1><a href="javascript:;" target="_blank">{{$category_name ?? 'Update After'}}</a></h1>
                    </div>
                </div>
                <!--A post-->
                <div class="row">
                    @foreach($posts as $post)
                        <div class="col-md-6 category-post">
                            <div class="category_article_body">
                                <div class="top_article_img">
                                    <img class="img-responsive" src="{{asset($post->image_link ?? 'No photo')}}" alt="feature-top">
                                </div>
                                <!-- row -->

                                <div class="category_article_title">
                                    <h5><a href="{{route('public.blog.details')}}/{{$post->slug ?? ''}}" target="_blank">{{str_limit($post->name,25) ?? 'Updating'}}</a></h5>
                                </div>
                                <!-- row -->

                                <div class="article_date">
                                    <a href="#">{{$post->created_at->toDateString() ?? 'Updating'}}</a>, by: <a href="#">{{$post->author->first_name ?? 'Anonymous'}}</a>
                                </div>
                                <!-- row -->

                                <div class="category_article_content">
                                    {{str_limit($post->description,90) ?? 'Updating'}}
                                </div>
                                <!-- row -->

                                <div class="article_social">
                                    <span><a href="#"><i class="fa fa-eye"></i>{{$post->views ?? 0}} </a> Views</span>
                                    <span><i class="fa fa-comments-o"></i><a href="#">4</a> Comments</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!--A post-->
                <p class="divider"><a href="#">More News&nbsp;&raquo;</a></p>
            </div>
            @includeIf('main::views.general.right_sidebar')
        </div>
    </div>
@endisset
