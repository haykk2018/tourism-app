<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Catalog Movie Site</title>
</head>
<body>
@foreach ($pages as $page)
    <div>
        categories
        <div>{{$page->title}}</div>
        <div>{{$page->short_description}}</div>
        <div><img src="{{$page->img_src ?? URL::asset('images/blank.jpg')}}" alt="" width="" height=""></div>
        <div>
            @isset($page->categories)
                @foreach($page->categories as $category)
                    <p>Category: {{$category->name}}</p>
                @endforeach
            @endisset
        </div>
        </div>
        end categories
        <hr>
    </div>
@endforeach
</body>
</html>
