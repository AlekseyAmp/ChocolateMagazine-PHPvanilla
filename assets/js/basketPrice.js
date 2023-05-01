const incrementButtons = document.querySelectorAll('.increment');
const basketCards = document.querySelectorAll('.basket-card');

incrementButtons.forEach(button => {
    button.addEventListener('click', () => {
        const price = button.parentElement.parentElement.querySelector('.basket-price p');
        let currentPrice = parseInt(price.innerText.split(' ')[1]);
        currentPrice += 300;
        price.innerText = `Цена: ${currentPrice} руб.`;

        updateTotal();
    });
});

const decrementButtons = document.querySelectorAll('.decrement');

decrementButtons.forEach(button => {
    button.addEventListener('click', () => {
        const price = button.parentElement.parentElement.querySelector('.basket-price p');
        let currentPrice = parseInt(price.innerText.split(' ')[1]);
        if (currentPrice > 300) {
            currentPrice -= 300;
            price.innerText = `Цена: ${currentPrice} руб.`;

            updateTotal();
        }
    });
});

let total = 0;

basketCards.forEach(basketCard => {
    const count = parseInt(basketCard.querySelector('.count').textContent);
    const price = parseInt(basketCard.querySelector('.basket-price p').textContent.replace('Цена: ', ''));
    total += price;
});

function updateTotal() {
    let newTotal = 0;
    basketCards.forEach(basketCard => {
        const count = parseInt(basketCard.querySelector('.count').textContent);
        const price = parseInt(basketCard.querySelector('.basket-price p').textContent.replace('Цена: ', ''));
        newTotal += price;
    });
    total = newTotal;

    document.querySelector('.basket-total p span').textContent = `${total} руб.`;
}

updateTotal();
