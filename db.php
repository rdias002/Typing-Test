<?php
	$conn = new mysqli("localhost","root","");
	if($conn->select_db("typingtest")){
		
	}
	else{
		$conn->query("create database typingtest");
		if($conn->connect_error)
			die("Unexpected Error, please contact Administrator");
		$conn->select_db("typingtest");
		$conn->query("create table users(
		uid int(3) auto_increment, 
		uname varchar(25) not null, 
		upassword varchar(32) not null, 
		umobile varchar(10), 
		uemail varchar(30) not null, 
		usecque varchar(40) not null, 
		usecans varchar(40) not null, 
		primary key(uid), unique key(uname))CHARSET=latin1 COLLATE latin1_general_cs;");
		
		$conn->query("insert into users (uid,uname,upassword,uemail,usecque,usecans) values(0,'admin','admin','admin@mail.com','What is your favourite color?','red')");
		
		$conn->query("insert into users (uid,uname,upassword,uemail,usecque,usecans) values(1'Guest','Guest','Guest@mail.com','What is your favourite color?','none')");
		
		$conn->query("create table texts (textid int(2) primary key, value longtext)");
		
		$data = "so|say|have|you|too|story|little|walk|because|got|why|few|found|together|other|almost|end|back|man|face|America|took|study|home|soon|next|different|paper|my|idea|came|year|almost";
		
		$txt = $conn->real_escape_string("must|letter|eat|these|talk|into|were|ask|on|for|make|out|which|open|them|follow|car|went|how|like|all|keep|same|which|thought|something|quite|new|point|last|how|thing|mother|around|few|before|still|next|look|girl|earth|four|at|must|hand|us|kind|have|turn|plant|any|more|come|same|light|then|country|most|land|now|tell|tree|cut|mile|him|face|well|book|state|away|from|few|food|run|water|for|animal|your|it's|once|without|why|thought|being|food|near|father|down|oil|for|who|here|often|book|with|go|why|use|list|water|time|song|take|sound|these|end|end|only|our|between|different|out|point|him|its|word|and|would|home|does|up|example|his|something|form|what|under|such|men|have|add|mountain|our|never|off|feet|work|quickly|on|could|so|house|if|other|sea|write|all|every|off|play|through|idea|answer|mile|learn|America|along|us|made|want|big|seem|work|young|quite|first|would|day|page|than|question|its|home|change|father|second|through|did|life|both|your|that|another|were|it's|world|above|was|around|have");
		$conn->query("insert into texts values (1,'$txt')");
		
		$txt = $conn->real_escape_string("light|follow|that|later|that|below|then|may|enough|life|each|no|came|live|must|even|by|sound|school|he|plant|day|spell|large|story|children|take|my|line|also|stop|small|until|men|change|when|cut|some|live|year|girl|give|very|two|been|show|world|did|always|grow|this|part|different|together|some|move|might|don't|feet|school|study|then|idea|plant|close|name|high|quickly|long|very|quickly|we|much|little|children|quite|before|was|he|is|well|all|mean|walk|later|both|its|make|one|made|study|story|said|state|saw|got|has|any|do|we|again|own|Indian|be|every|off|try|boy|example|out|really|way|were|was|list|great|too|hear|you|four|almost|hard|found|but|those|second|mile|end|white|turn|big|need|letter|found|each|soon|line|while|give|eye|so|next|here|where|and|change|quick|let|said|close|later|got|need|other|than|sentence|from|different|move|not|would|seem|is|spell|line|must|own|let|want|into|once|two|find|soon|second|stop|you|very|tree|house|found|after|its|learn|got|example|night|one|big|make|animal");
		$conn->query("insert into texts values (2,'$txt')");
		
		$txt = $conn->real_escape_string("by|them|family|follow|small|far|me|us|because|example|left|kind|good|stop|first|paper|other|many|too|like|light|day|let|if|move|might|go|write|one|high|what|sea|any|quickly|own|with|down|always|out|paper|stop|river|when|three|really|give|such|had|paper|girl|some|may|long|together|all|why|part|he|mother|want|look|make|face|add|place|it|still|turn|each|are|no|land|children|of|write|school|young|there|and|such|just|us|enough|form|men|again|mile|high|ask|young|every|more|no|if|mother|will|what|long|said|call|this|at|don't|does|thing|big|sometimes|are|four|well|between|another|each|again|because|away|see|walk|far|was|list|often|never|father|sound|next|an|young|left|line|got|old|about|father|part|page|answer|get|their|place|just|over|old|form|same|America|run|under|picture|use|both|down|saw|these|oil|at|being|father|book|family|with|new|often|eat|great|does|grow|it's|made|something|but|quickly|went|air|side|me|an|world|play|did|away|ask|they|left|long|it's|side|animal|word|great|away|list|go");
		$conn->query("insert into texts values (3,'$txt')");
		
		$txt = $conn->real_escape_string("talk|quickly|more|grow|water|learn|back|house|night|some|few|grow|under|idea|later|time|his|being|question|letter|name|city|without|old|give|if|country|eye|of|cut|much|help|country|other|set|boy|soon|say|head|there|saw|cut|tell|end|before|get|hand|like|might|to|again|line|than|read|most|ask|in|follow|still|should|along|open|side|have|up|even|eye|went|does|began|down|something|not|eat|need|letter|feet|mile|boy|second|state|my|head|white|what|until|there|it|get|know|those|name|want|time|has|by|large|car|have|he|tell|for|must|live|along|come|don't|sound|group|these|my|book|end|carry|found|little|most|side|have|of|work|river|two|hard|home|this|study|has|me|something|point|part|near|he|show|later|who|grow|air|last|next|said|but|white|head|him|thing|book|eye|had|earth|in|river|once|will|take|for|about|high|now|soon|an|father|mother|add|walk|children|your|follow|begin|girl|do|tell|America|got|country|come|the|so|Indian|again|example|had|thing|got|who|again|say|does|get|mean|end|go|hear|make|house");
		$conn->query("insert into texts values (4,'$txt')");		
		
		$txt = $conn->real_escape_string("ask|know|keep|group|light|change|all|one|quick|as|without|large|tell|after|way|us|sentence|almost|were|often|people|change|feet|found|let|us|question|four|never|quick|study|some|answer|add|call|letter|look|he|well|his|if|open|her|land|let|Indian|this|she|water|hard|in|quite|oil|at|of|story|great|until|good|home|one|hear|sea|up|different|came|each|read|those|took|important|still|should|at|picture|not|think|there|these|food|has|boy|city|very|great|number|carry|have|paper|be|move|could|oil|sentence|look|me|into|never|run|find|spell|those|around|at|answer|first|around|help|world|play|find|year|boy|along|next|into|not|young|old|kind|say|line|idea|her|like|does|miss|way|turn|idea|just|under|from|different|above|even|family|here|animal|after|more|an|much|always|play|or|side|plant|know|put|thing|another|air|mile|your|should|spell|together|list|learn|more|we|look|you|follow|is|what|away|even|right|does|little|through|took|live|young|another|when|high|down|see|she|use|may|time|go|only|on|word|her");
		$conn->query("insert into texts values (5,'$txt')");
		
		$txt = $conn->real_escape_string("form|must|point|make|carry|carry|something|same|line|both|quite|these|tree|young|do|America|city|learn|big|put|city|much|up|over|some|very|question|through|talk|start|water|want|father|watch|car|was|before|big|eye|might|when|now|large|than|live|other|car|story|far|men|oil|below|old|made|why|need|miss|own|place|turn|could|too|than|also|need|begin|mother|part|good|tree|set|talk|page|we|add|new|were|city|letter|paper|never|its|want|sound|three|my|from|then|about|run|be|list|night|next|only|it|all|put|another|country|our|eat|between|few|idea|example|high|open|people|change|far|of|let|well|eat|kind|had|make|away|have|want|those|good|live|or|place|would|sometimes|they|spell|city|above|quickly|small|last|until|animal|this|she|off|often|saw|be|as|people|on|much|up|is|where|once|move|follow|ask|mother|line|me|state|add|down|close|so|for|it's|then|her|her|right|back|old|run|year|near|is|thought|at|between|light|for|line|at|first|time|state|food|large|eye|us|no|get|if|know|to|last|under|without|oil");
		$conn->query("insert into texts values (6,'$txt')");
		
		$txt = $conn->real_escape_string("or|four|for|before|get|after|more|what|may|turn|side|but|should|even|he|said|two|will|it|song|stop|quick|second|carry|another|add|high|later|sentence|its|animal|long|been|help|always|begin|sentence|being|far|feet|may|put|land|who|here|through|light|an|state|us|house|give|that|play|her|one|never|Indian|try|if|his|he|land|young|another|away|air|through|left|part|letter|set|began|learn|find|don't|tell|grow|such|girl|old|great|word|life|house|got|so|really|new|often|most|same|were|children|sound|any|walk|look|group|father|and|later|still|get|up|without|took|seem|leave|want|think|study|leave|can|that|more|watch|quite|second|took|do|about|small|story|near|book|did|see|hear|little|been|come|just|do|does|why|down|ask|they|soon|help|let|here|stop|ask|most|talk|car|about|after|his|might|way|and|mean|when|saw|almost|much|answer|time|your|both|along|boy|over|name|has|been|well|part|write|got|important|say|miss|big|think|around|place|work|here|boy|girl|good|cut|feet|from|country|song|question|your|");
		$conn->query("insert into texts values (7,'$txt')");
		
	}
	

?>