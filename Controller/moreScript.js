 document.querySelectorAll('.more-button').forEach(button => {
   button.addEventListener('click', function() {
     var bookId = button.id;
     // button.disabled =true;
     $.ajax({
       type: 'POST',
       url: '../Model/set_book_id.php',
       data: {bookId: bookId},
       success: function() {
 
       
         var req = new XMLHttpRequest();
             req.open('GET','../Model/get_book_info.php',true);
             
             req.onreadystatechange = function() {
               
               if (this.readyState == 4 && this.status == 200) {
                 console.log(this.responseText);
                 let info = JSON.parse(this.responseText);
 
                 document.getElementById('side-p').innerHTML = "<b>Title: " +info['title'] +'<br>Author: '+ info['author']+"</b><br>"+info['description'];
                 document.getElementsByClassName('side-panel')[0].style.transition = '600ms';
                 document.getElementsByClassName('side-panel')[0].style.display = 'block';
               }
             };
             req.send();
             
       }
     });
    
   });
 });