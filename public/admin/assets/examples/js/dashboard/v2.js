/*!
 * remark (http://getbootstrapadmin.com/remark)
 * Copyright 2016 amazingsurge
 * Licensed under the Themeforest Standard Licenses
 */


$(document).ready(function($) {

    Site.run();
    var exist = $('#dateAppointment').length;
    if(exist > 0){
      $('#dateAppointment').datepicker("destroy");

      $('#dateAppointment').datepicker({
        startDate: "today",
        changeMonth: false,
        changeYear: false,
      });
    }

    /*$('#medicalAppointments')
    .datepicker('option', 'minDate', new Date)
    .datepicker('refresh');*/

    $('.arrow-function').click(function(){
      var option = $(this).attr('data-selected');
      if(option == "right"){
        $(this).addClass("fa-angle-down");
        $(this).removeClass("fa-angle-right");
        $(this).attr('data-selected','down')
      }else{
        $(this).addClass("fa-angle-right");
        $(this).removeClass("fa-angle-down");
        $(this).attr('data-selected','right')
      }
      console.log(option)
    });


    /*$('.fa-angle-down').click(function(){
      console.log("Click and active right")
      $(this).addClass("fa-angle-right");
      $(this).removeClass("fa-angle-down");
    })

    $('.fa-angle-right').click(function(){
      console.log("Right click and active down")
      $(this).addClass("fa-angle-down");
      $(this).removeClass("fa-angle-right");
    })*/

});
