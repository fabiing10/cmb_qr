<!DOCTYPE html>
<html>
  <head>
    <title>QR Scan</title>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
  </head>
  <body>
    <video id="preview" style='width:100%'></video>
    <script type="text/javascript">
      let scanner = new Instascan.Scanner({ video: document.getElementById('preview'), mirror: false });
      scanner.addListener('scan', function (content) {
        console.log(content);
        alert(content)
      });
      Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
          console.log(cameras);
          scanner.start(cameras[1]);
        } else {
          console.error('No cameras found.');
        }
      }).catch(function (e) {
        console.error(e);
      });
    </script>
  </body>
</html>
