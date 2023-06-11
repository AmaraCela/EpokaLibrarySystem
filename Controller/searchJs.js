const searchBtn = document.querySelector("button[type='submit']");
const searchInput = document.getElementById("search");
const row1 = document.getElementById("row");

searchBtn.addEventListener('click',function(){
    var value = searchInput.value;
    var titles = document.querySelectorAll(".card-title");
    var i=titles.length;
    titles.forEach(title=>
        {
            if(!title.innerText.toUpperCase().includes(value.toUpperCase()))
            {
                title.parentNode.parentNode.parentNode.remove();
                i--;
            }

        });
        if(i==0)
        {
            document.querySelector("p[class='error']").style.display = "flex";
        }

});