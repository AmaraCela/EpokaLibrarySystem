const searchBtn = document.querySelector("button[type='submit']");
const searchInput = document.getElementById("search");

searchBtn.addEventListener('click', function()
{
    var valuee = searchInput.value;
    
    $.ajax({
        type:"POST",
        url:"../Model/set_search_value.php",
        data:{valuee,valuee},
        succes: function(response)
        {
            console.log(response);
        }
    }); 
});