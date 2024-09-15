<?php

use App\Application\Auth\Auth;

?>

<nav class="navbar bg-dark navbar-expand-lg bg-body-tertiary" data-bs-theme="dark"> 
  <div class="container-fluid">
    <div class="collapse navbar-collapse container" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Dotabuff</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/heroes">Героии</a>
        </li>
        <?if (Auth::check()) {?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Имя чувака</a></li>
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
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="искать" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Искать</button>
      </form>
    </div>
  </div>
</nav>