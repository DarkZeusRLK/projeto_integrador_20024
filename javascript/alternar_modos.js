document.addEventListener("DOMContentLoaded", () => {
  const themeToggle = document.getElementById("theme-toggle");
  const body = document.body;

  // Verificar o tema salvo no localStorage
  const savedTheme = localStorage.getItem("theme");
  if (savedTheme === "dark") {
    enableDarkMode();
    themeToggle.checked = true;
  } else {
    disableDarkMode();
  }

  // Alternar entre os modos
  themeToggle.addEventListener("change", () => {
    if (themeToggle.checked) {
      enableDarkMode();
    } else {
      disableDarkMode();
    }
  });

  // Formulário de alteração de imagem de fundo
  const backgroundForm = document.getElementById("background-form");
  backgroundForm.addEventListener("submit", (e) => {
    e.preventDefault();
    const backgroundSelect = document.getElementById("background-select").value;
    localStorage.setItem("backgroundImage", backgroundSelect);
    alert("Imagem de fundo salva com sucesso!");
  });

  // Aplicar imagem de fundo salva
  const savedBackground = localStorage.getItem("backgroundImage");
  if (savedBackground) {
    body.style.backgroundImage = `url(${savedBackground})`;
  }


  // Salvar e aplicar tamanho da fonte
  const fontSizeSelect = document.getElementById("font-size-select");
  const saveFontSizeButton = document.getElementById("save-font-size");

  if (localStorage.getItem("fontSize")) {
    document.documentElement.style.fontSize = localStorage.getItem("fontSize");
    if (fontSizeSelect) {
      fontSizeSelect.value = localStorage.getItem("fontSize");
    }
  }

  if (saveFontSizeButton) {
    saveFontSizeButton.addEventListener("click", () => {
      const selectedFontSize = fontSizeSelect.value;
      document.documentElement.style.fontSize = selectedFontSize;
      localStorage.setItem("fontSize", selectedFontSize);
    });
  }
});

// Função para aplicar o modo escuro
function enableDarkMode() {
  document.body.classList.add('dark-mode');
  localStorage.setItem('theme', 'dark'); // Salva a preferência do usuário
}

// Função para aplicar o modo claro
function disableDarkMode() {
  document.body.classList.remove('dark-mode');
  localStorage.setItem('theme', 'light'); // Salva a preferência do usuário
}
