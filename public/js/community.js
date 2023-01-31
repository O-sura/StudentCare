import { CommunityPost } from "./post.js";

//JS code for handling votes
votingCountHandler();

//JS code navigate into add new post page
const add_new = document.getElementsByClassName('addNew-button')[0];
add_new.addEventListener('click', newPage);

function newPage(){
    window.location.replace("./community/add_new");
}

//JS code for dropdown menu in community homepage
const optionMenu = document.querySelector('.dropdown-menu');
const selectBtn = optionMenu.querySelector('.select-btn');
const options = optionMenu.querySelectorAll('.option');
const btnText = optionMenu.querySelector('.Sbtn-text');

selectBtn.addEventListener("click", () => {
    optionMenu.classList.toggle("active");
})

options.forEach(option => {
    option.addEventListener("click", () => {
        let selectedOption = option.innerHTML;
        btnText.innerText = selectedOption;
        dropdownFilter(selectedOption);
        optionMenu.classList.remove("active");
    })
})

function dropdownFilter(option){
    //Your Posts,All Posts,Saved
    // Send an AJAX request to the server with the search query
    let loggedInUser = document.getElementById('loggedInUser').innerText;
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "http://localhost/StudentCare/community/dropdown_handler/?filter=" + option + '&author=' + loggedInUser, true);
   
    xhr.onload = () => {
        if (xhr.status === 200) {
            //Parse the JSON response from the server
            var searchRes = JSON.parse(xhr.responseText);
            //console.log(searchRes)

            // Update the contents of the page to display the search results
            clearposts();
            var resultList = document.getElementById("search-results");
            let postList = "";
           
            for (var i = 0; i < searchRes.length; i++) {
                let result = searchRes[i];
                //id,title,author,postedTime,category,votes,thumbnail,body
                let post = new CommunityPost(result.post_id,result.post_title,result.author,result.posted_at,result.category,result.votes,result.post_thumbnail,result.post_desc,loggedInUser);
                postList += post.createPost();
            }
            resultList.innerHTML = postList;
            votingCountHandler();
        }
    };
    xhr.send();
}

function clearposts(){
    let posts = document.querySelectorAll('.parent');
    if(posts != null){
        posts.forEach((post) =>{
            post.parentNode.removeChild(post);
        })
    }
}


//Search community posts
let loggedInUser = document.getElementById('loggedInUser').innerText;
let searchBar = document.getElementById('searchbar');
searchBar.addEventListener('input', () => {
        // Send an AJAX request to the server with the search query
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "http://localhost/StudentCare/community/search_posts/?query=" + searchBar.value, true);
       
        xhr.onload = () => {
            if (xhr.status === 200) {
                //Parse the JSON response from the server
                var searchRes = JSON.parse(xhr.responseText);
                //console.log(searchRes)
                // Update the contents of the page to display the search results
                clearposts();
                var resultList = document.getElementById("search-results");
                let postList = "";
               
                for (var i = 0; i < searchRes.length; i++) {
                    let result = searchRes[i];
                    //id,title,author,postedTime,category,votes,thumbnail,body
                    let post = new CommunityPost(result.post_id,result.post_title,result.author,result.posted_at,result.category,result.votes,result.post_thumbnail,result.post_desc,loggedInUser);
                    postList += post.createPost();
                }
                resultList.innerHTML = postList;
                votingCountHandler();
            }
        };
        xhr.send();
    }
)

//Best filter
let bestIcon = document.querySelectorAll('.best-btn');
bestIcon.forEach(icon => {
    icon.addEventListener("click", () => {
        // Send an AJAX request to the server with the search query
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "http://localhost/StudentCare/community/best_posts/", true);
       
        xhr.onload = () => {
            if (xhr.status === 200) {
                //Parse the JSON response from the server
                var searchRes = JSON.parse(xhr.responseText);
                //console.log(searchRes)

                // Update the contents of the page to display the search results
                clearposts();
                var resultList = document.getElementById("search-results");
                let postList = "";
               
                for (var i = 0; i < searchRes.length; i++) {
                    let result = searchRes[i];
                    //id,title,author,postedTime,category,votes,thumbnail,body
                    let post = new CommunityPost(result.post_id,result.post_title,result.author,result.posted_at,result.category,result.votes,result.post_thumbnail,result.post_desc,loggedInUser);
                    postList += post.createPost();
                }
                resultList.innerHTML = postList;
                votingCountHandler();
            }
        };
        xhr.send();
    })
})


//Latest Filter
let latestIcon = document.querySelectorAll('.latest-btn');
latestIcon.forEach(icon => {
    icon.addEventListener("click", () => {
        // Send an AJAX request to the server with the search query
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "http://localhost/StudentCare/community/latest_posts/", true);
       
        xhr.onload = () => {
            if (xhr.status === 200) {
                //Parse the JSON response from the server
                var searchRes = JSON.parse(xhr.responseText);
                //console.log(searchRes)

                // Update the contents of the page to display the search results
                clearposts();
                var resultList = document.getElementById("search-results");
                let postList = "";
               
                for (var i = 0; i < searchRes.length; i++) {
                    let result = searchRes[i];
                    //id,title,author,postedTime,category,votes,thumbnail,body
                    let post = new CommunityPost(result.post_id,result.post_title,result.author,result.posted_at,result.category,result.votes,result.post_thumbnail,result.post_desc,loggedInUser);
                    postList += post.createPost();
                }
                resultList.innerHTML = postList;
                votingCountHandler();
            }
        };
        xhr.send();
    })
})

//Get all the buttons
function votingCountHandler(){
    var votingButtons = document.querySelectorAll(".icon-text-button");

    // Add event listeners to each button
    votingButtons.forEach((votingButton)  => {
        var upButton = votingButton.querySelector(".icon-btn#up");
        var downButton = votingButton.querySelector(".icon-btn#down");

        // Add event listeners to the buttons
        upButton.addEventListener("click", function() {
            // Get the vote count element, current vote count, increase and update
            var voteCount = votingButton.querySelector("p#vote-count");
            var count = parseInt(voteCount.textContent);
            count++;
            voteCount.textContent = count;
        });

        downButton.addEventListener("click", function() {
            var voteCount = votingButton.querySelector("p#vote-count");
            var count = parseInt(voteCount.textContent);
            count--;
            voteCount.textContent = count;
        });
    });

}