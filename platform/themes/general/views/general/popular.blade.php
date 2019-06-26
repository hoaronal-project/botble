@isset($populars)
<div class="widget">
    <div class="widget_title widget_black">
        <h2><a href="#">Popular News</a></h2>
    </div>
    @foreach($populars as $post)
    <div class="media">
        <div class="media-left">
            <a href="{{route('public.blog.details')}}/{{$post->slug ?? ''}}"><img class="media-object sidebar-img" src="{{asset($post->image_link ?? '')}}"
                             alt="Generic placeholder image"></a>
        </div>
        <div class="media-body">
            <h3 class="media-heading">
                <a href="{{route('public.blog.details')}}/{{$post->slug ?? ''}}" target="_self">{{str_limit($post->name,30) ?? ''}}</a>
            </h3> <span class="media-date"><a href="javascript:;">{{$post->created_at->toDateString()}}</a>,  by: <a href="javascript:;">{{$post->author->first_name}}</a></span>

            <div class="widget_article_social">
                <span>
                    <a href="javascript:;" target="_self"> <i class="fa fa-eye"></i>{{$post->views ?? 0}}</a> Views
                </span>
                <span>
                    <a href="javascript:;" target="_self"><i class="fal fa-comments"></i>4</a> Comments
                </span>
            </div>
        </div>
    </div>
    @endforeach
    <p class="widget_divider"><a href="#" target="_self">More News&nbsp;&raquo;</a></p>
</div>
@endisset
