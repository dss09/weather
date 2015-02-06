<?php
/* @var $day object */
?>
<table cellspacing="0" cellpadding="0" border="0" style="width:600px">
    <tbody>
    <tr>
        <td width="75" style="padding-bottom: 10px" class="now"></td>
        <td width="60"></td>
        <td width="2"></td>
        <td width="100"></td>
        <td width="2"></td>
        <td width="100"></td>
    </tr>
    <tr>
        <td style="vertical-align: top;" align="center">
            <img width="70" height="70" class="png"
                 src="<?= $day->image->src_large ?>"
                 alt="<?= $day->image->alt ?>"
                 title="<?= $day->image->title ?>">
        </td>
        <td class="title"> <?= $day->temperature ?>&nbsp;°C&nbsp;
            <div class="precip"><?= $day->weather_name ?></div>
        </td>

        <td class="vline">&nbsp;</td>

        <td class="desc"> Ветер <span class="value"><?= $day->wind_direction_short ?></span>, <?= $day->wind_speed ?> <span class="unit">м/с</span><br>
            Давление <span class="value"><?= $day->humidity ?></span> <span class="unit">мм рт.ст.</span><br>
            Влажность <span class="value"><?= $day->pressure ?></span> <span class="unit"></span>
        </td>

        <td class="vline">&nbsp;</td>

        <td class="desc">
            Восход <span><?= $day->sunrise ?></span><br>
            Заход <span><?= $day->sunset ?></span><br>
            Долгота дня <span><?= $day->day_length ?></span>
        </td>
    </tr>
    </tbody>
</table>
