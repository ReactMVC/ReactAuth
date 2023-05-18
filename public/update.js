// update profile
function submitForm(event) {
    event.preventDefault();
    var nameInput = document.getElementsByName('name')[0];
    var emailInput = document.getElementsByName('email')[0];

    if (nameInput.value === '' || emailInput.value === '') {
        document.getElementById("errorEdit").style.display = "block";
        console.log('Please fill in all required fields.');
        setTimeout(function () {
            document.getElementById("errorEdit").style.display = "none";
        }, 4000);
        return;
    }
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (nameInput.value !== null && nameInput.value !== '' && emailInput.value !== null && emailInput.value !== '' && !emailRegex.test(emailInput.value)) {
        document.getElementById("userEmail").style.display = "block";
        console.log('Please enter a valid email address.');
        setTimeout(function () {
            document.getElementById("userEmail").style.display = "none";
        }, 4000);
        return;
    }

    var xhr = new XMLHttpRequest();
    xhr.open('POST', '/dashboard');
    xhr.onload = function () {
        if (xhr.status === 200) {
            document.getElementById("edited").style.display = "block";
            setTimeout(function () {
                document.getElementById("edited").style.display = "none";
            }, 3000);
            setTimeout(function () {
                location.reload();
            }, 4000);
        } else {
            document.getElementById("noSend").style.display = "block";
            setTimeout(function () {
                document.getElementById("noSend").style.display = "none";
            }, 4000);
            console.log('Request failed.');
        }
    };
    xhr.send(new FormData(document.getElementById('profile')));
}