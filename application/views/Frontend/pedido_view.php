<section id="dishes" class="dishes">
                <div class="container text-center">
                    <header>
                        <h2>Nuestros Platos</h2>
                        <h3>Comida fresca y saludable</h3>
                    
                    <?php
                //mostramos el mensaje de las sesiones flashdata dependiendo
                //de lo que hayamos hecho.
                $agregado = $this->session->flashdata('agregado');
                $destruido = $this->session->flashdata('destruido');
                $platoEliminado = $this->session->flashdata('platoEliminado');
                if ($agregado) {
                    ?>
                    <h3><?= $agregado ?></h3>
                    <?php
                }elseif($destruido)
                {
                    ?>
                    <h3><?= $destruido ?></h3>
                    <?php
                }elseif($platoEliminado)
                {
                    ?>
                    <h3><?= $platoEliminado ?></h3>
                    <?php
                }
                ?>
				</header>
                    <div class="owl-carousel owl-theme">
                    	<!--items-->
                    	<?php foreach ($platos as $plato){?>
                    		<?= form_open(base_url() . 'pedido/agregarPlato') ?>
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
									<?= form_hidden('id', $plato->id); ?>
									<?= form_submit('action', 'Agregar al carrito'); ?>
								</div>
							<?= form_close(); ?>
						<?php }?>
					</div>
                </div>
            </section>
			<?php
            //si el carrito contiene productos los mostramos
            if ($carrito = $this->cart->contents()) {
                ?>
                <div class="grid_5" id="contenidoCarrito">
                    <table>
                       <legend>Carrito de la compra</legend>
                        <tr>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Eliminar</th>
                        </tr>
                    <?php
                    foreach ($carrito as $item) {
                        ?>
                        <tr>
                            <td><?= ucfirst($item['name']) ?></td>
                            <td>
                                <?php
                                $nombres = array('nombre' => ucfirst($item['name']));
                                $precio = array();
                                $precio = $item['price'];
                                ?>
                            </td>
                            <td><?= $item['price'] ?></td>
                            <td><?= $item['qty'] ?></td>
                            <!--creamos el enlace para eliminar el producto
                            pulsado pasando el id del producto-->
                            <td id="eliminar"><?= anchor(base_url().'pedido/eliminarPlato/' . $item['rowid'], 'Eliminar') ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                    <tr id="total">
                        <td><strong>Total:</strong></td>
                        <!--mostramos el total del carrito
                        con $this->cart->total()-->
                        <td colspan="1"><?= $this->cart->total() ?> euros.</td>
                        <!--creamos un enlace para eliminar el carrito-->
                        <td colspan="4" id="eliminarCarrito"><?= anchor(base_url().'pedido/eliminarCarrito', 'Vaciar carrito')?></td>
						<td colspan="4" id="comprar"><?= anchor(base_url().'pedido/comprar', 'Comprar')?></td>
                    </tr>
                </table>
                </div>
            <?php
            }
            ?>
            <!--fin de nuestro carrito-->
        </div>