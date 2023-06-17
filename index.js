function validateName() {
    var name = document.getElementById('nombre');    
    var errorName = document.getElementById('nameError');

    if(name.value == 0) {
        errorName.innerHTML = "Rellene este campo";
        name.classList.add("invalid");
        name.classList.remove("valid");
        name.classList.add("errorIcon");
        name.classList.remove("sucessIcon");
        return false;
    }

    else {
        name.classList.remove("invalid");
        name.classList.add("valid");
        name.classList.add("sucessIcon");
        name.classList.remove("errorIcon");
        errorName.innerHTML ="";
        return true;
    }
}

function validate1surname() {
    var surname = document.getElementById('1_apellido');    
    var errorSurname = document.getElementById('1_surnameError');

    if(surname.value == 0) {
        errorSurname.innerHTML = "Rellene este campo";
        surname.classList.add("invalid");
        surname.classList.remove("valid");
        surname.classList.add("errorIcon");
        surname.classList.remove("sucessIcon");
        return false;
    }

    else {
        surname.classList.remove("invalid");
        surname.classList.add("valid");
        surname.classList.add("sucessIcon");
        surname.classList.remove("errorIcon");
        errorSurname.innerHTML ="";
        return true;
    }
}

function validate2surname() {
    var surname = document.getElementById('2_apellido');    
    var errorSurname = document.getElementById('2_surnameError');

    if(surname.value == 0) {
        errorSurname.innerHTML = "Rellene este campo";
        surname.classList.add("invalid");
        surname.classList.remove("valid");
        surname.classList.add("errorIcon");
        surname.classList.remove("sucessIcon");
        return false;
    }

    else {
        surname.classList.remove("invalid");
        surname.classList.add("valid");
        surname.classList.add("sucessIcon");
        surname.classList.remove("errorIcon");
        errorSurname.innerHTML ="";
        return true;
    }
}

function validateEmail(){
	var email = document.getElementById('email');
	var errorEmail = document.getElementById('emailError');

	if(email.value == 0){
		errorEmail.innerHTML = "Rellene este campo";
		email.classList.add("invalid");
        email.classList.remove("valid");
        email.classList.add("errorIcon");
        email.classList.remove("sucessIcon");
		return false; 
	}

	else if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email.value) ){
        errorEmail.innerHTML = "";
        email.classList.add("valid");
		email.classList.remove("invalid");
        email.classList.add("sucessIcon");
        email.classList.remove("errorIcon");
		return true; 
	}
    
	else {
		errorEmail.innerHTML = "Email inválido";
		email.classList.add("invalid");
        email.classList.remove("valid");
        email.classList.add("errorIcon");
        email.classList.remove("sucessIcon");
		return false; 
	}
} 

function validateLogin() {
    var login = document.getElementById('login');    
    var loginError = document.getElementById('loginError');

    if(login.value == 0) {
        loginError.innerHTML = "Rellene este campo";
        login.classList.add("invalid");
        login.classList.remove("valid");
        login.classList.add("errorIcon");
        login.classList.remove("sucessIcon");
        return false;
    }

    else {
        login.classList.remove("invalid");
        login.classList.add("valid");
        login.classList.add("sucessIcon");
        login.classList.remove("errorIcon");
        loginError.innerHTML ="";
        return true;
    }
}

function validatePassword() {
    var password = document.getElementById('password');
    var errorPassword = document.getElementById('passwordError');

    if(password.value == 0) {
        errorPassword.innerHTML = "Rellene este campo";
        password.classList.add("invalid");
        password.classList.remove("valid");
        password.classList.add("errorIcon");
        password.classList.remove("sucessIcon");
        return false;
    }

    else if(/(?=.{4,8})/.test(password.value)) {
        errorPassword.innerHTML = "";
        password.classList.add("valid");
        password.classList.remove("invalid");
        password.classList.add("sucessIcon");
        password.classList.remove("errorIcon");
        return true;
    }

    else {
        errorPassword.innerHTML = "Debe tener entre 4 y 8 caracteres";
        password.classList.add("invalid");
        password.classList.remove("valid");
        password.classList.add("errorIcon");
        password.classList.remove("sucessIcon");
	return false;
    }
}

// function borderButton(){
// 	var borderButton = document.getElementById('button');
// 	    borderButton.onmouseover =() => {borderButton.classList.add('borderColor'); }
// 	    borderButton.onmouseout =() => {borderButton.classList.remove('borderColor'); }
// }

function alert_text() {
    return alert("Los datos de la inscripción son correctos.");
}

function validateForm() {
    if (validateName() && validate1surname() && validate2surname() && validateEmail() && validateLogin()  && validatePassword()) {
        // alert_text()
        return true
    }

    else { 
        return false;
    }
}

const nombre = document.getElementById('nombre');
nombre.addEventListener("input", () => {
    return validateName();
})

const apellido1 = document.getElementById('1_apellido');
apellido1.addEventListener("input", () => {
    return validate1surname();
})

const apellido2 = document.getElementById('2_apellido');
apellido2.addEventListener("input", () => {
    return validate2surname();
})

const email = document.getElementById('email');
email.addEventListener("input", () => {
    return validateEmail();
})

const login = document.getElementById('login');
login.addEventListener("input", () => {
    return validateLogin();
})

const password = document.getElementById('password');
password.addEventListener("input", () => {
    return validatePassword();
})