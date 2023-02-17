const rederectUrl = "http://localhost/blog/index.php";
//const rederectUrl = "http://localhost:81/webproject/index.php";
//const url = "http://localhost:81/webproject/index.php";
const button = document.querySelector(".form");

const fileInput = document.querySelector("#imageSelect");
const fileLabel = document.querySelector("#imageLabel");
let filename = "";

fileInput.onchange = () => {
  const reader = new FileReader();
  reader.readAsDataURL(fileInput.files[0]);
  filename = fileInput.files[0].name;
  fileInput.innerHTML = `${filename} is uploaded`;
};

button.addEventListener("submit", function (event) {
  event.preventDefault();
  const selectCategories = document.querySelector("#selectCategories");
  console.log(selectCategories);

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

  const post = {
    title: document.querySelector("#title").value,
    body: document.querySelector("#summernote").value,
    thumbnail: filename,
    categoryId: selectCategories.options[selectCategories.selectedIndex].value,
    userId: userId,
  };
  console.log(post);

  const parsedPost = JSON.stringify(post);

  const divError = document.querySelector("#a")
  const errorP = document.querySelector("#errorDiv")

  if (!document.querySelector("#title").value || !document.querySelector("#summernote").value) {
    divError.className = 'alert_message error'
    errorP.innerHTML = 'One of the fields is missing!'
  }
  else {
    fetch(`${url}posts/createPosts.php`, {
      method: "POST",
      body: parsedPost,
      headers: {
        "Content-Type": "application/json",
      },
    })
      .then(function (response) {
        return response.json();
      })
      .then(saveImageInUploads());
  }


});
