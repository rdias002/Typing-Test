<!DOCTYPE html>
<html>
	<head>
		<title>Online Typing Test</title>
		<style>
		
			body{
				background-image:url(res/indexbg.jpg);
				font-size:20px;
				background-repeat: no-repeat;
				background-size: cover;
				color: white;
				text-align:center;
			}
			.inputfield{
				font-size:25px;
				padding:15px;
				border:3px black solid;
			}
			words {
			  background-color:white;
			  width: 300px;
			  height: 200px;
			}
			span{
				background-color:rgb(240,240,240);
				color:black;
				padding:5px;
				margin:2px;
			}
			.area{
				 position: absolute;
				  width: 300px;
				  height: 200px;
				  z-index: 15;
				  top: 50%;
				  left: 50%;
				  margin: -100px 0 0 -150px;
				  background: red;
			}
		</style>
	</head>	
	<body>
			<div class="area">
			<div id="words">
		
			</div>	
				<br/><br/>
			<div>
				<input type="text" class="inputfield" id="inputfield" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" maxlength="15">
			</div>
			</div>
			<script>
			function removeElement(elementId) {
				// Removes an element from the document
				var element = document.getElementById(elementId);
				element.parentNode.removeChild(element);
			}
			function addElement(parentId, elementTag, elementId, wdno, html) {
				// Adds an element to the document
				var p = document.getElementById(parentId);
				var newElement = document.createElement(elementTag);
				newElement.setAttribute('id', elementId);
				newElement.innerHTML = html;
				p.appendChild(newElement);
			}
			var i;
			for(i=0;i<6;i++){
				addElement('words','span','word'+i,i,'word'+i);
			}
			var outputfield = document.getElementById("outputfield");
			var inputfield = document.getElementById("inputfield");
			var keystrokes=0,backstrokes=0;
			inputfield.addEventListener('input',function eval(){
				keystrokes++;
				var ch = this.value.slice(-1);
				if(ch == ' '){
					keystrokes--;
					this.value = "";
				}else{
					
				}
			});
			
			
		</script>
	</body>
</html>
