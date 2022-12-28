<div class="player-information text-left">
    <p class="player-info">HP: {{$player->getHp()}}</p>
    <p class="player-info">Damage: {{$player->getDamage()}}</p>
    <p class="player-info">Level: {{$player->getLevel()}}</p>
    <p class="player-info">Exp: {{$player->getExp()}}</p>
</div>

<div class="row">
    <div>
        <div class="panel-body">
            <table class="table table-bordered board">
                <tbody>
                @for($i = 1; $i <= $board->getHeight(); $i++)
                    <tr>
                        @for($j = 1; $j <= $board->getWidth(); $j++)
                            @php
                                $class = '';
                                $inner = '';
                            @endphp
                            @if($player->getPositionWidth() == $j && $player->getPositionHeight() == $i)
                                @php
                                    $class = 'player';
                                    $inner = 'Вы';
                                @endphp
                            @endif
                            @foreach($enemies as $enemy)
                                @if($enemy->getPositionWidth() == $j && $enemy->getPositionHeight() == $i)
                                    @php
                                        $class = 'enemy';
                                        $inner = $enemy->getType();
                                    @endphp
                                @endif
                            @endforeach
                            <td class="board-elem {{$class}}">
                                <p>{{$inner}}</p>
                            </td>
                        @endfor
                    </tr>
                @endfor
                </tbody>
            </table>
        </div>
    </div>

</div>
