if($(".wysiwyg").length > 0){
    editor = $(".wysiwyg").cleditor({width:"100%", height:"100%"})[0];
    editor.focus();
    editor.change(function(){
        var v = this.$area.context.value;
        console.log('im invoked',v);
    });
}
$(window).resize(function() {
    if($(".wysiwyg").length > 0) editor.refresh();
});
