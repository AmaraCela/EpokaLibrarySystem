document.querySelectorAll('.order-button').forEach(
    (button)=>{
        button.addEventListener('click',function(event)
        {
                event.target.disabled = true;
                
                //The Id of the clicked element
                var bookId = event.target.id;

                $.ajax(
                    {
                        type:'POST',
                        url: '../Model/set_book_id.php',
                        data:{bookId:bookId},
                        success:function(response)
                        {
                            console.log(response)
                        }
                    }
                );

                let request = new XMLHttpRequest();
                request.open('POST','../Model/query.php',true);
                request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                request.onreadystatechange = function()
                {
                    if(this.readyState=== 4 && this.status===200)
                    {
                        console.log(this.responseText);

                    }

                }
                request.send();




        });
    }
);