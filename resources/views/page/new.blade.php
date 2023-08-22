<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <div class="max-w-xl">
            <div class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight lg:px-8">
                @if ($errors->any())
                    <div
                        class="ml-4 p-4 mt-16 text-lg text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                        role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="/" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="sm:p-8">
                        <x-input-label for="title" :value="__('Title')"/>
                        <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"
                                      :value="old('title')" required autofocus autocomplete="title"/>
                        <x-input-error class="mt-2" :messages="$errors->get('title')"/>
                    </div>
                    <div class="sm:p-8">
                        <x-input-label for="keywords" :value="__('Keywords')"/>
                        <x-text-input id="keywords" name="keywords" type="text" class="mt-1 block w-full"
                                      :value="old('keywords')" autofocus autocomplete="keywords"/>
                        <x-input-error class="mt-2" :messages="$errors->get('keywords')"/>
                    </div>
                    <div class="sm:p-8">
                        <x-input-label for="meta_description" :value="__('Meta Description')"/>
                        <x-text-input id="meta_description" name="meta_description" type="text"
                                      class="mt-1 block w-full"
                                      :value="old('meta_description')" autofocus autocomplete="meta_description"/>
                        <x-input-error class="mt-2" :messages="$errors->get('meta_description')"/>
                    </div>
                    <div class="sm:p-8">
                        <x-input-label for="menu_name" :value="__('Menu Name')"/>
                        <x-text-input id="menu_name" name="menu_name" type="text" class="mt-1 block w-full"
                                      :value="old('menu_name')" autofocus autocomplete="menu_name"/>
                        <x-input-error class="mt-2" :messages="$errors->get('menu_name')"/>
                    </div>
                    <div class="sm:p-8">
                        <label for="description"
                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{__('Description')}}</label>
                        <textarea id="description" name="description" rows="4"
                                  class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                  placeholder="Write your description...">
                            {{ old('description') }}
                    </textarea>
                        <br>
                        <label for="content"
                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{__('Content')}}</label>
                        <textarea id="content" name="content" rows="4"
                                  class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                  placeholder="Write your content">
                             {{ old('content') }}
                    </textarea>
                        <br>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="categories">Choose
                            a categories:</label>
                        <select
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            name="category[]" id="categories" multiple>
                            @foreach($categories as $category)
                                {{--   vers 1 <option value="{{$category->id}}" @if(is_array(old('category')) and in_array($category->id, old('category'))) selected @endif >--}}
                                <option value="{{ $category->id }}" @selected(is_array(old('category')) and
                                in_array($category->id, old('category')))>
                                {{$category->name}}
                                </option>
                            @endforeach
                        </select>
                        <br>
                        {{--        file inputs          --}}
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file">Upload Image</label>
                        <input name="file"
                               accept="image/*"
                               class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400"
                               id="file" type="file">
                        <div class="" id="img_alt_div">
                            <br>
                            <x-input-label for="img_alt" :value="__('Image Alternative Text')"/>
                            <x-text-input id="img_alt" name="img_alt" type="text" class="mt-1 block w-full"
                                          :value="old('img_alt')" autofocus autocomplete="name"/>
                            <x-input-error class="mt-2" :messages="$errors->get('img_alt')"/>
                        </div>
                        {{--      End  File Inputs        --}}
                    </div>
                    <x-primary-button>{{ __('Save') }}</x-primary-button>
                </form>
            </div>
        </div>
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
    <script>
        let fileInput = document.getElementById("file");
        let img_alt_div = document.getElementById("img_alt_div");
        img_alt_div.style.display = "none";
        fileInput.addEventListener("change", function () {
            // check if the file is selected or not
            if (fileInput.files.length !== 0) {
                img_alt_div.style.display = "block";
            }
        });
    </script>
</x-app-layout>
