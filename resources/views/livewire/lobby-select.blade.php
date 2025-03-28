<div class="h-screen flex">
    <div class="m-auto">
        <div class="bg-(--white) rounded-t-[24px] border-t-8 border-x-8 border-(--blue-light) p-3">
            <h1 class="text-6xl">Lobby's</h1>
        </div>
        <div class="bg-(--white)/75 rounded-b-[24px] border-b-8 border-x-8 border-(--blue-light)">

            @foreach($lobbies as $lobby)
                <livewire:lobby-select-item :lobby="$lobby" />
            @endforeach
        </div>
    </div>
</div>
