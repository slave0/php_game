<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
    </style>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <link rel="stylesheet" href="{!! asset('css/app.css') !!}?cache=33" type="text/css" />
</head>
<body>
<br>
<br>
<br>
<br>
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
                    $row = 8;
                    $column = 8;

                    for ($i = 1; $i <= $row; $i++) {
                        echo '<tr><th>'. $i .'</th>';
                        for ($j = 1; $j <= $column; $j++) {
                        echo '<td>';
                        if ($playerPosition[0] == $i && $playerPosition[1] == $j) {
                            echo 'P';
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

<script>


    $(document).ready(function() {
        $('button').click(function(e) {
            let url = '/ajax/';



            var btn = $(this);

            $.ajax({
                method: "GET",
                url: url,
                dataType: "json",
                data: {
                    "name": btn.attr('name'),
                },
                success: function(data) {
                    console.log(data);
                },
                error: function(er) {
                    console.log(er);
                }
            });
        })
    });
</script>
</body>
</html>
