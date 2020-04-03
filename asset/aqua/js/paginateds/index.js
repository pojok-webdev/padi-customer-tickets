(function($){
    clearTable = function(){
        $("#tTicket tbody").empty();
    }
    initMe = function(segment,offset,callback){
        $.ajax({
            url:'/paginateds/ajaxsource',
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
                str+= b.kdticket;
                str+= '</td>';
                str+= '<td>';
                str+= b.name;
                str+= '</td>';
                str+= '<td>';
                str+= b.statuslabel;
                str+= '</td>';
                str+= '<td>';
                str+= b.mainrootcause;
                str+= '</td>';
                str+= '<td class="ticketstart">';
                str+= b.ticketstart;
                str+= '</td>';
                str+= '<td class="ticketend">';
                str+= b.ticketend;
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
    initMe(0,10,function(str){
        $('#tTicket tbody').append(str);
    })
    $("#tTicket_next").on("click",function(){
        let pageid = $("#pageid").text();
        console.log("ticket-next clicked",pageid);
        let nextpage = 1*pageid+1;
        $("#pageid").text(nextpage);
        clearTable();
        initMe(pageid*10,10,function(str){
            $('#tTicket tbody').append(str);
        })
    })
    $("#tTicket_previous").on("click",function(){
        let pageid = $("#pageid").text();
        console.log("ticket-previous clicked",pageid);
        if(pageid>1){
            let prevpage = 1*pageid-1;
            $("#pageid").text(prevpage);
        }
        clearTable();
        initMe(pageid*10,10,function(str){
            $('#tTicket tbody').append(str);
        })
    })
    getduration = function(_start,_end,callback){
        console.log("Start",_start);
        console.log("End",_end);
        if(!_end){
            return _start;
        }else{
            _diff = _end - _start;
            seconds = parseInt(_diff/1000);
            minutes = parseInt(seconds / 60);
            hours = parseInt(minutes / 60);
            days = parseInt(hours / 24);
            hari = parseInt(_diff/(1000*60*60*24));
            sisahari = parseInt(_diff % (1000*60*60*24));
            sisamenit = parseInt(minutes % 60);
            sisadetik = parseInt(seconds % 60);
            sisajam = parseInt(hours % 24);
            console.log("sisajam+sisadetik "+sisajam+':'+sisadetik);
            callback({
                dayval:days,
                str:days + " hari,"+ sisajam + " jam,"+ sisamenit + " menit," + sisadetik + " detik"
            });
        }
    }

    getjsdate = function(dttime){
        console.log("dttime adalah",dttime);
        if(!dttime){
            return false;
        }else{
            dttimesplit = dttime.split(" ");
            dt = dttimesplit[0].split("-");
            year = dt[0];
            month = dt[1]-1;
            day = dt[2];
            tm = dttimesplit[1].split(":");
            hour = tm[0];
            minute = tm[1];
            second = tm[2];
            return new Date(year,month,day,hour,minute,second);	
        }
    }



    setdura = function(){
        $("#tTicket tbody tr").each(function(){
            tr = $(this);
            dr = $(this).find(".ticketstart").text();
            console.log("DR Value",dr);
            //drend = $(this).attr("ticketend");
            //drend  = new Date();
            drend = $(this).find(".ticketend").text();
            id = $(this).attr("thisid");
            //drend = false;
            if(!drend){
    //			console.log(id,"Drend undefined");
            }else{
                dttime = dr;
                dttimesplit = dttime.split(" ");
                dt = dttimesplit[0].split("-");
                year = dt[0];
                month = dt[1]-1;
                day = dt[2];
                tm = dttimesplit[1].split(":");
                hour = tm[0];
                minute = tm[1];
                second = tm[2];
                _start = new Date(year,month,day,hour,minute,second);
                console.log("Year",year);
                console.log("Month",month);
                console.log("Day",day);
                console.log("Hour",hour);
                console.log("Minute",minute);
                console.log("Second",second);

                status = $(this).hasClass("Open")?"ticketOpen":"ticketClosed";
                showalert= $(this).hasClass("showalert")?true:false;
                switch(status){
                    case "ticketOpen":
                        console.log("TicketOpen");
                        _end = new Date();
                    break;
                    case "ticketClosed":
                            console.log("TicketClosed");
                        _end = getjsdate(drend);
                        //_end = new Date();
                    break;
                }
                dura = getduration(_start,_end,function(x){
                    if(status==="ticketOpen"){
                        console.log("DAYS",id,status,_start,_end,days);
                    }
                    tr.find(".dura").html(x.str);
                });
            }
        });
//    }
}
    setInterval(function(){ setdura(); }, 3000);
}(jQuery))
