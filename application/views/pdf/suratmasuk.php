<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Disposisi</title>

    <style>
	* {
	    box-sizing: border-box;
	    font-family: times-new-roman;
	}
	body {
	  margin: 0;
	  font-family: times-new-roman;
      font-size: 13px;
	}

    /*design table 1*/
    /* .apik {
        font-family: sans-serif;
        color: #232323;
        border-collapse: collapse;
    }
    
    .apik, th, td {
        border: 1px solid #999;
        padding: 8px 20px;
    } */
	</style>

</head>
<body>
    
    <table style="margin-left:35px">
        <tr>
            <td > 
                <div style="text-align:center;">
                    <img src="<?= $_SERVER["DOCUMENT_ROOT"].'/sipasiyuk/assets/poliwangi.png' ?>" alt="" width="16%">
                </div>
            </td>
            <td style="text-align: center; vertical-align: middle;"><br> <br>
                <div  style="margin-left:35px">
                    <p align="center" style="margin-top:-20px;font-size:16px">KEMENTERIAN RISET, TEKNOLOGI DAN PENDIDIKAN TINGGI</p>
                    <p align="center" style="margin-top:-20px;font-size:18px">POLITEKNIK NEGERI BANYUWANGI</p>
                    <p align="center" style="margin-top:-20px;font-size:14px">
                        JL. Raya Jember kilometer 13 Labanasem, Kabat, Banyuwangi, 68461<br>
                        Telepon / Faks : (0333)636780<br>
                        E-mail : poliwangi@poliwangi.ac.id; Website : http://www.poliwangi.ac.id
                    </p>
                </div>
            </td>
        </tr>
    </table>
   <br>
    <hr style="margin-top:-20px; margin-left:35px; weight:600">
    
    <h3 style="text-align:center;">DISPOSISI</h3>
    <table border="1" cellspacing="0" style ="solid #FFFFFF; padding:5px; align=:center; margin-left:25px; ">
        <tr>
            <td style ="solid #000; width:300px; height:16px;" align="left">Tanggal terima : <?= $surat->tgl_terima ?></td>
            <td style ="solid #000; width:350px; height:16px;" align="left">Nomor Agenda :  <?= $agenda ?></td>
        </tr>
    </table>

    <!-- TABEL DATA SURAT MASUK -->
    <table style =" margin-left:29px;">
        <tr>
            <td valign="top" style ="width:200px; height:20px;" align="left"> Jenis Disposisi : <br></td>
            <td  valign="top" style ="width:10px; height:20px;" align="left">Pengirim </td>
            <td valign="top" style ="width:10px; height:20px;">: <?= $surat->pengirim ?></td>
        </tr>
        <tr>
            <td valign="top" style ="solid #000; width:10px; height:25px;" align="left">
            <?php
                if ($surat->jenis_id == '1') {
                    echo'                              
                    <input name="jenis_id" type="radio" id="" class=""  value="Rahasia" checked>
                    <label for="radio_31">Rahasia</label>
                    ';
                    } else{
                        echo'                              
                        <input name="jenis_id" type="radio" id="" class=""  value="Rahasia">
                        <label for="radio_31">Rahasia</label>
                        ';
                    }  
            ?>           
            </td>
            <td style ="solid #000; width:40px; height:20px;" align="left"></td>
            
            <td style ="solid #000; width:300px; height:20px;" align="left"></td>
        </tr>
        <tr>
            <td valign="top" style ="solid #000; width:1px height:25px;" align="left"> 
            <?php
                if ($surat->jenis_id == '2') {
                    echo'                              
                    <input name="jenis_id" type="radio" id="" class=""  value="Penting" checked>
                    <label for="radio_31">Penting</label>
                    ';
                    } else{
                        echo'                              
                        <input name="jenis_id" type="radio" id="" class=""  value="Penting">
                        <label for="radio_31">Penting</label>
                        ';
                    }  
            ?>                
            </td>
            <td style ="solid #000; width:100px; height:20px;" align="left">Nomor Surat</td>
            <td style ="solid #000; width:300px; height:20px;" align="left">: <?= $surat->no_surat ?></td>
        </tr>
        <tr>
            <td valign="top" style ="solid #000;  height:25px;" align="left"> 
            <?php
                if ($surat->jenis_id == '3') {
                    echo'                              
                    <input name="jenis_id" type="radio" id="" class=""  value="Segera" checked>
                    <label for="radio_31">Segera</label>
                    ';
                    } else{
                        echo'                              
                        <input name="jenis_id" type="radio" id="" class=""  value="Segera">
                        <label for="radio_31">Segera</label>
                        ';
                    }  
            ?>                  
            </td>
            <td style ="solid #000; width:100px; height:20px;" align="left">Tanggal Surat </td>
            <td style ="solid #000; width:300px; height:20px;" align="left"> : <?= $surat->tgl_surat ?></td>
        </tr>
        <tr>
            <td valign="top" style ="solid #000; height:25px;" align="left"> 
            <?php
                if ($surat->jenis_id == '4') {
                    echo'                              
                    <input name="jenis_id" type="radio" id="" class="with-gap radio-col-blue"  value="Biasa" checked>
                    <label for="radio_31">Biasa</label>
                    ';
                    } else{
                        echo'                              
                        <input name="jenis_id" type="radio" id="" class=""  value="Biasa">
                        <label for="radio_31">Biasa</label>
                        ';
                    }  
            ?>               
            </td>
            <td style ="solid #000; width:100px; height:20px;" align="left">Lampiran</td>
            <td style ="solid #000; width:300px; height:20px;" align="left"> : <?= $surat->lampiran ?></td>
        </tr>
        <tr>
            <td valign="top" valign= "top" style ="solid #000; height:25px;" align="left"> 
                           
            </td>
            <td valign="top" style ="solid #000; width:40px; height:20px;" align="left">Perihal</td>
            <td valign="top" style ="solid #000; width:300px; height:75px;" align="left"> : <?= $surat->perihal ?></td>
        </tr>
    </table>


    <!-- disposisi -->
    <?php $surat = $this->db->get_where('suratmasuk',['id' => $data->id])->row(); ?>
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
            <tr>
                <?php 
                    $suratmasuk_id = $data->id;
                    $jabatan_id = $this->session->userdata('jabatan_id');
                    $result = $this->Disposisi_model->dispo_dir($suratmasuk_id, $jabatan_id);
                    ?>

                <td td valign="top" align="left" style ="solid #000; width:140px; height:50px;">
                    Direktur
                </td>
                <td valign="top" align="left" style ="solid #000; width:140px; height:50px;" >
                    <?= $result->jabatan ?>
                </td>
                <td valign="top" align="left" style ="solid #000; width:140px; height:50px;">
                    <?= $result->isi ?>
                </td>
                <td  valign="top" align="left" style ="solid #000; width:140px; height:50px;">
                    <?php 
                    if($result->status == 1){
                        echo "Sudah dikonfirmasi";
                    } else {
                        echo "Belum dikonfirmasi";
                    } ?>
                </td>
            </tr>

            <!-- data disposisi dari wadir ke pimpinan   -->
            <?php
            foreach($dispo_wadir as $d) :             
            ?>
            <tr>
                <td valign="top" align="left" style ="solid #000; width:140px; height:50px;">
                    <?php 
                    $nama = $this->db->get_where('jabatan', ['id' => $this->session->userdata('jabatan_id')])->row();
                    echo $nama->jabatan; ?>
                </td>
                <td valign="top" align="left" style ="solid #000; width:140px; height:50px;">
                    <?php
                    $query = "SELECT `jabatan`.`jabatan` from `jabatan`, `pegawai` where `jabatan`.`id` = `pegawai`.`jabatan_id` and `jabatan`.`id` = $d->pimpinan_id";
                    $pimpinan = $this->db->query($query)->row(); 
                    echo $pimpinan->jabatan; ?>
                </td>
                <td valign="top" align="left" style ="solid #000; width:140px; height:50px;">
                    <?= $d->isi ?>
                </td>
                <td valign="top" align="left" style ="solid #000; width:140px; height:50px;">
                    <?php 
                    if($d->status == 1){
                        echo "Sudah dikonfirmasi";
                    } else {
                        echo "Belum dikonfirmasi";
                    } ?>
                </td>
            </tr>           
            <?php endforeach;
            // data kosong
            if(count($dispo_wadir) < 1) : ?>
            <tr>            
                <td align="center" style ="solid #000; width:140px; height:50px;"></td>
                <td align="center" style ="solid #000; width:140px; height:50px;"></td>
                <td align="center" style ="solid #000; width:220px; height:50px;"></td>
                <td align="center" style ="solid #000; width:100px; height:50px;"></td>
            </tr>
           
            <?php endif ?>

             <!-- disposisi dari pimpinan ke pimpinan -->
            <?php
            foreach($dispo_pimpinan as $d) :             
            ?>
            <tr>
                <td valign="top" align="left" style ="solid #000; width:140px; height:50px;">
                    <?php 
                    $nama = $this->db->get_where('jabatan', ['id' => $this->session->userdata('jabatan_id')])->row();
                    echo $nama->jabatan; ?>
                </td>
                <td valign="top" align="left" style ="solid #000; width:140px; height:50px;">
                    <?php
                    $query = "SELECT `jabatan`.`jabatan` from `jabatan`, `pegawai` where `jabatan`.`id` = `pegawai`.`jabatan_id` and `jabatan`.`id` = $d->pimpinan_id";
                    $pimpinan = $this->db->query($query)->row(); 
                    echo $pimpinan->jabatan; ?>
                </td>
                <td valign="top" align="left" style ="solid #000; width:140px; height:50px;">
                    <?= $d->isi ?>
                </td>
                <td valign="top" align="left" style ="solid #000; width:140px; height:50px;">
                    <?php 
                    if($d->status == 1){
                        echo "Sudah dikonfirmasi";
                    } else {
                        echo "Belum dikonfirmasi";
                    } ?>
                </td>
            </tr>

            <?php endforeach;
            // data kosong
            if(count($dispo_pimpinan) < 1) : ?>
            <tr>
                <td align="center" style ="solid #000; width:140px; height:50px;"></td>
                <td align="center" style ="solid #000; width:140px; height:50px;"></td>
                <td align="center" style ="solid #000; width:220px; height:50px;"></td>
                <td align="center" style ="solid #000; width:100px; height:50px;"></td>
            </tr>
            <?php endif ?>
        </tbody>
    </table>
  

</body>
</html>