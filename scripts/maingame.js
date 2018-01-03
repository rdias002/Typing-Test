var noWords;
		//Functions for adding element and initializing the words;
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
		
		initialize();
		//Variable initialization
		var chr, timer,
			charsTyped=0, 
			keystrokes=0, 
			errors=0, 
			accuracy=100, 
			wordno=0, 
			wordsTyped=0, 
			sw=0, 
			letterno=0, 
			backstrokes=0,
			sec = 60,
			grosswpm,
			netwpm,
			word=document.getElementById(String(wordno)), 
			res=document.getElementById('result');
			inputf=document.getElementById('inputf');
			words=document.getElementById('words');
		word.setAttribute('class','highlight');
		inputf.addEventListener('input',function (){
			if(wordno==0 && letterno==0 && sec==60){
				timer = setInterval(function(){
					sec--;
					document.getElementById('time').innerHTML=Math.floor(sec/60)+':'+sec%60;
					if(sec == 0 || wordno == noWords){
						clearInterval(timer);
						inputf.disabled = true;
						grosswpm = Math.round((charsTyped/5));
						netwpm = (grosswpm > errors)?grosswpm-errors:0;
						accuracy=Math.round((wordno-errors)/wordno*100);
						res.innerHTML='Gross speed: '+grosswpm+'wpm Net speed: '+netwpm+'wpm<br/>Accuracy: '+accuracy+'%';
						res.style='opacity:1';
						words.style='opacity:0';
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
				if(wordsTyped == 15){
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
		document.getElementById('replay').addEventListener('click',function(){
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
			sec=60;
			
			inputf.value='';
			initialize();
			
			inputf.disabled = false;
			inputf.focus();
			
			word = document.getElementById(String(wordno));
			word.setAttribute('class','highlight');
			
			document.getElementById('time').innerHTML='1:00';
			words.style='opacity:1';
			res.style='opacity:0';				
							
		});