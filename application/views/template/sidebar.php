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
              <li class="<?=$link == 'dashboard' ? 'active' : ''?>"><a class="" href="<?=base_url()?>welcome"><span class="icon-box"><i class="icon-home"></i></span> Dashboard</a></li>
              <?php if($this->session->userdata('hak_akses') == 'admin' || $this->session->userdata('hak_akses') == 'pimpinan' ){?>
              <li class="has-sub <?=$link == 'master_jenis' || $link == 'master_kerusakan' || $link == 'master_merk' || $link == 'master_perbaikan' || $link == 'master_komponen' || $link == 'master_unit' || $link == 'master_user' || $link == 'master_type_unit'? 'active' : ''?>">
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
                      <li class="<?=$link == 'master_type_unit' ? 'active' : ''?>"><a class="" href="<?=base_url()?>master_type_unit">Master Type Unit </a></li>
                      <li class="<?=$link == 'master_unit' ? 'active' : ''?>"><a class="" href="<?=base_url()?>master_unit">Master Unit </a></li>
                      <?php if($this->session->userdata('hak_akses') == 'pimpinan'){?>
                      <li class="<?=$link == 'master_user' ? 'active' : ''?>"><a class="" href="<?=base_url()?>master_user">Master User </a></li>
                      <?php }?>
                  </ul>
              </li>
              <?php }?>
              <li class="has-sub <?=$link == 'order_breakdown' || $link == 'list_breakdown' || $link == 'laporan_grafik' || $link == 'laporan_grafik_komponen' || $link == 'laporan_mttr' || $link == 'laporan_grafik_kerusakan' ? 'active' : ''?>">
                  <a href="javascript:;" class="">
                      <span class="icon-box"><i class="icon-th"></i></span> Breakdown
                      <span class="arrow"></span>
                  </a>
                  <ul class="sub">
                      <li class="<?=$link == 'order_breakdown' ? 'active' : ''?>"><a class="" href="<?=base_url()?>order_breakdown">Order Breakdown</a></li>
                      <?php if($this->session->userdata('hak_akses') == 'admin' || $this->session->userdata('hak_akses') == 'pimpinan'){?>
                      <li class="<?=$link == 'list_breakdown' ? 'active' : ''?>"><a class="" href="<?=base_url()?>order_breakdown/list_breakdown">List Breakdown</a></li>
                      <li class="<?=$link == 'laporan_grafik' ? 'active' : ''?>"><a class="" href="<?=base_url()?>laporan_grafik">Laporan Grafik Breakdown</a></li>
                      <li class="<?=$link == 'laporan_grafik_komponen' ? 'active' : ''?>"><a class="" href="<?=base_url()?>laporan_grafik/grafik_komponen">Laporan Grafik Komponen</a></li>
                      <li class="<?=$link == 'laporan_grafik_kerusakan' ? 'active' : ''?>"><a class="" href="<?=base_url()?>laporan_grafik/grafik_kerusakan">Laporan Grafik Kerusakan</a></li>
                      <li class="<?=$link == 'laporan_mttr' ? 'active' : ''?>"><a class="" href="<?=base_url()?>laporan_grafik/mttr">Laporan MTTR</a></li>
                      <?php }?>
                  </ul>
              </li>
              
              <!-- <li><a class="" href="login.html"><span class="icon-box"><i class="icon-user"></i></span> User</a></li> -->
          </ul>
         <!-- END SIDEBAR MENU -->
      </div>
      <!-- END SIDEBAR