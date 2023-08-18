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
        <div>{{$page->title}}</div>
        <div ><p class="first-line:uppercase first-line:tracking-widest
  first-letter:text-7xl first-letter:font-bold first-letter:text-white
  first-letter:mr-3 first-letter:float-left
">{{$page->short_description}}</p></div>
        <div><img src="{{$page->img_src ?? URL::asset('storage/blank.jpg')}}" alt="" width="" height=""></div>
        <div>
            @isset($page->categories)
                @foreach($page->categories as $category)
                    <p>Category: {{$category->name}}</p>
                @endforeach
            @endisset
        </div>
        </div>
        <hr>
@endforeach
</body>
</html>
