
// Appels Ajax filtres
document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('#ajax_call_categories').addEventListener('change', getImages );
    document.querySelector('#ajax_call_formats').addEventListener('change', getImages );
    document.querySelector('#ajax_call_dates').addEventListener('change', getImages );
    document.querySelector('#load-more-button').addEventListener('click', getImages );
});

let page = 2;

function getImages(e) {
  let form = document.getElementById("form-filters");
      let formData = new FormData(form);
      formData.append('action', 'request_filtered');
      if(e.target == document.querySelector('#load-more-button')) {
        formData.append( 'paged', page );
        page ++;
      } else {
        page = 2;
      }

      fetch(motaphoto_js.ajax_url, {
        method: 'POST',
        body: formData,
      }).then(function(response) {
        if (!response.ok) {
          throw new Error('Network response error.');
        }
   
        return response.json();
      }).then(function(data) {
        console.log(data.found_posts);
        if (data.found_posts < page * 12 - 12) {
          document.querySelector('#load-more-button').style.display = "none";
        } else {
          document.querySelector('#load-more-button').style.display = "block";
        }
        if (e.target != document.querySelector('#load-more-button')) {

          document.querySelector("#ajax_return").innerHTML = "";
        }
        if( data != false) {
          data.posts.forEach(function(post) {
            document.querySelector('#ajax_return').insertAdjacentHTML('beforeend', '<div>' + post.post_content + '<div>');
          });
        } else {
          document.querySelector('#ajax_return').insertAdjacentHTML('beforeend', '<div> Aucune photo ne correspond à ces critères <div>');
        }
      }).catch(function(error) {
        console.error('There was a problem with the fetch operation: ', error);
      });
}
