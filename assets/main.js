// Get the likebuttons and spread them out separate.
const likeBtns = [...document.querySelectorAll('.like-btn')]

// For each button add a eventlistener and set the ID equal to the data-id.
    likeBtns.forEach(likeButton => likeButton.addEventListener('click', function(){
      let likeButtonID
      likeButtonID = parseInt(likeButton.dataset.id)
      let likeNumber = parseInt(likeButton.textContent)
      likeNumber++
      likeButton.innerHTML = likeNumber + ' Likes<i class="tiny material-icons like-button pink-text text-darken-1">favorite</i>'
      sendLikes(likeButtonID)
    }))

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
    function sendLikes(likeButtonID) {
      let thissession = 0
      thissession++
      const request = new XMLHttpRequest()
      request.open('POST', 'like-counter.php', true)
      request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8')
      request.send(`likes=${thissession}&id=${likeButtonID}`)
      thissession = 0
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