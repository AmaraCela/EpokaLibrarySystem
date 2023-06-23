document.querySelectorAll('.favorite-button').forEach(button => {
    button.addEventListener('click', function(event) {
     
      // get the ID of the clicked element
    let bookId = button.children[0].id;
    console.log(bookId);
    //button.disabled = true;
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
          button.disabled = true;
        }
      };
      xhr.send();
    });
});


  let reqq = new XMLHttpRequest();

  reqq.open("GET","../Controller/validateFavorites.php",true);
  reqq.onreadystatechange = function()
  {
    if(reqq.status===200 && reqq.readyState===4)
    {
        let array = JSON.parse(reqq.response);
        for(let i=0;i<array.length;i++)
        {
          
          if(document.querySelector("button img[id='"+array[i]+"']"))
        {console.log(document.querySelector("button img[id='"+array[i]+"']"));
          document.querySelector("button img[id='"+array[i]+"']").parentElement.disabled = true;
        }
      }
    }
  }
  reqq.send();