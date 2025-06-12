<div class="w-[60vw] flex items-center justify-between p-2 m-3 bg-(--white) rounded-[24px] border-2 border-(--blue-light)">
    <div class="flex items-center">
        <img class="rounded-full aspect-square mx-4 w-15" alt="lobby" src="{{asset("/images/default-profile-pic.jpg")}}">
        <span class="text-2xl"> {{$lobby->name}} </span>
    </div>
    <div class="flex items-center gap-3">
        <i class="fa-solid fa-user"></i>
        <span> {{$lobby->players->count()}}/{{$lobby->max_players}} </span>
        <a class="bg-(--orange) p-2 rounded-xl text-(--text-color-light)" href="{{route("lobby", $lobby->id)}}">Deelnemen</a>
    </div>
</div>
