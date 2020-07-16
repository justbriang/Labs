// const xhr = new XMLHttpRequest();
$(document).ready(function() {
    $('#btn-place-order').click(function(event) {
        event.preventDefault();

        var name_of_food = $('#name_of_food').val();
        var number_of_units = $('#number_of_units').val();
        var unit_price = $('#unit_price').val();
        var order_status = $('#order_status').val();

        $.ajax({
            url: "http://localhost/labs/lab1/api/v1/orders/index.php",
            type: "POST",
            data: {
                 name_of_food:name_of_food,
                 number_of_units:number_of_units,
                 unit_price:unit_price,
                 order_status:order_status },
            headers: {'Authorization':'Basic 58GmahPdIa627FUN70QKfTMwixaHXy2jgFIZ1ZkGnZJMrQmmtnXeCaIn4QCuzLfp'}
            ,
            success: function (data) {
                alert(data['message']);
            },
            error: function() {
                alert("An error occurred");
            }
        });
    });


    $('#btn-check-status').click(function(event) {
        event.preventDefault();

        var order_id = $('#order_id').val();

        $.ajax({
            url: "http://localhost/labs/lab1/api/v1/orders/index.php",
            type: "GET",
            data: { 
                order_id:order_id 
            },
            headers: {'Authorization':'Basic 58GmahPdIa627FUN70QKfTMwixaHXy2jgFIZ1ZkGnZJMrQmmtnXeCaIn4QCuzLfp'},
            success: function (data) {
                alert(data['message']);
            },
            error: function() {
                alert("An error occurred");
            }
        });
    });
});