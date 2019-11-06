<div class="container-fluid">
<div class="row p-t-20">
<div class="row col-lg-12">
    <div class="col-12">
            <?= form_error('jabatan', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
        
        <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data User Jabatan</h4>      
            <div class="body">            
            <a href="<?= base_url('admin/jabatan/add') ?>" >
            <button type="button" class="btn btn-success" onclick="#" ><span class="fa fa-plus-circle ">
            Tambah Data
            </button></a>
            </div>
            <div class="table-responsive m-t-0">
                <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Jabatan</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <!-- <?php 
                    $no += 1;
                    foreach($jabatan as $j) : ?> -->
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $j->jabatan; ?></td>
                            <td><?= $j->role; ?></td>
                            <td> 
                            <a  class="btn btn-warning" href="<?= site_url('admin/jabatan/edit/'.$j->id); ?>" title="Ubah"><i class="fas fa-edit"></i></a>
                            <a class="btn btn-danger" href="<?= site_url('admin/jabatan/delete/'.$j->id); ?>" title="Hapus"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <!-- <?php endforeach; ?> -->
                    </tbody>
                </table>            
            </div>
        </div>
        </div>
     </div>
</div>
        

<!-- Modal Tambah Data -->
<!-- sample modal content -->
<!-- <div id="tambah-jabatan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Jabatan</h4>
            </div>
            <form method="post" action="<?= base_url('admin/jabatan') ?>">
            <div class="modal-body">
                <div class="form-group">
                    <label for="jabatan" class="control-label">Jabatan :</label>
                    <input type="text" class="form-control" id="jabatan" name="jabatan">
                </div>
                <div class="form-group has-success">
                    <label class="control-label">Role</label>
                    <select name="role_id" id="jabatan_id" class="form-control custom-select">
                        <option value="">Pilih Role</option>
                        
                        <?php 
                        $role = $this->db->get('roles')->result();
                        foreach($role as $r) { ?>
                        <option value="<?= $r->id?>"><?= $r->role ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                <button type="submit"  id="btnSave" class="btn btn-danger waves-effect waves-light">Save</button>
            </div>
            </form>
        </div>
    </div>
</div> -->
<!-- /.modal -->            
<!-- Modal Tambah Data -->

<!-- Modal Ubah Data -->
<!-- sample modal content -->
