<?php
include "../menu.php";
$sqlcep="select * from ceps where id_cep='$_POST[id_cep]' ";
$querycep=mysqli_query($conn, $sqlcep);
$cep=mysqli_fetch_assoc($querycep);
//print $sqlcontapagar;
?>

<!-- Body Content Wrapper -->
<div class="ms-content-wrapper">
	<div class="row">
		<div class="col-xl-12 col-md-12">
            <form id="myForm" action="script_cep.php" method="post">
			<input type="hidden" name="cadcep" value="sim" />	
			<div class="ms-panel">
            	<div class="ms-panel-header ms-panel-custome">
               	 	<h6>Dados do Cep</h6>
            	</div>
				
                <div class="ms-panel-body"> 
                    <div class="form-row">
                        <div class="col-md-6 mb-2">
                            <label for="validationCustom0001">Digite o CEP *</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="cep" required>
                            </div>
                        </div>    

                        <div class="col-md-12 mb-12">
                    		<button class="btn btn-primary d-inline w-20" name="submitButton" type="submit">Cadastrar CEP</button>   
                        </div>
					</div>
				</div>
 			</div>
  			</form>
		</div>
	</div>
</div>

<script>
document.getElementById('myForm').addEventListener('submit', function() {
    var submitButton = document.querySelector('button[name="submitButton"]'); 
    submitButton.innerHTML = 'Enviando...';
	submitButton.style.pointerEvents = 'none'; // Desativa a interação com o botão
});

// Espera o DOM estar completamente carregado antes de aplicar a máscara
document.addEventListener('DOMContentLoaded', function() {
	// Aplica a máscara para cep
	IMask(document.querySelector('input[name="cep"]'), {
		mask: '00000-000'
	});
});	
</script>