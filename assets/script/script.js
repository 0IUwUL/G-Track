
const date = new Date();

const renderCalendar = () => {
  date.setDate(1);

  const monthDays = document.querySelector(".days");
  const currYear = date.getFullYear();
  var addDays = 1;
  const lastDay = new Date(
    date.getFullYear(),
    date.getMonth() + 1,
    0
  ).getDate();

  const prevLastDay = new Date(
    date.getFullYear(),
    date.getMonth(),
    0
  ).getDate();

  const firstDayIndex = date.getDay();

  const lastDayIndex = new Date(
    date.getFullYear(),
    date.getMonth() + 1,
    0
  ).getDay();

  var nextDays = 0;

  const months = [
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
    "July",
    "August",
    "September",
    "October",
    "November",
    "December",
  ];

  document.querySelector(".date h1").innerHTML = months[date.getMonth()];

  document.querySelector(".date p").innerHTML = currYear;

  let days = "";

  for (let x = firstDayIndex; x > 0; x--) {
    days += `<div class="prev-date " role="button" data-bs-toggle="modal" data-bs-target="#Inpuexpense">${prevLastDay - x + 1}</div>`;
  }

  for (let i = 1; i <= lastDay; i++) {
    if (
      i === new Date().getDate() &&
      date.getMonth() === new Date().getMonth()
    ) {
      days += `<div class="today btn text-white" role="button" data-bs-toggle="modal" data-bs-target="#Inpuexpense">${i}</div>`;
    } else {
      days += `<div class = "btn text-white" role="button" data-bs-toggle="modal" data-bs-target="#Inpuexpense">${i}</div>`;
    }
    addDays += 1;
  }

  if (addDays >= 21){
    nextDays = (7 - lastDayIndex - 1) + 7;
  }else{
    nextDays = 7 - lastDayIndex - 1;
  }
  console.log(nextDays);
  for (let j = 1; j <= nextDays; j++) {
    days += `<div class="next-date" role="button" data-bs-toggle="modal" data-bs-target="#Inpuexpense">${j}</div>`;
    monthDays.innerHTML = days;
  }
  

};

function UID(id){
  return id;
}

// For CRUD
// document.querySelector(".Cedit").addEventListener("click", () => {
//   var id = document.getElementById("Cedit").getAttribute("data-id");
//   var title = document.getElementById("Cedit").getAttribute("data-title");
//   var budget = document.getElementById("Cedit").getAttribute("data-budget");
//   document.querySelector("#InputModalTitleLabel").innerHTML = "Edit Category (" + title + ")";

//   document.querySelector("#CategoryName").value = title;
//   document.querySelector("#Budget").value = budget;
//   document.querySelector("#CId").value = id;
//   document.querySelector("#CForm").action = "Category/edit";
// });

function edit(id){
  var id = document.querySelector("#C"+id).getAttribute("data-id");
  var title = document.querySelector("#C"+id).getAttribute("data-title");
  var budget = document.querySelector("#C"+id).getAttribute("data-budget");
  document.querySelector("#InputModalTitleLabel").innerHTML = "Edit Category (" + title + ")";

  document.querySelector("#CategoryName").value = title;
  document.querySelector("#Budget").value = budget;
  document.querySelector("#CId").value = id;
  document.querySelector("#CForm").action = "Category/edit";
}

document.querySelector(".Cadd").addEventListener("click", () => {
  document.querySelector("#InputModalTitleLabel").innerHTML = "Create Category";

  document.querySelector("#CategoryName").value = "";
  document.querySelector("#Budget").value = "";
  document.querySelector("#CId").value = "";
});

// For Calendar
document.querySelector(".prev").addEventListener("click", () => {
  date.setMonth(date.getMonth() - 1);
  renderCalendar();
});

document.querySelector(".next").addEventListener("click", () => {
  date.setMonth(date.getMonth() + 1);
  renderCalendar();
});


renderCalendar();
