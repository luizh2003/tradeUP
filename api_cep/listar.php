<?php 
include_once "../menu.php";
//lista todos os ceps
$sqlcep="select * from ceps where valido='s' ";
//aqui e para o filtro ai pega o cep selecionado
if(!empty($_POST['filtrocep'])) $sqlcep.=" AND id_cep='$_POST[filtrocep]' ";
$querycep=mysqli_query($conn, $sqlcep);
?>

<!-- Body Content Wrapper -->
<div class="ms-content-wrapper">
    <div class="row">
        <div class="col-xl-12 col-md-12">
            <div class="ms-panel">
                <div class="ms-panel-header ms-panel-custome">
                    <h6>Visualizar Ceps</h6>
                    <!--<a href="../doctor-list.html" class="ms-text-primary">Doctors List</a>-->
                </div>
    
                <div class="ms-panel-body">  
                    <form action="" method="post">
                    <div class="form-row">
                        <div class="col-md-6 mb-2">
                            <label for="validationCustom0001">Filtro por CEP*</label>
                            <div class="input-group">
                                <select name="filtrocep" class="selectcep form-control" onchange="this.form.submit();">
                                    <option value=""><?php if(empty($_POST['filtrocep'])) echo 'Selecione'; else echo 'Sem Filtro';?></option>
                                    <?php
                                    //aqui e somente para pegar o nome dos ceps
                                    $sqlcepfiltro="select * from ceps where valido='s' ";
                                    $querycepfiltro=mysqli_query($conn, $sqlcepfiltro);
                                    while($cepfiltro=mysqli_fetch_assoc($querycepfiltro))
                                    {
                                    ?>
                                        <option value="<?php echo $cepfiltro['id_cep'];?>" 
                                        <?php if($cepfiltro['id_cep']==$_POST['filtrocep']) echo "selected";?>>
                                        <?php echo $cepfiltro['cep'];?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                     </div>   
                     </form>
                     <hr />
                 
                     
                    <?php
					if(mysqli_num_rows($querycep)>0)
					{
					?>  
                        <div class="table-responsive">
                        <table class="table table-striped thead-primary">
                            <thead>
                                 <tr class="text-center">
                                    <th scope="col">CEP</th>             <!-- Código do CEP -->
                                    <th scope="col">Logradouro</th>      <!-- Nome da rua ou avenida -->
                                    <th scope="col">Complemento</th>     <!-- Complemento do endereço -->
                                    <th scope="col">Unidade</th>         <!-- Número da unidade (se houver) -->
                                    <th scope="col">Bairro</th>          <!-- Nome do bairro -->
                                    <th scope="col">Localidade</th>      <!-- Nome da cidade -->
                                    <th scope="col">UF</th>              <!-- Sigla da unidade federativa (estado) -->
                                    <th scope="col">Estado</th>          <!-- Nome completo do estado -->
                                    <th scope="col">Região</th>          <!-- Região geográfica (ex.: Sudeste) -->
                                    <th scope="col">IBGE</th>            <!-- Código do município (IBGE) -->
                                    <th scope="col">GIA</th>             <!-- Código GIA (opcional) -->
                                    <th scope="col">DDD</th>             <!-- Código DDD da cidade -->
                                    <th scope="col">SIAFI</th>           <!-- Código SIAFI (opcional) -->
                                    <th scope="col">Ações</th>           <!-- Ações para editar ou excluir -->
                                </tr>
                            </thead> 
                            <?php
                            foreach($querycep as $ceplist)
                            {
                            ?>
                                <tr class="text-center">
                                    <td><?php echo $ceplist['cep'];?></td>
                                    <td><?php echo $ceplist['logradouro'];?></td>
                                    <td><?php echo $ceplist['complemento'];?></td>
                                    <td><?php echo $ceplist['unidade'];?></td>
                                    <td><?php echo $ceplist['bairro'];?></td>
                                    <td><?php echo $ceplist['localidade'];?></td>
                                    <td><?php echo $ceplist['uf'];?></td>
                                    <td><?php echo $ceplist['estado'];?></td>
                                    <td><?php echo $ceplist['regiao'];?></td>
                                    <td><?php echo $ceplist['ibge'];?></td>
                                    <td><?php echo $ceplist['gia'];?></td>
                                    <td><?php echo $ceplist['ddd'];?></td>
                                    <td><?php echo $ceplist['siafi'];?></td>
                                   	<td> <a href="#" id="<?php echo $ceplist['id_cep'];?>" class="excluirCep">
                                    <i class="far fa-trash-alt ms-text-danger"></i></a>
                                    </td> 
                                </tr> 
                            <?php
                            }
                            ?>           
                        </table>
                 		</div>
                 	<?php
					}else echo "<div class='alert alert-danger text-center' role='alert'>Nenhum registro encontrado!</div>";
					?>
                </div>
     		</div>
     	</div>
	</div>
</div>

<script>
/*aqui excluri o cep do loopin*/
$(document).ready(function(){
	/*aqui exclui a conta que ele aperta la em cima na lsitagem do loopin*/
	$(document).on('click', '.excluirCep', function(e) {
		e.preventDefault(); // Impede o comportamento padrão do link
		var id_cep = $(this).attr("id");
		// Cria um formulário HTML dinamicamente
		var form = $('<form action="script_cep.php" method="post"></form>');
		// Adiciona os campos ao formulário
		form.append('<input type="hidden" name="excluir_cep" value="sim">');
		form.append('<input type="hidden" name="id_cep" value="' + id_cep + '">');
		$('body').append(form);
		form.submit();
	});
});	
</script>

<script>
    // Inicia o Select2
    $(document).ready(function() {
        $('.selectcep').select2();
    });
</script>