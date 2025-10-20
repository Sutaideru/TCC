function mostrarSenha(){
	var inputPass = document.getElementById('senha');
	
	var icon = document.getElementById('btn-senha').querySelector('i'); 

	if (inputPass.type === 'password') {
		inputPass.setAttribute('type', 'text');
		icon.classList.remove('bi-eye-fill');
		icon.classList.add('bi-eye-slash-fill');
	} else {
		inputPass.setAttribute('type', 'password');
		icon.classList.remove('bi-eye-slash-fill');
		icon.classList.add('bi-eye-fill');
	}
}
