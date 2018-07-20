<!-- BEGIN CONTAINER -->
<div id="container" class="row-fluid">
      <!-- BEGIN SIDEBAR -->
      <div id="sidebar" class="nav-collapse collapse">

         <div class="sidebar-toggler hidden-phone"></div>   

         <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
         <div class="navbar-inverse">
            <form class="navbar-search visible-phone">
               <input type="text" class="search-query" placeholder="Search" />
            </form>
         </div>
         <!-- END RESPONSIVE QUICK SEARCH FORM -->
         <!-- BEGIN SIDEBAR MENU -->
          <ul class="sidebar-menu">
              <li><a class="" href="<?=base_url()?>"><span class="icon-box"><i class="icon-home"></i></span> Dashboard</a></li>
              <li class="has-sub <?=$link == 'master_jenis' || $link == 'master_kerusakan' || $link == 'master_merk' || $link == 'master_perbaikan' || $link == 'master_komponen' ? 'active' : ''?>">
                  <a href="javascript:;" class="">
                      <span class="icon-box"><i class="icon-tasks"></i></span> Master Data
                      <span class="arrow"></span>
                  </a>
                  <ul class="sub">
                      <li class="<?=$link == 'master_jenis' ? 'active' : ''?>"><a class="" href="<?=base_url()?>master_jenis">Master Jenis</a></li>
                      <li class="<?=$link == 'master_kerusakan' ? 'active' : ''?>"><a class="" href="<?=base_url()?>master_kerusakan">Master Kerusakan</a></li>
                      <li class="<?=$link == 'master_komponen' ? 'active' : ''?>"><a class="" href="<?=base_url()?>master_komponen">Master Komponen</a></li>
                      <li class="<?=$link == 'master_merk' ? 'active' : ''?>"><a class="" href="<?=base_url()?>master_merk">Master Merk</a></li>
                      <li class="<?=$link == 'master_perbaikan' ? 'active' : ''?>"><a class="" href="<?=base_url()?>master_perbaikan">Master Perbaikan </a></li>
                      <li><a class="" href="<?=base_url()?>master_unit">Master Unit </a></li>
                      <li><a class="" href="<?=base_url()?>master_user">Master User </a></li>
                  </ul>
              </li>
              <li class="has-sub">
                  <a href="javascript:;" class="">
                      <span class="icon-box"><i class="icon-th"></i></span> Breakdown
                      <span class="arrow"></span>
                  </a>
                  <ul class="sub">
                      <li><a class="" href="basic_table.html">Proses Breakdown</a></li>
                  </ul>
              </li>
              <li><a class="" href="login.html"><span class="icon-box"><i class="icon-user"></i></span> User</a></li>
          </ul>
         <!-- END SIDEBAR MENU -->
      </div>
      <!-- END SIDEBAR