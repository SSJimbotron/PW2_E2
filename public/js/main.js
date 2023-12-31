import { createApp, ref } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js'
import * as app from './app.js'


const root = {
    setup() {
        return app
    }
}

createApp(root).mount("#app")
document.addEventListener('DOMContentLoaded', function () {
    const buttons = document.querySelectorAll('.charger .voir-plus');

    buttons.forEach(button => {
        button.addEventListener('click', () => {
            const cardInfo = button.closest('.carte-information');
            const intro = cardInfo.querySelector('.intro');
            const content = cardInfo.querySelector('.contenu');
            const currentState = cardInfo.getAttribute('data-state');

            if (currentState === 'hidden') {
                cardInfo.setAttribute('data-state', 'visible');
                intro.style.display = 'none';
                content.style.display = 'block';
                button.textContent = 'Masquer';
            } else {
                cardInfo.setAttribute('data-state', 'hidden');
                intro.style.display = 'block';
                content.style.display = 'none';
                button.textContent = 'Voir plus';
            }
        });
    });
});
