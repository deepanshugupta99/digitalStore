		function name_check(){
 		   	var letters = /^[A-Za-z]+$/;
			var num_display=document.getElementById("name_check");
			var name =document.getElementById("name").value;
            if(name.match(letters))
            {
				num_display.innerHTML="";
			}
		    else
		    {
				if(name.length>0)
				{
					num_display.innerHTML="*Use only alphabets";
				}
				else
				{
					num_display.innerHTML="";
				}
			     
			}
		   
		}

		function fname_check(){
 		   	var letters = /^[A-Za-z]+$/;
			var num_display=document.getElementById("fname_check");
			var name =document.getElementById("fname").value;
            if(name.match(letters))
            {
				num_display.innerHTML="";
			}
		    else
		    {
				if(name.length>0)
				{
					num_display.innerHTML="*Use only alphabets";
				}
				else
				{
					num_display.innerHTML="";
				}
			     
			}
		   
		}

		function lname_check(){
 		   	var letters = /^[A-Za-z]+$/;
			var num_display=document.getElementById("lname_check");
			var name =document.getElementById("lname").value;
            if(name.match(letters))
            {
				num_display.innerHTML="";
			}
		    else
		    {
				if(name.length>0)
				{
					num_display.innerHTML="*Use only alphabets";
				}
				else
				{
					num_display.innerHTML="";
				}
			     
			}
		   
		}

		function number_check(){
			  var number=document.getElementById("number").value;
			  var num_display=document.getElementById("num_check");
              for(var i=0;i<number.length;i++)
			  {
					if(number[i]>=0 && number[i]<=9 && number.length<11)
					{
					    num_display.innerHTML="";
					}
				  	else
					{
						num_display.innerHTML="Please enter 10 digit valid number";
						break;
					}
			  }
            
		}
	function check_register()
	{
			var number=document.getElementById("number").value;
 		   	var letters = /^[A-Za-z]+$/;
			var fname =document.getElementById("fname").value;
			var lname =document.getElementById("lname").value;
            if(!(fname.match(letters)))
            {
				alert("Only Alphabet are allow for First Name");
				return false;
			}
			if(!(lname.match(letters)))
            {
				alert("Only Alphabet are allow for Last Name");
				return false;
			}
			if(!(number>=0 && number<=99999999999 && number.length<11))
			{
				alert("Only Numbers are allow for Number");
				return false;
			}
			else
			{
				return true;
			}
		
	}
	function check_login()
	{
			var number=document.getElementById("number1").value;
			if(!(number>=0 && number<=99999999999 && number.length<11))
			{
				alert("Only Numbers are allow for Number");
				return false;
			}
			else
			{
				return true;
			}
		
	}
		
	  
	function check_shipping_address()
	{
			var number=document.getElementById("number").value;
 		   	var letters = /^[A-Za-z]+$/;
			var name =document.getElementById("name").value;
            if(!(name.match(letters)))
            {
				alert("Only Alphabet are allow for Name");
				return false;
			}
			if(!(number>=0 && number<=99999999999 && number.length<11))
			{
				alert("Only Numbers are allow for Number");
				return false;
			}
			else
			{
				return true;
			}
		
	}


