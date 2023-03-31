function DateDiff(startDate,endDate){
var aDate, oDate1, oDate2, iDays ;
aDate = startDate.split('-');  
oDate1 = new Date().setFullYear(aDate[0],aDate[1],aDate[2]) ;
aDate = endDate.split('-');
oDate2 = new Date().setFullYear(aDate[0],aDate[1],aDate[2]);
iDays = parseInt(Math.abs(oDate1 -oDate2)/1000/60/60/24); //把相差的毫秒数转换为天数
return iDays ;
//alert(iDays);
}
var myDate = new Date();
var year = myDate.getFullYear();    //获取完整的年份(4位,1970-????)
var mon =  myDate.getMonth();       //获取当前月份(0-11,0代表1月)
var day = myDate.getDate();        //获取当前日(1-31)
mon = mon+1;
var nowt =year+"-"+mon+"-"+day;