<!doctype html>
<html lang="en">
<head>
    <meta property="fb:app_id" content="{{env('FACEBOOK_CLIENT_ID')}}"/>
    <meta property="og:url"
          content="{{route('share-content',['post_id' => $post->id])}}"/>
    <meta property="og:type" content="article"/>
    <meta property="og:title" content="{{$post->name}}"/>
    <meta property="og:description" content="{{$post->description}}"/>
    <meta property="og:image"
          content="https://techvccloud.mediacdn.vn/zoom/650_406/2019/4/23/laravel-15560135934451014989542-crop-15560135974561845680115.jpg"/>
</head>
<body>
<img
    src="https://techvccloud.mediacdn.vn/zoom/650_406/2019/4/23/laravel-15560135934451014989542-crop-15560135974561845680115.jpg"
    alt="">
</body>
</html>
