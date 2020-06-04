var height = document.documentElement.clientHeight;
console.log(height);

$("#header, #feature").css("height",0.09*height);
// $("#feature").css("height",0.09*height);
$(".button-grp .row").css("height",0.08*height);

$("#float").css("bottom",height/300);
var panel = 0.64*height;


function gridSetup(){
  var n = $("#call-active video").length;
  if(n <= 9){
    switch(n){
        case 1: $("#call-active video").css("width","100%"); break; 
        case 2:
        case 3:
        case 4: $("#call-active video").css("width","50%"); break;
        case 5:
        case 6:
        case 7:
        case 8:
        case 9: $("#call-active video").css("width","33%"); break;
    }
    
    switch(n){
        case 1: 
        case 2: $("#call-active video").css("height",panel); break;
        case 3:
        case 4: 
        case 5:
        case 6: $("#call-active video").css("height",panel/2); break;
        case 7:
        case 8:
        case 9: $("#call-active video").css("height",panel/3); break;
    }
  }
  else{
      console.log("bigger");
  }
}



// --------------------------------------------------------------------------action.js



function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i <ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

console.log(getCookie("username"));
console.log(getCookie("roomId"));


const urlParams = new URLSearchParams(window.location.search);
const roomId = getCookie("roomId");
const peerName = getCookie('username');

//hello
if (!roomId || !peerName) {
  //alert('You have to set roomId and peerName in url params. Like ?roomId=room1&peerName=Alice');
  alert("hello world");
  throw new Error('roomId and peerName weren\'t set in url params');
}

const socket = io('http://34.72.4.230:8080', { query: { roomId, peerName } });

// Create a local Room instance associated to the remote Room.
const room = new mediasoupClient.Room();
// Transport for sending our media.
let sendTransport;
// Transport for receiving media from remote Peers.
let recvTransport;

console.debug('ROOM:', room);

room.join(peerName)
  .then((peers) => {
    console.debug('PEERS:', peers);

    // Create the Transport for sending our media.
    sendTransport = room.createTransport('send');
    // Create the Transport for receiving media from remote Peers.
    recvTransport = room.createTransport('recv');

    peers.forEach(peer => handlePeer(peer));
  })
  .then(() => {
    // Get our mic and camera
    return navigator.mediaDevices.getUserMedia({
      audio: true,
	video:true
    });
  })
  .then((stream) => {
    const audioTrack = stream.getAudioTracks()[0];
    const videoTrack = stream.getVideoTracks()[0];

    if (true) {
      // Show local stream
      const localStream = new MediaStream([videoTrack, audioTrack]);
      const video = document.createElement('video');
      video.setAttribute('style', 'max-width: 400px;');
      video.srcObject = localStream;
      document.getElementById('float').appendChild(video);
      video.play();
    }

    // Create Producers for audio and video.
    const audioProducer = room.createProducer(audioTrack);
    const videoProducer = room.createProducer(videoTrack);

    // Send our audio.
    audioProducer.send(sendTransport);
    // Send our video.
    videoProducer.send(sendTransport);
  });

// Event fired by local room when a new remote Peer joins the Room
room.on('newpeer', (peer) => {
  console.debug('A new Peer joined the Room:', peer.name);

  // Handle the Peer.
  handlePeer(peer);
});

// Event fired by local room
room.on('request', (request, callback, errback) => {
  console.debug('REQUEST:', request);
  socket.emit('mediasoup-request', request, (err, response) => {
    if (!err) {
      // Success response, so pass the mediasoup response to the local Room.
      callback(response);
    } else {
      errback(err);
    }
  });
});

// Be ready to send mediaSoup client notifications to our remote mediaSoup Peer
room.on('notify', (notification) => {
  console.debug('New notification from local room:', notification);
  socket.emit('mediasoup-notification', notification);
});

// Handle notifications from server, as there might be important info, that affects stream
socket.on('mediasoup-notification', (notification) => {
  console.debug('New notification came from server:', notification);
  room.receiveNotification(notification);
});

/**
 * Handles specified peer in the room
 *
 * @param peer
 */
function handlePeer(peer) {
  // Handle all the Consumers in the Peer.
  peer.consumers.forEach(consumer => handleConsumer(consumer));

  // Event fired when the remote Room or Peer is closed.
  peer.on('close', () => {
    console.log('Remote Peer closed');
  });

  // Event fired when the remote Peer sends a new media to mediasoup server.
  peer.on('newconsumer', (consumer) => {
    console.log('Got a new remote Consumer');

    // Handle the Consumer.
    handleConsumer(consumer);
  });
}

/**
 * Handles specified consumer
 *
 * @param consumer
 */
function handleConsumer(consumer) {
  // Receive the media over our receiving Transport.
  consumer.receive(recvTransport)
    .then((track) => {
      console.debug('Receiving a new remote MediaStreamTrack:', consumer.kind);

      // Attach the track to a MediaStream and play it.
      const stream = new MediaStream();
      stream.addTrack(track);

      if (consumer.kind === 'video') {
        const video = document.createElement('video');
        video.setAttribute('style', 'max-width: 400px;');
        video.setAttribute('playsinline', '');
        video.srcObject = stream;
        document.getElementById('call-active').appendChild(video);
        gridSetup();
        video.play();
      }
      if (consumer.kind === 'audio') {
        const audio = document.createElement('audio');
        audio.srcObject = stream;
        document.getElementById('call-active').appendChild(audio);
        audio.play();
      }
    });

  // Event fired when the Consumer is closed.
  consumer.on('close', () => {
    console.log('Consumer closed');
  });
}
