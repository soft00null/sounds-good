



var shah ;


if(navigator.appName.search('Microsoft')>-1) 
{
	 shah = new ActiveXObject('MSXML2.XMLHTTP');
}
else
{
	 shah = new XMLHttpRequest(); 
}

$('#yoyo').bind('click',function bushi() 
{
shah.open('get', yo, true); 
shah.onreadystatechange= mahesh;
shah.send(null);
}
);
function mahesh() {
if(shah.readyState==4) {
var el = document.getElementById('bilgi');
el.innerHTML = shah.responseText;
}
}

});
