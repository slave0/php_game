@extends("layouts.index")
@section('title', 'Главное меню')
@section('content')
    <div class="board-container">
        <div class="col-md-8 game-info">

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
        </div>

        <div class="col-md-3">
            <div class="control-panel text-center action-menu">
                <p>Управление</p>
                <button data-action="move" name="left" class="btn btn-primary button-control" type="button">Влево
                </button>
                <button data-action="move" name="up" class="btn btn-primary button-control" type="button">Вверх</button>
                <button data-action="move" name="right" class="btn btn-primary button-control" type="button">Вправо
                </button>
                <button data-action="move" name="down" class="btn btn-primary button-control" type="button">Вниз
                </button>
            </div>
        </div>

        <div>
            {{$text ?? ''}}
        </div>
    </div>
@endsection
