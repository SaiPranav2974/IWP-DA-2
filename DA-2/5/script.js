function validateForm() {
    var fullName = document.getElementById('fullName').value;
    var email = document.getElementById('email').value;
    var countryCode = document.getElementById('countryCode').value;

    var fullNameRegex = /^[a-zA-Z\s]+$/;
    var emailRegex = /^\S+@\S+\.\S+$/;

    if (!fullNameRegex.test(fullName)) {
        alert("Please enter a valid full name.");
        return false;
    }

    if (!emailRegex.test(email)) {
        alert("Please enter a valid email address.");
        return false;
    }

    if (countryCode.length !== 3 || !countryCode.match(/[A-Z]{3}/)) {
        alert("Please enter a valid country code (3 uppercase alphabets).");
        return false;
    }

    alert("Success! Registration complete.");
    return true;
}
