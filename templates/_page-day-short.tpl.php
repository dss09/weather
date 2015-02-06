<?php
/* @var $day object */
?>
<table style="width: 100%;" cellspacing="0" cellpadding="0" border="0" class="list">
    <tbody>
    <tr class="head">
        <td style="width: 160px;"></td>
        <td style="width: 90px;"></td>
        <td style="width: 105px;"></td>
        <td></td>
    </tr>

    <tr class="w-list-adv w-list-adv-d adv1 d2015-02-07">
        <td class="date"><span class="<?= $day->is_red_day ? "daywe" : "day" ?>"><?= $day->weekday_human_readable ?></span><br> <?= $day->date_human_readable ?></td>
        <td>
            <img style="width: 38px" height="38" class="png"
                 src="<?= $day->day_short->image->src_middle ?>" alt="<?= $day->day_short->image->alt ?>" title="<?= $day->day_short->image->title ?>"> <br>
            <span class="precipitation"><?= $day->day_short->weather_name ?></span>
        </td>
        <td><span class="temp1"><?= $day->day_short->temperature ?></span> <span class="temp2"><?= $day->night_short->temperature ?></span></td>
        <td>
            <span class="desc">
                <!-- Вероятность осадков <b>10</b>% -->
                <div style="height: 3px;"></div>	Ветер <?= $day->day_short->wind_direction ?>, <?= $day->day_short->wind_speed ?> м/с
            </span>
        </td>
    </tr>
    <tr class="line">
        <td colspan="4" style="border-bottom: 2px solid #d3d3d3; padding: 0;"></td>
    </tr>
    </tbody>
</table>
