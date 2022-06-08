 
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
  document.querySelector("#label_Cat").innerHTML = "Name of category";
  document.getElementById("label_Budget").hidden = false;
  document.getElementById("Budget").hidden = false;
  document.getElementById("Budget").required = true;

  document.getElementById("label_Radio").hidden = true;
  document.getElementById("inlineRadio1").hidden = true;
  document.getElementById("inlineRadio2").hidden = true;
  document.getElementById("label_yes").hidden = true;
  document.getElementById("label_no").hidden = true;
  document.querySelector("#btn").innerHTML = "Save Category";
  document.querySelector("#CForm").action = "Category/input";
});

function add_trans(){
  document.querySelector("#InputModalTitleLabel").innerHTML = "Create new transaction";
  document.querySelector("#label_Cat").innerHTML = "Name of new transaction";
  document.querySelector("#btn").innerHTML = "Save Transaction";
  document.getElementById("label_Budget").hidden = true;
  document.getElementById("Budget").hidden = true;
  document.getElementById("Budget").required = false;

  document.getElementById("label_Radio").hidden = false;
  document.getElementById("inlineRadio1").hidden = false;
  document.getElementById("inlineRadio2").hidden = false;
  document.getElementById("label_yes").hidden = false;
  document.getElementById("label_no").hidden = false;

  document.querySelector("#CForm").action = "Transaction/input";
}

function red(id){
  
}

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

// For account settings
function enable(){
  document.getElementById("close").disabled = false;
  document.getElementById("cancel").disabled = false;
  document.getElementById("save").disabled = false;
  document.getElementById("image").disabled = false;
  document.getElementById("confirm").disabled = false;
  document.getElementById("userName").readOnly = false;
  document.getElementById("email").readOnly = false;
  document.getElementById("income").readOnly = false;
}

function disable(){
  document.getElementById("close").disabled = true;
  document.getElementById("cancel").disabled = true;
  document.getElementById("save").disabled = true;
  document.getElementById("image").disabled = true;
  document.getElementById("confirm").disabled = true;
  document.getElementById("userName").readOnly = true;
  document.getElementById("email").readOnly = true;
  document.getElementById("income").readOnly = true;
}