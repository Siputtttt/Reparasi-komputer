<?php
      $session = \Config\Services::session();
?>
<!-- buat menu bar--->
<nav class="navbar navbar-expand-sm navbar-dark" style="background-color:#00426D">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><b>eduCampus</a></b>
   <div class="collapse navbar-collapse" id="collapsibleNavbar">
     <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url()?>"><i class="fa-solid fa-house-user"></i> Home</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url()?>"><i class="fa-solid fa-user-tie"></i> Mahasiswa</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('undangan/wisudawan')?>"><i class="fa-solid fa-user-graduate"></i> Nilai</a>
          </li>

          
     </ul>
  </div>
  <ul class="navbar-nav  ml-sm-auto">
      <span class="navbar-text text-white">Administrator
      </span>
       <li class="nav-item" >
        <a data-toggle="tooltip" title="Logout" class="nav-link " href="<?= base_url('siakad/logout')?>"><i class="fas fa-sign-out-alt"></i> Logout </a>
      </li>
  </ul>
  </div>
</nav>
