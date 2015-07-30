<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1"/>
            <title>{{page_title}}</title>
            <link rel="stylesheet" href="public/css/proyecto.css" />
            <link rel="stylesheet" href="public/css/smvc.css" />
            <script src="public/js/jquery.min.js"></script>
            <script src="public/js/bjqs.min.js"></script>
            <script src="public/js/script.js"></script>

        </head>
        <body>
          <!-- SLIDESHOW -->
          <div class="menu">

            <ul>

                <a href="index.php"><h1>{{page_title}}</h1></a>
                {{page_aportaciones}}
                <li><a href="index.php">{{page_log}}</a></li>
                <li><a href="index.php?page={{page_login}}">{{page_login}}</a></li>


            </ul>
          </div>
          {{{page_content}}}
            <div >
              <footer>
                  Instituto Marcial Solís Dacosta | San Juancito M.D.C., F.M. 1989-2015
		          </footer>
            </div>
        </body>
    </html>
