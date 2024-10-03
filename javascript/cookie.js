    document.addEventListener("DOMContentLoaded", function() {
        const cookieMessage = document.getElementById('cookie-message');
        const acceptCookies = document.getElementById('accept-cookies');
        const declineCookies = document.getElementById('decline-cookies');

        // Função para verificar se o cookie de aceitação existe e se passou 3 horas
        function shouldShowCookieMessage() {
            const cookieConsent = document.cookie.split('; ').find(row => row.startsWith('cookieConsent='));
            if (!cookieConsent) return true;

            const consentTime = parseInt(cookieConsent.split('=')[1]);
            const currentTime = Date.now();
            return (currentTime - consentTime) > 3 * 60 * 60 * 1000; // 3 horas em milissegundos
        }

        // Função para definir o cookie de aceitação
        function setCookieConsent() {
            const currentTime = Date.now();
            document.cookie = `cookieConsent=${currentTime}; max-age=31536000; path=/`;
        }

        // Mostrar a mensagem se o cookie de consentimento não existir ou se passaram 3 horas
        if (shouldShowCookieMessage()) {
            cookieMessage.style.display = 'flex'; // Mostrar a mensagem
        }

        // Configurar os eventos dos botões
        acceptCookies.addEventListener('click', () => {
            setCookieConsent();
            cookieMessage.style.display = 'none'; // Esconder a mensagem
        });

        declineCookies.addEventListener('click', () => {
            cookieMessage.style.display = 'none'; // Esconder a mensagem
        });
    });
