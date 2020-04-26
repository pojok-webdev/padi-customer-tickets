(function($){
    console.log("History Ticket");
    setTableHeadInformation = function(obj,callback){
        out = 'Kdticket:'+obj.kdticket+' ';
        out+= 'Name:'+obj.clientname+' ';
        out+= 'complaint:'+(!obj.complaint)?'-':obj.complaint+' ';
        out+= 'Reporter:'+obj.reporter+' ';
        out+= 'Address:'+obj.address+' ';
        callback(out);
    }
    loadTicketData = function(segment,offset,callback){
        $.ajax({
            url:'/followups/historyajaxsource/'+$('#ticketid').val(),
            type:'get',
            dataType:'json'
        })
        .done(function(res){
            console.log("Res",res);
            if(res.length>0){
                setTableHeadInformation({
                    kdticket:res[0].kdticket,
                    clientname:res[0].clientname,
                    complaint:res[0].complaint,
                    reporter:res[0].reporter,
                    address:res[0].address
                },function(headtext){
                    $('#kdticket').html(headtext);
                })
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
                    str+= b.subcause+' '+b.rootcause;
                    str+= '</td>';
                    str+= '<td>';
                    str+= b.status;
                    str+= '<p>';
                    str+= atob(b.conclusion);
                    str+= '</td>';
                    str+= '<td class="ticketstart">';
                    str+= b.reporter;
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
            }
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
