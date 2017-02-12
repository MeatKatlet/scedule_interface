<?php
/**
 * Created by PhpStorm.
 * User: Кирилл
 * Date: 15.03.2016
 * Time: 14:27
 */
class Schedule {


    public function get_data($data, $current_day) {

        $timefrom = $data["timefrom"];
        $timeto = ($data["timeto"]=="")? "": $data["timeto"] + 86400;//сутки включительно


        $where = "WHERE ";
        if ($timefrom != "" && $timeto=="") {//только левая граница
            $where .= "(s.departure_date >= {$timefrom})";
        }
        else if ($timefrom == "" && $timeto != "") {//только правая граница
            $where .= "(s.arrival_date <= {$timeto})";
        }
        else if ($timefrom != "" && $timeto != "") {//обе границы
            $where .= "(s.departure_date >= {$timefrom} AND s.arrival_date <= {$timeto})";

        }

        //смещение вправо - только правая граница
        if (isset($data["shift_right"]) && $timeto != "") {
            $where .= "or
            (s.departure_date <= {$timeto}
            AND
            s.arrival_date >= {$timeto}
            )";
        }

        //смещение влево - только левая граница
        if (isset($data["shift_left"]) && $timefrom != "") {
            $where .= " or
            (s.departure_date <= {$timefrom}
            AND
            s.arrival_date >= {$timefrom}
            )";
        }

        //выходят за рамки - нужно если есть 2 границы
        if (isset($data["wider_then_period"]) && $timefrom != "" && $timeto != "") {
            $where .= " or
            (s.departure_date <= {$timefrom}
            AND
            s.arrival_date >= {$timeto}
            )";
        }

        //если никаких границ не задано, то выводим с датой отправления на текущий день
        if ($timefrom == "" && $timeto == "") {
            $where = "WHERE (s.departure_date = {$current_day})";
        }

        //86400 - количество секунд в сутках
        $sql = "SELECT
              /*имена колонок должны быть такими как указано в файле my.js - это надо для правильной работы таблицы-расписания */
              s.id as id,
              r.region_name as region,
              c.name as fio,
              s.departure_date as fromdate,
              s.arrival_date as todate,
              r.travel_time as travel_time,
              (s.departure_date+(r.travel_time*86400)) as back_to_moscow

              FROM schedule s

              INNER JOIN regions r ON s.region_id = r.id

              INNER JOIN couriers c ON s.curier_id = c.id

              {$where}

              ORDER BY  s.departure_date";

        //echo $sql;
        $rez = DBclass::db()->query($sql);

        $array = $rez->fetchAll();


        echo json_encode($array);
    }

    public function loadValidatorMetadata(&$reestr_obj) {
        //для удобства назначения проверяющих правил , валидация запускается в контроллере

        $reestr_obj->addPropertyConstraint('timefrom', new DateFormat());
        $reestr_obj->addPropertyConstraint('timeto', new DateFormat());
        $reestr_obj->addPropertyConstraint('timefrom', new Emptyclass());
        $reestr_obj->addPropertyConstraint('timeto', new Emptyclass());
    }

}