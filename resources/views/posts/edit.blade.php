<x-layouts.app :title="__('Edit Post')">
    <section class="relative isolate overflow-hidden bg-gradient-to-r from-blue-600 via-purple-500 to-pink-500 px-6 py-24 sm:py-32 lg:px-8 dark:bg-gradient-to-r dark:from-gray-800 dark:via-purple-900 dark:to-pink-900">
        <div class="mx-auto max-w-2xl lg:max-w-4xl text-center text-white dark:text-gray-300">
            <!-- Back Button to Post List -->
            <a href="{{ route('posts.index') }}" class="absolute top-6 left-6 bg-white text-blue-600 hover:bg-blue-600 hover:text-white px-4 py-2 rounded-full shadow-md transition ease-in-out duration-300">
                ← Back to Posts
            </a>

            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold leading-tight mt-8">Edit Post</h1>

            <form action="{{ route('posts.update', $post->id) }}" method="POST" class="mt-12 space-y-8 max-w-2xl mx-auto">
                @csrf
                @method('PUT') <!-- Use PUT for updating the post -->

                <div>
                    <label for="title" class="block text-sm font-semibold text-white dark:text-gray-300">Title</label>
                    <input id="title" type="text" name="title" value="{{ old('title', $post->title) }}"
                        class="mt-2.5 block w-full rounded-md bg-white/5 dark:bg-gray-700 px-4 py-2 text-base text-white placeholder:text-gray-500 dark:placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-indigo-900 transition-all" />
                    @error('title')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="content" class="block text-sm font-semibold text-white dark:text-gray-300">Content</label>
                    <textarea id="content" name="content" rows="6"
                        class="mt-2.5 block w-full rounded-md bg-white/5 dark:bg-gray-700 px-4 py-2 text-base text-white placeholder:text-gray-500 dark:placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-indigo-900 transition-all">{{ old('content', $post->content) }}</textarea>
                    @error('content')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-8">
                    <button type="submit"
                        class="w-full rounded-md bg-indigo-500 px-4 py-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-all">
                        Update Post
                    </button>
                </div>
            </form>
        </div>
    </section>
</x-layouts.app>
