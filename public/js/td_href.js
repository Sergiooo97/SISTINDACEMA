$('body').on('mousedown', 'td[url]', function(e){
    var click = e.which;
    var url = $(this).attr('url');
    if(url){
        if(click == 2 || (click == 1 && (e.ctrlKey || e.metaKey))){
            window.open(url, '_blank');
            window.focus();
        }
        else if(click == 1){
            window.location.href = url;
        }
        return true;
    }
});
