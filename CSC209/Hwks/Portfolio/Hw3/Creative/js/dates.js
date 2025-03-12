const TODAY = new Date();
const LASTDAY = new Date("05/02/2025");
console.log(TODAY);

let difference = LASTDAY.getTime() - TODAY.getTime();
// Reference: https://www.geeksforgeeks.org/how-to-calculate-the-number-of-days-between-two-dates-in-javascript/#1-using-two-different-dates
difference = Math.round(difference / (1000 * 3600 * 24));
document.getElementById("countdown").innerHTML = "" + difference;

let day;
switch (TODAY.getDay()) {
  case 0:
    day = "Sunday";
    break;
  case 1:
    day = "Monday";
    break;
  case 2:
    day = "Tuesday";
    break;
  case 3:
    day = "Wednesday";
    break;
  case 4:
    day = "Thursday";
    break;
  case 5:
    day = "Friday";
    break;
  case  6:
    day = "Saturday";
}
console.log(day)
document.getElementById("day").innerHTML = "" + day;

let month;
switch (new Date().getMonth()) {
  case 0:
    month = "January";
    break;
  case 1:
    month = "February";
    break;
  case 2:
    month = "March";
    break;
  case 3:
    month = "April";
    break;
  case 4:
    month = "May";
    break;
  case 5:
    month = "June";
    break;
  case  6:
    month = "July";
  case  7:
    month = "August";
  case  8:
    month = "September";
  case  9:
    month = "October";
  case  10:
    month = "November";
  case  11:
    month = "December";
}

document.getElementById("month").innerHTML = "" + month;
let date = TODAY.getDate();
document.getElementById("date").innerHTML = "" + date;

let year = TODAY.getFullYear();
document.getElementById("year").innerHTML = "" + year;

function squish(x) {
  x.style.height = "100px";
  x.style.width = "600px";
}

function normal(x) {
  x.style.height = "330px";
  x.style.width = "500";
}