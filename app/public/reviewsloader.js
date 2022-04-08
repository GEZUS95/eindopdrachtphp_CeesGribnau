function loadReviews() {
    let getUrl = window.location;
    let baseUrl = getUrl .protocol + "//" + getUrl.host;
    fetch(baseUrl+'/api/reviews')
        .then(result => result.json())
        .then(reviews => {
            reviews.forEach(review => {

                //Get the main div element to place all child elements in
                let mainDiv = document.getElementById("content");

                //Create child elements
                let linkreadmore = document.createElement("a");
                linkreadmore.href = '/review/single?id=' + review.id;
                linkreadmore.className = "btn btn-primary";
                linkreadmore.innerHTML = "Read More";

                let stars = document.createElement("p");
                stars.innerHTML = review.rating + " Stars";

                let description = document.createElement("p");
                description.className = "card-text";
                description.innerHTML = "<i>" + review.description + "</i>";

                let title = document.createElement("h2");
                title.className = "card-title";
                title.innerHTML = review.title;

                let cardbody = document.createElement("div");
                cardbody.className = "card-body";

                let card = document.createElement("div");
                card.className = "card";
                card.setAttribute("style", "width: 28rem");

                card.appendChild(cardbody);
                cardbody.appendChild(title);
                cardbody.appendChild(description);
                cardbody.appendChild(stars);
                cardbody.appendChild(linkreadmore);

                mainDiv.appendChild(card);
            })
        })
}

loadReviews();