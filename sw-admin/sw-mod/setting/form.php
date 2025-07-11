<?php @session_start();

require_once'../../../sw-library/sw-config.php';
if(empty($_SESSION['SESSION_USER']) && empty($_SESSION['SESSION_ID'])){
  header('location:../../login/');
  exit;
}
else{
  require_once'../../login/login_session.php';

switch (htmlentities(@$_GET['action'])){
case 'setting':
    echo'
    <form id="validate" class="form-horizontal update-setting" enctype="multipart/form-data" autocomplete="of">
        <div class="form-group">
          <label class="col-sm-2 control-label">Nama </label>
          <div class="col-sm-6">
            <input type="tex" name="site_name" class="form-control" value="'.$site_name.'" required="">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Deskripsi </label>
          <div class="col-sm-6">
            <textarea name="site_description" class="form-control" rows="3" required="required">'.$site_description.'</textarea>
          </div>
        </div>


        <div class="form-group">
          <label class="col-sm-2 control-label">No Telp</label>
          <div class="col-sm-6">
            <input type="text" name="site_phone"  class="form-control" value="'.$site_phone.'" required="required">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Alamat </label>
          <div class="col-sm-6">
            <input type="text" name="site_address"  class="form-control" value="'.$site_address.'" required="required">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Email</label>
          <div class="col-sm-6">
            <input type="text" name="site_email"  class="form-control" value="'.$site_email.'" required="required">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Email Domain</label>
          <div class="col-sm-6">
            <input type="text" name="site_email_domain" class="form-control" value="'.$site_email_domain.'" required="required">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Alamat Webite</label>
          <div class="col-sm-6">
            <input type="text" name="site_url" id="site_url" class="form-control" value="'.$site_url.'" required="required">
          </div>
        </div>
        <hr>
        <div class="form-group">
          <label class="col-sm-2 control-label">Logo Website</label>
          <div class="col-sm-6">';
            if($site_logo == NULL){
             echo'<img height="50" src="../sw-assets/img/default-50x50.jpg">';}
            else{
                echo'<img height="50" src="../sw-content/'.$site_logo.'">';
              }echo'<br><br>
              <input type="file" class="btn btn-default"  name="site_logo">
              <p class="text-red">*Kosongkan apabila tidak mengganti</p>
          </div>
        </div>

      <!-- /.box-body -->
      <div class="box-footer">
        <label class="col-sm-2 control-label"></label>
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">';
        if($level_user ==1){
          echo'
          <button type="submit" class="btn bg-blue"><i class="fa fa fa-check"></i> Simpan</button>';}
        else{
          echo'<button type="button" class="btn bg-blue access-failed"><i class="fa fa fa-check"></i> Simpan</button>';
        }
        echo'
          <button type="reset" class="btn btn-danger">Reset</a>
        </div>
      </div>
      <!-- /.box-footer -->
  </form>';


break;
case 'profile':
    echo'
    <form id="validate" class="form-horizontal update-profile" autocomplete="of">
        <div class="form-group">
          <label class="col-sm-2 control-label">Nama Perusahaan</label>
          <div class="col-sm-6">
            <input type="text" name="site_company" class="form-control" value="'.$site_company.'" required="">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Nama Direktur</label>
          <div class="col-sm-6">
             <input type="text" name="site_director" class="form-control" value="'.$site_director.'" required="">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Nama Manager</label>
          <div class="col-sm-6">
             <input type="text" name="site_manager" id="site_manager" class="form-control" value="'.$site_manager.'" required="">
          </div>
        </div>
        
      <!-- /.box-body -->
      <div class="box-footer">
        <label class="col-sm-2 control-label"></label>
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">';
        if($level_user ==1){
          echo'
          <button type="submit" class="btn bg-blue"><i class="fa fa fa-check"></i> Simpan</button>';}
        else{
          echo'<button type="button" class="btn bg-blue access-failed"><i class="fa fa fa-check"></i> Simpan</button>';
        }
        echo'
          <button type="reset" class="btn btn-danger">Reset</a>
        </div>
      </div>
      <!-- /.box-footer -->
  </form>';



/* -------- Google mail -----*/

break;
case 'mail':
    echo'
    <form id="validate" class="form-horizontal update-mail" autocomplete="of">

        <div class="form-group">
          <label class="col-sm-2 control-label">Host Gmail</label>
          <div class="col-sm-6">
             <input type="text" name="gmail_host" class="form-control" value="'.$gmail_host.'" required="">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Username</label>
          <div class="col-sm-6">
             <input type="text" name="gmail_username" class="form-control" value="'.$gmail_username.'" required="">
          </div>
        </div>

         <div class="form-group">
          <label class="col-sm-2 control-label">Password</label>
          <div class="col-sm-6">
             <input type="text" name="gmail_password" class="form-control" value="'.$gmail_password.'" required="">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Port</label>
          <div class="col-sm-6">
             <input type="text" name="gmail_port" class="form-control" value="'.$gmail_port.'" required="">
          </div>
        </div>
        
      <!-- /.box-body -->
      <div class="box-footer">
        <label class="col-sm-2 control-label"></label>
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">';
        if($level_user ==1){
          echo'
          <button type="submit" class="btn bg-blue"><i class="fa fa fa-check"></i> Simpan</button>';}
        else{
          echo'<button type="button" class="btn bg-blue access-failed"><i class="fa fa fa-check"></i> Simpan</button>';
        }
        echo'
          <button type="reset" class="btn btn-danger">Reset</a>
        </div>
      </div>
      <!-- /.box-footer -->
  </form>';

break;
}}