(function($){
    populateCauses = function(category_id,callback){
        $.ajax({
            url:'/followups/getcausesajax/'+category_id,
            type:'get',
            dataType:'json'
        })
        .done(function(res){
            console.log("populate success",res)
            callback(res);
        })
        .fail(function(err){
            console.log("populate err",err)
        });
    }
    $('#mainrootcause').change(function(){
        $("#subcause").empty();
        populateCauses($(this).val(),function(res){
            console.log("mainrootchange",res);
            $.each(res,function(a,b){
                $("#subcause").append('<option value='+b.id+'>'+b.name+'</option>');
            })
            
        });
    });    
}(jQuery))