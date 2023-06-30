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
                    <div class="p-3 flex flex-col sm:flex-row gap-2">
                        <a class="text-sm sm:text-base bg-green-700 text-black rounded-md p-2 text-center" href="{{ route('user.link.create', ['user' => $user]) }}">{{ __('create new link') }}</a>
                        <button class="text-sm sm:text-base bg-yellow-500 text-black rounded-md p-2" onclick="navigator.clipboard.writeText('{{ route('links',['user' => $user]) }}')
                            .then(() => {alert('{{ __('your link is copied in your clipboard.') }}')})
                            .catch(() => {alert('something went wrong')});">{{ __('shear your links') }}</button>
                    </div>
                    <div class="mt-3">
                        <table class="w-full">
                            <thead>
                                <th>{{ __('image') }}</th>
                                <th>{{ __('title') }}</th>
                                <th class="hidden md:table-cell">{{ __('color') }}</th>
                                <th class="hidden md:table-cell">{{ __('link') }}</th>
                                <th>{{ __('actions') }}</th>
                            </thead>
                            <tbody>
                                @forelse ($links as $link)
                                    <tr>
                                        <td class="flex justify-center">
                                            <img class="w-8 h-8 rounded-full" src="{{ asset($link->image) }}" alt="">
                                        </td>
                                        <td class="text-center">
                                            <p class="hidden md:inline-block">{{ $link->title }}</p>
                                            <a href="{{ $link->link }}"  style="color: {{ $link->color }};" class="md:hidden">
                                                {{ $link->title }}
                                            </a>
                                        </td>
                                        <td class="text-center hidden md:table-cell" style="color: {{ $link->color }};">{{ $link->color }}</td>
                                        <td class="text-center hidden md:table-cell">
                                            <a href="{{ $link->link }}">
                                                {{ $link->link }}
                                            </a>
                                        </td>
                                        <td class="flex gap-1 sm:gap-3 justify-center">
                                            <a href="{{ route('link.show', ['link' => $link]) }}" class="text-xs p-2 px-4 sm:text-base md:px-6 rounded-lg cursor-pointer bg-sky-500">{{ __("show") }}</a>
                                            <a href="{{ route('link.edit', ['link' => $link]) }}" class="text-xs p-2 px-4 sm:text-base md:px-6 rounded-lg cursor-pointer bg-yellow-500">{{ __("edit") }}</a>
                                            <form action="{{ route('link.destroy', ['link' => $link]) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="text-xs p-2 px-4 sm:text-base md:px-6 rounded-lg cursor-pointer bg-red-500 ">
                                                    {{ __("delete") }}
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center pt-4 text-2xl">{{ __('there is noting.') }}</td>
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
