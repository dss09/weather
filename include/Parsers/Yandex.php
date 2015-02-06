<?php
/**
 * Created by PhpStorm.
 * User: vital
 * Date: 06.02.15
 * Time: 0:07
 */

namespace Weather\Parsers;


class Yandex {
    static function execute($city_id) {
        $url = "http://export.yandex.ru/weather-ng/forecasts/{$city_id}.xml";

        $dom = file_get_html($url);

        // [now, today, tomorrow, days]
        $parsed = self::parse($dom);

        return $parsed;
    }

    static function parse($dom) {
        $city_name = 'Тюмень';

        // Days
        $days = array();
        $days_dom = $dom->find('day');

        foreach($days_dom as $day) {
            $days[] = self::parse_day($day);
        }

        // Today
        $today = $days[0];

        // Tomorrow
        $tomorrow = $days[1];

        // Now
        /* @var $dom simple_html_dom_node */
        /* @var $fact simple_html_dom_node */
        $fact = $dom->find('fact', 0);

        $now_date_string = $fact->find('observation_time', 0)->plaintext;

        $now = (array)self::parse_day_part($fact);
        $now['date_human_readable']  = self::get_human_readable_date($now_date_string);
        $now['date_day'] = self::get_date_day($now_date_string);
        $now['month_human_readable'] = self::get_human_readable_month($now_date_string);
        $now['weekday_human_readable'] = self::get_human_readable_weekday($now_date_string);
        $now['weekday_human_readable_short'] = self::get_human_readable_weekday_short($now_date_string);
        $now['day_relative_human_readable'] = $today->day_relative_human_readable;
        $now['sunrise'] = $today->sunrise;
        $now['sunset'] = $today->sunset;
        $now['moon_phase'] = $today->moon_phase;
        $now['moonrise'] = $today->moonrise;
        $now['moonset'] = $today->moonset;
        $now['day_length'] = $today->day_length;
        $now['is_red_day'] = $today->is_red_day;
        $now = (object)$now;

        return array(
            'city_name' => $city_name,
            'now' => $now,
            'today' => $today,
            'tomorrow' => $tomorrow,
            'days' => $days,
        );
    }

    static function parse_day($dom) {
        $moonrise = $dom->find('moonrise', 0);
        $moonset = $dom->find('moonset', 0);

        $result = array(
            'date_human_readable'   => self::get_human_readable_date($dom->date),
            'date_day'              => self::get_date_day($dom->date),
            'month_human_readable'  => self::get_human_readable_month($dom->date),
            'weekday_human_readable' => self::get_human_readable_weekday($dom->date),
            'weekday_human_readable_short' => self::get_human_readable_weekday_short($dom->date),
            'sunrise'               => $dom->find('sunrise', 0)->plaintext,
            'sunset'                => $dom->find('sunset', 0)->plaintext,
            'moon_phase'            => $dom->find('moon_phase', 0)->plaintext,
            'moonrise'              => $moonrise ? $moonrise->plaintext : '',
            'moonset'               => $moonset ? $moonset->plaintext : '',
        );
        $result['day_length'] = self::get_day_length($result['sunrise'], $result['sunset']);
        $result['day_relative_human_readable'] = self::get_human_readable_relative_day($dom->date);
        $result['is_red_day'] = self::is_red_day($dom->date);

        // morning, day, evening, night
        $parts = $dom->find('day_part');

        foreach($parts as $day_part){
            $result[$day_part->type] = self::parse_day_part($day_part);
        }

        $result = (object)$result;

        return $result;
    }

    /**
     * @var $dom simple_html_dom_node
     */
    static function parse_day_part($dom) {
        $temperature = $dom->find('temperature', 0);
        $temperature_from = $dom->find('temperature_from', 0);
        $temperature_to = $dom->find('temperature_to', 0);
        $temperature_avg =  $dom->find('temperature-data avg', 0);

        $result = (object)array(
            'image' => (object)array(
                    'src_large'         => self::get_image_src($dom->find('image', 0)->plaintext, 'large'),
                    'src_middle'        => self::get_image_src($dom->find('image', 0)->plaintext, 'middle'),
                    'src_small'         => self::get_image_src($dom->find('image', 0)->plaintext, 'small'),
                    'alt'               => $dom->find('weather_type', 0)->plaintext,
                    'title'             => $dom->find('weather_type', 0)->plaintext,
                ),
            'temperature'           => $temperature ? $temperature->plaintext : ($temperature_avg ? $temperature_avg->plaintext : ''),
            'temperature_from'      => $temperature_from ? $temperature_from->plaintext : '',
            'temperature_to'        => $temperature_to ? $temperature_to->plaintext : '',
            'weather_name'          => ucfirst($dom->find('weather_type', 0)->plaintext),
            'wind_direction'        => self::get_wind_direction($dom->find('wind_direction', 0)->plaintext),
            'wind_direction_short'  => self::get_wind_direction_short($dom->find('wind_direction', 0)->plaintext),
            'wind_speed'            => $dom->find('wind_speed', 0)->plaintext,
            'humidity'              => $dom->find('humidity', 0)->plaintext,
            'pressure'              => $dom->find('pressure', 0)->plaintext,
        );

        return $result;
    }

    static function get_human_readable_date($date)
    {
        $date = strtotime($date);
        $months = array('', 'января', 'февраля', 'марта', 'апреля', 'мая', 'июня', 'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря');
        return date('d',$date) . ' ' . $months[date('n', $date)];
    }

    static function get_date_day($date)
    {
        $date = strtotime($date);
        return date('d',$date);
    }

    static function get_human_readable_month($date)
    {
        $date = strtotime($date);
        $months = array('', 'января', 'февраля', 'марта', 'апреля', 'мая', 'июня', 'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря');
        return $months[date('n', $date)];
    }

    static function get_human_readable_weekday($date)
    {
        $date = strtotime($date);
        $days = array('Воскресенье', 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота');
        return $days[date('w', $date)];
    }

    static function get_human_readable_weekday_short($date)
    {
        $date = strtotime($date);
        $days = array('Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб');
        return $days[date('w', $date)];
    }

    static function get_human_readable_relative_day($date)
    {
        $date = strtotime($date);

        if (date("Y-m-d", $date) == date("Y-m-d")) {
            return 'Сегодня';
        }

        if (date("Y-m-d", $date - 24*60*60) == date("Y-m-d")) {
            return 'Завтра';
        }

        if (date("Y-m-d", $date - 2*24*60*60) == date("Y-m-d")) {
            return 'Послезавтра';
        }

        return '';
    }

    static function get_wind_direction($code) {
        $wind_directions = array(
            's' => 'Южный',
            'e' => 'Восточный',
            'n' => 'Северный',
            'w' => 'Западный',
            'se' => 'Юго-Восточный',
            'sw' => 'Юго-Западный',
            'ne' => 'Северо-Вочточный',
            'nw' => 'Северо-Западный',
        ) ;
        return isset($wind_directions[$code]) ? $wind_directions[$code] : $code;
    }

    static function get_wind_direction_short($code) {
        $wind_directions = array(
            's' => 'Ю',
            'e' => 'В',
            'n' => 'С',
            'w' => 'З',
            'se' => 'Ю-В',
            'sw' => 'Ю-З',
            'ne' => 'С-В',
            'nw' => 'С-З',
        ) ;
        return isset($wind_directions[$code]) ? $wind_directions[$code] : $code;
    }

    static function get_image_src($code, $size) {
        $icon_theme = 'default';

        $is_night = substr($code, 0, 1) == 'n';
        $day_type = $is_night ? 'night' : 'day';
        $clean_code = $is_night ? substr($code, 1) : $code;

        $module_path = drupal_get_path('module', 'weather');
        $url = url("{$module_path}/img/weather/{$icon_theme}/{$size}/{$day_type}/{$clean_code}.png", array('absolute'=>true));

        return $url;
    }

    static function get_day_length($sunrise, $sunset) {
        if (!strchr($sunrise, ':') && strchr($sunset, ':') ) {
            return '';
        }

        list($from_h, $from_m) = explode(':', $sunrise);
        list($to_h, $to_m) = explode(':', $sunset);

        $h = $to_h - $from_h;
        $m = $to_m - $from_m;

        if ($m < 0) {
            $h = $h - 1;
            $m = 60 - $to_m;
        }

        return "{$h}:{$m}";
    }

    static function is_red_day($date) {
        $date = strtotime($date);
        $week_day = date('w', $date);

        if ($week_day == 0 || $week_day == 6) {
            return true;
        }

        return false;
    }
}
