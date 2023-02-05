const button = document.querySelector(".form");

console.log(button);

button.addEventListener("submit", function (event) {
  event.preventDefault();
  const selectCategories = document.querySelector("#selectCategories");
  console.log(selectCategories);

  const post = {
    title: document.querySelector("#title").value,
    body: document.querySelector("#summernote").value,
    thumbnail: "first.png",
    categoryId: selectCategories.options[selectCategories.selectedIndex].value,
    userId: 6,
  };
  console.log(post);

  const parsedPost = JSON.stringify(post);

  fetch(`${url}posts/createPosts.php`, {
    method: "POST",
    body: parsedPost,
    headers: {
      "Content-Type": "application/json",
    },
  }).then(function (response) {
    return response.json();
  }).then(window.location.assign("http://localhost:81/webproject/index.php"))
});
