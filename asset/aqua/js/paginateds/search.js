$("#searchbar").keyup(function(){
    console.log("keyp",$(this).val());
})
$("#searchbutton").click(function(){
    clearTable();
    loadSearchData(1*$('#pageid').val()*$('#pageamount').val(),1*$('#pageamount').val(),function(str){
        $('#tTicket tbody').append(str);
    })

$('#tTicket_paginate').hide();

})
$('#clearsearchbutton').click(function(){
    $('#searchbar').val("");
    $("#pageamount").change();
    $('#tTicket_paginate').show();
});
loadSearchData = function(segment,offset,callback){
    $.ajax({
        url:'/paginateds/search',
        data:{
            searchvalue:$('#searchbar').val()
        },
        dataType:'json',
        type:'post'
    })
    .done(function(res){
        console.log("Res",res);
        $.each(res,function(a,b){
            str = '<tr thisid='+b.id+' class="'+b.statuslabel+' '+b.requesttype+'" dayamount=0 parentid='+b.parentid+'>';
            str+= '<td class="action">';
            str+= '<div class="btn-group">';
            str+= '<button data-toggle="dropdown" class="btn dropdown-toggle">Action <span class="caret"></span></button>';
            str+= '<ul class="dropdown-menu">';
            str+= '<li><a href="/followups/create/'+b.id+'" target="_blank">Follow Up</a></li>';
            str+= '<li><a href="/troubleshoots/add/'+b.id+'">Troubleshoot</a></li>';
            str+= '<li><a href="/downtimes/add/'+b.id+'" target="_blank">Add Down Time</a></li>';
            str+= '<li><a href="/followups/history/'+b.id+'" target="blank"><span class="history">History</span></a></li>';
            str+= '<li class="divider"></li>';
            str+= '<li class="removeTicket warning"><a>Remove</a></li>';
            str+= '</ul>';
            str+= '</div>';
            str+= '</td>';
            str+= '<td class="kdticket">';
            str+= b.kdticket;
            str+= '</td>';
            str+= '<td>';
            str+= b.name;
            str+= '</td>';
            str+= '<td class="requesttype">';
            str+= b.requesttype + '<span class="childrenamount"></span>';
            str+= '</td>';
            str+= '<td class="status">';
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
