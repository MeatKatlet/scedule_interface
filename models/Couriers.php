<?php
/**
 * Created by PhpStorm.
 * User: Кирилл
 * Date: 16.03.2016
 * Time: 9:40
 */

class Couriers {

    public function get_couriers() {
        $sql = "SELECT * FROM couriers";

        $rez = DBclass::db()->query($sql);
        return $rez->fetchAll();
    }

    public function check_courier($data) {
        $departure_date = strtotime($data["departure_date"]);
        $curier_id = (int) $data["fio"];

        //получаем timestamp - количество времени на путь туда/обратно

        $full_time = Regions::get_full_travel_time($data["region_id"]);


        $full_path = $full_time*86400;
        $back_to_moscaw = $full_path/2;//время только до региона(условно будем считать что пополам)
        $start = $departure_date;
        $end = $departure_date+$full_path;


        //ищем пересечения задаваемого отрезка (дата отправления - дата прибытия обратно в москву) с отрезками в бд, если пересечения есть , то этот курьер на это время полностью или частично занят
        $sql2 = "
        SELECT
		s.id as id

		FROM schedule s

		INNER JOIN regions r ON s.region_id = r.id

		INNER JOIN couriers c ON s.curier_id = c.id
        WHERE
        c.id = {$curier_id} AND
        (
            (s.departure_date >= {$start}  AND s.arrival_date+{$back_to_moscaw} < {$end})
            OR
            (s.arrival_date+{$back_to_moscaw} <= @end AND s.arrival_date+{$back_to_moscaw} > {$start})
            OR
            (s.departure_date < $end AND s.arrival_date+{$back_to_moscaw} > {$start})
            OR
            (s.departure_date >= {$start} AND s.arrival_date+{$back_to_moscaw} <= $end)

        )";


        $rez2 = DBclass::db()->query($sql2);
        $array2 = $rez2->fetchAll();

        if (count($array2)>0) {//пересечения найдены

            echo '{"curier_status": "busy"}';
        }
        else if (count($array2)==0) {

            $sql = "INSERT INTO schedule
				(region_id, curier_id, departure_date, arrival_date)
				VALUES
				(
				{$data['region_id']},
				{$data['fio']},
				{$departure_date},
				{$departure_date}+{$back_to_moscaw}
				);";

            DBclass::db()->query($sql);


            echo '{"curier_status": "notbusy"}';
        }


    }
    public function loadValidatorMetadata(&$reestr_obj) {
        $reestr_obj->addPropertyConstraint('departure_date', new DateFormat());
        $reestr_obj->addPropertyConstraint('departure_date', new Emptyclass());

    }
}