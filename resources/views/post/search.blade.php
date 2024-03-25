<x-app-layout>

    <section class="w-full md:w-2/3 flex flex-col items-center px-3">

        <div class="flex flex-col">
            @foreach ($posts as $post)
                <div class="mb-4">
                    <a href="{{ route('view', $post) }}">
                        <h2 class="text-blue-500 font-bold text-lg sm:text-xl mb-2">
                            {!! str_replace(
                                request()->get('search'),
                                '<span class="bg-yellow-400">' . request()->get('search') . '</span>',
                                $post->name,
                            ) !!}</h2>
                    </a>
                    <div>
                        {!! str_replace(
                            request()->get('search'),
                            '<span class="bg-yellow-400">' . request()->get('search') . '</span>',
                            $post->findInShortBody(request()->get('search')),
                        ) !!}
                    </div>
                    <div class="inline-flex items-center justify-center w-full">
                        <hr class="w-64 h-1 my-8 bg-gray-300 border-0 rounded dark:bg-gray-700">
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="flex items-center py-8">
            {{ $posts->links() }}
        </div>

    </section>

    <!-- Sidebar Section -->
    <x-partial.side-bar></x-partial.side-bar>

</x-app-layout>
