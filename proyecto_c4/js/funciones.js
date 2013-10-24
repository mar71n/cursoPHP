//cuando declaro una funcion suelta, equivale a window.getEl = function(){ }
//cuando hago una variable suelta, equivale a window.variable

//noten que no uso el tag <script>
//wrapper: envolver
function getEl( el ){
	if( el instanceof HTMLElement ) return el;
	return document.getElementById( el );
}
function getEls( param, tipo ){
	if( !tipo || tipo == 'nombre' ){ 
		return document.getElementsByName( param );
	} else {
		return document.getElementsByTagName( param );
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
	el = getEl( el );
	if( !el ) return; //prevengo que la pifies en el ID
	
	if( !el.className || el.className.indexOf(clase) < 0 ) el.className += ' '+clase;
	return el;
}
function addClassRosana( clase, el ){
	el = getEl( el );
	if( !el ) return; //prevengo que la pifies en el ID
	
	if( !el.className ) el.className = ''; //inicializa la propiedad como un String en el caso de que no existía
	var clases = el.className.split(' '); //split es el explode de javascript, genera un Array desde un String
	if( clases.indexOf(clase) < 0 ) clases.push(clase); // todo array puede agregar elementos al final usando push()
	el.className = clases.join(' '); //join() equivale a implode, genera un String a partir de un Array
	return el;
}

//alert('TENGO QUE CODEAR EL REMOVE CLASS!');
function removeClass( clase, el ){
	el = getEl( el );
	if( !el ) return; //prevengo que la pifies en el ID
	
	//si no tiene ninguna clase O las que tiene no es la que quiero remover me voy
	if( !el.className || el.className.indexOf(clase) < 0 ) return el;
	el.className = el.className.replace( clase, '');
	return el;
}

function removeClassRosana( clase, el ){
	el = getEl( el );
	if( !el ) return; //prevengo que la pifies en el ID
	
	//si no tiene ninguna clase O las que tiene no es la que quiero remover me voy
	if( !el.className ) el.className = ''; //inicializa la propiedad como un String en el caso de que no existía
	var clases = el.className.split(' '); //split es el explode de javascript, genera un Array desde un String
	var i = clases.indexOf(clase);
	if( i < 0 ) return el;
	clases.splice( i, 1 );
	el.className = clases.join(' '); //join() equivale a implode, genera un String a partir de un Array
	return el;
}

function validarVacio( input ){
	if( !input.value ) addClass("error", input )
	else removeClass("error", input )
}

function mismoValor( inputA, inputB ){
	if( getEl( inputA ).value != getEl( inputB ).value ) addClass('error', inputA)
	else removeClass('error', inputA );
}