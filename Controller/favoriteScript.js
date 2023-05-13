document.querySelectorAll('.favorite-button').forEach(button => {
    button.addEventListener('click', function(event) {
      console.log('clicked');
      
      // event.target.disabled = true;
      // get the ID of the clicked element
    let bookId = event.target.id;
    
  // make an AJAX POST request to a PHP script
  $.ajax({
    type: 'POST',
    url: '../Model/set_book_id.php',
    data: { bookId: bookId },
    success: function(response) {
      console.log(response);
    }
  });
      // Send a request to the PHP script
      let xhr = new XMLHttpRequest();
      xhr.open('POST', '../Model/favoriteQuery.php', true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
          // Do something with the response if necessary
          console.log(this.responseText);
        }
      };
      xhr.send();
    });
  });