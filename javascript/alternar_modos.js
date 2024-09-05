document.addEventListener("DOMContentLoaded", () => {
  const themeToggle = document.getElementById("theme-toggle");
  const dayIcon = document.getElementById("day-icon");
  const nightIcon = document.getElementById("night-icon");
  const body = document.body;
  const footer = document.querySelector("footer");

  // Checar se o modo noite está ativado
  if (localStorage.getItem("theme") === "night") {
    body.classList.add("night-mode");
    removeBackgroundImage(); // Remover imagem de fundo
    themeToggle.checked = true; // Manter o botão marcado no modo noite
    removeFooterBackground(); // Remover background-color do rodapé no modo noite
  }

  themeToggle.addEventListener("change", () => {
    if (themeToggle.checked) {
      body.classList.add("night-mode");
      localStorage.setItem("theme", "night");
      removeBackgroundImage(); // Remover imagem de fundo
      removeFooterBackground(); // Remover background-color do rodapé no modo noite
    } else {
      body.classList.remove("night-mode");
      localStorage.setItem("theme", "day");
      restoreBackgroundImage(); // Restaurar imagem de fundo
      restoreFooterBackground(); // Restaurar background-color do rodapé no modo dia
    }
  });

  function removeBackgroundImage() {
    body.style.backgroundImage = "none"; // Remove a imagem de fundo
  }

  function restoreBackgroundImage() {
    body.style.backgroundImage = "url('Imagens/Vegetação2.gif')"; // Restaura a imagem de fundo
  }

  function removeFooterBackground() {
    footer.style.backgroundColor = "unset"; // Remove a cor de fundo do rodapé
  }

  function restoreFooterBackground() {
    footer.style.backgroundColor = "#1e1e1e"; // Define uma cor de fundo escura padrão no modo dia
  }
});

// Função para alternar a visibilidade da navbar e do botão de alternância de modo
function toggleSidebar() {
  const sidebar = document.querySelector(".sidebar");
  sidebar.classList.toggle("navbar-open"); // Adiciona ou remove a classe 'navbar-open'
}
