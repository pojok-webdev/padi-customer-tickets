(function($){
    _lastpage = 0;
    $.ajax({
        url:'/paginateds/lastpage',
        type:'post',
        dataType:'json'
    })
    .done(function(res){
        console.log("Success getlastpage",res);
        $("#btnLast").attr("lastpage",res.lastpage);
        $("#btnLast").removeAttr("disabled");
        _lastpage = res.lastpage;
        populatePageOptions(_lastpage);
    })
    .fail(function(err){
        console.log("Error getlastpage",err);
    });
    clearTable = function(){
        $("#tTicket tbody").empty();
    }
    loadTicketData = function(segment,offset,callback){
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
                str+= '<div class="btn-group">';
                str+= '<button data-toggle="dropdown" class="btn dropdown-toggle">Action <span class="caret"></span></button>';
                str+= '<ul class="dropdown-menu">';
                str+= '<li><a href="/followups/create/'+b.id+'" target="_blank">Follow Up</a></li>';
                str+= '<li><a href="#">Troubleshoot</a></li>';
                str+= '<li><a href="/downtimes/add/'+b.id+'" target="_blank">Add Down Time</a></li>';
                str+= '<li><a href="/followups/history/'+b.id+'" target="blank">History</a></li>';
                str+= '<li class="divider"></li>';
                str+= '<li class="removeTicket"><a>Remove</a></li>';
                str+= '</ul>';
                str+= '</div>';
                str+= '</td>';
                str+= '<td class="kdticket">';
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
                str+= '<br >';
                str+= b.subrootcause;
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
    showConfirmationModal = function(obj,callback){
        callback(obj);
    }
    backupTicket = function(obj,callback){
        $.ajax({
            url:'/tickets/backup/'+obj.id,
            type:'get',
            dataType:'json'
        })
        .done(function(result){
            callback(result);
        })
        .fail(function(error){})
    }
    removeTicket = function(obj,callback){
        $.ajax({
            url:'/tickets/remove/'+obj.id,
            type:'get',
            dataType:'json'
        })
        .done(function(result){callback(result)})
        .fail(function(error){callback(error)});
    }
    $('#tTicket').on('click','tbody tr .removeTicket',function(){
        tr = $(this).stairUp({level:4});
        ticketid = tr.attr('thisid');
        kdticket = tr.find('.kdticket').text();
        showConfirmationModal({
            'question':'Are you sure to remove ticket number '+kdticket+' ?',
        },function(){
            $("#question").html(obj.question);
            $("#confirmModal").modal();
        })
    })
    $("#confirmYes").click(function(){
        backupTicket({id:$('#key').val()},function(){
            removeTicket({id:$('#key').val()});
        })
    });
    loadTicketData(0,10,function(str){
        $('#tTicket tbody').append(str);
    })
    loadNextPage = function(pageid,nextpage){
        loadPagination(nextpage,function(result){
            $("#paginationbuttons").append(result);
        });
        $("#pageid").text(nextpage);
        clearTable();
        loadTicketData(pageid*10,10,function(str){
            $('#tTicket tbody').append(str);
        })
    }
    $('#btnFirst').click(function(){
        loadNextPage(0,1);
    });
    $('#btnLast').click(function(){
        lastpage = $(this).attr('lastpage');
        loadNextPage(lastpage-1,lastpage)
    });
    $("#tTicket_next").on("click",function(){
        let pageid = $("#pageid").text();
        let nextpage = 1*pageid+1;
        loadNextPage(pageid,nextpage);
    })
    $("#tTicket_previous").on("click",function(){
        let pageid = $("#pageid").text();
        console.log("PaageID",pageid);
        if(1*pageid>1){
            let prevpage = 1*pageid-1;
            loadNextPage(prevpage-1,prevpage);
        }
    })
    getduration = function(_start,_end,callback){
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
            callback({
                dayval:days,
                str:days + " hari,"+ sisajam + " jam,"+ sisamenit + " menit," + sisadetik + " detik"
            });
        }
    }
    getjsdate = function(dttime){
        if(!dttime||(dttime==null)||(dttime=='null')){
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
            drend = $(this).find(".ticketend").text();
            id = $(this).attr("thisid");
            if(!drend){
    
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
                status = $(this).hasClass("Open")?"ticketOpen":"ticketClosed";
                showalert= $(this).hasClass("showalert")?true:false;
                switch(status){
                    case "ticketOpen":
                        _end = new Date();
                    break;
                    case "ticketClosed":
                        _end = getjsdate(drend);
                    break;
                }
                dura = getduration(_start,_end,function(x){
                    if(status==="ticketOpen"){
                    }
                    tr.find(".dura").html(x.str);
                });
            }
        });
    }
    createPages = function(activePage){
        out = '';
        if(activePage<3){
            for(x=1;x<6;x++){
                if(1*x===1*activePage){
                    out+='<span class="btn btn-warning pagebutton">'+x+'</span>';
                }else{
                    out+='<span class="btn pagebutton">'+x+'</span>';
                }            
            }
        }else if((activePage>=3)&&(activePage<_lastpage-2)){
            for(x=1*activePage-2;x<=1*activePage+2;x++){
                if(1*x===1*activePage){
                    out+='<span class="btn btn-warning pagebutton">'+x+'</span>';
                }else{
                    out+='<span class="btn pagebutton">'+x+'</span>';
                }            
            }
        }else if(activePage>=_lastpage-2){
            console.log("Last page invoked");
            for(x=1*_lastpage-5;x<=1*_lastpage;x++){
                if(1*x===1*activePage){
                    out+='<span class="btn btn-warning pagebutton">'+x+'</span>';
                }else{
                    out+='<span class="btn pagebutton">'+x+'</span>';
                }
            }
        }
        return out;
    }
    loadPagination = function(pageid,callback){
        $("#paginationbuttons").empty();
        callback(createPages(pageid));
    }
    loadPagination(1,function(result){
        $("#paginationbuttons").append(result);
    });
    setInterval(function(){ setdura(); }, 3000);
    $(".paging_two_button").on("click",".pagebutton",function(){
        pageid = $(this).text();
        loadNextPage(1*pageid-1,pageid);
    })
    populatePageOptions = function(lastpage){
        for(x=1;x<=lastpage;x++){
            $("#pageoption").append('<option value='+x+'>'+x+'</option>');
        }
    }
    $("#pageoption").change(function(){
        pageid = $(this).val();
        loadNextPage(1*pageid-1,pageid);
    });
}(jQuery))
