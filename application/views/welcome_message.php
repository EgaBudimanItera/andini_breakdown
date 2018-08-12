<!-- BEGIN PAGE -->  
<div id="main-content">
         <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->   
            <div class="row-fluid">
               <div class="span12">
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                   <h3 class="page-title">
                     Dashboard
                  </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                       </li>
                       <li>
                           <a href="#">Dashboard</a> <span class="divider">&nbsp;</span>
                       </li>
                       <!-- <li><a href="#">Blank Page</a><span class="divider-last">&nbsp;</span></li> -->
                   </ul>
                   <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="row-fluid">
               <div class="span12">
                  <div class="widget">
                        <div class="widget-title">
                           <h4><i class="icon-globe"></i>Dashboard</h4>
                           <span class="tools">
                           <a href="javascript:;" class="icon-chevron-down"></a>
                           <a href="javascript:;" class="icon-remove"></a>
                           </span>                    
                        </div>
                        <div class="widget-body">
                            <center><h3>Aplikasi Breakdown</h3><p>Grafik <br/> tanggal <?='01 '.date('F').' '.date('Y')?> s/d <?=$jumlah_hari.' '.date('F').' '.date('Y')?></p></center>
                            <hr/>
                            <div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
                            <!-- <h4>Mengelola:</h4>
                            <ol>                           
                              <li>Jenis</li>
                              <li>Kerusakan</li>
                              <li>Komponen</li>
                              <li>Merk</li>
                              <li>Perbaikan</li>
                              <li>Unit</li>
                              <li>User</li>
                              <li>Breakdown</li>
                            </ol> -->

                        </div>
                  </div>
               </div>
            </div>
            <!-- END PAGE CONTENT-->         
         </div>
         <!-- END PAGE CONTAINER-->
      </div>
      <!-- END PAGE -->  