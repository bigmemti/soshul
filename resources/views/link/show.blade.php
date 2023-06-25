<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Show link') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div>
                        <p>
                            title: {{ $link->title }}
                        </p>
                        <p>
                            color:
                            <span style="color: {{ $link->color }};">
                                {{ $link->color }}
                            </span>
                        </p>
                        <p>
                            image: <img src="{{ asset($link->image) }}" alt="" class="w-32 h-32">
                        </p>
                        <p>
                            link:
                            <a href="{{ $link->link }}">
                                {{ $link->link }}
                            </a>
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
