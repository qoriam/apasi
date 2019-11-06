<div class="container-fluid">
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="row p-t-20">
    <div class="col-12">
        <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Pending</h4>      
            <div class="body">            
            </div>
            <div class="table-responsive m-t-0">            
                <div class="">
                <form action="" method="post">
                        <div class="row">
                            <div class="col-sm-2">
                                <select name="bulan" class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1">
                                    <option value="">Pilih Bulan</option>
                                    <option value="1" <?php if($bulan == 1){ echo "selected"; } ?>> Januari </option>
                                    <option value="2" <?php if($bulan == 2){ echo "selected"; } ?>> Februari </option>
                                    <option value="3" <?php if($bulan == 3){ echo "selected"; } ?>> Maret </option>
                                    <option value="4" <?php if($bulan == 4){ echo "selected"; } ?>> April </option>
                                    <option value="5" <?php if($bulan == 5){ echo "selected"; } ?>> Mei </option>
                                    <option value="6" <?php if($bulan == 6){ echo "selected"; } ?>> Juni </option>
                                    <option value="7" <?php if($bulan == 7){ echo "selected"; } ?>> Juli </option>
                                    <option value="8" <?php if($bulan == 8){ echo "selected"; } ?>> Agustus </option>
                                    <option value="9" <?php if($bulan == 9){ echo "selected"; } ?>> September </option>
                                    <option value="10" <?php if($bulan == 10){ echo "selected"; } ?>> Oktober </option>
                                    <option value="11" <?php if($bulan == 11){ echo "selected"; } ?>> November </option>
                                    <option value="12" <?php if($bulan == 12){ echo "selected"; } ?>> Desember </option>
                                </select>
                            </div>
                            <div class="col col-sm-2">
                                <select name="Tahun" class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1">
                                    <option value="">Pilih Tahun</option>
                                    <?php for($thn = 2019; $thn <= 2025; $thn++ ){ ?>
                                        <option value="<?= $thn ?>" <?php if($thn == $tahun){ echo "selected"; } ?>> <?= $thn ?> </option>
                                    
                                    <?php } ?>
                                    
                                </select>
                            </div>
                            <div class="col col-sm-2">
                                <button type="submit" name="pilih" class="btn btn-success">Pilih</button>

                                <a href="<?= base_url('cetakdisposisi/rekappending/'.$bulan.'/'.$tahun) ?>" class="btn btn-warning" target="_blank">Cetak</a>
                            </DIV>
                        </div>
                    </form>
                </div>
               
           
                <table id="myTable" class="table table-bordered table-striped">
                <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Surat</th>
                            <th>Tanggal Terima</th>
                            <th>Pengirim</th>
                            <th>Tanggal Surat</th>
                            <th>Tujuan</th>                            
                            <th>Status/Ket</th>    
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $no = 1;
                    foreach($suratpending as $sm) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $sm->no_surat; ?></td>
                            <td><?= $sm->tgl_terima; ?></td>  
                            <td><?= $sm->pengirim; ?></td>    
                            <td><?= $sm->tgl_surat; ?></td>
                            <td><?php 
                                if(($sm->dispo_direktur_id) != "0") :
                                    
                                    $query = "SELECT `dispo_direktur`.*, `jabatan`.`jabatan` 
                                    from `dispo_direktur` 
                                    join `jabatan` 
                                    where `dispo_direktur`.`wadir_id` = `jabatan`.`id` 
                                    and `dispo_direktur`.`id` = $sm->dispo_direktur_id";

                                    $dataJabatan = $this->db->query($query)->row();
                                    echo $dataJabatan->jabatan;
                                
                                else : ?>
                                        Belum ada  
                                <?php endif; ?>

                            </td>
                            <?php
                            if($sm->status == 1){
                                // selesai
                                $warning = "label label-success m-r-10";
                            } else if($sm->status == 2){
                                // pending
                                $warning = "label label-danger m-r-10";
                            } else {
                                // baru masuk
                                $warning = "label label-warning m-r-10";
                            } 
                            ?>
                            <td class="max-texts"> 
                                <a href="#" /><span class="<?= $warning ?>"><?= $sm->keterangan; ?></span> 
                            </td>
                                
                            
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>            
            </div>
        </div>
        </div>
     </div>
</div>
        