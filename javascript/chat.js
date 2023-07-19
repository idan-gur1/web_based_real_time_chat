const form = document.querySelector(".chat-area form");
const incoming_id = form.querySelector(".incoming_id").value;
const inputField = form.querySelector(".input-field");
const sendBtn = form.querySelector("button");
const chatBox = document.querySelector(".chat-box");


form.addEventListener("submit", (e) => {
    e.preventDefault()
});


chatBox.addEventListener("mouseenter", () => {
    chatBox.classList.add("active");
});

chatBox.addEventListener("mouseleave", () => {
    chatBox.classList.remove("active");
});


sendBtn.addEventListener("click", (e) => {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = () => {
        if (xhttp.status === 200) {
            inputField.value = "";
            scollToBottom();
        }
    }
    xhttp.open("POST", "api/insert-chat.php", true);
    let formData = new FormData(form)
    xhttp.send(formData);
});


const fetchChat = () => {

    const xhttp = new XMLHttpRequest();
    xhttp.onload = () => {
        if (xhttp.status === 200) {
            chatBox.innerHTML = xhttp.response;
            if (!chatBox.classList.contains("active")) {
                scollToBottom();
            }
        }
    }
    xhttp.open("POST", "api/fetch-chat.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("incoming_id="+incoming_id);
}

fetchChat()

setInterval(fetchChat, 600);

const scollToBottom = () => {
    chatBox.scrollTop = chatBox.scrollHeight;
}