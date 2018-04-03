<body>
        <!--cpntenedor principal-->
        <div class="container_12" id="contenedor">
            <!--contenedor de los artículos-->
            <ul class="grid_7" id="subcontenedor">
                <?php
                //mostramos el mensaje de las sesiones flashdata dependiendo
                //de lo que hayamos hecho.
                $agregado = $this->session->flashdata('agregado');
                $destruido = $this->session->flashdata('destruido');
                $platoEliminado = $this->session->flashdata('platoEliminado');
                if ($agregado) {
                    ?>
                    <li class="grid_6" id="productoAgregado"><?= $agregado ?></li>
                    <?php
                }elseif($destruido)
                {
                    ?>
                    <li class="grid_6" id="productoAgregado"><?= $destruido ?></li>
                    <?php
                }elseif($platoEliminado)
                {
                    ?>
                    <li class="grid_6" id="productoAgregado"><?= $platoEliminado ?></li>
                    <?php
                }
                ?>
                <?php
                //sacamos todos los productos del array productos
                foreach ($platos as $plato) {
                    ?>
                    <li id="individual">
                        <?php
                        //para cada producto creamos un formulario que apuntará a la función
                        //agregarProducto del controlador catalogo para insertarlo en la cesta
                        ?>
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
                        <?= form_hidden('id', $plato->id) ?>
                        <?= form_submit('action', 'Agregar al carrito') ?>
                        <?= form_close() ?>
                        <?php
                    }
                    ?>
                </li>
            </ul>
 
            <!--fin del contenedor de los articulos-->
 
            <!--mostramos el contenido de nuestro carrito-->
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
                            pulsado pasando el rowid del producto-->
                            <td id="eliminar"><?= anchor('../pedido/eliminarProducto/' . $item['rowid'], 'Eliminar') ?></td>
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
                        <td colspan="4" id="eliminarCarrito"><?= anchor('../pedido/eliminarCarrito', 'Vaciar carrito')?></td>
                    </tr>
                </table>
                </div>
            <?php
            }
            ?>
            <!--fin de nuestro carrito-->
        </div>
        <!--fin del contenedor principal-->
    </body>