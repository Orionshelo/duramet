function showPopup() {
    console.log("Función showPopup llamada");
    const popup = document.getElementById('successPopup');
    popup.style.display = 'block';
    
    // Cerrar automáticamente después de 3 segundos
    setTimeout(() => {
        closePopup();
    }, 3000);
}

function closePopup() {
    const popup = document.getElementById('successPopup');
    popup.style.display = 'none';
}

document.addEventListener('DOMContentLoaded', function() {
    console.log("showPopupValue:", showPopupValue);  // Para depuración
    if (showPopupValue) {
        showPopup();
    }
});
