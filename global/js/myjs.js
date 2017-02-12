/**
 * Created by Кирилл on 15.03.2016.
 */
$(document).ready(function () {

    var options = {year: 'numeric', month: '2-digit', day: '2-digit' };
    //функция форматирования timestamp в дату
    //Date.timezoneOffset(-180); // +3 UTC
    var offset = Math.abs((new Date).getTimezoneOffset() * 60000);//смещение часового пояса юзера в милисекундах

    function stringToDate (e) {
        var date = new Date((e*1000)+offset-7200000);//корректировка на 2 часа

        return date.toLocaleDateString('ru-RU', options);
    }

    $('#table').bootstrapTable({
        url: '/get_schedule',
        columns: [
        {
           field: 'id',
           title: '№'
        },
        {
           field: 'fio',
           title: 'ФИО'
        },
        {
           field: 'region',
           title: 'Регион'
        },
        {
           field: 'fromdate',
           title: 'Дата отъезда',
           formatter: stringToDate

        },
        {
           field: 'todate',
           title: 'Дата прибытия в регион',
           formatter: stringToDate
        },
        {
           field: 'back_to_moscow',
           title: 'Дата прибытия обратно в Москву',
           formatter: stringToDate
        },
        {
           field: 'travel_time',
           title: 'Дней в пути(туда/обратно)'
        }
        ]
        /*onLoadError: function (status) {
            //console.log(1111);
            return false;
        },
        onLoadSuccess: function (data) {
            console.log(data);
            return false;
        },
        onPreBody: function (data) {
            //var d2 = JSON.parse(data);
            console.log(data);
            //console.log($.parseJSON(data));
            return false;
        },*/
    });


    $('#button').click(function () {

        $.ajax({
            type: "POST",
            dataType: "json",
            data: $("#search_form").serialize(),
            url: "/get_schedule2",
            success: function(answ){

                $('#table').bootstrapTable('load', answ);

            },
            /*complete: function(answ) {

            },*/
            error: function(xhr, status, error) {
                alert("ERROR");
            }
        });

    });

    $('#datetimepicker1').datetimepicker({locale: 'ru', format: 'YYYY-MM-DD'}).on("dp.change", function(e) {

        $('#datetimepicker1 > div').css("display","none");

        document.activeElement.blur();
    });


    $('#datetimepicker2').datetimepicker({locale: 'ru', format: 'YYYY-MM-DD'}).on("dp.change", function(e) {

        $('#datetimepicker2 > div').css("display","none");

        document.activeElement.blur();
    });





});

