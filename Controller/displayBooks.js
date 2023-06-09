const request = new XMLHttpRequest();
const row = document.getElementById("row");
request.onreadystatechange = function()
{
    if(request.readyState === 4 && request.status === 200)
    { 
        let bookList = JSON.parse(request.responseText);
        for(let i = 0 ; i<bookList.length;i++)
        {
            let div1 = document.createElement("div");
            div1.setAttribute("class","col-sm-4 mb-3 mb-sm-0");
            

            let cardDiv = document.createElement("div");
            cardDiv.setAttribute("class","card");
            

            let img = document.createElement("img");
            img.setAttribute("src","data:image/png;base64,"+bookList[i].Image);
            img.setAttribute("class","card-img-top");
            img.setAttribute("alt","photo");
            cardDiv.appendChild(img);

            let cardBody = document.createElement("div");
            cardBody.setAttribute("class","card-body");

            cardDiv.appendChild(cardBody);

            let cardTitle = document.createElement("h6");
            cardTitle.setAttribute("class","card-title");
            cardTitle.innerHTML = bookList[i].Title;
            
            cardBody.appendChild(cardTitle);

            let cardText = document.createElement("p");
            cardText.setAttribute("class","card-text");
            cardText.innerHTML = "<b>Author: </b>" + bookList[i].Author +"<br><b> Genre: </b> " + bookList[i].Genre+"<br>";

            cardBody.appendChild(cardText);
            
            let ul = document.createElement("ul");
            ul.setAttribute("class","buttons-ul");
            

            let li1 = document.createElement("li");
            li1.setAttribute("class","buttons-li");

            let more = document.createElement("button");
            more.setAttribute("title","Press for more");

            more.setAttribute("id",bookList[i].BookId);
            more.setAttribute("class","btn btn-primary more-button");
            more.innerText = "More";
            li1.appendChild(more);
            ul.appendChild(li1);

            let li2 = document.createElement("li");
            li2.setAttribute("class","buttons-li");

            let order = document.createElement("button");
            order.setAttribute("title","Order book");
            order.setAttribute("id",bookList[i].BookId);
            order.setAttribute("class","btn btn-primary order-button");
            order.innerText = "Order";
            li2.appendChild(order);
            ul.appendChild(li2)

            let li3 = document.createElement("li");
            li3.setAttribute("class","buttons-li");
            let save = document.createElement("button");
            save.setAttribute("title","Save book");
            
            save.setAttribute("class","btn btn-primary favorite-button");
            
            
            let favImg = document.createElement("img");
            favImg.setAttribute("src","../assets/images/favorite.png");
            favImg.setAttribute("id",bookList[i].BookId);
            favImg.setAttribute("style","width:25px");
            save.appendChild(favImg);
            li3.appendChild(save);

            ul.appendChild(li3);
            cardBody.appendChild(ul);
            div1.appendChild(cardDiv);
            row.appendChild(div1);
        }
    }
}
request.open("GET","../Model/get_books.php");
request.send();

