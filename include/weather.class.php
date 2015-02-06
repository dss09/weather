<?php
/**
 * Created by PhpStorm.
 * User: vital
 * Date: 04.02.15
 * Time: 16:57
 */

namespace Weather;

// See: http://informer.gismeteo.ru/getcode/xml.php?id=27612
// http://informer.gismeteo.ru/xml/28367_1.xml


// See: http://openweathermap.org/current
// http://api.openweathermap.org/data/2.5/weather?q=Tyumen,RU
// Tyumen,RU - lat=57.152222&lon=65.527222


// See: http://maarkus.ru/prognoz-pogody-dlya-sajta-cherez-api-yandeksa/
// https://pogoda.yandex.ru/static/cities.xml
// http://export.yandex.ru/weather-ng/forecasts/28367.xml


// See: http://rp5.ru/docs/xml/ru
//

require_once "simple_html_dom.inc.php";
require_once __DIR__ . "/Parsers/Yandex.php";

use Weather\Parsers\Yandex;


// Сейчас
// fact
//     temperature - Температура
//     weather_type - облачно/ясно
//     wind_direction - направление ветра - s
//     wind_speed - скорость ветра - 4.0
//     humidity - влажность - 69
//     pressure - давление - 764
//     daytime - ночь/день - n
//     season - зима/лето - winter

// День
// day
//     sunrise - восход - 08:30
//     sunset - закат - 17:14
//     moon_phase - фаза луны - 1 (code="decreasing-moon")
//     moonrise - восход луны - 19:12
//     moonset - закат луны - 08:30
//     day_part
//         (typeid="1" type="morning")
//         temperature - температура - 12
//         weather_condition - облачность - code="cloudy"
//         weather_type - облачность - облачно с прояснениями
//         weather_type_shor - облачность кратко - обл. с проясн.
//         wind_direction - направление ветра - s
//         wind_speed - скорость ветра - 3.0
//         humidity - влажность - 62
//         pressure - давление - 764
//
//         (typeid="2" type="day")
//         (typeid="3" type="evening")
//         (typeid="4" type="night")
//         (typeid="5" type="day_short")
//         (typeid="6" type="night_short")
//
//     hour
//         (at="0")
//         temperature
//         weather_condition
//         image type="1
//
//         (at="1")
//         (at="2")
//         (at="3")
//         (...)
//         (at="23")

class Weather
{
    const CACHE_KEY = "Weather-parsed-data";

    static function execute($template_name, $city_id, $text='') {
        $cached = self::load_data();

        if ($cached) {
            $variables = $cached->data;
        } else {
            $variables = Yandex::execute($city_id);
            self::write_data($variables);
        }

        $variables['text'] = $text;

        $html = self::render($template_name, $variables);

        return $html;
    }

    static function load_data() {
        $data = cache_get(self::CACHE_KEY);
        return $data;
    }

    static function write_data($data) {
        cache_set(self::CACHE_KEY, $data, 'cache', time() + 1*60*60); // keep 1 hour
    }

    static function get_templates() {
        $module_path = drupal_get_path('module', 'weather');
        $dir = $module_path . '/templates';
        $items = array();

        $files = scandir($dir);

        foreach($files as $file) {
            if ($file == '..' || $file =='.') continue;
            if (!preg_match('/\.tpl\.php$/', $file, $matches)) continue;
            if (substr($file, 0, 1) == '_') continue;

            $name = str_replace(".tpl.php", "", $file);
            $items[] = $name;
        }

        return $items;
    }

    static function render($template_name, $template_vars) {
        // Render
        $module_path = drupal_get_path('module', 'weather');
        $html = theme_render_template("{$module_path}/templates/{$template_name}.tpl.php", $template_vars);

        return $html;
    }

}

