<div class="container-fluid">
    
<!-- ============================================================== -->
<!-- Start Page Content -->    
<!-- Row -->
<div class="row p-t-20">
    <div class="col-lg-12">
        <div class="card card-outline-info">            
            <div class="card-body">
                <form action="<?= site_url('direktur/disposisi/dispo_direktur/'.$data->id);?>" method="post" class="form-horizontal">
                <input type="hidden" name="id_suratmasuk" value="<?= $data->id;?>">
                    <div class="form-body">
                        <h3 class="card-title">Disposisi</h3>
                        <hr>
                        <div class="row p-t-1">                                                
                            <div class="col-md-5">
                                <div class=" row"> 
                                <h3 class="col-9 text-left control-label col-form-label">Tanggal terima :  <?= $data->tgl_terima; ?></h3> 
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-7">
                                <div class="form-group row">
                                <label class="col-9 text-left control-label col-form-label">No agenda : <?php echo $jumlahSuratmasuk; ?></label> 
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">   
                            <div class="col-md-5">
                            <label class="control-label">Jenis Disposisi</label>
                            <div class="demo-radio-button">
                           <?php 
                            if ($data->jenis_id == '1') {
                               echo'                              
                               <input name="jenis_id" type="radio" id="radio_32" class="with-gap radio-col-blue" checked value="Rahasia">
                               <label for="radio_31">Rahasia</label>

                               <input name="jenis_id" type="radio" id="radio_32" class="with-gap radio-col-blue" value="Penting">
                                <label for="radio_31">Penting</label>

                                <input type="radio" name="jenis_id" value="Segera">
                                <label for="radio_33">Segera</label>

                                <input name="group5" type="radio" id="radio_33" class="with-gap radio-col-blue" />
                                <label for="radio_33">Biasa</label>
                               ';
                            }

                            if ($data->jenis_id == '2') {
                                echo'                              
                                <input name="jenis_id" type="radio" id="radio_32" class="with-gap radio-col-blue"  value="Rahasia">
                                <label for="radio_31">Rahasia</label>
 
                                <input name="jenis_id" type="radio" id="radio_32" class="with-gap radio-col-blue" checked value="Penting">
                                 <label for="radio_31">Penting</label>
 
                                 <input name="jenis_id" type="radio" id="radio_32" class="with-gap radio-col-blue" value="Segera">
                                 <label for="radio_31">Segera</label>
 
                                 <input name="jenis_id" type="radio" id="radio_32" class="with-gap radio-col-blue" value="Biasa">
                                 <label for="radio_33">Biasa</label>
                                ';
                             } 
                             
                             if ($data->jenis_id == '3') {
                                echo'                              
                                <input name="jenis_id" type="radio" id="radio_32" class="with-gap radio-col-blue"  value="Rahasia">
                                <label for="radio_31">Rahasia</label>
 
                                <input name="jenis_id" type="radio" id="radio_32" class="with-gap radio-col-blue"  value="Penting">
                                 <label for="radio_31">Penting</label>
 
                                 <input name="jenis_id" type="radio" id="radio_32" class="with-gap radio-col-blue" checked value="Segera">
                                 <label for="radio_31">Segera</label>
 
                                 <input name="jenis_id" type="radio" id="radio_32" class="with-gap radio-col-blue" value="Biasa">
                                 <label for="radio_33">Biasa</label>
                                ';
                             }  
                             if ($data->jenis_id == '4') {
                                echo'                              
                                <input name="jenis_id" type="radio" id="radio_32" class="with-gap radio-col-blue"  value="Rahasia">
                                <label for="radio_31">Rahasia</label>
 
                                <input name="jenis_id" type="radio" id="radio_32" class="with-gap radio-col-blue"  value="Penting">
                                 <label for="radio_31">Penting</label>
 
                                 <input name="jenis_id" type="radio" id="radio_32" class="with-gap radio-col-blue"  value="Segera">
                                 <label for="radio_31">Segera</label>
 
                                 <input name="jenis_id" type="radio" id="radio_32" class="with-gap radio-col-blue" checked value="Biasa">
                                 <label for="radio_33">Biasa</label>
                                ';
                             }            
                           ?>

                                </div> 
                            </div>   
                                    
                                    <!-- bawahe -->  
                                
                            <div class="col-md-7">
                                <div class="form-group row">
                                <label class="col-9 text-left control-label col-form-label">Pengirim &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $data->pengirim; ?></label> 

                                <label class="col-9 text-left control-label col-form-label">No Surat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $data->no_surat; ?></label> 

                                <label class="col-9 text-left control-label col-form-label">Tanggal Surat : <?= $data->tgl_surat; ?></label> 

                                <label class="col-9 text-left control-label col-form-label">Lampiran &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $data->lampiran; ?> 
                                <a  class="" href="<?= base_url('assets/lampiran/'.$data->lampiran) ?>" target="_blank"> &nbsp; lihat</a>
                                </label> 

                                <label class="col-9 text-left control-label col-form-label">Perihal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $data->perihal; ?></label> 

                                </div>   
                            </div> 
                                    
                            </div>                          
                           
                    <hr>

                    <!-- error jika belum ada isi nya -->
                    <!-- <div class="alert alert-danger">sada</div> -->
                    
                    <div class="col-12">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Tambah</button>
                        <br><br>
                        <div class="card">
                            <div class="table-responsive">
                                <table class="table table-bordered" width="600px">
                                    <thead>
                                        <tr>
                                            <th width="20px">No</th>
                                            <th width="150px" >Dari</th>
                                            <th width="150px">Kepada</th>
                                            <th width="200px">Isi</th>
                                            <th width="100px">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        foreach($dispo_direktur as $d) : 
                                        
                                        ?>
                                        <tr>
                                            <td>
                                                <?= $i++ ?>
                                            </td>
                                            <td>
                                                Direktur
                                            </td>
                                            <td>
                                                <?php
                                                $query = "SELECT `jabatan`.`jabatan` from `jabatan`, `pegawai` where `jabatan`.`id` = `pegawai`.`jabatan_id` and `jabatan`.`id` = $d->wadir_id";
                                                $wadir = $this->db->query($query)->row(); 
                                                echo $wadir->jabatan; 
                                                ?>
                                            </td>
                                            <td>
                                                <?= $d->isi ?>
                                            </td>
                                            <td>
                                                <?php 
                                                if($d->status == 1 || $d->approve == 1){
                                                    echo "Sudah dikonfirmasi";
                                                } else {
                                                    echo "Belum dikonfirmasi";
                                                } ?>
                                            </td>
                                        </tr>

                                        <?php endforeach;
                                        if(count($dispo_direktur) < 1) : ?>
                                        <tr>
                                            <td colspan="5" align="center">Data masih kosong</td>
                                        </tr>
                                        <?php endif ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
<!-- Row -->

<!-- MODAL -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <form action="<?= site_url('direktur/disposisi/dispo_direktur/'.$data->id); ?>" method="post">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Disposisi ke Wadir</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="col-12">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="600px">
                            <thead>
                                <tr>
                                    <th width="150px" >Dari</th>
                                    <th width="150px">Kepada</th>
                                    <th width="200px">Isi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                        Direktur
                                        </div>
                                    </td>
                                    <td>
                                    <div class="form-group">

                                            <select name="tujuan" class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1">
                                            <option value="">Pilih Tujuan</option>
                                            <?php foreach($jabatan as $j) {
                                                $dispo_direktur = $this->db->get_where('dispo_direktur',['surat_masuk_id' => $data->id,'wadir_id' => $j->id])->row();

                                                if($dispo_direktur){
                                                    continue;
                                                }
                                                ?>
                                            <option value="<?= $j->id?>"><?= $j->jabatan ?></option>
                                            <?php } ?>
                                            </select>
                                        </div>
                                        
                                    </td>
                                    <td> 
                                    <textarea class="textarea_editor form-control" rows="3" placeholder="Isi ..." id="isi" name="isi"></textarea>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </form>
    </div>
  </div>
</div>