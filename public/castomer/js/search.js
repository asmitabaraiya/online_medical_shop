const site_url = "http://127.0.0.1:8000/"

$("body").on('keyup' , "#search" , function(){
    let text = $("#search").val();
    if (text.length > 0) {
        
        $.ajax({
            data: {search: text},
            url: site_url + "advance-saerch" ,
            method: "post" ,
            beforSend : function(request){
                return request.setReuestHeader('X-CSRF-Token',("meta[name='csrf-token']"))
            },
            success:function(result){
                // console.log(result);
                $("#SearchList").html(result);
            }

        }); // end ajax
        
    }
    if(text.length < 1){
        $("#SearchList").html("&nbsp; Result Not Found");
    }

})