<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PAGE</title>
</head>
<body>
<div>
    <div>{{$page->title}}</div>
    <div>{{$page->short_description}}</div>
    <div>{{$page->description}}</div>
    <div><img src="{{$page->img_src ? asset($page->img_src) : asset('images/blank.jpg')}}" alt="" width="" height=""></div>
</div>
<hr>
</body>
</html>
