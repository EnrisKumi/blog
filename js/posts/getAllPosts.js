const url = "http://localhost:81/webproject/api/"

window.onload = function () {
 getData();
};

function getData() {
   fetch(`${url}posts/getPosts.php`, {
    method: "GET",
    headers: {
      "Content-Type": "application/json",
    },
  })
    .then((response) => response.json())
    .then((data) => {
      console.log(data);
      const postsContainer = document.querySelector("#posts_container");
      data.forEach((element) => {
        const article = document.createElement("article");
        article.className = "post";

        const postThumbnail = document.createElement("div");
        postThumbnail.className = "post_thumbnail";

        const imagePost = document.createElement("img");
        imagePost.src = "./images/blog2.jpg"
        imagePost.alt = "Image not found"

        postThumbnail.appendChild(imagePost);

        article.appendChild(postThumbnail);

        const postInfo = document.createElement("div");
        postInfo.className = "post_info";

        const categoryLink = document.createElement("a");
        const y = document.createTextNode(`${element.categoryId}`)
        categoryLink.appendChild(y);
        categoryLink.className = "category_button";

        postInfo.appendChild(categoryLink);

        const postTitle = document.createElement("h3");
        postTitle.className = "post_title";

        const titleLink = document.createElement("a");
        const x = document.createTextNode(`${element.title}`)
        titleLink.setAttribute("href", "http://localhost:81/webproject/post.php")
        titleLink.appendChild(x);
        postTitle.appendChild(titleLink);

        postInfo.appendChild(postTitle);

        const body = document.createElement("p");
        body.innerHTML = element.body
        body.className = "post_body";

        postInfo.appendChild(body);

        const authorDiv = document.createElement("div");
        authorDiv.className = "post_author";

        const authorAvatar = document.createElement("div");
        authorAvatar.className = "post_author-avatar";

        const authorAvatarImage = document.createElement("img");
        authorAvatarImage.src = "./images/blog2.jpg"
        authorAvatarImage.alt = "Image not found"
        authorAvatar.appendChild(authorAvatarImage);

        authorDiv.appendChild(authorAvatar);

        const authorInfo = document.createElement("div");
        authorInfo.className = "post_author-info";

        const authorName = document.createElement("h5");
        const user = fetch(`${url}users/getUserById.php?id=${element.userId}`)
        .then((response) => response.json())
        .then((data)=>{
          authorName.innerHTML = `By: ${data.username}`;
        })

        authorInfo.appendChild(authorName);

        const datePost = document.createElement("small");
        datePost.innerHTML = element.dateTime
        authorInfo.appendChild(datePost);

        authorDiv.appendChild(authorInfo);

        postInfo.appendChild(authorDiv);

        article.appendChild(postInfo);

        postsContainer.appendChild(article)

      });
    });
}


