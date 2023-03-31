
var Validator = function(name)
{
  this.formName = name;
  this.errMsg = new Array();


 //-------------------------------------------------
 this.trim = function( text )
{
  if (typeof(text) == "string")
  {
    return text.replace(/^\s*|\s*$/g, "");
  }
  else
  {
    return text;
  }
}
 //---------------------------------------------------
  this.required = function(controlId, msg)
  {
    var obj = document.forms[this.formName].elements[controlId];
    if (typeof(obj) == "undefined" || this.trim(obj.value) == "")
    {
     this.addErrorMsg(msg);
    }
  }
 this.testZwma = function( zwm )
{
  var reg1 =  /^[0-9]*$/;
  return reg1.test( zwm );
}
    /* *
  * 检查用户输入的是否为合法的邮件地址
  *
  * @param :  controlId   表单元素的ID
  * @param :  msg         错误提示信息
  * @param :  required    是否必须 true 必须 false 否
  */
  this.isZwma = function(controlId, msg, required)
  {
    var obj = document.forms[this.formName].elements[controlId];

    obj.value = this.trim(obj.value);
    //alert(obj.value);
    if ( ! required && obj.value == '')
    {
      return;
    }

    if ( ! this.testZwma(obj.value))
    {
      this.addErrorMsg(msg);
    }
  }
  //验证手机号 或 邮箱
    this.ismobileorzwm = function(controlId, msg, required)
  {
    var obj = document.forms[this.formName].elements[controlId];

    obj.value = this.trim(obj.value);
    //alert(obj.value);
    if ( ! required && obj.value == '')
    {
      return;
    }

    if ( !this.testZwma(obj.value) && !this.testMobile(obj.value) )
    {
      this.addErrorMsg(msg);
    }
  }
  /* *
  * 检查两个表单元素的值是否相等
  *
  * @param : fstControl   表单元素的ID
  * @param : sndControl   表单元素的ID
  * @param : msg         错误提示信息
  */
  this.eqaul = function(fstControl, sndControl, msg)
  {
    var fstObj = document.forms[this.formName].elements[fstControl];
    var sndObj = document.forms[this.formName].elements[sndControl];

    if (fstObj != null && sndObj != null)
    {
      if (fstObj.value == '' || fstObj.value != sndObj.value)
      {
        this.addErrorMsg(msg);
      }
    }
  }
  this.testNumber = function(val)
{
  var reg = /^[\d|\.|]+$/;
  return reg.test(val);
}
/* *
  * 检查输入的内容是否是一个数字
  *
  * @param :  controlId   表单元素的ID
  * @param :  msg         错误提示信息
  * @param :  required    是否必须
  */
  this.isNumber = function(controlId, msg, required)
  {
    var obj = document.forms[this.formName].elements[controlId];
    obj.value = this.trim(obj.value);

    if (obj.value == '' && ! required)
    {
      return;
    }
    else
    {
      if ( ! this.testNumber(obj.value))
      {
        this.addErrorMsg(msg);
      }
    }
  }
 //----------------------------------------------
  this.testInt = function(val)
{
  if (val == "")
  {
    return false;
  }
  var reg = /\D+/;
  return !reg.test(val);
}
 /* *
  * 检查输入的内容是否是一个整数
  *
  * @param :  controlId   表单元素的ID
  * @param :  msg         错误提示信息
  * @param :  required    是否必须
  */
  this.isInt = function(controlId, msg, required)
  {

    if (document.forms[this.formName].elements[controlId])
    {
      var obj = document.forms[this.formName].elements[controlId];
    }
    else
    {
      return;
    }

    obj.value = this.trim(obj.value);

    if (obj.value == '' && ! required)
    {
      return;
    }
    else
    {
      if ( ! this.testInt(obj.value)) this.addErrorMsg(msg);
    }
  }
//数值不大于120
this.isAbove=function(controlId, msg)
 {
	 obj=document.forms[this.formName].elements[controlId];
	 var nu;
	 nu = parseInt(obj.value);
	  if (nu>120 || nu<=0)
	  {
		  this.addErrorMsg(msg);
	  }
 }
  //-----------------------------------------------
  //----------------------------------------------
  this.testMobile = function(val)
{
  if (val == "")
  {
    return false;
  }
  var reg = /^13[0-9]{9}|^14[0-9]{9}|^15[0-9]{9}|^16[0-9]|^17[0-9]{9}|^18[0-9]{9}|^19[0-9]{9}/;

  return reg.test(val);
}
 /* *
  * 检查输入的内容是否是一个整数
  *
  * @param :  controlId   表单元素的ID
  * @param :  msg         错误提示信息
  * @param :  required    是否必须
  */
  this.isMobile = function(controlId, msg, required)
  {

    if (document.forms[this.formName].elements[controlId])
    {
      var obj = document.forms[this.formName].elements[controlId];
    }
    else
    {
      return;
    }

    obj.value = this.trim(obj.value);

    if (obj.value == '' && ! required)
    {
      return;
    }
    else
    {
      if ( ! this.testMobile(obj.value)) this.addErrorMsg(msg);
    }
  }
/*  this.isMobile = funciton(contorlId, msg, required)
  {
	  var obj=document.forms[this.formName].elements[contorlId];
	  var objv =this.trim(obj.value);//去除空格
	  if(objv.length!=11){
		  this.addErrorMsg(msg);
	   }
	   else if(objv.substring(0,2)!="13" && objv.substring(0,2)!= "5" && objv.substring(0,2)!= "18")
	   {
		   this.addErrorMsg(msg);
	   }
	   else if(isNaN(objv))
	   {
		   this.addErrorMsg(msg);
		}
  }*/
  //-----------------------------------------------
   this.testTime = function(val)
 {
   var reg = /^\d{4}-\d{2}-\d{2}\s\d{2}:\d{2}:\d{2}$/;

    return reg.test(val);
 }
  /* *
  * 检查输入的内容是否是"2006-11-12 12:00:00"格式
  *
  * @param :  controlId   表单元素的ID
  * @param :  msg         错误提示信息
  * @param :  required    是否必须
  */
  this.isTime = function(controlId, msg, required)
  {
    var obj = document.forms[this.formName].elements[controlId];
    obj.value = this.trim(obj.value);

    if (obj.value == '' && ! required)
    {
      return;
    }
    else
    {
      if ( ! this.testTime(obj.value)) this.addErrorMsg(msg);
    }
  }
    /* *
  * 检查前一个表单元素是否小于后一个表单元素(日期判断)
  *
  * @param : controlIdStart   表单元素的ID
  * @param : controlIdEnd	  表单元素的ID
  * @param : msg              错误提示信息
  */
  this.islt = function(controlIdStart, controlIdEnd, msg)
  {
    var start = document.forms[this.formName].elements[controlIdStart];
    var end = document.forms[this.formName].elements[controlIdEnd];
    start.value = this.trim(start.value);
    end.value = this.trim(end.value);

    if(start.value <= end.value)
    {
      return;
    }
    else
    {
      this.addErrorMsg(msg);
    }
  }
 //-----------------------------------------------------
 this.testTel = function ( tel )
{
  var reg = /^[\d|\-|\s|\_]+$/; //只允许使用数字-空格等

  return reg.test( tel );
}

 this.isTel=function(telvalue,msg,required){

     var obj = document.forms[this.formName].elements[telvalue];
    obj.value = this.trim(obj.value);

    if (obj.value == '' && ! required)
    {
      return;
    }
    else
    {
      if ( ! this.testTel(obj.value)) this.addErrorMsg(msg);
    }
 }
 //-----------------------------------------------------
  this.passed = function()
  {
    if (this.errMsg.length > 0)
    {
      var msg = "";
      for (i = 0; i < this.errMsg.length; i ++ )
      {
        msg += "- " + this.errMsg[i] + "\n";
      }

      // alert(msg);
      //   sweetAlert(msg, "出错了！","error");
        swal(
              {
                  title: "",
                  text: msg,
                  type: "error",
                  allowOutsideClick:true,
              }
            );
      return false;
    }
    else
    {
      return true;
    }
  }

  /* *
  * 增加一个错误信息
  *
  * @param :  str
  */
  this.addErrorMsg = function(str)
  {
    this.errMsg.push(str);
  }

}