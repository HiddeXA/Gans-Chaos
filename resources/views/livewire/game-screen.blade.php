<div wire:poll>
    <div class="z-10 rounded-2xl border-2 border-(--blue-light) bg-(--white)  flex w-fit p-3 absolute top-2 left-2">
        <img src="{{asset($this->profileImages[$game->lobby->players[0]->gamer_tag])}}" alt="" class="h-11 w-11 aspect-square align-middle mr-3">
        <h3 class="align-middle leading-10">{{$game->lobby->players[0]->gamer_tag}}</h3>
    </div>

    @isset($game->lobby->players[1])
        <div class="z-10 rounded-2xl border-2 border-(--blue-light) bg-(--white)  flex w-fit p-3 absolute top-2 right-2">
            <img src="{{asset($this->profileImages[$game->lobby->players[1]->gamer_tag])}}" alt="" class="h-11 w-11 aspect-square align-middle mr-3">
            <h3 class="align-middle leading-10">{{$game->lobby->players[1]->gamer_tag}}</h3>
        </div>
    @endisset

    @isset($game->lobby->players[2])
    <div class="z-10 rounded-2xl border-2 border-(--blue-light) bg-(--white)  flex w-fit p-3 absolute bottom-2 left-2">
        <img src="{{asset($this->profileImages[$game->lobby->players[2]->gamer_tag])}}" alt="" class="h-11 w-11 aspect-square align-middle mr-3">
        <h3 class="align-middle leading-10">{{$game->lobby->players[2]->gamer_tag}}</h3>
    </div>
    @endisset

    @isset($game->lobby->players[3])
        <div class="z-10 rounded-2xl border-2 border-(--blue-light) bg-(--white)  flex w-fit p-3 absolute bottom-2 right-2">
        <img src="{{asset($this->profileImages[$game->lobby->players[3]->gamer_tag])}}" alt="" class="h-11 w-11 aspect-square align-middle mr-3">
        <h3 class="align-middle leading-10">{{$game->lobby->players[3]->gamer_tag}}</h3>
    </div>
    @endisset

    <div class="z-10 rounded-2xl m-auto w-1/4 h-fit bg-(--white) border-2 border-(--blue-light) text-center xl:text-3xl my-2 p-2 xl:p-4">{{isset($game->lobby->players[$game->game_data['current_turn']]) ? $game->lobby->players[$game->game_data['current_turn']]->gamer_tag . ' is aan de beurt' : ''}} </div>

    <div class="z-10 absolute bottom-5 w-full justify-center flex">
        <button wire:click='rollDice' class="disabled:opacity-70 disabled:bg-gray-600 rounded-2xl hover:bg-amber-500  w-fit text-(--white) bg-(--orange) text-center xl:text-3xl xl:p-4 p-2" @if(empty($game->lobby->players[$game->game_data['current_turn']]) || $game->lobby->players[$game->game_data['current_turn']]->gamer_tag != auth()->user()->gamer_tag || $game->game_data['winner'] != null) disabled @endif > Dobbellen</button>
    </div>


    <div id="gameBoard" class="grid gap-1 w-[75vw] h-[75vh] text-sm xl:text-xl m-auto xl:mt-20">
        @foreach($game->game_data['positions'] as $position)
            @if($position['number'] <= 13 )
                <div class="relative w-full h-[10vh] border-2 border-black bg-(--orange) opacity-80 rounded-md content-center row-1 col-{{$position['number']}}">
                    <p class="text-center">{{$position['number']}}</p>
                    <div class="absolute top-0 grid grid-cols-2 gap-2">
                        @foreach($position['players'] as $player)
                            <img class="xl:h-10 xl:w-10 h-6 w-6  aspect-square border-2 rounded-full border-white" src="{{asset($profileImages[$player['gamer_tag']]?? '') }}" alt="">
                        @endforeach
                    </div>
                </div>
                @continue
            @endif

            @if($position['number'] <= 18 )
                <div class="relative w-full h-[10vh] border-2 border-black bg-(--orange) opacity-80 rounded-md content-center row-{{$position['number'] - 12}} col-13">
                    <p class="text-center">{{$position['number']}}</p>
                    <div class="absolute top-0 grid grid-cols-2 gap-2">
                        @foreach($position['players'] as $player)
                            <img class="xl:h-10 xl:w-10 h-6 w-6  aspect-square border-2 rounded-full border-white" src="{{asset($profileImages[$player['gamer_tag']] ?? '')}}" alt="">
                        @endforeach
                    </div>
                </div>
                @continue
            @endif
            @if($position['number'] <= 31 )
               <div class="relative w-full h-[10vh] border-2 border-black bg-(--orange) opacity-80 rounded-md content-center row-7 col-{{32 - $position['number']}}">
                   <p class="text-center">{{$position['number']}}</p>
                   <div class="absolute top-0 grid grid-cols-2 gap-2">
                       @foreach($position['players'] as $player)
                           <img class="xl:h-10 xl:w-10 h-6 w-6   aspect-square border-2 rounded-full border-white" src="{{asset($profileImages[$player['gamer_tag']] ?? '')}}" alt="">
                       @endforeach
                   </div>
               </div>
               @continue
            @endif
            @if($position['number'] <= 36 )
               <div class="relative w-full h-[10vh] border-2 border-black bg-(--orange) opacity-80 rounded-md content-center row-{{38 - $position['number']}} col-1">
                   <p class="text-center">{{$position['number']}}</p>
                   <div class="absolute top-0 grid grid-cols-2 gap-2">
                       @foreach($position['players'] as $player)
                           <img class="xl:h-10 xl:w-10 h-6 w-6   aspect-square border-2 rounded-full border-white" src="{{asset($profileImages[$player['gamer_tag']] ?? '')}}" alt="">
                       @endforeach
                   </div>
               </div>
               @continue
            @endif
            @if($position['number'] <= 47 )
                <div class="relative w-full h-[10vh] border-2 border-black bg-(--orange) opacity-80 rounded-md content-center row-2 col-{{$position['number'] + 1}}">
                    <p class="text-center">{{$position['number']}}</p>
                    <div class="absolute top-0 grid grid-cols-2 gap-2">
                        @foreach($position['players'] as $player)
                            <img class="xl:h-10 xl:w-10 h-6 w-6   aspect-square border-2 rounded-full border-white" src="{{asset($profileImages[$player['gamer_tag']] ?? '')}}" alt="">
                        @endforeach
                    </div>
                </div>
                @continue
            @endif
            @if($position['number'] <= 51 )
                <div class="relative w-full h-[10vh] border-2 border-black bg-(--orange) opacity-80 rounded-md content-center  col-12">
                    <p class="text-center">{{$position['number']}}</p>
                    <div class="absolute top-0 grid grid-cols-2 gap-2">
                        @foreach($position['players'] as $player)
                            <img class="xl:h-10 xl:w-10 h-6 w-6   aspect-square border-2 rounded-full border-white" src="{{asset($profileImages[$player['gamer_tag']] ?? '')}}" alt="">
                        @endforeach
                    </div>
                </div>
                @continue
            @endif
            @if($position['number'] <= 61 )
                <div class="relative w-full h-[10vh] border-2 border-black bg-(--orange) opacity-80 rounded-md content-center col-{{63 - $position['number']}} row-6">
                    <p class="text-center">{{$position['number']}}</p>
                    <div class="absolute top-0 grid grid-cols-2 gap-2">
                        @foreach($position['players'] as $player)
                            <img class="xl:h-10 xl:w-10 h-6 w-6   aspect-square border-2 rounded-full border-white" src="{{asset($profileImages[$player['gamer_tag']] ?? '')}}" alt="">
                        @endforeach
                    </div>
                </div>
                @continue
            @endif

            @if($position['number'] == 62)
                <div class="relative w-full h-[10vh] border-2 border-black bg-(--orange) opacity-80 rounded-md rounded-tl-full content-center row-5 col-2">
                    <p class="text-center">{{$position['number']}}</p>
                    <div class="absolute top-0 grid grid-cols-2 gap-2">
                        @foreach($position['players'] as $player)
                            <img class="xl:h-10 xl:w-10 h-6 w-6   aspect-square border-2 rounded-full border-white" src="{{asset($profileImages[$player['gamer_tag']] ?? '')}}" alt="">
                        @endforeach
                    </div>
                </div>
                @continue
            @endif

                <div class="relative w-full h-full border-2 border-black bg-(--blue-light) opacity-80 rounded-md content-center row-start-3 col-start-3 col-span-9 row-span-3">
                    <p class="text-center">{{$position['number']}}</p>
                    <div class="absolute top-0 grid grid-cols-2 gap-2">
                        @foreach($position['players'] as $player)
                            @isset($profileImages[$player['gamer_tag']])
                            <img class="xl:h-10 xl:w-10 h-6 w-6   aspect-square border-2 rounded-full border-white" src="{{asset($profileImages[$player['gamer_tag']] ?? '')}}" alt="">
                            @endisset
                        @endforeach
                    </div>
                </div>

        @endforeach
    </div>
    @if($game->game_data['winner'] != null)
        <div class="absolute top-0 z-20 h-full w-full flex">
            <div class="text-3xl flex justify-center flex-col mx-auto p-5 border-2 rounded-2xl border-orange-400 bg-(--blue-light) text-white m-auto w-1/2 opacity-100 ">
                <p class="text-center mb-3">De Winnaar is {{$game->game_data['winner']}}</p>
                <a class="text-center p-3 text-xl bg-(--orange) rounded-full w-fit " href="{{route('lobbySelect')}}">Terug naar lobbies</a>
            </div>
        </div>
    @endif
</div>
