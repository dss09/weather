<?php
/* @var $day object */
?>
<!-- По времени дня -->
<table style="width: 100%;" cellspacing="0" cellpadding="0" border="0">
    <tbody>
    <tr>
        <td style="vertical-align: top;"><br>

            <!-- Расширенный информер -->
            <table style="width: 100%;" cellspacing="0" cellpadding="0" border="0" class="list">
                <tbody>
                <tr class="head">
                    <td style="width: 200px;"></td>
                    <td style="width: 50px;"></td>
                    <td style="width: 60px;"></td>
                    <td></td>
                </tr>

                <!-- Сегодня -->
                <!-- Ночь -->
                <tr class="adv1">
                    <td class="date" style="width: 100px;">
                        <div><span class="day"><?= $day->day_relative_human_readable ?></span><br><?= $day->date_human_readable ?></div>
                        <span class="hour">Ночь</span>
                    </td>
                    <td>
                        <table style="width: 100%;" cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                            <tr>
                                <td style="width: 26px;">
                                    <img width="20" height="20" class="png" src="<?= $day->night->image->src_large ?>" alt="<?= $day->night->image->alt ?>" title="<?= $day->night->image->title ?>">
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                    <td><span class="temp1"><?= $day->night->temperature ?></span></td>
                    <td>
                        <span class="desc">	Ветер <?= $day->night->wind_direction ?>, <?= $day->night->wind_speed ?> м/с, <!-- <nobr>вероятность осадков <b>0</b>% </nobr> --> </span>
                    </td>
                </tr>

                <!-- Утро -->
                <tr class="adv1">
                    <td class="date" style="width: 100px;"><span class="hour">Утро</span></td>
                    <td>
                        <table style="width: 100%;" cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                            <tr>
                                <td style="width: 26px;">
                                    <img width="20" height="20" class="png" src="<?= $day->morning->image->src_large ?>" alt="<?= $day->morning->image->alt ?>" title="<?= $day->morning->image->title ?>">
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                    <td><span class="temp1"><?= $day->morning->temperature ?></span></td>
                    <td>
                        <span class="desc">	Ветер <?= $day->morning->wind_direction ?>, <?= $day->morning->wind_speed ?> м/с, <!-- <nobr>вероятность осадков <b>0</b>% </nobr> --> </span>
                    </td>
                </tr>

                <!-- День -->
                <tr class="adv1">
                    <td class="date" style="width: 100px;"><span class="hour">День</span></td>
                    <td>
                        <table style="width: 100%;" cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                            <tr>
                                <td style="width: 26px;">
                                    <img width="20" height="20" class="png" src="<?= $day->day->image->src_large ?>" alt="<?= $day->day->image->alt ?>" title="<?= $day->day->image->title ?>">
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                    <td><span class="temp1"><?= $day->day->temperature ?></span></td>
                    <td>
                        <span class="desc">	Ветер <?= $day->day->wind_direction ?>, <?= $day->day->wind_speed ?> м/с, <!-- <nobr>вероятность осадков <b>0</b>% </nobr> --> </span>
                    </td>
                </tr>

                <!-- Вечер -->
                <tr class="adv1">
                    <td class="date" style="width: 100px;"><span class="hour">Вечер</span></td>
                    <td>
                        <table style="width: 100%;" cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                            <tr>
                                <td style="width: 26px;">
                                    <img width="20" height="20" class="png" src="<?= $day->evening->image->src_large ?>" alt="<?= $day->evening->image->alt ?>" title="<?= $day->evening->image->title ?>">
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                    <td><span class="temp1"><?= $day->evening->temperature ?></span></td>
                    <td>
                        <span class="desc">	Ветер <?= $day->evening->wind_direction ?>, <?= $day->evening->wind_speed ?> м/с, <!-- <nobr>вероятность осадков <b>0</b>% </nobr> --> </span>
                    </td>
                </tr>

                </tbody>
            </table>
        </td>
    </tr>

    <tr class="line">
        <td colspan="4" style="border-bottom: 2px solid #d3d3d3; padding: 0;"></td>
    </tr>
    </tbody>
</table>
