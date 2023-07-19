const form = document.querySelector(".signup form");
const submitBtn = document.querySelector(".signup input[type='submit']");
const errorTxt = document.querySelector(".error-txt");

form.addEventListener("submit", (e) => {
    e.preventDefault()
});

submitBtn.addEventListener("click", (e) => {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = () => {
        if (xhttp.status === 200) {
            let data = xhttp.response
            if (data == "ok") {
                location.href = "users.php";
            } else {
                errorTxt.style.display = "block";
                errorTxt.textContent = data;
            }
        }
    }
    xhttp.open("POST", "api/handle-signup.php", true);
    let formData = new FormData(form)
    xhttp.send(formData);
});