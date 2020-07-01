
var inputStartDate = document.getElementById('inputStartDate');
var inputStartHour = document.getElementById('inputStartHour');

var inputEndDate = document.getElementById('inputEndDate');
var inputEndHour = document.getElementById('inputEndHour');

var inputRoomName = document.getElementById('inputRoomName');
var inputHiddenRoomID = document.getElementById('inputHiddenRoomID');
var labelCapacity = document.getElementById('capacity');

  function modalCheckEvent(info) {
    //Essayer en utilisant MODEL LARAVEL find
    var eventObj = info.event;
    var startStr = eventObj.start.toISOString();
    var endStr = eventObj.end.toISOString();

    startStr = startStr.substring(0,startStr.length-1);

    var inputEventName = document.getElementById('inputEventName');
    inputEventName.value = eventObj.title;

    const dateDebutEvent = (startStr).split("T", 2);
    dateDebutEvent[2] = dateDebutEvent[1].split("Z").join("");
    dateDebutEvent[2] = dateDebutEvent[2].slice(0,-7);

    const dateFinEvent = (endStr).split("T", 2);
    dateFinEvent[2]= dateFinEvent[1].split("Z").join("");
    dateFinEvent[2] = dateFinEvent[2].slice(0,-7);

    inputStartDate.value = dateDebutEvent[0] ;
    inputStartHour.value = dateDebutEvent[2] ;
    inputEndDate.value = dateFinEvent[0] ;
    inputEndHour.value = dateFinEvent[2] ;

    $('#modalUDE').modal('show');
  };

  // function modalAddEvent(event) {
  //
  //   inputRoomName.innerHTML = event.resource.title ;
  //   inputHiddenRoomID.value = event.resource.id;
  //
  //   const StartDateTAB = (event.startStr).split("T", 2);
  //   dateDebut[2] = dateDebut[1].split("Z").join("");
  //
  //   const EndDateTAB = (event.endStr).split("T", 2);
  //   dateFin[2]= dateFin[1].split("Z").join("");
  //
  //   inputStartDate.value = StartDateTAB[0] ;
  //   inputStartHour.value = StartDateTAB[2] ;
  //   inputEndDate.value = EndDateTAB[0] ;
  //   inputEndHour.value = EndDateTAB[2] ;
  //
  // };


//   function ResourceModal(resource) {
//
//             var popup = document.createElement('div');
//             var br = document.createElement('br');
//             var br1 = br.cloneNode(true);
//             var br2 = br.cloneNode(true);
//             var br3 = br.cloneNode(true);
//             var surface = document.createElement('label');
//             var capacite = document.createElement('label');
//             var equipement = document.createElement('label');
//             var img = document.createElement('img');
//
//
//             popup.className = "pop-up";
//             popup.innerHTML = info.resource.title;
//             img.src = "img/"+info.resource.id+'.jpg';
//             img.style.width = "70%";
//             img.style.height = "50%"
//             equipement.innerHTML = "Chaise,TV";
//             capacite.innerHTML = "30 personnes";
//             surface.innerHTML = "20m";
//             popup.appendChild(br);
//             popup.appendChild(equipement);
//             popup.appendChild(br1);
//             popup.appendChild(capacite);
//             popup.appendChild(br2);
//             popup.appendChild(surface);
//             popup.appendChild(br3);
//             popup.appendChild(img);
//
//             info.el.appendChild(popup);
//             function popupDisplay(){
//               if (popup.style.display === "none") {
//                     popup.style.display = "block";
//               }
//               else{
//                 popup.style.display = "none  ";
//               }
//             };
//             function popupHide(){
//               popup.style.display ="none";
//             }
//             info.el.addEventListener("mouseover", popupDisplay);
//             info.el.addEventListener("mouseout", popupHide);
//
//   };
//
//   function navigate(inputid){
//           var url = window.location.href + "/" + document.getElementById(inputid).value;
//           alert(url);
//   };
