function DateDiff(startDate,endDate){
var aDate, oDate1, oDate2, iDays ;
aDate = startDate.split('-');  
oDate1 = new Date().setFullYear(aDate[0],aDate[1],aDate[2]) ;
aDate = endDate.split('-');
oDate2 = new Date().setFullYear(aDate[0],aDate[1],aDate[2]);
iDays = parseInt(Math.abs(oDate1 -oDate2)/1000/60/60/24); //�����ĺ�����ת��Ϊ����
return iDays ;
//alert(iDays);
}
var myDate = new Date();
var year = myDate.getFullYear();    //��ȡ���������(4λ,1970-????)
var mon =  myDate.getMonth();       //��ȡ��ǰ�·�(0-11,0����1��)
var day = myDate.getDate();        //��ȡ��ǰ��(1-31)
mon = mon+1;
var nowt =year+"-"+mon+"-"+day;