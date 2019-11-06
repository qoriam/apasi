<table border="1" cellspacing="0" style =" margin-left:29px;" >
    <thead>
        <tr>
            <td align="center" style ="solid #000; width:140px; height:20px;">DARI</td>
            <td align="center" style ="solid #000; width:140px; height:20px;">KEPADA</td>
            <td align="center" style ="solid #000; width:220px; height:20px;">ISI</td>
            <td align="center" style ="solid #000; width:100px; height:20px;">STATUS</td>
        </tr>
        
    </thead>
    
    <tbody>
        
        
        <!-- disposisi dari direktur->wadir -->
        <tr>
        <?php 
            $suratmasuk_id = $data->id;
            $surat = "SELECT `suratmasuk`.`dispo_wadir_id`, `suratmasuk`.`dispo_pimpinan_id`, `dispo_direktur`.`wadir_id` from `dispo_direktur`, `suratmasuk` where `dispo_direktur`.`surat_masuk_id` = `suratmasuk`.`id` and `suratmasuk`.`id` = $suratmasuk_id and `dispo_direktur`.`status` = 1";
            $hasilsurat = $this->db->query($surat)->row();

            $jabatan_id = $hasilsurat->wadir_id;
            $dispo_dir = $this->Disposisi_model->dispo_dir($suratmasuk_id, $jabatan_id);

            ?>

        <td align="left" valign="top" style ="solid #000; width:140px; height:40px;">Direktur</td>
        <td align="left" valign="top" style ="solid #000; width:140px; height:40px;"><?= $dispo_dir->jabatan ?></td>
        <td align="left" valign="top" style ="solid #000; width:140px; height:40px;"><?= $dispo_dir->isi ?></td>
        <td align="left" valign="top" style ="solid #000; width:140px; height:40px;">
            <?php 
            if($dispo_dir->status == 1 || $dispo_dir->approve == 1){
                echo "Sudah dikonfirmasi";
            } else {
                echo "Belum dikonfirmasi";
            } ?>
        </td>
    </tr>

    <!-- disposisi dari wadir->pimpinan -->
    <?php if($hasilsurat->dispo_wadir_id == 0) : ?>
        <tr>
            <?php 
                $jabatan_id = $this->session->userdata('jabatan_id');
                $dispo_wadir = $this->Disposisi_model->dispo_wadir($suratmasuk_id, $jabatan_id);

                ?>

            <td align="left" valign="top" style ="solid #000; width:140px; height:40px;"><?= $dispo_dir->jabatan ?></td>
            <td align="left" valign="top" style ="solid #000; width:140px; height:40px;"><?= $dispo_wadir->jabatan ?></td>
            <td align="left" valign="top" style ="solid #000; width:140px; height:40px;"><?= $dispo_wadir->isi ?></td>
            <td align="left" valign="top" style ="solid #000; width:140px; height:40px;">
                <?php 
                if($dispo_wadir->status == 1 || $dispo_wadir->approve == 1){
                    echo "Sudah dikonfirmasi";
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
                if($disp_wadir->status == 1 || $disp_wadir->approve == 1){
                    echo "Sudah dikonfirmasi";
                } else {
                    echo "Belum dikonfirmasi";
                } ?>
            </td>
        </tr>

        <!-- disposisi dari pimpinan->pimpinan -->
        <tr>
        <?php 
            if($hasilsurat->dispo_pimpinan_id == 0) {

                $jabatan_id = $this->session->userdata('jabatan_id');
                $disp_pimpinan = $this->Disposisi_model->dispo_pimpinan($suratmasuk_id, $jabatan_id);
            } else {

                $id_dispo_pimpinan = $hasilsurat->dispo_pimpinan_id;
                $dispo_pimpinan1 = "SELECT `dispo_pimpinan`.*,  `jabatan`.`jabatan` 
                FROM `dispo_pimpinan`, `jabatan` 
                WHERE `dispo_pimpinan`.`id` = $id_dispo_pimpinan 
                AND `dispo_pimpinan`.`pimpinan_id` = `jabatan`.`id`";
                $disp_pimpinan = $this->db->query($dispo_pimpinan1)->row();
            }
            
            
            ?>

            <td><?= $disp_wadir->jabatan; ?></td>
            <td><?= $disp_pimpinan->jabatan; ?></td>
            <td><?= $disp_pimpinan->isi; ?></td>
            <td>
                <?php 
                if($disp_pimpinan->status == 1 || $disp_pimpinan->approve == 1){
                    echo "Sudah dikonfirmasi";
                } else {
                    echo "Belum dikonfirmasi";
                } ?>
            </td>
        </tr>

    <?php endif; ?>
    <!--  -->
    </tbody>
</table>