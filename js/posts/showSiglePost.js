//const url = "http://localhost:81/webproject/api/";
const url = "http://localhost/blog/api/";

window.onload = function () {
  getPost();
};

const params = new Proxy(new URLSearchParams(window.location.search), {
  get: (searchParams, prop) => searchParams.get(prop),
});

let value = params.id;
console.log(value);

const postContainer = document.querySelector("#post_container");
console.log(postContainer);

function getPost() {
  fetch(`${url}posts/getPostById.php?id=${value}`, {
    method: "GET",
    headers: {
      "Content-Type": "application/json",
    },
  })
    .then((response) => response.json())
    .then((data) => {
      console.log(data);

      const titleh2 = document.createElement("h2");
      titleh2.innerHTML = data.title;
      console.log(data.title);

      postContainer.appendChild(titleh2);

      const authorDiv = document.createElement("div");
      authorDiv.className = "post_author";

      const authorAvatar = document.createElement("div");
      authorAvatar.className = "post_author-avatar";

      const authorAvatarImage = document.createElement("img");
      authorAvatarImage.src = "images/userAvatar.png";
      authorAvatarImage.alt = "Image not found";
      authorAvatar.appendChild(authorAvatarImage);

      authorDiv.appendChild(authorAvatar);

      const authorInfo = document.createElement("div");
      authorInfo.className = "post_author-info";

      const authorName = document.createElement("h5");
      const user = fetch(`${url}users/getUserById.php?id=${data.userId}`)
        .then((response) => response.json())
        .then((data) => {
          authorName.innerHTML = `By: ${data.username}`;
        });

      authorInfo.appendChild(authorName);


      const datePost = document.createElement("small");
      datePost.innerHTML = data.dateTime;
      authorInfo.appendChild(datePost);

      authorDiv.appendChild(authorInfo)

      postContainer.appendChild(authorDiv);

      const singlePostThumbnail = document.createElement("div");
      singlePostThumbnail.className = 'singlepost_thumbnail';
      const photo = document.createElement("img");
      photo.src = `images/${data.thumbnail}`;
      photo.alt = "Image not found";

      singlePostThumbnail.appendChild(photo)

      postContainer.appendChild(singlePostThumbnail)

      const body = document.createElement('p')
      body.innerHTML = data.body
      postContainer.appendChild(body)



    });
}
