document.getElementById("login-form").addEventListener("submit", function(e) {
    e.preventDefault(); // Prevent Default Form Submission

    // Validation Code
    //if (document.getElementById("username").value == )


    // Send the form data to the server
    let formData = new FormData(this);
    fetch("login.php", {method: "POST", body: formData})
    .then(response => response.text())
    .then(data => {
        // Page Redirect when Login is Successful
        if (data == "success") {
            window.location.href = "dashboard.php";
        } else {
            alert("Login failed: " + data);
        }
    })
    .catch(error => {
        console.error("Error: ", error);
    });
});