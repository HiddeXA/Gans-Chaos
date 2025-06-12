<div wire:poll class="h-screen flex">
    <div class="m-auto">
        <div class="bg-(--white) rounded-t-[24px] border-t-8 border-x-8 border-(--blue-light) p-3 flex justify-between">
            <h1 class="text-6xl">Lobby's</h1>
            <div class="flex items-center">
                <a href="{{route("createLobby")}}" id="createLobby" class="bg-(--blue-light) p-3 rounded-xl text-(--text-color-light) ">Lobby aanmaken</a>
            </div>
        </div>
        <div class="p-3 bg-(--white)/75 rounded-b-[24px] border-b-8 border-x-8 border-(--blue-light)">

            @foreach($lobbies as $lobby)
                <livewire:lobby-select-item :lobby="$lobby" :key="$lobby->id" />
            @endforeach

        </div>
    </div>
</div>
