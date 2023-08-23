<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Main DESC">
    <meta name="keywords" content="Main Keywords">
    <title>SITE NAME</title>
</head>
<body>
@auth
    <a href="{{url("/dashboard")}}" style="float:right;">Dashboard</a>
@endauth
<div class="row" style="float: right;">
    <div class="col-md-2 col-md-offset-6 text-right">
        <strong>{{__('Select Language')}}</strong>
    </div>
    <div class="col-md-4">
        <select class="form-control" id="changeLang">
            <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>{{__('English')}}</option>
            <option value="am" {{ app()->getLocale() == 'am' ? 'selected' : '' }}>{{__('Armenian')}}</option>
            <option value="sp" {{ app()->getLocale() == 'ab' ? 'selected' : '' }}>{{__('Arabian')}}</option>
        </select>
    </div>
</div>
@foreach ($pages as $page)
    <div>
        <div>{{$page->title}}</div>
        <div><p class="first-line:uppercase first-line:tracking-widest
  first-letter:text-7xl first-letter:font-bold first-letter:text-white
  first-letter:mr-3 first-letter:float-left
">{{$page->meta_description}}</p></div>
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
<script>
    const curUrlWithoutQuery = window.location.origin + window.location.pathname;
    const lang = document.getElementById("changeLang");
    lang.addEventListener('change', function () {
        window.location.href = curUrlWithoutQuery + "?lang=" + this.value;
    });
</script>
</body>
</html>
