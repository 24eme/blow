function modalAddEvent(info) {
    var inputStartDate = document.getElementById('inputStartDate');
    var inputStartHour = document.getElementById('inputStartHour');

    var inputEndDate = document.getElementById('inputEndDate');
    var inputEndHour = document.getElementById('inputEndHour');

    var inputRoomName = document.getElementById('inputRoomName');
    var inputHiddenRoomID = document.getElementById('inputHiddenRoomID');
    var labelCapacity = document.getElementById('roomCapacity');
    var labelEquipment = document.getElementById('roomEquipment');

    inputRoomName.value = info.resource.title ;
    inputHiddenRoomID.value = info.resource.id;
    labelCapacity.innerHTML = info.resource.extendedProps.capacity;
    labelEquipment.innerHTML = info.resource.extendedProps.equipment;

    const dateDebut = (info.startStr).split("T", 2);
    dateDebut[2] = dateDebut[1].split("Z").join("");
    dateDebut[2] = dateDebut[2].slice(0,-3);

    const dateFin = (info.endStr).split("T", 2);
    dateFin[2]= dateFin[1].split("Z").join("");
    dateFin[2] = dateFin[2].slice(0,-3);

    inputStartDate.value = dateDebut[0] ;
    inputStartHour.value = dateDebut[2] ;
    inputEndDate.value = dateFin[0] ;
    inputEndHour.value = dateFin[2] ;

    $('#modalCEvent').modal('show');

};

function modalCheckEvent(info) {
    var inputStartDate = document.getElementById('StartDate');
    var inputStartHour = document.getElementById('StartHour');

    var inputEndDate = document.getElementById('EndDate');
    var inputEndHour = document.getElementById('EndHour');

    var inputRoomName = document.getElementById('RoomName');
    var inputEventName = document.getElementById('EventName');
    var inputEventID= document.getElementById('HiddenEventID');

    var inputHiddenRoomID = document.getElementById('HiddenRoomID');
    var equipment = document.getElementById('equipment');
    var capacite = document.getElementById('capacity');

    var btnDelete = document.getElementById('btnDEvent');


    var eventObj = info.event;
    var startStr = eventObj.start.toISOString();
    var endStr = eventObj.end.toISOString();

    startStr = startStr.substring(0,startStr.length-1);
    inputRoomName.value = eventObj.getResources()[0]._resource.title;
    inputEventName.value = eventObj.title;
    equipment.innerHTML =  eventObj.getResources()[0]._resource.extendedProps.equipment ;
    capacite.innerHTML =  eventObj.getResources()[0]._resource.extendedProps.capacity ;
    inputHiddenRoomID.value = eventObj.getResources()[0]._resource.id ;
    inputEventID.value = eventObj.id;

    const dateDebutEvent = (startStr).split("T", 2);
    dateDebutEvent[2] = dateDebutEvent[1].split("Z").join("");
  //  dateDebutEvent[2] = dateDebutEvent[2].slice(0,-3);

    const dateFinEvent = (endStr).split("T", 2);
    dateFinEvent[2]= dateFinEvent[1].split("Z").join("");
  //  dateFinEvent[2] = dateFinEvent[2].slice(0,-3);

    inputStartDate.value = dateDebutEvent[0] ;
    inputStartHour.value = dateDebutEvent[2] ;
    inputEndDate.value = dateFinEvent[0] ;
    inputEndHour.value = dateFinEvent[2] ;

    $('#modalUDEvent').modal('show');
};

function deleteEvent(){
    var url = 'deleteEvent/'+document.getElementById('HiddenEventID').value;
    window.location = url;
};

function gotoDate(){
      var datepickerValue = document.getElementById("datepicker").value;
      calendar.gotoDate(datepickerValue);
}

function resourcePopup(info) {

    var elements = document.getElementsByClassName('fc-timeline-lane');
    var capacityNumber = document.createElement('span');
    var capacityIcon = document.createElement('i');
    capacityNumber.innerHTML = info.resource.extendedProps.capacity ;
    capacityIcon.className = "fas fa-male";
    for (var i = 0; i < elements.length; i++) {
      elements[i].appendChild(capacityIcon);
      elements[i].appendChild(capacityNumber);
    } ;

            var popup = document.createElement('div');
            var br = document.createElement('br');
            var br1 = br.cloneNode(true);
            var br2 = br.cloneNode(true);
            var br3 = br.cloneNode(true);
            var surface = document.createElement('label');
            var capacite = document.createElement('label');
            var equipement = document.createElement('label');
            var img = document.createElement('img');


            popup.className = "pop-up";
            popup.innerHTML = info.resource.title;
            img.src = "img/"+info.resource.id+'.jpg';
            img.style.width = "70%";
            img.style.height = "50%"
            equipement.innerHTML = "Chaise,TV";
            capacite.innerHTML = "30 personnes";
            surface.innerHTML = "20m";
            popup.appendChild(br);
            popup.appendChild(equipement);
            popup.appendChild(br1);
            popup.appendChild(capacite);
            popup.appendChild(br2);
            popup.appendChild(surface);
            popup.appendChild(br3);
            popup.appendChild(img);

            info.el.appendChild(popup);
            function popupDisplay(){
              if (popup.style.display === "none") {
                    popup.style.display = "block";
              }
              else{
                popup.style.display = "none  ";
              }
            };
            function popupHide(){
              popup.style.display ="none";
            }
            info.el.addEventListener("mouseover", popupDisplay);
            info.el.addEventListener("mouseout", popupHide);

};
