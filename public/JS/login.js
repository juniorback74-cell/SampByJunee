document.getElementById('loginForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const name = document.getElementById('name').value;
    const password = document.getElementById('password').value;
//Llamando validar para que valide la validacion
    fetch('./conf/verificar.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ name, password })
    })
    .then(res => res.json())
    .then(data => {
        if(data.success){
            window.location.href = 'dashboard.html';
        } else {
            document.getElementById('mensaje').textContent = data.error;
        }
    })
    .catch(err => console.error('Error:', err));
});
