//const url = "http://localhost:81/webproject/";
const url = "http://localhost/blog/";

window.onload = function () {
  getUsers();
};

function getUsers() {
  fetch(`${url}users/getUsers.php`, {
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
      tableBody.appendChild(tr)

      const firstnameTd = document.createElement("td")
      firstnameTd.innerHTML = element.firstname
      tr.appendChild(firstnameTd);

      const usernameTd = document.createElement("td")
      usernameTd.innerHTML = element.username
      tr.appendChild(usernameTd);

      const tdEdit = document.createElement("td");

      
      const editLink = document.createElement("a");
      editLink.className = "btn sm"
      const edit = document.createTextNode("Edit")
      editLink.setAttribute("href", `${url}`+"admin/edit-user.php");
      editLink.appendChild(edit)
      tdEdit.appendChild(editLink);
      tr.appendChild(tdEdit)


      const tdDelete = document.createElement("td");
      const deleteLink = document.createElement("a");
      deleteLink.className = "btn sm danger"
      const deleteName = document.createTextNode("Delete")
      deleteLink.setAttribute("href", `${url}`+"admin/admin/delete-user.php");
      deleteLink.appendChild(deleteName)
      tdDelete.appendChild(deleteLink);
      tr.appendChild(tdDelete);

      const isAdminTd = document.createElement("td")
      if(element.isAdmin === 0){
        isAdminTd.innerHTML = 'No'
      } else {
        isAdminTd.innerHTML = "Yes"
      }
      tr.appendChild(isAdminTd)

    });
  })
}
