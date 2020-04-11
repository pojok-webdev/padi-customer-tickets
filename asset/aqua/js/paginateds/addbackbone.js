getTableRownums = function(callback){
    callback(1+$('#tClient tbody tr').length);
}
$('#btnAssociateClientBackbone').click(function(){
    console.log("Add Client Backbone Assciation invoked");
    getTableRownums(function(rownum){
        tr = '<tr>';
        tr+= '<td>'+rownum+'</td>';
        tr+= '<td class="info">';
        tr+= '<span>Start:satu</span> ';
        tr+= '<span>End: dua</span>';
        tr+= '</td>';
        tr+= '<td>tiga</td>';
        tr+= '<td>';
        tr+= '<a type="btn" class="removeRow">Hapus</a>';
            tr+= '</td>';
        tr+= '</tr>';
        $("#tClient tbody").append(tr);
    })
})
$('#tClient').on('click','.removeRow',function(){
    $(this).stairUp({level:2}).remove();
})