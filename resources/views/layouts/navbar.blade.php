<!doctype html>
<html lang="en">
  <div>
      <!-- Navbar -->
      <header class="navbar-expand-md">
        <div class="collapse navbar-collapse" id="navbar-menu">
          <div class="navbar">
            <div class="container-xl">
              <div class="row flex-fill align-items-center">
                <div class="col">
                  <ul class="navbar-nav">
                    <li class="nav-item {{ request()->is('objave*') ? 'active' : '' }}">
                      <a class="nav-link" href="/objave">
                        <span class="nav-link-title">
                          Objave
                        </span>
                      </a>
                    </li>
                    <li class="nav-item {{ request()->is('kategorije*') ? 'active' : '' }}">
                        <a class="nav-link" href="/kategorije">
                          <span class="nav-link-title">
                            Kategorije
                          </span>
                        </a>
                      </li>
                    <li class="nav-item">
                        <form id="logoutForm" action="{{ route('logout') }}" method="POST">
                          @csrf
                          <button type="submit" class="nav-link" style="background: none; border: none; cursor: pointer;">
                            <span class="nav-link-title">
                              Izlogujte se
                            </span>
                          </button>
                        </form>
                      </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</html>
