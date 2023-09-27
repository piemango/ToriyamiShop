/////////////////////link website///////////////////
import { image } from "./image.js";
window.onload = (event) => {
    const allproduct = document.getElementById('allproduct')
    const home = document.getElementById('home')
    const interest = document.getElementById('interest')
    const shoping = document.getElementById('shoping')
    const notifContainer = document.getElementById('notification-container')

    const recommendProducts = document.getElementsByClassName('recom-item scroll')[0].getElementsByClassName('item')
    const shoppingProducts = document.getElementsByClassName('recom-item scroll')[1].getElementsByClassName('item')
    const allProducts = document.getElementsByClassName('item')

    const contact = document.getElementById('contact')
    const interestBox = document.getElementsByClassName('recom-item scroll')[0]
    const shoppingBox = document.getElementsByClassName('recom-item scroll')[1]
    const buyingProducts = JSON.parse(localStorage.getItem('buyingProduct')) || {}
    const favoriteProducts = JSON.parse(localStorage.getItem('favoriteProduct')) || {}

    allproduct.addEventListener("click", () => {
        localStorage.setItem('favoriteProduct', JSON.stringify(favoriteProducts));
        localStorage.setItem('buyingProduct', JSON.stringify(buyingProducts));
        window.open('index.php#all-product', '_self')
    })
    home.addEventListener("click", () => {
        localStorage.setItem('favoriteProduct', JSON.stringify(favoriteProducts));
        localStorage.setItem('buyingProduct', JSON.stringify(buyingProducts));
        window.open('index.php', '_self')
    })
    interest.addEventListener("click", () => {
        window.open('index2.php#interest-product', '_self')
    })
    shoping.addEventListener("click", () => {
        // localStorage.removeItem('favoriteProduct')
        // localStorage.removeItem('buyingProduct')
        window.open('index2.php#shoping-list', '_self')
    })
    contact.addEventListener("click", () => {
        window.open('https://x.com/_toriyami_shop?t=OGaK8KjEjBnkila8owyLag&s=09', '_blank')
    })

    function addproduct(type, id, key){
        if (type == 1){
            const itemTemplate = `
            <div itemid="${id}" class="item">
                <div class="item-img">
                    <img src="${key}">
                </div>
                <div class="item-icon">
                    <div class="it-ic">
                        <i class="fi fi-rs-shopping-cart"></i>
                    </div>
                    <div class="it-ic">
                        <i class="fi fi-rr-heart"></i>
                    </div>
                </div>
            </div>
            `
            interestBox.innerHTML += itemTemplate;
        }else if(type == 2){
            const itemTemplate = `
            <div id="${id}" itemid="${id}" class="item">
                         <div class="item-img">
                                <img src="${key}">
                            </div>
                            <div class="item-icon">
                                <div class="it-ic">
                                    <i class="fi fi-br-cross"></i>
                                </div>
                                <div class="it-ic">
                                    <i class="fi fi-br-check"></i>
                                </div>
                            </div>
                        </div>
            `
            shoppingBox.innerHTML += itemTemplate;
        }
    }

    function setupRemoveIcon(){
        for (let index = 0; index < shoppingProducts.length; index++) {
            const element = shoppingProducts[index];
            const itemId = element.getAttribute('itemid');
    
            const removeIcon = element.getElementsByClassName('fi fi-br-cross')[0];
            removeIcon.addEventListener('click', () => {
                delete buyingProducts[itemId]
                addNotif('buy', "REMOVE FROM CART", itemId, Math.random()*1000)
                element.remove()
                console.log('delete ',itemId)
            });
        }
    }

    async function addNotif(type, text, itemId, id){
        const template = {
            fav: `
            <div id="notif-${id}" class="container-notif">
                <div class="icon-container">
                    <i class="fi fi-rr-heart"></i>
                </div>
                <div class="text-container">
                    <p class="fav">${text}</p>
                    <p class="itemid">${itemId}</p>
                </div>
            </div>
            `,
            buy: `
            <div id="notif-${id}" class="container-notif">
                <div class="icon-container">
                    <i class="fi fi-rs-shopping-cart"></i>
                </div>
                <div class="text-container">
                    <p class="fav">${text}</p>
                    <p class="itemid">${itemId}</p>
                </div>
            </div>
            `,
        }
        notifContainer.innerHTML += template[type]
        let notif = document.getElementById("notif-"+id)
        if (type == "buy"){
            // notif.getElementsByClassName('.fi fi-rs-shopping-cart').style.fontSize = '1rem'
        }
        setTimeout(() => {
            notif = document.getElementById("notif-"+id)
            notif.remove()
        }, 2000);
    }

    console.log('x')
    for (const key in favoriteProducts) {
        console.log(key)
        addproduct(1, key, favoriteProducts[key])
    }

    for (const key in buyingProducts) {
        console.log(key)
        addproduct(2, key, buyingProducts[key])
    }

    for (let index = 0; index < recommendProducts.length; index++) {
        const element = allProducts[index];
        const itemId = element.getAttribute('itemid');

        const heartIcon = element.querySelector('.fi-rr-heart');
        const shopIcon = element.getElementsByClassName('fi fi-rs-shopping-cart')[0]
        heartIcon.addEventListener('click', () => {
            if (!favoriteProducts[itemId]) {
                favoriteProducts[itemId] = element
                addNotif('fav', "FAVORITE", itemId, Math.random()*1000)
                console.log('favorite ', itemId)
            } else {
                element.remove()
                addNotif('fav', "UNFAVORITE", itemId, Math.random()*1000)
                delete favoriteProducts[itemId]
                console.log('unfavorite ', itemId)
            }
        });

        shopIcon.addEventListener('click', () => {
            if (!buyingProducts[itemId]){
                addproduct(2, itemId, favoriteProducts[itemId])
                setupRemoveIcon()
                addNotif('buy', "ADD TO CART", itemId, Math.random()*1000)
                buyingProducts[itemId] = itemId
                console.log('add to cart  ',itemId)
            }else{
                document.getElementById(itemId).remove()
                addNotif('buy', "REMOVE FROM CART", itemId, Math.random()*1000)
                delete buyingProducts[itemId]
                console.log('unadd to cart ',itemId)
            }
        });
    }

    setupRemoveIcon()

};
////////////////////////////////////////////////////