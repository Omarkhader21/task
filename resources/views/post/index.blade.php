<x-app-layout :meta-title="'The Blogsprint - posts by category ' . $category->title" meta-description="By category description">

    <section class="w-full md:w-2/3 flex flex-col items-center px-3">

        @foreach ($posts as $post)
            <x-post-item :post="$post"></x-post-item>
        @endforeach
        <!-- Pagination -->
        <div class="flex items-center py-8">
            {{ $posts->links() }}
        </div>

    </section>

    <!-- Sidebar Section -->
    <x-partial.side-bar></x-partial.side-bar>

</x-app-layout>
