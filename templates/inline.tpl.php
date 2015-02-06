<?php
/* @var $text string */
/* @var $now object */
/* @var $today object */
?>
<span class="weather-inline">
    <a href="/weather"><?= $text ?> </a>: <b><?= $now->temperature ?>&nbsp;C</b>
    <img src="<?= $now->image->src_small ?>" alt="<?= $now->image->alt ?>" align="middle">
</span>
