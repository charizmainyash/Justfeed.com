	function updatefeedup(up,down,back)
	{
		var prev = 'null';
		if(upfeed.style.background == up)
		{
			prev = 'upfeed';
		}
		else if(downfeed.style.background == down)
			prev = 'downfeed';
		var url = "updown.php?upfeed=1&prev="+prev+"&article="+artid.value;
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function(){
			if(this.readyState == 4 && this.status == 200)
			{
				var output = this.responseText.split(" ");
				//alert(this.responseText);
				if(output[0] == '1')
				{
					upfeed.value = "UpFeed  "+output[1];
					upfeed.style.background = up;
					downfeed.value = "DownFeed  "+output[2];
					downfeed.style.background = back;
				}
				else if(output[0] == '-1')
				{
					upfeed.value = "UpFeed  "+output[1];
					upfeed.style.background = back;
				}

			}	
		}

		xmlhttp.open("GET",url,true);
		xmlhttp.send();
	}

	function updatefeeddown(up,down,back)
	{
		var prev = 'null';
		if(upfeed.style.background == up)
			prev = 'upfeed';
		else if(downfeed.style.background == down)
			prev = 'downfeed';
		var url = "updown.php?downfeed=1&prev="+prev+"&article="+artid.value;
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function(){
			if(this.readyState == 4 && this.status == 200)
			{
				var output = this.responseText.split(" ");
				if(output[0] == '1')
				{
					downfeed.value = "DownFeed  "+output[2];
					downfeed.style.background = down;
					upfeed.value = "UpFeed  "+output[1];
					upfeed.style.background = back;
				}
				else if(output[0] == '-1')
				{
					downfeed.value = "DownFeed  "+output[2];
					downfeed.style.background = back;
				}
			}
		}

		xmlhttp.open("GET",url,true);
		xmlhttp.send();
	}
	
	function updatesav(green,no)
	{
		
		//ssta Save Status
		var ssta='null';
		if(sav.style.background == green)
		{
			//sav.style.background = no;
			ssta='green';
		}
		else if (sav.style.background == no)
		{
			ssta='no';
		}
		var url = "updown.php?savp="+ssta+"&sart="+artid.value+"&sav=1";
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function(){
			if(this.readyState == 4 && this.status == 200)
			{
				//alert(this.responseText);
				if(this.responseText == true)
				{
					alert("Article Saved");
					sav.style.background = green;
					sav.value ='Saved';
				}
				else if(this.responseText == false)
				{
					alert("Un-Saved From Profile");
					sav.style.background = no;
					sav.value ='Save Article';
				}
			}
		}

		xmlhttp.open("GET",url,true);
		xmlhttp.send();

		
	}
		