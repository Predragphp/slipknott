////////////////////////////////////
//Definicija slika
var niz=[];
niz[0]="slika0.jpg";
niz[1]="slika1.jpg";
niz[2]="slika2.jpg";
niz[3]="slika3.jpg";

/////////////////////////
//Korisnicki deo
var vremePromene=3;
var folderZaSlike="slikeslajder";
var pozadinskaBoja="black";
var visina="315px";
var sirina="560px";
var visinaSlike="315px";
var sirinaSlike="560px";
var imaNavigacije=false;
var timer=false;
////////////////////////////////////////
////////////////////////////////////////
var glavni=document.getElementById("mojSlajder");
glavni.style.backgroundColor=pozadinskaBoja;
glavni.style.width=sirina;
glavni.style.height=visina;
glavni.style.textAlign="center";
var slika=document.createElement("img");
var tekuca=0;
var adiv;
slika.id="mojaSlika";
slika.style.width=sirinaSlike;
slika.style.height=visinaSlike;
slika.alt="Nema slike";
slika.src=folderZaSlike+"/"+niz[tekuca++];
glavni.appendChild(slika);
glavni.appendChild(document.createElement("br"));
for(var i=0;i<niz.length;i++)
{
	adiv=document.createElement("img");
	adiv.style.cssText="height:20px;width:20px;background-color:red; margin:5px 5px 5px 5px";
	//adiv.innerHTML=i;
	adiv.src=folderZaSlike+"/"+niz[0+i];
	adiv.alt=i;
	adiv.onclick=function(){
		
		tekuca=parseInt(this.alt);
		promeniSliku();
	};
	glavni.appendChild(adiv);
	
	
}

if(imaNavigacije)
{
	var navigacijaPre=document.createElement("div");
	navigacijaPre.cssText="background-color:red; width:200px;height:20px";
	navigacijaPre.innerHTML="Prethodna slika";
	navigacijaPre.onclick=function(){tekuca-=2;promeniSliku()};
	navigacijaPre.onmouseover=function(){
		this.style.backgroundColor="red";
	};
	navigacijaPre.onmouseleave=function(){
		this.style.backgroundColor="gray";
	};
	glavni.appendChild(navigacijaPre);
}


function promeniSliku()
{
	var a=document.getElementById("mojaSlika");
	if(tekuca>niz.length-1)tekuca=0;
	if(tekuca<0)tekuca=niz.length-1;
	a.src=folderZaSlike+"/"+niz[tekuca++];
}

if(timer==true)
{
		var timer=setInterval("promeniSliku()", vremePromene*1000);
}