window.addEventListener('pageshow', function(e) {
    //如果检测到页面是从“往返缓存”中读取的，刷新页面
    if (e.persisted) {
        window.location.reload();
        console.log(e.persisted);
    }
    // console.log(e.persisted);
});