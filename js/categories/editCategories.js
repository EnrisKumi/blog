const url = "http://localhost:81/webproject/api/";
const rederectUrl = "http://localhost:81/webproject/admin/manage-categories.php";
//const url = "http://localhost/blog/"

window.onload = function () {
  getCategories();
};
const description = document.querySelector("#description");
const titleResponse = document.querySelector("#title");
const params = new Proxy(new URLSearchParams(window.location.search), {
    get: (searchParams, prop) => searchParams.get(prop),
});

let value = params.id;
console.log(value);

const button = document.querySelector(".form");
console.log(button);

button.addEventListener("submit", function (event) {
  event.preventDefault();

  const update = {
    title: titleResponse.value,
    description: description.innerHTML,
    id: value
  }

  console.log(update)

  const parsedUpdate = JSON.stringify(update)

  fetch(`${url}categories/updateCategories.php`, {
    method: "PUT",
    body: parsedUpdate,
    headers: {
      "Content-Type": "application/json",
    },
  })
    .then(function (response) {
      return response.json();
    })
    .then(window.location.assign(rederectUrl))

});

function getCategories() {

  fetch(`${url}categories/getCategoriesById.php?id=${value}`, {
    method: "GET",
    headers: {
      "Content-Type": "application/json",
    },
  })
    .then(function (response) {
      return response.json();
    })
    .then((data) => {
      console.log(data);
      titleResponse.value = data.title;
      description.innerHTML = data.description;
    });
}
