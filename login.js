document.getElementById("login-form").addEventListener("submit", function(e) {
    e.preventDefault(); // デフォルトのフォーム送信を防ぐ

    let formData = new FormData(this);
    fetch("login.php", { method: "POST", body: formData })
    .then(response => response.json())  // JSON 形式で受け取る
    .then(data => {
        if (data.status === "success") {
            window.location.href = "dashboard.php";
        } else {
            document.getElementById("error-message").textContent = data.message;
        }
    })
    .catch(error => {
        console.error("Error: ", error);
        document.getElementById("error-message").textContent = "Login request failed.";
    });
});
