<?php
$days_short[] = array_shift($days);
$days_short[] = array_shift($days);

$days_short[] = array_shift($days);
$days_short[] = array_shift($days);
$days_short[] = array_shift($days);
$days_short[] = array_shift($days);

$days_short[] = array_shift($days);
$days_short[] = array_shift($days);
$days_short[] = array_shift($days);
$days_short[] = array_shift($days);
?>
<ul class="tabsmenu clear">
    <li><?= l('Сейчас', 'weather') ?></li>
    <li><?= l('На 3 дня', 'weather/3') ?></li>
    <li><?= l('На 5 дней', 'weather/5') ?></li>
    <li><?= l('На неделю', 'weather/7') ?></li>
    <li><?= l('На 10 дней', 'weather/10') ?></li>
</ul>
<div class="clearfix"></div>

<ul class="weather-list">
    <?php foreach($days_short as $day): ?>
        <li class="day-item">
            <?php include __DIR__ . '/_page-tabbed-day-short.tpl.php'; ?>
        </li>
    <?php endforeach; ?>
</ul>
