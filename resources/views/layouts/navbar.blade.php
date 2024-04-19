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
                    <li class="nav-item dropdown {{ request()->is('kategorije*') ? 'active' : '' }}">
                      <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                        <span class="nav-link-title">
                          Kategorije
                        </span>
                      </a>
                      <x-categories />
                    </li>
                    <li class="nav-item {{ request()->is('nova-objava*') ? 'active' : '' }}">
                      <a class="nav-link" href="/nova-objava">
                        <span class="nav-link-title">
                          Nova objava
                        </span>
                      </a>
                    </li>
                    <li class="nav-item {{ request()->is('ulogujte-se*') ? 'active' : '' }}">
                      <a class="nav-link" href="/ulogujte-se">
                        <span class="nav-link-title">
                          Ulogujte se
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
