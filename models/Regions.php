<?php
/**
 * Created by PhpStorm.
 * User: Кирилл
 * Date: 15.03.2016
 * Time: 14:28
 */
class Regions {

    public function get_regions() {

        $sql = "SELECT * FROM regions";

        $rez = DBclass::db()->query($sql);
        return $rez->fetchAll();
    }

    public function get_travel_time($region_id) {
        $full_time = self::get_full_travel_time($region_id);

        $timestamp = ($full_time/2) * 86400;//делим на 2 т.к поездка в регион, а travel_time - кол-во дней туда/обратно

        echo '{"travel_time": '.$timestamp.'}';
    }

    public static function get_full_travel_time($region_id) {
        $sql = "SELECT travel_time FROM regions WHERE id = {$region_id}";

        $rez = DBclass::db()->query($sql);
        $array = $rez->fetchAll();

        return $array[0]["travel_time"];
    }
}