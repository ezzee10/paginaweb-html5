  <?php include_once 'includes/templates/header.php'; ?>

  <section class="seccion contenedor-seccion">
    <h2>La mejor conferencia de diseño web en español</h2>
    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Expedita velit, perferendis deleniti autem quo totam
      voluptatem possimus laborum soluta nihil accusantium quasi deserunt. Labore, rerum quos? Placeat dolore nam
      Lorem ipsum, dolor sit amet consectetur adipisicing elit. Similique odio dolor nostrum, in omnis iste vitae
      distinctio iure dicta modi fugit. Numquam dolorum saepe iusto accusantium assumenda adipisci praesentium quos?</p>
  </section>

  <section class="programa">
    <div class="contenedor-video">
      <video muted autoplay loop poster="bg-talleres.jpg">
        <source src="video/video.mp4" type="video/mp4">
        <source src="video/video.webm" type="video/webm">
        <source src="video/video.ogv" type="video/ogg">
      </video>
    </div>

    <div class="contenido-programa">
      <div class="contenedor-seccion">
        <div class="programa-evento">
          <h2>Programa Del Evento</h2>


          <?php

          try {
            require_once('includes/funciones/bd_conexion.php');
            $sql = " SELECT * FROM `categoria_evento`";
            $resultado = $conn->query($sql); //realizo la consulta
          } catch (\Exception $e) {

            echo $e->getMessage();
          }
          ?>

          <nav class="menu-programa">
            <?php while ($cat = $resultado->fetch_assoc()) { ?>
              <?php $categoria =  $cat['cat_evento']; ?>
              <a href="#<?php echo strtolower($categoria) ?>"><i class="fas <?php echo " " . $cat['icono']; ?>"></i><?php echo $categoria; ?></a>
            <?php } ?>
          </nav>


          <?php
          try {
            require_once('includes/funciones/bd_conexion.php');
            $sql = " SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado  ";
            $sql .= " FROM eventos ";
            $sql .= " INNER JOIN categoria_evento ";
            $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
            $sql .= " INNER JOIN invitados ";
            $sql .= " ON eventos.id_inv = invitados.invitado_id ";
            $sql .= " AND eventos.id_cat_evento = 1 ";
            $sql .= " ORDER BY evento_id LIMIT 2;";
            $sql .= " SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado  ";
            $sql .= " FROM eventos ";
            $sql .= " INNER JOIN categoria_evento ";
            $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
            $sql .= " INNER JOIN invitados ";
            $sql .= " ON eventos.id_inv = invitados.invitado_id ";
            $sql .= " AND eventos.id_cat_evento = 2 ";
            $sql .= " ORDER BY evento_id LIMIT 2;";
            $sql .= " SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado  ";
            $sql .= " FROM eventos ";
            $sql .= " INNER JOIN categoria_evento ";
            $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
            $sql .= " INNER JOIN invitados ";
            $sql .= " ON eventos.id_inv = invitados.invitado_id ";
            $sql .= " AND eventos.id_cat_evento = 3 ";
            $sql .= " ORDER BY evento_id LIMIT 2;";
          } catch (\Exception $e) {
            echo $e->getMessage();
          }
          ?>

          <?php $conn->multi_query($sql); ?>

          <?php
          do {
            $resultado = $conn->store_result();
            $row = $resultado->fetch_all(MYSQLI_ASSOC); ?>

            <?php $i = 0; ?>
            <?php foreach ($row as $evento) : ?>
              <?php if ($i % 2 == 0) { ?>
                <div id="<?php echo strtolower($evento['cat_evento']) ?>" class="info-curso ocultar clearfix">
                <?php } ?>
                <div class="detalle-evento">
                  <h3><?php echo ($evento['nombre_evento']) ?></h3>
                  <p><i class="fas fa-clock"></i><?php echo $evento['hora_evento'] ?></p>
                  <p><i class="fas fa-calendar"></i><?php echo $evento['fecha_evento'] ?></p>
                  <p><i class="fas fa-user"></i><?php echo $evento['nombre_invitado'] ?></p>
                </div>


                <?php if ($i % 2 == 1) : ?>
                  <div class="ver-todos">
                    <a href="calendario.php" class="boton">Ver Todos</a>
                  </div>
                </div>
                <!--.#talleres-->

              <?php endif; ?>

              <?php $i++; ?>
            <?php endforeach; ?>
            <?php $resultado->free(); ?>
          <?php } while ($conn->more_results() && $conn->next_result());
          ?>

        </div>
        <!--.programa-evento-->
      </div>
      <!--.contenedor-->
    </div>
    <!--.contenido-programa-->
  </section>


  <?php include_once 'includes/templates/invitados.php'; ?>

  <div class="contador parallax" style="margin-top:35px;">

    <div class="contenedor-seccion">
      <ul class="resumen-evento">
        <li>
          <p class="numero"></p>Invitados
        </li>
        <li>
          <p class="numero"></p>Talleres
        </li>
        <li>
          <p class="numero"></p>Días
        </li>
        <li>
          <p class="numero"></p>Conferencias
        </li>
      </ul>
    </div>

  </div>
  <!--cierre contador-->

  <section class="precios seccion">

    <h2>Precios</h2>
    <div class="contenedor-seccion">
      <div class="lista-precios">
        <div class="precio">
          <h3>Pase por día (viernes)</h3>
          <p class="numero">$30</p>
          <div class="lista-texto">
            <p>Bocadillos Gratis</p>
            <p>Todas las conferencias</p>
            <p>Todos los talleres</p>
          </div>
        </div>
        <div class="precio">
          <h3>Todos los días</h3>
          <p class="numero">$50</p>
          <div class="lista-texto">
            <p>Bocadillos Gratis</p>
            <p>Todas las conferencias</p>
            <p>Todos los talleres</p>
          </div>
        </div>
        <div class="precio">
          <h3>Pase por 2 días (viernes y sábado)</h3>
          <p class="numero">$45</p>
          <div class="lista-texto">
            <p>Bocadillos Gratis</p>
            <p>Todas las conferencias</p>
            <p>Todos los talleres</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--cierre sección tabla de precios-->

  <div id="mapa" class="mapa"></div>

  <section class="seccion contenedor-seccion">
    <h2>Testimoniales</h2>
    <div class="testimoniales">
      <div class="testimonial">
        <blockquote>
          <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore laudantium maiores esse deleniti? Eum
            repellat accusantium quo dolores, ex exercitationem quam fugit ab, nihil magni, dolor recusandae
            consequuntur
            expedita.</p>
          <footer class="test-footer">
            <img src="img/testimonial.jpg" alt="imagen testimonial">
            <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
          </footer>
        </blockquote>
      </div>
      <!--fin testimonial-->
      <div class="testimonial">
        <blockquote>
          <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore
            laudantium maiores esse deleniti? Eum
            repellat accusantium quo dolores, ex exercitationem quam fugit ab, nihil magni, dolor recusandae
            consequuntur
            expedita.</p>
          <footer class="test-footer">
            <img src="img/testimonial.jpg" alt="imagen testimonial">
            <cite>Oswaldo Aponte Escobedo<span>Diseñador en @prisma</span></cite>
          </footer>
        </blockquote>
      </div>
      <!--fin testimonial-->
      <div class="testimonial">
        <blockquote>
          <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore laudantium maiores esse deleniti? Eum
            repellat accusantium quo dolores, ex exercitationem quam fugit ab, nihil magni, dolor recusandae
            consequuntur
            expedita.</p>
          <footer class="test-footer">
            <img src="img/testimonial.jpg" alt="imagen testimonial">
            <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
          </footer>
        </blockquote>
      </div>
      <!--fin testimonial-->
    </div>
  </section>
  <!--fin testimonial-->

  <div class="newsletter parallax">
    <div class="contenido contenedor-seccion">
      <p>regístrate al newsletter:</p>
      <h3>gdlwebcam</h3>
      <a href="#" class="boton transparente">Registro</a>
    </div>
  </div>
  <!--fin newsletter-->

  <section class="seccion contenedor-seccion">
    <h2>Faltan</h2>
    <div class="cuenta-regresiva">
      <div class="cuenta">
        <p id="dias" class="numero"></p>
        <p>días</p>
      </div>
      <div class="cuenta">
        <p id="horas" class="numero"></p>
        <p>Horas</p>
      </div>
      <div class="cuenta">
        <p id="minutos" class="numero"></p>
        <p>Minutos</p>
      </div>
      <div class="cuenta">
        <p id="segundos" class="numero"></p>
        <p>Segundos</p>
      </div>
    </div>
  </section>
  <!--fin contador-->

  <?php include_once 'includes/templates/footer.php'; ?>