
<div>
    HP: {{$hp}}
    <br>
    Урон: {{$damage}}
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel-body">
                <table class="table  table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">1</th>
                        <th scope="col">2</th>
                        <th scope="col">3</th>
                        <th scope="col">4</th>
                        <th scope="col">5</th>
                        <th scope="col">6</th>
                        <th scope="col">7</th>
                        <th scope="col">8</th>
                    </tr>
                    <tbody>
                    @php

                        for ($i = 1; $i <= $row; $i++) {
                            echo '<tr><th>'. $i .'</th>';
                            for ($j = 1; $j <= $column; $j++) {
                            echo '<td>';
                            if ($playerPosition['row'] == $i && $playerPosition['column'] == $j) {
                                echo 'P ';
                            }
                            if ($enemy->getRow() == $i && $enemy->getColumn() == $j) {
                                echo 'EO';
                            }
                            echo '</td>';
                            }
                            echo '</tr>';
                        }
                    @endphp

                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-3">
            <button name="left" class="btn btn-primary" type="button">Влево</button>
            <button name="up" class="btn btn-primary" type="button">Вверх</button>
            <button name="right" class="btn btn-primary" type="button">Вправо</button>
            <button name="down" class="btn btn-primary" type="button">Вниз</button>
        </div>
    </div>
</div>
<div>
    {{$text ?? ''}}
</div>

