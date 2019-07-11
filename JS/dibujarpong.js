var tamPanY = 420;
var tamPalX = 20;
var tamPalY = 100;
var canvas = document.getElementById("canvas");
var tamPanX = canvas.width;
var tamPanY = canvas.height;
var ctx = canvas.getContext("2d");

class Puntos {
	
	constructor(x){
		this.x = x;
		this.y = 25;
		this.punto = 0;
	}
	
	dibujar(){
		ctx.font = "25px Arial";
		ctx.fillText(this.punto.toString(), this.x, this.y);
	}
}

class Bola {
	constructor(){
		this.t = 25;
		this.x = 400;//Este valor lo saca de la base de datos
		this.y = 200;//Este valor lo saca de la base de datos
		this.p1 = new Puntos(40);
		this.p2 = new Puntos(780);
	}
	
	dibujar(){

		ctx.fillRect(this.x, this.y, this.t, this.t);
		this.p1.dibujar();
		this.p2.dibujar();
	}
}

class Paleta {
	constructor(x){
		this.x = x;
		this.w = tamPalX;
		this.h = tamPalY;
	}

	dibujar(){
		this.y = 200;//Este valor lo saca de la base de datos
		ctx.fillRect(this.x,this.y,this.w,this.h);
	}
}

var bola = new Bola();
var jugador1 = new Paleta(20);
var jugador2 = new Paleta(800);

function iniciar(){

	var modal = document.getElementById("modal");
	modal.style.display = "none";
	frame();
}

function dibujar(){
	ctx.clearRect(0,0,tamPanX, tamPanY);
	bola.dibujar();
	jugador1.dibujar();
	jugador2.dibujar();
	
}

function frame(){
	dibujar();
	bucle = requestAnimationFrame(frame);
}