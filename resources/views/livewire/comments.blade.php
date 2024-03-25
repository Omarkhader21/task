<div>
    <livewire:comment-create :post="$post"></livewire:comment-create>
    @foreach ($comments as $comment)
        <livewire:comment-item :comment="$comment"
            wire:key='comment={{ $comment->id }}-{{ $comment->comments->count() }}'></livewire:comment-item>
    @endforeach
</div>
