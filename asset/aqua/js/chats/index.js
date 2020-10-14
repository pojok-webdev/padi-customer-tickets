appendRow = function(x,callback){
    var aa = (x.user_id==user_id)?"itemIn":"itemOut";
    cr = '<div class="'+aa+'">';
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
$.ajax({
    url:'/chats/getchat/'+$('.chatgroups .chatgroup.selected').attr('id'),
    dataType:'json'
})
.done(function(res){
    console.log("Res",res);
    res.forEach(function(x){
        var aa = (x.user_id==user_id)?"itemIn":"itemOut";
        cr = '<div class="'+aa+'">';
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
})
.fail(function(err){
    console.log("Err",err);
});
$("#btnSendMessage").click(function(){
    $.ajax({
        url:'/chats/sendmessage',
        data:{
            content:$("#txtMessage").val(),
            user_id:user_id
        },
        type:'post'
    })
    .done(function(res){
        console.log('Res',res);
        appendRow(res,function(row){
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
messageTray = function(){
    setInterval(function(){
        checkNewMessage(function(messages){
            //console.log("Messages",messages);
        });
        //console.log('Interval');
    },3000);
}
messageTray();
getgroups = function(callback){
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
        str = '<div class="item clearfix chatgroup" id = "'+cg.id+'">';
        str+= '<div class="image chatid"><a><img src="/img/users/aqvatarius.jpg" class="img-polaroid"/></a></div>';
        str+= '<div class="info">';
        str+= '<a href="#" class="name">'+cg.name+'</a>';
        str+= '<p>'+cg.description+'</p>';
        str+= '<span>19 feb 2012 12:45</span>';
        str+= '</div>';
        str+= '</div>';
        $('.chatgroups').append(str);
    });
});
getusers(function(chatgroups){
    chatgroups.forEach(function(cg){
        str = '<div class="item clearfix chatgroup" id = "'+cg.id+'">';
        str+= '<div class="image chatid"><a><img src="/img/users/aqvatarius.jpg" class="img-polaroid"/></a></div>';
        str+= '<div class="info">';
        str+= '<a href="#" class="name">'+cg.username+'</a>';
        str+= '<p>'+cg.username+'</p>';
        str+= '<span>19 feb 2012 12:45</span>';
        str+= '</div>';
        str+= '</div>';
        $('.chatgroups').append(str);    
    });
})
$('.chatgroups').on('click','.chatid',function(){
    $('.chatgroup').removeClass('selected');
    console.log('chatid clicked');
    _block = $(this).stairUp({level:1});
    _block.addClass('selected');
    $('#messagingtitle').attr('chat_id',_block.attr('id'));
    $('#messagingtitle').html('Chat : '+_block.find('.name').html());
    getgroupchats({id:_block.attr('id')},function(messages){
        $('.padichats').empty();
        messages.forEach(function(x){
            var aa = (x.user_id==user_id)?"itemIn":"itemOut";
            cr = '<div class="'+aa+'">';
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
    
    })
});
getgroupchats = function(obj,callback){
    $.ajax({
        url:'/chats/getgroupchat/'+obj.id,
        dataType:'json'
    })
    .done(function(res){
        console.log('Res',res);
        callback(res);
    })
    .fail(function(err){
        console.log(err);
        callback(err);
    })
}
