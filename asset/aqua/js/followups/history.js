(function($){
    console.log("History Ticket");

    loadTicketData = function(segment,offset,callback){
        $.ajax({
            url:'/followups/historyajaxsource/'+$('#ticketid').val(),
            data:{
                segment:segment,offset:offset
            },
            type:'post',
            dataType:'json'
        })
        .done(function(res){
            console.log("Res",res);
            $.each(res,function(a,b){
                str = '<tr thisid='+b.id+' class="'+b.statuslabel+'">';
                str+= '<td>';
                str+= '<div class="btn-group">';
                str+= '<button data-toggle="dropdown" class="btn dropdown-toggle">Action <span class="caret"></span></button>';
                str+= '<ul class="dropdown-menu">';
                str+= '<li><a href="/followups/create/'+b.id+'" target="_blank">Follow Up</a></li>';
                str+= '<li><a href="#">Troubleshoot</a></li>';
                str+= '<li><a href="/followups/history/'+b.id+'" target="blank">History</a></li>';
                str+= '<li class="divider"></li>';
                str+= '<li><a href="#">Remove</a></li>';
                str+= '</ul>';
                str+= '</div>';
                str+= '</td>';
                str+= '<td>';
                str+= b.kdticket;
                str+= '</td>';
                str+= '<td>';
                str+= b.reporter;
                str+= '</td>';
                str+= '<td>';
                str+= b.complaint;
                str+= '</td>';
                str+= '<td>';
                str+= b.reporterphone;
                str+= '<br >';
                str+= b.solution;
                str+= '</td>';
                str+= '<td class="ticketstart">';
                str+= b.user;
                str+= '</td>';
                str+= '<td class="ticketend">';
                str+= b.followupDate;
                str+= '</td>';
                str+= '<td class="dura">';
                str+= 'Wait ...';
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
