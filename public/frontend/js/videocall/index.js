// Constants
const API_BASE_URL = "https://api.videosdk.live";

// Declaring variables
let videoContainer = document.getElementById("videoContainer");
let micButton = document.getElementById("micButton");
let camButton = document.getElementById("camButton");
let copy_meeting_id = document.getElementById("meetingid");
let contentRaiseHand = document.getElementById("contentRaiseHand");
let btnScreenShare = document.getElementById("btnScreenShare");
let videoScreenShare = document.getElementById("videoScreenShare");
let btnRaiseHand = document.getElementById("btnRaiseHand");
// let btnStopPresenting = document.getElementById("btnStopPresenting");
let btnSend = document.getElementById("btnSend");
let participantsList = document.getElementById("participantsList");
let videoCamOff = document.getElementById("main-pg-cam-off");
let videoCamOn = document.getElementById("main-pg-cam-on");

let micOn = document.getElementById("main-pg-unmute-mic");
let micOff = document.getElementById("main-pg-mute-mic");

//recording
let btnStartRecording = document.getElementById("btnStartRecording");
let btnStopRecording = document.getElementById("btnStopRecording");

//videoPlayback DIV
let videoPlayback = document.getElementById("videoPlayback");

let meeting = "";
// Local participants
let localParticipant;
let localParticipantAudio;
let createMeetingFlag = 0;
let joinMeetingFlag = 0;
let token = "";
let validateMeetingIdAnswer = "";
let micEnable = true;
let webCamEnable = true;
let totalParticipants = 0;
let remoteParticipantId = "";
let participants = [];
// join page
let joinPageWebcam = document.getElementById("joinCam");
let meetingCode = "";
let screenShareOn = false;
let joinPageVideoStream = null;

async function tokenGeneration() {
  if (TOKEN != "") {
    token = TOKEN;
    console.log(token);
  } else if (AUTH_URL != "") {
    token = await window
      .fetch(AUTH_URL + "/generateJWTToken")
      .then(async (response) => {
        const { token } = await response.json();
        console.log(token);
        return token;
      })
      .catch(async (e) => {
        console.log(await e);
        return;
      });
  } else if (AUTH_URL == "" && TOKEN == "") {
    alert("Set Your configuration details first ");
    window.location.href = "/";
    // window.location.reload();
  } else {
    alert("Check Your configuration once ");
    window.location.href = "/";
    // window.location.reload();
  }
}

async function validateMeeting() {
  tokenGeneration();
  meetingId = document.getElementById("joinMeetingId").value;
  if (token != "") {
    const url = `${API_BASE_URL}/api/meetings/${meetingId}`;

    const options = {
      method: "POST",
      headers: { Authorization: token },
    };

    const result = await fetch(url, options)
      .then((response) => response.json()) //result will have meeting id
      .catch((error) => {
        console.error("error", error);
        alert("Invalid Meeting Id");
        window.location.href = "/";
        return;
      });
    if (result.meetingId === meetingId) {
      navigator.mediaDevices
        .getUserMedia({
          video: true,
          audio: false,
        })
        .then((stream) => {
          joinPageVideoStream = stream;
          joinPageWebcam.srcObject = stream;
          joinPageWebcam.play();
        });
      document.getElementById("joinPage").style.display = "flex";
      document.getElementById("home-page").style.display = "none";
      return meetingId;
    }
  } else {
    validateMeetingIdAnswer = await fetch(
      AUTH_URL + "/validatemeeting/" + meetingId,
      {
        method: "POST",
        headers: {
          Authorization: token,
          "Content-Type": "application/json",
        },
      }
    )
      .then(async (result) => {
        const { meetingId } = await result.json();
        console.log(meetingId);
        if (meetingId == undefined) {
          return alert("Invalid Meeting ID ");
        } else {
          navigator.mediaDevices
            .getUserMedia({
              video: true,
              audio: false,
            })
            .then((stream) => {
              joinPageVideoStream = stream;
              joinPageWebcam.srcObject = stream;
              joinPageWebcam.play();
            });
          document.getElementById("joinPage").style.display = "flex";
          document.getElementById("home-page").style.display = "none";
          return meetingId;
        }
      })
      .catch(async (e) => {
        alert("Meeting ID Invalid", await e);
        window.location.href = "/";
        return;
      });

    console.log("Meeting ID Answer : ", validateMeetingIdAnswer);
  }
}

function addParticipantToList({ id, displayName }) {
  let participantTemplate = document.createElement("div");
  participantTemplate.className = "row";
  participantTemplate.style.padding = "4px";
  participantTemplate.style.marginTop = "1px";
  participantTemplate.style.marginLeft = "7px";
  participantTemplate.style.marginRight = "7px";
  participantTemplate.style.borderRadius = "3px";
  participantTemplate.style.border = "1px solid rgb(61, 60, 78)";
  participantTemplate.style.backgroundColor = "rgb(61, 60, 78)";

  //icon
  let colIcon = document.createElement("div");
  colIcon.className = "col-2";
  colIcon.innerHTML = "Icon";
  participantTemplate.appendChild(colIcon);

  //name
  let content = document.createElement("div");
  colIcon.className = "col-3";
  colIcon.innerHTML = `${displayName}`;
  console.log(displayName);
  participantTemplate.appendChild(content);
  // participants.push({ id, displayName });

  console.log(participants);

  participantsList.appendChild(participantTemplate);
  participantsList.appendChild(document.createElement("br"));
}

function createLocalParticipant() {
  totalParticipants++;
  localParticipant = createVideoElement(meeting.localParticipant.id,meeting.localParticipant.displayName);
  localParticipantAudio = createAudioElement(meeting.localParticipant.id);
  // console.log("localPartcipant.id : ", localParticipant.className);
  // console.log("meeting.localPartcipant.id : ", meeting.localParticipant.id);
  videoContainer.appendChild(localParticipant);
}

async function startMeeting(token, meetingId, name) {
  if (joinPageVideoStream !== null) {
    const tracks = joinPageVideoStream.getTracks();
    tracks.forEach((track) => {
      track.stop();
    });
    joinPageVideoStream = null;
    joinPageWebcam.srcObject = null;
  }

  
  // Meeting config
  window.VideoSDK.config(token);

  let customVideoTrack = await window.VideoSDK.createCameraVideoTrack({
    optimizationMode: "motion",
    encoderConfig: "h540p_w960p"
  });

  let customAudioTrack = await VideoSDK.createMicrophoneAudioTrack({
    encoderConfig: "high_quality",
    noiseConfig: {
      noiseSuppresion: true,
      echoCancellation: true,
      autoGainControl: true,
    },
  });

  // Meeting Init
  meeting = window.VideoSDK.initMeeting({
    meetingId: meetingId, // required
    name: name, // required
    micEnabled: true, // optional, default: true
    webcamEnabled: true, // optional, default: true
    maxResolution: "hd", // optional, default: "hd"
    customCameraVideoTrack: customVideoTrack,
    customMicrophoneAudioTrack: customAudioTrack,
  });

  toggleControls();
  participants = meeting.participants;
  console.log("meeting obj : ", meeting);
  // Meeting Join
  meeting.join();

  //create Local Participant
  createLocalParticipant();

  //add yourself in participant list
  if (totalParticipants != 0)
    addParticipantToList({
      id: meeting.localParticipant.id,
      displayName: "You",
    });

  // Setting local participant stream
  meeting.localParticipant.on("stream-enabled", (stream) => {
    setTrack(
      stream,
      localParticipantAudio,
      meeting.localParticipant,
      (isLocal = true)
    );
  });

  meeting.localParticipant.on("stream-disabled", (stream) => {
    if (stream.kind == "video") {
      videoCamOn.style.display = "none";
      videoCamOff.style.display = "inline-block";
    }
    if (stream.kind == "audio") {
      micOn.style.display = "none";
      micOff.style.display = "inline-block";
    }
  });

  meeting.on("meeting-joined", () => {
    meeting.pubSub.subscribe("CHAT", (data) => {
      let { message, senderId, senderName, timestamp } = data;
      const chatBox = document.getElementById("chatArea");
      const chatTemplate = `
          <div style="margin-bottom: 10px; ${
            meeting.localParticipant.id == senderId && "text-align : right"
          }">
            <span style="font-size:12px;">${senderName}</span>
            <div style="margin-top:5px">
              <span style="background:${
                meeting.localParticipant.id == senderId ? "grey" : "crimson"
              };color:white;padding:5px;border-radius:8px">${message}<span>
            </div>
          </div>
          `;
      chatBox.insertAdjacentHTML("beforeend", chatTemplate);
    });
  });

  // Other participants
  meeting.on("participant-joined", (participant) => {
    totalParticipants++;
    let videoElement = createVideoElement(participant.id,participant.displayName);
    console.log("Video Element Created");
    let resizeObserver = new ResizeObserver(() => {
      participant.setViewPort(
        videoElement.offsetWidth,
        videoElement.offsetHeight
      );
    });
    resizeObserver.observe(videoElement);
    let audioElement = createAudioElement(participant.id);
    remoteParticipantId = participant.id;

    participant.on("stream-enabled", (stream) => {
      setTrack(stream, audioElement, participant, (isLocal = false));
    });
    videoContainer.appendChild(videoElement);
    console.log("Video Element Appended");
    videoContainer.appendChild(audioElement);
   
    addParticipantToList(participant);
  });

  // participants left
  meeting.on("participant-left", (participant) => {
    totalParticipants--;
    let vElement = document.getElementById(`v-${participant.id}`);
    vElement.parentNode.removeChild(vElement);

    let aElement = document.getElementById(`a-${participant.id}`);
    aElement.parentNode.removeChild(aElement);
    //remove it from participant list participantId;
    document.getElementById(`p-${participant.id}`).remove();
  });
  
  //recording events
  meeting.on("recording-started", () => {
    console.log("RECORDING STARTED EVENT");
    // btnStartRecording.style.display = "none";
    // btnStopRecording.style.display = "inline-block";
  });
  meeting.on("recording-stopped", () => {
    console.log("RECORDING STOPPED EVENT");
    $('.videoloader').html('Call is end by '+EndByName);
    $('.videoloader').show();
    $('.callsdkbtn').hide();
    $('.backbtn').show();
    // btnStartRecording.style.display = "inline-block";
    // btnStopRecording.style.display = "none";
  });

  meeting.on("presenter-changed", (presenterId) => {
    if (presenterId) {
      console.log(presenterId);
      videoScreenShare.style.display = "block";
    } else {
      console.log(presenterId);
      videoScreenShare.removeAttribute("src");
      videoScreenShare.pause();
      videoScreenShare.load();
      videoScreenShare.style.display = "none";

      btnScreenShare.style.color = "white";
      screenShareOn = false;
      console.log(`screen share on : ${screenShareOn}`);
    }
  });

  //add DOM Events
  addDomEvents();


}

// joinMeeting();
async function joinMeeting(newMeeting) {
  tokenGeneration();
  let joinMeetingName = document.getElementById("joinMeetingName").value || "Other";
  let meetingId = document.getElementById("joinMeetingId").value || "";
  if (!meetingId && !newMeeting) {
    return alert("Please Provide a meetingId");
  }

  if (newMeeting) {
    createMeetingFlag = 1;
    joinMeetingFlag = 0;
  } else if (meetingId != "") {
    joinMeetingFlag = 1;
    createMeetingFlag = 0;
  } else if (!newMeeting) {
    document.getElementById("joinPage").style.display = "none";
    document.getElementById("home-page").style.display = "none";
    // document.getElementById("gridPpage").style.display = "flex";
    toggleControls();
  }

  if (createMeetingFlag == 1) {
    document.getElementById("joinPage").style.display = "none";
    document.getElementById("home-page").style.display = "none";
    // document.getElementById("gridPpage").style.display = "flex";
    toggleControls();
  } else if (joinMeetingFlag == 1) {
    document.getElementById("joinPage").style.display = "flex";
    document.getElementById("home-page").style.display = "none";
    // document.getElementById("gridPpage").style.display = "none";
  }

  //create New Token
  // tokenGeneration();

  const options = {
    method: "POST",
    headers: {
      Authorization: token,
      "Content-Type": "application/json",
    },
    body: JSON.stringify({ token }),
  };

  if (!newMeeting) {
    console.log(meetingId);
    document.getElementById("joinPage").style.display = "none";
    document.getElementById("home-page").style.display = "none";
    // document.getElementById("gridPpage").style.display = "flex";
    document.getElementById("meetingid").value = meetingId;
    startMeeting(token, meetingId, joinMeetingName);
  }

  //create New Meeting
  //get new meeting if new meeting requested;
  if (newMeeting && TOKEN != "") {
    const url = `${API_BASE_URL}/api/meetings`;
    const options = {
      method: "POST",
      headers: { Authorization: token, "Content-Type": "application/json" },
    };

    const { meetingId } = await fetch(url, options)
      .then((response) => response.json())
      .catch((error) => alert("error", error));
    document.getElementById("meetingid").value = meetingId;   
    
    startMeeting(token, meetingId, joinMeetingName);
    SendInvitationLink();
    
  } else if (newMeeting && TOKEN == "") {
    meetingId = await fetch(AUTH_URL + "/createMeeting", options).then(
      async (result) => {
        console.log("result of create meeting : ", result);
        const { meetingId } = await result.json();
        console.log("NEW MEETING meetingId", meetingId);
        return meetingId;
      }
    );
    document.getElementById("meetingid").value = meetingId;
    
  
    startMeeting(token, meetingId, joinMeetingName);
  }

}

// creating video element

let countvideo=document.getElementsByClassName("video-frame-me").length;
function createVideoElement(pId, displayName) {
  let division;
  division = document.createElement("div");
  division.setAttribute("id", "video-frame-container");
  division.className = `v-${pId}`;
  
  let videoElement = document.createElement("video");
  videoElement.setAttribute("id", `v-${pId}`);
  videoElement.setAttribute("playsinline", true);
  videoElement.classList.add("video-frame-you");

  if (countvideo == 0) {
    videoElement.classList.add("video-frame-me");
    videoElement.setAttribute("width", "150");
  } else {
    videoElement.setAttribute("width", "800");
    videoElement.setAttribute("height", "500");
    
    if (CallEndTime !== undefined) {
      calldurationtrack();
    }
    
    $('#btnStartRecording').click();
  }
  
  division.appendChild(videoElement);
  var s=document.getElementById("demo");
  s.innerHTML=displayName;
  
  countvideo++;
  return videoElement;
}


function calldurationtrack(){
  console.log('Check Session Time : '+CallEndTime+'/////');
  console.log($.cookie('calltracktimecount'));
  if($.cookie('calltracktimecount')==undefined){
    var countdown = CallEndTime;
  }else{
    var countdown = $.cookie('calltracktimecount');
  }
  
  console.log(countdown+'///SSSSS');

  var timerId = setInterval(function(){
    countdown -= 1000;
    var min = Math.floor(countdown / (60 * 1000));
    var sec = Math.floor((countdown - (min * 60 * 1000)) / 1000);  //correct
  
    if (countdown <= 0) {
        $.removeCookie('calltracktimecount'); 
        $.removeCookie('calltracktime');
        alert("Session Call Is Close Now!");
        CallEndBy();
        clearInterval(timerId);
        $('#btnStopRecording').click(); 
        participants = new Map(meeting.participants);
        meeting.leave();
        meeting.end();      
        window.location.href=Redirect;
    }else if(countdown == 300000){
      toastr.error("Session close with in 5 minutes!");
    }else if(countdown == 60000){
      toastr.error("Session close with in 1 minutes!");
    } else {
      //  console.log('Track Time : '+min + " : " + sec);
      //  console.log('Track countdown Time : '+countdown);
    }

    if(countdown > 0){
      $.cookie('calltracktimecount', countdown); 
      $.cookie('calltracktime', min + " : " + sec); 
    }    
  
  }, 1000); //1000ms. = 1sec.
}

// creating audio element
function createAudioElement(pId) {
  let audioElement = document.createElement("audio");
  audioElement.setAttribute("autoPlay", "false");
  audioElement.setAttribute("playsInline", "true");
  audioElement.setAttribute("controls", "false");
  audioElement.setAttribute("id", `a-${pId}`);
  audioElement.style.display = 'none'; 
  return audioElement;
}

//setting up tracks

function setTrack(stream, audioElement, participant, isLocal) {
  if (stream.kind == "video") {
    if (isLocal) {
      videoCamOff.style.display = "none";
      videoCamOn.style.display = "inline-block";
    }
    const mediaStream = new MediaStream();
    mediaStream.addTrack(stream.track);
    let videoElm = document.getElementById(`v-${participant.id}`);
    videoElm.srcObject = mediaStream;
    videoElm
      .play()
      .catch((error) =>
        console.error("videoElem.current.play() failed", error)
      );
      
    participant.setViewPort(videoElm.offsetWidth, videoElm.offsetHeight);
    $('.videoloader').hide();
    
  }
  if (stream.kind == "audio") {
    if (isLocal) {
      micOff.style.display = "none";
      micOn.style.display = "inline-block";
      return;
    }
    const mediaStream = new MediaStream();
    mediaStream.addTrack(stream.track);
    audioElement.srcObject = mediaStream;
    audioElement
      .play()
      .catch((error) => console.error("audioElem.play() failed", error));
  }
  if (stream.kind == "share" && !isLocal) {
    screenShareOn = true;
    const mediaStream = new MediaStream();
    mediaStream.addTrack(stream.track);
    videoScreenShare.srcObject = mediaStream;
    videoScreenShare
      .play()
      .catch((error) =>
        console.error("videoElem.current.play() failed", error)
      );
    videoScreenShare.style.display = "inline-block";
    btnScreenShare.style.color = "grey";
  }
}

//add button events once meeting is created
function addDomEvents() {
  // mic button event listener
  micOn.addEventListener("click", () => {
    console.log("Mic-on pressed");
    meeting.muteMic();
  });

  micOff.addEventListener("click", () => {
    console.log("Mic-f pressed");
    meeting.unmuteMic();
  });

  videoCamOn.addEventListener("click", async () => {
    meeting.disableWebcam();
    
  });

  videoCamOff.addEventListener("click", async () => {
    meeting.enableWebcam();  
    
  });

  // screen share button event listener
  btnScreenShare.addEventListener("click", async () => {
    if (btnScreenShare.style.color == "grey") {
      meeting.disableScreenShare();
    } else {
      meeting.enableScreenShare();
    }
  });

  $('#btnFrontCamera').click(async () => {
    const webcams = await meeting.getWebcams();
    const { deviceId, label } = webcams[0];
    meeting.changeWebcam(deviceId);
    $('#btnBackCamera').show();
    $('#btnFrontCamera').hide();
  });

  $('#btnBackCamera').click(async () => {
    const webcams = await meeting.getWebcams();
    const { deviceId, label } = webcams[1];
    meeting.changeWebcam(deviceId);
    $('#btnBackCamera').hide();
    $('#btnFrontCamera').show();
  });

  //raise hand event
  $("#btnRaiseHand").click(function () {
    let participantId = localParticipant.className;
    if (participantId.split("-")[1] == meeting.localParticipant.id) {
      contentRaiseHand.innerHTML = "You Have Raised Your Hand";
    } else {
      contentRaiseHand.innerHTML = `<b>${remoteParticipantId}</b> Have Raised Their Hand`;
    }

    $("#contentRaiseHand").show();
    setTimeout(function () {
      $("#contentRaiseHand").hide();
    }, 2000);
  });

  //send chat message button
  btnSend.addEventListener("click", async () => {
    const message = document.getElementById("txtChat").value;
    console.log("publish : ", message);
    document.getElementById("txtChat").value = "";
    meeting.pubSub
      .publish("CHAT", message, { persist: true })
      .then((res) => console.log(`response of publish : ${res}`))
      .catch((err) => console.log(`error of publish : ${err}`));
    // meeting.sendChatMessage(JSON.stringify({ type: "chat", message }));
  });

  // //leave Meeting Button
  $("#leaveCall").click(async () => {
    participants = new Map(meeting.participants);
    meeting.leave();
    window.location.reload();
    document.getElementById("home-page").style.display = "flex";
  });

  
  let endCall = document.getElementById("endCall");
  //end meeting button
  $("#endCall").click(async () => {
    if(confirm('Are you sure! you want to close this call.')){
      CallEndBy();
      $('#btnStopRecording').click(); 
      participants = new Map(meeting.participants);
      meeting.leave();
      meeting.end();    
      $.removeCookie('calltracktimecount'); 
      $.removeCookie('calltracktime');  
      window.location.href=Redirect;
    }
  });


  // //startVideo button events [playing VIDEO.MP4]
  // startVideoBtn.addEventListener("click", async () => {
  //   meeting.startVideo({ link: "/video.mp4" });
  // });

  // //end video playback
  // stopVideoBtn.addEventListener("click", async () => {
  //   meeting.stopVideo();
  // });
  // //resume paused video
  // resumeVideoBtn.addEventListener("click", async () => {
  //   meeting.resumeVideo();
  // });
  // //pause playing video
  // pauseVideoBtn.addEventListener("click", async () => {
  //   meeting.pauseVideo({ currentTime: videoPlayback.currentTime });
  // });
  // //seek playing video
  // seekVideoBtn.addEventListener("click", async () => {
  //   meeting.seekVideo({ currentTime: 40 });
  // });
  // //startRecording
  btnStartRecording.addEventListener("click", async () => {
    console.log("btnRecording is clicked");
    if(!meeting.startRecording()){
      meeting.startRecording();
      console.warn(meeting);
      RecordingData(meeting.id);
    }    
  });
  //Stop Recording
  btnStopRecording.addEventListener("click", async () => {
    console.warn(meeting.id);    
    meeting.stopRecording();
  });
}

async function toggleMic() {
  if (micEnable) {
    document.getElementById("micButton").style.backgroundColor = "red";
    document.getElementById("muteMic").style.display = "inline-block";
    document.getElementById("unmuteMic").style.display = "none";
    micEnable = false;
  } else {
    micEnable = true;
    document.getElementById("micButton").style.backgroundColor = "#DCDCDC";
    document.getElementById("muteMic").style.display = "none";
    document.getElementById("unmuteMic").style.display = "inline-block";
  }
}
async function toggleWebCam() {
  if (joinPageVideoStream) {
    joinPageWebcam.style.backgroundColor = "black";
    joinPageWebcam.srcObject = null;
    document.getElementById("camButton").style.backgroundColor = "red";
    document.getElementById("offCamera").style.display = "inline-block";
    document.getElementById("onCamera").style.display = "none";
    webCamEnable = false;
    const tracks = joinPageVideoStream.getTracks();
    tracks.forEach((track) => {
      track.stop();
    });
    joinPageVideoStream = null;
  } else {
    navigator.mediaDevices
      .getUserMedia({
        video: true,
        audio: false,
      })
      .then((stream) => {
        joinPageVideoStream = stream;
        joinPageWebcam.srcObject = stream;
        joinPageWebcam.play();
      });
    document.getElementById("camButton").style.backgroundColor = "#DCDCDC";
    document.getElementById("offCamera").style.display = "none";
    document.getElementById("onCamera").style.display = "inline-block";
    webCamEnable = true;
  }
}

function copyMeetingCode() {
  copy_meeting_id.select();
  document.execCommand("copy");
}

//open participant wrapper
function openParticipantWrapper() {
  document.getElementById("participants").style.width = "350px";
  // document.getElementById("gridPpage").style.marginRight = "350px";
  document.getElementById("ParticipantsCloseBtn").style.visibility = "visible";
  document.getElementById("totalParticipants").style.visibility = "visible";
  document.getElementById(
    "totalParticipants"
  ).innerHTML = `Participants (${totalParticipants})`;
}

function closeParticipantWrapper() {
  document.getElementById("participants").style.width = "0";
  document.getElementById("gridPpage").style.marginRight = "0";
  document.getElementById("ParticipantsCloseBtn").style.visibility = "hidden";
  document.getElementById("totalParticipants").style.visibility = "hidden";
}

function openChatWrapper() {
  document.getElementById("chatModule").style.width = "350px";
  // document.getElementById("gridPpage").style.marginRight = "350px";
  document.getElementById("chatCloseBtn").style.visibility = "visible";
  document.getElementById("chatHeading").style.visibility = "visible";
  document.getElementById("btnSend").style.display = "inline-block";
}


function closeChatWrapper() {
  document.getElementById("chatModule").style.width = "0";
  document.getElementById("gridPpage").style.marginRight = "0";
  document.getElementById("chatCloseBtn").style.visibility = "hidden";
  document.getElementById("btnSend").style.display = "none";
}

function toggleControls() {
  console.log("from toggleControls");
  if (micEnable) {
    console.log("micEnable True");
    micOn.style.display = "inline-block";
    micOff.style.display = "none";
  } else {
    console.log("micEnable False");
    micOn.style.display = "none";
    micOff.style.display = "inline-block";
  }

  if (webCamEnable) {
    console.log("webCamEnable True");
    videoCamOn.style.display = "inline-block";
    videoCamOff.style.display = "none";
  } else {
    console.log("webCamEnable False");
    videoCamOn.style.display = "none";
    videoCamOff.style.display = "inline-block";
  }
}

function SendInvitationLink(){
  let meetingId = $('#meetingid').val();
  $.ajax({
    url:SendInvite,
    data:{_token:$('meta[name=csrf-token]').attr('content'),meeting:meetingId,slot:SlotBooking},
    dataType:'Json',
    method:'Post',
    success:function(data){
      if(data.success){
        $('.sdbtn').attr('disabled',true);
        var cancel = setInterval(incrementSeconds, 1000); 
        var seconds = 30;
        var el = document.getElementById('m-seconds-counter');
        function incrementSeconds() {
            seconds = Number(seconds) - 1;
            el.innerText = 'Resend in '+seconds + "s";
            if(seconds==0){ clearInterval(cancel); $('.sdbtn').removeAttr('disabled'); el.innerText ='';}
        }
      }
    }
  });
}

function CallEndBy() {
  let meetingId = $('#meetingid').val();
  $.ajax({
    url:CallEndByData,
    data:{_token:$('meta[name=csrf-token]').attr('content'),meeting:meetingId},
    dataType:'Json',
    method:'Post',
    success:function(data){
      if(data.success){
        $('#btnStopRecording').click();   
      }
    }
  });
}
function RecordingData(recordingid) {
  let meetingId = $('#meetingid').val();
  $.ajax({
    url:RecordingDataUrl,
    data:{_token:$('meta[name=csrf-token]').attr('content'),meeting:meetingId,recordingid:recordingid},
    dataType:'Json',
    method:'Post',
    success:function(data){
      if(data.success){
        
      }
    }
  });
}