$(document).ready(function()
{	
	// returning codes :
	// 00 > Too short
	// 01 > Weak
	// 10 > Good
	// 11 > Strong
	$("input[name='password1']").keyup(function()
	{
		var stat=checkStrength($("input[name='password1']").val())
		$('#pass_stat').html(js_lang[stat])
	})	
	
	$("input[name='password2']").keyup(function()
	{	
		$('#pass_note').removeClass()
		
		var msg=''
		var stat=($("input[name='password1']").val()==$("input[name='password2']").val()?true:false)
		if($("input[name='password1']").val().length >0){
			if(stat===true){
				stat='success'
				msg=js_lang.passmatch
			}else{
				stat='warning'
				msg=js_lang.passnotmatch
			}

			$('#pass_note').addClass('alert alert-'+stat)
		}
		
		$('#pass_note').html(msg)
	})		

	function checkStrength(password)
	{
		var strength = 0
		
		if (password.length < 7) { 
			$('#pass_stat').removeClass()
			$('#pass_stat').addClass('alert alert-dark')
			return '00' 
		}
		
		//if (password.length > 7) strength += 1
		
		//If password contains both lower and uppercase characters, increase strength value.
		if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/))  strength += 1
		
		//If it has numbers and characters, increase strength value.
		if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/))  strength += 1 
		
		//If it has one special character, increase strength value.
		if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/))  strength += 1
		
		//if it has two special characters, increase strength value.
		if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
		
		
		//Calculated strength value, we can return messages
		
		
		
		//If value is less than 2
		
		if (strength < 2 )
		{
			$('#pass_stat').removeClass()
			$('#pass_stat').addClass('alert alert-warning')
			return '10'			
		}
		else if (strength == 2 )
		{
			$('#pass_stat').removeClass()
			$('#pass_stat').addClass('alert alert-info')
			return '01'		
		}
		else
		{
			$('#pass_stat').removeClass()
			$('#pass_stat').addClass('alert alert-success')
			return '11'
		}
	}
});