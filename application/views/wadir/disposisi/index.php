<?php
// jika berdasarkan status
$status = $this->input->get('status') ? $this->input->get('status') : ""; 
?>
<div class="container-fluid">
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="row p-t-20">
    <div class="col-12">
        <div class="card">
        <div class="card-body">
        <h4 class="card-title">Data Disposisi</h4>      
        <div class="body">
            <form action="" method="get" class="form-inline">
                <select class="form-control mr-2" name="status" id="status" required>
                    <option value="">-- Pilih Status --</option>
                    <option value="4" <?php if($status == 4) echo "selected"; ?>>Semua Status</option>
                    <option value="3" <?php if($status == 3) echo "selected"; ?>>Baru</option>
                    <option value="1" <?php if($status == 1) echo "selected"; ?>>Selesai</option>
                    <option value="2" <?php if($status == 2) echo "selected"; ?>>Pending</option>
                </select>
                <button type="submit" class="btn btn-warning">Pilih</button>
            </form>
        </div>
            <div class="table-responsive m-t-0">
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
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $no = 1;
                    
                    foreach($suratmasuk as $sm) : 
                        if($status != 0) {
                            if($status == 4){
                            // tidak kenak filter

                            } else if($status == 3){
                            if($sm->status == 0) { } else { continue; }

                            } else if($status == 1){
                            if($sm->status == 1) { } else { continue; }

                            } else if($status == 2){
                            if($sm->status == 2) { } else { continue; }

                            }
                        }   
                        
                        if($sm->dispo_wadir_id != 0){

                            $dispo_wadir = $this->db->get_where('dispo_direktur',['id' => $sm->dispo_direktur_id, 'wadir_id' => $this->session->userdata('jabatan_id')])->row(); 
                            
                            if($dispo_wadir) { ?>
                               
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $sm->no_surat; ?></td>
                                    <td><?= $sm->tgl_terima; ?></td>  
                                    <td><?= $sm->pengirim; ?></td>    
                                    <td><?= $sm->tgl_surat; ?></td>

                                    <td>
                                    <?php 
                                        $query = "SELECT `dispo_wadir`.*, `jabatan`.`jabatan` 
                                        from `dispo_wadir` 
                                        join `jabatan` 
                                        where `dispo_wadir`.`pimpinan_id` = `jabatan`.`id` 
                                        and `dispo_wadir`.`id` = $sm->dispo_wadir_id";

                                        $dataJabatan = $this->db->query($query)->row();
                                        echo $dataJabatan->jabatan; ?>
                                    </td>
                                    <?php
                                    if($sm->status == 1){
                                        // selesai
                                        $warning = "label label-success m-r-10";
                                    } else if($sm->status == 2){
                                        // pending
                                        $warning = "label label-warning m-r-10";
                                    } else {
                                        // baru masuk
                                        $warning = "label label-danger m-r-10";
                                    } 
                                    ?>
                                    <td class="max-texts"> 
                                        <a href="#" /><span class="<?= $warning ?>"><?= $sm->keterangan; ?></span> 
                                    </td>
                                    
                                    <td> 
                                        <a class="btn btn-success" href="<?= site_url('wadir/disposisi/tambah/'.$sm->id); ?>" title="Disposisikan"><i class="fas fa-plus"></i></a>
                                        <a  class="btn btn-warning" href="<?= site_url('wadir/disposisi/detail/'.$sm->id); ?>" title="Detail"><i class="fas fa-eye"></i></a>
                                    </td>
                                </tr>

                            <?php 
                            }
                        } else { 
                            
                            if($sm->status_wadir == 1){

                                $idsurat = $sm->id;
                                $idjabatan = $this->session->userdata('jabatan_id');

                                $query = "SELECT `dispo_direktur`.* from `dispo_direktur`, `suratmasuk` where `suratmasuk`.`dispo_direktur_id` = `dispo_direktur`.`id` and  `dispo_direktur`.`surat_masuk_id` = $idsurat and `dispo_direktur`.`wadir_id` = $idjabatan";

                                $result = $this->db->query($query)->row();

                                if($result){ ?>

                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $sm->no_surat; ?></td>
                                    <td><?= $sm->tgl_terima; ?></td>  
                                    <td><?= $sm->pengirim; ?></td>    
                                    <td><?= $sm->tgl_surat; ?></td>

                                    <td><?php 
                                        if(($sm->dispo_wadir_id) != "0") :

                                            $query = "SELECT `dispo_wadir`.*, `jabatan`.`jabatan` 
                                            from `dispo_wadir` 
                                            join `jabatan` 
                                            where `dispo_wadir`.`pimpinan_id` = `jabatan`.`id` 
                                            and `dispo_wadir`.`id` = $sm->dispo_wadir_id";

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
                                        
                                    <td> 
                                        <a  class="btn btn-success" href="<?= site_url('wadir/disposisi/tambah/'.$sm->id); ?>" title="Disposisikan"><i class="fas fa-plus"></i></a>
                                        <a  class="btn btn-warning" href="<?= site_url('wadir/disposisi/detail/'.$sm->id); ?>" title="Detail" ><i class="fas fa-eye"></i></a>
                                    </td>
                                </tr>

                                <?php  
                                }

                            } else {
                            ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $sm->no_surat; ?></td>
                            <td><?= $sm->tgl_terima; ?></td>  
                            <td><?= $sm->pengirim; ?></td>    
                            <td><?= $sm->tgl_surat; ?></td>

                            <td><?php 
                                if(($sm->dispo_wadir_id) != "0") :

                                    $query = "SELECT `dispo_wadir`.*, `jabatan`.`jabatan` 
                                    from `dispo_wadir` 
                                    join `jabatan` 
                                    where `dispo_wadir`.`pimpinan_id` = `jabatan`.`id` 
                                    and `dispo_wadir`.`id` = $sm->dispo_wadir_id";

                                    $dataJabatan = $this->db->query($query)->row();
                                    echo $dataJabatan->jabatan;
                                
                                else : 
                                    if($sm->status_wadir_approve == 1){
                                        echo "Sudah diapprove";
                                    } else {
                                        echo "Belum ada";
                                    }
                                    
                                endif; ?>

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

                            <td> 
                                <a  class="btn btn-success" href="<?= site_url('wadir/disposisi/tambah/'.$sm->id); ?>" title="Disposisikan"><i class="fas fa-plus"></i></a>
                                <a  class="btn btn-warning" href="<?= site_url('wadir/disposisi/detail/'.$sm->id); ?>" title="Detail" ><i class="fas fa-eye"></i></a>
                            </td>
                        </tr>
                            <?php } 
                        }  endforeach; ?>
                    </tbody>
                </table>            
            </div>
        </div>
        </div>
     </div>
</div>
        