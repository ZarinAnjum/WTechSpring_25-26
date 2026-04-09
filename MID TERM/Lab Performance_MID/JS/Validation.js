console.log("Connected");

const unitPrice=1000;
const d=30;

const quantityInput=document.getElementById("quantity");
const totalPriceInput=document.getElementById("totalPrice");

function calculateTotal() {

    let quantity=parseInt(quantityInput.value);

    if (isNaN(quantity)) {
        quantity=0;
    }

    if (quantity<0) {
        alert("Quantity cannot be negative!");
        quantity=0;
        quantityInput.value=0;
    }

    let totalPrice=unitPrice*quantity*d;

    totalPriceInput.value=totalPrice;

    if (totalPrice>1000) {
        alert("Congratulations! You are eligible for a gift coupon.");
    }
}

quantityInput.addEventListener("input", calculateTotal);

