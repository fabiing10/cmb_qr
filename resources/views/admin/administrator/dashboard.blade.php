<!DOCTYPE html>
<html>
  <head>
    <title>QR Scan</title>
    <script type="text/javascript" src="{{URL::asset('admin/qr/instascan.min.js')}}"></script>
  </head>
  <body>
    <span id="id_cam"></span>
    <video id="preview" style="width:100%;"></video>
    <script type="text/javascript">

    var ua = navigator.userAgent.toLowerCase();
var isAndroid = ua.indexOf("android") > -1; //&& ua.indexOf("mobile");
if(isAndroid) {
  // Do something!
  let scanner = new Instascan.Scanner({ video: document.getElementById('preview'), mirror: false });
  scanner.addListener('scan', function (content) {
    window.open(content, '_self');
  });
  Instascan.Camera.getCameras().then(function (cameras) {

    if (cameras.length > 0) {
      scanner.start(cameras[1]);
    } else {
      console.error('No cameras found.');
    }
  }).catch(function (e) {
    console.error(e);
  });
}else{
  let scanner = new Instascan.Scanner({ video: document.getElementById('preview'), mirror: false });
  scanner.addListener('scan', function (content) {
    window.open(content, '_self');
  });
  Instascan.Camera.getCameras().then(function (cameras) {

    if (cameras.length > 0) {
      scanner.start(cameras[0]);
    } else {
      console.error('No cameras found.');
    }
  }).catch(function (e) {
    console.error(e);
  });
}


    /* Code for Android


      */
      </script>
  </body>
</html>
