$(document).ready(function(){
	var user_name = 'tacos';
	alert("Hello World");
	//var user_name = prompt("Please enter your name");

	$.post('users.php',{user_name: user_name, action: 'joined'});

	
	setInterval(function(){
		$.post('users.php',{action: 'list'}, function(data){
			$('#users_online').html(data);
		});
		
	}, 500);
	
	$(window).unload(function(){
		$.post('users.php',{user_name: user_name, action: 'left'});
	});
});