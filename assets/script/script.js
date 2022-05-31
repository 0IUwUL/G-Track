
// For CRUD
function Cedit(id){
  console.log(id);
  var title = document.querySelector("#C"+id).getAttribute("data-title");
  var budget = document.querySelector("#C"+id).getAttribute("data-budget");
  document.querySelector("#EditModalTitleLabel").innerHTML = "Edit Category (" + title + ")";

  document.querySelector("#CategoryName").value = title;
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
