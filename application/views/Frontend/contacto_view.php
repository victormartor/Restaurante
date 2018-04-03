<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>	
				<?php if(!isset($mensaje)){?>
                <section id="reservation-modal" class="reservation-modal">
                    <div class="container">
                        <div class="row">
                            <div class="form-holder col-md-12 text-center">
                                <h2>Contacta con Nosotros</h2>
                                <h3>Sientete libre para contactarnos</h3>	
				<?php }else{?>
				<section id="reservation-modal" class="reservation-modal">
                    <div class="container">
                        <div class="row">
                            <div class="form-holder col-md-12 text-center">
                                <h2>Contacta con Nosotros</h2>
                                <h3><?php echo $mensaje ?></h3>
				
				<?php }?>				
								<form id="booking-form-alternative" method="POST"  action="<?=base_url().'contacto/mensajeEnviado'?>">
                                    <div class="row">
										<label for="user-name" class="col-sm-6 unique">Nombre
											<input type="text" name="username" id="user-name" required>
										</label>
										<label for="user-email" class="col-sm-6 unique">Email
											<input type="email" name="useremail" id="user-email" required>
										</label>
										<label for="message" class="col-sm-12 unique">Tu Mensaje
											<textarea name="message" id="message" required></textarea>
										</label>
										<div class="col-sm-12">
											<button type="submit" class="btn-unique" id="submit">Enviar</button>
										</div>
									</div>
                                <?= form_close();?>	
							</div>
                        </div>
                    </div>
                </section>
				<!-- end modal booking form -->