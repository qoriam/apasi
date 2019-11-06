<?php 
$suratid = $data->id;
$query = "SELECT `dispo_direktur`.* from `dispo_direktur`, `suratmasuk` where `dispo_direktur`.`surat_masuk_id` = `suratmasuk`.`id` and `suratmasuk`.`id` = $suratid";
$dispo_direktur = $this->db->query($query)->result();

?>
    <table border="1" cellspacing="0" style =" margin-left:29px;" >
        <thead>
            <tr>
                <td align="center" style ="solid #000; width:140px; height:20px;">DARI</td>
                <td align="center" style ="solid #000; width:140px; height:20px;">KEPADA</td>
                <td align="center" style ="solid #000; width:220px; height:20px;">ISI</td>
                <td align="center" style ="solid #000; width:100px; height:20px;">ISI</td>
            </tr>
            
        </thead>
        
        <tbody>
            <!-- data disposisi dari direktur ke wadir   -->
            <?php
            $i = 1;
            foreach($dispo_direktur as $d) : 
            
            ?>
            <tr>
                <td>
                    Direktur
                </td>
                <td>
                    <?php
                    $query = "SELECT `jabatan`.`jabatan` from `jabatan`, `pegawai` where `jabatan`.`id` = `pegawai`.`jabatan_id` and `jabatan`.`id` = $d->wadir_id";
                    $wadir = $this->db->query($query)->row(); 
                    echo $wadir->jabatan; 
                    ?>
                </td>
                <td>
                    <?= $d->isi ?>
                </td>
                <td>
                <?php 
                    if($d->status == 1 || $d->approve == 1){
                        echo "Sudah dikonfirmasi";
                    } else {
                        echo "Belum dikonfirmasi";
                    } ?>
                </td>
            </tr>

            <?php endforeach;
            if(count($dispo_direktur) < 1) : ?>
            <tr>
                <td colspan="4" align="center">Data masih kosong</td>
            </tr>
            <?php endif ?>
        </tbody>
    </table>