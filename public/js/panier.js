// const ClickAll = (element) => {
//     let current
//         element.addEventListener("click", (e) => {
//             current = e.currentTarget
//         })
//     console.log(current)
//     return current
// }

const [paniers,panier_content] = [document.querySelectorAll(".panier"),document.querySelector(".panier_content")]

paniers.forEach( (e) => {
    e.addEventListener("click", () => {

        if( panier_content.classList.contains("hidden") ){
            panier_content.classList.remove("hidden")
            panier_content.classList.add("fixed","flex")
        }else{
            panier_content.classList.remove("fixed","flex")
            panier_content.classList.add("hidden")
        }

    })
})

panier_content.addEventListener("click",(e) => {
    if(e.target === e.currentTarget){
        panier_content.classList.remove("fixed","flex")
        panier_content.classList.add("hidden")
    }
})

const nav = document.querySelector(".navlink")
const menu = document.querySelector(".menu")
const header = document.querySelector("header")


document.querySelector('#menuIcon').addEventListener('click', (e) => {
    const thisis = e.currentTarget
    thisis.classList.toggle('active');

    menu.classList.toggle("hidden")
    
});

const price = document.querySelectorAll(".price")
const [plus,moins] = [document.querySelectorAll(".plus"), document.querySelectorAll(".moins")] 
const [total,sousTotal] = [document.querySelector("#total"), document.querySelector("#sous_total")]

plus.forEach( (e)=>{
    e.addEventListener("click", function(){
        const parentArticle = this.closest('article')
        
        // Trouve les éléments product_number et price dans cet article
        const productNumberSpan = parentArticle.querySelector('.product_number')
        const priceSpan = parentArticle.querySelector('.price')

        // Incrémente le nombre de produits
        let currentNumber = parseInt(productNumberSpan.textContent, 10)
        productNumberSpan.textContent = currentNumber + 1
        const price = parseInt( priceSpan.textContent.replace(/\D/g, '') )
        // Met à jour le prix en fonction du nouveau nombre
        const newPrice = price * (currentNumber+1)
        sousTotal.textContent = newPrice.toLocaleString('fr-FR') + ' fcfa'
        total.textContent = newPrice.toLocaleString('fr-FR') + ' fcfa'
        
    })
} )

moins.forEach( (e)=>{
    e.addEventListener("click", function(){
        const parentDiv = this.closest('.flex');
        const productNumberSpan = parentDiv.querySelector('.product_number');
        let currentNumber = parseInt(productNumberSpan.textContent, 10);

        if( currentNumber > 0 ){
            productNumberSpan.textContent = currentNumber - 1;
        }
    })
} )