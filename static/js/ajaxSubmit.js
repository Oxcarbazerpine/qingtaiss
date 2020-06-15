function ajaxSubmit(sendLoc,formData,func,pop){  
    pop = pop || 0;
    func = func || null;
    formData = formData || null;
    $.ajax({
            type: "POST",
            cache:false,
            processData:true, //将data解析为字符串
            url: sendLoc, //提交处理 string
            contentType: "application/x-www-form-urlencoded; charset=utf-8",     
            data:formData, //serialized data
            dataType: "text",
            success: function(result) {
                //console.log("test1"); 
                if(pop){  //pop: 0 or 1
                    popMsg(result,1200);
                }
                
                if(func===null?0:1){ //判断是否传入func
                    func(result); //成功时要执行的函数
                }
            },
            error: function(result) {
                alert("failed");
                //console.log(result);
            }
        })
    }