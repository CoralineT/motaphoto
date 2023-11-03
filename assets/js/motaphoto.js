console.log('script ajax chargé');

// Appels Ajax filtres
document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('#ajax_call_categories').addEventListener('change', getImages );
    document.querySelector('#ajax_call_formats').addEventListener('change', getImages );
    document.querySelector('#ajax_call_dates').addEventListener('change', getImages );
});


function getImages() {
  let form = document.getElementById("form-filters");
      let formData = new FormData(form);
      formData.append('action', 'request_filtered');

      fetch(motaphoto_js.ajax_url, {
        method: 'POST',
        body: formData,
      }).then(function(response) {
        if (!response.ok) {
          throw new Error('Network response error.');
        }
   
        return response.json();
      }).then(function(data) {

        document.querySelector("#ajax_return").innerHTML = "";
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

