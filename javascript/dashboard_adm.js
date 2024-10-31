function showUsers() {
    document.getElementById('usuariosTable').style.display = 'block';
    document.getElementById('hoteisTable').style.display = 'none';
    document.getElementById('mensagensTable').style.display = 'none';
}

function showHotels() {
    document.getElementById('usuariosTable').style.display = 'none';
    document.getElementById('hoteisTable').style.display = 'block';
    document.getElementById('mensagensTable').style.display = 'none';
}

function showMensagens() {
    document.getElementById('usuariosTable').style.display = 'none';
    document.getElementById('hoteisTable').style.display = 'none';
    document.getElementById('mensagensTable').style.display = 'block';
}