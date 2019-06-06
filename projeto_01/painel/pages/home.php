<?php
	$usuariosOnline 	= Painel::listarUsuariosOnline();
	$totalDeVisitas 	= Painel::pegarVisitasTotais();
	$totalDeVisitasHoje = Painel::pegarVisitasHoje();

?>
<div class="box-content w100">
		<h2><i class="fa fa-home"></i> Painel de Controle - <?php echo NOME_EMPRESA;?></h2>

		<div class="box-metricas">
			<div class="box-metrica-single">
				<div class="box-metrica-wraper">
					<h2>Usuários Online</h2>
					<p><?php echo count($usuariosOnline);?></p>
				</div><!--box-metrica-wraper-->
			</div><!--box-metrica-single-->
			<div class="box-metrica-single">
				<div class="box-metrica-wraper">
					<h2>Total de Visitas</h2>
					<p><?php echo $totalDeVisitas;?></p>
				</div><!--box-metrica-wraper-->
			</div><!--box-metrica-single-->
			<div class="box-metrica-single">
				<div class="box-metrica-wraper">
					<h2>Visitas Hoje</h2>
					<p><?php echo $totalDeVisitasHoje;?></p>
				</div><!--box-metrica-wraper-->
			</div><!--box-metrica-single-->
			<div class="clear"></div>
		</div><!--box-metricas-->

</div><!--box-content-->
<div class="box-content">
	<h2><i class="fa fa-rocket"></i>Usuários Online</h2>
	<div class="table-responsive">
<div class="box-content">
<?php 
	foreach ($usuariosOnline as $key => $value) {
				
?>
		<div class="row">
			<div class="col">
				<span>IP :</span><span><?php echo $value['ip'];?></span>
			</div><!--col-->
			<div class="col">
				<span>Última Ação :</span><span><?php echo $value['ultima_acao'];?></span>
			</div><!--col-->
			<div class="clear"></div>
		</div><!--row-->
</div><!--box-content-->
<?php }?>
	</div><!--table-responsive-->
</div><!--box-content-->


