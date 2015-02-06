<?php
/* @var $city_name string */
/* @var $now object */
/* @var $today object */
/* @var $tomorrow object */
/* @var $days array */
/*
object
    ->date_human_readable       // 1 марта
    ->weekday_human_readable    // Вторник
    ->sunrise                   // 8:05
    ->sunset                    // 20:10
    ->moon_phase                //
    ->moonrise                  // 20:00
    ->moonset                   // 8:40
    ->day_length                // 12:05
    ->day_relative_human_readable // Сегодня|Завтра
    ->is_red_day                // true|false
    ->morning
        ->image
            ->src               // http://.../1.png
            ->alt               // ясно
            ->title             // ясно
        ->temperature           // -10
        ->temperature_from      // -11
        ->temperature_to        // -13
        ->weather_name          // ясно
        ->wind_direction        // север - восток
        ->wind_direction_short  // с-ю
        ->wind_speed            // 3.0
        ->humidity              // 69
        ->pressure              // 720
    ->day
        ...                     // as 'morning'
    ->evening
        ...                     // as 'morning'
    ->night
        ...                     // as 'morning'
    ->day_short
        ...                     // as 'morning'
    ->night_short
        ...                     // as 'morning'
 */
array_shift($days);
array_shift($days);
?>

<div class="weather">
    <!-- Сейчас -->
    <div class="current">
        <?php
            $day = $now;
            include(__DIR__ . '/_page-day-wide.tpl.php');
        ?>
    </div>
    <br>

    <!-- Сегодня -->
    <?php
        $day = $today;
        include(__DIR__ . '/_page-day-full.tpl.php');
    ?>

    <!-- Завтра -->
    <?php
        $day = $tomorrow;
        include(__DIR__ . '/_page-day-full.tpl.php');
    ?>

    <!-- Послезавтра и последующие дни -->
    <?php
        foreach($days as $day) {
            include(__DIR__ . '/_page-day-short.tpl.php');
        }
    ?>
</div>
