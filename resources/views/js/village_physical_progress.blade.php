<script src="https://cdn.jsdelivr.net/npm/tostar@1.0.0/dist/tostar.min.js"></script>
<script type="text/javascript">
    // $(function() {
    //     console.log($("#house_connection").val());
    //
    //     $("#house_connection, #house_holds").keyup(function() { // input on change
    //         console.log($("#house_connection").val());
    //         var result = parseFloat(parseInt($("#house_connection").val(), 10) * 100)/ parseInt($("#house_holds").val(), 10);
    //         $('#fhtc_coverage').text(result||''); //shows value in "#rate"
    //     })
    // });

      

    $(document).ready(function() {
        $('#panchayat_id').change(function() {
            var panchayat_id = $('#panchayat_id').val();
           $('.table_row').remove();
            $.ajax({
                type: 'post',
                url: '{{ route('get-village-physical-progress') }}',
                dataType: 'JSON',
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: panchayat_id,
                },
                success: function(data) {
                    $.each(data, function(index, value) {
                        $('#table_data').append(`<tr class="table_row"><td class="px-6 py-3 whitespace-nowrap text-sm text-gray-900">${index+1}</td>
                        <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-900">${value.house_holds}</td> 
                        <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-900">${value.house_connection}</td>
                        <td> <input type="date" name="exp_date_of_saturation" id="exp_date_of_saturation${value.id}"  class="form-input"
                           value="${value.exp_date_of_saturation}" required /><input type="hidden" name="id" id="id"  class="form-input"
                           value="${value.id}" /></td>
                        <td> <input type="date" name="exp_date_of_saturation" id="exp_date_of_har_ghar_jal${value.id}"  class="form-input"
                           value="${value.exp_date_of_har_ghar_jal}" required /></td><td><button type="button" onclick="updatevill(${value.id})" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Update
                            </button></td></tr>`)
                    })

                    console.log(data);
                },
                error: function(data) {
                    //Error here
                    console.log(data);
                }
            });


        });
      
    });
    function  updatevill(id)
    {
        var exp_date_of_saturation=$('#exp_date_of_saturation'+id).val();
        var exp_date_of_har_ghar_jal=$('#exp_date_of_har_ghar_jal'+id).val();


        $.ajax({
                type: 'post',
                url: '{{ route('update-village-physical-progress') }}',
                dataType: 'JSON',
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: id,
                    exp_date_of_saturation:exp_date_of_saturation,
                    exp_date_of_har_ghar_jal:exp_date_of_har_ghar_jal
                },
                success: function(data) {
                 
                    Tostar.notify('Data successfully updated!', {
                      duration: 3000, // duration in milliseconds
                        position: 'top-right' // position of the notification
                    });
                    console.log(data);
                },
                error: function(data) {
                    //Error here
                    console.log(data);
                }
            });

    }
</script>
<script>
//   $(document).ready(function() {
//     function update(id)
//     {
//         alert(id);
//     }
// });



</script>