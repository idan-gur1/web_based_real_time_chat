const pwd = document.querySelector("#password");
const eyeBtn = document.querySelector(".password-container i");

eyeBtn.addEventListener("click", (e) => {
    if (pwd.type == "password") {
        pwd.type = "text";
        eyeBtn.classList.remove("fa-eye")
        eyeBtn.classList.add("fa-eye-slash")
    } else {
        pwd.type = "password";
        eyeBtn.classList.add("fa-eye")
        eyeBtn.classList.remove("fa-eye-slash")
    }
});