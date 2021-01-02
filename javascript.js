$(document).ready(function(){

    $("#addProduct2").on('click', function(){
        $("#addModal").modal('show');
    });
    
    $("#add_product").on('click', function(){
        $("#addModal").modal('show');
    });

    $("#deleteproduct").on('click', function(){
        alert("Are you sure?");
    });

  $('#editproduct').on('click', function(){
        $("#editModal").modal('show');
        
             /* $tr = $(this).closest('tr'); // definisce il parent di tr
            
            var data = $tr.children('td').map(function(){
                return $this.text();
            }).get();

            console.log(data);

            $('#id').val(data[0]);
            $('#name').val(data[1]);
            $('#price').val(data[2]);*/
    });

    $('#action').on('click', function(){

        var Id = $('#id').val();
        var name = $('#name').val();
        var price = $('#price').val();

        if(ID == "" | Name == "" | price == ""){
            $('.message_error').html('Error');
        }
    });

    //$('product_table').DataTable();
    
    function load_data(){
        $.ajax({
            url: "fetch.php",
            method: "POST",
            success: function(data){
                $('#product_table').html(data);
            }
        });

    }

});
