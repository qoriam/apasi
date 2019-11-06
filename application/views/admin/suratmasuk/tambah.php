<div class="container-fluid">
    
    <div class="row p-t-20">
        <div class="col-lg-12">
            <div class="card card-outline-info">            
                <div class="card-body">
                    <form action="<?= site_url('admin/suratmasuk/tambah'); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-body">
                            <h3 class="card-title">Surat Masuk</h3>
                            <hr>
                            <div class="row p-t-20">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>No Surat <span class="text-danger">*</span></h5>
                                        <input type="text" id="no_surat" name="no_surat" class="form-control" value="<?= set_value('no_surat'); ?>" >
                                        <?= form_error('no_surat', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <h5>Pengirim <span class="text-danger">*</span></h5>
                                        <input type="text" id="pengirim" name="pengirim" class="form-control" value="<?= set_value('pengirim'); ?>">
                                        <?= form_error('pengirim', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Tanggal Terima<span class="text-danger">*</span></h5>
                                        <input id="tgl_terima" name="tgl_terima" type="date" class="form-control" value="<?= set_value('tgl_terima'); ?>" >
                                        <?= form_error('tgl_terima', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <!-- -->                                   
                                    <div class="form-group">
                                        <h5>Jenis Disposisi<span class="text-danger">*</span></h5>
                                        <select  name="jenis_id" id="jenis_id" class="form-control custom-select">
                                            <option value="">Pilih Jenis Disposisi</option>
                                            <?php foreach($jenis_dispo as $rol) { ?>
                                                <option value="<?= $rol->id?>" <?php if($rol->id == set_value('jenis_id')) : ?> selected <?php endif ?>><?= $rol->nama_jenis ?></option>
                                            <?php } ?>
                                        </select>
                                        <?= form_error('tgl_terima', '<small class="text-danger">', '</small>'); ?>
                                    </div>   
                                    <div class="form-group">
                                        <h5>Tanggal Surat <span class="text-danger">*</span></h5>
                                        <input id="tgl_surat" name="tgl_surat" type="date" class="form-control" value="<?= set_value('tgl_surat'); ?>">
                                        <?= form_error('tgl_surat', '<small class="text-danger">', '</small>'); ?>
                                    </div>   
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Perihal <span class="text-danger">*</span></h5>
                                        <textarea class="textarea_editor form-control" rows="9" id="perihal" name="perihal"><?= set_value('perihal'); ?></textarea>
                                        <?= form_error('perihal', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                        <h5>Lampiran<span class="text-danger">*</span></h5>
                                            <label for="input-file-now">Klik / Drag & Drop</label>
                                            <input required accept=".pdf" type="file" <?php echo form_upload(['name'=>'lampiran', 'class'=>'form-control']); ?>  
                                            <!-- id="input-file-now" class="dropify" /> -->
                                            <?= form_error('lampiran', '<small class="text-danger">', '</small>'); ?>
                                            
                                        </div>
                                    </div>                           
                                </div>
                            </div>
                            <!--/row-->
                            <hr>
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
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Row -->
    <script>
    jQuery(document).ready(function() {

        $('.summernote').summernote({
                height: 350, // set editor height
                minHeight: null, // set minimum height of editor
                maxHeight: null, // set maximum height of editor
                focus: false // set focus to editable area after initializing summernote
            });

        $('.inline-editor').summernote({
        airMode: true
        });

    });

    window.edit = function() {
        $(".click2edit").summernote()
    },
    window.save = function() {
        $(".click2edit").summernote('destroy');
    }

    //untuk dropify pada file upload 

        $(document).ready(function() {
            // Basic
            $('.dropify').dropify();

            // Translated
            $('.dropify-fr').dropify({
                messages: {
                    default: 'Glissez-déposez un fichier ici ou cliquez',
                    replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                    remove: 'Supprimer',
                    error: 'Désolé, le fichier trop volumineux'
                }
            });

            // Used events
            var drEvent = $('#input-file-events').dropify();

            drEvent.on('dropify.beforeClear', function(event, element) {
                return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
            });

            drEvent.on('dropify.afterClear', function(event, element) {
                alert('File deleted');
            });

            drEvent.on('dropify.errors', function(event, element) {
                console.log('Has Errors');
            });

            var drDestroy = $('#input-file-to-destroy').dropify();
            drDestroy = drDestroy.data('dropify')
            $('#toggleDropify').on('click', function(e) {
                e.preventDefault();
                if (drDestroy.isDropified()) {
                    drDestroy.destroy();
                } else {
                    drDestroy.init();
                }
            })
        });
    </script>