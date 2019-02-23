var collectionHolder;

//setting up add another flavour button
var addFlavourButton = $('<button type="button" class="btn btn-info mt-1">Add  a flavour</button>');
// var newFlavourLink = $('<div></div>').append(addFlavourButton);

$(document).ready(function(){

    $('.order-button').click(function (){ 

        //to check atleast one flavour is selected
        if($('.card').length == 0){
            alert('Please select a flavour before submitting order');
            return false;
        }

        //to check if quantity has been entered for all selected flavours
        $(".item-cost").each(function() {
            if(this.value == 0 || this.value.trim() == ""){
                $(this).parent().parent().find('.item-quantity').focus();
                alert("Please select number of scoops");
                return false;
            }
        });
    });

    collectionHolder = $('#flavours');

    //append add new flavour button to collection holder
    collectionHolder.append(addFlavourButton);

    collectionHolder.data('index',collectionHolder.find('.card').length)
     
    collectionHolder.find('.card').each(function (){
        addRemoveButton($(this));
    });

    //trigger action for add new flavour button  
    addFlavourButton.click(function (e) {
        e.preventDefault();

        //create new form and append to collection holder
        addNewFlavourForm();

        $('.item-name').on('change',function(){
            autoPopulate(this);
        });

        $('.item-quantity').keyup(function(){
            autoPopulate(this); 
        });


    })

    
})

function addRemoveButton(card){
    
    // remove button
    var removeButton = $('<button type="button" class="btn btn-danger">Remove</button>');
    var cardFooter = $('<div class="card-footer"></div>').append(removeButton);
    card.append(cardFooter)
    //click event
    removeButton.click(function (e) {
        $(e.target).parents('.card').remove();
    })
}

function addNewFlavourForm(){ 
    //get prototype
    var prototype = collectionHolder.data('prototype');

    //get index of last flavour form
    var index = collectionHolder.data('index');
    //create flavour form
    var newFlavourForm = prototype;

    newFlavourForm = newFlavourForm.replace(/__name__/g,index);

    collectionHolder.data('index',index+1);
    
    //creating new card to be added as flavour
    var card =  $('<div class="card card-warning mt-1 w-50"><div class="card-header"></div></div>');

    //creating card body, then appending new flavourform
    var cardBody = $('<div class="card-body"></div>').append(newFlavourForm);

    //appending card body to card
    card.append(cardBody);

    //appending remove button to new card
    addRemoveButton(card);
    
    //append card before add new flavour button
    addFlavourButton.before(card)

    //appending card to collection holder
    // collectionHolder.append(card)
}

function autoPopulate(currentForm){
    
    var currentFlavourForm = $(currentForm).parent().parent();
    var itemPrice = currentFlavourForm.find('.item-name').val();
    var itemQuantity = currentFlavourForm.find('.item-quantity').val();
    var itemCost = itemPrice * itemQuantity;
    
    currentFlavourForm.find('.item-cost').val(itemCost);
}