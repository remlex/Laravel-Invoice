 <!-- Right Panel -->

    <script src="{{ url('cssjs_admin/assets/js/vendor/jquery-2.1.4.min.js') }}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script> --}}

    <script src="{{ url('cssjs_admin/assets/js/popper.min.js') }}"></script>
    <script src="{{ url('cssjs_admin/assets/js/plugins.js') }}"></script>
    <script src="{{ url('cssjs_admin/assets/js/main.js') }}"></script>

    <script src="{{ url('cssjs_admin/assets/js/lib/chart-js/Chart.bundle.js') }}"></script>
    <script src="{{ url('cssjs_admin/assets/js/dashboard.js') }}"></script>
    {{-- <script src="{{ url('cssjs_admin/assets/js/widgets.js') }}"></script> --}}
    {{-- <script src="{{ url('cssjs_admin/assets/js/lib/vector-map/jquery.vmap.js') }}"></script>
    <script src="{{ url('cssjs_admin/assets/js/lib/vector-map/jquery.vmap.min.js') }}"></script>
    <script src="{{ url('cssjs_admin/assets/js/lib/vector-map/jquery.vmap.sampledata.js') }}"></script> --}}
    <script src="{{ url('cssjs_admin/assets/js/lib/vector-map/country/jquery.vmap.world.js') }}"></script>

    {{-- <script src="{{ url('cssjs_admin/assets/js/lib/data-table/datatables.min.js') }}"></script> --}}
    <script src="{{ url('cssjs_admin/assets/js/lib/data-table/dataTables.bootstrap.min.js') }}"></script>
    {{-- <script src="{{ url('cssjs_admin/assets/js/lib/data-table/datatables-init.js') }}"></script> --}}

    <script src="{{ url('cssjs_admin/assets/js/lib/data-table/pdfmake.min.js') }}"></script>


    {{-- <script src="{{ url('cssjs_admin/assets/js/live/bootstrap.js') }}"></script> --}}
    {{-- <script src="{{ url('cssjs_admin/assets/js/live/bootstrap.min.js') }}"></script>
    <script src="{{ url('cssjs_admin/assets/js/live/jquery.min.js') }}"></script> --}}

    

    <script>
        ( function ( $ ){
            "use strict";

            jQuery( '#vmap' ).vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: [ '#1de9b6', '#03a9f5' ],
                normalizeFunction: 'polynomial'
            });
        ( jQuery );
    });
    </script>




<script>
        // function payWithPaystack(){
        //   var amt = $('#amount').val() * 100;
        //   var email = '';
        //   var handler = PaystackPop.setup({
        //     key: '',
        //     email: email,
        //     amount: amt,
        //     ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you // echo $amt * 100;
        //     metadata: {
        //        custom_fields: [
        //           {
        //               display_name: "Remlex - Payment for Title",  
        //               variable_name: 'mobile_number',
        //               value: '+2348061313253'
        //           }
        //        ]
        //     },
        //     callback: function(response){
        //         //alert('success. transaction ref is ' + response.reference);
        //         $.post("http://www.remlextech.org/paystack/savetransaction.php",{'status':response.status,'amount':response.amount,'gateway_response':response.gateway_response,'paid_at':response.paid_at,'channel':response.channel,'currency':response.currency,'email':response.email,'reference':response.reference}, 
        //             function(data, textStatus, jqXHR){})
            
        //         window.location = "http://smsremlex.net/buy-sms.php?reference=" + response.reference;
        //     },
        //     onClose: function(){
        //         alert('window closed');
        //     }
        //   });
        //   handler.openIframe();
        // }
      </script>


<script>
    // $(function(){
    //    $('#button').click(function() {
    //         $.ajax({
    //             url: 'testUrl/{id}',
    //             type: 'GET',
    //             data: { id: 1 },
    //             success: function(response)
    //             {
    //                 $('#something').html(response);
    //             }
    //         });
    //    });
    // });    
</script>



@include('layouts_admin.script') 



</body>

</html>
