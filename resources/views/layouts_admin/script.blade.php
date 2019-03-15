
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
</script>

{{-- <script type="text/javascript">
    $.ajax({
        url:
    });
</script> --}}

<script type="text/javascript">
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
</script>

<script type="text/javascript">
      $(document).ready(function(){
        $("#msg").hide();
        $("#add").click(function(){
          $("#msg").show();
          var name = $("#name").val();
          var price = $("#price").val();
          var qty = $("#qty").val();
          var stocks = $("#stocks").val();
          var token = $("#token").val();

          $.ajax({
            type: "post",
            data: "name=" + name +"&price=" + price +"&qty=" + qty + "&stocks=" + stocks + "&_token=" + token,
            url: "{{ url('/admin/addproduct2')}}",
            success: function(data){
              $("#msg").html("Product Insert Successfully!");
             $("#msg").fadeOut(2000);
            }
          });
          $("#name").val('');
              $("#price").val('');
              $("#qty").val('');
      });
    });
    </script>

    <script type="text/javascript">
      $(document).ready(function(){
        //$("#msg").hide();
        $("#check").click(function(){
          var day = $("#day").val();
          var month = $("#month").val();
          //var token = $("#token").val();
        var dataId = {'day':day,'month':month}; //,'token':token
        $.ajax({
                type    : 'GET',
                url     : '{{ url('/admin/findbirthday')}}',
                dateType: 'json',
                data    : dataId,
                success:function(data){
                    $('#number').val(data);
                }
        });

      });
    });
    </script>

<script type="text/javascript">
    $('#cust_no').blur(function(){
        var cust_id = $(this).val();
        var dataId = {'cust_id':cust_id};
        $.ajax({
                type    : 'GET',
                url     : '{{ url('/admin/findNumber') }}',
                dateType: 'json',
                data    : dataId,
                success:function(data){
                    $('#number').val(data);
                }
        });
    });
</script>

{{-- <script type="text/javascript">
    $("#prod_id").click(function() {
 
    $.ajax({
        type: 'post',
        url: '{{url('/admin/add-product')}}',
        data: {
            '_token': $('input[name=_token]').val(),
            'name': $('input[name=name]').val()
            'price': $('input[name=price]').val()
            'qty': $('input[name=qty]').val()
            'stocks': $('input[name=stocks]').val()
        },
        success: function(data) {
            return data;
        },
        });
        $('#name').val('');
        $('#price').val('');
    });
</script> --}}

<script type="text/javascript">
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
</script>

<script type="text/javascript">

$(function() {
    $("#balance, #withdraw").on("keydown keyup", sum);
    function sum() {
    $("#bal").val(parseFloat($("#balance").val()) - parseFloat($("#withdraw").val()));
    }

    $('input#withdraw').blur(function() {
                var amt = parseFloat(this.value);
                $(this).val(amt.toFixed(2));
            });
});
</script>

{{-- Begining of search customer by click button --}}
<script type="text/javascript">
    $(document).ready(function(){
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#customer-form').submit(function(e){
            e.preventDefault();
            data = $(this).serialize();
            $.get('{{ url('/admin/view_info2')}}', data,function(search){
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
</script>


<script type="text/javascript">
    $(document).ready(function(){
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#withdraw-form').submit(function(e){
            e.preventDefault();
            data = $(this).serialize();
            $.get('{{ url('/admin/view_withdraw')}}', data,function(search){
                $('#cust').html('');
                $.each(search,function(key,val){
                    $('#cust').append(
                        '<tr>'+
                            '<td scope="row"><a href="#">'+val.cust_code+'</a></td>'+
                            '<td scope="row">'+val.company+'</td>'+
                            // '<td scope="row">'+val.firstname+'</td>'+
                            // '<td scope="row">'+val.lastname+'</td>'+
                            // '<td scope="row">'+val.email+'</td>'+
                            '<td scope="row">'+val.wth_phone+'</td>'+
                            '<td scope="row">'+val.wth_name+'</td>'+
                             '<td scope="row">'+val.amount_wth+'</td>'+
                             '<td scope="row">'+val.created_at+'</td>'+
                      '</tr>');
                });
            });
        });
    });
</script>

{{-- Ending of search customer by click button --}}

<script type="text/javascript">
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
</script>



<script type="text/javascript">

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
         // $('.remove').live('click', function(){
         //    var l = $('tbody tr').length;
         //    if(l==1){
         //        alert('You can not remove last one');
         //    }else{
         //        $(this).parent().parent().remove();
         //        total();
         //    }
         // });
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

    


