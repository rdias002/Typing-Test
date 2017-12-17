<!DOCTYPE html>
<html>
	<head>
		<title>Online Typing Test</title>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<style>
			body{
				background-image:url(res/indexbg.jpg);
				background-repeat: no-repeat;
				background-size: cover;
				color: white;
				text-align:center;
			}
			.bod{
				display:grid;
				grid-template-columns:25fr 50fr 25fr;
				grid-template-areas:"left center right";
			}
			.container{
				grid-area:center;
				margin:auto;
				max-width:600px;
				height:170px;
				display:grid;
				grid-template-rows: 3fr 1fr;
				grid-template-areas: "output" "input";
			}
			.words{
				border-radius:5px;
				grid-area:output;
				background-color:white;
				color:black;
				text-align:left;
				font-size:30px;
				padding:5px;
				display: flex;
				flex-flow: row wrap;
				justify-content: space-between;
				overflow:hidden;
			}
			.input{
				border-radius:5px;
				grid-area:input;
				display:grid;
				grid-template-columns:5fr 1fr 1fr;
				grid-template-areas:"inputf replay time";
			}
			.inputf{
				grid-area:inputf;
				padding:10px;
				margin:10px;
				font-size:30px;
				float:left;
				border:3px solid #55f;
				border-radius:10px;
			}
			input.inputf:focus{outline:0px;}
			.replay{
				grid-area:replay;
				background-color:transparent;
				color:white;
				font-size:25px;
				border:0px;
				margin:20px 10px ;
			}
			.time{
				grid-area:time;
				color:white;
				font-size:30px;
				border:0px;
				margin:25px 10px ;
			}
			div.words span{
				margin-right:5px;
				display:block;
				height:50%;
			}
			.highlight{
				background-color:rgb(230,230,230);
				border-radius:5px;
			}
			.wrong{
				color:red;
			}
			.correct{
				color:green;
			}
			.warn{
				background-color:rgb(240,0,0);
			}
			button.replay:focus {outline:0;}
			button.replay:hover {
				border: 1px white solid;
			}
		</style>
	<body>
		<h1 style="font-size:50px">Online Typing Test</h1>
		<br/><br/>
		<div class="bod">
		<div class="container">
			<div class="words" id="words">
				
			</div>
			<div class="input">
				<input type="text" name="inputf" id="inputf" class="inputf" autofocus/>
				<button class="replay" id="replay">Retry</button>
				<span class="time" id="class">1:00</span>
			</div>
		</div>
		</div>
		<p id="pp"></p>
		<script>
			function removeElement(elementId) {
				// Removes an element from the document
				var element = document.getElementById(elementId);
				element.parentNode.removeChild(element);
			}
			function addElement(parentId, elementTag, elementId, html) {
				// Adds an element to the document
				var p = document.getElementById(parentId);
				var newElement = document.createElement(elementTag);
				newElement.setAttribute('id', elementId);
				newElement.innerHTML = html;
				p.appendChild(newElement);
			}
			function initialize(string){
				var wrds = string.split("|");
				var i;
				for(i=0;i<wrds.length;i++){
					addElement('words','span',String(i),wrds[i]);		
				}
			}
			var str = "wimp|ortant|time|by|food|new|out|find|until|day|quite|make|example|together|important|time|by|food|new|out|find|until|day|quiteant|few|head|up|show|after|make|example|together|wimp|ortant|time|by|food|new|out|find|until|day|quite|make|example|together|important|time|by|food|new|out|find|until|day|quiteant|few|head|up|show|after|make|example|together"; 
			initialize(str);
			var chr, 
				charsTyped=0, 
				keystrokes=0, 
				errors=0, 
				accuracy=100, 
				word, 
				wordno=0, 
				wordsTyped=0, 
				sw=0, 
				letterno=0, 
				backstrokes=0,
				grosswpm,
				netwpm;
			word = document.getElementById(String(wordno));
			word.setAttribute("class","highlight");
			document.getElementById("inputf").addEventListener("input",function (){
				if(charsTyped!=0){
					
				}
				chr = this.value.slice(-1);
				keystrokes++;
				charsTyped++;
				letterno++;
				if(chr == ' '){
					if(this.value.slice(0,-1) == word.innerHTML){
						word.setAttribute("class","correct");
					}
					else{
						word.setAttribute("class","wrong");
						errors++;
					}
					wordno++;
					wordsTyped++
					accuracy=Math.round((wordno-errors)/wordno*100);
					word = document.getElementById(String(wordno));
					word.setAttribute("class","highlight");
					this.value = "";
					letterno = 0;
					if(wordsTyped == 15){
						while(sw < wordno){
							document.getElementById(String(sw)).setAttribute("style","display:none");
							sw++;
						}
						sw = wordno;
						wordsTyped = 0;
					}
				}
				else if( this.value != word.innerHTML.slice(0,letterno) ){
					word.setAttribute("class","warn");
				}
				else{
					word.setAttribute("class","highlight");
				}
				grosswpm = (charsTyped/5);
				netwpm = grosswpm - errors;
				document.getElementById("pp").innerHTML=charsTyped+' '+keystrokes+' '+errors+' '+accuracy+' '+wordno+' '+wordsTyped+' '+letterno+' '+backstrokes+' '+grosswpm+' '+netwpm;
			});
			document.getElementById("inputf").addEventListener("keydown",function(){
				var key = event.keyCode || event.charCode;
				if(key == 8){
					if(this.value != ""){
						letterno -= 2;
						charsTyped -= 2;
						backstrokes++;
					}else{}
				}
			});
		</script>
	</body>
</html>
