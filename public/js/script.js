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
    alert(info.event.extendedProps.confirmed);
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
    dateDebutEvent[2] = dateDebutEvent[2].slice(0,-7);

    const dateFinEvent = (endStr).split("T", 2);
    dateFinEvent[2]= dateFinEvent[1].split("Z").join("");
    dateFinEvent[2] = dateFinEvent[2].slice(0,-7);

    inputStartDate.value = dateDebutEvent[0] ;
    inputStartHour.value = dateDebutEvent[2] ;
    inputEndDate.value = dateFinEvent[0] ;
    inputEndHour.value = dateFinEvent[2] ;

    $('#modalUDEvent').modal('show');

};
function modalCheckRoom(room) {
    var inputRoomID = document.getElementById('HiddenroomID');
    var inputRoomName = document.getElementById('roomName');
    var capacity = document.getElementById('Capacity');
    var equipment = document.getElementById('Equipment');
    var img = document.getElementById('imgRoom');
    var inputEventID= document.getElementById('eventColor');

    inputRoomID.value = room.id;
    inputRoomName.value = room.title;
    capacity.value = room.capacity;
    equipment.value = room.equipment;
    img.src = "img/"+room.image;

    $('#modalUDRoom').modal('show');

};

function deleteEvent(){
    var url = 'deleteEvent/'+document.getElementById('HiddenEventID').value;
    window.location = url;
};
function deleteRoom(RoomID){
    var url = 'deleteRoom/'+ RoomID;
    window.location = url;
};

function deleteUser(UserID){
    var url = 'deleteUser/'+ UserID;
    alert(url);
    window.location = url;
};

function gotoDate(){
      var datepickerValue = document.getElementById("datepicker").value;
      var url = new URL(window.location);
      url.searchParams.set('date', datepickerValue);
      window.location = url.toString();
};

function resourcePopup(info) {
        var elements = document.getElementsByClassName('fc-datagrid-cell-cushion');
        var capacityNumber = document.createElement('span');
        var capacityIcon = document.createElement('i');
        capacityNumber.innerHTML = info.resource.extendedProps.capacity ;
        capacityIcon.className = "fas fa-male room-icon";
        for (var i = 0; i < elements.length; i++) {
          elements[i].appendChild(capacityIcon);
          elements[i].appendChild(capacityNumber);
        } ;
        var popup = document.createElement('div');
        var br = document.createElement('br');
        var br1 = br.cloneNode(true);
        var br2 = br.cloneNode(true);
        var capacite = document.createElement('label');
        var equipement = document.createElement('label');
        var img = document.createElement('img');
        popup.className = "pop-up";
        popup.innerHTML = info.resource.title;
        img.src = "img/"+info.resource.id+'.jpg';
        img.style.width = "70%";
        img.style.height = "50%"
        equipement.innerHTML = info.resource.extendedProps.equipment;
        capacite.innerHTML = info.resource.extendedProps.capacity ;
        capacite.innerHTML +=  ' personnes';
        popup.appendChild(br);
        popup.appendChild(img);
        popup.appendChild(br1);
        popup.appendChild(equipement);
        popup.appendChild(br2);
        popup.appendChild(capacite);
        info.el.appendChild(popup);
        function popupDisplay(){
          if (popup.style.display === "none")popup.style.display = "block";
          else popup.style.display = "none  ";
        };
        function popupHide(){ popup.style.display ="none";};
        info.el.addEventListener("mouseover", popupDisplay);
        info.el.addEventListener("mouseout", popupHide);

    var resourceEquipment = info.resource.extendedProps.equipment;
    const equipments = resourceEquipment.split(',');
    for (var i = 0; i < equipments.length; i++) {
      var equipmentIcon = document.createElement('i');
      equipmentIcon.style.marginLeft = "200px";
      equipmentIcon.style.marginTop= "-28px";
      switch (equipments[i]) {

        case 'Video-projecteur':
            equipmentIcon.className = "fas fa-projector";
        break;
        case 'Micro':
            equipmentIcon.className = "fas fa-tv"
          break;
        case 'Chaise':
            equipmentIcon.className = "fas fa-chair";
            equipmentIcon.innerHTML = "14";
        break;
        case 'TV':
            equipmentIcon.className = "fas fa-tv";
        break;
        case 'Microphone':
            equipmentIcon.className = "fas fa-chair";
        break;
        case 'Enceinte':
            equipmentIcon.className = "";
        break;
        case 'Tableau':
            equipmentIcon.className = "fas fa-dashboard";
        break;
        case 'Adapté':
            equipmentIcon.className = "fas fa-wheelchair";
        break;
        default: ;

      }
  //    info.el.appendChild(equipmentIcon);

    };

  };
  // function scrollTime(){
  //
  //   var scrollTime = document.getElementById('inputStartHour');
  //   calendar.scrollToTime(scrollTime.value);
  // };
  // function edit(){
  //
  //     var bool = true;
  //   	var modal = document.getElementById('formUDEvent');
  //     var inputs = modal.getElementsByClassName('editable');
  //
  //     if (modal.classList.contains('is-readonly')){
  //         modal.className = 'is-editing';
  //         bool = false;
  //     }
  //     else {
  //         modal.className = 'is-readonly';
  //         bool=true;
  //
  //     }
  //     for (var i = 0; i < inputs.length; i++) {
  //       inputs[i].disabled = bool;
  //     } ;
  // };
  function openTab(evt, tab) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tab).style.display = "block";
    evt.currentTarget.className += " active";
  };

  function validateEvent(eventID) {
    var url = 'validateEvent/'+ eventID;
    window.location = url;
  };
