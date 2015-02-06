<?php
/**
 * Created by PhpStorm.
 * User: vital
 * Date: 05.02.15
 * Time: 23:56
 */
?>
<ul class="tabsmenu clear">
    <li><?= l('Сейчас', 'weather', array('attributes' => array('class' => array('active')))) ?></li>
    <li><?= l('На 3 дня', 'weather/3') ?></li>
    <li><?= l('На 5 дней', 'weather/5') ?></li>
    <li><?= l('На неделю', 'weather/7') ?></li>
    <li><?= l('На 10 дней', 'weather/10') ?></li>
</ul>
<div class="clearfix"></div>

<ul class="weather-list">
    <li class="day-item" style="background: none; margin-bottom: 1em; border-bottom: 1px solid #ccc;">
        <br>
        <h3>Сейчас</h3>
    </li>

    <li class="day-item" style="background: none;">
        <?php
            $day = $now;
            include __DIR__ . '/_page-tabbed-day-full.tpl.php';
        ?>
    </li>

    <li class="day-item" style="background: none; margin-bottom: 1em; border-bottom: 1px solid #ccc;">
        <br>
        <h3>Сегодня</h3>
    </li>

    <li class="day-item" style="background: none;">
        <?php
            $day = $today;
            include __DIR__ . '/_page-tabbed-day-wide.tpl.php';
        ?>
    </li>

    <li class="day-item" style="background: none; margin-bottom: 1em; border-bottom: 1px solid #ccc;">
        <br>
        <h3>Завтра</h3>
    </li>

    <li class="day-item" style="background: none;">
        <?php
            $day = $tomorrow;
            include __DIR__ . '/_page-tabbed-day-wide.tpl.php';
        ?>
    </li>
</ul>
