function emptydb(){
    var id1 = $("#duibi01").val();
    var id2 = $("#duibi02").val();
    var id3 = $("#duibi03").val();
    if(id1.length<1 &&  id2.length<1 || id3.length<1){
        alert("没有可供清空的职位");

    }else{
        $("#duibi"+id1).html("对比");
        $("#duibi"+id2).html("对比");
        $("#duibi"+id3).html("对比");

        $("#duibi_01").html("");
        $("#duibi_02").html("");
        $("#duibi_03").html("");

        $("#duibi01").val("");
        $("#duibi02").val("");
        $("#duibi03").val("");
    }

}
function zwdb(id,num,name){
    //alert(num);
    var txt = $('.job_content table tr').eq(num).find('td').last().find('a').html();
    if(txt=='取消'){
        $('.job_content table tr').eq(num).find('td').last().find('a').removeClass('cur');
        $('.job_content table tr').eq(num).find('td').last().find('a').html('对比');
    }else{
        $('.job_content table tr').eq(num).find('td').last().find('a').addClass('cur');
        $('.job_content table tr').eq(num).find('td').last().find('a').html('取消');
    }

    $("#duibi").css("display","");
    var duibi01 = $("#duibi01").val();
    var duibi02 = $("#duibi02").val();
    var duibi03 = $("#duibi03").val();


    if(duibi01==''){
        $("#duibi01").val(id);
        $("#duibi_01").append('<span>1</span><a href="javascript:;"  title="关闭" onclick="guanbi(01,'+id+')"><img src="http://zw.shichuedu.com/resources/static/home/img/dalet.jpg" width="15" height="15"></a>'+name+'');
    }else if(duibi01==id){
        $("#duibi01").val('');
        $("#duibi_01").html('');
    }else if(duibi02==''){
        $("#duibi02").val(id);
        $("#duibi_02").append('<span>2</span><a href="javascript:;"  title="关闭" onclick="guanbi(02,'+id+')"><img src="http://zw.shichuedu.com/resources/static/home/img/dalet.jpg" width="15" height="15"></a>'+name+'');
    }else if(duibi02==id){
        $("#duibi02").val('');
        $("#duibi_02").html('');
    }else if(duibi03==''){
        $("#duibi03").val(id);
        $("#duibi_03").append('<span>3</span><a href="javascript:;"  title="关闭" onclick="guanbi(03,'+id+')"><img src="http://zw.shichuedu.com/resources/static/home/img/dalet.jpg" width="15" height="15"></a>'+name+'');
    }else if(duibi03==id){
        $("#duibi03").val('');
        $("#duibi_03").html('');
    }else{
        alert("对比栏已满");
        return false;
    }
    $('.huiback').click(function(){
        $('#duibi01').val('');
        $('#duibi02').val('');
        $('#duibi03').val('');
        $('#duibi_01').html('');
        $('#duibi_02').html('');
        $('#duibi_03').html('');
        $('.job_content table tr').eq(num).find('td').last().find('a').removeClass('cur');
        $('.job_content table tr').eq(num).find('td').last().find('a').html('对比');
    });
}
function guanbi(num,id){

    $("#duibi0"+num).val("");
    $("#duibi"+id).html("对比");
    $("#duibi"+id).removeClass('cur');
    $("#duibi_0"+num).html("");
    return false;
}
function checkform(){

    var id1 = $("#duibi01").val();
    var id2 = $("#duibi02").val();
    var id3 = $("#duibi03").val();
    if(id1.length<1 &&  id2.length<1 && id3.length<1){
        alert("没有可供对比的职位");
        return false;
    }
}

//对比页删除选项
$('.close').each(function(i){
    $(this).click(function(){
        $('#showinfo tr').eq(0).find('th').eq(i+1).find('d').html('');
        //alert($('#showinfo tr').not(':first').length);
        var td = $('#showinfo tr').not(':first').find('td');
        for(a=0;a<=(td.length/5);a++){
            td.eq(a*5+i+1).html('');
        }
    });
})

$('.gozw_bt a').click(function(){
    $('#duibi').hide();
})