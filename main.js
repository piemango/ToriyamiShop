/////////////////////link website///////////////////
window.onload = (event) => {

    const allproduct = document.getElementById('allproduct')
    const home = document.getElementById('home')
    const interest = document.getElementById('interest')
    const shoping = document.getElementById('shoping')
    const notifContainer = document.getElementById('notification-container')

    const recommendProducts = document.querySelector('.recom-item').getElementsByClassName('item')
    const allProducts = document.getElementsByClassName('item')
    console.log(allProducts)
    console.log(recommendProducts)
    const contact = document.getElementById('contact')

    let buyingProducts = JSON.parse(localStorage.getItem('buyingProduct')) || {}
    let favoriteProducts = JSON.parse(localStorage.getItem('favoriteProduct')) || {}

    allproduct.addEventListener("click", () => {
        window.open('index.php#all-product', '_self')
    })
    home.addEventListener("click", () => {
        window.open('index.php', '_self')
    })
    interest.addEventListener("click", () => {
        localStorage.setItem('favoriteProduct', JSON.stringify(favoriteProducts));
        localStorage.setItem('buyingProduct', JSON.stringify(buyingProducts));
        window.open('index2.php#interest-product', '_self')
    })
    shoping.addEventListener("click", () => {
        localStorage.setItem('favoriteProduct', JSON.stringify(favoriteProducts));
        localStorage.setItem('buyingProduct', JSON.stringify(buyingProducts));
        window.open('index2.php#shoping-list', '_self')
    })
    contact.addEventListener("click", () => {
        window.open('https://x.com/_toriyami_shop?t=OGaK8KjEjBnkila8owyLag&s=09', '_blank')
    })

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

    for (let index = 0; index < allProducts.length; index++) {
        const element = allProducts[index];
        const itemId = element.getAttribute('itemid')
        const heartIcon = element.querySelector('.fi-rr-heart')
        const shopIcon = element.getElementsByClassName('fi fi-rs-shopping-cart')[0]
        let img = element.getElementsByTagName('img')[0]

        console.log(img.src)

        heartIcon.addEventListener('click', () => {
            if (!favoriteProducts[itemId]){
                favoriteProducts[itemId] = img.src
                addNotif('fav', "FAVORITE", itemId, Math.random()*1000)
                console.log('favorite ',itemId)
            }else{
                delete favoriteProducts[itemId]
                addNotif('fav', "UNFAVORITE", itemId, Math.random()*1000)
                console.log('unfavorite ',itemId)
            }
        });

        shopIcon.addEventListener('click', () => {
            if (!buyingProducts[itemId]){
                buyingProducts[itemId] = img.src
                addNotif('buy', "ADD TO CART", itemId, Math.random()*1000)
                console.log('add to cart  ',itemId)
            }else{
                delete buyingProducts[itemId]
                addNotif('buy', "REMOVE FROM CART", itemId, Math.random()*1000)
                console.log('unadd to cart ',itemId)
            }
        });
    }

};
////////////////////////////////////////////////////