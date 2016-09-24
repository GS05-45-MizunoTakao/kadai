
$(function(){

$('#search').on('click', function(){
    $("#search-child").toggle();
});

var setting_id;
$('.setting').on('click', function(){
    setting_id = $(this).attr('id');
    $('#'+setting_id).next().toggle();
});
//$('.setting').hover(function(){
//    setting_id = $(this).attr('id');
//    $('#'+setting_id).next().toggle();
//});
    
});