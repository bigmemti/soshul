<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('List links') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="p-3">
                        <a class="bg-green-700 text-black rounded-md p-2" href="{{ route('user.link.create', ['user' => $user]) }}">{{ __('create new link') }}</a>
                    </div>
                    <div class="mt-3">
                        <table class="w-full">
                            <thead>
                                <th>{{ __('image') }}</th>
                                <th>{{ __('title') }}</th>
                                <th>{{ __('color') }}</th>
                                <th>{{ __('link') }}</th>
                                <th>{{ __('actions') }}</th>
                            </thead>
                            <tbody>
                                @forelse ($links as $link)
                                    <tr>
                                        <td class="flex justify-center">
                                            <img class="w-8 h-8 rounded-full" src="{{ asset($link->image) }}" alt="">
                                        </td>
                                        <td class="text-center">{{ $link->title }}</td>
                                        <td class="text-center" style="color: {{ $link->color }};">{{ $link->color }}</td>
                                        <td class="text-center">{{ $link->link }}</td>
                                        <td class="text-center">
                                            
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">{{ __('there is noting.') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
