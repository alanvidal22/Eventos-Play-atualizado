document.addEventListener("DOMContentLoaded", function() {
    // Simula um tempo de carregamento
    setTimeout(function() {
        // Remove o splash screen
        var splashScreen = document.getElementById("splash-screen");
        splashScreen.parentNode.removeChild(splashScreen);
    }, 2000); // Tempo em milissegundos
});