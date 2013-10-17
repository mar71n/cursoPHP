//cuando declaro una funcion suelta, equivale a window.getEl = function(){ }
//cuando hago una variable suelta, equivale a window.variable

//noten que no uso el tag <script>
//wrapper: envolver
function getEl( id ){
	return document.getElementById( id );
}
function getEls( param, tipo ){
	if( !tipo || tipo == 'nombre' ){ 
		return document.getElementsByName( param );
	} else {
		return document.getElementsByTag( param );
	}
}
/*
	Esta función recibe una clase y un elemento o ID
	Si recibió un ID recupera el elemento
	Al elemento le extrae el atributo class=''
	y genera un array separando por espacios para saber a qué clases pertenece
	sino tiene la clase que quiero agregar, la meto en el listadoç
	después vuelvo a unir el listado en base al espacio
*/
function addClass( clase, el ){
	//si me pasaste un String es un ID para ir a buscarlo
	if( el instanceof HTMLElement == false ) el = getEl( el );
	
	//si la variable tiene la propiedad className es un elemento HTML
	if( el instanceof HTMLElement == false ) return; //prevengo que la pifies en el ID
	
	if( !el.className ) el.className = ''; //inicializa la propiedad como un String en el caso de que no existía
	var clases = el.className.split(' '); //split es el explode de javascript, genera un Array desde un String
	if( clases.indexOf(clase) < 0 ) clases.push(clase); // todo array puede agregar elementos al final usando push()
	el.className = clases.join(' '); //join() equivale a implode, genera un String a partir de un Array
	return el;
}

alert('TENGO QUE CODEAR EL REMOVE CLASS!');
function removeClass(){
	
}