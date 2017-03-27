var Controller = function(){
    
    this.get_images_by_categories = function(category){
        
        var obj = {};
        
        obj.category = category;
        var local = location.href.substring(28,30);
        $.ajax({
            url : "/"+local+"/ajax/getImages",
            data : obj,
            type : 'get',
            dataType : 'json',
            success : function(resp){
                console.log(resp);
                
                $("#items_imgs").hide(300);
                
                $("#images_ajax").empty();
                $("#images_ajax").hide(200);
                
                for(var i=0; i<resp.data.length;i++){
                    var div = $("<div class='col-md-4 images_cat_ajax'><div>");
                    var img = $("<a  href='/images_by_category/"+resp.data[i].image+"' data-lightbox='image-5'><div class='container2'><img class='add_items' src='/images_by_category/"+resp.data[i].image+"' ><p></p><h1>"+resp.data[i].name+"</h1></div></a>");
                    div.append(img);
                    $("#images_ajax").append(div);
                }
                $("#images_ajax").show(200);
            }
        });
    }
    
}