const searchBtn = document.querySelector("button[type='submit']");
const searchInput = document.getElementById("search");
const row1 = document.getElementById("row");

searchBtn.addEventListener('click',function(){
    var value = searchInput.value;
    var titles = document.querySelectorAll(".card-title");
    titles.forEach(title=>
        {
            if(!title.innerText.toUpperCase().includes(value.toUpperCase()))
            {
                title.parentNode.parentNode.parentNode.remove();
            }

        });

});