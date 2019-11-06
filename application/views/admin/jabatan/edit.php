<div class="container-fluid">
   
<div class="row p-t-20">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-body">
                <form action="<?= site_url('admin/jabatan/edit');?>" method="post">
                <input type="hidden" name="id" value="<?= $data->id;?>">

                    <div class="form-body">
                        <h3 class="card-title">Mengubah Data Jabatan</h3>
                        <hr>
                        <div class="row p-t-20">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="jabatan">Jabatan</label>
                                    <input value="<?= $data->jabatan; ?>" type="text" id="jabatan" name="jabatan" class="form-control">
                                    <?= form_error('jabatan', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                        </div>

                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group has-success">
                                    <label class="control-label">Role</label>
                                    <select name="role_id" id="role_id" class="form-control">
                                    <option value="">Pilih Role</option>
                                        
                                    <?php foreach($roles as $value) { ?>
                                        <option <?= ($value->id == $data->role_id)? 'selected':''?> value="<?php echo $value->id;?>"><?php echo $value->role ?></option>
                                    <?php } ?>
                                </select>
                                </div>
                            </div>
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                                <input type="checkbox" value="1" id="is_active" name="is_active"  class="form-check-input">
                                <label class="control-check-label" for="is_active">Active?</label>
                            </div>
                            </div>
                            <!-- /span -->
                            
                        </div>
                        <!-- /row -->
                    <hr>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success" name="simpan"> <i class="fa fa-check"></i> Save</button>
                        <a href="<?= base_url('admin/jabatan') ?>">
                            <button type="button" class="btn btn-inverse">Cancel</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <!-- Row -->