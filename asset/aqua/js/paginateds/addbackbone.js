getTableRownums = function(callback){
    callback(1+$('#tClient tbody tr').length);
}
$('#btnAssociateClientBackbone').click(function(){
    console.log("Add Client Backbone Assciation invoked");
    console.log('Client Site Id',$('#client_site_id').val());
    getTableRownums(function(rownum){
        tr = '<tr>';
        tr+= '<td class="rownum">'+rownum+'</td>';
        tr+= '<td class="info">';
        tr+= '<span>'+$('#client_id').val()+'</span> ';
        tr+= '<span>'+$('#client_site_id').text()+'</span>';
        tr+= '</td>';
        tr+= '<td>'+$('#client_site_id').val()+'</td>';
        tr+= '<td>';
        tr+= '<a type="btn" class="removeRow">Hapus</a>';
            tr+= '</td>';
        tr+= '</tr>';
        $("#tClient tbody").append(tr);
    })
})
$('#tClient').on('click','.removeRow',function(){
    $(this).stairUp({level:2}).remove();
    x = 0;
    $('#tClient tbody tr').each(function(){
        $(this).find('.rownum').html(++x);
    });
})

$("#client_id").keyup(function(){
    console.log('Client Name sent',$(this).val());
    $.ajax({
        type: "POST",
        url: "/paginateds/clients",
        data:{'name':$(this).val()},
        beforeSend: function(){
            $("#client_id").css("background","#FFF url(/asset/images/LoaderIcon.gif) no-repeat 165px");
        },
        success: function(data){
            console.log("Data received",data);
            $("#dugaanpelanggan").show();
            $("#dugaanpelanggan").html(data);
            $("#client_id").css("background","#FFF");
        }
    })
    .fail(function(err){
        console.log("Failed ajax",err);
    });
});
$("#client_id").on("focus",function(){
    $(this).select();
})
$.fn.populate = function(options){
    var settings = $.extend({
        url:'/'
    },options);
    _this = $(this);
    $.ajax({
        url:'/'+settings.url,
        type:'get'
    })
    .done(function(res){
        console.log('Result',settings.url,res)
        _this.append(res);
    })
    .fail(function(err){
        console.log("Error",err)
    });
    return this;
}
function selectClient(client_id,val) {
    $("#client_id").val(val);
    $("#dugaanpelanggan").hide();
    $("#clientid").val(client_id);
    populateClientSites(client_id);
}
function populateClientSites(client_id){
    $("#client_site_id").empty();
    $("#client_site_id").populate({
        url:'/teknis-tickets/paginateds/getclientsites/'+client_id,
    })
}