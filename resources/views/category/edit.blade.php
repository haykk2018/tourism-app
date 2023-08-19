<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('New Category') }}
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
                <form action="/category" method="post">
                    @csrf
                    @method('put')
                    <input name =id value="{{$category->id}}" hidden>
                    <div class="sm:p-8">
                        <x-input-label for="name"/>
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                      :value="old('name', $category->name)"
                                      required autofocus autocomplete="name"/>
                        <x-input-error class="mt-2" :messages="$errors->get('name')"/>
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
                        x-on:click.prevent="$dispatch('open-modal', 'confirm-page-deletion')"
                    >{{ __('Delete') }}</x-danger-button>

                    <x-modal name="confirm-page-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
                        <form method="post" action="/category/delete" class="p-6">
                            @csrf
                            @method('delete')
                            <input name="id" value="{{$category->id}}" hidden/>
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
