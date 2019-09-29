var baseURL = location.protocol + "//" + location.hostname + (location.port && ":" + location.port) + "/mini_classroom/";



function del_class(s)
{
    var car_name = $("#CarName").val();
    
    swal({
        title: "Are you sure?",
        text: "By clicking the Yes button, you will be deleting this class.",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#25a85c",
        confirmButtonText: "Yes, Buy Now!",
        closeOnConfirm: false}, function ()
    {
        swal("Delected!", "This Class has been deleted", "success");
        document.location.href = baseURL + 'app/delete_class' + s;
    }
    );

}