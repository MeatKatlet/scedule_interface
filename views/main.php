<!DOCTYPE>
<html>
<head>
    <title>Расписание</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Page description">
    <meta name="Keywords" content="">
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo $data['baseurl']; ?>/global/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo $data['baseurl']; ?>/global/css/font-awesome.min.css">

    <link href="<?php echo $data['baseurl']; ?>/global/css/style.css" rel="stylesheet" media="screen">
    <script src="<?php echo $data['baseurl']; ?>/global/js/jquery-1.8.0.min.js"></script>
    <script src="<?php echo $data['baseurl']; ?>/global/js/myjs.js"></script>


    <script src="<?php echo $data['baseurl']; ?>/global/js/bootstrap2.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="<?php echo $data['baseurl']; ?>/global/css/bootstrap-table.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="<?php echo $data['baseurl']; ?>/global/js/bootstrap-table.js"></script>

    <!-- Latest compiled and minified Locales -->
    <script src="<?php echo $data['baseurl']; ?>/global/js/bootstrap-table-ru-RU.js"></script>


    <script type="text/javascript" src="<?php echo $data['baseurl']; ?>/global/js/moment.js"></script>
    <script type="text/javascript" src="<?php echo $data['baseurl']; ?>/global/js/ru.js"></script>
    <script type="text/javascript" src="<?php echo $data['baseurl']; ?>/global/js/transition.js"></script>
    <script type="text/javascript" src="<?php echo $data['baseurl']; ?>/global/js/collapse.js"></script>

    <script type="text/javascript" src="<?php echo $data['baseurl']; ?>/global/js/bootstrap-datetimepicker.js"></script>

</head>
<body>

<div class="row bar">

    <div class="button_container">
        <a href="/insert_form" target="_blank" class="btn btn-success">Вставить</a>
    </div>

    <form id="search_form" method="post">
        <div class="container">
            <label class="col-md-2 control-label">Начало периода</label>

            <div class="row">
                <div class='col-sm-6'>
                    <div class="form-group">
                        <div class='input-group date' id='datetimepicker1'>
                            <input name="data[timefrom]" type='text' class="form-control"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                        </div>
                    </div>
                </div>

            </div>
            <label class="col-md-2 control-label">Конец периода</label>

            <div class="row">
                <div class='col-sm-6'>
                    <div class="form-group">
                        <div class='input-group date' id='datetimepicker2'>
                            <input name="data[timeto]" type='text' class="form-control"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                        </div>
                    </div>
                </div>

            </div>

            <div class="fixed-table-toolbar">
                <label class="col-md-2 control-label"></label>

                <div class="col-sm-6">
                    <div id="toolbar">
                        <button class="btn btn-default" type="button" id="button">Найти</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="form_options">
            <label class="col-md-12 control-label" for="checkboxes">Опции поиска</label>

            <div class="form-group">

                <div class="col-md-12">
                    <label class="checkbox-inline" for="checkboxes-0">
                        <input type="checkbox" name="data[shift_left]" id="checkboxes-0" value="1">
                        +смещение влево
                    </label>
                </div>

                <div class="col-md-12">
                    <label class="checkbox-inline" for="checkboxes-2">
                        <input type="checkbox" name="data[shift_right]" id="checkboxes-2" value="3">
                        +смещение вправо
                    </label>
                </div>
                <div class="col-md-12">
                    <label class="checkbox-inline" for="checkboxes-3">
                        <input type="checkbox" name="data[wider_then_period]" id="checkboxes-3" value="4">
                        +шире периода поиска
                    </label>
                </div>

            </div>

        </div>
    </form>
</div>


<table id="table"></table>


</body>
</html>