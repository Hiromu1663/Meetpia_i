$(document).ready(function() {

  // ページ遷移をせずにブックマークつけ外し
  $('.favorite a').click(function(event) {
    event.preventDefault(); 

    let favoriteLink = $(this); 
    let favoriteUrl = favoriteLink.attr('href'); 
    let csrfToken = $('meta[name="csrf-token"]').attr('content');
    let targetFavorite = favoriteLink.closest('.favorite');

    $.ajax({
      url: favoriteUrl, 
      type: 'GET',
      data: {_token: csrfToken}, // CSRFトークンの送信
      
      success: function(response) {
        // console.log(response);
        // let isFavorited = targetFavorite.find('a').text() === 'お気に入りを外す';
        let isFavorited = targetFavorite.find('a').html().includes('<i class="fas fa-heart"></i>');

        if (isFavorited) {
          // targetFavorite.find('a').text('お気に入り'); 
          targetFavorite.find('a').html('<i class="fas fa-heart-broken"></i>');
        } else {
          // targetFavorite.find('a').text('お気に入りを外す');
          targetFavorite.find('a').html('<i class="fas fa-heart"></i>');
        }     
      },
      error: function(xhr, status, error) {
        console.error(xhr.responseText);
      }
    });
  });
});
