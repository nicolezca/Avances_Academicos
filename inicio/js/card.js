document.addEventListener('DOMContentLoaded', () =>{

    const VerCard = document.getElementById("verCardExit");
    const card = document.getElementById("cardCerrar");

    card.style.top = '-50%';
    VerCard.addEventListener('click', () =>{
        if (card.style.top === "-50%") {
            card.style.top = "0";
        }else{
            card.style.top = "-50%";
        }
    })
})