document.querySelectorAll('.order-button').forEach(
    button=>{
        button.addEventListener('click',function(event)
        {
                button.disabled = true;
                
                //The Id of the clicked element
                var bookId = button.id;

                

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

  let req =new XMLHttpRequest();

  req.open("GET","../Controller/validateOrdered.php",true);
  
  req.onreadystatechange =function()
  {
    if(req.status ==200 &&req.readyState==4)
    {
      var array =JSON.parse(req.response);
      for(let i=0;i<array.length;i++)
      {
        
        console.log(document.querySelector("button[title='Order book'][id='"+array[i]+"']"));
        document.querySelector("button[title='Order book'][id='"+array[i]+"']").disabled = true;
      }
    }
  }
  req.send();