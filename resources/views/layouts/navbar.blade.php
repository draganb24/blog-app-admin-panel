</html>
<!doctype html>
<html lang="en">
<div>
    <!-- Navbar -->
    <header class="navbar-expand-md" style="background-color:#3a4859;">
        <div class="collapse navbar-collapse" id="navbar-menu">
            <div class="navbar">
                <div class="container-xl">
                    <div class="row flex-fill align-items-center justify-content-between">
                        <div class="col">
                            <ul class="navbar-nav">
                                <li class="nav-item {{ request()->is('objave*') ? 'active' : '' }}">
                                    <a class="nav-link" href="/objave">
                                        <span class="nav-link-title" style="color: #fff;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="currentColor"
                                                class="icon icon-tabler icons-tabler-filled icon-tabler-article">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M19 3a3 3 0 0 1 2.995 2.824l.005 .176v12a3 3 0 0 1 -2.824 2.995l-.176 .005h-14a3 3 0 0 1 -2.995 -2.824l-.005 -.176v-12a3 3 0 0 1 2.824 -2.995l.176 -.005h14zm-2 12h-10l-.117 .007a1 1 0 0 0 0 1.986l.117 .007h10l.117 -.007a1 1 0 0 0 0 -1.986l-.117 -.007zm0 -4h-10l-.117 .007a1 1 0 0 0 0 1.986l.117 .007h10l.117 -.007a1 1 0 0 0 0 -1.986l-.117 -.007zm0 -4h-10l-.117 .007a1 1 0 0 0 0 1.986l.117 .007h10l.117 -.007a1 1 0 0 0 0 -1.986l-.117 -.007z" />
                                            </svg>
                                            Objave
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item {{ request()->is('kategorije*') ? 'active' : '' }}">
                                    <a class="nav-link" href="/kategorije">
                                        <span class="nav-link-title" style="color: #fff;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="currentColor"
                                                class="icon icon-tabler icons-tabler-filled icon-tabler-category">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M10 3h-6a1 1 0 0 0 -1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1 -1v-6a1 1 0 0 0 -1 -1z" />
                                                <path
                                                    d="M20 3h-6a1 1 0 0 0 -1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1 -1v-6a1 1 0 0 0 -1 -1z" />
                                                <path
                                                    d="M10 13h-6a1 1 0 0 0 -1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1 -1v-6a1 1 0 0 0 -1 -1z" />
                                                <path
                                                    d="M17 13a4 4 0 1 1 -3.995 4.2l-.005 -.2l.005 -.2a4 4 0 0 1 3.995 -3.8z" />
                                            </svg>
                                            Kategorije
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-auto">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <?php
                                    use App\Models\CurrentlyLoggedInUser;
                                    $lastLoggedInUser = CurrentlyLoggedInUser::latest()->first();
                                    ?>
                                    @if ($lastLoggedInUser)
                                        <?php $user = $lastLoggedInUser->user; ?>
                                        @if ($user)
                                            <div class="d-flex align-items-center">
                                                <span id="user-info" class="nav-link"
                                                    style="color: #fff; margin-right: 10px;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="currentColor"
                                                        class="icon icon-tabler icons-tabler-filled icon-tabler-user">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path
                                                            d="M12 2a5 5 0 1 1 -5 5l.005 -.217a5 5 0 0 1 4.995 -4.783z" />
                                                        <path
                                                            d="M14 14a5 5 0 0 1 5 5v1a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-1a5 5 0 0 1 5 -5h4z" />
                                                    </svg>
                                                    {{ $user->email }}
                                                </span>
                                        @endif

                                        <form id="logoutForm" action="{{ route('logout.api') }}" method="POST">
                                            @csrf
                                            <button type="submit" class="nav-link"
                                                style="background: none; border: none; cursor: pointer; color: #fff;">
                                                Izlogujte se
                                            </button>
                                        </form>
                                    </div>
                                 @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
</div>

</html>
