$(document).ready(function() {
    var i = 1;
    $("#add_row").click(function() {
        $('#addr' + i).html("<td>" + (i + 1) + "</td><td><input type='text' class='form-control' name='description" + i + "' value=''></td><td><input type='text' class='form-control' name='unit" + i + "' value=''></td><td><input type='text' class='form-control' name='quantity" + i + "' value='' id='quantity'></td><td><input type='text' class='form-control' name='rate" + i + "' value='' id='rate'></td><td><input type='text' class='form-control countable' name='amount" + i + "' id='amount' value='' onChange='totalVal();'></td><td><input type='text' class='form-control' name='remarks" + i + "' value=''></td><td><button type='button' class='btn btn-primary' id='remove_row'><i class='fa fa-trash' style='color:white' aria-hidden='true'></i> Delete</button></td>");
        $('#table_id').append('<tr id="addr' + (i + 1) + '" class="trRow"></tr>');
        i++;
    });
});
$(document).ready(function(){
    $('table').on('click', '#remove_row', function(e){
        e.preventDefault();
        totalVal();
        $(this).parents('tr').remove();
        return false;
    });
});
$(document).ready(function(){
    $("#table_id input").keyup(multInputs);
    function multInputs(){
        var mult = 0;
        $("tr.trRow").each(function(){
            // alert("hi")
            var qty = $('#quantity',this).val();
            var rate = $('#rate',this).val();
            var total = (qty * 1) * (rate * 1)
            // alert(rate);
            $('#amount',this).val(total);
            mult += total;
        })
        $("#sum").html(mult.toFixed(2));
    }
})
$(document).on('click', '#add_row', function(){
    $("#table_id input").keyup(multInputs);
    function multInputs(){
        var mult = 0;
        $("tr.trRow").each(function(){
            // alert("hi")
            var qty = $('#quantity',this).val();
            var rate = $('#rate',this).val();
            var total = (qty * 1) * (rate * 1)
            // alert(rate);
            $('#amount',this).val(total);
            mult += total;
        })
        $("#sum").html(mult.toFixed(2));
        $('#sumHidden').val(sum.toFixed(2));
        var row = $('table#table_id tr:last').index();
        $('#count').val(row);
    }
});
function totalVal(){
    var sum = 0;
    //iterate through each textboxes and add the values
    $(".countable").each(function() {

        //add only if the value is number
        if(!isNaN(this.value) && this.value.length!=0) {
            sum += parseFloat(this.value);
        }

    });
    $("#sum").html(sum.toFixed(2));
    $('#sumHidden').val(sum.toFixed(2));
    var row = $('table#table_id tr:last').index();
        $('#count').val(row);
}
setInterval(function(){totalVal();},200);