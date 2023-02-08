const url = "http://localhost:81/webproject/api/";
//const url = "http://localhost/blog/api/";

window.onload = function () {
  getCategoriesUser();
};
const selectCategoriesss = document.querySelector("#selectCategoriesUser");
console.log(selectCategoriesss)

function getCategoriesUser() {
  fetch(`${url}categories/getCategories.php`, {
    method: "GET",
    headers: {
      "Content-Type": "application/json",
    },
  }).then((response) => response.json())
  .then((data)=>{

    data.forEach(element => {
        const options = document.createElement("option");
        options.value = element.id;
        options.innerHTML = element.title;

        selectCategoriesss.appendChild(options);
    });
  })
}
