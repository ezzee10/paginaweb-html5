<?php include_once 'includes/templates/header.php'; ?>


<section class="seccion contenedor-seccion">
    <h2>Calendario de Eventos</h2>

    <?php

    try {
        require_once('includes/funciones/bd_conexion.php');
        $sql = " SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
        $sql .= " FROM eventos";
        $sql .= " INNER JOIN categoria_evento ";
        $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
        $sql .= " INNER JOIN invitados";
        $sql .= " ON eventos.id_inv = invitados.invitado_id";
        $sql .= " ORDER BY evento_id ";
        $resultado = $conn->query($sql); //realizo la consulta
    } catch (\Exception $e) {

        echo $e->getMessage();
    }
    ?>

    <div class="calendar">

        <?php

        $calendario = array();

        while ($eventos = $resultado->fetch_assoc()) {

            $fecha = $eventos['fecha_evento'];

            $evento = array(
                'titulo' => $eventos['nombre_evento'],
                'fecha'  => $eventos['fecha_evento'],
                'hora'   => $eventos['hora_evento'],
                'categoria' => $eventos['cat_evento'],
                'icono' => 'fa' . " " . $eventos['icono'],
                'invitado' => $eventos['nombre_invitado'] . " " . $eventos['apellido_invitado']
            );

            $calendario[$fecha][] = $evento;
        } ?>

        <?php

        foreach ($calendario as $dia => $lista_evento) { ?>

            <h3 class="titulo-calendario">
                <i class="fa fa-calendar"> </i>

                <?php

                setlocale(LC_TIME, 'spanish.UTF-8');

                echo strftime("%A, %d de %B del %Y", strtotime($dia)); ?>
            </h3>

            <div class="dia">
                <?php foreach ($lista_evento as $evento) { ?>
                    <div class="contenido-dias">

                        <p class="titulo"><?php echo $evento['titulo']; ?></p>
                        <p class="hora">
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                            <?php echo $evento['fecha'] . " " . $evento['hora']; ?></p>
                        <p>
                            <i class="<?php echo $evento['icono']; ?>" aria-hidden="true"></i>
                            <?php echo $evento['categoria'] ?>
                            <p>
                                <p class=""><i class="fa fa-user" aria-hidden="true"></i>
                                    <?php echo $evento['invitado'] ?></p>


                    </div>

                <?php } ?>
            </div>

        <?php } ?>


    </div>

    <?php
    $conn->close();
    ?>

</section>

<?php include_once 'includes/templates/footer.php'; ?>