import 'select2';

/**
 * Listener for the table selection
 */
$('.item').mouseover( function() {
    $(this).addClass('active-row')
})

$('.item').mouseleave( function () {
    $(this).removeClass('active-row')
})

/**
 * Listener for the table filter
 */
$('.filter').keyup(function () {
    var value = $(this).val().toLocaleLowerCase();

    $('.table tbody tr').filter(function () {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1 )
    })
})

$("document").ready(function(){
    $(".tab-slider--body").hide();
    $(".tab-slider--body:first").show();
});

$(".tab-slider--nav li").click(function() {
    $(".tab-slider--body").hide();
    var activeTab = $(this).attr("rel");
    $("#"+activeTab).fadeIn();
    if($(this).attr("rel") == "tab2"){
        $('.tab-slider--tabs').addClass('slide');
    }else{
        $('.tab-slider--tabs').removeClass('slide');
    }
    $(".tab-slider--nav li").removeClass("active");
    $(this).addClass("active");
});


$('#toggle1').on('click', () => {
    $('#tab2').add .classList.add('animated', 'fadeInRight')
})


$(document).ready(function(){
    $("#search").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("table tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});
