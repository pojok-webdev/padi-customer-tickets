(function($){
    console.log("jued");
    tTicket = $("#tTicket").dataTable({
        bProcessing:true,
        sAjaxSource:'/tickets/ajaxsource',
        "aaSorting": [[ 0, "desc" ]],
        aoColumns: [
            { "sClass": "kdticket","asSorting": [ "desc" ]  },
            { "sClass": "name" },
            { "sClass": "status" },
            { "sClass": "cause" },
            { "sClass": "ticketstart" },
            { "sClass": "ticketend" },
            { "sClass": "dura" }
          ]
    });

    getduration2 = function(_start,_end,callback){
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
		dt = dttimesplit[0].split("/");
		year = dt[2];
		month = dt[1]-1;
		day = dt[0];
		tm = dttimesplit[1].split(":");
		hour = tm[0];
		minute = tm[1];
		second = tm[2];
		return new Date(year,month,day,hour,minute,second);	
	}
}



    setdura = function(){
        if(tTicket.fnSettings().aoData.length===0){
            //console.log('Tidak ada data');
        }else{
        $("#tTicket tbody tr").each(function(){
            tr = $(this);
            dr = $(this).find(".ticketstart").text();
            console.log("DR Value",dr);
            //drend = $(this).attr("ticketend");
            drend  = new Date();
            id = $(this).attr("thisid");
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

                status = $(this).hasClass("ticketOpen_")?"ticketOpen":"ticketClosed";
                showalert= $(this).hasClass("showalert")?true:false;
                switch(status){
                    case "ticketOpen":
                        _end = new Date();
                    break;
                    case "ticketClosed":
                        //_end = getjsdate(drend);
                        _end = new Date();
                    break;
                }
                dura = getduration2(_start,_end,function(x){
                    if(status==="ticketOpen"){
                        console.log("DAYS",id,status,_start,_end,days);
                    }
                    tr.find(".dura").html(x.str);
                });
            }
        });
    }}
    setInterval(function(){ setdura(); }, 3000);
}(jQuery))
