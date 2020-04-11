$('#btnAssociateClientBackbone').click(function(){
    console.log("Add Client Backbone Assciation invoked");
    /*$.ajax({
        url:'/backbones/saveclient',
        data:{},
        type:'post',
        dataType:'json'
    })
    .done(function(res){
        console.log("association result",res);
    })
    .fail(function(err){
        console.log("association result",err);
    });*/
    tr = '<tr>';
    tr+= '<td>1</td>';
    tr+= '<td class="info">';
    tr+= '<span>Start:satu</span> ';
    tr+= '<span>End: dua</span>';
    tr+= '</td>';
    tr+= '<td>tiga</td>';
    tr+= '<td>';
    tr+= '<a type="btn" href="/">Hapus</a>';
        tr+= '</td>';
    tr+= '</tr>';
    $("#tClient tbody").prepend(tr);
})