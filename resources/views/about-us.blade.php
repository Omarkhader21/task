<x-app-layout :meta-title="'Blogsprint - About us page'" :meta-description="'Best Blog'">
    <div class="container my-auto flex flex-wrap py-6">

        <!-- Post Section -->
        <section class="w-full flex flex-col items-center px-3">

            <article class="flex flex-col shadow my-4">
                <!-- Article Image -->
                <a href="#" class="hover:opacity-75">
                    <img src="/storage/{{ $widget->image }}" class="w-full items-center">
                </a>
                <div class="bg-white flex flex-col justify-start p-6">
                    <h1 class="text-3xl font-bold hover:text-gray-700 pb-4">{{ $widget->title }}</h1>
                    <div class="pb-3">
                        {!! $widget->content !!}
                    </div>
                </div>
            </article>
        </section>

        <!-- Sidebar Section -->
    </div>
</x-app-layout>