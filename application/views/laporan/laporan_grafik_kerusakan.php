<!-- BEGIN PAGE -->  
<div id="main-content">
         <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->   
            <div class="row-fluid">
               <div class="span12">
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                   <h3 class="page-title">
                     Laporan Kerusakan
                  </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                       </li>
                       <li>
                           <a href="#">Laporan</a> <span class="divider">&nbsp;</span>
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
                           <h4><i class="icon-globe"></i>Laporan Grafik Kerusakan</h4>
                           <span class="tools">
                           <a href="javascript:;" class="icon-chevron-down"></a>
                           <a href="javascript:;" class="icon-remove"></a>
                           </span>                    
                        </div>
                        <div class="widget-body">
                          <form id="form_laporan_kerusakan">
                            <table class="table table-striped">
                              <tr>
                                <td>Dari</td>
                                <td>
                                  : <input type="text" name="dari" id="dari" class=" m-ctrl-medium date-picker" required />
                                </td>
                              </tr>
                              <tr>
                                <td>Sampai</td>
                                <td>
                                  : <input type="text" name="sampai" id="sampai" class=" m-ctrl-medium date-picker" required />
                                </td>
                              </tr>
                              <tr>
                                <td></td>
                                <td>
                                  &nbsp; <button type="button" class="btn btn-sm btn-primary lihat_laporan_kerusakan">
                                    <i class=" icon-eye-open"></i> Lihat
                                  </button>
                                  <!-- <button type="button" class="btn btn-sm btn-danger cetak_laporan">
                                    <i class="icon-print"></i> Cetak
                                  </button> -->
                                </td>
                              </tr>
                            </table>
                          </form>
                            <br/>
                            <div id="result_laporan_kerusakan"></div>
                        </div>
                  </div>
               </div>
            </div>
            <!-- END PAGE CONTENT-->         
         </div>
         <!-- END PAGE CONTAINER-->
      </div>
      <!-- END PAGE -->  