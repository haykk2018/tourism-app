<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <div class="max-w-xl">
            <div class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight lg:px-8">
                @if ($errors->any())
                    <div class="alert alert-danger">
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
                        <x-input-label for="title"/>
                        <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"
                                      required autofocus autocomplete="title"/>
                        <x-input-error class="mt-2" :messages="$errors->get('title')"/>
                    </div>
                    <div class="sm:p-8">
                        <x-input-label for="short_description"/>
                        <x-text-input id="short_description" name="short_description" type="text"
                                      class="mt-1 block w-full"
                                      required autofocus autocomplete="short_description"/>
                        <x-input-error class="mt-2" :messages="$errors->get('short_description')"/>
                    </div>
                    <div class="sm:p-8">
                        <label for="description"
                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{__('Description')}}</label>
                        <textarea id="description" name="description" rows="4"
                                  class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                  placeholder="Write your description...">
                    </textarea>
                        <br>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="categories">Choose
                            a categories:</label>

                        <select
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            name="category[]" id="categories" multiple>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        <br>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file">Upload
                            file</label>
                        <input name="file"
                               class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400"
                               id="file" type="file">
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
</x-app-layout>
