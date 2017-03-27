$(document).ready(function(){
    var local = location.href.substring(28,30);
    var text;
    $.ajax({
        url : 'ajax/get_about_text',
        type : 'get',
        async : false,
        dataType : 'json',
        success : function(resp){
        if(local == 'en'){
        text = resp.data.text_en;
    }
           if(local == 'hy'){
        text = resp.data.text_hy;
    }
    if(local == 'ru'){
        text = resp.data.text_ru;
    }
}
                  });

$(".element1").typed({
    strings: [text+"."],
    typeSpeed: 4
});
});