<div wire:poll class="h-screen flex">
    <div class="m-auto min-w-3/6 h-fit">
        <div class="bg-(--white) rounded-t-[24px] border-t-8 border-x-8 border-(--blue-light) p-3 flex justify-between ">
            <h1 class="text-6xl">Lobby's</h1>
            <div class="flex items-center">
                <a href="{{route("createLobby")}}" id="createLobby" class="bg-(--blue-light) p-3 rounded-xl text-(--text-color-light) ">Lobby aanmaken</a>
            </div>
        </div>
        <div class="p-3 bg-(--white)/75 rounded-b-[24px] border-b-8 border-x-8 border-(--blue-light) overflow-y-scroll h-[75vh]">

            @foreach($lobbies as $lobby)
                @if($lobby->completed()) @continue @endif
                <livewire:lobby-select-item :lobby="$lobby" :key="$lobby->id" />
            @endforeach
            @if(count($lobbies) == 0)
                <p class="text-3xl text-center">Er zijn nog geen lobbies</p>
            @endif
        </div>
    </div>
</div>
