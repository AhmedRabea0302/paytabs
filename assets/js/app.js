// Get MAin Category and Select Boxes Container
let selectBoxes    = Array.from(document.querySelectorAll('select[name="selectbox"]'));
let boxesContainer = document.querySelector('.boxes .main-box');

// Reset Button
let resetButton = document.querySelector('.reset'); 

// Iterate on Select boxes
function iterateBoxes() {
    selectBoxes.forEach(box => {
        box.addEventListener('change', event => {
            let selectedCat = event.target;
            let selectedCatValue = selectedCat.value;
            let parentId = selectedCat.options[selectedCat.selectedIndex].getAttribute('data-id');
        
            console.log(parentId);
            if(selectedCat.value != '') {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    data: { selectedCatValue, parentId },
                    url: '/add-categories',
                    success: response => {
                        console.log(response);
                        updateView(response);
                    },
            
                    error: error => {
                        console.log(error);
                    }
                });
            }
           
        });
    });
}

// Update View Function
function updateView(boxOptions) {
    let newSelectBox = document.createElement('select');
    newSelectBox.setAttribute('class', 'form-control');
    newSelectBox.setAttribute('name', 'selectbox');
    newSelectBox.innerHTML = `
        <option value=""></option>
    `;
    boxOptions.forEach(o => {
        newSelectBox.innerHTML += `
            <option value='${o.cat_name}' data-id='${o.id}'>${o.cat_name}</option>
        `;
    });
    selectBoxes.push(newSelectBox);
    $(boxesContainer).append(newSelectBox).ready(function() {
        iterateBoxes();
    });
    console.log(selectBoxes);
}

// Call Iterate boxes function
iterateBoxes();

// On Calling reset Button
resetButton.addEventListener('click', event => {
    let alertMessage = document.querySelector('.alert.alert-success');
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        url: '/delete-categories',
        success: response => {
            alertMessage.style.display = 'block';
            setTimeout(function() {
                location.reload();
            }, 1700);
        },

        error: error => {
            console.log(error);
        }
    });
});