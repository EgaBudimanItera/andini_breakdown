<!-- BEGIN PAGE -->  
<div id="main-content">
         <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->   
            <div class="row-fluid">
               <div class="span12">
                   
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                   <h3 class="page-title">
                     Master unit
                     
                  </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                       </li>
                       <li>
                           <a href="#">Master unit</a> <span class="divider">&nbsp;</span>
                       </li>
                       <li><a href="#">Data unit</a><span class="divider-last">&nbsp;</span></li>
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
                           <h4><i class="icon-globe"></i>Data unit</h4>
                           <span class="tools">
                           <a href="javascript:;" class="icon-chevron-down"></a>
                           <a href="javascript:;" class="icon-remove"></a>
                           </span>                    
                        </div>
                        <div class="widget-body">
                            <div class="portlet-body">
                                <div class="clearfix">
                                    <div class="btn-group">
                                        <button id="" class="btn green add_unit">
                                            Add New <i class="icon-plus"></i>
                                        </button>
                                    </div>
                                    
                                </div>
                                <div class="space15"></div>
                                <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode unit</th>
                                        <th>Tipe unit</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1;foreach($row->result() as $record){?>
                                    <tr class="">
                                        <td><?=$no++?>.</td>
                                        <td><?=$record->kdunit?></td>
                                        <td><?=$record->tipeunit?></td>                                        
                                        <td><a href="#" class="editdata" id="<?=$record->kdunit?>">Edit</a></td>
                                        <td><a href="#" class="deletedata" id="<?=$record->kdunit?>">Delete</a></td>
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
<div id="modal_unit_edit" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">unit</h4>
      </div>
      <div class="modal-body">
        <form id="form_unit_edit">
          <div class="form-group">
            <label>Kode unit <small>(max. 5 char)</small></label>
            <input type="text" name="kode_unit_edit" id="kode_unit_edit" class="span12" maxlength="5" readonly required />

          </div>
          <div class="form-group">
            <label>Jenis </label>
            <select name="kode_jenis_edit" id="kode_jenis_edit" class="span12" required >
              <option value="">--pilih--</option>
              <?php foreach($jenis->result() as $jns){?>
              <option value="<?=$jns->kdjenis?>"><?=$jns->namajenis?></option>
              <?php }?>
            </select>
          </div>
          <div class="form-group">
            <label>Tipe unit</label>
            <input type="text" name="tipe_unit_edit" id="tipe_unit_edit" class="span12" required/>
          </div>
          <div class="form-group">
            <label>Merk </label>
            <select name="kode_merk_edit" id="kode_merk_edit" class="span12" required >
              <option value="">--pilih--</option>
              <?php foreach($merk->result() as $mrk){?>
              <option value="<?=$mrk->kdmerk?>"><?=$mrk->namamerk?></option>
              <?php }?>
            </select>
          </div>
          <div class="form-group">
            <label>Wilayah unit</label>
            <input type="text" name="wilayah_unit_edit" id="wilayah_unit_edit" class="span12" required/>
          </div>
          <div class="form-group">
            <label>HM awal</label>
            <input type="text" name="hmawal_edit" id="hmawal_edit" class="span12" required/>
          </div>
          <div class="form-group">
            <label>HM akhir</label>
            <input type="text" name="hmakhir_edit" id="hmakhir_edit" class="span12" required/>
          </div>
          <button type="submit" class="btn btn-success">Save</button>
        </form>
        <div id="notif_unit_edit"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Modal -->
<div id="modal_unit_hapus" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">unit</h4>
      </div>
      <div class="modal-body">
        <p>Apakah anda yakin akan menghapus data ini?</p>
        <button class="btn btn-danger btn-sm ya_hapus_unit">Ya</button> <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Tidak</button><br/><br/>
        <div id="notif_unit_hapus"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Modal -->
<div id="modal_unit" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">unit</h4>
      </div>
      <div class="modal-body">
        <form id="form_unit">
          <div class="form-group">
            <label>Kode unit <small>(max. 5 char)</small></label>
            <input type="text" name="kode_unit" id="kode_unit" class="span12" maxlength="5" required />

          </div>
          <div class="form-group">
            <label>Jenis </label>
            <select name="kode_jenis" id="kode_jenis" class="span12" required >
              <option value="">--pilih--</option>
              <?php foreach($jenis->result() as $jns){?>
              <option value="<?=$jns->kdjenis?>"><?=$jns->namajenis?></option>
              <?php }?>
            </select>
          </div>
          <div class="form-group">
            <label>Tipe unit</label>
            <input type="text" name="tipe_unit" id="tipe_unit" class="span12" required/>
          </div>
          <div class="form-group">
            <label>Merk </label>
            <select name="kode_merk" id="kode_merk" class="span12" required >
              <option value="">--pilih--</option>
              <?php foreach($merk->result() as $mrk){?>
              <option value="<?=$mrk->kdmerk?>"><?=$mrk->namamerk?></option>
              <?php }?>
            </select>
          </div>
          <div class="form-group">
            <label>Wilayah unit</label>
            <input type="text" name="wilayah_unit" id="wilayah_unit" class="span12" required/>
          </div>
          <div class="form-group">
            <label>HM awal</label>
            <input type="text" name="hmawal" id="hmawal" class="span12" required/>
          </div>
          <div class="form-group">
            <label>HM akhir</label>
            <input type="text" name="hmakhir" id="hmakhir" class="span12" required/>
          </div>
          <button type="submit" class="btn btn-success">Save</button>
        </form>
        <div id="notif_unit"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>