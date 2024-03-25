<div>
    <div x-data="{
        focused: {{ $parentComment ? 'true' : 'false' }},
        isEdit: {{ $commentModel ? 'true' : 'false' }},
        init() {
            if (this.isEdit || this.focused)
                this.$refs.input.focus();
    
            Livewire.on('commentCreated', () => {
                this.focused = false;
            })
        }
    }" class="mb-5">
        <div class="mb-2">
            <textarea x-ref="input" wire:model.live='comment' placeholder="Leave a comment"
                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                :rows="isEdit || focused ? '4' : '1'" @click="focused = true"></textarea>
        </div>
        <div :class="isEdit || focused ? '' : 'hidden'">
            <button type="button" wire:click='createComment'
                class="rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 mr-3">Submit</button>
            <button @click="focused = false; isEdit = false; Livewire.dispatch('cancelEditing')" type="button">
                Cancel
            </button>
        </div>
    </div>
</div>
