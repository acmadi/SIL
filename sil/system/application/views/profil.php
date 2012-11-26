<div class="box_dummy margin_r_15">
</div>
<div class="box">
    <div class="box_top"></div>
    <div class="box_content">
        <h2>Halaman Profil</h2>
        <p><b>Nama Kota/Kabupaten</b></p>
        <p><?php echo $user->nama; ?></p>
        <p><b>Deskripsi</b></p>
        <p><?php if ($user->deskripsi != '') echo $user->deskripsi; else echo '-'; ?></p>
        <p><b>Posisi Kota/Kabupaten</b></p>
        <p><?php echo $user->lon; ?>, <?php echo $user->lat; ?></p>
        <p><b>Email</b></p>
        <p><?php if ($user->email != '') echo $user->email; else echo '-'; ?></p>
        <p><b>No Telp yang dapat dihubungi</b></p>
        <p><?php if ($user->phone_no != '') echo $user->phone_no; else echo '-'; ?></p>
        <p><a href="<?php echo base_url(""); ?>log/edit/<?php echo $user->id; ?>">Edit Profil</b></p>
    </div>
    <div class="box_bottom"></div>  
</div>
