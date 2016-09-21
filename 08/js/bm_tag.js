
$(function(){
    

//更新ファイル（bm_detail_view.php)のタグオプションの設定
    var $script  = $('#script');
    var tag      = JSON.parse($script.attr('tag'));    
    var status    = JSON.parse($script.attr('status'));    
    $("#tag-update").val(tag);
    $("#status-update").val(status);

});