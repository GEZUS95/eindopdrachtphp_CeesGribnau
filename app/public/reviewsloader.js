function loadReviews() {
    fetch('http://localhost/api/reviews')
        .then(result => result.json())
        .then(reviews => {
            reviews.forEach(review => {

                //Get the main div element to place all child elements in
                let mainDiv = document.getElementById("content");

                //Create child elements

                // <div class='card' style='width: 28rem'>
                //     <div class='card-body'>
                //         <h2 class='card-title'>$article->title</h2>
                //         <p class='card-text'><i>$article->description</i>
                //             <p>
                //                 <p>$article->rating Stars
                //                     <p>
                //                         <a class='btn btn-primary' href='/review/single?id=$article->id'>Read more</a>
                //                         <p class='card-footer'><i>$user->name</i> wrote to <i>$company->name</i></p>
                //     </div>
                // </div>

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