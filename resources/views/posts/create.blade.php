<x-layouts.app :title="__('Create Post')">
    <div class="mx-auto max-w-2xl text-center">
        <h2 class="text-4xl font-semibold tracking-tight text-white sm:text-5xl">Create Post</h2>
    </div>

    <div class="container mx-auto px-6 py-12 sm:py-16">
        <form action="{{ route('posts.store') }}" method="POST" class="mx-auto mt-16 max-w-xl sm:mt-20 space-y-8">
            @csrf

            <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
                <div class="sm:col-span-2">
                    <label for="title" class="block text-sm font-semibold text-white dark:text-gray-300">Title</label>
                    <div class="mt-2.5">
                        <input id="title" type="text" name="title" value="{{ old('title') }}"
                            class="block w-full rounded-md bg-white/5 dark:bg-gray-700 px-4 py-2 text-base text-white placeholder:text-gray-500 dark:placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-indigo-900 transition-all" />
                    </div>

                    @error('title')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="sm:col-span-2">
                    <label for="content" class="block text-sm font-semibold text-white dark:text-gray-300">Content</label>
                    <div class="mt-2.5">
                        <textarea id="content" name="content" rows="4"
                            class="block w-full rounded-md bg-white/5 dark:bg-gray-700 px-4 py-2 text-base text-white placeholder:text-gray-500 dark:placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-indigo-900 transition-all">{{ old('content') }}</textarea>
                    </div>

                    @error('content')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mt-8">
                <button type="submit"
                    class="w-full rounded-md bg-indigo-500 px-4 py-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-all">
                    Create Post
                </button>
            </div>
        </form>
    </div>
</x-layouts.app>
