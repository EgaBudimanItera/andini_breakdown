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
                            <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Order</th>
                                        <th>Nama</th>
                                        <th>Divisi</th>
                                        <th>Unit</th>
                                        <th>Tanggal Order</th>
                                        <th>Jam Order</th>
                                        <th>Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1;foreach($row->result() as $record){?>
                                    <tr class="">
                                        <td><?=$no++?>.</td>
                                        <td><?=$record->kdorder?></td>
                                        <td><?=$record->orderbyname?></td>
                                        <td><?=$record->orderbydiv?></td>   
                                        <td><?=$record->kdunit.' - '.$record->tipeunit.' - '.$record->wilayahunit?></td>
                                        <td><?=$record->tglorder?></td> 
                                        <td><?=$record->jamorder?></td>                                   
                                        <td>
                                          <a class="btn btn-default" href="<?=base_url()?>order_breakdown/detail/<?=$record->kdorder?>" class="editdata" id="<?=$record->kdunit?>">Detail</a>
                                          <a class="btn btn-default" href="<?=base_url()?>order_breakdown/selesaikan/<?=$record->kdorder?>" class="editdata" id="<?=$record->kdunit?>">Selesaikan</a>
                                        </td>
                                    </tr>
                                    <?php }?>
                                    </tbody>
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