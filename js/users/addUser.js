//const url = "http://localhost:81/webproject/api/";
//const rederectUrl = "http://localhost:81/webproject/admin/manage-users.php";
const url = "http://localhost/blog/api/";
const rederectUrl = "http://localhost/blog/admin/manage-users.php";

const button = document.querySelector(".form");

console.log(button);
const selectUserType = document.querySelector("#selectUserType");
console.log(selectUserType);

button.addEventListener("submit", function (event) {
  event.preventDefault();

  const user = {
    firstname: document.querySelector("#firstname").value,
    lastname: document.querySelector("#lastname").value,
    username: document.querySelector("#username").value,
    email: document.querySelector("#email").value,
    password: document.querySelector("#password").value,
    avatar: "test.jpg",
    isAdmin: selectUserType.options[selectUserType.selectedIndex].value,
  };

  console.log(user);
  const pass = document.querySelector("#password").value;
  const confirmPass = document.querySelector("#confirmPassword").value;
  const parsedUser = JSON.stringify(user);

  const divError = document.querySelector("#a")
  const errorP = document.querySelector("#errorDiv")
  
  if (!document.querySelector("#firstname").value || !document.querySelector("#lastname").value || !document.querySelector("#username").value || !document.querySelector("#email").value || !document.querySelector("#password").value) {
    divError.className = 'alert_message error'
    errorP.innerHTML = 'One of the fields is missing!'
  } else {
    if (pass === confirmPass) {
      fetch(`${url}users/create.php`, {
        method: "POST",
        body: parsedUser,
        headers: {
          "Content-Type": "application/json",
        },
      })
        .then(function (response) {
          return response.json();
        })
        .then(window.location.assign(rederectUrl))
        .then(window.location.reload());
    }
  }


});
