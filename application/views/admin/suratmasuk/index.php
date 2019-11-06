<div class="container-fluid">
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="row p-t-20">


<div class="row col-lg-12">
    <div class="col-12">
        <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Surat Masuk</h4>     
                <?php if($this->session->flashdata('flash')) : ?>
                    <div class="row mt-3 ">
                        <div class="col-md-6">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                Surat Disposisi <strong>berhasil</strong> <?= $this->session->flashdata('flash') ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endif; ?> 
            <div class="body">
            <a href="<?= base_url('admin/suratmasuk/tambah') ?>" >
            <button type="button" class="btn btn-success" onclick="#" ><span class="fa fa-plus-circle ">
            Tambah Data
            </button></a> 
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
                            <th>Status/Ket</th>                            
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $no = 1;
                    foreach($suratmasuk as $sm) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $sm->no_surat; ?></td>
                            <td><?= $sm->tgl_terima; ?></td>  
                            <td><?= $sm->pengirim; ?></td>    
                            <td><?= $sm->tgl_surat; ?></td>
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
                            <a  class="btn btn-warning" href="<?= site_url('admin/suratmasuk/detail/'.$sm->id); ?>" title="Detail"><i class="fas fa-eye"></i></a>
                            <a class="btn btn-danger" href="<?= site_url('admin/suratmasuk/delete/'.$sm->id); ?>" title="Hapus"><i class="fas fa-trash"></i></a>
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
        