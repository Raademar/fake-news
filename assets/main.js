// Get the likebuttons and spread them out separate.
const likeBtns = [...document.querySelectorAll('.like-btn')]
// Set the clickcheckor to false by default.
// Set the current likesession.
let thisSession = 0

// For each button add a eventlistener and set the ID equal to the data-id.
likeBtns.forEach(likeButton => likeButton.addEventListener('click', function(event){
  // Get each unique button
	let likeButtonID = parseInt(likeButton.dataset.id)
  // Get the current like number so we can feedback the user instantly without having to query the db.
  let likeNumber = parseInt(likeButton.textContent)
  thisSession++
  likeNumber++
	likeButton.innerHTML = likeNumber + ' Likes<i class="tiny material-icons like-button pink-text text-darken-1">favorite</i>'
	
	let data = {
		thisSession : thisSession,
		 id : likeButtonID
    }
    
  postData(`like-counter.php`, data)
	.catch(error => console.error(error))
	
  thisSession = 0
}))

// Post the likes to the server
function postData(url = ``, data = {}) {
  return fetch(url, {
    method: "POST", 
    credentials: "same-origin", 
    headers: {
        "Content-Type": "application/json; charset=utf-8",
    },
    referrer: "client", 
    body: JSON.stringify(data), 
  })
  .then(response => response) 
}


// Live search in posts.

let input = document.getElementById("search")
let filter = input.value.toLowerCase()
let nodes = document.querySelectorAll('.post')

function filterPosts(nodes, filter) {

  // If the filter matches remove the class hide if it doesn't matches add the hide class.
  for (i = 0; i < nodes.length; i++) {
		if (nodes[i].textContent.toLowerCase().includes(filter.toLowerCase())) {
			nodes[i].classList.remove('hide')
    } else {
			nodes[i].classList.add('hide')
    }
	}
}

// Listen for user input.
input.addEventListener('input', (event) => {
	filterPosts(nodes, event.target.value)
})