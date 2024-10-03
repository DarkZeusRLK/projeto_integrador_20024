// Função para mostrar a tabela de Usuários e esconder a de Hotéis
function showUsers() {
    document.getElementById('usuariosTable').style.display = 'block';
    document.getElementById('hoteisTable').style.display = 'none';
}

// Função para mostrar a tabela de Hotéis e esconder a de Usuários
function showHotels() {
    document.getElementById('usuariosTable').style.display = 'none';
    document.getElementById('hoteisTable').style.display = 'block';
}