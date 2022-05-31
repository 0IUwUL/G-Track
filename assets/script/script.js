 
// For CRUD Category
function edit(id){
  var title = document.querySelector("#CatEdit").getAttribute("data-title");
  var budget = document.querySelector("#CatEdit").getAttribute("data-budget");
  document.querySelector("#CandEModalTitleLabel").innerHTML = "Edit Category (" + title + ")";
  document.querySelector("#CategoryName").value = title;
  document.getElementById("Date").required = false;
  document.getElementById("Date").hidden = true;
  document.getElementById("LabelDate").hidden = true;
  document.querySelector("#Budget").value = budget;
  document.querySelector("#CId").value = id;
  document.querySelector("#CForm").action = "Cedit";
}

document.querySelector(".Cadd").addEventListener("click", () => {
  document.querySelector("#InputModalTitleLabel").innerHTML = "Create Category";

  document.querySelector("#CategoryName").value = "";
  document.querySelector("#Budget").value = "";
  document.querySelector("#CId").value = "";
});

function exp(id){
  var id = document.querySelector("#E"+id).getAttribute("data-id");
  document.querySelector("#EId").value = id;
  document.querySelector("#EForm").action = "Expense/view/"+id;
}

// Expense add
function add(id){
  document.querySelector("#LabelTitleName").innerHTML = "Expense Name";
  document.querySelector("#CategoryName").value = "";
  document.querySelector("#Budget").value = "";
  document.querySelector("#LabelCost").innerHTML = "Cost";
  document.querySelector("#CandEModalTitleLabel").innerHTML = "Input Expense Detail";
  document.getElementById("Date").required = true;
  document.getElementById("Date").hidden = false;
  document.getElementById("LabelDate").hidden = false;
  document.querySelector("#CId").value = id;
  document.getElementById("btn").innerHTML = "Save Expense";
  document.querySelector("#CForm").action = "Expense/input/"+id;
}

function Eedit(id){
  var name = document.querySelector("#E"+id).getAttribute("data-name");
  var cost = document.querySelector("#E"+id).getAttribute("data-cost");
  var date = document.querySelector("#E"+id).getAttribute("data-date");
  var Cid = document.querySelector("#E"+id).getAttribute("data-cate");
  document.querySelector("#CandEModalTitleLabel").innerHTML = "Edit Expense (" + name + ")";
  document.querySelector("#CategoryName").value = name;
  document.querySelector("#Date").value = date;
  document.getElementById("Date").required = true;
  document.getElementById("Date").hidden = false;
  document.getElementById("LabelDate").hidden = false;
  document.querySelector("#Budget").value = cost;
  document.querySelector("#CId").value = Cid;
  document.getElementById("btn").innerHTML = "Save Changes";
  document.querySelector("#CForm").action = "Eedit/"+id;
}

function EDel(id){
  var name = document.querySelector("#E"+id).getAttribute("data-name");
  var Cid = document.querySelector("#E"+id).getAttribute("data-cate");
  document.querySelector("#EId").value = Cid;
  document.querySelector("#DelModalTitleLabel").innerHTML = "Would you like to delete " + name + " from the list?";
  document.querySelector("#EForm").action = "Ddelete/"+id;
}