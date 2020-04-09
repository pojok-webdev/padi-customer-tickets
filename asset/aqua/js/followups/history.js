(function($){
    console.log("History Ticket");

    loadTicketData = function(segment,offset,callback){
        $.ajax({
            url:'/followups/historyajaxsource/'+$('#ticketid').val(),
            type:'get',
            dataType:'json'
        })
        .done(function(res){
            console.log("Res",res);
            $("#kdticket").html(res[0].kdticket+' '+res[0].clientname);
            $.each(res,function(a,b){
                str = '<tr thisid='+b.id+' class="'+b.statuslabel+'">';
                str+= '<td>';
                str+= b.followupDate;
                str+= '</td>';
                str+= '<td>';
                str+= atob(b.fdescription);
                str+= '</td>';
                str+= '<td>';
                str+= b.picname;
                str+= '</td>';
                str+= '<td>';
                str+= b.reporterphone;
                str+= '</td>';
                str+= '<td>';
                str+= b.status;
                str+= '<br >';
                str+= atob(b.conclusion);
                str+= '</td>';
                str+= '<td class="ticketstart">';
                str+= b.user;
                str+= '</td>';
                str+= '<td class="ticketend">';
                str+= b.followupDate;
                str+= '</td>';
                str+= '<td class="dura">';
                str+= atob(b.description);
                str+= '</td>';
                str+= '</tr>';    
                callback(str)
            })
        })
        .fail(function(err){
            console.log("Err",err);
        });
    }
    loadTicketData(1,1,function(res){
        console.log("Result of Load Ticket Data",res);
        $('#tTicket tbody').append(str);
    })

}(jQuery))
