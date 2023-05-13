document.querySelectorAll('.order-button').forEach(button=>{
    button.addEventListener('click',function(event)
    {
        event.target.disabled = true;

        var request = new XMLHttpRequest();
        var bookId = event.target.id;

        $.ajax({
            type:'POST',
            url:'../Model/set_book_id.php',
            data:{bookId:bookId},
            success:function(response)
            {
                request.open('POST','../Model/deleteQuery.php',true);
                request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                request.onreadystatechange = function()
                {
                    if(this.readyState ===4 && this.status === 200)
                    {
                        window.location = './orderedPage.php';
                    }
                }
                request.send();
                    
            }
        });
        
    });
});