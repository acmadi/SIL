<div class="box margin_r_15">
    <div class="box_top"></div>
    <div class="box_content form-container">
        <h2>Change Password</h2>
        <?php echo form_open('log/edit_password/' . $user->id); ?>
        <div class="form-div">
            <fieldset>
                <legend>Password Info</legend>
                <div<?php echo ($cuid == $id ? "" : " style='display: none;'"); ?>><?php echo form_label("Password Lama", "oldpassword"); ?>
                    <?php echo form_password(array("id" => "oldpassword", "name" => "oldpassword", "value" => ($cuid == $id ? "" : "--"))); ?></div>
                <div><?php echo form_label("Password Baru", "password"); ?>
                    <?php echo form_password(array("id" => "password", "name" => "password")); ?></div>
                <div><?php echo form_label("Konfirm Password Baru", "passconf"); ?>
                    <?php echo form_password(array("id" => "passconf", "name" => "passconf")); ?></div>
                <?php echo form_submit("submit", "Change"); ?>
            </fieldset>
        </div>
        <?php echo form_close(); ?>
    </div>
    <div class="box_bottom"></div>  
</div>
<div class="box margin_r_15">
    <div class="box_top"></div>
    <div class="box_content form-container">
        <h2>Edit Account</h2>
        <?php echo form_open('log/edit_info/' . $user->id); ?>
        <div class="form-div">
            <?php if (validation_errors('<p class="error">', '</p>') != '') { ?>
                <div class="errors">
                    <p><em>Update Gagal</em></p>
                    <?php echo validation_errors('<p class="error">', '</p>'); ?>
                </div>
            <?php } ?>
            <fieldset>
                <legend>Account</legend>
                <?php echo $user->username; ?>
            </fieldset>
            <fieldset>
                <legend>Update Account</legend>
                <div><?php echo form_label("Nama Kota/Kabupaten", "nama"); ?>
                    <?php echo form_input(array("id" => "nama", "name" => "nama", "value" => $user->nama)); ?></div>
                <div><?php echo form_label("Longitude", "lon"); ?>
                    <?php echo form_input(array("id" => "lon", "name" => "lon", "value" => $user->lon)); ?></div>
                <div><?php echo form_label("Latitude", "lat"); ?>
                    <?php echo form_input(array("id" => "lat", "name" => "lat", "value" => $user->lat)); ?></div>
                <div><?php echo form_label("Alamat", "deskripsi"); ?>
                    <?php echo form_textarea(array("id" => "deskripsi", "name" => "deskripsi", "value" => $user->deskripsi, "cols" => 15, "rows" => 5)); ?></div>
                <div><?php echo form_label("No Telp", "phone_no"); ?>
                    <?php echo form_input(array("id" => "phone_no", "name" => "phone_no", "value" => $user->phone_no)); ?></div>
                <div><?php echo form_label("E-mail", "email"); ?>
                    <?php echo form_input(array("id" => "email", "name" => "email", "value" => $user->email)); ?></div>
                <?php echo form_submit("submit", "Update"); ?>
            </fieldset>
        </div>
        <?php echo form_close(); ?>
        <p><a href="<?php echo base_url(""); ?>log/profil">Back to account</a></p>
    </div>
    <div class="box_bottom"></div>  
</div>
<?php if ($user->role != 2) : ?>
    <div class="box">
        <div class="box_top"></div>
        <div class="box_content form-container">
            <h2>Edit News</h2>
            <?php echo form_open('log/edit_wiki/' . $user->id); ?>
            <div class="form-div">
                <?php if (validation_errors('<p class="error">', '</p>') != '') { ?>
                    <div class="errors">
                        <p><em>Update Gagal</em></p>
                        <?php echo validation_errors('<p class="error">', '</p>'); ?>
                    </div>
                <?php } ?>
                <fieldset>
                    <legend>Update News</legend>
                    <div><?php echo form_label("News", "wiki"); ?>
                        <?php echo form_textarea(array("id" => "wiki", "name" => "wiki", "value" => $user->getWiki()->wiki, "cols" => 25, "rows" => 25)); ?></div>
                    <?php echo form_submit("submit", "Update"); ?>
                </fieldset>
            </div>
            <?php echo form_close(); ?>
        </div>
        <div class="box_bottom"></div>  
    </div>
<?php endif; ?>

<style type="text/css">
    span.label {
        width: 140px;
    }

    .margin_r_15 {
        margin-right: 5px;
    }

    .box .box_content {
        padding: 15px 9px;
    }
</style>