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
                        <button class="bg-yellow-500 text-black rounded-md p-2" onclick="navigator.clipboard.writeText('{{ route('links',['user' => $user]) }}'); alert('{{ __('your link is copied in your clipboard.') }}')">{{ __('shear your links') }}</ذ>
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
                                        <td class="text-center">
                                            <a href="{{ $link->link }}">
                                                {{ $link->link }}
                                            </a>
                                        </td>
                                        <td class="flex gap-3 justify-center">
                                            <a href="{{ route('link.show', ['link' => $link]) }}" class="p-2 px-6 rounded-lg cursor-pointer bg-sky-500">{{ __("show") }}</a>
                                            <a href="{{ route('link.edit', ['link' => $link]) }}" class="p-2 px-6 rounded-lg cursor-pointer bg-yellow-500">{{ __("edit") }}</a>
                                            <form action="{{ route('link.destroy', ['link' => $link]) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="p-2 px-6 rounded-lg cursor-pointer bg-red-500 ">
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
