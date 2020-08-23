


const form = document.querySelector('.form');

form.addEventListener('submit', e => {
	e.preventDefault();

	
	const username = form.username.value;
	const password = form.password.value;
    const usernamePattern = /^[a-z1-2]{6,12}$/;
    const passwordPattern = /^[\w@_]{8,20}$/;
    const feedback = document.querySelector('.feedback');
    const request = document.querySelector('.request');


       if ((username === "") && (password === "")){

        alert("both fields must be filled");
        return false;
    }
    

    if (username === "") {
    	feedback.textContent = 'please fill the username';
    	return false;
    }

     if (!usernamePattern.test(username)){
    	feedback.textContent = 'invalid username';
    	return false;
}

 if (password === "") {
    	request.textContent = 'password must be filled';
    	return false;
    }

  if (!passwordPattern.test(password)){
    	request.textContent = 'invalid password';
    	return false;
}


	
});


