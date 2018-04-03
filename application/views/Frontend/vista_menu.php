<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- Menu Section -->
<section id="menu" class="menu">
	<div class="container">
		<header class="text-center">
			<h2>Nuestro Menú</h2>
		</header>

		<div class="menu">
			<!-- Tabs Navigatin -->
			<ul class="nav nav-tabs text-center has-border" role="tablist">
				<?php foreach($secciones as $fila):
					echo("<li role=\"presentation\"> <a href='#".$fila->nombre."' aria-control='".$fila->nombre."' role=\"tab\" data-toggle=\"tab\">".$fila->nombre."</a></li>"); 
				endforeach;?>
			</ul>
			<!-- Tab panes -->
			<div class="tab-content">
				<!-- Entrantes Panel -->
				<div role="tabpanel" class="tab-pane fade" id="Entrantes">
					<div class="row">
					<?php foreach($platos as $fila2):?>
						<!-- item -->
						<?php if($fila2->id_seccion == 1){?>
						<div class="col-sm-6">
							<div class="menu-item recommended has-border clearfix">
								<div class="item-details pull-left">
									<?php echo "<h5>".$fila2->nombre."</h5>"?>
								</div>
								<div class="item-price pull-right">
									<strong class="text-large text-primary"><?php echo $fila2->precio ?>€</strong>
								</div>
							</div>
						
						</div>
						<?php }?>
					<?php endforeach; ?>
					</div>
				</div>
				<!-- Platos Principales -->
				
				<div role="tabpanel" class="tab-pane fade" id="Principales">
					<div class="row">
					<?php foreach($platos as $fila2):?>
						<!-- item -->
						<?php if($fila2->id_seccion == 2){?>
						<div class="col-sm-6">
							<div class="menu-item recommended has-border clearfix">
								<div class="item-details pull-left">
									<?php echo "<h5>".$fila2->nombre."</h5>"?>
								</div>
								<div class="item-price pull-right">
									<strong class="text-large text-primary"><?php echo $fila2->precio ?>€</strong>
								</div>
							</div>
						</div>
						<?php }?>
					<?php endforeach;?>
					</div>
				</div>
				
				
				<!-- Postres -->
				
				<div role="tabpanel" class="tab-pane fade" id="Postres">
					<div class="row">
					<?php foreach($platos as $fila2):?>
						<!-- item -->
						<?php if($fila2->id_seccion == 3){?>
						<div class="col-sm-6">
							<div class="menu-item recommended has-border clearfix">
								<div class="item-details pull-left">
									<?php echo "<h5>".$fila2->nombre."</h5>"?>
								</div>
								<div class="item-price pull-right">
									<strong class="text-large text-primary"><?php echo $fila2->precio ?>€</strong>
								</div>
							</div>
						</div>
						<?php }?>
					<?php endforeach;?>
					</div>
				</div>
			
				
				<!-- Bebidas -->
				
				<div role="tabpanel" class="tab-pane fade" id="Bebidas">
					<div class="row">
					<?php foreach($platos as $fila2):?>
						<!-- item -->
						<?php if($fila2->id_seccion == 4){?>
						<div class="col-sm-6">
							<div class="menu-item recommended has-border clearfix">
								<div class="item-details pull-left">
									<?php echo "<h5>".$fila2->nombre."</h5>"?>
								</div>
								<div class="item-price pull-right">
									<strong class="text-large text-primary"><?php echo $fila2->precio ?>€</strong>
								</div>
							</div>
						</div>
						<?php }?>
					<?php endforeach;?>
					</div>
				</div>
				
				
			</div>
		</div>
	</div>
</section>
<!-- End Menu Section -->
