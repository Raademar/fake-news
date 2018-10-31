// Get the likebuttons and spread them out separate.
const likeBtns = [...document.querySelectorAll('.like-btn')]
// Set the clickcheckor to false by default.
// Set the current likesession.
let thissession = 0

// For each button add a eventlistener and set the ID equal to the data-id.
likeBtns.forEach(likeButton => likeButton.addEventListener('click', function(event){
	let likeButtonID
  let likeNumber = parseInt(likeButton.textContent)
  likeButtonID = parseInt(likeButton.dataset.id)
  thissession++
  likeNumber++
	likeButton.innerHTML = likeNumber + ' Likes<i class="tiny material-icons like-button pink-text text-darken-1">favorite</i>'
	
	let data = {
		thissession : thissession,
		 id : likeButtonID
		}
  postData(`like-counter.php`, data)
  .then(data => console.log(data)) // JSON-string from `response.json()` call
	.catch(error => console.error(error))
	
  thissession = 0
}))

// Ajax post request for sending new likes on a Article.
function sendLikes(likeButtonID, thissession) {
  const request = new XMLHttpRequest()
  request.open('POST', 'like-counter.php', true)
  request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8')
  request.send(`likes=${thissession}&id=${likeButtonID}`)
}


function postData(url = ``, data = {}) {
  // Default options are marked with *
    return fetch(url, {
        method: "POST", // *GET, POST, PUT, DELETE, etc.
        credentials: "same-origin", // include, *same-origin, omit
        headers: {
            "Content-Type": "application/json; charset=utf-8",
        },
        referrer: "client", // no-referrer, *client
        body: JSON.stringify(data), // body data type must match "Content-Type" header
    })
    .then(response => response) // parses response to JSON
}

let input = document.getElementById("search")
let filter = input.value.toLowerCase()
let nodes = document.querySelectorAll('.post')

function filterPosts(nodes, filter) {

  for (i = 0; i < nodes.length; i++) {
		if (nodes[i].textContent.toLowerCase().includes(filter.toLowerCase())) {
			nodes[i].classList.remove('hide')
    } else {
			nodes[i].classList.add('hide')
    }
	}
}
input.addEventListener('input', (event) => {
	filterPosts(nodes, event.target.value)
})