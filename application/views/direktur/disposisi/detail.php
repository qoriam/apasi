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
                        <h3 class="card-title">Detail Disposisi</h3>
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
                                <label class="col-9 text-left control-label col-form-label">Pengirim &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $data->pengirim; ?></label> 

                                <label class="col-9 text-left control-label col-form-label">No Surat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $data->no_surat; ?></label> 

                                <label class="col-9 text-left control-label col-form-label">Tanggal Surat : <?= $data->tgl_surat; ?></label> 

                                <label class="col-9 text-left control-label col-form-label">Lampiran &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $data->lampiran; ?> 
                                <a  class="" href="<?= base_url('assets/lampiran/'.$data->lampiran) ?>" target="_blank"> &nbsp; lihat</a>
                                </label> 

                                <label class="col-9 text-left control-label col-form-label">Perihal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $data->perihal; ?></label> 

                                </div>   
                            </div> 
                                    
                            </div>                          
                    <!-- error jika belum ada isi nya -->
                    <!-- <div class="alert alert-danger">sada</div> -->
                    
                    <div class="col-12">
                        <div class="card">
                            <div class="table-responsive">
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
                                        <?php
                                        foreach($dispo_direktur as $d) : 
                                        ?>
                                        <tr>
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
                                                if($d->status == 1){
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

                                        <tr>
                                            <td>
                                                <?= $wadir->jabatan;?>
                                            </td>
                                           <?php 
                                           $surat = "SELECT `suratmasuk`.`dispo_wadir_id`, `suratmasuk`.`dispo_pimpinan_id`, `dispo_direktur`.`wadir_id` 
                                           from `dispo_direktur`, `suratmasuk` 
                                           where `dispo_direktur`.`surat_masuk_id` = `suratmasuk`.`id` 
                                           and `suratmasuk`.`id` = $suratmasuk_id 
                                           and `dispo_direktur`.`status` = 1";
                                            $hasilsurat = $this->db->query($surat)->row(); ?>

                                           <?php 
                                             $id_dispo_wadir = $hasilsurat->dispo_wadir_id;
                                            $dispo_wadir = "SELECT `dispo_wadir`.*, `jabatan`.`jabatan` 
                                                            from  `dispo_wadir`, `jabatan` 
                                                            where `dispo_wadir`.`id` = $id_dispo_wadir  
                                                            and `dispo_wadir`.`pimpinan_id` = `jabatan`.`id`";
                                            $disp_wadir = $this->db->query($dispo_wadir)->row();
                                            ?>

                                            <td><?= $disp_wadir->jabatan ?></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                        <div>
                            <a  class="btn btn-primary" href="<?= site_url('CetakDisposisi/suratmasuk/'.$data->id); ?>" title="Detail" target="_blank"><i class="fas fa-print"></i>&nbsp;Cetak</a>
                            </div>
                    </div>
            </div>
        </div>
    </div>
</div>
<!-- Row -->