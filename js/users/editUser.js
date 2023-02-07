const url = "http://localhost:81/webproject/api/";
const rederectUrl =
  "http://localhost:81/webproject/admin/manage-users.php";
//const url = "http://localhost/blog/"

window.onload = function () {
  getUser();
};

const firstnameQ = document.querySelector("#firstname");
const lastnameQ = document.querySelector("#lastname");
const userTypeQ = document.querySelector("#selectUpdate");
const params = new Proxy(new URLSearchParams(window.location.search), {
  get: (searchParams, prop) => searchParams.get(prop),
});

let value = params.id;
console.log(value);

const button = document.querySelector(".form");
console.log(button);

button.addEventListener("submit", function (event) {
  event.preventDefault();

  const updateUser = {
    firstname: firstnameQ.value,
    lastname: lastnameQ.value,
    isAdmin: userTypeQ.options[userTypeQ.selectedIndex].value,
    id: value
  };

  console.log(updateUser);

  const parsedUserUpdate = JSON.stringify(updateUser);

  fetch(`${url}users/updateUser.php`, {
    method: "PUT",
    body: parsedUserUpdate,
    headers: {
      "Content-Type": "application/json",
    },
  })
    .then(function (response) {
      return response.json();
    })
    // .then(window.location.assign(rederectUrl));
});

function getUser() {
  fetch(`${url}users/getUserById.php?id=${value}`, {
    method: "GET",
    headers: {
      "Content-Type": "application/json",
    },
  })
    .then(function (response) {
      return response.json();
    })
    .then((data) => {
      firstnameQ.value = data.firstname;
      lastnameQ.value = data.lastname;
      //   console.log(userType.options[userType.selectedIndex].value)
      //   if(userType.options[userType.selectedIndex].value === data.isAdmin && data.isAdmin === 0){
      //     userType.options[userType.selectedIndex].text = 'Normal User';
      //   }

      //   if(userType.options[userType.selectedIndex].value === data.isAdmin && data.isAdmin === 1){
      //     userType.options[userType.selectedIndex].text = 'Admin';
      //   }
    });
}
