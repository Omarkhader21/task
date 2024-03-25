<x-app-layout meta-title="Blogsprint" meta-description="Blogsprint">
    <div class="container mx-auto flex flex-warp py-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-3">
            {{-- Latest posts --}}
            <div class="col-span-2">
                <h2 class="text-lg sm:text-xl font-bold text-blue-500 uppercase pb-1 border-b-2 border-blue-500 mb-3">
                    Latest posts
                </h2>
                <x-post-item :post="$latestPosts"></x-post-item>
            </div>

            {{-- popular posts --}}
            <div>
                <h2 class="text-lg sm:text-xl font-bold text-blue-500 uppercase pb-1 border-b-2 border-blue-500 mb-3">
                    Popular posts
                </h2>

                @foreach ($popularPosts as $post)
                    <div class="grid grid-cols-4 gap-4">
                        <div class="pt-2">
                            <img src="{{ $post->getThumbnail() }}" alt="{{ $post->name }}">
                        </div>
                        <div class="col-span-3">
                            <h3 class="font-bold uppercase whitespace-nowrap truncate">
                                <a href="{{ route('view', $post) }}">
                                    {{ $post->name }}
                                </a>
                            </h3>
                            <div class="flex gap-4 mb-2">
                                @foreach ($post->categories as $category)
                                    <a href="{{ route('by-category', $category) }}"
                                        class="bg-blue-500 text-xs text-white font-bold uppercase p-1 rounded">{{ $category->name }}</a>
                                @endforeach
                            </div>
                            <div class="text-xs">
                                {{ $post->shortBody(10) }}
                            </div>
                            <a href="{{ route('view', $post) }}"
                                class="text-xs uppercase text-gray-800 hover:text-black">Continue Reading <i
                                    class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <hr class="w-48 h-1 mx-auto my-4 bg-gray-100 border-0 rounded md:my-5 dark:bg-gray-700">
                @endforeach
            </div>
        </div>
    </div>
    {{-- Recommended posts --}}
    <div class="mb-3">
        <h2 class="text-lg sm:text-xl font-bold text-blue-500 uppercase pb-1 border-b-2 border-blue-500 mb-3">
            Recommended posts
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-3">
            @foreach ($recommendedPosts as $post)
                <x-post-item :post="$post" :showAuther="false"></x-post-item>
            @endforeach
        </div>
    </div>
    {{-- Latest categories Posts --}}
    @foreach ($categories as $category)
        <div class="mb-3">
            <h2 class="text-lg sm:text-xl font-bold text-blue-500 uppercase pb-1 border-b-2 border-blue-500 mb-3">
                {{ $category->name }} <a href="{{ route('by-category', $category) }}"><i
                        class="fas fa-arrow-right"></i></a>
            </h2>
            <div class="mb-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                    @foreach ($category->publishedPosts()->limit(3)->get() as $post)
                        <div>
                            <x-post-item :post="$post" :showAuther="false"></x-post-item>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach
</x-app-layout>
