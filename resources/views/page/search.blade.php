<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{__('Search')}}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div>
    @auth
        <a href="{{url("/dashboard")}}" style="float:right;">Dashboard</a>
    @endauth
    <form action="">
        @csrf
        <div class="sm:p-8">
            <x-input-label for="search" :value="__('Search')"/>
            <x-text-input id="search" name="search" type="text" class="mt-1 block w-full"
                          required autofocus autocomplete="search"/>
            <x-input-error class="mt-2" :messages="$errors->get('search')"/>
        </div>
        <x-primary-button>{{ __('Search') }}</x-primary-button>
    </form>
    @isset($pages)
        @foreach ($pages as $page)
            <div>
                <div>{{$page->title}}</div>
                <div><p class="first-line:uppercase first-line:tracking-widest
  first-letter:text-7xl first-letter:font-bold first-letter:text-white
  first-letter:mr-3 first-letter:float-left">{{$page->content}}</p></div>
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
@endisset
</body>
</html>
