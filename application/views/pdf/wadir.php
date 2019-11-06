<!-- data disposisi dari direktur ke wadir   -->
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
        
        
        <tr>
        <?php 
            $suratmasuk_id = $data->id;
            $jabatan_id = $this->session->userdata('jabatan_id');
            $result = $this->Disposisi_model->dispo_dir($suratmasuk_id, $jabatan_id);
            ?>

        <td>Direktur</td>
        <td><?= $result->jabatan ?></td>
        <td><?= $result->isi ?></td>
        <td>
            <?php 
            if($result->status == 1){
                echo "Sudah dikonfirmasi";
            } else {
                echo "Belum dikonfirmasi";
            } ?>
        </td>
    </tr>
        
        <?php
        $query = "SELECT `dispo_wadir`.* from `dispo_wadir`, `suratmasuk` where `dispo_wadir`.`surat_masuk_id` = `suratmasuk`.`id` and `suratmasuk`.`id` = $suratmasuk_id";

        $dispo_wadir = $this->db->query($query)->result();

        $i = 1;
        foreach($dispo_wadir as $d) : 
        
        ?>
        <tr>
            <td>
                <?php 
                $nama = $this->db->get_where('jabatan', ['id' => $this->session->userdata('jabatan_id')])->row();
                echo $nama->jabatan; ?>
            </td>
            <td>
                <?php
                $query = "SELECT `jabatan`.`jabatan` from `jabatan`, `pegawai` where `jabatan`.`id` = `pegawai`.`jabatan_id` and `jabatan`.`id` = $d->pimpinan_id";
                $pimpinan = $this->db->query($query)->row(); 
                echo $pimpinan->jabatan; ?>
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
        if(count($dispo_wadir) < 1) : ?>
        <tr>
            <td colspan="4" align="center">Data masih kosong</td>
        </tr>
        <?php endif ?>
    </tbody>
</table>