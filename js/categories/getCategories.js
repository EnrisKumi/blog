//const url = "http://localhost:81/webproject/api/";
const url = "http://localhost/blog/api/";

window.onload = function () {
  getCategories();
};

function getCategories() {
  fetch(`${url}categories/getCategories.php`, {   //TODO CHECK 
    method: "GET",
    headers: {
      "Content-Type": "application/json",
    },
  }).then((response) => response.json())
  .then((data)=>{
    const selectCategories = document.querySelector("#selectCategories");
    data.forEach(element => {
        const option = document.createElement("option");
        option.value = element.id;
        option.innerHTML = element.title;

        selectCategories.appendChild(option);
    });
  })
}
