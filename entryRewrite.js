function readTextArea(){
	var text = document.getElementById("myTextArea").value;
	var length = text.length;
	for(var x = 0; x < length; x++){
		if(text.substring(x, x+1).includes('\t')){
			text = text.replace('\t','&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');
		}
		if(text.includes('"')){
			text = text.replace('"', '&quot');
		}
		if(text.includes('\n')){
			text = text.replace('\n','<br>');
		}
	}
		
	console.log(text);
		
	var element = document.getElementById("finalPost");
	finalPost.value = text;
}