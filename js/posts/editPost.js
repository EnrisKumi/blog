//const url = "http://localhost:81/webproject/api/";
//const rederectUrl = "http://localhost:81/webproject/admin/manage-categories.php";
const url = "http://localhost/blog/api/"
const rederectUrl = "http://localhost/blog/";

window.onload = function () {
    getPosts();
};

const description = document.querySelector("#descriptionEditPost");
const titleResponse = document.querySelector("#titleEditPost");

const params = new Proxy(new URLSearchParams(window.location.search), {
    get: (searchParams, prop) => searchParams.get(prop),
});

let value = params.id;
console.log(value);

const button = document.querySelector("#form");

const fileInput = document.querySelector("#imageSelect");
const fileLabel = document.querySelector("#imageLabel");
let filename;

fileInput.onchange = () => {
  const reader = new FileReader();
  reader.readAsDataURL(fileInput.files[0]);
  filename = fileInput.files[0].name;
  fileInput.innerHTML = `${filename} is uploaded`;
};

let FILENAME;

function getPosts() {

  fetch(`${url}posts/getPostById.php?id=${value}`, {
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
      description.value = data.body;
      document.querySelector('#imageSelect').innerHTML = 'Current image: ' + data.thumbnail
      FILENAME= data.thumbnail
      console.log(FILENAME);
    });
}


button.addEventListener("submit", function(event){
  event.preventDefault();

  function saveImageInUploads() {
    let formData = new FormData();
    formData.append("file", fileInput.files[0]);
    fetch(`${url}posts/saveImage.php`, {
      method: "POST",
      body: formData,
    })
      .then(function (response) {
        return response.text();
      })
      .then(function (text) {
        console.log(text);
      })
      .then(window.location.assign(rederectUrl))
      .catch(function (error) {
        console.log(error);
      });
  }

  if(!filename){
    filename=FILENAME
  }

  const updatePost = {
    title: document.querySelector("#titleEditPost").value,
    body: document.querySelector("#descriptionEditPost").value,
    thumbnail: filename,
    id: value
  };
  console.log(updatePost);

  const parsedUpdatePost = JSON.stringify(updatePost);

  fetch(`${url}posts/updatePost.php`, {
    method: "PATCH",
    body: parsedUpdatePost,
    headers: {
      "Content-Type": "application/json",
    },
  })
    .then(function (response) {
      return response.json();
    })
    .then(saveImageInUploads());


})

