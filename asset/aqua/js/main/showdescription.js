(function($){
    console.log("Fus");
    loadTicketData = function(segment,offset,callback){
        $.ajax({
            url:'/followups/getallfus/',
            type:'get',
            dataType:'json'
        })
        .done(function(res){
            console.log("Res",res);
            if(res.length>0){
                $.each(res,function(a,b){
                    str = '<tr thisid='+b.id+'>';
                    str+= '<td>';
                    str+= b.id;
                    str+= '</td>';
                    str+= '<td>';
                    str+= b.description;
                    str+= '</td>';
                    str+= '<td>';
                    str+= atob(b.base64description);
                    str+= '</td>';
                    str+= '</tr>';    
                    callback(str)
                })
            }
        })
        .fail(function(err){
            console.log("Err",err);
        });
    }
    loadTicketData(1,10,function(res){
        console.log("Result of Load Ticket Data",res);
        $('#tTicket tbody').append(str);
    })
    $('#tTicket_info').hide();
    setDescriptions = function(){
        $.ajax({
            url:'/followups/getallfus',
            dataType:'json'
        })
        .done(function(objs){
            objs.forEach(function(obj){
                $.ajax({
                    url:'/followups/convertchartobase64/'+obj.id,
                })
                .done(function(res){
                    console.log('Updateres',res);
                })
                .fail(function(err){
                    console.log('Err update',err);
                });
            })
        })
        .fail(function(err){
            console.log('Error retrieve descriptions',err);
        });    
    }
}(jQuery))
