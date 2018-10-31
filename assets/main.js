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
  sendLikes(likeButtonID, thissession)
  thissession = 0
}))

// Ajax post request for sending new likes on a Article.
function sendLikes(likeButtonID, thissession) {
  const request = new XMLHttpRequest()
  request.open('POST', 'like-counter.php', true)
  request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8')
  request.send(`likes=${thissession}&id=${likeButtonID}`)
}