<!-- BEGIN PAGE -->  
<div id="main-content">
         <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->   
            <div class="row-fluid">
               <div class="span12">
                   
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                   <h3 class="page-title">
                     Master user
                     
                  </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                       </li>
                       <li>
                           <a href="#">Master user</a> <span class="divider">&nbsp;</span>
                       </li>
                       <li><a href="#">Data user</a><span class="divider-last">&nbsp;</span></li>
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
                           <h4><i class="icon-globe"></i>Data user</h4>
                           <span class="tools">
                           <a href="javascript:;" class="icon-chevron-down"></a>
                           <a href="javascript:;" class="icon-remove"></a>
                           </span>                    
                        </div>
                        <div class="widget-body">
                            <div class="portlet-body">
                                <div class="clearfix">
                                    <div class="btn-group">
                                        <button id="" class="btn green add_user">
                                            Add New <i class="icon-plus"></i>
                                        </button>
                                    </div>
                                    
                                </div>
                                <div class="space15"></div>
                                <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID user</th>
                                        <th>Nama user</th>
                                        <th>Username</th>
                                        <th>Hak Akses</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1;foreach($row->result() as $record){?>
                                    <tr class="">
                                        <td><?=$no++?>.</td>
                                        <td><?=$record->id_user?></td>
                                        <td><?=$record->nama?></td>
                                        <td><?=$record->username?></td> 
                                        <td><?=$record->hak_akses?></td>                                       
                                        <td><a href="#" class="editdata" id="<?=$record->id_user?>">Edit</a></td>
                                        <td><a href="#" class="deletedata" id="<?=$record->id_user?>">Delete</a></td>
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
<div id="modal_user" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">user</h4>
      </div>
      <div class="modal-body">
        <form id="form_user">
          <div class="form-group">
            <label>Kode user <small>(max. 5 char)</small></label>
            <input type="text" name="kode_user" id="kode_user" class="span12" maxlength="5" required />

          </div>
          <div class="form-group">
            <label>Nama user</label>
            <input type="text" name="nama_user" id="nama_user" class="span12" required/>
          </div>
          <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" id="username" class="span12" required/>
          </div>
          <div class="form-group">
            <label>Hak Akses</label>
            <select name="hak_akses" id="hak_akses" class="span12" required>
              <option value="">--pilih--</option>
              <option value="admin">admin</option>
              <option value="pimpinan">pimpinan</option>
              <option value="engineering">engineering</option>
            </select>
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="text" name="password" id="password" class="span12" required/>
          </div>
          <button type="submit" class="btn btn-success">Save</button>
        </form>
        <div id="notif_user"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<!-- Modal -->
<div id="modal_user_edit" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">user</h4>
      </div>
      <div class="modal-body">
        <form id="form_user_edit">
          <div class="form-group">
            <label>Kode user <small>(max. 5 char)</small></label>
            <input type="text" name="kode_user_edit" id="kode_user_edit" class="span12" maxlength="5" required readonly />

          </div>
          <div class="form-group">
            <label>Nama user</label>
            <input type="text" name="nama_user_edit" id="nama_user_edit" class="span12" required/>
          </div>
          <div class="form-group">
            <label>Username</label>
            <input type="text" name="username_edit" id="username_edit" class="span12" readonly required/>
          </div>
          <div class="form-group">
            <label>Hak Akses</label>
            <select name="hak_akses_edit" id="hak_akses_edit" class="span12" required>
              <option value="">--pilih--</option>
              <option value="admin">admin</option>
              <option value="pimpinan">pimpinan</option>
              <option value="engineering">engineering</option>
            </select>
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="text" name="password_edit" id="password_edit" class="span12" required/>
          </div>
          <button type="submit" class="btn btn-success">Save</button>
        </form>
        <div id="notif_user_edit"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Modal -->
<div id="modal_user_hapus" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">user</h4>
      </div>
      <div class="modal-body">
        <p>Apakah anda yakin akan menghapus data ini?</p>
        <button class="btn btn-danger btn-sm ya_hapus_user">Ya</button> <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Tidak</button><br/><br/>
        <div id="notif_user_hapus"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>