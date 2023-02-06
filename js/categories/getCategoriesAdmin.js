//const url = "http://localhost:81/webproject/api/";
const url = "http://localhost/blog/api/";

window.onload = function () {
  getCategories();
};

function getCategories() {
  fetch(`${url}categories/getCategories.php`, {
    method: "GET",
    headers: {
      "Content-Type": "application/json",
    },
  }).then((response) => response.json())
  .then((data)=>{
    console.log(data)
    const tableBody = document.querySelector("#tableBody")
    data.forEach(element => {
        const tr = document.createElement("tr");
        tableBody.appendChild(tr);
        const tdTitle = document.createElement("td");
        tdTitle.innerHTML = element.title;
        tr.appendChild(tdTitle);


        const tdEdit = document.createElement("td");
        const editLink = document.createElement("a");
        editLink.className = "btn sm"
        const edit = document.createTextNode("Edit")
        editLink.setAttribute("href", "http://localhost:81/webproject/admin/edit-category.php");
        editLink.appendChild(edit)
        tdEdit.appendChild(editLink);
        tr.appendChild(tdEdit)


        const tdDelete = document.createElement("td");
        const deleteLink = document.createElement("a");
        deleteLink.className = "btn sm danger"
        const deleteName = document.createTextNode("Delete")
        deleteLink.setAttribute("href", "http://localhost:81/webproject/admin/admin/delete-category.php");
        deleteLink.appendChild(deleteName)
        tdDelete.appendChild(deleteLink);
        tr.appendChild(tdDelete);

    });
  })
}
