hideMessenger = function(){
    $('.padichats').hide();
}
showMessenger = function(){
    $('.padichats').show();
}
disableSendButton = function(){
    $('#btnSendMessage').attr('disabled','disabled');
}
enableSendButton = function(){
    $('#btnSendMessage').attr('disabled',false);
}
stopMessaging = function(){
    hideMessenger();
    disableSendButton();    
}
stopMessaging();
$('#stopMessaging').click(function(){
    stopMessaging();
    hideList();
});


hideList = function(){
    var dropdown = $(".dd-list");
    if(dropdown.is(":visible")){
        dropdown.hide();
        //parent.removeClass('active');
    }else{
        dropdown.show();
        //parent.addClass('active');
    }
}




appendRow = function(x,callback){
    var itemType = (parseInt(x.user_id)==parseInt(user_id))?"itemIn":"itemOut";
    cr = '<div class="'+itemType+'">';
    cr+= '<a href="#" class="image"><img src="img/users/olga.jpg" class="img-polaroid"/></a>';
    cr+= '<div class="text">';
    cr+= '<div class="info clearfix">';
    cr+= '<span class="name">'+x.username+'</span>';
    cr+= '<span class="date">10 min ago</span>';
    cr+= '</div>  ';
    cr+= ''+x.content+'';
    cr+= '</div>';
    cr+= '</div>';
    callback(cr);
}
$("#btnSendMessage").click(function(){
    $.ajax({
        url:'/chats/sendmessage',
        data:{
            content:$("#txtMessage").val(),
            user_id:user_id,
            target_id:$('#messagingtitle').attr('chat_id'),
            targettype:$('.chatgroup.selected').attr('targettype')
        },
        type:'post'
    })
    .done(function(res){
        console.log('Res',res);
        appendRow({user_id:user_id,username:username,content:$("#txtMessage").val()},function(row){
            $('.padichats').append(row);
        })
    })
    .fail(function(err){
        console.log('Err',err);
    })
});
checkNewMessage = function(callback){
    $.ajax({
        url:'/chats/getnewchats'
    })
    .done(function(res){
        //console.log('Res',res);
        callback(res);
    })
    .fail(function(err){
        //console.log("Err",err);
        callback(err);
    })
}
getUnreadChat = function(){
    $.ajax({
        url:'/chats/getunreadchats/'+user_id,
        dataType:'json'
    })
    .done(function(unreads){
        console.log(unreads);
        unreads.forEach(function(chat){
            console.log('Unreaad Chat creatorid',chat.creator_id);
            console.log('Unreaad Chat cnt',chat.cnt);
            $('.chatgroups .61').html('x');
        })
    })
    .fail(function(err){
        console.log('Err',err);
    });
}
messageTray = function(){
    setInterval(function(){
        checkNewMessage(function(messages){
        });
    },3000);
    setInterval(function(){
        getUnreadChat();
    },3000)
}
messageTray();
getgroups = function(callback){
    console.log('User_ID',user_id);
    $.ajax({
        url:'/chats/getgroups/'+user_id,
        dataType:'json'
    })
    .done(function(res){
        console.log("Group Res",res);
        callback(res);
    })
    .fail(function(err){
        console.log('Group Err',err);
        callback(err);
    })
}
getusers = function(callback){
    $.ajax({
        url:'/chats/getusers/'+user_id,
        dataType:'json'
    })
    .done(function(res){
        console.log("User Res",res);
        callback(res);
    })
    .fail(function(err){
        console.log('User Err',err);
        callback(err);
    })
}
getgroups(function(chatgroups){
    chatgroups.forEach(function(cg){
        str = '<div class="item clearfix chatgroup" id = "'+cg.id+'" targettype="0">';
        str+= '<div class="image chatid"><a><img src="/img/users/aqvatarius.jpg" class="img-polaroid"/></a></div>';
        str+= '<div class="info">';
        str+= '<a href="#" class="name">'+cg.name+'<sup class="unreadamount '+cg.id+'">3</sup></a>';
        str+= '<p>'+cg.description+'</p>';
        str+= '<span>19 feb 2012 12:45</span>';
        str+= '</div>';
        str+= '</div>';
        $('.chatgroups').append(str);
    });
});
getusers(function(chatgroups){
    chatgroups.forEach(function(cg){
        str = '<div class="item clearfix chatgroup" id = "'+cg.id+'" targettype="1">';
        str+= '<div class="image chatid"><a><img src="/img/users/aqvatarius.jpg" class="img-polaroid"/></a></div>';
        str+= '<div class="info">';
        str+= '<a href="#" class="name">'+cg.username+'<sup class="unreadamount '+cg.id+'"></sup></a>';
        str+= '<p>'+cg.username+'</p>';
        str+= '<span>19 feb 2012 12:45</span>';
        str+= '</div>';
        str+= '</div>';
        $('.chatgroups').append(str);    
    });
})
$('.chatgroups').on('click','.chatid',function(){
    showMessenger();
    enableSendButton();
    $('.chatgroup').removeClass('selected');
    console.log('chatid clicked');
    _block = $(this).stairUp({level:1});
    target_id = _block.attr('id');
    _block.addClass('selected');
    $('#messagingtitle').attr('chat_id',_block.attr('id'));
    $('#messagingtitle').attr('targettype',_block.attr('targettype'));
    $('#messagingtitle').html('Chat to '+_block.find('.name').html());
    getgroupchats({id:_block.attr('id'),targettype:_block.attr('targettype')},function(messages){
        $('.padichats').empty();
        messages.forEach(function(x){
            var itemType = (parseInt(x.creator_id)==parseInt(user_id))?"itemIn":"itemOut";
            cr = '<div class="'+itemType+'">';
            cr+= '<a href="#" class="image"><img src="img/users/olga.jpg" class="img-polaroid"/></a>';
            cr+= '<div class="text">';
            cr+= '<div class="info clearfix">';
            cr+= '<span class="name">'+x.username+'</span>';
            cr+= '<span class="date">10 min ago</span>';
            cr+= '</div>  ';
            cr+= ''+x.content+'';
            cr+= '</div>';
            cr+= '</div>';
            $('.padichats').append(cr);
    
        });
        $('.padichats').scrollTop($('.padichats').height());
    })
});
setChatRead = function(obj,callback){
    $.ajax({
        url:'/chats/setchatread/'+obj.target_id+'/'+obj.targettype
    })
    .done(function(res){
        callback(res);
    })
    .fail(function(err){
        callback(err);
    });
};
getgroupchats = function(obj,callback){
    console.log('OBJ',obj);
    $.ajax({
        url:'/chats/getgroupchat/'+obj.id+'/'+obj.targettype,
        dataType:'json'
    })
    .done(function(res){
        console.log('Res',res);
        setChatRead({target_id:obj.id,targettype:obj.targettype},function(x){
            callback(res);
        });
//        callback(res);
    })
    .fail(function(err){
        console.log(err);
        callback(err);
    })
}
$('#reloadchat').click(function(){
    getgroupchats({id:$('#messagingtitle').attr('chat_id'),targettype:$('#messagingtitle').attr('targettype')},function(messages){
        $('.padichats').empty();
        messages.forEach(function(x){
            console.log('X',x);
            var itemType = (parseInt(x.creator_id)==parseInt(user_id))?"itemIn":"itemOut";
            cr = '<div class="'+itemType+'">';
            cr+= '<a href="#" class="image"><img src="img/users/olga.jpg" class="img-polaroid"/></a>';
            cr+= '<div class="text">';
            cr+= '<div class="info clearfix">';
            cr+= '<span class="name">'+x.username+'</span>';
            cr+= '<span class="date">10 min ago</span>';
            cr+= '</div>  ';
            cr+= ''+x.content+'';
            cr+= '</div>';
            cr+= '</div>';
            $('.padichats').append(cr);
    
        });
    });
});