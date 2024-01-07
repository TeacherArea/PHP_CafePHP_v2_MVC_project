import { openMenu, setupNavListeners } from './menu.js';
import { getApi } from './webapi.js';

getApi(); // För att användas i webbshopen, återkommer till detta.

document.addEventListener('DOMContentLoaded', function() {
    setupNavListeners();

    document.getElementById('linkEat').addEventListener('click', function(event) {
        openMenu(event, 'Eat');
    });

    document.getElementById('linkDrinks').addEventListener('click', function(event) {
        openMenu(event, 'Drinks');
    });

    openMenu({currentTarget: document.getElementById('linkEat')}, 'Eat');
});
