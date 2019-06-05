@isset($views)
    <div class="widget reviews m30">
        <div class="widget_title widget_black">
            <h2><a href="">High Views</a></h2>
        </div>
        @foreach($views as $post)
            <div class="media">
                <div class="media-left">
                    <a href="{{route('public.news.details',['slug' => $post->slug ?? ''])}}"><img class="media-object sidebar-img" src="{{asset($post->image ?? '')}}"
                                                                                          alt="Generic placeholder image"></a>
                </div>
                <div class="media-body">
                    <h3 class="media-heading">
                        <a href="{{route('public.news.details',['slug' => $post->slug ?? ''])}}" target="_self">{{str_limit($post->name,30) ?? ''}}</a>
                    </h3> <span class="media-date"><a href="javascript:;">{{$post->created_at->toFormattedDateString() ?? ''}}</a></span>

                    <div class="widget_article_social">
                <span>
                    <a href="javascript:;" target="_self"> <i class="fa fa-eye"></i>{{$post->views ?? 0}}</a> Views
                </span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endisset
