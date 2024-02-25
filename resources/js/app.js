import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

Echo.channel('category_create').listen('.category_create', (e) => {
    alert("Create a new category: " + e.category.body);
})

Echo.channel('product_create').listen('.product_create', (e) => {
    alert("Create a new product: " + e.product.name);
})

Echo.channel('passport_create').listen('.passport_create', (e) => {
    alert("Create a new passport: " + e.passport.passportNumber);
})
