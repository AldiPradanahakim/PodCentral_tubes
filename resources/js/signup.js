document.getElementById('signup-form').addEventListener('submit', function(event) {
    event.preventDefault(); 

    const name = document.getElementById('name').value.trim();
    const email = document.getElementById('email2').value.trim();
    const password = document.getElementById('password2').value;
    const confirmPassword = document.getElementById('confirm-password').value;

    const simulatedName = 'Robi';
    const simulatedEmail = 'robi@gmail.com';
    const simulatedPassword = '123';

    if (name !== simulatedName || email !== simulatedEmail || password !== simulatedPassword) {
        alert('Registration failed! Please check your input.');
        return;
    }

    if (password !== confirmPassword) {
        alert('Passwords do not match!');
        return;
    }

    alert('Registration successful! Redirecting to genre page...');
    window.location.href = '/genre'; 
});
