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
		uname varchar(25), 
		upassword varchar(25) not null, 
		umobile int(10), 
		uemail varchar(30) not null, 
		usecque varchar(40) not null, 
		usecans varchar(40) not null, 
		primary key(uid), unique key(uname))CHARSET=latin1 COLLATE latin1_general_cs;");
		
		$conn->query("insert into users (uid,uname,upassword,uemail,usecque,usecans) values(0,'admin','admin','admin@mail.com','What is your favourite color?','red')");
	}
	

?>