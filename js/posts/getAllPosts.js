const click = document.querySelector('#click');

click.addEventListener('click', getData );


function getData(){
    fetch('http://localhost:81/webproject/api/posts/getPosts.php',{
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        }
    }).then((response) => response.json())
    .then((data)=> console.log(data))
}

window.onload = function() {
    getData();
  };