$(document).ready(function() {

  // ページ遷移をせずにfavoriteつけ外し
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


  // ページ遷移をせずにJoin
  $('.join a').click(function(event) {
    event.preventDefault(); 

    let joinLink = $(this); 
    let joinUrl = joinLink.attr('href'); 
    let csrfToken = $('meta[name="csrf-token"]').attr('content');
    let targetJoin = joinLink.closest('.join');

    $.ajax({
      url: joinUrl, 
      type: 'GET',
      data: {_token: csrfToken}, // CSRFトークンの送信
      
      success: function(response) {
      console.log(response);
      let isJoined = targetJoin.find('a').text().includes('Leave');
      let joinRate = $('.join-rate');
      let currentCount = parseInt(joinRate.text().split('/')[0]);
      let maxNumber = parseInt(joinRate.text().split('/')[1]);

      if (isJoined) {
        targetJoin.find('a').text('Join');
        let updatedCount = currentCount - 1;
        joinRate.text(updatedCount + '/' + maxNumber);
      } else {
        targetJoin.find('a').text('Leave');
        let updatedCount = currentCount + 1;
        joinRate.text(updatedCount + '/' + maxNumber);
      }
      },
      error: function(xhr, status, error) {
        console.error(xhr.responseText);
      }
    });
  });




  $(document).ready(function() {
    $('#filter-select').change(function() {
      let selectedFilter = $(this).val();
  
      // 選択値に基づいて表示を切り替える
      if (selectedFilter === 'create') {
        $('#all').hide();
        $('#create').show();
        $('#join').hide();
        $('#favorite').hide();
      } else if (selectedFilter === 'join') {
        $('#all').hide();
        $('#create').hide();
        $('#join').show();
        $('#favorite').hide();
      } else if (selectedFilter === 'favorite') {
        $('#all').hide();
        $('#create').hide();
        $('#join').hide();
        $('#favorite').show();
      } else if (selectedFilter === 'all') {
        // 全ての項目を表示する場合の処理
        $('#all').show();
        $('#create').hide();
        $('#join').hide();
        $('#favorite').hide();
      }
    });
  });
  
  












});
