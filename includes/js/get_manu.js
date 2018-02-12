(function() {
     $.getJSON("includes/js/manu.json", function(manu) {
        var manuHtml='<div id="content">';
        manuHtml+='<div class="row mt-3">';

        $.each(manu, function(i, manuItem){
            console.log(manuItem);
            if(((manu.indexOf(manuItem) % 2) == 0 )&& (manu.indexOf(manuItem) > 0)){
                manuHtml+='</div><div class="row mt-3">';
            }
            if(manu.indexOf(manuItem)==0){
                manuHtml+= '<div class="col-6">'+
                '<a href="'+
                manuItem.href +
                '"> <div class="button"><p class="bold h4">'+
                manuItem.title+
                '</p><img class="'+
                manuItem.class+
                '" src="'+
                manuItem.image_src+
                '"></div></a></div>';
            }
            else{
                manuHtml+='<div class="col-6">'+
                '<a href="'+
                manuItem.href +
                '"> <div class="button"><p class="bold h4">'+
                manuItem.title+
                '</p><i  class="'+
                manuItem.class+
                '">'+
                '</i></div></a></div>';
            }
        }); 
        manuHtml+='</div></div>';
        console.log(manuHtml);
        $("#main").append(manuHtml);
    });        
})(); 
