<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<section id="admin" class="admin">
    <div class="container text-center">

    <?php if(isset($reservas)) { ?>
        <header>
            <h2>Reservas</h2>
            <h3>Estas son las reservas realizadas</h3>
        </header>
        <!-- Set up your HTML -->
        <section id="app" class="app">
            <div class="container text-center has-border">

                <table style="width:100%">
                    <tr>
                        <th>Fecha</th>
                        <th>Personas</th>
                        <th>Hora</th>
                        <th>Usuario</th>
                    </tr>
                    <?php foreach ($reservas as $reserva) {?>
                    <tr>
                        <th><?php echo $reserva->fecha ?></th>
                        <th><?php echo $reserva->numPersonas ?></th>
                        <th><?php echo $reserva->hora ?></th>
                        <th><?php echo $reserva->nombre . " " .  $reserva->apellidos ?></th>
                    </tr>
                    <?php } ?>

                </table>
            </div>
        </section>

    <?php } else if(isset($pedidos)) { ?>
        <header>
            <h2>Pedidos</h2>
            <h3>Estos son los pedidos realizados</h3>
        </header>
        <!-- Set up your HTML -->
        <div>
            
        </div>
    <?php } else { ?>
        <header>
            <h2>Administración</h2>
            <h3>Bienvenido al panel de administración</h3>
        </header>
        <!-- Set up your HTML -->
        <div>
        	<ul class="list-unstyled list-inline">
                <li><a href="<?=base_url().'admin/reservas'?>" title="Reservas" class="btn-unique-white">Reservas</a></li>
                <li><a href="<?=base_url().'admin/pedidos'?>" title="Pedidos" class="btn-unique-white">Pedidos</a></li>
            </ul>
        </div>
    <?php } ?>
    </div>
</section>
