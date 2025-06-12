@extends('layouts/default')

@section('content')
    <div class="h-screen flex">
        <div class="m-auto w-10/12">
            <div class="bg-(--white) rounded-t-[24px] border-t-8 border-x-8 border-(--blue-light) p-3">
                <h1 class="text-6xl">{{$lobby->name}}</h1>
            </div>
            <div class="flex flex-row bg-(--white)/75 rounded-b-[24px] border-b-8 border-x-8 border-(--blue-light)">
                <div class="md:p-3 p-1 flex-9/12">
                    <livewire:lobby-player-list :lobby="$lobby" />
                </div>
                <div class="md:p-3 p-1 flex-3/12">
                    <a href="" class="bg-(--blue-light) p-2 rounded-xl text-2xl text-(--text-color-light)">Lobby verlaten</a>

                    <livewire:lobby-ready-button :lobby="$lobby" />
                </div>
            </div>
        </div>
    </div>

@endsection
