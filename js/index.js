$(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })


  $("#add_clients").click(function(){
    var add_first_name = $("#add_first_name").val();
    var add_last_name = $("#add_last_name").val();
    var add_phone_number = $("#add_phone_number").val();
    if(add_first_name != "" && add_last_name != "" && add_phone_number != ""){
        $.ajax({
            type:"POST",
            url:"ajax-add-client.php",
            data:{
                add_first_name : add_first_name,
                add_last_name : add_last_name,
                add_phone_number : add_phone_number,
            },
            success:function(data){
                $('.modal').modal('hide');
                $("input").val("");
                var childs = document.querySelector("tbody tr td").innerHTML;
                if(childs === "No Data Found"){
                    $("tbody").html(data);
                }else{
                    $("tbody tr:first-child").before(data);
                }
            }
        })
    }else{
        alert("Please Fill all Input Fields");
    }
  })

  $("#edit_clients").click(function(){
    var edit_id = $("#edit_id").val();
    var edit_first_name = $("#edit_first_name").val();
    var edit_last_name = $("#edit_last_name").val();
    var edit_phone_number = $("#edit_phone_number").val();
    if(edit_first_name != "" && edit_last_name != "" && edit_phone_number != ""){
    $.ajax({
        type:"POST",
        url:"ajax-edit-client.php",
        data:{
            edit_id : edit_id,
            edit_first_name : edit_first_name,
            edit_last_name : edit_last_name,
            edit_phone_number : edit_phone_number,
        },
        success:function(data){
            $('.modal').modal('hide');
            $("input").val("");
            $("#table_row_"+edit_id).replaceWith(data);
        }
    })
}else{
    alert("Please Fill all Input Fields");
}
  })
  $("body").on("click",".edit_buttons",function(){
    var id = $(this).data("id");
    var add_first_name = $(this).data("fname");
    var last_name = $(this).data("lname");
    var phone_number = $(this).data("phone");
    $("#edit_id").val(id);
    $("#edit_first_name").val(add_first_name);
    $("#edit_last_name").val(last_name);
    $("#edit_phone_number").val(phone_number);
  })

  $("body").on("click",".delete_client",function(){
    var delete_id = $(this).data("id");
if(confirm("Do You Really Want to Delete This User")){
    $.ajax({
        type:"POST",
        url:"ajax-delete-client.php",
        data:{
            delete_id : delete_id,
        },
        success:function(data){
            $("#table_row_"+delete_id).remove();
            var row_length = $('.table_row').length;
            if(row_length < 1){
                $("tbody").html("<tr><td colspan='5' class='text-center'>No Data Found</td></tr>")
            }
        }
    })
}
  })