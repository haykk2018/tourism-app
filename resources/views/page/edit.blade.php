<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <nav class="flex justify-center space-x-4">
            {{--            @foreach ($pages as $page)--}}
            {{--            <a href="dashboard/page?id={{$page->id}}" class="font-bold px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-100 hover:text-slate-900 text-gray-800 dark:text-gray-200">{{$page->title}}</a>--}}
            {{--            @endforeach--}}
        </nav>

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
                @method('PUT')
                <input name="id" value="{{$page->id}}" hidden/>
                <div class="sm:p-8">
                    <x-input-label for="title" :value="__('Title')"/>
                    <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"
                                  :value="old('title', $page->title)" required autofocus autocomplete="name"/>
                    <x-input-error class="mt-2" :messages="$errors->get('title')"/>
                </div>
                <div class="sm:p-8">
                    <x-input-label for="short_description" :value="__('Short Description')"/>
                    <x-text-input id="short_description" name="short_description" type="text" class="mt-1 block w-full"
                                  :value="old('short_description', $page->short_description)" required autofocus
                                  autocomplete="name"/>
                    <x-input-error class="mt-2" :messages="$errors->get('short_description')"/>
                </div>
                <div class="sm:p-8">
                    <label for="description"
                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{__('Description')}}</label>
                    <textarea id="description" name="description" rows="4"
                              class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                              placeholder="Write your description...">
                        {{$page->description}}
                    </textarea>
                    <br>

                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file">Upload file</label>
                    <input name="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file" type="file">

                </div>
                <x-primary-button>{{ __('Save') }}</x-primary-button>
            </form>

            {{--delete--}}
            <br>
            <div>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Once is deleted, all of its resources and data will be permanently deleted. Before deleting, please download any data or information that you wish to retain.') }}
                </p>
            </div>

            <x-danger-button
                x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
            >{{ __('Delete') }}</x-danger-button>

            <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
                <form method="post" action="/delete" class="p-6">
                    @csrf
                    @method('delete')
                    <input name="id" value="{{$page->id}}" hidden/>
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        {{ __('Are you sure you want to delete?') }}
                    </h2>

                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        {{ __('Once is deleted, all of its resources and data will be permanently deleted.') }}
                    </p>
                    <div class="mt-6 flex justify-end">
                        <x-secondary-button x-on:click="$dispatch('close')">
                            {{ __('Cancel') }}
                        </x-secondary-button>

                        <x-danger-button class="ml-3">
                            {{ __('Delete') }}
                        </x-danger-button>
                    </div>
                </form>
            </x-modal>
            {{--end delete--}}
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
