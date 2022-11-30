function passwordCheck(pass1, pass2) {

    if (pass1.length < 5 || pass2.length < 5)
        return "Password must be greater than 5 characters";
    else {
        if (pass1 == pass2) {
            return "matching"
        } else {
            return "not matching"
        }
    }
}
