// form data
function submitForm(event) {
    event.preventDefault();
    var nameInput = document.getElementsByName('name')[0];
    var emailInput = document.getElementsByName('email')[0];
    var messageInput = document.getElementsByName('message')[0];

    if (nameInput.value === '' || emailInput.value === '' || messageInput.value === '') {
        document.getElementById("error").style.display = "block";
        console.log('Please fill in all required fields.');
        setTimeout(function () {
            document.getElementById("error").style.display = "none";
        }, 4000);
        return;
    }
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (nameInput.value !== null && nameInput.value !== '' && emailInput.value !== null && emailInput.value !== '' && messageInput.value !== null && messageInput.value !== '' && !emailRegex.test(emailInput.value)) {
        document.getElementById("email").style.display = "block";
        console.log('Please enter a valid email address.');
        setTimeout(function () {
            document.getElementById("email").style.display = "none";
        }, 4000);
        return;
    }

    var xhr = new XMLHttpRequest();
    xhr.open('POST', '/send');
    xhr.onload = function () {
        if (xhr.status === 200) {
            document.getElementById("ok").style.display = "block";
            setTimeout(function () {
                document.getElementById("ok").style.display = "none";
            }, 3000);
        } else {
            console.log('Request failed.');
        }
    };
    xhr.send(new FormData(document.getElementById('contactForm')));
}


// active nav
const navLinks = document.querySelectorAll('.nav-link');

navLinks.forEach(link => {
    link.addEventListener('click', () => {
        navLinks.forEach(l => l.classList.remove('active'));
        link.classList.add('active');
    });
});


// copy text to clipboard
const okElement = document.getElementById("copy");

okElement.addEventListener("click", function () {
    const text = okElement.textContent;
    navigator.clipboard.writeText(text)
    document.getElementById("copied").style.display = "block";
    setTimeout(function () {
        document.getElementById("copied").style.display = "none";
    }, 4000);
});