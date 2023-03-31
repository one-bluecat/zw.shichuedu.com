// window.sendnum = function(res) {
//     $('.phoneTk').hide();
//     $('#coverDiv').hide();
//     var umobile=$.trim($('#tel').val());
//     var rmobile=/^1[3-9]\d{9}$/;
//     if( !rmobile.test( umobile ) || umobile =='' ){
//         alert('请输入正确的手机号。');
//         return false;
//     }
//     var diqu=$('#diqu').val();
//     if(diqu=='0'){
//         alert("请选择地区");
//         return false;
//     }
//         /* callback */
//         console.log(res);
//         if(res.ret === 0){
//             var sjs=Math.random()*1000;
//             $.ajax({
//                 type: "POST",
//                 url: "/kscx/sendsms/",
//                 data: "act="+sjs+"&tel="+umobile+"&id="+parseInt(id)+"&diqu="+diqu+"&ticket="+res.ticket+"&randstr="+res.randstr,
//                 success: function(data) {
//                     if(!data.status){
//                         alert(data.info);
//                         return false;
//                     }
//                     if(data.status == 1){
//                         $('.phoneTk,#coverDiv').hide();
//                         alert("发送成功！");
//                     }
//                 }
//             });
//         }else{
//             alert('验证码校验失败！');
//             return false;
//         }
// };

$('#btn').click(function(){
    $('.phoneTk,,#coverDiv').show();
    return false;

});

$('#btn1').click(function(){
    $('.phoneTk,,#coverDiv').show();
    return false;

});

$(function(){

});