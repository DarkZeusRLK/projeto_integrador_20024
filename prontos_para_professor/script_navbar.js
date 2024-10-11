document.addEventListener('DOMContentLoaded', function() {
    // Seleciona o botão do menu e a sidebar
    const menuBtn = document.querySelector('.menu-btn');
    const sidebar = document.querySelector('.sidebar');
    const profileImg = document.querySelector('.profile img');
    const profileText = document.querySelector('.profile .text-logo');
    const navLinks = document.querySelectorAll('.nav-links li a span');
    const textTitle = document.querySelector('.text-title');
  
    // Adiciona um ouvinte de evento de clique ao botão do menu
    menuBtn.addEventListener('click', function() {
      // Alterna a classe 'expanded' na sidebar
      sidebar.classList.toggle('expanded');
  
      // Alterna a visibilidade da imagem do perfil e do texto
      if (sidebar.classList.contains('expanded')) {
        profileImg.style.display = 'block';
        profileText.style.display = 'block';
        navLinks.forEach(span => span.style.opacity = '1');
        textTitle.style.display = 'block'; // Mostra o título quando expandido
      } else {
        profileImg.style.display = 'none';
        profileText.style.display = 'none';
        navLinks.forEach(span => span.style.opacity = '0');
        textTitle.style.display = 'none'; // Oculta o título quando não expandido
      }
    });
  });
  