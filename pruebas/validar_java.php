<html>
<head>
    <script type="text/javascript">
    function salio(){
        //alert("hola");
     }
     
    function validar_chk(){
        opciones = document.getElementsByName("746415X8X53");
        var seleccionado = false;
        for(var i=0; i<opciones.length; i++) {    
          if(opciones[i].checked) {
            seleccionado = true;
            alert("ok");
            break;
          }
        }
        if(!seleccionado) {
          alert("marque alguna opcion");
        }
        return seleccionado;
    }
    </script>
</head>
<body>
<form onsubmit="return validar_chk()">

    <ul class="answers-list radio-list">

        <li id='javatbdchk746415X8X1' class='answer-item radio-item'>
        
            <input class="radio" type="radio" value="1" name="chk746415X8X" id="answerchk746415X8X1" />
            <label for="answerchk746415X8X1" class="answertext">menos de 1 año</label>
                </li>

        <li id='javatbdchk746415X8X2' class='answer-item radio-item'>
        
            <input class="radio" type="radio" value="2" name="chk746415X8X" id="answerchk746415X8X2" />
            <label for="answerchk746415X8X2" class="answertext">más de 1 año y hasta 5 años</label>
                </li>

        <li id='javatbdchk746415X8X3' class='answer-item radio-item'>
        
            <input class="radio" type="radio" value="3" name="chk746415X8X" id="answerchk746415X8X3" />
            <label for="answerchk746415X8X3" class="answertext">más de 5 años y hasta 10 años</label>
                </li>

        <li id='javatbdchk746415X8X4' class='answer-item radio-item'>
        
            <input class="radio" type="radio" value="4" name="chk746415X8X" id="answerchk746415X8X4" />
            <label for="answerchk746415X8X4" class="answertext">más de 10 años</label>
                </li>
    </ul>


    <ul class="answers-list radio-list">

        <li id='javatbd746415X8X531' class='answer-item radio-item'>
        
            <input class="radio" type="radio" value="1" name="746415X8X53" id="answer746415X8X531" />
            <label for="answer746415X8X531" class="answertext">menos de 1 año</label>
                </li>

        <li id='javatbd746415X8X532' class='answer-item radio-item'>
        
            <input class="radio" type="radio" value="2" name="746415X8X53" id="answer746415X8X532" />
            <label for="answer746415X8X532" class="answertext">más de 1 año y hasta 5 años</label>
                </li>

        <li id='javatbd746415X8X533' class='answer-item radio-item'>
        
            <input class="radio" type="radio" value="3" name="746415X8X53" id="answer746415X8X533" />
            <label for="answer746415X8X533" class="answertext">más de 5 años y hasta 10 años</label>
                </li>

        <li id='javatbd746415X8X534' class='answer-item radio-item'>
        
            <input class="radio" type="radio" value="4" name="746415X8X53" id="answer746415X8X534" />
            <label for="answer746415X8X534" class="answertext">más de 10 años</label>
                </li>
    </ul>



    <input type="submit" >
</form>
</body>
</tml>
