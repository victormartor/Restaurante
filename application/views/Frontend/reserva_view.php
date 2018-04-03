<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>	
				<?php if(!isset($mensaje)){?>
                <section id="reservation-modal" class="reservation-modal">
                    <div class="container">
                        <div class="row">
                            <div class="form-holder col-md-12 text-center">
                                <h2>Registro de Reserva</h2>
                                <h3>Introduce tus datos</h3>							
								
								<form id="booking-form-alternative" method="POST"  action="<?=base_url().'reserva/verify_reserva'?>">
                                <div class="row">
                                    <div class="col-md-10 col-md-push-1">
                                        <div class="row">
                                            <label for="people" class="col-sm-6 unique">Cuantas Personas
                                                <input name="personas" type="number" id="people" min="1" required>
                                            </label>
                                            <label for="date" class="col-sm-6 unique">Fecha
                                                <input name="fecha" type="date" id="date" class="datepicker-here" data-language='en' required>
                                            </label>
                                            <label for="time" class="col-sm-6 unique">Hora
                                                <input name="hora" type="text" id="time" class="timepicker" required>
                                            </label>
                                            <div class="col-sm-12">
                                                <button type="submit" class="btn-unique">Reservar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>	
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