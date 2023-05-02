let counters = document.querySelectorAll('.count');
let productCount = document.querySelector('#product_count');
counters.forEach(counter => {
    let incrementButton = counter.nextElementSibling;
    let decrementButton = counter.previousElementSibling;

    incrementButton.addEventListener('click', () => {
        counter.textContent++;
        productCount.value = counter.textContent;
    });

    decrementButton.addEventListener('click', () => {
        if (counter.textContent > 1) {
            counter.textContent--;
            productCount.value = counter.textContent;
        }
    });
});
