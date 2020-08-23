

const button = document.querySelector('button');
const popup = document.querySelector('.popup-wrapper');
const close = document.querySelector('.popup-close');


button.addEventListener('click', () => {
	popup.style.display = 'block';
});

close.addEventListener('click', () => {
	popup.style.display = 'none';
});

function modalCoval() {
	popup.style.display = 'block';
}

const form = document.querySelector('.form');

form.addEventListener('submit', e => {
	// e.preventDefault();
	console.log('was called');
  
	const firstname = form.firstname.value;
	const lastname = form.lastname.value;
	const username = form.username.value;
	const password = form.password.value;
    const confirm = form.confirm.value;
	const email = form.email.value;
    const firstnamePattern = /^[a-z]{3,12}$/;
    const lastnamePattern = /^[a-z]{3,12}$/;
    const usernamePattern = /^[a-z1-2]{3,12}$/;
    const passwordPattern = /^[\w@_]{3,20}$/;
     const confirmPattern = /^[\w@_]{3,20}$/;
    const emailPattern = /^[\w@\.]{4,12}$/;
    const feedback = document.querySelector('.feedback');
    const request = document.querySelector('.request');
    const reply = document.querySelector('.reply');
    const refuse = document.querySelector('.refuse');
    const quest = document.querySelector('.quest');
    const relay = document.querySelector('.relay');



      
    if ((firstname === "") && (lastname === "") && (username === "") && (password === "") && (confirm === "") && (email === "" )){

    	alert("all fields must be filled");
     	return false;
     }

     if (firstname === ""){
    	feedback.textContent = 'firstname must be filled';
    	return false;
    }

    if (!firstnamePattern.test(firstname)) {
    	feedback.textContent = 'invalid firstname';
    	return false;
    }

    if (lastname === "") {
    	request.textContent = 'lastname must be filled';
    	return false;
    }
  
    if (!lastnamePattern.test(lastname)){
    	request.textContent = 'invalid lastname';
    	return false;
    }

    if (username === "") {
    	reply.textContent = 'username must be filled';
    	return false;
    }

    if (!usernamePattern.test(username)){
    	reply.textContent = 'invalid username';
    	return false;
    }

    if (password === "") {
    	refuse.textContent = 'password must be filled';
    	return false;
    }

    if (!passwordPattern.test(password)){
    	refuse.textContent = 'invalid password';
    	return false;
    }


    if (confirm === "") {
        quest.textContent = 'confirmpassword must be filled';
        return false;
    }

    if (!confirmPattern.test(confirm)){
        quest.textContent = 'invalid confirmpassword';
        return false;
    }

    if (password !== confirm){
        alert('password does not match');
    }


    if (email === "") {
    	relay.textContent = 'email must be filled';
    	return false;
    }

    if (!emailPattern.test(email)){
    	relay.textContent = 'invalid email';
    	return false;
    }
    // return true
	
});



