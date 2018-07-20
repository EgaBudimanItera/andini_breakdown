<!-- BEGIN PAGE -->  
<div id="main-content">
         <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->   
            <div class="row-fluid">
               <div class="span12">
                   
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                   <h3 class="page-title">
                     Master Kerusakan
                     
                  </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                       </li>
                       <li>
                           <a href="#">Master Kerusakan</a> <span class="divider">&nbsp;</span>
                       </li>
                       <li><a href="#">Data Kerusakan</a><span class="divider-last">&nbsp;</span></li>
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
                           <h4><i class="icon-globe"></i>Data Kerusakan</h4>
                           <span class="tools">
                           <a href="javascript:;" class="icon-chevron-down"></a>
                           <a href="javascript:;" class="icon-remove"></a>
                           </span>                    
                        </div>
                        <div class="widget-body">
                            <div class="portlet-body">
                                <div class="clearfix">
                                    <div class="btn-group">
                                        <button id="" class="btn green add_kerusakan">
                                            Add New <i class="icon-plus"></i>
                                        </button>
                                    </div>
                                    
                                </div>
                                <div class="space15"></div>
                                <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Kerusakan</th>
                                        <th>Nama Kerusakan</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1;foreach($row->result() as $record){?>
                                    <tr class="">
                                        <td><?=$no++?>.</td>
                                        <td><?=$record->kdkerusakan?></td>
                                        <td><?=$record->keterangan?></td>                                        
                                        <td><a href="#" class="editdata" id="<?=$record->kdkerusakan?>">Edit</a></td>
                                        <td><a href="#" class="deletedata" id="<?=$record->kdkerusakan?>">Delete</a></td>
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
<div id="modal_kerusakan" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Kerusakan</h4>
      </div>
      <div class="modal-body">
        <form id="form_kerusakan">
          <div class="form-group">
            <label>Kode Kerusakan <small>(max. 5 char)</small></label>
            <input type="text" name="kode_kerusakan" id="kode_kerusakan" class="span12" maxlength="5" required />

          </div>
          <div class="form-group">
            <label>Nama Kerusakan</label>
            <input type="text" name="nama_kerusakan" id="nama_kerusakan" class="span12" required/>
          </div>
          <button type="submit" class="btn btn-success">Save</button>
        </form>
        <div id="notif_kerusakan"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<!-- Modal -->
<div id="modal_kerusakan_edit" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Kerusakan</h4>
      </div>
      <div class="modal-body">
        <form id="form_kerusakan_edit">
          <div class="form-group">
            <label>Kode Kerusakan <small>(max. 5 char)</small></label>
            <input type="text" name="kode_kerusakan_edit" id="kode_kerusakan_edit" readonly class="span12" maxlength="5" required />

          </div>
          <div class="form-group">
            <label>Nama Kerusakan</label>
            <input type="text" name="nama_kerusakan_edit" id="nama_kerusakan_edit" class="span12" required/>
          </div>
          <button type="submit" class="btn btn-success">Save</button>
        </form>
        <div id="notif_kerusakan_edit"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Modal -->
<div id="modal_kerusakan_hapus" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">kerusakan</h4>
      </div>
      <div class="modal-body">
        <p>Apakah anda yakin akan menghapus data ini?</p>
        <button class="btn btn-danger btn-sm ya_hapus_kerusakan">Ya</button> <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Tidak</button><br/><br/>
        <div id="notif_kerusakan_hapus"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>