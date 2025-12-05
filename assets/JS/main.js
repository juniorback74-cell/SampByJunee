// Llama al PHP para obtener datos del jugador
fetch('api_player.php')
    .then(res => res.json())
    .then(datos => {
        if(datos.error) {
            alert(datos.error);
            return;
        }

        // Aquí usamos los datos reales que devuelve PHP
        const userData = {
            username: datos.username,
            coins: datos.coins,
            dinero: datos.dinero,
            level: datos.level,
            hambre: datos.hambre,
            sed: datos.sed,
            vida: datos.vida,
            armadura: datos.armadura,
            skinid: datos.skin
        };

        // Actualizar campos del dashboard
        document.getElementById('nombre').textContent = "Nombre del Jugador: " + userData.username;
        document.getElementById('coins').textContent = "Monedas: " + userData.coins;
        document.getElementById('dinero').textContent = "Dinero en Mano: " + userData.dinero;
        document.getElementById('nivel').textContent = "Nivel: " + userData.level;
        document.getElementById('hambre').value = userData.hambre;
        document.getElementById('sed').value = userData.sed;
        document.getElementById('vida').value = userData.vida;
        document.getElementById('armadura').value = userData.armadura;

        // Cambiar imagen de skin según skinid
        const skinImg = document.getElementById('skin-img');
        skinImg.src = `skins/${userData.skinid}.png`;
    })
    .catch(err => console.error('Error al obtener datos del jugador:', err));
