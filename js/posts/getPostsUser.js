//const url = "http://localhost:81/webproject/api/";
//const url2 = "http://localhost:81/webproject/";
const url = "http://localhost/blog/api/";
const url2 = "http://localhost/blog/";

window.onload = function () {
    getPosts();
};

function getPosts() {
    fetch(`${url}posts/getAllPostsById.php`, {
        method: "GET",
        headers: {
            "Content-Type": "application/json",
        },
    }).then((response) => response.json())
        .then((data) => {
            console.log(data)
            const tableBody = document.querySelector("#tableBody")
            data.forEach(element => {
                const tr = document.createElement("tr");
                tableBody.appendChild(tr)

                const titleTd = document.createElement("td")
                titleTd.innerHTML = element.title
                tr.appendChild(titleTd);

                const categoryTd = document.createElement("td")
                const category = fetch(`${url}categories/getCategoriesById.php?id=${element.categoryId}`)
                    .then((response) => response.json())
                    .then((data) => {
                        console.log(data)
                        categoryTd.innerHTML = data.title
                    })
                tr.appendChild(categoryTd);

                const tdEdit = document.createElement("td");
                const editLink = document.createElement("a");
                editLink.className = "btn sm"
                const edit = document.createTextNode("Edit")
                editLink.setAttribute("href", `${url2}userEditPost.php?id=${element.id}`);
                editLink.appendChild(edit)
                tdEdit.appendChild(editLink);
                tr.appendChild(tdEdit)


                const tdDelete = document.createElement("td");
                const deleteLink = document.createElement("a");
                deleteLink.className = "btn sm danger"
                const deleteName = document.createTextNode("Delete")
                deleteLink.setAttribute("href", `${url}posts/deletePost.php?id=${element.id}`);  //TODO change ulr
                deleteLink.appendChild(deleteName)
                tdDelete.appendChild(deleteLink);
                tr.appendChild(tdDelete);
            });
        })
}