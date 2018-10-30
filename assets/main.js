// Get the likebuttons and spread them out separate.
const likeBtns = [...document.querySelectorAll('.like-btn')]
// Set the clickcheckor to false by default.
let firstClicked = null
// Set the current likesession.
let thissession = 0

// For each button add a eventlistener and set the ID equal to the data-id.
likeBtns.forEach(likeButton => likeButton.addEventListener('click', function(event){
  let timestamp = + new Date()
  let likeButtonID
  likeButtonID = parseInt(likeButton.dataset.id)
  thissession++
  //checkIfLikeButtonClicked(event, likeButtonID, thissession)
  let likeNumber = parseInt(likeButton.textContent)
  likeNumber++
  likeButton.innerHTML = likeNumber + ' Likes<i class="tiny material-icons like-button pink-text text-darken-1">favorite</i>'
  sendLikes(likeButtonID, thissession)
  thissession = 0
}))
    
    
    
function checkIfLikeButtonClicked(event, likeButtonID, thissession) {
  event.preventDefault()
  let reverseClick = function(){
    clicked = false
    console.log(clicked)
  }
  let isClicked = function(){
    return new Promise((resolve, reject) => {
    setInterval(reverseClick, 1000)
    resolve(clicked)
    })
  } 

  clearInterval()
  clicked = true
  isClicked().then(clicked => {
    if(clicked === false) {
      sendLikes(likeButtonID, thissession)
    }
  })
}

// **TOOD** Swap to fetch POST instead of ajax.
// function postData(url = ``, data = {}) {
//   return fetch(url, {
//     method: 'POST',
//     credentials: 'same-origin',
//     headers: {
//       'Content-Type': 'application/x-www-form-urlencoded; charset=utf-8',
//     },
//     body: JSON.stringify(data)
//   })
// }

// Ajax post request for sending new likes on a Article.

function sendLikes(likeButtonID, thissession) {
  const request = new XMLHttpRequest()
  request.open('POST', 'like-counter.php', true)
  request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8')
  request.send(`likes=${thissession}&id=${likeButtonID}`)
}

// **TODO** If time left, fix this so likes can be fetched after post.
function getLikes() {
  fetch('like-counter.php', {
    method: 'get',
  })
  .then(function(response) {
    return response.json()
  })
  .then(function(myJson) {
    likeNumber = JSON.parse(myJson.likes)
    likeButton.innerHTML = likeNumber + ' Likes<i class="tiny material-icons like-button">exposure_plus_1</i>'
  })
}