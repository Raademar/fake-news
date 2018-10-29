const likeBtns = [...document.querySelectorAll('.like-btn')]

    likeBtns.forEach(likeButton => likeButton.addEventListener('click', function(){
      let likeButtonID
      likeButtonID = parseInt(likeButton.dataset.id)
      // let likesData = {
      //   likes: thissession,
      //   id: likeButtonID
      // }
      //postData('like-counter.php', likesData)
      sendLikes(likeButtonID)
      thissession = 0
    }))

    function postData(url = ``, data = {}) {
      return fetch(url, {
        method: 'POST',
        credentials: 'same-origin',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=utf-8',
        },
        body: JSON.stringify(data)
      })
    }
    
    function sendLikes(likeButtonID) {
      let thissession = 0
      let likeNumber
      thissession++
      const request = new XMLHttpRequest()
      request.open('POST', 'like-counter.php', true)
      request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8')
      request.send(`likes=${thissession}&id=${likeButtonID}`)
      thissession = 0
    }

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