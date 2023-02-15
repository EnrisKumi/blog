//const url = "http://localhost:81/webproject/api/";
const url = "http://localhost/blog/api/";

window.onload = function () {
  getData();
};

const params = new Proxy(new URLSearchParams(window.location.search), {
  get: (searchParams, prop) => searchParams.get(prop),
});

let value = params.id;
console.log(value);

document
  .querySelector("#searchButton")
  .addEventListener("click", function (event) {
    event.preventDefault();
    document.querySelector("#deni").remove();

    fetchUrl = `?Search=${document.querySelector("#searchBar").value}`;

    getData(fetchUrl);
  });

function getData(fetchUrl) {
  fetch(`${url}posts/getPosts.php/${fetchUrl}`, {
    method: "GET",
    headers: {
      "Content-Type": "application/json",
    },
  })
    .then((response) => response.json())
    .then((data) => {
      console.log(data);
      // const postsContainer = document.querySelector("#posts_container");
      const postContainerDiv = document.createElement("div");
      postContainerDiv.id = 'deni'
      postContainerDiv.className = "container posts_container";
      document.querySelector(".posts").append(postContainerDiv)
      data.forEach((element) => {
        const article = document.createElement("article");
        article.className = "post";

        const postThumbnail = document.createElement("div");
        postThumbnail.className = "post_thumbnail";

        const imagePost = document.createElement("img");
        imagePost.src = `images/${element.thumbnail}`
        imagePost.alt = "Image not found";

        postThumbnail.appendChild(imagePost);

        article.appendChild(postThumbnail);

        const postInfo = document.createElement("div");
        postInfo.className = "post_info";

        const categoryLink = document.createElement("a");
        const category = fetch(
          `${url}categories/getCategoriesById.php?id=${element.categoryId}`
        )
          .then((response) => response.json())
          .then((data) => {
            console.log(data);
            const y = document.createTextNode(`${data.title}`);
            categoryLink.appendChild(y);
            categoryLink.className = "category_button";
          });

        postInfo.appendChild(categoryLink);

        const postTitle = document.createElement("h3");
        postTitle.className = "post_title";

        const titleLink = document.createElement("a");
        const x = document.createTextNode(`${element.title}`);
        titleLink.setAttribute(
          "href",
          `http://localhost/blog/post.php?id=${element.id}`
        ); //TODO change link
        titleLink.appendChild(x);
        postTitle.appendChild(titleLink);

        postInfo.appendChild(postTitle);

        const body = document.createElement("p");
        body.className = "post_body";

        postInfo.appendChild(body);

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
        const user = fetch(`${url}users/getUserById.php?id=${element.userId}`)
          .then((response) => response.json())
          .then((data) => {
            authorName.innerHTML = `By: ${data.username}`;
          });

        authorInfo.appendChild(authorName);

        const datePost = document.createElement("small");
        datePost.innerHTML = element.dateTime;
        authorInfo.appendChild(datePost);

        authorDiv.appendChild(authorInfo);

        postInfo.appendChild(authorDiv);

        article.appendChild(postInfo);

        postContainerDiv.appendChild(article);
      });
    });
}
