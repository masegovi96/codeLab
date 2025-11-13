      const form = document.getElementById('loginForm');
      const passwordInput = document.getElementById('contrasena');
      const passwordError = document.getElementById('passwordError');
      const passwordGroup = document.getElementById('passwordGroup');

      // Validación en tiempo real
      passwordInput.addEventListener('input', function() {
        validatePassword(this.value, false);
      });

      // Validación al enviar el formulario
      form.addEventListener('submit', function(e) {
        const isValid = validatePassword(passwordInput.value, true);
        if (!isValid) {
          e.preventDefault();
        }
      });

      function validatePassword(password, showError) {
        // Validar longitud mínima de 8 caracteres
        const hasMinLength = password.length >= 8;
        // Validar al menos 1 número
        const hasNumber = /\d/.test(password);
        // Validar al menos 1 carácter especial
        const hasSpecialChar = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(password);

        const isValid = hasMinLength && hasNumber && hasSpecialChar;

        if (showError && !isValid) {
          let errorMsg = 'La contraseña debe tener: ';
          let errors = [];
          
          if (!hasMinLength) errors.push('mínimo 8 caracteres');
          if (!hasNumber) errors.push('al menos 1 número');
          if (!hasSpecialChar) errors.push('al menos 1 carácter especial');
          
          errorMsg += errors.join(', ');
          passwordError.textContent = errorMsg;
          passwordError.style.display = 'block';
          passwordGroup.style.borderColor = '#e53e3e';
        } else if (password.length > 0 && !isValid) {
          // Mostrar error suave mientras escribe
          passwordGroup.style.borderColor = '#fc8181';
        } else {
          passwordError.textContent = '';
          passwordError.style.display = 'none';
          passwordGroup.style.borderColor = isValid ? '#48bb78' : '#e0e0e0';
        }

        return isValid;
      }
