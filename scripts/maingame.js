var noWords;
function shuffle(array){
	var currentIndex = array.length, temp, randomIndex;
	while(currentIndex > 0){
		randomIndex = Math.floor(Math.random()*currentIndex);
		currentIndex -= 1;
		temp = array[currentIndex];
		array[currentIndex] = array[randomIndex];
		array[randomIndex] = temp;
	}
	return array;
}
function addElement(parentId, elementTag, elementId, html) {
	// Adds an element to the document
	var p = document.getElementById(parentId);
	var newElement = document.createElement(elementTag);
	newElement.setAttribute('id', elementId);
	newElement.innerHTML = html;
	p.appendChild(newElement);
}
function initialize(){
	var str;
	var randID = Math.floor(Math.random() * 7) + 501;
	str=document.getElementById(String(randID)).innerHTML;
	str = str.slice(1,-1);
	document.getElementById('words').innerHTML='';
	var wrds = shuffle(str.split('|'));
	var i;
	for(i=0;i<wrds.length;i++){
		addElement('words','span',String(i),wrds[i]);		
	}
	noWords = i;
}
function resetWords(){
	clearInterval(timer);
	charsTyped=0; 
	keystrokes=0;
	errors=0;
	accuracy=100;
	wordno=0;
	wordsTyped=0;
	sw=0;
	letterno=0;
	backstrokes=0;
	grosswpm=0;
	netwpm=0;
	sec=time;
	
	inputf.value='';
	initialize();
	
	inputf.disabled = false;
	inputf.focus();
	
	word = document.getElementById(String(wordno));
	word.setAttribute('class','highlight');
	
	document.getElementById('time').innerHTML=(Math.floor(sec/60))+':00';
	words.style='opacity:1';
	res.style='opacity:0';				
					
}
initialize();
//Variable initialization
var chr, timer,time=60,
	charsTyped=0, 
	keystrokes=0, 
	errors=0, 
	accuracy=100, 
	wordno=0, 
	wordsTyped=0, 
	sw=0, 
	letterno=0, 
	backstrokes=0,
	sec=60,
	grosswpm,
	netwpm,
	word=document.getElementById(String(wordno)), 
	res=document.getElementById('result'),
	inputf=document.getElementById('inputf'),
	words=document.getElementById('words');
word.setAttribute('class','highlight');
inputf.addEventListener('input',function (){
	if(wordno==0 && letterno==0 && sec==time){
		timer = setInterval(function(){
			sec--;
			document.getElementById('time').innerHTML=Math.floor(sec/60)+':'+((sec%60 < 10)?('0'+sec%60):sec%60);
			
			if(sec == 0 || wordno == noWords){
				clearInterval(timer);
				inputf.disabled = true;
				grosswpm = Math.round((charsTyped/5))/(time/60);
				netwpm = (grosswpm > errors)?grosswpm-errors/(time/60):0;
				accuracy=Math.round((wordno-errors)/wordno*100);
				res.innerHTML='Gross speed: '+grosswpm+'wpm<br/> Net speed: '+netwpm+'wpm<br/>Accuracy: '+accuracy+'%';
				res.style='opacity:1';
				words.style='opacity:0';
				var info = {'completed':true,'grosswpm':grosswpm,'netwpm':netwpm,'accuracy':accuracy};
				$.ajax({type:'post',data:info,url:'',success:function(data){
					//alert($.parseJSON(data));
					var userDetails = $.parseJSON(data);
					if(userDetails.uname == 'Guest'){
						var tempgwpm = parseInt($('#dhgwpm').text());
						var tempnwpm = parseInt($('#dhnwpm').text());
						var tempnotries = parseInt($('#dnotries').text());
						$('#dnotries').text(tempnotries+1); 
						$('#dhgwpm').text((tempgwpm>grosswpm)?tempgwpm:grosswpm); 
						$('#dhnwpm').text((tempnwpm>netwpm)?tempnwpm:netwpm); 
					}else{
						$('#dnotries').text(userDetails.notries);
						$('#dhgwpm').text(userDetails.hgrosswpm);
						$('#dhnwpm').text(userDetails.hnetwpm);
					}
				}});
				
			}
		},1000);
	}
	chr = this.value.slice(-1);
	keystrokes++;
	charsTyped++;
	letterno++;
	if(chr == ' '){
		if(this.value.slice(0,-1) == word.innerHTML){
			word.setAttribute('class','correct');
		}
		else{
			word.setAttribute('class','wrong');
			errors++;
		}
		wordno++;
		wordsTyped++
		word = document.getElementById(String(wordno));
		word.setAttribute('class','highlight');
		this.value = '';
		letterno = 0;
		if(wordsTyped == 10){
			while(sw < wordno){
				document.getElementById(String(sw)).setAttribute('style','display:none');
				sw++;
			}
			sw = wordno;
			wordsTyped = 0;
		}
	}
	else if( this.value != word.innerHTML.slice(0,letterno) ){
		word.setAttribute('class','warn');
	}
	else{
		word.setAttribute('class','highlight');
	}
});
inputf.addEventListener('keydown',function(){
	var key = event.keyCode || event.charCode;
	if(key == 8){
		if(this.value != ''){
			letterno -= 2;
			charsTyped -= 2;
			backstrokes++;
		}else{}
	}
});

document.getElementById('replay').addEventListener('click',resetWords);
$(document).ready(function(){
	$.ajax({
		type: 'POST',
		url: '',
		data:{'PageReady':true},
		datatype:'json',
		success: function(data){ 
			var userDetails = $.parseJSON(data);
			$('#duname').text(userDetails.uname);
			$('#dnotries').text(userDetails.notries);
			$('#dhgwpm').text(userDetails.hgrosswpm);
			$('#dhnwpm').text(userDetails.hnetwpm);
			if(userDetails.uname != 'Guest'){
				$('#editAC').show();
			}
		}
	});
	
/* 	$.ajax({
		type:'POST',
		url:'',
		data:{'getHighscore':true},
		datatype:'json'
	});
	
	 */
	
	$('#time-dd').mouseenter(function(){
		$('#time-dd-contents').show();
	});
	$('#time-dd').mouseleave(function(){
		$('#time-dd-contents').hide();
	});
	$('#1min').click(function(){
		time = 60;
		resetWords();
		$('#time-dd-contents').hide();
	});
	$('#2min').click(function(){
		time = 60*2;
		resetWords();
		$('#time-dd-contents').hide();
	});
	$('#5min').click(function(){
		time = 60*5;
		resetWords();
		$('#time-dd-contents').hide();
	});
	$('#10min').click(function(){
		time = 60*10;
		resetWords();
		$('#time-dd-contents').hide();
	});
	$('#editAC').click(function(){
		$('#aceditor').fadeToggle(200,function(){
			$('#container').toggle();
		});
		$.ajax({
			type:'POST',
			url:'',
			data:{'getDetails':true},
			datatype:'json',
			success:function(data){
				var details = $.parseJSON(data);
				$('#uname').val(details.uname);
				$('#email').val(details.uemail);
				$('#mobile').val(details.umobile);
				$('#secque').val(details.usecque);
				$('#secans').val(details.usecans);
			}
		});
	});
	$('#close').click(function(){
		//$('#container').toggle();
		//$('#aceditor').fadeToggle(200);
		location.reload();
	});
	$("#feditor").submit(function(e){
		e.preventDefault();
		if($("#pass").val() != $("#rpass").val()){
			$("#pass").css("border","1px red solid");
			$("#rpass").css("border","1px red solid");
			return;
		}	
		$.post('index.php',{
			'update':true,
			'uuname': $("#uname").val(),
			'upass': $("#pass").val(),
			'uemail': $("#email").val(),
			'umobile': $("#mobile").val(),
			'usecque': $("#secque").val(),
			'usecans': $("#secans").val()
		},function(){location.reload()});
		
	});
	$('#delac').click(function(){
		$('#cdelac').show(200);
	});
	$('#yes').click(function(){	
		$.post(window.location,{loggedout:'true'});
		$.ajax({
			type:'post',
			url:'',
			data:{'deleteAccount':true,'user':$('#duname').text()}
		});
		location.reload();
	});
	$('#no').click(function(){
		$('#cdelac').hide(200);
	});
	
});