// Sélection des éléments du DOM
const paniers = document.querySelectorAll(".panier");
const panier_content = document.querySelector(".panier_content");
const panierButtons = document.querySelectorAll('.panier');
const menu = document.querySelector("#menuIcon")
menu.addEventListener("click", () => {
const navMobile = document.querySelector('.menu')
    if(menu.classList.contains("active")){

        menu.classList.remove("active")
        navMobile.classList.add("hidden")

    }else{
        menu.classList.add("active")
        navMobile.classList.remove("hidden")
    }

})

// Initialisation au chargement de la page
document.addEventListener('DOMContentLoaded', function() {
    initializeCart();
    setupAddToCartButton();
    setupPanierToggle();
    setupOutsideClickListener();
    setupMenuToggle(); // Ajout de la fonction pour afficher le menu
});

// Fonctions principales

/**
 * Initialise le panier en chargeant les données du localStorage
 * et met à jour le compteur du panier
 */
function initializeCart() {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    updateCartCount(cart.length);
}

/**
 * Configure les événements pour le bouton "Ajouter au panier"
 * et les boutons de sélection de taille
 */
function setupAddToCartButton() {
    if (document.querySelector('.add-to-cart')) {
        const addToCartButton = document.getElementById('add-to-cart');
        const sizeButtons = document.querySelectorAll('.size-button');
        let selectedSize = null;
        const productId = addToCartButton.dataset.productId;

        // Gestion des boutons de taille
        sizeButtons.forEach(button => {
            button.addEventListener('click', function() {
                selectSize(this, sizeButtons);
                selectedSize = this.dataset.size;
                updateAddToCartButton(productId, selectedSize);
            });
        });

        // Gestion du bouton "Ajouter au panier"
        addToCartButton.addEventListener('click', function() {
            if (selectedSize && !isProductInCart(productId, selectedSize)) {
                addToCart(productId, selectedSize);
                updateAddToCartButton(productId, selectedSize);
            }
        });

        // Initialisation de l'état du bouton
        updateAddToCartButton(productId, selectedSize);
    }
}

// Fonctions d'aide pour le panier

/**
 * Ajoute un produit au panier, met à jour le localStorage,
 * et déclenche les animations
 * @param {string} productId - L'ID du produit à ajouter
 * @param {string} size - La taille sélectionnée du produit
 */
function addToCart(productId, size) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    const existingProduct = cart.find(item => item.productId === productId && item.size === size);

    if (existingProduct) {
        existingProduct.quantity += 1; // Augmente la quantité si le produit existe déjà
    } else {
        cart.push({ productId, size, quantity: 1 }); // Ajoute le produit avec une quantité de 1
    }

    localStorage.setItem('cart', JSON.stringify(cart));

    animatePanier();
    updateCartCountWithAnimation(cart.length);
}

/**
 * Vérifie si un produit est déjà dans le panier
 * @param {string} productId - L'ID du produit à vérifier
 * @param {string} size - La taille du produit à vérifier
 * @returns {boolean} - Vrai si le produit est dans le panier, faux sinon
 */
function isProductInCart(productId, size) {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    return cart.some(item => item.productId === productId && item.size === size);
}

/**
 * Met à jour l'apparence du bouton "Ajouter au panier" en fonction de l'état
 * @param {string} productId - L'ID du produit
 * @param {string} selectedSize - La taille sélectionnée
 */
function updateAddToCartButton(productId, selectedSize) {
    const addToCartButton = document.getElementById('add-to-cart');
    if (selectedSize && !isProductInCart(productId, selectedSize)) {
        addToCartButton.classList.remove('bg-zinc-100');
        addToCartButton.classList.add('bg-[#FE6759]');
        addToCartButton.disabled = false;
    } else {
        addToCartButton.disabled = true;
        addToCartButton.classList.remove('bg-[#FE6759]');
        addToCartButton.classList.add('bg-zinc-100');
    }
}

// Fonctions d'animation et de mise à jour visuelle

/**
 * Anime l'icône du panier lors de l'ajout d'un produit
 */
function animatePanier() {
    paniers.forEach(panier => {
        panier.classList.add("animate-panier");
        setTimeout(() => {
            panier.classList.remove("animate-panier");
        }, 1000);
    });
}

/**
 * Met à jour le compteur du panier avec une animation
 * @param {number} count - Le nouveau nombre d'articles dans le panier
 */
function updateCartCountWithAnimation(count) {
    panierButtons.forEach(button => {
        let cartCount = getOrCreateCartCount(button);
        cartCount.textContent = count;
        cartCount.classList.remove('hidden');
        cartCount.classList.add("animate-bounce");
        setTimeout(() => {
            cartCount.classList.remove("animate-bounce");
        }, 1000);
    });
}

/**
 * Met à jour le compteur du panier sans animation
 * @param {number} count - Le nouveau nombre d'articles dans le panier
 */
function updateCartCount(count) {
    panierButtons.forEach(button => {
        let cartCount = getOrCreateCartCount(button);
        cartCount.textContent = count;
        cartCount.classList.remove('hidden');
    });
}

// Fonctions utilitaires

/**
 * Récupère ou crée l'élément de compteur du panier
 * @param {HTMLElement} button - Le bouton du panier
 * @returns {HTMLElement} - L'élément de compteur du panier
 */
function getOrCreateCartCount(button) {
    let cartCount = button.querySelector('.cart-count');
    if (!cartCount) {
        cartCount = document.createElement('span');
        cartCount.className = 'cart-count absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs';
        button.appendChild(cartCount);
    }
    return cartCount;
}

/**
 * Gère la sélection visuelle des boutons de taille
 * @param {HTMLElement} selectedButton - Le bouton de taille sélectionné
 * @param {NodeList} allButtons - Tous les boutons de taille
 */
function selectSize(selectedButton, allButtons) {
    allButtons.forEach(btn => btn.classList.remove('bg-[#FE6759]', 'text-white'));
    selectedButton.classList.add('bg-[#FE6759]', 'text-white');
}

// Fonctions de gestion du panier

/**
 * Configure l'affichage/masquage du panier lors du clic sur l'icône
 */
function setupPanierToggle() {
    paniers.forEach(panier => {
        panier.addEventListener('click', function(e) {
            e.preventDefault();
            togglePanierContent();
        });
    });
}

/**
 * Affiche ou masque le contenu du panier
 */
function togglePanierContent() {
    panier_content.classList.toggle('hidden');
    if (!panier_content.classList.contains('hidden')) {
        panier_content.classList.add('flex','fixed');
        updatePanierContent();
    } else {
        panier_content.classList.remove('flex','fixed');
    }
}

/**
 * Configure l'écouteur de clic en dehors du panier pour le fermer
 */
function setupOutsideClickListener() {
    document.addEventListener('click', function(event) {
        const panierContentFirstDiv = panier_content.querySelector('div');
        if (!panier_content.classList.contains('hidden') &&
            !panierContentFirstDiv.contains(event.target) &&
            !Array.from(paniers).some(panier => panier.contains(event.target))) {
            closePanierContent();
        }
    });
}

/**
 * Ferme le contenu du panier
 */
function closePanierContent() {
    panier_content.classList.add('hidden');
    panier_content.classList.remove('flex','fixed');
}

/**
 * Met à jour le contenu affiché dans le panier
 */
function updatePanierContent() {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    if (cart.length === 0) {
        panier_content.querySelector('div').innerHTML = '<p>Votre panier est vide</p>';
        updateTotalAndSubtotal(0, 0); // Met à jour le total et le sous-total
        return;
    }

    const apiUrl = `${window.location.protocol}//${window.location.host}/api/panier`; // URL de l'API
    fetch(apiUrl, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify(cart)
    })
    .then(response => {
        if (!response.ok) {
            return response.text().then(text => {
                throw new Error(`Erreur ${response.status}: ${text}`);
            });
        }
        return response.json();
    })
    .then(data => {
        const panierItemsDiv = document.querySelector('.panier-items');
        if (panierItemsDiv) {
            panierItemsDiv.innerHTML = data.map(item => {
                return `
                <article class="flex flex-col sm:flex-row justify-between items-center w-full bg-white border rounded-lg p-3 gap-2">
                    <div class="flex items-center gap-4">
                        <img class="size-12 object-contain" src="/${item.productmedia[0].path}" alt="${item.name}">
                        <div class="w-20">
                            <h1 class="truncate">${item.name}</h1>
                            <h1 class="font-bold">Taille: <span class="font-normal">${item.size}</span></h1>
                        </div>
                    </div>
                    <article class="flex flex-col justify-center items-center">
                        <span class="price font-bold">${item.price} fcfa</span>
                        <div class="flex gap-6">
                            <button class="moins px-2 rounded-full text-white" data-product-id="${item.id}" data-size="${item.size}">
                                <img class="min-w-[17px]" src="/moins.png" alt="">
                            </button>
                            <span class="product_number">${item.quantity}</span>
                            <button class="plus px-2 rounded-full text-white" data-product-id="${item.id}" data-size="${item.size}">
                                <img class="min-w-[17px]" src="/plus.png" alt="">
                            </button>
                            <button class="supprimer px-2 py-1 rounded-lg text-white bg-red-500" data-product-id="${item.id}" data-size="${item.size}">
                                Supprimer
                            </button>
                        </div>
                    </article>
                </article>
            `}).join('');

            // Ajout des gestionnaires d'événements
            addEventListenersToButtons();
            addEventListenersToRemoveButtons(); // Ajout de la fonction pour les boutons de suppression

            // Mise à jour du total et du sous-total
            updateTotalAndSubtotal(data);
        } else {
            console.error('L\'élément .panier-items n\'a pas été trouvé dans le DOM.');
        }
    })
    .catch(error => {
        console.error('Erreur lors de la récupération du panier:', error);
        panier_content.querySelector('div').innerHTML = '<p>Erreur lors du chargement du panier</p>';
    });
}

/**
 * Met à jour le total et le sous-total dans le panier
 * @param {Array} cartItems - Les articles du panier
 */
function updateTotalAndSubtotal(cartItems) {
    let sousTotal = 0;
    let fraisLivraison = 0; // Vous pouvez ajuster cela selon vos besoins

    cartItems.forEach(item => {
        sousTotal += item.price * item.quantity; // Calcule le sous-total
    });

    const total = sousTotal + fraisLivraison; // Calcule le total

    // Met à jour l'affichage
    document.getElementById('sous_total').textContent = `${sousTotal} fcfa`;
    document.getElementById('total').textContent = `${total} fcfa`;
}

/**
 * Ajoute des gestionnaires d'événements aux boutons
 */
function addEventListenersToButtons() {
    document.querySelectorAll('.plus').forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.dataset.productId;
            const size = this.dataset.size;
            updateProductQuantity(productId, size, 1);
            updatePanierContent(); // Met à jour le contenu du panier après ajout
        });
    });

    document.querySelectorAll('.moins').forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.dataset.productId;
            const size = this.dataset.size;
            updateProductQuantity(productId, size, -1);
            updatePanierContent(); // Met à jour le contenu du panier après retrait
        });
    });

    document.querySelectorAll('.supprimer').forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.dataset.productId;
            const size = this.dataset.size;
            removeProductFromCart(productId, size);
        });
    });
}

/**
 * Ajoute des gestionnaires d'événements aux boutons de suppression
 */
function addEventListenersToRemoveButtons() {
    document.querySelectorAll('.supprimer').forEach(button => {
        button.addEventListener('click', function(event) {
            event.stopPropagation(); // Empêche la propagation de l'événement
            const productId = this.dataset.productId;
            const size = this.dataset.size;
            removeProductFromCart(productId, size); // Appelle la fonction pour supprimer le produit
        });
    });
}

/**
 * Met à jour la quantité d'un produit dans le panier
 * @param {string} productId - L'ID du produit
 * @param {string} size - La taille du produit
 * @param {number} change - La quantité à ajouter ou à soustraire
 */
function updateProductQuantity(productId, size, change) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    const product = cart.find(item => item.productId === productId && item.size === size);

    if (product) {
        if (product.quantity > 1 || change > 0) { // Empêche la réduction si la quantité est 1
            product.quantity += change; // Met à jour la quantité
        }
    }

    localStorage.setItem('cart', JSON.stringify(cart));
    updateCartCount(cart.length);
    updatePanierContent(); // Met à jour le contenu du panier après modification
    updateTotalAndSubtotal(cart); // Met à jour le total et le sous-total après modification
}

/**
 * Supprime un produit du panier
 * @param {string} productId - L'ID du produit
 * @param {string} size - La taille du produit
 */
function removeProductFromCart(productId, size) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    cart = cart.filter(item => !(item.productId === productId && item.size === size));
    localStorage.setItem('cart', JSON.stringify(cart));
    updateCartCount(cart.length);
    updatePanierContent(); // Met à jour le contenu du panier après suppression
    updateTotalAndSubtotal(cart); // Met à jour le total et le sous-total après suppression
}

