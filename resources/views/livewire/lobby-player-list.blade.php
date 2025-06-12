<div wire:poll class="flex flex-col items-center">
    @foreach($players as $player)
        <livewire:lobby-player :player="$player" :key="$player->id" />
    @endforeach
</div>
