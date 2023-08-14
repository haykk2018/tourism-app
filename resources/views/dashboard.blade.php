<x-app-layout>
    <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Dashboard') }}
                </h2>
        <nav class="flex justify-center space-x-4">
            @foreach ($pages as $page)
            <a href="edit/{{$page->id}}" class="font-bold px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-100 hover:text-slate-900 text-gray-800 dark:text-gray-200">{{$page->title}}</a>
            @endforeach
        </nav>

        <ul class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">

            @foreach ($pages as $page)
                <div>

                    <div>{{$page->title}}</div>
                    <div>{{$page->short_description}}</div>
                    <div><img src="{{$page->img_src ?? URL::asset('images/blank.jpg')}}" alt="" width="" height="">
                    </div>
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
        </ul>

    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
