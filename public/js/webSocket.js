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