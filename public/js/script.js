$(document).ready(function(){
    
    var local = location.href.substring(28,30);
    if(local =="ru"){
        var img = $("<img src='/images/ru.png'>")
        $("#main_lang").prepend(img);
    }
    if(local =="en"){
        var img = $("<img src='/images/us.png'>")
        $("#main_lang").prepend(img);
    }
    if(local =="hy"){
        var img = $("<img src='/images/am.png'>")
        $("#main_lang").prepend(img);
    }

    var cont = new Controller();

    $('#html5-watermark').hide();

    $(document).on("click",".categories",function(){

        var action = $(this).attr('data-action');

        cont.get_images_by_categories(action);

    });

    $(document).on("click",".categories_video",function(){

        $("#images_ajax").empty();

        $("#items_imgs").show(300);

    });
    
    $("#example").hide(); 
    var check = false;
    var check1 = false;
    $(document).on("scroll",$(window),function(){
        var top = $(document).scrollTop();
        
        if(top > 250 && check1==false){
            check1 = true;
            $("#example").show(600); 
        }
        if(top > 750 && check==false){
            check = true;
            var text;
        $.ajax({
            url : local+'/ajax/get_about_text',
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
        
        $(".element").typed({
            strings: [text+"."],
            typeSpeed: 4
        });
        }
    });
    
    var JSON = {
    menu: [
        {name: '0',link: '0', sub: [
            {name: 'lorem ipsum 0-0',link: '0-0', sub: null},
            {name: 'lorem ipsum 0-1',link: '0-1', sub: null},
            {name: 'lorem ipsum 0-2',link: '0-2', sub: null}
        ]
        },
        {name: '1',link: '1', sub: null},
        {name: '2',link: '2', sub: [
            {name: 'lorem ipsum 2-0',link: '2-0', sub: null},
            {name: 'lorem ipsum 2-1',link: '2-1', sub: null},
            {name: 'lorem ipsum 2-2',link: '2-2', sub: [
                {name: 'lorem ipsum 2-2-0',link: '2-2-0', sub: null},
                {name: 'lorem ipsum 2-2-1',link: '2-2-1', sub: null},
                {name: 'lorem ipsum 2-2-2',link: '2-2-2', sub: null},
                {name: 'lorem ipsum 2-2-3',link: '2-2-3', sub: null},
                {name: 'lorem ipsum 2-2-4',link: '2-2-4', sub: null},
                {name: 'lorem ipsum 2-2-5',link: '2-2-5', sub: null},
                {name: 'lorem ipsum 2-2-6',link: '2-2-6', sub: null}
            ]},
            {name: 'lorem ipsum 2-3',link: '2-3', sub: null},
            {name: 'lorem ipsum 2-4',link: '2-4', sub: null},
            {name: 'lorem ipsum 2-5',link: '2-5', sub: null}
        ]
        },
        {name: '3',link: '3', sub: null}
    ]
};

    function makeDIV(elem,parent) {
        var html = [];
        html.push('<div class="collapse list-group-submenu" id="#' + parent + '"><div class="list-group panel">');
        $(elem).each(function() { html.push(makeA(this,parent)); });
        html.push('</div></div>');      
        return html.join("\n");
    }

    function makeA(elem,parent) {
        var html = [];
        if (elem.sub) {
            html.push('<a href="#' + elem.name + '" class="list-group-item collapsed" data-toggle="collapse" aria-expanded="true" data-parent="#' + parent + '">' + elem.name + '</a>');
            html.push(makeDIV(elem.sub,elem.name));
        } else {
            html.push('<a href="' + elem.link + '" class="list-group-item collapsed" data-toggle="collapse" aria-expanded="true" data-parent="#' + parent + '">' + elem.name + '</a>');
        }
        return html.join("\n");
    }

    $(".dropdown-menu li a").click(function(){
        var selText = $(this).text();
        $(this).parents('.btn-group').find('.dropdown-toggle').html(selText+' <span class="caret"></span>').dropdown('toggle');
        $("#Menu").html(makeDIV(JSON.menu,"Menu"));
      //location.reload(true);
    });
    
    $(document).on("click","#choose_lang li a",function(e){
        e.preventDefault();
        var choosen = $(this).text();
        var href = location.href;
        var start = href.substring(0,28);
        var end = href.substring(30);
        if(choosen == " Eng"){
            $("#main_lang").empty();
            var img = $("<img src='/images/us.png'>");
            var span = $("<span class='caret'></span>");
            $("#main_lang").append(img).append(span);
            var new_href = start+"en"+end;
            window.location.href = new_href;
        }
        if(choosen ==" Rus"){
            $("#main_lang").empty();
            var img = $("<img src='/images/ru.png'>");
            var span = $("<span class='caret'></span>");
            $("#main_lang").append(img).append(span);
            var new_href = start+"ru"+end;
            window.location.href = new_href;
        }
        if(choosen ==" Arm"){
            $("#main_lang").empty();
            var img = $("<img src='/images/am.png'>");
            var span = $("<span class='caret'></span>");
            $("#main_lang").append(img).append(span);
            var new_href = start+"hy"+end;
            window.location.href = new_href;
        }
        
        });

});