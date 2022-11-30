//match the two passwords
var check = function () {

    var password = document.getElementById('password').value;
    var password2 = document.getElementById('confirm_password').value;

    if (password.length < 5 || password2.length < 5)
        document.getElementById('message').innerHTML = 'Password needs to be 5 chars minimum' + '</br>';

    else {
        if (document.getElementById('password').value ==
            document.getElementById('confirm_password').value) {
            document.getElementById('message').style.color = 'green';
            document.getElementById('message').innerHTML = 'matching' + '</br>';
        } else {
            document.getElementById('message').style.color = 'red';
            document.getElementById('message').innerHTML = 'not matching' + '</br>';
        }
    }
}
