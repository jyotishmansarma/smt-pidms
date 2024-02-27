<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script type="text/javascript">


//    $('.enb_handover').on('change', function() {
//     if( $('.enb_handover').is(":checked"))
//     {
//         var checkedCount = $('.enb_handover:checked').length;
//
//
//         if (checkedCount === 1) {
//             $('.completed_schemes_handed_pri').prop('disabled', false);
//         } else {
//             $('.completed_schemes_handed_pri').prop('disabled', true);
//         }
//     }
    // });

$("#myButton").attr("disabled", true);
    function  addScheme(id)
    {
        var completed_schemes=0;

        // var completed_schemes=$('#completed_schemes'+id).val();
        // var completed_schemes_checked = $("input[@id="'completed_schemes'+ id + "]:checked").length;
        if( $('#completed_schemes'+id).is(":checked"))
        {
            completed_schemes=1;
        } else {
            completed_schemes=0;
        }

        var fhtc_in_completed_schemes=$('#fhtc_in_completed_schemes'+id).val();

        // if( $('#fhtc_in_completed_schemes'+id).is(":checked"))
        // {
        //     var fhtc_in_completed_schemes=1;
        // } else {
        //     var fhtc_in_completed_schemes=0;
        // }
        var completed_schemes_handed_pri=0;


        if( $('#completed_schemes_handed_pri'+id).is(":checked") && completed_schemes === 1)
        {
             completed_schemes_handed_pri=1;
        } else {
             completed_schemes_handed_pri=0;
        }
        // if( $('#balance_schemes_handed_pri'+id).is(":checked"))
        // {
        //     var balance_schemes_handed_pri=1;
        // } else {
        //     var balance_schemes_handed_pri=0;
        // }
        var wuc_formed_againts_completed_schemes=0;

        if( $('#wuc_formed_againts_completed_schemes'+id).is(":checked"))
        {
            wuc_formed_againts_completed_schemes=1;
        } else {
            wuc_formed_againts_completed_schemes=0;
        }
        // if( $('#wuc_not_formed_againts_completed_schemes'+id).is(":checked"))
        // {
        //     var wuc_not_formed_againts_completed_schemes=1;
        // } else {
        //     var wuc_not_formed_againts_completed_schemes=0;
        // }

        var no_of_jal_mitra_trained=$('#no_of_jal_mitra_trained'+id).val();
        var no_of_jal_mitra_eng_letter=$('#no_of_jal_mitra_eng_letter'+id).val();
        var division_id=$('#division_id'+id).val();

        $.ajax({
                type: 'post',
                url: '{{ route('scheme.store') }}',
                dataType: 'JSON',
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: id,
                    completed_schemes:completed_schemes,
                    fhtc_in_completed_schemes:fhtc_in_completed_schemes,
                    completed_schemes_handed_pri:completed_schemes_handed_pri,
                    balance_schemes_handed_pri:0,
                    wuc_formed_againts_completed_schemes:wuc_formed_againts_completed_schemes,
                    wuc_not_formed_againts_completed_schemes:0,
                    no_of_jal_mitra_trained:no_of_jal_mitra_trained,
                    no_of_jal_mitra_eng_letter:no_of_jal_mitra_eng_letter,
                    division_id:division_id
                },
                success: function(data) {

                    console.log(data);
                    toastr.success('Scheme updated successfully!', 'Success');
                },
                error: function(data) {
                    //Error here
                    toastr.success('Something went wrong!', 'Error');

                    console.log(data);
                }
            });
    }


</script>
<script>
  $(document).ready(function() {

    function update(id)
    {
        alert(id);
    }
});



</script>
