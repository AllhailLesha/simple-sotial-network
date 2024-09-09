<?php

use App\Application\Auth\Auth;

?>

<header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="/about">About</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="/contacts">Contacts</a>
                    </li>
                    <?php
                        if (Auth::check()) {?>
                            <li class="nav-item">
                            <a class="nav-link" href="/profil">Profil</a>
                            </li>
                        <?} else {?>
                            <li class="nav-item">
                            <a class="nav-link" href="/login">Login</a>
                            </li>
                            <li class="nav-item">   
                            <a class="nav-link" href="/register">Register</a>
                            </li>
                        <?}
                    ?>
                </ul>   
                <form class="d-flex" role="search" action="/logout" method="post">
                    <?php
                        if (Auth::check()) {?>
                            <button class="btn btn-outline-danger mt-3" type="submit">Logout</button>
                        <?}
                    ?>
                </form>
                </div>
            </div>
        </nav>
    </header>