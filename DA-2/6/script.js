var totalBill = 0;

function addItem(itemName, cost) {
    var checkboxes = document.getElementById('checkboxes');
    
    var checkbox = document.createElement('input');
    checkbox.type = 'checkbox';
    checkbox.name = itemName;
    checkbox.value = itemName;
    checkbox.id = itemName;

    var label = document.createElement('label');
    label.htmlFor = itemName;
    label.appendChild(document.createTextNode(itemName));

    var costSpan = document.createElement('span');
    costSpan.id = itemName + '-cost';
    costSpan.innerHTML = ' - Cost: $' + cost;

    checkbox.addEventListener('change', function() {
        if (this.checked) {
            totalBill += cost;
            updateTotalBill();
            checkboxes.appendChild(costSpan);
        } else {
            totalBill -= cost;
            updateTotalBill();
            costSpan.remove();
        }
    });

    checkboxes.appendChild(checkbox);
    checkboxes.appendChild(label);
    checkboxes.appendChild(document.createElement('br'));
}

function updateTotalBill() {
    var totalBillElement = document.getElementById('totalBill');
    totalBillElement.innerHTML = 'Total Bill: $' + totalBill;
}
