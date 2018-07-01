//start coding toggle icon
(function ($) {
    "use strict";

//for side nav	
    $('.sidenav').sidenav();
//for dropdown
    $('.dropdown-trigger').dropdown();
//for side collapse 
    $('#slide').click(function () {
        $('#shows').slideToggle('slow');
    });
    $('#slide1').click(function () {
        $('#shows1').slideToggle('slow');
    });   
 $('#slide2').click(function () {
        $('#shows2').slideToggle('slow');
    });
//coding for toggle 
    $("#slide").click(function () {
        $(".carets", this).toggleClass("fa-caret-up fa-caret-down");
    });
    $("#slide1").click(function () {
        $(".carets", this).toggleClass("fa-caret-up fa-caret-down");
    }); 
    $("#slide2").click(function () {
        $(".carets", this).toggleClass("fa-caret-up fa-caret-down");
    });

})(jQuery);


 $(document).ready(function () {
        //for select
    $('select').select();
     $('.tooltip').tooltip(); 
//for data table
    $('#data').DataTable();
//for hide massage specific time
setTimeout(function() {
            $('.success').fadeOut(500);
       },1000); 
});