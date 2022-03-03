<div class="card">
    <h5 class="card-header">
        {{ $title }}
    </h5>

    <div class="card-body">
        <style>
             .card-text {
                 white-space: break-spaces;
                 display: -webkit-box;
                 -webkit-box-orient: vertical;
                 -webkit-line-clamp: 5;
                 overflow: hidden;
             }
             .card-title {
                 display: -webkit-box;
                 -webkit-box-orient: vertical;
                 -webkit-line-clamp: 2;
                 overflow: hidden;
             }
        </style>
        <pre class="card-text">{{ $body }}</pre>

        <a href="{{ route('questions.show', $id) }}" class="btn btn-primary">Подробнее</a>
    </div>

    <div class="card-footer text-muted">
        {{--    Расчет того как давно был сделан пост    --}}
        @php
            use Carbon\Carbon;

            $timeOfCreation = Carbon::create($createdAt);
            $currentTime = Carbon::now();

            if ($timeOfCreation->diffInYears($currentTime) > 0) { // Если более года назад...
                $time = $timeOfCreation->diffInYears($currentTime);
                $word = returnRightWord::main($time, "год", "года", "лет");
                echo $time . " " . $word . " назад";
            }

            elseif ($timeOfCreation->diffInMonths($currentTime) > 0) {
                $time = $timeOfCreation->diffInMonths($currentTime);
                $word = returnRightWord::main($time, "месяц", "месяца", "месяцев");
                echo $time . " " . $word . " назад";
            }

            elseif ($timeOfCreation->diffInDays($currentTime) > 0) {
                $time = $timeOfCreation->diffInDays($currentTime);
                $word = returnRightWord::main($time, "день", "дня", "дней");
                echo $time . " " . $word . " назад";
            }

            elseif ($timeOfCreation->diffInHours($currentTime) > 0) {
                $time = $timeOfCreation->diffInHours($currentTime);
                $word = returnRightWord::main($time, "час", "часа", "часов");
                echo $time . " " . $word . " назад";
            }

            elseif ($timeOfCreation->diffInMinutes($currentTime) > 0) {
                $time = $timeOfCreation->diffInMinutes($currentTime);
                $word = returnRightWord::main($time, "минуту", "минуты", "минут");
                echo $time . " " . $word . " назад";
            }

            else {
                $time = $timeOfCreation->diffInSeconds($currentTime);
                $word = returnRightWord::main($time, "секунда", "секунды", "секунд");
                echo $time . " " . $word . " назад";
            }

        @endphp
    </div>
</div>
