<script type="text/javascript">
    $('#company').click(function(){
        var selected_id = $(this).val();
        var dataId = {'id':selected_id};
        //alert('hggfvdfkjdfsk');
        $.ajax({
                type    : 'GET',
                url     : '{{ url('/admin/findCompany') }}',
                dateType: 'json',
                data    : dataId,
                success:function(data){
                    $('#firstname').val(data.firstname);
                    $('#lastname').val(data.lastname);
                    $('#email').val(data.email);
                    $('#phone').val(data.phone);
                    $('#address').val(data.address);
                }
        });
    });

     $('#account').blur(function(){
        var cust_code = $(this).val();
        var dataId = {'cust_code':cust_code};
        $.ajax({
                type    : 'GET',
                url     : '{{ url('/admin/findAccount') }}',
                dateType: 'json',
                data    : dataId,
                success:function(data){
                    $('#firstname').val(data.firstname);
                    $('#lastname').val(data.lastname);
                    $('#email').val(data.email);
                    $('#phone').val(data.phone);
                    $('#address').val(data.address);
                }
        });
    });

      $('#acct_id').blur(function(){
        var cust_code = $(this).val();
        var dataId = {'cust_code':cust_code};
        $.ajax({
                type    : 'GET',
                url     : '{{ url('/admin/findAccount_deposit') }}',
                dateType: 'json',
                data    : dataId,
                success:function(data){
                    $('#company').val(data.company);
                    $('#firstname').val(data.firstname);
                    $('#lastname').val(data.lastname);
                    $('#email').val(data.email);
                    $('#phone').val(data.phone);
                    $('#address').val(data.address);
                    $('#balance').val(data.balance);
                }
        });
    });

    $(document).ready(function() {
        sum();
        $("#balance, #withdraw").on("keydown keyup", function() {
            sum();
        });

     function sum() {
        var balance = document.getElementById('balance').value;
        var withdraw = document.getElementById('withdraw').value;

        var result = parseFloat(balance) - parseFloat(withdraw);
        if (!isNaN(result)) {
            document.getElementById('bal').value = result;
        }        
      }

    });

    $(document).ready(function(){
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#customer-form').submit(function(e){
            e.preventDefault();
            data = $(this).serialize();
            $.post('{{ url('/admin/view_cust')}}', data,function(search){
                $('#data').html('');
                $.each(search,function(key,val){
                    $('#data').append(
                        '<tr>'+
                            '<td scope="row"><a href="#">'+val.cust_code+'</a></td>'+
                            '<td scope="row">'+val.company+'</td>'+
                            '<td scope="row">'+val.firstname+'</td>'+
                            '<td scope="row">'+val.lastname+'</td>'+
                            // '<td scope="row">'+val.email+'</td>'+
                            '<td scope="row">'+val.address+'</td>'+
                            // '<td scope="row">'+val.phone+'</td>'+
                      '</tr>');
                });
            });
        });
    });

     $('tbody').delegate('.productname','change', function(){
            var tr=$(this).parent().parent();
            var id = tr.find('.productname').val();
            var dataId={'id':id};
            $.ajax({
                type    : 'GET',
                url     : '{{ url('/admin/findPrice') }}',
                dateType: 'json',
                data    : dataId,
                success:function(data){
                    tr.find('.price').val(data.price);
                }
            });
        });


      $('tbody').click('.productname', 'change', function(){
            var tr=$(this).parent().parent();
            //tr.find('.qty').val('');
            tr.find('.amount').val('0.00');
            //tr.find('.total').text('0:00');
            tr.find('.qty').focus();
        }); 

        $('tbody').delegate('.qty,.price,.discount','keyup', function(){
            //alert('test');
            var tr = $(this).parent().parent();
            var qty = tr.find('.qty').val();
            var price = tr.find('.price').val();
            var discount = tr.find('.discount').val();
            //var amount = (qty * price) - (qty * price * discount)/100;
            var amount = ((qty * price) - discount);
            tr.find('.amount').val(amount);
            total();
            //gtotal();
        });
        $('.addRow').on('click', function(){
            addRow();
        });

        //------------------- create function by user ----------

        function total(){
            var total = 0;
            var gamt = 0;
            var vat = 0;
            $('.amount').each(function(i,e){
                var amount = $(this).val()-0;
                total +=amount;
                //gamt +=amount;
                vat = total * 0.05;
                gamt = total + vat;
            })
            $('.total').html(total.formatMoney(2,'.',',') + " &#8358;");
            $('#gamt').val(gamt.formatMoney(2,'.',','));
            $('.vat').html(vat.formatMoney(2,'.',',') + " &#8358;");
        };

        // function gtotal(){
        //     var gamt = 0;
        //     $('.amount').each(function(i,e){
        //         var amount = $(this).val()-0;
        //         gamt +=amount;
        //     })
        //     $('#gamt').html(gamt.formatMoney(2,'.',','));
        // };

        Number.prototype.formatMoney = function(c, d, t){
        var n = this, c = isNaN(c = Math.abs(c)) ? 2 : c, 
        d = d == undefined ? "," : d, 
        t = t == undefined ? "." : t, 
        s = n < 0 ? "-" : "", 
        i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", 
        j = (j = i.length) > 3 ? j % 3 : 0;
           return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
         };

        //------------------Ending format Number -----------------        
        
        
         
         //----------------- end of function created by user ------
         $('.remove').live('click', function(){
            var l = $('tbody tr').length;
            if(l==1){
                alert('You can not remove last one');
            }else{
                $(this).parent().parent().remove();
                total();
            }
         });
         //------------------ Number and dot -----------------


         //---------------------- Number Only -------------

         function numberOnly(input){
            $(input).keypress(function(evt){
                var e = event || evt;
                var charCode = e.which || e.keyCode;
                if(charVode > 31 && (charCode < 40 || charCode > 57))
                    return false;
                    return true;
            });
         }
</script>

script 


