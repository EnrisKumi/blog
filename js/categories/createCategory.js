const url = "http://localhost:81/webproject/api/";

const button = document.querySelector(".form")

button.addEventListener('submit', function(event){
    event.preventDefault();

    const category = { 
        title: document.querySelector("#titleArea").value,
        description: document.querySelector("#descriptionArea").value
    };

    console.log(category)

    const parsedCategory = JSON.stringify(category);

    fetch(`${url}categories/createCategories.php`, {
        method: "POST",
        body: parsedCategory,
        headers: {
          "Content-Type": "application/json",
        },
      }).then(function (response) {
        return response.json();
      }).then(window.location.assign("http://localhost:81/webproject/admin/manage-categories.php"))

})