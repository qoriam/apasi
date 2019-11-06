<?php 
$hilang = "";
$id = $this->uri->segment(4);
?>

<div class="container-fluid">
    
<!-- ============================================================== -->
<!-- Start Page Content -->    
<!-- Row -->
<div class="row p-t-20">
    <div class="col-lg-12">
        <div class="card card-outline-info">            
            <div class="card-body">
                <!-- <form action="<?= site_url('direktur/disposisi/dispo_direktur/'.$data->id);?>" method="post" class="form-horizontal">
                <input type="hidden" name="id_suratmasuk" value="<?= $data->id;?>"> -->
                    <div class="form-body">
                        <h3 class="card-title"> Detail Disposisi</h3>
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
                                <label class="col-9 text-left control-label col-form-label">Non agenda : <?php echo $jumlahSuratmasuk; ?></label> 
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
                                <label class="col-9 text-left control-label col-form-label">Pengirim &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $data->pengirim; ?></label> 

                                <label class="col-9 text-left control-label col-form-label">No Surat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $data->no_surat; ?></label> 

                                <label class="col-9 text-left control-label col-form-label">Tanggal Surat : <?= $data->tgl_surat; ?></label> 

                                <label class="col-9 text-left control-label col-form-label">Lampiran &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $data->lampiran; ?> <a  class="" href="<?= base_url('assets/lampiran/'.$data->lampiran) ?>" target="_blank"> &nbsp; lihat</a>
                                </label>  

                                <label class="col-9 text-left control-label col-form-label">Perihal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $data->perihal; ?></label> 

                                </div>   
                            </div> 

                    <div class="col-12">
                        <div class="card">
                        <div class="table-responsive">
                        <?php $surat = $this->db->get_where('suratmasuk',['id' => $data->id])->row(); ?>
                            <table class="table table-bordered" width="600px">
                                <thead>
                                    <tr>                                        
                                        <th width="150px" >Dari</th>
                                        <th width="150px">Kepada</th>
                                        <th width="200px">Isi</th>
                                        <th width="100px">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php 
                                            $suratmasuk_id = $data->id;
                                            $surat = "SELECT `suratmasuk`.`dispo_wadir_id`, `suratmasuk`.`dispo_pimpinan_id`, `dispo_direktur`.`wadir_id` from `dispo_direktur`, `suratmasuk` where `dispo_direktur`.`surat_masuk_id` = `suratmasuk`.`id` and `suratmasuk`.`id` = $suratmasuk_id and `dispo_direktur`.`status` = 1";
                                            $hasilsurat = $this->db->query($surat)->row();

                                            $jabatan_id = $hasilsurat->wadir_id;
                                            $dispo_dir = $this->Disposisi_model->dispo_dir($suratmasuk_id, $jabatan_id);

                                            ?>

                                        <td>Direktur</td>
                                        <td><?= $dispo_dir->jabatan ?></td>
                                        <td><?= $dispo_dir->isi ?></td>
                                        <td>
                                            <?php 
                                            if($dispo_dir->status == 1){
                                                echo "Sudah dikonfirmasi";
                                            }else if($dispo_dir->status == 2){
                                                echo "Sudah dilaksanakan";
                                            } else {
                                                echo "Belum dikonfirmasi";
                                            } ?>
                                        </td>
                                    </tr>
                                    <?php if($hasilsurat->dispo_wadir_id == 0) : ?>
                                        <tr>
                                            <?php 
                                                $jabatan_id = $this->session->userdata('jabatan_id');
                                                $dispo_wadir = $this->Disposisi_model->dispo_wadir($suratmasuk_id, $jabatan_id);

                                                ?>

                                            <td><?= $dispo_dir->jabatan ?></td>
                                            <td><?= $dispo_wadir->jabatan ?></td>
                                            <td><?= $dispo_wadir->isi ?></td>
                                            <td>
                                                <?php 
                                                if($dispo_wadir->status == 1){
                                                    echo "Sudah dikonfirmasi";
                                                }else if($dispo_wadir->status ==2){
                                                    echo "Sudah dilaksanakan";
                                                    $hilang = "ya";
                                                } else {
                                                    echo "Belum dikonfirmasi";
                                                } ?>
                                            </td>
                                        </tr>
                                    <?php else : 
                                        ?>
                                        <tr>
                                            <?php 
                                                $id_dispo_wadir = $hasilsurat->dispo_wadir_id;
                                                $dispo_wadir = "SELECT `dispo_wadir`.*, `jabatan`.`jabatan` 
                                                                from  `dispo_wadir`, `jabatan` 
                                                                where `dispo_wadir`.`id` = $id_dispo_wadir  
                                                                and `dispo_wadir`.`pimpinan_id` = `jabatan`.`id`";
                                                $disp_wadir = $this->db->query($dispo_wadir)->row();

                                                ?>

                                            <td><?= $dispo_dir->jabatan ?></td>
                                            <td><?= $disp_wadir->jabatan ?></td>
                                            <td><?= $disp_wadir->isi ?></td>
                                            <td>
                                                <?php 
                                                if($disp_wadir->status == 1){
                                                    echo "Sudah dikonfirmasi";
                                                }else if($disp_wadir->status == 2){
                                                    echo "Sudah dilaksanakan";
                                                } else {
                                                    echo "Belum dikonfirmasi";
                                                } ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <?php 
                                                if($hasilsurat->dispo_pimpinan_id == 0) {

                                                    $jabatan_id = $this->session->userdata('jabatan_id');
                                                    $disp_pimpinan = $this->Disposisi_model->dispo_pimpinan($suratmasuk_id, $jabatan_id);
                                                } else {

                                                    $id_dispo_pimpinan = $hasilsurat->dispo_pimpinan_id;
                                                    $dispo_pimpinan1 = "SELECT `dispo_pimpinan`.*,  `jabatan`.`jabatan` 
                                                    from  `dispo_pimpinan`, `jabatan` 
                                                    where `dispo_pimpinan`.`id` = $id_dispo_pimpinan 
                                                    and `dispo_pimpinan`.`pimpinan_id` = `jabatan`.`id`";
                                                    $disp_pimpinan = $this->db->query($dispo_pimpinan1)->row();
                                                }
                                                

                                                ?>

                                            <td><?= $disp_wadir->jabatan ?></td>
                                            <td><?= $disp_pimpinan->jabatan ?></td>
                                            <td><?= $disp_pimpinan->isi ?></td>
                                            <td>
                                                <?php 
                                                if($disp_pimpinan->status == 1){
                                                    echo "Sudah dikonfirmasi";
                                                } else if($disp_pimpinan->status == 2){
                                                    echo "Sudah dilaksanakan";
                                                } else {
                                                    echo "Belum dikonfirmasi";
                                                } ?>
                                            </td>
                                        </tr>

                                    <?php endif; ?>
                                    <!--  -->
                                </tbody>
                            </table>                            
                        </div>                
                        </div> 
                        <div>
                            <a  class="btn btn-primary" href="<?= site_url('CetakDisposisi/suratmasuk/'.$data->id); ?>" title="Detail" target="_blank"><i class="fas fa-print"></i>&nbsp;Cetak Disposisi</a>
                        </div>                           
         </div>

        <?php if($hilang != "ya") : ?>

         <div class="col-12 p-t-20">
            <div class="card">
            <div class="card-body">
                <?php $surat = $this->db->get_where('suratmasuk',['id' => $data->id])->row(); ?>
                <form action="<?= site_url('pimpinan/disposisi/laporan/'.$data->id); ?>" method="post" enctype="multipart/form-data">
                    <h3 class="card-title">Laporan</h3>
                    <hr>

                    <div class="form-group">
                        <h5>Keterangan <span class="text-danger">*</span></h5>
                        <textarea class="textarea_editor form-control" rows="3" id="perihal" name="keterangan"><?= set_value('keterangan'); ?></textarea>
                        <?= form_error('keterangan', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                <h5>File Laporan<span class="text-danger">*<br>File harus fotmat .pdf dan besar file maksimal 4mb </span>
                               
                                </h5>
                                    <label for="input-file-now">Klik / Drag & Drop</label>
                                    <input required accept=".pdf" type="file" <?php echo form_upload(['name'=>'file', 'class'=>'form-control']); ?>  
                                   
                                    <?= form_error('file', '<small class="text-danger">', '</small>'); ?>
                                    
                                </div>
                            </div>                           
                        </div>
                    </div>

                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                        <a href="<?= base_url('admin/suratmasuk') ?>" class="btn btn-inverse">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                </form>             
            </div>                
            </div>  
        </div>  

        <?php else : ?>
        <div class="col-12 p-t-20">
            <div class="card">
            <div class="card-body">
                <form action="" method="post" enctype="">
                    <h3 class="card-title">Laporan</h3>
                    <hr>                     
                    <?php 
                    $suratmasuk_id =  $data->id;
                    $laporan = "SELECT `laporan`.*, `suratmasuk`.`laporan_id`
                    from  `laporan`
                    join `suratmasuk`
                    where `laporan`.`id` = `suratmasuk`.`laporan_id`
                    ";
                    $lapor = $this->db->query($laporan)->row();
                    ?>
                 

                    <div class="form-group">
                        <h5>Keterangan : <?= $lapor->keterangan ?></h5>                        
                    </div>
                    <div class="form-group">
                        <h5>File Laporan :<a  class="" href="<?= base_url('assets/laporan/'.$lapor->file) ?>" 
                        target="_blank"><?= $lapor->file; ?></a></h5>
                    </div>
                </form>             
            </div>                
            </div>  
        </div>  
       <?php endif ?> 

    </div>
</div>
<!-- Row -->
