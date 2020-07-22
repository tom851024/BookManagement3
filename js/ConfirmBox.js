function con(id){
    var getUrlString = location.href; //取得get參數
    var url = new URL(getUrlString);
    var order = url.searchParams.get('order');
    var sc = url.searchParams.get('sc');
    if (confirm("確定要刪除？")) {
        if(order == null || sc == null){
            location.href='Delete.php?id='+id;
         }else{
             location.href='Delete.php?id='+id+'&order='+order+'&sc='+sc;
         }
        
    }
}

function getCookie(name){
    var cookies = document.cookie;
    var list = cookies.split("; "); //每個cookie會用;做分割
    for(var i=0; i < list.length; i++){
        var arr = list[i].split("="); //將鍵和名分離
        if(arr[0] == name){
            return decodeURIComponent(arr[1]); //解碼cookie值
        }
        return "";
    }
}


window.onload=function(){
    var getUrlString = location.href; //取得get參數
    var url = new URL(getUrlString);
    var order = url.searchParams.get('order');
    var sc = url.searchParams.get('sc');
    var obj = document.getElementById("order");
    var obj2 = document.getElementById("sc");
    var opts=obj.getElementsByTagName("option");
    var opts2=obj2.getElementsByTagName("option");

    if(order == "ISBN"){
        opts[0].selected = true;
    }
    if(order == "Comp"){
        opts[1].selected = true;
    }
    if(order == "Book"){
        opts[2].selected = true;
    }
    if(order == "Author"){
        opts[3].selected = true;
    }
    if(order == "Price"){
        opts[4].selected = true;
    }
    if(order == "Date"){
        opts[5].selected = true;
    }
    
    if(sc == "ASC"){
        opts2[0].selected = true;
    }
    if(sc == "DESC"){
        opts2[1].selected = true;
    }
}
