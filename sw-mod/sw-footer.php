<?php if(empty($connection)){
	header('location:./404');
} else {

if(isset($_COOKIE['COOKIES_MEMBER'])){
echo'
<div class="appBottomMenu">
        <a href="./" class="item">
            <div class="col">
                <ion-icon name="home-outline"></ion-icon>
                <strong>Home</strong>
            </div>
        </a>

        <a href="absent" class="item">
            <div class="col">
                <ion-icon name="camera-outline"></ion-icon>
                <strong>Absen</strong>
            </div>
        </a>

        <a href="./cuty" class="item">
            <div class="col">
               <ion-icon name="calendar-outline"></ion-icon>
                <strong>Cuty</strong>
            </div>
        </a>

        <a href="./history" class="item">
            <div class="col">
                 <ion-icon name="document-text-outline"></ion-icon>
                <strong>History</strong>
            </div>
        </a>

        
        <a href="./profile" class="item">
            <div class="col">
                <ion-icon name="person-outline"></ion-icon>
                <strong>Profil</strong>
            </div>
        </a>
    </div>
<!-- * App Bottom Menu -->';
}
ob_end_flush();
echo'
<footer class="text-muted text-center" style="display:none">
   <p>© 2021 - '.$year.' '.$site_name.' - Design By: <span id="credits"><a class="credits_a" href="https://eydcom.com" target="_blank">eydcom.com</a></span></p>
</footer>
<!-- ///////////// Js Files ////////////////////  -->
<!-- Jquery -->
<script src="'.$base_url.'sw-mod/sw-assets/js/lib/jquery-3.4.1.min.js"></script>
<!-- Bootstrap-->
<script src="'.$base_url.'sw-mod/sw-assets/js/lib/popper.min.js"></script>
<script src="'.$base_url.'sw-mod/sw-assets/js/lib/bootstrap.min.js"></script>
<!-- Ionicons -->
<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
<script src="https://kit.fontawesome.com/0ccb04165b.js" crossorigin="anonymous"></script>
<!-- Base Js File -->
<script src="'.$base_url.'sw-mod/sw-assets/js/base.js"></script>
<script src="'.$base_url.'sw-mod/sw-assets/js/sweetalert.min.js"></script>
<script src="'.$base_url.'sw-mod/sw-assets/js/webcamjs/webcam.min.js"></script>';
if($mod =='history' OR $mod=='cuty' OR $mod=='izin'){
echo'
<script src="'.$base_url.'sw-mod/sw-assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="'.$base_url.'sw-mod/sw-assets/js/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="'.$base_url.'sw-mod/sw-assets/js/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="'.$base_url.'sw-mod/sw-assets/js/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
<script>
    $(".datepicker").datepicker({
        format: "dd-mm-yyyy",
        "autoclose": true
    }); 
    
</script>';
}
echo'
<script src="'.$base_url.'/sw-mod/sw-assets/js/sw-script.js"></script>';
if ($mod =='absent'){?>
<script src="https://npmcdn.com/leaflet@0.7.7/dist/leaflet.js"></script>


<script type="text/javascript">
    navigator.geolocation.getCurrentPosition(function(location) {
        var lat2 = location.coords.latitude;
        var lon2 = location.coords.longitude;

        // Ambil data koordinat dari database dan pisahkan latitude dan longitude
        var buildingCoords = "<?php echo $row_building['latitude_longtitude'];?>".split(',');
        var lat1 = parseFloat(buildingCoords[0]);
        var lon1 = parseFloat(buildingCoords[1]);

        // Fungsi Haversine untuk hitung jarak antara dua titik
        function haversineDistance(lat1, lon1, lat2, lon2) {
            function toRad(x) {
                return x * Math.PI / 180;
            }

            var R = 6371000; // Radius bumi dalam meter
            var dLat = toRad(lat2 - lat1);
            var dLon = toRad(lon2 - lon1);
            var a = Math.sin(dLat/2) * Math.sin(dLat/2) +
                    Math.cos(toRad(lat1)) * Math.cos(toRad(lat2)) *
                    Math.sin(dLon/2) * Math.sin(dLon/2);
            var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
            return R * c;
        }

        // Hitung jarak
        var jarak = haversineDistance(lat1, lon1, lat2, lon2).toFixed(0);
        var radius = <?php echo $row_building['radius'];?>;

        // Tampilkan posisi & jarak
        $("#latitude").text(lat2 + "," + lon2);
        $("#jarak").text(jarak);

        // Cek apakah dalam radius
        if (jarak > radius) {
            swal({
                title: 'Oops!',
                text: 'Posisi Anda saat ini tidak dalam radius!',
                icon: 'error',
                timer: 3000
            });
        } else {
            swal({
                title: 'Success!',
                text: 'Posisi Anda dalam radius',
                icon: 'success',
                timer: 3000
            });
        }
        
     /* ------------------------------------------
        Start Kamera Webcame
    ----------------------------------------------*/
    var _0x59f9=["\x6A\x70\x65\x67","\x73\x65\x74","\x6B\x69\x6E\x64","\x76\x69\x64\x65\x6F\x69\x6E\x70\x75\x74","\x64\x65\x76\x69\x63\x65\x49\x64","\x66\x6F\x72\x45\x61\x63\x68","\x74\x68\x65\x6E","\x65\x6E\x75\x6D\x65\x72\x61\x74\x65\x44\x65\x76\x69\x63\x65\x73","\x6D\x65\x64\x69\x61\x44\x65\x76\x69\x63\x65\x73","\x63\x6F\x6E\x73\x74\x72\x61\x69\x6E\x74\x73","\x2E\x77\x65\x62\x63\x61\x6D\x2D\x63\x61\x70\x74\x75\x72\x65","\x61\x74\x74\x61\x63\x68","\x73\x72\x63","\x6D\x61\x74\x63\x68","\x75\x73\x65\x72\x41\x67\x65\x6E\x74","\x2E\x2F\x73\x77\x2D\x6D\x6F\x64\x2F\x73\x77\x2D\x61\x73\x73\x65\x74\x73\x2F\x6A\x73\x2F\x77\x65\x62\x63\x61\x6D\x6A\x73\x2F\x73\x68\x75\x74\x74\x65\x72\x2E\x6F\x67\x67","\x2E\x2F\x73\x77\x2D\x6D\x6F\x64\x2F\x73\x77\x2D\x61\x73\x73\x65\x74\x73\x2F\x6A\x73\x2F\x77\x65\x62\x63\x61\x6D\x6A\x73\x2F\x73\x68\x75\x74\x74\x65\x72\x2E\x6D\x70\x33","\x63\x6C\x69\x63\x6B","\x2E\x61\x62\x73\x65\x6E\x74\x2D\x63\x61\x70\x74\x75\x72\x65","\x70\x6C\x61\x79","\x68\x74\x6D\x6C","\x2E\x6C\x61\x74\x69\x74\x75\x64\x65","\x2E\x2F\x73\x77\x2D\x70\x72\x6F\x73\x65\x73\x3F\x61\x63\x74\x69\x6F\x6E\x3D\x61\x62\x73\x65\x6E\x74\x26\x6C\x61\x74\x69\x74\x75\x64\x65\x3D","\x26\x72\x61\x64\x69\x75\x73\x3D","","\x2F","\x73\x70\x6C\x69\x74","\x73\x75\x63\x63\x65\x73\x73","\x42\x65\x72\x68\x61\x73\x69\x6C\x21","\x6C\x6F\x63\x61\x74\x69\x6F\x6E\x2E\x68\x72\x65\x66\x20\x3D\x20\x27\x2E\x2F\x27\x3B","\x4F\x6F\x70\x73\x21","\x65\x72\x72\x6F\x72","\x75\x70\x6C\x6F\x61\x64","\x73\x6E\x61\x70","\x6F\x6E"];Webcam[_0x59f9[1]]({width:590,height:460,image_format:_0x59f9[0],jpeg_quality:80});var cameras= new Array();navigator[_0x59f9[8]][_0x59f9[7]]()[_0x59f9[6]](function(_0xc825x2){_0xc825x2[_0x59f9[5]](function(_0xc825x3){var _0xc825x4=0;if(_0xc825x3[_0x59f9[2]]=== _0x59f9[3]){cameras[_0xc825x4]= _0xc825x3[_0x59f9[4]];_0xc825x4++}})});Webcam[_0x59f9[1]](_0x59f9[9],{width:590,height:460,image_format:_0x59f9[0],jpeg_quality:80,sourceId:cameras[0]});Webcam[_0x59f9[11]](_0x59f9[10]);var shutter= new Audio();shutter[_0x59f9[12]]= navigator[_0x59f9[14]][_0x59f9[13]](/Firefox/)?_0x59f9[15]:_0x59f9[16];$(document)[_0x59f9[34]](_0x59f9[17],_0x59f9[18],function(){shutter[_0x59f9[19]]();var _0xc825x6=$(_0x59f9[21])[_0x59f9[20]]();Webcam[_0x59f9[33]](function(_0xc825x7){Webcam[_0x59f9[32]](_0xc825x7,_0x59f9[22]+ _0xc825x6+ _0x59f9[23]+ jarak+ _0x59f9[24],function(_0xc825x8,_0xc825x9){$data= _0x59f9[24]+ _0xc825x9+ _0x59f9[24];var _0xc825xa=$data[_0x59f9[26]](_0x59f9[25]);$results= _0xc825xa[0];$results2= _0xc825xa[1];if($results== _0x59f9[27]){swal({title:_0x59f9[28],text:$results2,icon:_0x59f9[27],timer:3500});setTimeout(_0x59f9[29],3600)}else {swal({title:_0x59f9[30],text:_0xc825x9,icon:_0x59f9[31],timer:3500})}})})})
    });
</script>
<?php }?>
  <!-- </body></html> -->
  </body>
</html><?php }?>