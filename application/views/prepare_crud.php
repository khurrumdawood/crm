<script src="<?php echo base_url() ?>js/jquery.js"></script>
<script>
    $(document).ready(function () {

        var inputs = 1;

        $('.opBtnAdd').click(function () {
            input_class = $(this).attr('Op_INPUT_CLASS');
            source_class = $(this).attr('Op_SOURCE_CLASS');
            $('.' + input_class + '_del:disabled').removeAttr('disabled');
            var c = $('.' + source_class + ':first').clone(true);
            c.show();
            c.removeClass(source_class);
            c.addClass(input_class);
            $('.' + input_class + ':last').after(c);
        });

        $('.opBtnDel').click(function () {
            input_class = $(this).attr('Op_INPUT_CLASS');
            if (confirm('continue delete?')) {
                --inputs;
                $(this).closest('.' + input_class).remove();
                $('.' + input_class + '_del').attr('disabled', ($('.' + input_class).length < 2));
            }
        });


    });

</script>
<form action="" method="post">
    <input type="text" name="table" placeholder="give table" />
    <div class="grid-3-12"><label>Select Op</label></div>
    <hr />

    <div style="margin-bottom:4px;display: none" class="opHtml" >
        <div class="grid-3-12"><label>&nbsp;</label></div>
        <input type="button" class="button red opBtnDel opInput_del" value="Delete" Op_INPUT_CLASS="opInput" disabled="disabled" />
        <input name="op[]" type="text">            
        <input name="op1[]" type="text">            
    </div>

    <div style="margin-bottom:4px;" class="opInput">
        <div class="grid-3-12"><label>&nbsp;</label></div>
        <input type="button" class="button red opBtnDel opInput_del" value="Delete" Op_INPUT_CLASS="opInput"  />
        <input name="op[]" type="text">            
        <input name="op1[]" type="text">            

    </div>

    <div>
        <div class="grid-3-12"><label>&nbsp;</label></div>
        <input type="button" class="button red opBtnAdd" value="add another op" Op_INPUT_CLASS="opInput" Op_SOURCE_CLASS="opHtml"/>
    </div>

    <hr />
    <input type='submit'/>
</form>



