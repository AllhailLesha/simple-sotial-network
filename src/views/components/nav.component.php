<?php

use App\Application\Auth\Auth;

?>


<nav class="navbar bg-dark navbar-expand-lg bg-body-tertiary" data-bs-theme="dark"> 
  <div class="container-fluid container">
     <a class="navbar-brand" href="/">Dotabuff</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
       
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">   
          <a class="nav-link" href="/heroes">Героии</a>
        </li>
        <?if (Auth::check()) {?>
            <li class="nav-item dropdown">  
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?= $_COOKIE['name'] ?? "Аноним"?>
              </a>
              <ul class="dropdown-menu">
                <li>
                    <?php
                        if (Auth::check()) {?>
                            <a class="nav-link" href="/profile">Профиль</a>
                        <?}
                    ?>
                </li>
                <li>
                <form class="d-flex" role="search" action="/logout" method="post">
                    <?php
                        if (Auth::check()) {?>
                            <button class="btn btn-outline-danger mt-3" type="submit">Выйти</button>
                        <?}
                    ?>
                </form>
                </li>
              </ul>
            </li>
        <?} else {?>
            <li class="nav-item">   
                <a class="nav-link" href="/login">Войти</a>
            </li>
        <?}?>
      </ul>
      <form class="d-flex" role="search" action="/logout" method="post">
        <input class="form-control me-2" type="search" placeholder="искать" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Искать</button>
      </form>

    </div>  
  </div>
</nav>
