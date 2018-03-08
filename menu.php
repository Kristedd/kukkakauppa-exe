<?php session_start(); ?>
<div id="main-nav">
  <ul>
    <li><img src="https://pbs.twimg.com/profile_images/859153231737491456/M_uvM70Z_400x400.jpg" alt="logo"></li>
    <li> <a href="index.php">Etusivu</a> </li>
    <li> <a href="tuotteet.php">Tuotteet</a>
    <ul class="submenu">
      <li> <a href="sisakasvit.php">Sisäkasvit</a></li>
      <li> <a href="ulkokasvit.php">Ulkokasvit</a></li>
      <li> <a href="tyokalut.php">Työkalut</a></li>
      <li> <a href="kasvienhoito.php">Kasvienhoito</a></li>
      </ul>
    </li>
    <li> <a href="otayhteytta.php">Ota yhteyttä</a> </li>
    <li> <a href="tietoameista.php">Tietoa meistä</a> </li>
  </ul>

  <?php include "sessionbuttons.php"; ?>
  <li><a href="ostoskori.php">Ostoskori</a></li>
  </ul>
  </div>
  <div style="clear: both;"></div>
</div>
