function popMsg(message,time,style){
    style = style || 'alert-success';
    time = time || 1500;
    $('<div>')
        .appendTo('body')
        .addClass('alert '+style)
        .html(message)
        .show()
        .delay(time)
        .fadeOut();
}
