/* // First Way
		function isValid() {
			const jsForm = document.forms["jsform"];
			const fname = jsForm.firstname.value;
			const lname = jsForm.lastname.value;

			console.log(fname + " " + lname);
			return false;
		}*/

		function isValid(jsForm) {
			const id = jsForm.id.value;
			const name = jsForm.name.value;
			const uname = jsForm.uname.value;
			const pass = jsForm.pass.value;
			const email = jsForm.email.value;

			/*console.log(fname + " " + lname);*/

			if (id === "" || name === "" || uname === "" || pass === "" || email === "") {
				document.getElementById("message").innerHTML = "Please fill up the form properly;"
				return false;
			}

		return true;	
		}

