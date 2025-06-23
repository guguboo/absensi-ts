<?php 
if ($mod == '') {
    header('location:../404');
    echo 'kosong';
} else {
    include_once 'sw-mod/sw-header.php';

    if (!isset($_COOKIE['COOKIES_MEMBER'])) {
        setcookie('COOKIES_MEMBER', '', 0, '/');
        setcookie('COOKIES_COOKIES', '', 0, '/');
        setcookie("COOKIES_MEMBER", "", time() - $expired_cookie);
        setcookie("COOKIES_COOKIES", "", time() - $expired_cookie);
        session_destroy();
        header("location:./");
    } else {

        echo '
        <!-- App Capsule -->
        <div id="appCapsule">
            <div class="section mt-3 text-center">
                <div class="avatar-section">
                    <a href="#">';
        if ($row_user['photo'] == '') {
            echo '<img src="' . $base_url . 'sw-content/avatar.jpg" alt="image" class="imaged w100 rounded">';
        } else {
            echo '<img src="timthumb?src=' . $base_url . 'sw-content/karyawan/' . $row_user['photo'] . '&h=100&w=105" alt="avatar" class="imaged w100 rounded">';
        }
        echo '
                    </a>
                </div>
            </div>

            <div class="section mt-2 mb-2">
                <div class="section-title">Profil</div>
                <div class="card">
                    <div class="card-body">
                        <form id="update-profile">
                            <div class="form-group boxed">
                                <div class="input-wrapper">
                                    <label class="label">Nama</label>
                                    <input type="text" class="form-control" name="employees_name" value="' . $row_user['employees_name'] . '" required>
                                    <i class="clear-input">
                                        <ion-icon name="close-circle"></ion-icon>
                                    </i>
                                </div>
                            </div>

                            <div class="form-group boxed">
                                <div class="input-wrapper">
                                    <label class="label">Jabatan</label>
                                    <select class="form-control custom-select" name="position_id">';
        $query = "SELECT * from position order by position_name ASC";
        $result = $connection->query($query);
        while ($rowa = $result->fetch_assoc()) {
            $selected = $rowa['position_id'] == $row_user['position_id'] ? 'selected' : '';
            echo '<option value="' . $rowa['position_id'] . '" ' . $selected . '>' . $rowa['position_name'] . '</option>';
        }
        echo '
                                    </select>
                                </div>
                            </div>

                            <div class="form-group boxed">
                                <div class="input-wrapper">
                                    <label class="label">Jam Kerja</label>
                                    <select class="form-control custom-select" name="shift_id">';
        $query = "SELECT shift_id,shift_name from shift order by shift_name ASC";
        $result = $connection->query($query);
        while ($rowa = $result->fetch_assoc()) {
            $selected = $rowa['shift_id'] == $row_user['shift_id'] ? 'selected' : '';
            echo '<option value="' . $rowa['shift_id'] . '" ' . $selected . '>' . $rowa['shift_name'] . '</option>';
        }
        echo '
                                    </select>
                                </div>
                            </div>

                            <div class="form-group boxed">
                                <div class="input-wrapper">
                                    <label class="label">Lokasi Penempatan</label>
                                    <select class="form-control custom-select" name="building_id">';
        $query  = "SELECT building_id, name, address from building";
        $result = $connection->query($query);
        while ($row = $result->fetch_assoc()) {
            $selected = $row['building_id'] == $row_user['building_id'] ? 'selected' : '';
            echo '<option value="' . $row['building_id'] . '" ' . $selected . '>' . $row['name'] . '</option>';
        }
        echo '
                                    </select>
                                </div>
                            </div>

                            <hr>
                            <button type="submit" class="btn btn-danger mr-1 btn-lg btn-block btn-profile">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="section mt-2 mb-2">
                <div class="section-title">Update Email & Password</div>
                <div class="card">
                    <div class="card-body">
                        <form id="update-password">
                            <div class="form-group boxed">
                                <div class="input-wrapper">
                                    <label class="label">Email</label>
                                    <input type="email" class="form-control" name="employees_email" value="' . $row_user['employees_email'] . '">
                                    <i class="clear-input">
                                        <ion-icon name="close-circle"></ion-icon>
                                    </i>
                                </div>
                            </div>

                            <div class="form-group boxed">
                                <div class="input-wrapper">
                                    <label class="label">Password Baru</label>
                                    <input type="password" class="form-control" name="employees_password" value="">
                                    <i class="clear-input">
                                        <ion-icon name="close-circle"></ion-icon>
                                    </i>
                                </div>
                            </div>

                            <hr>
                            <button type="submit" class="btn btn-danger mr-1 btn-lg btn-block">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- * App Capsule -->
        ';
    }

    include_once 'sw-mod/sw-footer.php';
}
?>
