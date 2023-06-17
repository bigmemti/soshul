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
                        <div>
                            <label for="">title</label>
                            <input class="dark:bg-gray-800" type="text" name="title">
                        </div>
                        <div>
                            <label for="">color</label>
                            <input class="dark:bg-gray-800" type="color" name="color" id="color">
                        </div>
                        <div>
                            <label for="image">image</label>
                            <input class="dark:bg-gray-800" type="file" name="image" id="image">
                        </div>
                        <div>
                            <label for="link">link</label>
                            <input class="dark:bg-gray-800" type="url" name="link" id="link">
                        </div>
                        <input type="submit" value="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
