<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- Gallery Section -->
<section id="gallery" class="gallery">
    <div class="container text-center">
        <header>
            <h2>Nuestra Galería</h2>
            <h3>Descubre nuestra galería de fotos</h3>
        </header>

        <div class="gellery">
            <div class="row">

            	<!-- Item -->
            	<?php foreach ($platos as $plato) {
            		if($plato->id_seccion != 4){
            		?>
            		<div class="col-md-3 col-sm-4 col-xs-6 col-xs-6 col-custom-12">
                    <div class="item">
                        <img src="<?=base_url().$plato->foto?>" alt="image">
                        <a href="<?=base_url().$plato->foto?>" data-lightbox="image-1" data-title="<?=$plato->nombre?>" class="has-border">
                            <span class="icon-search"></span>
                        </a>
                    </div>
                </div>
            	<?php }}?>
            </div>
        </div>
    </div>
</section>
<!-- End Gallery Section -->