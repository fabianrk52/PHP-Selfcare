(function() {
     $.getJSON("includes/js/menu.json", function(menu) {
        var menuHtml='<div id="content">';
        menuHtml+='<div class="row mt-3">';

        $.each(menu, function(i, menuItem){
            console.log(menuItem);
            if(((menu.indexOf(menuItem) % 2) == 0 )&& (menu.indexOf(menuItem) > 0)){
                menuHtml+='</div><div class="row mt-3">';
            }
            if(menu.indexOf(menuItem)==0){
                menuHtml+= '<div class="col-6">'+
                '<a href="'+
                menuItem.href +
                '"> <div class="button"><p class="bold h4">'+
                menuItem.title+
                '</p><img class="'+
                menuItem.class+
                '" src="'+
                menuItem.image_src+
                '"></div></a></div>';
            }
            else{
                menuHtml+='<div class="col-6">'+
                '<a href="'+
                menuItem.href +
                '"> <div class="button"><p class="bold h4">'+
                menuItem.title+
                '</p><i  class="'+
                menuItem.class+
                '">'+
                '</i></div></a></div>';
            }
        }); 
        menuHtml+='</div></div>';
        console.log(menuHtml);
        $("#main").append(menuHtml);
    });        
})(); 
