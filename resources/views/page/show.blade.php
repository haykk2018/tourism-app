<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{$page->meta_description}}">
    <meta name="keywords" content="{{$page->keywords}}">
    <title>{{$page->title}}</title>
</head>
<body>
<div>
    <div>{{$page->title}}</div>
    <div>{{$page->description}}</div>
    @isset($page->img_src)
        <div><img src="{{Storage::exists($page->img_src) ? asset($page->img_src) : asset('storage/blank.jpg')}}"
                  alt="{{$page->img_alt}}" width="" height=""></div>
    @endisset
    <div>
        @isset($page->categories)
            @foreach($page->categories as $category)
                <p>Category: {{$category->name}}</p>
            @endforeach
        @endisset
    </div>
</div>
<hr>
</body>
</html>
