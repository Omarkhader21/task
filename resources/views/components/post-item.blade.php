<article class="bg-white flex flex-col shadow my-4">
    <!-- Article Image -->
    <a href="{{ route('view', $post) }}" class="hover:opacity-75">
        <img src="{{ $post->getThumbnail() }}" alt="{{ $post->name }}" class="aspect-[4/3] object-contain">
    </a>
    <div class="bg-white flex flex-col justify-start p-6">
        <div class="flex gap-4">
            @foreach ($post->categories as $category)
                <a href="{{ route('by-category', $category) }}" class="text-blue-700 text-sm font-bold uppercase pb-4">{{ $category->name }}</a>
            @endforeach
        </div>
        <a href="{{ route('view', $post) }}" class="text-3xl font-bold hover:text-gray-700 pb-4">
            {{ $post->name }}
        </a>
        @if ($showAuther)
            <p href="#" class="text-sm pb-3">
                By <a href="#" class="font-semibold hover:text-gray-800">{{ $post->admin->name }}</a>, Published on
                {{ $post->getDateFormattedDate() }} | {{ $post->humanReadTime }}
            </p>
        @endif
        <a href="{{ route('view', $post) }}" class="pb-6">
            {{ $post->shortBody() }}
        </a>
        <a href="{{ route('view', $post) }}" class="uppercase text-gray-800 hover:text-black">Continue Reading <i
                class="fas fa-arrow-right"></i></a>
    </div>
</article>
