/* Filter */
$('body').on('change', '.w_sidebar input', function(){
    let checked = $('.w_sidebar input:checked'),
        data = '';
        checked.each(function(){
        data += this.value + ',';
    });
    if(data){
        $.ajax({
            url: location.href,
            data: {filter: data},
            type: 'GET',
            beforeSend: function(){
                $('.preloader').fadeIn(300, function(){
                    $('.product-one').hide();
                });
            },
            success: function(res){
                $('.preloader').delay(300).fadeOut('slow', function(){
                    $('.product-one').html(res).fadeIn();
                });
            },
            error: function(){
                alert('Error!!');
            }
        });
    }else{
        window.location = location.pathname;
    }
});
// End filter
// Search 
let products = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.whitespace,
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    remote: {
        wildcard: '%QUERY',
        url: path + '/search/typeahead?query=%QUERY'
    }
});

products.initialize();

$("#typeahead").typeahead({
    hint: false,
    highlight: true
},
{
    name: 'products',
    display: 'title',
    limit: 10,
    source: products
});

$("#typeahead").bind('typeahead:select', function(ev, suggestion){
    window.location = path + '/search/?s=' + encodeURIComponent(suggestion.title);
});
// End search
// Cart 
$('body').on('click', '.add-to-cart-link', function(e){
    e.preventDefault();
    let id = $(this).data('id'),
        qty = $('.quantity input').val() && $(this).data('id') == $('.quantity input').data('id') ? $('.quantity input').val() : 1,
        mod = $(this).data('id') == $('.available select').data('id') ? $('.available select').val() : null;
    $.ajax({
        url: '/cart/add',
        data: {id: id, qty: qty, mod: mod},
        type: 'GET',
        success: function(res){
            showCart(res);
        },
        error: function(){
            alert('ERROR! Please try again later...');
        }
    });
});

$('#cart .modal-body').on('click', '.del-item', function(){
    let id = $(this).data('id');
    $.ajax({
        url: '/cart/delete',
        data: {id: id},
        type: 'GET',
        success: function(res){
            showCart(res);
        },
        error: function(){
            alert('ERROR! Please try again later...');
        }
    })
});

function showCart(cart){
    if($.trim(cart) == '<h3>Shopping cart is empty!</h3>'){
        $('#cart .modal-footer a, #cart .modal-footer .btn-danger').css('display', 'none');
    }else{
        $('#cart .modal-footer a, #cart .modal-footer .btn-danger').css('display', 'inline-block');
    }
    $('#cart .modal-body').html(cart);
    $('#cart').modal();
    if($('.cart-sum').text()){
        $('.simpleCart_total').html($('#cart .cart-sum').text());
    }else{
        $('.simpleCart_total').text('Empty Cart');
    }
}

function getCart(){
    $.ajax({
        url: '/cart/show',
        type: 'GET',
        success: function(res){
            showCart(res);
        },
        error: function(){
            alert('ERROR! Please try again later...');
        }
    });
}

function clearCart(){
    $.ajax({
        url: '/cart/clear',
        type: 'GET',
        success: function(res){
            showCart(res);
        },
        error: function(){
            alert('ERROR! Please try again later...');
        }
    });
}
// End Cart 
// Change currency 
$('#currency').change(function(){
    window.location = 'currency/change?curr=' + $(this).val();
});
// End change currency
// Change mods
$('.available select').on('change', function(){
    let modId = $(this).val(),
        color = $(this).find('option').filter(':selected').data('title'),
        price = $(this).find('option').filter(':selected').data('price'),
        basePrice = $('#base-price').data('base');
    if(price){
        $('#base-price').html(symbolLeft + price + symbolRight);
    }else{
        $('#base-price').html(symbolLeft + basePrice + symbolRight);
    }
});
// End change mods
// Change language
$('#languages').change(function(){
    //const lang_code = $(this).data('langcode');
    window.location = 'language/change?lang=' + $(this).val();
});
// End change language