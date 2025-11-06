const registro = document.getElementById("formulario-registro");
const inputContrasena = document.querySelector('input[name="contraseña"]');
const mensajeValidacion = document.getElementById("mensaje-validacion");
const iconoOjo = document.querySelector('.contrasena .fa-eye-slash');

// Mostrar/Ocultar contraseña al hacer clic en el ícono del ojo
iconoOjo.addEventListener("click", () => {
    if (inputContrasena.type === "password") {
        inputContrasena.type = "text";
        iconoOjo.classList.remove("fa-eye-slash");
        iconoOjo.classList.add("fa-eye");
    } else {
        inputContrasena.type = "password";
        iconoOjo.classList.remove("fa-eye");
        iconoOjo.classList.add("fa-eye-slash");
    }
});

// Validar contraseña en tiempo real
inputContrasena.addEventListener("input", () => {
    const contrasena = inputContrasena.value;
    const regexContrasena = /^(?=.*[a-zA-Z])(?=.*[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]).{10,}$/;
    
    if (contrasena === "") {
        mensajeValidacion.textContent = "";
        mensajeValidacion.style.color = "";
    } else if (!regexContrasena.test(contrasena)) {
        mensajeValidacion.textContent = "La contraseña debe tener al menos 10 caracteres, incluir letras y al menos un carácter especial";
        mensajeValidacion.style.color = "red";
    } else {
        mensajeValidacion.textContent = "Contraseña válida";
        mensajeValidacion.style.color = "green";
    }
});

registro.addEventListener("submit", (e)=>{
    e.preventDefault(); 
    // Regex para validar nombre: solo letras, espacios, tildes, hasta 5 palabras
    // No permite números, caracteres especiales ni emojis
    const regexNombre = /^[a-záéíóúüñA-ZÁÉÍÓÚÜÑ]+(\s+[a-záéíóúüñA-ZÁÉÍÓÚÜÑ]+){0,2}$/;
    const regexApellido = /^[a-záéíóúüñA-ZÁÉÍÓÚÜÑ]+(\s+[a-záéíóúüñA-ZÁÉÍÓÚÜÑ]+){0,2}$/;
    const nombre = document.getElementById("nombre").value.trim();
    const apellido = document.getElementById("apellidos").value.trim();
    if (!regexNombre.test(nombre)) {
        alert("Nombre inválido. Solo se permiten letras (máximo 5 palabras), sin números ni caracteres especiales.");
        return false;
    }
    if (!regexApellido.test(apellido)) {
        alert("Apellido inválido. Solo se permiten letras (máximo 5 palabras), sin números ni caracteres especiales.");
        return false;
    }

    //Verificar que la matricula sea de una longitud de 7 numeros
    const matricula = document.getElementById("matricula").value.trim();
    const regexMatricula = /^\d{7}$/;
    if (!regexMatricula.test(matricula)) {
        alert("Matrícula inválida. Debe tener exactamente 7 números.");
        return false;
    }

    // Validar contraseña: al menos 10 caracteres, incluir letras y al menos un carácter especial
    const contrasena = document.querySelector('input[name="contraseña"]').value;
    const regexContrasena = /^(?=.*[a-zA-Z])(?=.*[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]).{10,}$/;
    
    if (!regexContrasena.test(contrasena)) {
        alert("Contraseña inválida. Debe tener al menos 10 caracteres, incluir letras y contener al menos un carácter especial.");
        return false;
    }

    // Si la validación es correcta, continuar con el envío
    console.log("Validación exitosa");
    registro.submit();
})