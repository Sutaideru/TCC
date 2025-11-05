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

function mostrarNovaSenha(){
	var inputPass = document.getElementById('nova_senha');
	
	var icon = document.getElementById('btn-senha-nova').querySelector('i'); 

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

function mostrarConfirmarSenha(){
	var inputPass = document.getElementById('confirmar_senha');
	
	var icon = document.getElementById('btn-senha-confirmar').querySelector('i'); 

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