<!-- Ночь -->
<div class="tod-item">
    <span class="day <?= $day->is_red_day ? 'red' : '' ?>"><?= $day->weekday_human_readable_short ?></span>
    <span class="date <?= $day->is_red_day ? 'red' : '' ?>"><span><?= $day->date_day ?></span><?= $day->month_human_readable ?></span>
    <span>Ночь</span>
    <span class="temp"><?= $day->night->temperature ?>°C</span>
        <span class="cloudimg">
            <img src="<?= $day->night->image->src_middle ?>"
                 alt="<?= $day->night->image->alt ?>"
                 title="<?= $day->night->image->title ?>">
        </span>
    <span class="cloud"><?= $day->night->weather_name ?></span>
    <span class="wind">ветер: <?= $day->night->wind_direction_short ?> <?= $day->night->wind_speed ?> м/с</span>
    <span>давление: <?= $day->night->pressure ?> мм рт. ст<br>влажность: <?= $day->night->humidity ?>%</span>
</div>

<!-- Утро -->
<div class="tod-item">
    <span class="day"></span>
    <span class="date"></span>
    <span>Утро</span>
    <span class="temp"><?= $day->morning->temperature ?>°C</span>
        <span class="cloudimg">
            <img src="<?= $day->morning->image->src_middle ?>"
                 alt="<?= $day->morning->image->alt ?>"
                 title="<?= $day->morning->image->title ?>">
        </span>
    <span class="cloud"><?= $day->morning->weather_name ?></span>
    <span class="wind">ветер: <?= $day->morning->wind_direction_short ?> <?= $day->morning->wind_speed ?> м/с</span>
    <span>давление: <?= $day->morning->pressure ?> мм рт. ст<br>влажность: <?= $day->morning->humidity ?>%</span>
</div>

<!-- День -->
<div class="tod-item">
    <span class="day"></span>
    <span class="date"></span>
    <span>День</span>
    <span class="temp"><?= $day->day->temperature ?>°C</span>
        <span class="cloudimg">
            <img src="<?= $day->day->image->src_middle ?>"
                 alt="<?= $day->day->image->alt ?>"
                 title="<?= $day->day->image->title ?>">
        </span>
    <span class="cloud"><?= $day->day->weather_name ?></span>
    <span class="wind">ветер: <?= $day->day->wind_direction_short ?> <?= $day->day->wind_speed ?> м/с</span>
    <span>давление: <?= $day->day->pressure ?> мм рт. ст<br>влажность: <?= $day->day->humidity ?>%</span>
</div>

<!-- Вечер -->
<div class="tod-item">
    <span class="day"></span>
    <span class="date"></span>
    <span>Вечер</span>
    <span class="temp"><?= $day->evening->temperature ?>°C</span>
        <span class="cloudimg">
            <img src="<?= $day->evening->image->src_middle ?>"
                 alt="<?= $day->evening->image->alt ?>"
                 title="<?= $day->evening->image->title ?>">
        </span>
    <span class="cloud"><?= $day->evening->weather_name ?></span>
    <span class="wind">ветер: <?= $day->evening->wind_direction_short ?> <?= $day->evening->wind_speed ?> м/с</span>
    <span>давление: <?= $day->evening->pressure ?> мм рт. ст<br>влажность: <?= $day->evening->humidity ?>%</span>
</div>
