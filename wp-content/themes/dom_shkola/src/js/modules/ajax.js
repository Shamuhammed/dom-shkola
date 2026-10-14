export function ajaxFunc() {
   $( document ).ready(function() {
      console.log("ajax functions ready!");

      const $postsWrapper = $('.articles-list__list');
      const $getPostsBtn = $('.get_posts');
      
      $getPostsBtn.on('click', getNewPosts);
      
      function getNewPosts(e) {
          e.preventDefault();
          const $target = $(e.target);
      
          if ($target.hasClass('_active')) {
              let postCount = $target.data('count');
              console.log(postCount);
              const data = {
                  'action': 'get_new_posts',
                  'posts_count': postCount,
              };
      
              jQuery.post('/wp-admin/admin-ajax.php', data, function (response) {
                  if (response === 'false') {
                      $target.removeClass('_active');
                  } else {
                      $postsWrapper.append(response);
                  }
              });  
          } 
          return;
      }
      
  });
}