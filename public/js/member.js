
setTimeout(function () {

    let message = document.getElementById('success-message');


    if (message) {
        message.style.transition = "opacity 0.5s ease";
        message.style.opacity = "0";


        setTimeout(() => message.remove(), 500);
    }
}, 3000); 
