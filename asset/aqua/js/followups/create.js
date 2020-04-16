(function($){
    console.log("Vreate js invoked");
    populateCauses = function(category_id,callback){
        $.ajax({
            url:'/followups/getcausesajax/'+category_id,
            type:'get',
            dataType:'json'
        })
        .done(function(res){
            console.log("populate success",res)
            callback(res);
        })
        .fail(function(err){
            console.log("populate err",err)
        });
    }
    $('#mainrootcause').change(function(){
        $("#subcause").empty();
        populateCauses($(this).val(),function(res){
            console.log("mainrootchange",res);
            $.each(res,function(a,b){
                $("#subcause").append('<option value='+b.id+'>'+b.name+'</option>');
            })
            
        });
    });
    textareachange = function(){
        console.log("TExt Area changed");
    }

    $('#confirmationresult').on('input',function(){
        console.log($(this).val());
    });
    saveResult = function(){
        $.ajax({
            url:'/followups/saveresult',
            data:{
                ticket_id:$('#ticket_id').val(),
                result:$('#result').val(),
                confirmationresult:$('#confirmationresult').html()
            }
        })
        .done(function(res){})
        .fail(function(err){});
    }
    disableFinalButton = function(booleanVar){
        $('.btnFinal').attr('disabled',booleanVar);
    }
    validateInput = function(callback){
        out = true;
        if($("#confirmationresult").val()==''){
            console.log('confirmationresult is false');
            out = false;
        }else if($("#picphone").val().trim()==''){
            console.log('picphone is false');
            out = false;
        }else if($("#position").val().trim()==''){
            console.log('position is false');
            out = false;
        }
        callback(out);
    }
    $('.confirmResult').click(function(){
        console.log('Confirm result',$(this).val());
        validateInput(function(ok){
            if(ok){
                disableFinalButton(false);
            }else{
                alert('Hasil Konfirmasi tidak boleh kosong');
            }
        })
        $('#result').val($(this).val());
    });
    $('#btnHistory').on('click',function(){
        window.location.href = '/followups/history/'+$('#ticket_id').val();
    })
    getHistoryCount = function(){
        $.ajax({
            'url':'/followups/gethistorycount/'+$('#ticket_id').val(),
            dataType:'json'
        })
        .done(function(res){
            console.log('Success gethistorycount',res);
            $('#followupAmount').html('<sup class="red">'+res.cnt+'</sup>');
        })
        .fail(function(err){
            console.log('Error gethistorycount',err);
        })
    }
    getHistoryCount();
    checkConfirmation = function(){}
    confirmationresult = $("#confirmationresult").cleditor({width:"100%", height:"100%"})[0];
    confirmationresult.focus();
    confirmationresult.change(function(){
        var v = this.$area.context.value;
        console.log('im changed',v);
    });
    updateTicket = function(obj){
        console.log('OBJ',obj);
        $.ajax({
            url:'/followups/updateticket',
            data:obj,
            type:'post'
        })
        .done(function(res){
            console.log('Success update ticket',res);
            window.location.href = '/'
        })
        .fail(function(err){
            console.log('Failed update ticket',err);
        });
    }
    $('#btnCloseTicket').click(function(){
        $.ajax({
            url:'/followups/save',
            data:{
                reporter:$('#reporter').val(),
                reporterphone:$('#reporterphone').val(),
                followUpDate:$('#followUpDate').val(),
                description:$('#description').val(),
                mainrootcause:$('#mainrootcause').val(),
                subcause:$('#subcause').val(),
                solution:$('#solution').val(),
                picname:$('#picname').val(),
                position:$('#position').val(),
                picphone:$('#picphone').val(),
                confirmationresult:$('#confirmationresult').val(),
                result:$('#result').val(),
                ticket_id:$('#ticket_id').val()
            },
            type:'post'
        })
        .done(function(res){
            console.log('saveFu done',res);
            updateTicket({id:$('#ticket_id').val(),status:'1'});
        })
        .fail(function(err){
            console.log('saveFu err',err);
        })
    })
    $('#btnProgressTicket').click(function(){
        $.ajax({
            url:'/'
        })
    })
}(jQuery))