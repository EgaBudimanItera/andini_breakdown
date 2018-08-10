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
                                  <td>

                                    <input type="text" name="jamorder" id="jamorder" class="span12" required value="<?=$row->row()->jamorder?>" readonly/></td>
                                </tr>
                                <tr>
                                  <td><label>Unit:</label></td>
                                  <td>
                                    <select class="span12 chosen" name="unit" id="unit" required readonly>
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
                  <div class="widget">
                        <div class="widget-title">
                           <h4><i class="icon-globe"></i>Komponen Breakdown</h4>
                           <span class="tools">
                           <a href="javascript:;" class="icon-chevron-down"></a>
                           <a href="javascript:;" class="icon-remove"></a>
                           </span>                    
                        </div>
                        <div class="widget-body">
                            <form action="<?=base_url()?>order_breakdown/simpanorderbreakdownkomponen" method="POST">
                              <table class="table table-striped">
                                 
                                <tr>
                                  <td><label>Komponen:</label></td>
                                  <td>
                                    <input type="hidden" name="kdorder3" id="kdorder3" class="span12" required value="<?=$row->row()->kdorder?>" readonly />
                                    <select class="span12 chosen" name="kdkomponen" required>
                                      <option value="">--pilih--</option>
                                      <?php foreach($komponen->result() as $row_komponen){?>
                                      <option value="<?=$row_komponen->kdkomp?>"><?=$row_komponen->kdkomp.' - '.$row_komponen->namakomp?></option>
                                      <?php }?>
                                    </select>
                                </tr>
                                
                                <tr>
                                  <td></td>
                                  <td><button type="submit" class="btn btn-success">Proses</button></td>
                                </tr>                               
                              </table>
                              <table class="table table-striped">
                              <tr>
                                <th>No.</th>
                                <th>Kode Komponen</th>
                                <th>nama Komponen</th>
                                <th></th>
                              </tr>
                              <?php $no = 1; foreach($list_komp->result() as $row_komp){?>
                              <tr>
                                <td><?=$no++?>.</td>
                                <td><?=$row_komp->kdkomp?></td>
                                <td><?=$row_komp->namakomp?></td>
                                <td><a href="<?=base_url()?>order_breakdown/hapus_komp/<?=$row_komp->kd?>/<?=$row_komp->kdorder?>" onclick='return confirm("Apakah anda yakin akan menghapus data ini?")'>Hapus</a></td>
                              </tr>
                              <?php }?>
                            </table>
                            </form>
                        </div>
                  </div>
                  <div class="widget">
                        <div class="widget-title">
                           <h4><i class="icon-globe"></i>Perbaikan Breakdown</h4>
                           <span class="tools">
                           <a href="javascript:;" class="icon-chevron-down"></a>
                           <a href="javascript:;" class="icon-remove"></a>
                           </span>                    
                        </div>
                        <div class="widget-body">
                            <form action="<?=base_url()?>order_breakdown/simpanorderbreakdownperbaikan" method="POST">
                              <table class="table table-striped">
                                 
                                <tr>
                                  <td><label>Perbaikan:</label></td>
                                  <td>
                                    <input type="hidden" name="kdorder5" id="kdorder5" class="span12" required value="<?=$row->row()->kdorder?>" readonly />
                                    <select class="span12 chosen" name="kdperbaikan" required>
                                      <option value="">--pilih--</option>
                                      <?php foreach($perbaikan->result() as $row_perbaikan){?>
                                      <option value="<?=$row_perbaikan->kdperbaikan?>"><?=$row_perbaikan->kdperbaikan.' - '.$row_perbaikan->keterangan?></option>
                                      <?php }?>
                                    </select>
                                </tr>
                                
                                <tr>
                                  <td></td>
                                  <td><button type="submit" class="btn btn-success">Proses</button></td>
                                </tr>                               
                              </table>
                              <table class="table table-striped">
                              <tr>
                                <th>No.</th>
                                <th>Kode Perbaikan</th>
                                <th>nama Perbaikan</th>
                                <th></th>
                              </tr>
                              <?php $no = 1; foreach($list_perbaikan->result() as $row_perbaikan){?>
                              <tr>
                                <td><?=$no++?>.</td>
                                <td><?=$row_perbaikan->kdperbaikan?></td>
                                <td><?=$row_perbaikan->keterangan?></td>
                                <td><a href="<?=base_url()?>order_breakdown/hapus_perbaikan/<?=$row_perbaikan->kd?>/<?=$row_perbaikan->kdorder?>" onclick='return confirm("Apakah anda yakin akan menghapus data ini?")'>Hapus</a></td>
                              </tr>
                              <?php }?>
                            </table>
                            </form>
                        </div>
                  </div>
               </div>
               <div class="span6">
                  <div class="widget">
                        <div class="widget-title">
                           <h4><i class="icon-globe"></i>Proses Breakdown</h4>
                           <span class="tools">
                           <a href="javascript:;" class="icon-chevron-down"></a>
                           <a href="javascript:;" class="icon-remove"></a>
                           </span>                    
                        </div>
                        <div class="widget-body">
                            <form action="<?=base_url()?>order_breakdown/simpanorderbreakdownjammulai" method="POST">
                              <table class="table table-striped">
                                 
                                <tr>
                                  <td><label>Tanggal Mulai:</label></td>
                                  <td>
                                    <input type="hidden" name="kdorder1" id="kdorder1" class="span12" required value="<?=$row->row()->kdorder?>" readonly />
                                    <input class=" m-ctrl-medium date-picker"  name="tglmulai" id="tglmulai" size="16" type="text" value="<?=$row->row()->tglmulai?>" <?php if($row->row()->tglmulai !== NULL || $row->row()->tglmulai != ''){echo 'readonly'; } ?> />
                                    <!-- <input type="text" name="tglmulai" id="tglmulai" class="span12" required /></td> -->
                                </tr>
                                <tr>
                                  <td><label>Jam Mulai:</label></td>
                                  <td>
                                    <div class="input-append bootstrap-timepicker-component">
                                            <input class=" m-ctrl-small timepicker-24" type="text" name="jammulai" id="jammulai" value="<?=$row->row()->jammulai?>" <?php if($row->row()->jammulai !== NULL || $row->row()->jammulai != ''){echo 'readonly'; } ?> />
                                            <span class="add-on"><i class="icon-time"></i></span>
                                        </div>
                                  </td>
                                    <!-- <input type="text" name="jammulai" id="jammulai" class="span12" required value="<?=$row->row()->jammulai?>" /></td> -->
                                </tr>
                                <?php if((($row->row()->jammulai === NULL || $row->row()->jammulai == '') && ($row->row()->tglmulai === NULL || $row->row()->tglmulai == ''))){?>
                                <tr>
                                  <td></td>
                                  <td>                                    
                                    <button type="submit" class="btn btn-success" >Proses</button>                                    
                                  </td>
                                </tr>    
                                <?php }?>                           
                              </table>
                              
                            </form>
                        </div>
                  </div>
                  <div class="widget">
                        <div class="widget-title">
                           <h4><i class="icon-globe"></i>Aksi Breakdown</h4>
                           <span class="tools">
                           <a href="javascript:;" class="icon-chevron-down"></a>
                           <a href="javascript:;" class="icon-remove"></a>
                           </span>                    
                        </div>
                        <div class="widget-body">
                            <form action="<?=base_url()?>order_breakdown/simpanorderbreakdownaksi" method="POST">
                              <table class="table table-striped">
                                <tr>
                                  <td><label>Aksi:</label></td>
                                  <td>
                                    <input type="hidden" name="kdorder2" id="kdorder2" class="span12" required value="<?=$row->row()->kdorder?>" readonly /><textarea name="aksibreakdown" class="span12"></textarea></td>
                                </tr>
                                <tr>
                                  <td></td>
                                  <td><button type="submit" class="btn btn-success">Proses</button></td>
                                </tr>                               
                              </table>
                              
                            </form>
                            <table class="table table-striped">
                              <tr>
                                <th>No.</th>
                                <th>Detail Aksi</th>
                                <th></th>
                              </tr>
                              <?php $no = 1; foreach($aksi->result() as $row_aksi){?>
                              <tr>
                                <td><?=$no++?>.</td>
                                <td><?=$row_aksi->aksi?></td>
                                <td><a href="<?=base_url()?>order_breakdown/hapus_aksi/<?=$row_aksi->kd?>/<?=$row_aksi->kdorder?>" onclick='return confirm("Apakah anda yakin akan menghapus data ini?")'>Hapus</a></td>
                              </tr>
                              <?php }?>
                            </table>
                        </div>
                  </div>
                  <div class="widget">
                        <div class="widget-title">
                           <h4><i class="icon-globe"></i>Mekanik Breadkdown</h4>
                           <span class="tools">
                           <a href="javascript:;" class="icon-chevron-down"></a>
                           <a href="javascript:;" class="icon-remove"></a>
                           </span>                    
                        </div>
                        <div class="widget-body">
                            <form action="<?=base_url()?>order_breakdown/simpanorderbreakdownmekanik" method="POST">
                              <table class="table table-striped">
                                <tr>
                                  <td><label>Nama Mekanik:</label></td>
                                  <td>
                                    <input type="hidden" name="kdorder4" id="kdorder4" class="span12" required value="<?=$row->row()->kdorder?>" readonly /><input name="namamekanik" class="span12"/></td>
                                </tr>
                                <tr>
                                  <td></td>
                                  <td><button type="submit" class="btn btn-success">Proses</button></td>
                                </tr>                               
                              </table>
                              
                            </form>
                            <table class="table table-striped">
                              <tr>
                                <th>No.</th>
                                <th>Mekanik</th>
                                <th></th>
                              </tr>
                              <?php $no = 1; foreach($list_mekanik->result() as $row_mekanik){?>
                              <tr>
                                <td><?=$no++?>.</td>
                                <td><?=$row_mekanik->namamekanik?></td>
                                <td><a href="<?=base_url()?>order_breakdown/hapus_mekanik/<?=$row_mekanik->kd?>/<?=$row_mekanik->kdorder?>" onclick='return confirm("Apakah anda yakin akan menghapus data ini?")'>Hapus</a></td>
                              </tr>
                              <?php }?>
                            </table>
                        </div>
                  </div>
                  <div class="widget">
                        <div class="widget-title">
                           <h4><i class="icon-globe"></i>Problem Breadkdown</h4>
                           <span class="tools">
                           <a href="javascript:;" class="icon-chevron-down"></a>
                           <a href="javascript:;" class="icon-remove"></a>
                           </span>                    
                        </div>
                        <div class="widget-body">
                            <form action="<?=base_url()?>order_breakdown/simpanorderbreakdownproblem" method="POST">
                              <table class="table table-striped">
                                <tr>
                                  <td><label>Problem:</label></td>
                                  <td>
                                    <input type="hidden" name="kdorder6" id="kdorder6" class="span12" required value="<?=$row->row()->kdorder?>" readonly /><textarea name="problem" class="span12"/></textarea></td>
                                </tr>
                                <tr>
                                  <td></td>
                                  <td><button type="submit" class="btn btn-success">Proses</button></td>
                                </tr>                               
                              </table>
                              
                            </form>
                            <table class="table table-striped">
                              <tr>
                                <th>No.</th>
                                <th>Problem</th>
                                <th></th>
                              </tr>
                              <?php $no = 1; foreach($list_problem->result() as $row_problem){?>
                              <tr>
                                <td><?=$no++?>.</td>
                                <td><?=$row_problem->problem?></td>
                                <td><a href="<?=base_url()?>order_breakdown/hapus_problem/<?=$row_problem->kd?>/<?=$row_problem->kdorder?>" onclick='return confirm("Apakah anda yakin akan menghapus data ini?")'>Hapus</a></td>
                              </tr>
                              <?php }?>
                            </table>
                        </div>
                  </div>
               </div>
            </div>
            <!-- END PAGE CONTENT-->         
         </div>
         <!-- END PAGE CONTAINER-->
      </div>
      <!-- END PAGE -->  