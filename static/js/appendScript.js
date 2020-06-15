//load all js and css files in this arr
var jsFiles = [
"/libs/jquery/jquery-3.4.1.js",
"/libs/bootstrap-3.3.7-dist/js/bootstrap.min.js",
"/static/js/popMsg.js",
"/static/js/ajaxSubmit.js",
"/static/js/checkReload.js"
];
var cssFiles=["/libs/bootstrap-3.3.7-dist/css/bootstrap.min.css",
"/static/css/homeApply.css",
"/static/css/alertPop.css",
"/static/css/buttons.css"
];

function appendScript(urls,mode){
//call load function to explore the arr
for (var i in urls){
    var url = urls[i];


    //load all files end with js or css, mode "on" to add timestamp 
    //to the end of js/css url, to force browser to use this instead of cache, would be slow to load,
    // mode "off" add nothing to the url end, fast.
        //timestamp
    var now = new Date();
    var timestamp;
    if(mode === "on"){
        timestamp = "?v=" + now.getTime(); //add timestamp
    }else if(mode === "off"){
        timestamp = "";     //add an empty string
    }
     
    // capture document head
    var head = document.getElementsByTagName("head")[0];

    if(url.endsWith("js")){
        //创建script tag
        var script = document.createElement("script");
        //增加属性
        script.type= "text/javascript";
        script.src = url + timestamp;
        //append js child to head
        head.appendChild(script);
    }else if(url.endsWith("css")){
        //创建script tag
        var link = document.createElement("link");
        //增加属性
        link.type = "text/css";
        link.rel = "stylesheet";
        link.href = url + timestamp;
        //append js child to head
        head.appendChild(link);
    }else{
        console.log("js/css file not found");
    }
}
}