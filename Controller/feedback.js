let sendBtn = document.getElementById("submit");
let textArea = document.getElementById("message");

sendBtn.addEventListener("click",function()
{
    console.log("clicked");
    if(textArea.value)
    {  
       let request = new XMLHttpRequest();
       request.onreadystatechange = function()
       {
        if(request,this.readyState == 4 && request.status ===200)
        {
            console.log("okay");
        }
       }
       request.open("GET","../Model/feedback.php");
       request.send();
    }
});
