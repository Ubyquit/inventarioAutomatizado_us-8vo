// Cambiar entre formularios de inicio de sesión y registro
function toggleForms() {
    const loginForm = document.getElementById('login');
    const registerForm = document.getElementById('register');
    
    if (loginForm.style.display === 'none') {
        loginForm.style.display = 'block';
        registerForm.style.display = 'none';
    } else {
        loginForm.style.display = 'none';
        registerForm.style.display = 'block';
    }
}
