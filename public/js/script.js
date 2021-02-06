$(document).ready(function(){
    //get total price
    let totalPrice = (table) =>{
        let price = 0;
        table.find('.price').each(function(){
            price += parseInt($(this).text());
        })
        return price;
    }
    $('.total-price').text(totalPrice($('.cart-list')) + '$' )

    //delete from cart
    $('.delete-from-cart').on('click', function(){
        const id = $(this).data('id');
        const row = $(this).parents('tr');
        const tbody = row.parent();
        let nbrItems = $('.nbr_items').text();
        const nbr = $('.nbr_items');
        $.ajax({
            url: "/ajax",
            method : "post",
            data: {id:id},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data){
                row.remove();
                nbr.text(--nbrItems);
                $('.total-price').text(totalPrice($('.cart-list')) + '$' )
                if(nbrItems == 0){
                    tbody.append(`<tr>
                                        <td colspan="6" class="text-center text-danger">
                                            You don't have any item in your cart
                                        </td>
                                        </tr>`);
                    $('.total-price').parent().remove();
                    $('.order-btn').remove();
                }
                //update total price
            },
            error: function(a,b,c){
                console.log(a);
            }
        })
    })
})