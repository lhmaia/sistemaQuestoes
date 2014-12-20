<!-- File: /app/View/Questoes/add.ctp -->

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="/ckeditor/ckeditor.js"></script>
<script src="/ckeditor/adapters/jquery.js"></script>
<script src="/ckfinder/ckfinder.js"></script>
<script>
	$(document).ready(function(){
		//var editor = $("#QuestaoEnunciado").ckeditor();
		var editor = CKEDITOR.replace( 'QuestaoEnunciado' );
		CKFinder.setupCKEditor( editor, '/ckfinder/' );
		$("#QuestaoTipoProvas").change(function(){
			if($("#QuestaoTipoProvas").val() == 0) {
				$("#divAlternativas").show();
			}
			else{
				$("#divAlternativas").hide();
			}
		});
		$("#AdicionaAlternativa").click(function(){
				//$("#divAlternativas").append("<div class='text'>a) <input name='data[Alternativa][texto]' type='text' maxlength='512' id='AlternativaTexto'></input> <select name='data[Alternativa][certo]' id='AlternativaCerto'><option value='0'>Certa</option><option value='1'>Errada</option></select></div>");
				numLetra = $("#divAlternativas :text").length;
				letra = String.fromCharCode(97 + numLetra);
				if (numLetra == 0){
					$("#divAlternativas").append("Alternativa correta: <select name='data[Alternativa][letraCorreta]' id='AlternativaCerto'><option value='0'>a</option></select></div>");
				}
				else{
					$("#AlternativaCerto").append("<option value='" + numLetra + "'>" + letra + "</option>");
				}
				$("#divAlternativas").append("<div class='text'>" + letra + ") <input name='data[Alternativa][texto][]' type='text' maxlength='512' id='AlternativaTexto'></input>");				
				
		});
	});
	
</script>

<h1>Adicionar Questão</h1>
<?php
	echo $this->Form->create('Questao');
	//echo $this->Form->inputs();
	echo $this->Form->input('enunciado', array('rows' => '3'));
	echo $this->Form->input('Assunto', array('type' => 'select'));
	echo $this->Form->input('Autor');
	echo $this->Form->input('dificuldade', array('options' => 
											array('Muito Fácil' => 'Muito Fácil', 'Fácil' => 'Fácil', 
													'Médio' => 'Médio', 'Difícil' => 'Difícil', 
													'Muito Difícil' => 'Muito Difícil')));

	echo $this->Form->input('tipo_provas', array('options' => array('Fechada', 'Aberta'), 'label' => 'Tipo de prova'));
?>
<div id="divAlternativas" class="input button">
	<input type="button" id="AdicionaAlternativa" value="Adicionar alternativa" style="width:250px"></input>
</div>
<?php
	echo $this->Form->input('palavras-chave');
	echo $this->Form->end('Salvar a questão');
?>