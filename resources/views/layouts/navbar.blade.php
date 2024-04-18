
<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta20
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">
  <head>

    <link rel="icon" href="./favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon"/>
    <!-- CSS files -->
    <link href="./back/dist/css/tabler.min.css?1695847769" rel="stylesheet"/>
    <link href="./back/dist/css/tabler-flags.min.css?1695847769" rel="stylesheet"/>
    <link href="./back/dist/css/tabler-payments.min.css?1695847769" rel="stylesheet"/>
    <link href="./back/dist/css/tabler-vendors.min.css?1695847769" rel="stylesheet"/>
    <link href="./back/dist/css/demo.min.css?1695847769" rel="stylesheet"/>
    <style>
      @import url('https://rsms.me/inter/inter.css');
      :root {
      	--tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
      body {
      	font-feature-settings: "cv03", "cv04", "cv11";
      }
    </style>
  </head>
  <body >
    <script src="./back/dist/js/demo-theme.min.js?1695847769"></script>
      <!-- Navbar -->
      <header class="navbar-expand-md">
        <div class="collapse navbar-collapse" id="navbar-menu">
          <div class="navbar">
            <div class="container-xl">
              <div class="row flex-fill align-items-center">
                <div class="col">
                  <ul class="navbar-nav">
                    <li class="nav-item">
                      <a class="nav-link" href="/objave" >
                        <span class="nav-link-title">
                          Objave
                        </span>
                      </a>
                    </li>
                    <li class="nav-item active dropdown">
                      <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                        <span class="nav-link-title">
                          Kategorije
                        </span>
                      </a>
                      <div class="dropdown-menu">
                        <div class="dropdown-menu-columns">
                          <div class="dropdown-menu-column">
                            <a class="dropdown-item" href="./alerts.html">
                              Alerts
                            </a>
                            <a class="dropdown-item" href="./accordion.html">
                              Accordion
                            </a>
                          </div>
                        </div>
                      </div>
                    </li>

                    <li class="nav-item">
                      <a class="nav-link" href="/nova-objava" >
                        <span class="nav-link-title">
                          Nova objava
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/ulogujte-se" >
                        <span class="nav-link-title">
                          Ulogujte se
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./emails.html" >
                          <span class="nav-link-title">
                            Izlogujte se
                          </span>
                        </a>
                      </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </header>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="./back/dist/js/tabler.min.js?1695847769" defer></script>
    <script src="./back/dist/js/demo.min.js?1695847769" defer></script>
  </body>
</html>
