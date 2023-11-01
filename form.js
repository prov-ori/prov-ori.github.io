document.getElementById("contactForm").addEventListener("submit", function(event) {
    event.preventDefault();

    var form = this;
    var formData = new FormData(form);

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "/form.php", true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            document.getElementById("response").innerHTML = xhr.responseText;
            form.reset();
        } else {
            document.getElementById("response").innerHTML = "Произошла ошибка при отправке.";
        }
    };
    xhr.send(formData);
});
