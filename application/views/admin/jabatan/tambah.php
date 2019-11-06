<div class="container-fluid">
    
<div class="row p-t-20">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-body">
                <form action="<?php echo site_url('admin/jabatan/add');?>" method="post">
                    <div class="form-body">
                        <h3 class="card-title">Tambah Jabatan</h3>
                        <hr>
                        <div class="row p-t-20">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="username">Jabatan</label>
                                    <input type="text" id="jabatan" name="jabatan" class="form-control" value="<?= set_value('jabatan'); ?>">
                                    <?= form_error('jabatan', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                       <!--/row-->
                        
                            <div class="col-md-6">
                                <div class="form-group has-success">
                                    <label class="control-label">Role</label>
                                    <select name="role_id" id="role_id" class="form-control custom-select">
                                        <option value="">Pilih Role</option>
                                        
                                        <?php foreach($roles as $rol) { ?>
                                        <option value="<?= $rol->id?>"><?= $rol->role ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            
                            <!--/span-->
                        </div>
                       
                            
                        </div>
                        <!-- /row -->
                    <hr>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success" name="simpan"> <i class="fa fa-check"></i> Save</button>
                        <a href="<?= base_url('admin/user') ?>">
                            <button type="button" class="btn btn-inverse">Cancel</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <!-- Row -->