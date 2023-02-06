const url = "http://localhost:81/webproject/api/";

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
    const selectCategories = document.querySelector("#selectCategories");
    data.forEach(element => {
        const option = document.createElement("option");
        option.value = element.id;
        option.innerHTML = element.title;

        selectCategories.appendChild(option);
    });
  })
}