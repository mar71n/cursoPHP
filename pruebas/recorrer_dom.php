<html>
<head>

<script>
 // $(document).ready(function(){
function tocarDom(){
    // foco en id=answer746415X24X235
    document.getElementById('answer746415X24X235').focus();

    // elimino un <li>
    var radio = document.getElementById('answer746415X25X239NANS');
    var litem = radio.parentNode;
    litem.parentNode.removeChild(litem);
    
    
    // elimino los radio de una columna
    var titulo = document.getElementById("question240").getElementsByTagName("th")[5]
    titulo.parentNode.removeChild(titulo);
    
    var radio = document.getElementById("answer746415X25X2401-");
    var litem = radio.parentNode;
    litem.parentNode.removeChild(litem);

    var radio = document.getElementById("answer746415X25X2402-");
    var litem = radio.parentNode;
    litem.parentNode.removeChild(litem);

    var radio = document.getElementById("answer746415X25X2403-");
    var litem = radio.parentNode;
    litem.parentNode.removeChild(litem);
    
    var radio = document.getElementById("answer746415X25X2404-");
    var litem = radio.parentNode;
    litem.parentNode.removeChild(litem);

 }
</script>

</head>
<body onload="tocarDom();">


 <!--

 PRESENT THE QUESTIONS 

-->
<div id="question239" class="list-radio">

    <table class="question-wrapper">
        <tbody>
            <tr> … </tr>
            <tr>
                <td class="answer">
                    <ul class="answers-list radio-list">
                        <li id="javatbd746415X25X2391" class="answer-item radio-item">
                            <input id="answer746415X25X2391" class="radio" type="radio" onclick="if (document.getElementById('answer746415X25X239othertext') != null) document.getElementById('answer746415X25X239othertext').value='';checkconditions(this.value, this.name, this.type)" name="746415X25X239" value="1"></input>
                            <label class="answertext" for="answer746415X25X2391">

                                menos de 1 año

                            </label>
                        </li>
                        <li id="javatbd746415X25X2392" class="answer-item radio-item">
                            <input id="answer746415X25X2392" class="radio" type="radio" onclick="if (document.getElementById('answer746415X25X239othertext') != null) document.getElementById('answer746415X25X239othertext').value='';checkconditions(this.value, this.name, this.type)" name="746415X25X239" value="2"></input>
                            <label class="answertext" for="answer746415X25X2392">

                                más de 1 año y hasta 5 años

                            </label>
                        </li>
                        <li id="javatbd746415X25X2393" class="answer-item radio-item">
                            <input id="answer746415X25X2393" class="radio" type="radio" onclick="if (document.getElementById('answer746415X25X239othertext') != null) document.getElementById('answer746415X25X239othertext').value='';checkconditions(this.value, this.name, this.type)" name="746415X25X239" value="3"></input>
                            <label class="answertext" for="answer746415X25X2393">

                                más de 5 años y hasta 10 años

                            </label>
                        </li>
                        <li id="javatbd746415X25X2394" class="answer-item radio-item">
                            <input id="answer746415X25X2394" class="radio" type="radio" onclick="if (document.getElementById('answer746415X25X239othertext') != null) document.getElementById('answer746415X25X239othertext').value='';checkconditions(this.value, this.name, this.type)" name="746415X25X239" value="4"></input>
                            <label class="answertext" for="answer746415X25X2394">

                                más de 10 años

                            </label>
                        </li>
                        <li class="answer-item radio-item noanswer-item">
                            <input id="answer746415X25X239NANS" class="radio" type="radio" onclick="if (document.getElementById('answer746415X25X239othertext') != null) document.getElementById('answer746415X25X239othertext').value='';checkconditions(this.value, this.name, this.type)" value="" name="746415X25X239"></input>
                            <label class="answertext" for="answer746415X25X239NANS">

                                Sin respuesta

                            </label>
                        </li>
                    </ul>
                    <input id="java746415X25X239" type="hidden" value="" name="java746415X25X239"></input>
                </td>
            </tr>
            <tr> … </tr>
        </tbody>
    </table>
    
</div>

<div class="array-flexible-row" id="question240">
    <table class="question-wrapper">
        <tbody><tr>
            <td class="questiontext">
                <span class="asterisk"></span><span class="qnumcode">  </span><p align="JUSTIFY" lang="es-ES" style="margin-left: 0.64cm; text-indent: -0.64cm; margin-bottom: 0cm">
	<font face="Tahoma, sans-serif"><font size="2">P3 Indique cuál ha sido la evolución de los siguientes indicadores durante 2013 con relación al año previo.&nbsp;</font></font></p>
<br><span class="questionhelp"></span>
                
                <span id="vmsg_240" class="questionhelp"></span>
                
            </td>
        </tr>
        <tr>
            <td class="answer">
                
<table summary="
	P3 Indique cuál ha sido la evolución de los siguientes indicadores durante 2013 con relación al año previo.&nbsp;
 - an array type question" class="question subquestions-list questions-list ">
	<colgroup class="col-responses">
	<col width="20%" class="col-answers">
<col width="13.3%" class="odd">
<col width="13.3%" class="even">
<col width="13.3%" class="odd">
<col width="13.3%" class="even">
<col width="13.3%" class="odd">
<col width="13.3%" class="col-no-answer even">
	</colgroup>
	<thead><tr>
	<td>&nbsp;</td>
	<th>Aumentaron mucho o bastante</th>
	<th>Aumentaron poco</th>
	<th>Se mantuvieron estables</th>
	<th>Disminuyeron poco </th>
	<th>Disminuyeron mucho o bastante </th>
	<th>Sin respuesta</th>
</tr></thead>
	
<tbody>

	<tr class="array2 answers-list radio-list" id="javatbd746415X25X2401">
	<th class="answertext">
Ventas (en unidades físicas)<input type="hidden" value="" id="java746415X25X2401" name="java746415X25X2401">
	</th>
			<td class="answer_cell_00A1 answer-item radio-item">
<label for="answer746415X25X2401-A1">
	<input type="radio" onclick="checkconditions(this.value, this.name, this.type)" title="Aumentaron mucho o bastante" id="answer746415X25X2401-A1" value="A1" name="746415X25X2401" class="radio">
</label>
	</td>
			<td class="answer_cell_00A2 answer-item radio-item">
<label for="answer746415X25X2401-A2">
	<input type="radio" onclick="checkconditions(this.value, this.name, this.type)" title="Aumentaron poco" id="answer746415X25X2401-A2" value="A2" name="746415X25X2401" class="radio">
</label>
	</td>
			<td class="answer_cell_00A3 answer-item radio-item">
<label for="answer746415X25X2401-A3">
	<input type="radio" onclick="checkconditions(this.value, this.name, this.type)" title="Se mantuvieron estables" id="answer746415X25X2401-A3" value="A3" name="746415X25X2401" class="radio">
</label>
	</td>
			<td class="answer_cell_00A4 answer-item radio-item">
<label for="answer746415X25X2401-A4">
	<input type="radio" onclick="checkconditions(this.value, this.name, this.type)" title="Disminuyeron poco " id="answer746415X25X2401-A4" value="A4" name="746415X25X2401" class="radio">
</label>
	</td>
			<td class="answer_cell_00A5 answer-item radio-item">
<label for="answer746415X25X2401-A5">
	<input type="radio" onclick="checkconditions(this.value, this.name, this.type)" title="Disminuyeron mucho o bastante " id="answer746415X25X2401-A5" value="A5" name="746415X25X2401" class="radio">
</label>
	</td>
	<td class="answer-item radio-item noanswer-item">
<label for="answer746415X25X2401-">
	<input type="radio" onclick="checkconditions(this.value, this.name, this.type)" title="Sin respuesta" id="answer746415X25X2401-" value="" name="746415X25X2401" class="radio">
</label>
	</td>
</tr>


	<tr class="array1 answers-list radio-list" id="javatbd746415X25X2402">
	<th class="answertext">
Facturación <input type="hidden" value="" id="java746415X25X2402" name="java746415X25X2402">
	</th>
			<td class="answer_cell_00A1 answer-item radio-item">
<label for="answer746415X25X2402-A1">
	<input type="radio" onclick="checkconditions(this.value, this.name, this.type)" title="Aumentaron mucho o bastante" id="answer746415X25X2402-A1" value="A1" name="746415X25X2402" class="radio">
</label>
	</td>
			<td class="answer_cell_00A2 answer-item radio-item">
<label for="answer746415X25X2402-A2">
	<input type="radio" onclick="checkconditions(this.value, this.name, this.type)" title="Aumentaron poco" id="answer746415X25X2402-A2" value="A2" name="746415X25X2402" class="radio">
</label>
	</td>
			<td class="answer_cell_00A3 answer-item radio-item">
<label for="answer746415X25X2402-A3">
	<input type="radio" onclick="checkconditions(this.value, this.name, this.type)" title="Se mantuvieron estables" id="answer746415X25X2402-A3" value="A3" name="746415X25X2402" class="radio">
</label>
	</td>
			<td class="answer_cell_00A4 answer-item radio-item">
<label for="answer746415X25X2402-A4">
	<input type="radio" onclick="checkconditions(this.value, this.name, this.type)" title="Disminuyeron poco " id="answer746415X25X2402-A4" value="A4" name="746415X25X2402" class="radio">
</label>
	</td>
			<td class="answer_cell_00A5 answer-item radio-item">
<label for="answer746415X25X2402-A5">
	<input type="radio" onclick="checkconditions(this.value, this.name, this.type)" title="Disminuyeron mucho o bastante " id="answer746415X25X2402-A5" value="A5" name="746415X25X2402" class="radio">
</label>
	</td>
	<td class="answer-item radio-item noanswer-item">
<label for="answer746415X25X2402-">
	<input type="radio" onclick="checkconditions(this.value, this.name, this.type)" title="Sin respuesta" id="answer746415X25X2402-" value="" name="746415X25X2402" class="radio">
</label>
	</td>
</tr>


	<tr class="array2 answers-list radio-list" id="javatbd746415X25X2403">
	<th class="answertext">
Margen comercial de los productos<input type="hidden" value="" id="java746415X25X2403" name="java746415X25X2403">
	</th>
			<td class="answer_cell_00A1 answer-item radio-item">
<label for="answer746415X25X2403-A1">
	<input type="radio" onclick="checkconditions(this.value, this.name, this.type)" title="Aumentaron mucho o bastante" id="answer746415X25X2403-A1" value="A1" name="746415X25X2403" class="radio">
</label>
	</td>
			<td class="answer_cell_00A2 answer-item radio-item">
<label for="answer746415X25X2403-A2">
	<input type="radio" onclick="checkconditions(this.value, this.name, this.type)" title="Aumentaron poco" id="answer746415X25X2403-A2" value="A2" name="746415X25X2403" class="radio">
</label>
	</td>
			<td class="answer_cell_00A3 answer-item radio-item">
<label for="answer746415X25X2403-A3">
	<input type="radio" onclick="checkconditions(this.value, this.name, this.type)" title="Se mantuvieron estables" id="answer746415X25X2403-A3" value="A3" name="746415X25X2403" class="radio">
</label>
	</td>
			<td class="answer_cell_00A4 answer-item radio-item">
<label for="answer746415X25X2403-A4">
	<input type="radio" onclick="checkconditions(this.value, this.name, this.type)" title="Disminuyeron poco " id="answer746415X25X2403-A4" value="A4" name="746415X25X2403" class="radio">
</label>
	</td>
			<td class="answer_cell_00A5 answer-item radio-item">
<label for="answer746415X25X2403-A5">
	<input type="radio" onclick="checkconditions(this.value, this.name, this.type)" title="Disminuyeron mucho o bastante " id="answer746415X25X2403-A5" value="A5" name="746415X25X2403" class="radio">
</label>
	</td>
	<td class="answer-item radio-item noanswer-item">
<label for="answer746415X25X2403-">
	<input type="radio" onclick="checkconditions(this.value, this.name, this.type)" title="Sin respuesta" id="answer746415X25X2403-" value="" name="746415X25X2403" class="radio">
</label>
	</td>
</tr>


	<tr class="array1 answers-list radio-list" id="javatbd746415X25X2404">
	<th class="answertext">
Cantidad de empleados en su local <input type="hidden" value="" id="java746415X25X2404" name="java746415X25X2404">
	</th>
			<td class="answer_cell_00A1 answer-item radio-item">
<label for="answer746415X25X2404-A1">
	<input type="radio" onclick="checkconditions(this.value, this.name, this.type)" title="Aumentaron mucho o bastante" id="answer746415X25X2404-A1" value="A1" name="746415X25X2404" class="radio">
</label>
	</td>
			<td class="answer_cell_00A2 answer-item radio-item">
<label for="answer746415X25X2404-A2">
	<input type="radio" onclick="checkconditions(this.value, this.name, this.type)" title="Aumentaron poco" id="answer746415X25X2404-A2" value="A2" name="746415X25X2404" class="radio">
</label>
	</td>
			<td class="answer_cell_00A3 answer-item radio-item">
<label for="answer746415X25X2404-A3">
	<input type="radio" onclick="checkconditions(this.value, this.name, this.type)" title="Se mantuvieron estables" id="answer746415X25X2404-A3" value="A3" name="746415X25X2404" class="radio">
</label>
	</td>
			<td class="answer_cell_00A4 answer-item radio-item">
<label for="answer746415X25X2404-A4">
	<input type="radio" onclick="checkconditions(this.value, this.name, this.type)" title="Disminuyeron poco " id="answer746415X25X2404-A4" value="A4" name="746415X25X2404" class="radio">
</label>
	</td>
			<td class="answer_cell_00A5 answer-item radio-item">
<label for="answer746415X25X2404-A5">
	<input type="radio" onclick="checkconditions(this.value, this.name, this.type)" title="Disminuyeron mucho o bastante " id="answer746415X25X2404-A5" value="A5" name="746415X25X2404" class="radio">
</label>
	</td>
	<td class="answer-item radio-item noanswer-item">
<label for="answer746415X25X2404-">
	<input type="radio" onclick="checkconditions(this.value, this.name, this.type)" title="Sin respuesta" id="answer746415X25X2404-" value="" name="746415X25X2404" class="radio">
</label>
	</td>
</tr>
</tbody>
</table>

            </td>
        </tr>
        <tr>
            <td class="survey-question-help">
                
            </td>
        </tr>
    </tbody>
</table>
</div>

<div>
<div id="question235" class="text-short mandatory">
    <table class="question-wrapper" border="1">
        <tbody><tr>
            <td class="questiontext">
                <span class="asterisk">*</span><span class="qnumcode">  </span><p align="LEFT" lang="es-ES" style="margin-bottom: 0cm">
	<font face="Tahoma, sans-serif"><font style="font-size: 8pt"><font size="2"><span lang="es"><b>A1 Calle</b></span></font></font></font></p>
<script type="text/javascript">
    $(function(){
        traerCalles746415X24X235();
        traerAlturas746415X24X236();
    });
</script><br><span class="questionhelp"></span>
                
                <span class="questionhelp" id="vmsg_235"></span>
                
            </td>
        </tr>
        <tr>
            <td class="answer">
                <p class="question answer-item text-item ">
<label for="answer746415X24X235" class="hide label">Opción</label>	<input class="text  empty ui-autocomplete-input" type="text" size="50" name="746415X24X235" id="answer746415X24X235" value="" onkeyup="checkconditions(this.value, this.name, this.type)" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true">
	
</p>

            </td>
        </tr>
        <tr>
            <td class="survey-question-help">
                <br>

            </td>
        </tr>
    </tbody></table>
</div> 
<div id="question236" class="text-short mandatory"> 
    <table class="question-wrapper" border="1">
        <tbody><tr>
            <td class="questiontext">
                <span class="asterisk">*</span><span class="qnumcode">  </span><p lang="es-ES" style="margin-bottom: 0cm">
	<font color="#808080"><font face="Tahoma, sans-serif"><font size="1"><font color="#000000"><font size="2"><span lang="es"><b>A2 Altura</b></span></font></font></font></font></font></p>
<br><span class="questionhelp"></span>
                
                <span class="questionhelp" id="vmsg_236"></span>
                
            </td>
        </tr>
        <tr>
            <td class="answer">
                <p class="question answer-item text-item  maxchars maxchars-6">
<label for="answer746415X24X236" class="hide label">Opción</label>	<input class="text  empty" type="text" size="50" name="746415X24X236" id="answer746415X24X236" value="" maxlength="6" onkeyup="checkconditions(this.value, this.name, this.type)">
	
</p>

            </td>
        </tr>
        <tr>
            <td class="survey-question-help">
                <br>

            </td>
        </tr>
    </tbody></table>
</div>
</div>

</body>
</html>
