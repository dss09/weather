<!-- Ночь -->
<div class="tod-item">
    <span class="day <?= $day->is_red_day ? 'red' : '' ?>"><?= $day->weekday_human_readable_short ?></span>
    <span class="date <?= $day->is_red_day ? 'red' : '' ?>"><span><?= $day->date_day ?></span><?= $day->month_human_readable ?></span>
    <span>Ночь</span>
    <span class="temp"><?= $day->night_short->temperature ?>°C</span>
        <span class="cloudimg">
            <img src="<?= $day->night_short->image->src_middle ?>"
                 alt="<?= $day->night_short->image->alt ?>"
                 title="<?= $day->night_short->image->title ?>">
        </span>
    <span class="cloud"><?= $day->night_short->weather_name ?></span>
    <span class="wind">ветер: <?= $day->night_short->wind_direction_short ?> <?= $day->night_short->wind_speed ?> м/с</span>
    <span>давление: <?= $day->night_short->pressure ?> мм рт. ст<br>влажность: <?= $day->night_short->humidity ?>%</span>
</div>

<!-- День -->
<div class="tod-item">
    <span class="day"></span>
    <span class="date"></span>
    <span>День</span>
    <span class="temp"><?= $day->day_short->temperature ?>°C</span>
        <span class="cloudimg">
            <img src="<?= $day->day_short->image->src_middle ?>"
                 alt="<?= $day->day_short->image->alt ?>"
                 title="<?= $day->day_short->image->title ?>">
        </span>
    <span class="cloud"><?= $day->day_short->weather_name ?></span>
    <span class="wind">ветер: <?= $day->day_short->wind_direction_short ?> <?= $day->day_short->wind_speed ?> м/с</span>
    <span>давление: <?= $day->day_short->pressure ?> мм рт. ст<br>влажность: <?= $day->day_short->humidity ?>%</span>
</div>
