<div>
    <div>
        <h1 class="my-10 text-3x1 text-center">comments</h1>
        @if (session()->has('message'))
            <div class="flash">
                {{ session('message') }}
            </div>
        @endif

        <form class="my-4 flex flex-column" wire:submit.prevent="addComment">
            <section class="d-block w-100">
                @if ($photo)
                    Photo Preview:
                    <img class="d-block" width="100" height="100" src="{{ $photo->temporaryUrl() }}">
                @endif
                <input class="d-block" type="file" wire:model="photo">
                <div wire:loading wire:target="photo">Uploading...</div>

                @error('photo')
                    <span class="d-block error">{{ $message }}</span>
                @enderror
            </section>
            <br>
            <section class="d-flex">
                <input wire:model="newComment" type="text" class="w-75 rounded border show p-2 mr-2 my-2"
                    placeholder="what's in your mind">
                <div class="py-2">
                    <button type="submit" class="p-2 bg-blue-500 w-20 rounded shadow text-white">add</button>
                </div>
            </section>
        </form>
        @error('newComment')
            <div class="danger" role="alert">
                <span>{{ $message }}</span>
            </div>
        @enderror
        @foreach ($comments as $comment)
            <div class="rounded border shadow p-3 my-2">
                <div class="flex justify-between my-2">


                    <div class="flex">
                        <p class="font-blod text-lg">{{ $comment->creator->name }}</p>
                        <p class="mx-3 py-1 text-xs text-gray-500 front-semiblod">
                            {{ $comment->created_at->diffForHumans() }}</p>
                    </div>
                    <i class="fas fa-times text-red-200 hover:text-red-600"
                        wire:click="remove({{ $comment->id }})"></i>

                </div>
                <div class="d-flex justify-content-around flex-row-reverse align-content-center">
                    @isset($comment->file)
                        <div>
                            @foreach ($comment->file as $item)
                                <img width="100" src="{{ Storage::disk('public')->url($item->File_name) }}"
                                    alt="lakdsjksa">
                            @endforeach
                        </div>
                    @endisset
                    <p class="text-gray-800 self-center">{{ $comment->body }}</p>
                </div>

            </div>
        @endforeach
        {{ $comments->links('pagination') }}

    </div>


</div>
