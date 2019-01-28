<!DOCTYPE html>
<html>
  <head>
    <title>QR Scan</title>
    <script type="text/javascript" src="https://cozmo.github.io/jsQR/jsQR.js"></script>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
  </head>
  <body>
    <div>
      <video muted playsinline id="qr-video"></video>
      <canvas id="debug-canvas"></canvas>
  </div>
  <div>
      <select id="inversion-mode-select">
          <option value="original">Scan original (dark QR code on bright background)</option>
          <option value="invert">Scan with inverted colors (bright QR code on dark background)</option>
          <option value="both">Scan both</option>
      </select>
      <br>
      <input type="checkbox" id="debug-checkbox">
      <label for="debug-checkbox">Show debug image</label>
  </div>
  <b>Detected QR code: </b>
  <span id="cam-qr-result">None</span>
  <hr>



  <script type="module">
      import QrScanner from "../assets/qr-scanner.min.js";
      const video = document.getElementById('qr-video');
      const debugCheckbox = document.getElementById('debug-checkbox');
      const debugCanvas = document.getElementById('debug-canvas');
      const debugCanvasContext = debugCanvas.getContext('2d');
      const camQrResult = document.getElementById('cam-qr-result');
      const fileSelector = document.getElementById('file-selector');
      const fileQrResult = document.getElementById('file-qr-result');
      function setResult(label, result) {
          label.textContent = result;
          label.style.color = 'teal';
          clearTimeout(label.highlightTimeout);
          label.highlightTimeout = setTimeout(() => label.style.color = 'inherit', 100);
      }
      // ####### Web Cam Scanning #######
      const scanner = new QrScanner(video, result => setResult(camQrResult, result));
      scanner.start();
      document.getElementById('inversion-mode-select').addEventListener('change', event => {
          scanner.setInversionMode(event.target.value);
      });
      // ####### File Scanning #######
      fileSelector.addEventListener('change', event => {
          const file = fileSelector.files[0];
          if (!file) {
              return;
          }
          QrScanner.scanImage(file)
              .then(result => setResult(fileQrResult, result))
              .catch(e => setResult(fileQrResult, e || 'No QR code found.'));
      });
      // ####### debug mode related code #######
      debugCheckbox.addEventListener('change', () => setDebugMode(debugCheckbox.checked));
      function setDebugMode(isDebug) {
          const worker = scanner._qrWorker;
          worker.postMessage({
              type: 'setDebug',
              data: isDebug
          });
          if (isDebug) {
              debugCanvas.style.display = 'block';
              worker.addEventListener('message', handleDebugImage);
          } else {
              debugCanvas.style.display = 'none';
              worker.removeEventListener('message', handleDebugImage);
          }
      }
      function handleDebugImage(event) {
          const type = event.data.type;
          if (type === 'debugImage') {
              const imageData = event.data.data;
              if (debugCanvas.width !== imageData.width || debugCanvas.height !== imageData.height) {
                  debugCanvas.width = imageData.width;
                  debugCanvas.height = imageData.height;
              }
              debugCanvasContext.putImageData(imageData, 0, 0);
          }
      }
  </script>

  </body>
</html>
