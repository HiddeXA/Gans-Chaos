<div wire:poll>
    <button wire:click="toggleReady" href="" data-cy="ready-button" class="bg-(--blue-light) rounded-full text-(--text-color-light) py-1 px-3 my-3 md:my-6">
        @if(auth()->user()->ready)
            Niet klaar
        @else
            Klaar?
        @endif
        <i class="fa-solid fa-user"></i>
        {{$lobby->players->where('ready')->count()}}/{{$lobby->players->count()}}
    </button>
</div>
