<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- Dishes Section -->
            <section id="dishes" class="dishes">
                <div class="container text-center">
                    <header>
                        <h2>Nuestros Platos</h2>
                        <h3>Comida fresca y saludable</h3>
                    </header>
                    <!-- Set up your HTML -->
                    <div class="owl-carousel owl-theme">
                    	<!--items-->
                    	<?php foreach ($platos as $plato) {?>
                    		<div class="dish">
                            <div class="profile">
                                <img src="<?=base_url().$plato->foto?>" class="img-responsive" alt="dish name">
                                <div class="price">
                                    <span><?= $plato->precio?>€</span>
                                </div>
                            </div>
                            <div class="text">
                                <h4><?= $plato->nombre?></h4>
                            </div>
                        </div>
                    	<?php }?>
                        
                        
                    </div>
                </div>
            </section>
            <!-- End Dishes Section -->