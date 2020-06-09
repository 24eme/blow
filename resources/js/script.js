
document.getElementById('datePicker').valueAsDate = new Date();

const picker = document.getElementById('debut');
picker.addEventListener('input', function(e){
  var day = new Date(this.value).getUTCDay();
  if([6,0].includes(day)){
    e.preventDefault();
    this.value = '';
    alert('Le samedi c\'est pas bon.Le dimanche, c\'est sacré !');
  }
});
 
