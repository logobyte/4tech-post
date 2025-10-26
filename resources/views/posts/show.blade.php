<x-layouts.app>
    <section class="relative isolate overflow-hidden bg-gradient-to-r from-blue-600 via-purple-500 to-pink-500 px-6 py-24 sm:py-32 lg:px-8 dark:bg-gradient-to-r dark:from-gray-800 dark:via-purple-900 dark:to-pink-900">
        <div class="mx-auto max-w-2xl lg:max-w-4xl text-center text-white dark:text-gray-300">
            <!-- Back Button to Post List -->
            <a href="{{ route('posts.index') }}" class="absolute top-6 left-6 bg-white text-blue-600 hover:bg-blue-600 hover:text-white px-4 py-2 rounded-full shadow-md transition ease-in-out duration-300">
                ← Back to Posts
            </a>

            <!-- Edit Button (conditionally displayed) -->
            @if(auth()->check() && (auth()->user()->id === $post->user_id || auth()->user()->is_admin))
                <a href="{{ route('posts.edit', $post->id) }}" class="absolute top-6 left-45 bg-indigo-600 text-white px-4 py-2 rounded-full shadow-md hover:bg-indigo-500 transition ease-in-out duration-300">
                    Edit Post
                </a>
            @endif

            <!-- Delete Button (conditionally displayed) -->
            @if(auth()->check() && (auth()->user()->id === $post->user_id || auth()->user()->is_admin))
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="absolute top-6 left-75">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class=" bg-red-600 text-white px-4 py-2 rounded-full shadow-md hover:bg-red-500 transition ease-in-out duration-300">
                        Delete Post
                    </button>
                </form>
            @endif

            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold leading-tight mt-8">{{ $post->title }}</h1>

            <figure class="mt-12">
                <blockquote class="text-xl sm:text-2xl font-semibold italic text-white dark:text-gray-200">
                    <p>{{ $post->content }}</p>
                </blockquote>

                <figcaption class="mt-12">
                    <!-- Replace the image source with the user's avatar if available -->
                    <img src="{{ auth()->user()->avatar ?? 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80' }}"
                        alt="{{ auth()->user()->name }}"
                        class="mx-auto w-24 h-24 rounded-full shadow-lg border-4 border-white dark:border-gray-700" />

                    <div class="mt-6 flex items-center justify-center space-x-3 text-base">
                        <!-- User's Name -->
                        <div class="font-semibold text-white dark:text-gray-200">{{ auth()->user()->name }}</div>

                        <!-- A little SVG separator -->
                        <svg viewBox="0 0 2 2" width="4" height="4" aria-hidden="true" class="fill-white dark:fill-gray-300">
                            <circle r="1" cx="1" cy="1" />
                        </svg>

                        <!-- User's Email -->
                        <div class="text-gray-300 dark:text-gray-400">{{ auth()->user()->email }}</div>
                    </div>
                </figcaption>
            </figure>

            <!-- Comments Section -->
            <div class="mt-12">
                <h2 class="text-2xl font-semibold text-white">Comments:</h2>

                <!-- Display Comments -->
                @foreach($post->comments as $comment)
                    <div class="bg-white p-4 rounded-lg shadow-md mb-4 mt-4">
                        <div class="font-semibold text-lg">{{ $comment->user->name }}</div>
                        <p class="mt-2 text-gray-700 dark:text-gray-300">{{ $comment->comment }}</p>
                        <div class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                            {{ $comment->created_at->diffForHumans() }}
                        </div>

                        <!-- Comment Deletion (Only allow the author of the comment or admins to delete) -->
                        @if(auth()->check() && (auth()->user()->id === $comment->user_id || auth()->user()->is_admin))
                            <form action="{{ route('comments.destroy', [$post->uuid, $comment->id]) }}" method="POST" class="mt-4">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-500">Delete Comment</button>
                            </form>
                        @endif
                    </div>
                @endforeach

                <!-- Comment Form (only visible to authenticated users) -->
                @auth
                    <form action="{{ route('comments.store', $post->uuid) }}" method="POST">
                        @csrf
                        <textarea name="comment" class="w-full p-3 border rounded-md" rows="4" placeholder="Write your comment here..."></textarea>

                        <button type="submit" class="px-6 py-3 bg-blue-600 text-white rounded-md hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Post Comment
                        </button>
                    </form>
                @endauth

                <!-- Message for users who are not authenticated -->
                @guest
                    <div class="mt-4 text-gray-400">
                        Please <a href="{{ route('login') }}" class="text-blue-500 hover:underline">login</a> to leave a comment.
                    </div>
                @endguest
            </div>
        </div>
    </section>
</x-layouts.app>
