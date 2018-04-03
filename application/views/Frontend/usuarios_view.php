<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>	
				<?php if(!isset($mensaje)){?>
                <section id="reservation-modal" class="reservation-modal">
                    <div class="container">
                        <div class="row">
                            <div class="form-holder col-md-12 text-center">
                                <h2>Registro de Usuario</h2>
                                <h3>Introduce tus datos</h3>							
								
								<form id="booking-form-alternative" method="POST"  action="<?=base_url().'usuarios/verify_registro'?>">
                                    <div class="row">
                                        <div class="col-md-push-1 col-sm-10">
                                            <div class="row">
                                                <label for="cname" class="col-sm-6 unique">Nombre
                                                    <input name="nombre" type="text" id="cname" required>
                                                </label>
                                                <label for="cemail" class="col-sm-6 unique">Email
                                                    <input name="correo" type="email" id="cemail" required>
                                                </label>
                                                <label for="cnumber" class="col-sm-6 unique">Apellidos
                                                    <input name="apellidos" type="text" id="cname" required>
                                                </label>
                                                <label for="cnumber" class="col-sm-6 unique">Dirección
                                                    <input name="direccion" type="text" id="cname" required>
                                                </label>
                                                <label for="cnumber" class="col-sm-6 unique">Usuario
                                                    <input name="usuario" type="text" id="cname" required>
                                                </label>
                                                <label for="cnumber" class="col-sm-6 unique">Contraseña
                                                    <input name="contraseña" type="password" id="cname" required>
                                                </label>
												<label for="cnumber" class="col-sm-6 unique">Confirmación Contraseña
                                                    <input name="confirmacioncontraseña" type="password" id="cname" required>
                                                </label>
                                                <div class="col-sm-12">
                                                    <button type="submit" class="btn-unique">Registrar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?= form_close();?>	
							</div>
                        </div>
                    </div>
                </section>
				<!-- end modal booking form -->
				<?php }else{?>
					<section id="reservation-modal" class="reservation-modal">
                    <div class="container">
                        <div class="row">
                            <div class="form-holder col-md-12 text-center">
                                <h2><?php echo $mensaje ?></h2>
							</div>
						</div>
					</div>
				</section>
				<?php }?>