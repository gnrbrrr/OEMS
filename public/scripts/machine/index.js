$(document).ready(function () {
    
    console.log('ready');
    MACHINE.load_data();

});




var MACHINE = (function () {

    var this_machine = {};


    this_machine.file_preview = function (input) {
        if (input != undefined && (input.files && input.files[0])) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#img_machine').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
        else {
            $('#img_machine').attr('src', '/OEMS/public/upload/machine/image.png');
        }
    };

    this_machine.load_data = function()
    {
        $.ajax({
            type: 'get',
            url: 'User/load/',
            dataType: 'json',
            cache: false,
            success: function (data) {
                // console.log(data);
                var tbody = '';
                var x = 0;

                $.each(data, function () {
                    tbody += ''
                        
                    x++;

                });

                $('#tbl_user').DataTable().destroy();
                $('#tbl_user tbody').html(tbody);
                $('#tbl_user').DataTable();
            }
        });
        // alert('wew');
    }


    return this_machine;
})();

var x = 0;

/* function kolaps()
{
    if(x == 0)
    {
        $('#machine_mgmt1').addClass("kolaps");
        // $('#demo').removeClass("inkolaps");
        setTimeout(() => {
            $('#machine_mgmt1').fadeOut();
        }, 200);
        x = 1;
    }
    else
    {
        $('#machine_mgmt1').removeClass("kolaps");
        // $('#demo').addClass("inkolaps");
        $('#machine_mgmt1').fadeIn();
        
        x = 0;
    }
    
} */
