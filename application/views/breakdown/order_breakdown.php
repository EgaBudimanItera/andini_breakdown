<!-- BEGIN PAGE -->  

<div id="main-content">
         <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->   
            <div class="row-fluid">
               <div class="span12">
                   <!-- BEGIN THEME CUSTOMIZER-->
                   <div id="theme-change" class="hidden-phone">
                       <i class="icon-cogs"></i>
                        <span class="settings">
                            <span class="text">Theme:</span>
                            <span class="colors">
                                <span class="color-default" data-style="default"></span>
                                <span class="color-gray" data-style="gray"></span>
                                <span class="color-purple" data-style="purple"></span>
                                <span class="color-navy-blue" data-style="navy-blue"></span>
                            </span>
                        </span>
                   </div>
                   <!-- END THEME CUSTOMIZER-->
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
                           <h4><i class="icon-globe"></i>Order Breakdown</h4>
                           <span class="tools">
                           <a href="javascript:;" class="icon-chevron-down"></a>
                           <a href="javascript:;" class="icon-remove"></a>
                           </span>                    
                        </div>
                        <div class="widget-body">
 
                            <form action="<?=base_url()?>order_breakdown/simpanorderbreakdown" method="POST">
                              <table class="table table-striped">
                                 <tr>
                                  <td><label>Kode Order:</label></td>
                                  <td><input readonly type="text" name="kdorder" id="kdorder" class="span12" required value="<?=$id?>" /></td>
                                </tr>
                                <tr>
                                  <td><label>Nama:</label></td>
                                  <td><input type="text" name="nama" id="nama" class="span12" value="<?=$this->session->userdata('nama')?>" readonly /></td>
                                </tr>
                                <tr>
                                  <td><label>Divisi:</label></td>
                                  <td><input type="text" name="divisi" id="divisi" value="<?=$this->session->userdata('hak_akses')?>" class="span12" readonly /></td>
                                </tr>
                                <tr>
                                  <td><label>Unit:</label></td>
                                  <td>
                                    <select class="span12 chosen" name="unit" id="unit" required>
                                      <option value="">--pilih--</option>
                                      <?php foreach($unit->result() as $row_unit){?>
                                      <option value="<?=$row_unit->kdunit?>"><?=$row_unit->kdunit.' - '.$row_unit->kode_type.' - '.$row_unit->wilayahunit?></option>
                                      <?php }?>
                                    </select>
                                  </td>
                                </tr>
                                <tr>
                                  <td><label>Keluhan:</label></td>
                                  <td>
                                    <textarea class="span12" name="keluhan" id="keluhan"></textarea>
                                  </td>
                                </tr>
                                <!-- <tr>
                                  <td><label>Tanggal Order:</label></td>
                                  <td><input type="text" name="nama" id="nama" class="span12" required /></td>
                                </tr>  -->
                                <tr>
                                  <td></td>
                                  <td><button type="submit" class="btn btn-success">Save</button></td>
                                </tr>                               
                              </table>
                              
                            </form>
                        </div>
                  </div>
               </div>
            </div>
            <!-- END PAGE CONTENT-->         
         </div>
         <!-- END PAGE CONTAINER-->
      </div>
      <!-- END PAGE -->  