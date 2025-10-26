<x-layouts.app :title="__('Posts')">
    <div class="bg-gray-900 py-24 sm:py-32">
  <div class="mx-auto max-w-7xl px-6 lg:px-8">
    <div class="mx-auto max-w-2xl lg:mx-0">
      <h2 class="text-4xl font-semibold tracking-tight text-pretty text-white sm:text-5xl">From the blog</h2>
      <p class="mt-2 text-lg/8 text-gray-300">Learn how to grow your business with our expert advice.</p>
       <flux:button href="{{ route('posts.create') }}" variant="primary">
                Create new post
            </flux:button>
    </div>




    {{ $posts->links() }}
    <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-700 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                 @foreach ($posts as $post)
        <article class="flex max-w-xl flex-col items-start justify-between">
        <div class="flex items-center gap-x-4 text-xs">
          <div class="flex items-center gap-x-4 text-xs">
                        <time datetime="2020-03-16" class="text-gray-400">{{ $post->updated_at }}</time>
                    </div>
        </div>
            <div class="group relative grow">
                        <h3 class="mt-3 text-lg/6 font-semibold text-white group-hover:text-gray-300">
                            <a href="{{ route('posts.show', ['post' => $post->uuid]) }}">
                                <span class="absolute inset-0"></span>
                                {{ $post->title }}
                            </a>
                        </h3>
                        <p class="mt-5 line-clamp-3 text-sm/6 text-gray-400">{{ $post->content }}</p>
                    </div>

        @endforeach
    </div>
</div>
</x-layouts.app>
