document.querySelectorAll('.favorite-button').forEach(button => {
    button.addEventListener('click', function() {
      console.log('clicked');
      

      // get the ID of the clicked element
    var bookId = event.target.id;
    console.log(bookId);
  // make an AJAX POST request to a PHP script
  $.ajax({
    type: 'POST',
    url: '../Model/set_book_id.php',
    data: { bookId: bookId },
    success: function(response) {
      console.log("success");
    }
  });
      // Send a request to the PHP script
      var xhr = new XMLHttpRequest();
      xhr.open('POST', '../Model/favoriteQuery.php', true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.onreadystatechange = function() {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
          // Do something with the response if necessary
          console.log(this.responseText);
        }
      };
      xhr.send();
    });
  });