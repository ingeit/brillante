<input type="text" id="input" placeholder="Message…" />
<hr />
<pre id="output"></pre>

<script>
  var host   = 'ws://rickybruno.sytes.net:8889';
  var socket = null;
  var input  = document.getElementById('input');
  var output = document.getElementById('output');
  var print  = function (message) {
      var samp       = document.createElement('samp');
      samp.innerHTML = message + '\n';
      output.appendChild(samp);

      return;
  };

  input.addEventListener('keyup', function (evt) {
      if (13 === evt.keyCode) {
          var msg = input.value;
          prueba_notificacion();

          if (!msg) {
              return;
          }

          try {
              socket.send(msg);
              input.value = '';
              input.focus();
          } catch (e) {
              console.log(e);
          }

          return;
      }
  });

  try {
      socket = new WebSocket(host);
      socket.onopen = function () {
          print('connection is opened');
          input.focus();

          return;
      };
      socket.onmessage = function (msg) {
          print(msg.data);

          return;
      };
      socket.onclose = function () {
          print('connection is closed');

          return;
      };
  } catch (e) {
      console.log(e);
  }
  
  // Consultar de forma estándar el permiso

function prueba_notificacion() {
if (Notification) {
if (Notification.permission !== "granted") {
Notification.requestPermission()
}
var title = "Brillante"
var extra = {
icon: "http://rickybruno.sytes.net:8000/assets/imagenes/logo.jpg",
body: "Venta nueva"
}
var noti = new Notification( title, extra)
noti.onclick = {
// Al hacer click
}
noti.onclose = {
// Al cerrar
}
setTimeout( function() { noti.close() }, 10000)
}
}




</script>