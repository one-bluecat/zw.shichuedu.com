//  对比页筛选修改
$(function(){
	var year = $('#year').val();
	$('#xl cite').click(function(){
		$(this).siblings('ul').show();
		
	})
	$('#xl ul li').click(function(){
			var txt = $(this).find('a').html();
			var sid1 = $(this).find('a').attr('selectid');
			$('#inputselect1').val(txt);
			$('#xueli').val(txt);
			$(this).parent('ul').siblings('cite').html(txt);
			$(this).parent('ul').hide();
			$.getJSON('http://zwsearch.huatu.com/zhuanye2016.php?act=xl&callback=?',{'xl':txt},function(data){
				if(data.res.length>10){
					$('#xkml ul').html(data.res);
				}
			})
		})
	$('#xkml cite').click(function(){
		$(this).siblings('ul').show();
	})
	$('#xkml ul li').live('click',function(){
			var txt1 = $(this).find('a').html();
			$('#inputselect2').val(txt1);
			$(this).parent('ul').siblings('cite').html(txt1);
			$(this).parent('ul').hide();
			$.getJSON('http://zwsearch.huatu.com/zhuanye2016.php?act=xl&callback=?',{'xl':$('#inputselect1').val(),'xkml':txt1},function(data){
				if(data.res.length>10){
					$('#xkmc ul').html(data.res);
				}
			})
		}
	
	)
	$('#xkmc cite').click(function(){
		$(this).siblings('ul').show();
		
	})
	
	$('#xkmc ul li').live('click',function(){
			var txt2 = $(this).find('a').html();
			$('#inputselect3').val(txt2);
			$(this).parent('ul').siblings('cite').html(txt2);
			$(this).parent('ul').hide();
			$.getJSON('http://zwsearch.huatu.com/zhuanye2016.php?act=xl&callback=?',{'xl':$('#inputselect1').val(),'xkml':$('#inputselect2').val(),'xkmc':txt2},function(data){
				if(data.res.length>10){
					$('#zymc ul').html('<li><a>不限</a></li>');
					$('#zymc ul').append(data.res);
					
				}
			})
		}
	
	)
	
	$('#zymc cite').click(function(){
		$(this).siblings('ul').show();
		$('#zymc ul li').click(function(){
			var txt3 = $(this).find('a').html();
			var sid4 = $(this).find('a').attr('selectid');
			$('#inputselect4').val(txt3);
			$('#zhuanye').val(txt3);
			$(this).parent('ul').siblings('cite').html(txt3);
			$(this).parent('ul').hide();
			
		})
	})
	
	
	$('#dd cite').click(function(){
		$(this).siblings('ul').show();
		$('#dd ul li').click(function(){
			var txt = $(this).find('a').html();
			var sid1 = $(this).find('a').attr('selectid');
			$('#diqu').val(txt);
			$(this).parent('ul').siblings('cite').html(txt);
			$(this).parent('ul').hide();
		})
	})
	
	$('#zz cite').click(function(){
		$(this).siblings('ul').show();
		$('#zz ul li').click(function(){
			var txt1 = $(this).find('a').html();
			var sid2 = $(this).find('a').attr('selectid');
			$('#zzmm').val(txt1);
			$(this).parent('ul').siblings('cite').html(txt1);
			$(this).parent('ul').hide();
		})
	})
	
	$('#jj cite').click(function(){
		$(this).siblings('ul').show();
		$('#jj ul li').click(function(){
			var txt2 = $(this).find('a').html();
			var sid3 = $(this).find('a').attr('selectid');
			$('#nianxian').val(txt2);
			$(this).parent('ul').siblings('cite').html(txt2);
			$(this).parent('ul').hide();
		})
	})
	
	$('#xx cite').click(function(){
		$(this).siblings('ul').show();
		$('#xx ul li').click(function(){
			var txt3 = $(this).find('a').html();
			var sid4 = $(this).find('a').attr('selectid');
			$('#xuewei').val(txt3);
			$(this).parent('ul').siblings('cite').html(txt3);
			$(this).parent('ul').hide();
			
		})
		
	})
	$('#search').click(function(){
		$('#form2').submit();
	})

})
