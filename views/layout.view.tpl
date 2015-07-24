<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1"/>
            <title>{{page_title}}</title>
            <link rel="stylesheet" href="public/css/proyecto.css" />
            <script src="public/js/jquery.min.js"></script>
            <script src="public/js/bjqs.min.js"></script>
            <script src="public/js/script.js"></script>

        </head>
        <body>
                <!-- SLIDESHOW -->
          <div id="slider">
              <ul class="bjqs">
                  <li>
                      <img src="css/ludus.jpg" alt="" title="Somos Distribuidores De los principales productos de la Wizards Of the coast " />
                  </li>
                  <li>
                      <img src="img/slider1.jpg" alt="" title="WotC es la Compañia mas grande en TCG a Nivel Mundial." />
                  </li>
                  <li>
                      <img src="img/slider2.jpg" alt="" title="Magic, es uno de los TCG Mas jugados a Nivel Mundial. " />
                  </li>
                  <li>
                      <img src="img/slider3.jpg" alt="" title="D&D se volvio famoso por ser un Juego de Role que disfrutas con tus amigos." />
                  </li>
                   </ul>
           </div>
          <div class="menu">
            <a href="index.php">
               <h1>{{page_title}}</h1>
                </a>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="index.php?page=login">Iniciar Sesión</a></li>
            </ul>
          </div>
          {{{page_content}}}
            <div >
              <footer>
                  Instituto Marcial Solís Dacosta | San Juancito M.D.C., F.M. 1989
		          </footer>
            </div>
        </body>
    </html>
