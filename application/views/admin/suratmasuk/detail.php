<?php 
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
                <input type="hidden" name="id" value="<?= $data->id;?>">
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
                                <label class="col-9 text-left control-label col-form-label">Nomor agenda : <?php echo $jumlahSuratmasuk; ?></label> 
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
                                <label class="col-9 text-left control-label col-form-label">Pengirim &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;: <?= $data->pengirim; ?></label> 

                                <label class="col-9 text-left control-label col-form-label">No Surat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $data->no_surat; ?></label> 

                                <label class="col-9 text-left control-label col-form-label">Tanggal Surat : <?= $data->tgl_surat; ?></label> 

                                <label class="col-9 text-left control-label col-form-label">
                                    Lampiran &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;: <?= $data->lampiran; ?> <a  class="" href="<?= base_url('assets/lampiran/'.$data->lampiran) ?>" target="_blank"> &nbsp;lihat</a>
                                </label>  

                                <label class="col-9 text-left control-label col-form-label">Perihal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $data->perihal; ?></label> 

                                </div>   
                            </div> 
                    </div>        


 