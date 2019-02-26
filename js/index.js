window.onload=function(){

	var lplBox = document.getElementById('lpl');
	var lplHidden= document.getElementById('lplHidden');
	var gkBox = document.getElementById('gk');
	var gkHidden = document.getElementById('gkHidden');
	lplBox.onmouseover = function(){
    	lplHidden.style.display='block';
	}
	lplBox.onmouseout = function(){
    	lplHidden.style.display='none';
	}
	gkBox.onmouseover = function(){
    	gkHidden.style.display='block';
	}
	gkBox.onmouseout = function(){
    	gkHidden.style.display='none';
	}				

}

