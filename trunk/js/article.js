(function(){

  var shortId = document.location.href.split('/').pop(-1)
    , hasCookie = document.cookie.indexOf('session') !== -1

  var getLike = function () {
    $.getJSON('/api/articles/' + shortId, function(res){
      if (res.is_liked) {
        $('#likes').addClass('true')
        $('#likes').text('已喜欢')
      }
      else {
        $('.number').hide()
      }
    })
  }

  var getNext = function () {
    $.getJSON('/api/articles/random', function(res){
      $('#next').attr('href', '/' + res.short_id)
    })
  }

  var handleLike = function (url, method, data) {
    var number = parseInt($('#number').text(), 10)
    $.ajax({
      url: url,
      type: method,
      data: data,
      success: function () {
        if ($('#likes').hasClass('true')) {
          $('#number').text(number -= 1)
          $('#likes').text('喜欢')
          $('.number').hide()
        }
        else {
          $('#number').text(number += 1)
          $('#likes').text('已喜欢')
          $('.number').show()
        }
        $('#likes').toggleClass('true')
      },
      error: function (error) {
        humane.error('发生错误，请稍后重试 :-(')
      }
    })
  }

  var bindLike = function () {
    $('#likes').click(function () {
      if (!hasCookie) {
        document.location = '/accounts/signin?next=' + encodeURIComponent(document.location.href)
      }
      else {
        if ($('#likes').hasClass('true')) {
          handleLike('/api/likes/' + shortId, 'delete', {})
        }
        else {
          handleLike('/api/likes/', 'post', { any_id: shortId })
        }
      }
    })
  }

  var bindShare = function () {
    var url = document.location.href
      , title = document.title

    $('#share-twitter').click(function (event) {
      event.preventDefault()
      window.open(
        'https://twitter.com/share?url=' + url + '&text=' + title
      , '_blank'
      , 'width=550, height=450'
      )
    })

    $('#share-sina').click(function (event) {
      event.preventDefault()
      window.open(
        'http://service.weibo.com/share/share.php?url=' + url + '&text=' + title
      , '_blank'
      , 'width=450, height=400'
      )
    })

    $('#share-tencent').click(function (event) {
      event.preventDefault()
      window.open(
        'http://share.v.t.qq.com/index.php?c=share&a=index&url=' + url + '&title=' + title
      , '_blank'
      , 'width=700, height=680'
      )
    })

    $('#share-douban').click(function (event) {
      event.preventDefault()
      window.open(
        'http://www.douban.com/recommend/?url=' + url + '&title=' + title
      , '_blank'
      , 'width=450, height=330'
      )
    })
  }

  $(document).ready(function () {

    getLike()
    getNext()

    bindLike()
    bindShare()

  })

})()
