var token = "{{ csrf_token() }}";
$(document).ready(function(){
    //get base URL *********************
    var url = $('#url').val();
    var product_id = 0;

    //display modal form for creating new product *********************
    $(document).on('click','.open_modal',function(){
        $('#btn-save').html('update');
        $('#exampleModal').modal('show');

        $('#frmProducts').trigger("reset");
    });
    $(document).on('click','.btn_add',function(){
        $('#btn-save').html('add');
        $('#exampleModal').modal('show');
        $('#frmProducts').trigger("reset");

    });


    //display modal form for product EDIT ***************************
    $(document).on('click','.open_modal',function(){
        product_id = $(this).attr('value');

        // Populate Data in Edit Modal Form
        $.ajax({
            type: "GET",
            url: url + '/' + product_id,
            success: function (data) {
                $('#name').val(data.ten);
                $('#price').val(data.gia);
                $('#quantity').val(data.sl);
                $('#exampleModal').modal('show');

            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });



    //create new product / update existing product ***************************
    $("#btn-save").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        e.preventDefault();
        var formData = {
            ten: $('#name').val(),
            gia: $('#price').val(),
            sl:  $('#quantity').val(),
            category: $('#category option').attr('value'),
            oem: $('#oem option').attr('value'),

        }
        console.log(formData);
        //used to determine the http verb to use [add=POST], [update=PUT]
        var state = $('#btn-save').text();
        var type = "POST";
        var my_url = url;
        if (state == "update"){
            type = "PUT";
            my_url += '/' + product_id;
        }
        $.ajax({
            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
                var product = '<tr id="product' + product_id + '"><td>' + product_id + '</td><td>' + '<a class="open_modal" value='+ product_id +'>' + data.ten +'</a>'+ '</td><td>' + data.gia + '</td><td>'+ data.sl + '</td><td>'+ data.category + '</td><td>'+ data.oem + '</td>';
                product += '<td class="text-center"><i class="fa fa-trash delete-item" value="{{$pro->id}}" aria-hidden="true"></i></td>';
                product += '</tr>';
                if (state == "add"){ //if user added a new record
                    $('#products-list').append(product);
                }else{ //if user updated an existing record
                    $("#product" + product_id).replaceWith( product );
                }
                $('#frmProducts').trigger("reset");
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
        $('#exampleModal').modal('hide');

    });


    //delete product and remove it from TABLE list ***************************
    $(document).on('click','.delete-item',function(){
        var product_id = $(this).attr('value');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $.ajax({
            type: "DELETE",
            url: url + '/' + product_id,
            success: function (data) {
                $("#product" + product_id).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

});