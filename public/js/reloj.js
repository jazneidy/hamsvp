document.addEventListener('DOMContentLoaded', load);

function updateCurrentTime() {
  var now = new Date();
  var hh = now.getHours();
  var mm = now.getMinutes();
  var ss = now.getSeconds();
  var str = '';
  if (hh % 12 == 0) {
    str += '12';
  } else {
    str += (hh % 12);
  }
  str += ':';
  if (mm >= 10) {
    str += mm;
  } else {
    str += '0' + mm;
  }
  str += ':';
  if (ss >= 10) {
    str += ss;
  } else {
    str += '0' + ss;
  }
  if (hh >= 12) {
    str += " PM";
  } else {
    str += " AM";
  }

  document.getElementById("current_time").innerHTML =str;
}
function load() {
  updateCurrentTime();
  setInterval(updateCurrentTime, 250);
}
