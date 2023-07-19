const searchBar = document.querySelector("#search");
const searchBtn = document.querySelector("#search-btn");
const searchSpan = document.querySelector(".search span");
const usersList = document.querySelector(".users .users-list");

const handleSearchToggle = (e) => {
    searchBar.classList.toggle("active");
    searchBtn.classList.toggle("active");
    searchBar.focus();
    if (!searchBar.classList.contains("active")) {
        searchBar.value = "";
    }
}

searchBtn.addEventListener("click", handleSearchToggle);
searchSpan.addEventListener("click", handleSearchToggle);


searchBar.addEventListener("keyup", () => {
    let searchTerm = searchBar.value;
    if (searchTerm != "") {
        searchBar.classList.add("active");
    } else {
        searchBar.classList.remove("active");
    }
    const xhttp = new XMLHttpRequest();
    xhttp.open("POST", "api/search-users.php", true);
    xhttp.onload = () => {
        if (xhttp.status === 200) {
            let data = xhttp.response;
            usersList.innerHTML = data;
        }
    }
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("search=" + searchTerm);
});


const loadUsers = () => {
    if(searchBar.classList.contains("active")) {
        return
    }

    const xhttp = new XMLHttpRequest();
    xhttp.onload = () => {
        if (xhttp.status === 200) {
            usersList.innerHTML = xhttp.response;
        }
    }
    xhttp.open("GET", "api/fetch-users.php", true);
    xhttp.send()
}

loadUsers()

setInterval(loadUsers, 1000);
