document.addEventListener("DOMContentLoaded", () => {
  const themeToggle = document.getElementById("theme-toggle");
  const body = document.body;

  // Checar o modo atual e aplicar
  if (localStorage.getItem("theme") === "night") {
    body.classList.add("night-mode");
    themeToggle.checked = true;
  }

  // Alternar modo dia/noite
  themeToggle.addEventListener("change", () => {
    if (themeToggle.checked) {
      body.classList.add("night-mode");
      localStorage.setItem("theme", "night");
    } else {
      body.classList.remove("night-mode");
      localStorage.setItem("theme", "day");
    }
  });
  // Salvar tamanho da fonte
  const fontSizeSelect = document.getElementById("font-size-select");
  const saveFontSizeButton = document.getElementById("save-font-size");

  // Verificar tamanho da fonte no localStorage
  if (localStorage.getItem("fontSize")) {
    document.documentElement.style.fontSize = localStorage.getItem("fontSize");
    fontSizeSelect.value = localStorage.getItem("fontSize");
  }

  saveFontSizeButton.addEventListener("click", () => {
    const selectedFontSize = fontSizeSelect.value;
    document.documentElement.style.fontSize = selectedFontSize;
    localStorage.setItem("fontSize", selectedFontSize);
  });
});
