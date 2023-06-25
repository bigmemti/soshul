<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create link') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('user.link.store', ['user' => $user]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="flex flex-col my-2">
                            <label for="title" class="text-lg text-gray-400">title</label>
                            @error('title')
                                <span class="text-sm text-red-800">
                                    {{ $message }}
                                </span>
                            @enderror
                            <input value="{{ old('title') }}" class="dark:bg-gray-800 mt-2" type="text" name="title" id="title">
                        </div>
                        <div class="flex flex-col my-2">
                            <label for="color" class="text-lg text-gray-400">color</label>
                            @error('color')
                                <span class="text-sm text-red-800">
                                    {{ $message }}
                                </span>
                            @enderror
                            <input value="{{ old('color') }}" class="dark:bg-gray-800 mt-2" type="color" name="color" id="color">
                        </div>
                        <div class="flex flex-col my-2">
                            <label for="image" class="text-lg text-gray-400">image</label>
                            @error('image')
                                <span class="text-sm text-red-800">
                                    {{ $message }}
                                </span>
                            @enderror
                            <input value="{{ old('image') }}" class="dark:bg-gray-800 mt-2" type="file" name="image" id="image">
                        </div>
                        <div class="flex flex-col my-2">
                            <label for="link" class="text-lg text-gray-400">link</label>
                            @error('link')
                                <span class="text-sm text-red-800">
                                    {{ $message }}
                                </span>
                            @enderror
                            <input value="{{ old('link') }}" class="dark:bg-gray-800 mt-2" type="url" name="link" id="link">
                        </div class="flex flex-col my-2">
                        <div class="flex justify-end">
                            <input type="submit" value="submit" class="mt-5 p-3 bg-green-500 rounded-lg px-6 cursor-pointer">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
