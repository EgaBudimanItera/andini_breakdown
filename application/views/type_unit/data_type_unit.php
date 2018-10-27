<!-- BEGIN PAGE -->  
<div id="main-content">
         <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->   
            <div class="row-fluid">
               <div class="span12">
                   
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                   <h3 class="page-title">
                     Master type unit
                     
                  </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                       </li>
                       <li>
                           <a href="#">Master type unit</a> <span class="divider">&nbsp;</span>
                       </li>
                       <li><a href="#">Data type unit</a><span class="divider-last">&nbsp;</span></li>
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
                           <h4><i class="icon-globe"></i>Data type unit</h4>
                           <span class="tools">
                           <a href="javascript:;" class="icon-chevron-down"></a>
                           <a href="javascript:;" class="icon-remove"></a>
                           </span>                    
                        </div>
                        <div class="widget-body">
                          
                            <div class="portlet-body">
                                <div class="clearfix">
                                    <div class="btn-group">
                                        <button id="" class="btn green add_type_unit">
                                            Add New <i class="icon-plus"></i>
                                        </button>
                                    </div>
                                    
                                </div>
                                <div class="space15"></div>
                                <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode type</th>
                                        <th>Merk type</th>
                                        <th>Jenis type</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1;foreach($row->result() as $record){?>
                                    <tr class="">
                                        <td><?=$no++?>.</td>
                                        <td><?=$record->kode_type?></td>
                                        <td><?=$record->namamerk?></td>  
                                        <td><?=$record->namajenis?></td>                                        
                                        <td><a href="#" class="editdata" id="<?=$record->id_type_unit?>">Edit</a></td>
                                        <td><a href="#" class="deletedata" id="<?=$record->id_type_unit?>">Delete</a></td>
                                    </tr>
                                    <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                  </div>
               </div>
            </div>
            <!-- END PAGE CONTENT-->         
         </div>
         <!-- END PAGE CONTAINER-->
      </div>
      <!-- END PAGE -->  

<!-- Modal -->
<div id="modal_type_unit" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Type unit</h4>
      </div>
      <div class="modal-body">
        <form id="form_type_unit">
          <div class="form-group">
            <label>Kode type unit <!-- <small>(max. 5 char)</small> --></label>
            <input type="hidden" name="aksitypeunit" id="aksitypeunit"/>
            <input type="text" name="kode_tipe_unit" id="kode_tipe_unit" class="span12" required />
            <input type="hidden" name="idtypeunit" id="idtypeunit"/>
          </div>
          <div class="form-group">
            <label>Merk type unit </label>
              <select type="text" name="merk_tipe_unit" id="merk_tipe_unit" class="span12 chosen" required>
                <option value="">--pilih--</option>
                <?php foreach($merk->result() as $record_merk){?>
                <option value="<?=$record_merk->kdmerk?>"><?=$record_merk->namamerk?></option>
                <?php }?>
              </select>
            <!-- <input type="text" name="merk_tipe_unit" id="merk_tipe_unit" class="span12" required/> -->
          </div>
          
          <div class="form-group">
            <label>Jenis Type Unit</label>
            <select type="text" name="jenis_tipe_unit" id="jenis_tipe_unit" class="span9 chosen" required>
              <option value="">--pilih--</option>
              <?php foreach($jenis->result() as $l){?>
              <option value="<?=$l->kdjenis?>"><?=$l->namajenis?></option>
              <?php }?>
            </select>
            <!-- <input type="text" name="merk_tipe_unit" id="merk_tipe_unit" class="span12" required/> -->

          </div>
          
          <button type="submit" class="btn btn-success">Save</button>
        </form>

        <div id="notif_type_unit"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Modal -->
<div id="modal_type_unit_hapus" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Type unit</h4>
      </div>
      <div class="modal-body">
        <p>Apakah anda yakin akan menghapus data ini?</p>
        <button class="btn btn-danger btn-sm ya_hapus_type_unit">Ya</button> <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Tidak</button><br/><br/>
        <div id="notif_type_unit_hapus"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>