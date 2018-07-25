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
                       <li><a href="#">Detail Order</a><span class="divider-last">&nbsp;</span></li>
                   </ul>
                   <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="row-fluid">
               <div class="span6">
                  <div class="widget">
                        <div class="widget-title">
                           <h4><i class="icon-globe"></i>Detail Breakdown</h4>
                           <span class="tools">
                           <a href="javascript:;" class="icon-chevron-down"></a>
                           <a href="javascript:;" class="icon-remove"></a>
                           </span>                    
                        </div>
                        <div class="widget-body">
                            <form action="<?=base_url()?>order_breakdown/simpanorderbreakdowndetail" method="POST">
                              <table class="table table-striped">
                                 <tr>
                                  <td><label>Kode Order:</label></td>
                                  <td><input type="text" name="kdorder" id="kdorder" class="span12" required value="<?=$row->row()->kdorder?>" readonly /></td>
                                </tr>
                                <tr>
                                  <td><label>Nama:</label></td>
                                  <td><input type="text" name="nama" id="nama" class="span12" required value="<?=$row->row()->orderbyname?>" readonly/></td>
                                </tr>
                                <tr>
                                  <td><label>Divisi:</label></td>
                                  <td><input type="text" name="divisi" id="divisi" class="span12" required value="<?=$row->row()->orderbydiv?>" readonly/></td>
                                </tr>
                                <tr>
                                  <td><label>Tanggal Order:</label></td>
                                  <td><input type="text" name="tglorder" id="tglorder" class="span12" required value="<?=$row->row()->tglorder?>" readonly/></td>
                                </tr>
                                <tr>
                                  <td><label>Jam Order:</label></td>
                                  <td><input type="text" name="jamorder" id="jamorder" class="span12" required value="<?=$row->row()->jamorder?>" readonly/></td>
                                </tr>
                                <tr>
                                  <td><label>Unit:</label></td>
                                  <td>
                                    <select class="span12" name="unit" id="unit" required readonly>
                                      <option value="">--pilih--</option>
                                      <?php foreach($unit->result() as $row_unit){?>
                                      <option value="<?=$row_unit->kdunit?>" <?=$row_unit->kdunit == $row->row()->kdunit ? 'selected' : ''?>><?=$row_unit->tipeunit.' - '.$row_unit->wilayahunit.' - '.$row_unit->hmawal.' - '.$row_unit->hmakhir?></option>
                                      <?php }?>
                                    </select>
                                  </td>
                                </tr>
                                <!-- <tr>
                                  <td><label>Tanggal Order:</label></td>
                                  <td><input type="text" name="nama" id="nama" class="span12" required /></td>
                                </tr>  -->
                                <!-- <tr>
                                  <td></td>
                                  <td><button type="submit" class="btn btn-success">Save</button></td>
                                </tr>  -->                              
                              </table>
                              
                            </form>
                        </div>
                  </div>
               </div>
               <div class="span6">
                  <div class="widget">
                        <div class="widget-title">
                           <h4><i class="icon-globe"></i>Selesaikan Breakdown</h4>
                           <span class="tools">
                           <a href="javascript:;" class="icon-chevron-down"></a>
                           <a href="javascript:;" class="icon-remove"></a>
                           </span>                    
                        </div>
                        <div class="widget-body">
                            <form action="<?=base_url()?>order_breakdown/simpanorderbreakdownselesaikan" method="POST">
                              <table class="table table-striped">
                                 
                                <tr>
                                  <td><label>Tanggal Mulai:</label></td>
                                  <td>
                                    <input type="hidden" name="kdorder1" id="kdorder1" class="span12" required value="<?=$row->row()->kdorder?>" readonly />
                                    <input type="text" name="tglmulai" id="tglmulai" class="span12" required value="<?=$row->row()->tglmulai?>" readonly/></td>
                                </tr>
                                <tr>
                                  <td><label>Jam Mulai:</label></td>
                                  <td><input type="text" name="jammulai" id="jammulai" class="span12" required value="<?=$row->row()->jammulai?>" readonly/></td>
                                </tr>
                                <hr/>
                                <tr>
                                  <td><label>Tanggal Selesai:</label></td>
                                  <td>
                                    
                                    <input type="text" name="tglselesai" id="tglselesai" class="span12" required value="<?=$row->row()->tglselesai?>" /></td>
                                </tr>
                                <tr>
                                  <td><label>Jam Selesai:</label></td>
                                  <td><input type="text" name="jamselesai" id="jamselesai" class="span12" required value="<?=$row->row()->jamselesai?>"/></td>
                                </tr>
                                <tr>
                                  <td><label>Kerusakan:</label></td>
                                  <td>
                                    <select class="span12" name="kdkerusakan" id="kdkerusakan" required>
                                      <option value="">--pilih--</option>
                                      <?php foreach($kerusakan->result() as $row_kerusakan){?>
                                      <option value="<?=$row_kerusakan->kdkerusakan?>" <?=$row_kerusakan->kdkerusakan == $row->row()->kdkerusakan ? 'selected' : ''?>><?=$row_kerusakan->kdkerusakan.' - '.$row_kerusakan->keterangan?></option>
                                      <?php }?>
                                    </select>
                                  </td>
                                </tr>
                                <tr>
                                  <td><label>Status BD:</label></td>
                                  <td><input type="text" name="statusbd" id="statusbd" class="span12" required value="<?=$row->row()->statusbd?>" placeholder="BUS atau BS"/></td>
                                </tr>
                                <tr>
                                  <td><label>Status Akhir:</label></td>
                                  <td><input type="text" name="statusakhir" id="statusakhir" class="span12" required value="<?=$row->row()->statusakhir?>" placeholder="RFU atau BD atau P2H"/></td>
                                </tr>
                                <tr>
                                  <td></td>
                                  <td><button type="submit" class="btn btn-success">Proses</button></td>
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