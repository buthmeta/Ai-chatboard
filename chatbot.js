function sendMessage() {
  const input = document.getElementById("user-input");
  const message = input.value;
  if (!message) return;

  const chatBox = document.getElementById("chat-box");
  chatBox.innerHTML += `<div class="user">You: ${message}</div>`;
  input.value = "";

  fetch("chatbot.php", {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: "message=" + encodeURIComponent(message),
  })
    .then((res) => res.text())
    .then((reply) => {
      chatBox.innerHTML += `<div class="bot">Bot: ${reply}</div>`;
      chatBox.scrollTop = chatBox.scrollHeight;
    });
}
