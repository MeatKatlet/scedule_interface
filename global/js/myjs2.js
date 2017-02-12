/**
 * Created by Кирилл on 15.03.2016.
 */

function validate () {
    var valid = true;
    $(".form-control").each(function( index ) {

        if ($(this).val()=="") {
            valid = false;
        }
    });
    return valid;
}
function calc_arrival(region) {
    //запрашиваем даные по времени в пути, хотя можно хранить время в пути в атрибутах тега option, я решил что в будущем это может привести к путанице и ухудшит приложение

    $.ajax({
        type: "POST",
        dataType: "json",
        data: 'id='+region,
        url: "/get_travel_time",
        success: function(answ){

            var travel_time = answ.travel_time;//возвращается уже деленное на 2 (при допущении что в регион он едет половину количества дней из базы)

            var departure_date = new Date($("#departure_date").val());

            //departure_date + travel_time
            var arrival_date = parseFloat(departure_date.getTime()/1000) + parseFloat(travel_time);//1000 т.к js работает с милисекундами а нам нужны секунды

            var date = new Date(arrival_date*1000);

            var options = {year: 'numeric', month: '2-digit', day: '2-digit' };
            $("#arrival_date_show").val(date.toLocaleDateString('ru-RU', options));//только для показа
        },
        /*complete: function(answ) {

        },*/
        error: function(xhr, status, error) {
            alert("ERROR");
        }
    });
}
$(document).ready(function () {


    $("#select_region").change(function() {

        if ($("#departure_date").val() != "") {
            calc_arrival($(this).val());
        }
    });

    $("#insert_data").click(function() {
        //сначала проверим курьера
        var valid = validate();
        if (valid) {//все поля заполнены
            $.ajax({
                 type: "POST",
                 dataType: "json",
                 data: $("#insert_form").serialize(),
                 url: "/check_courier",
                 success: function(answ){
                    if (answ.curier_status == "notbusy") {
                        $("#message").html("<p style='color: green;'>Данные успешно вставлены.</p>").fadeIn().delay(2000).fadeOut("slow");
                    }
                    else {
                        $("#message").html("<p style='color: red;'>Этот курьер занят.</p>").fadeIn().delay(2000).fadeOut("slow");
                    }


                 },
                 /*complete: function(answ) {

                 },*/
                 error: function(xhr, status, error) {
                     alert("ERROR");
                 }
             });
        }
        else {

            $("#message").html("<p style='color: red;'>Не все поля заполнены.</p>").fadeIn().delay(2000).fadeOut("slow");;
        }


    });



    ///**********************
        $('#datetimepicker1').datetimepicker({locale: 'ru', format: 'YYYY-MM-DD'}).on("dp.change", function(e) {

            $('#datetimepicker1 > div').remove();
            if ($("#select_region").val() != "") {
                calc_arrival($("#select_region").val());
            }

            $('#datetimepicker1').blur();
            document.activeElement.blur();

        });

});