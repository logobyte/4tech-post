<x-layouts.app :title="__(' Create Posts')">

<div class="isolate bg-gray-900 px-6 py-24 sm:py-32 lg:px-8">
  <div aria-hidden="true" class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80">
    <div style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)" class="relative left-1/2 -z-10 aspect-1155/678 w-144.5 max-w-none -translate-x-1/2 rotate-30 bg-linear-to-tr from-[#ff80b5] to-[#9089fc] opacity-20 sm:left-[calc(50%-40rem)] sm:w-288.75"></div>
  </div>
  <div class="mx-auto max-w-2xl text-center">
    <h2 class="text-4xl font-semibold tracking-tight text-balance text-white sm:text-5xl">Create a New Post</h2>
    <p class="mt-2 text-lg/8 text-gray-400">Fill in the details below to create your new post.</p>
  </div>

  <!-- Form to create new post -->
  <form action="{{ route('posts.store') }}" method="POST" class="mx-auto mt-16 max-w-xl sm:mt-20">
    @csrf <!-- CSRF token for security -->

    <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">

      <!-- Title -->
      <div class="sm:col-span-2">
        <label for="title" class="block text-sm/6 font-semibold text-white">Post Title</label>
        <div class="mt-2.5">
          <input id="title" type="text" name="title" required class="block w-full rounded-md bg-white/5 px-3.5 py-2 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500" />
        </div>
      </div>

      <!-- Category -->
      {{--  <div class="sm:col-span-2">
        <label for="category" class="block text-sm/6 font-semibold text-white">Category</label>
        <div class="mt-2.5">
          <select id="category" name="category" required class="block w-full rounded-md bg-white/5 px-3.5 py-2 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500">
            <option value="technology">Technology</option>
            <option value="lifestyle">Lifestyle</option>
            <option value="business">Business</option>
          </select>
        </div>
      </div>  --}}

      <!-- Content -->
      <div class="sm:col-span-2">
        <label for="content" class="block text-sm/6 font-semibold text-white">Content</label>
        <div class="mt-2.5">
          <textarea id="content" name="content" rows="6" required class="block w-full rounded-md bg-white/5 px-3.5 py-2 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500"></textarea>
        </div>
      </div>

      <!-- Publish Options -->
      <div class="flex gap-x-4 sm:col-span-2">
        <div class="flex h-6 items-center">
          <div class="group relative inline-flex w-8 shrink-0 rounded-full bg-white/5 p-px inset-ring inset-ring-white/10 outline-offset-2 outline-indigo-500 transition-colors duration-200 ease-in-out has-checked:bg-indigo-500 has-focus-visible:outline-2">
            <span class="size-4 rounded-full bg-white shadow-xs ring-1 ring-gray-900/5 transition-transform duration-200 ease-in-out group-has-checked:translate-x-3.5"></span>
            <input id="publish" type="checkbox" name="publish" aria-label="Publish now" class="absolute inset-0 appearance-none focus:outline-hidden" />
          </div>
        </div>
        <label for="publish" class="text-sm/6 text-gray-400">
          Publish now
        </label>
      </div>
    </div>

    <!-- Submit Button -->
    <div class="mt-10">
      <button type="submit" class="block w-full rounded-md bg-indigo-500 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-xs hover:bg-indigo-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
        Create Post
      </button>
    </div>
  </form>
</div>


</x-layouts.app>
