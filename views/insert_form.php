<!DOCTYPE>
<html>
<head>
	<title>Вставка данных</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Page description">
	<meta name="Keywords" content="">
	<meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo $data['baseurl']; ?>/global/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo $data['baseurl']; ?>/global/css/font-awesome.min.css">

    <link rel="stylesheet" href="<?php echo $data['baseurl']; ?>/global/css/formValidation.css">


	<link href="<?php echo $data['baseurl']; ?>/global/css/style.css" rel="stylesheet" media="screen">
	<script src="<?php echo $data['baseurl']; ?>/global/js/jquery-1.12.1.min.js"></script>




    <script type="text/javascript" src="<?php echo $data['baseurl']; ?>/global/js/moment.js"></script>
    <script type="text/javascript" src="<?php echo $data['baseurl']; ?>/global/js/ru.js"></script>
    <script type="text/javascript" src="<?php echo $data['baseurl']; ?>/global/js/transition.js"></script>
    <script type="text/javascript" src="<?php echo $data['baseurl']; ?>/global/js/collapse.js"></script>

    <script type="text/javascript" src="<?php echo $data['baseurl']; ?>/global/js/bootstrap-datetimepicker.js"></script>

    <script type="text/javascript" src="<?php echo $data['baseurl']; ?>/global/js/formValidation.js"></script>

    <script src="<?php echo $data['baseurl']; ?>/global/js/bootstrap.js"></script>

    <script src="<?php echo $data['baseurl']; ?>/global/js/myjs2.js"></script>

</head>
<body>

    <form class="form-horizontal fv-form fv-form-bootstrap" method="post" id="insert_form">
        <fieldset>

            <!-- Form Name -->
            <legend>Вставка данных в таблицу</legend>

            <!-- Select Basic -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="selectbasic">Выберите регион</label>
                <div class="col-md-4">
                    <select name="data[region_id]" id="select_region" class="form-control">
                        <?php
                        echo '<option value="">--</option>';
                        foreach($data["regions"] as $key => &$region) {

                            echo '<option value="'.$region["id"].'" travel_time="'.$region["travel_time"].'" >'.$region["region_name"].'</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="textinput">Дата отъезда из Москвы</label>
                <div class="row">
                    <div class='col-md-4'>

                            <div class='input-group date' id='datetimepicker1'>
                                <input id="departure_date" type='text' name="data[departure_date]" class="form-control" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>

                    </div>

                </div>
            </div>

            <!-- Select Basic -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="selectbasic">ФИО Курьера</label>
                <div class="col-md-4">
                    <select name="data[fio]" id="select_couriers" class="form-control" data-fv-field="fio">
                        <?php
                        echo '<option value="">--</option>';
                        foreach($data["couriers"] as $key => &$v) {

                            echo '<option value="'.$v["id"].'">'.$v["name"].'</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="textinput">Дата прибытия в регион</label>
                <div class="col-md-4">
                    <input id="arrival_date" name="data[arrival_date]" type="hidden">

                    <input disabled id="arrival_date_show" type="text" class="form-control input-md">

                </div>
            </div>

            <!-- Button (Double) -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="button1id"></label>
                 <div class="col-md-8">
                     <button id="insert_data" type="button" class="btn btn-success">Вставить</button>

                 </div>
             </div>

            <div class="form-group">
                <label class="col-md-4 control-label"></label>
                <div id="message" class="col-md-4">

                </div>
            </div>

         </fieldset>
     </form>



 </body>
 </html>