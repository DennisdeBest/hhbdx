$(function () {
    $(".day").hide();

    var dayShort=['mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun'];
    var dayLong=['#monday', '#tuesday', '#wednesday', '#thursday', '#friday', '#saturday', '#sunday'];
    $(".check_day").change(function() {
        for(i = 0; i <dayLong.length; i++){

                if($(this).val() === dayShort[i])
                {
                    if(this.checked)
                        $(dayLong[i]).show();
                    else{
                        $(dayLong[i]).hide();
                        $(dayLong[i]).find($('input')).val('');
                        $(dayLong[i]).find($('select')).val('');
                    }

                }
            }
        if($(this).val() === "all"){
            if (this.checked) {
                $(".check_day").prop('checked', true);
                $(".day").show();
            }
            else {
                $(".check_day").prop('checked', false);
                $(".day").hide();
            }
        }
    });

    
    $("#everyday").change(function () {
        var startValue = $(".startTime").val();
        var endValue = $(".endTime").val();
        $(".day .startTime").val(startValue);
        $(".day .endTime").val(endValue);

    });
    $("#everyday").find($(".dealInput")).bind('input propertychange change', function(){
        var id = $(this).attr('id');
        var value = $(this).val();
        var selector = ".day .deals #"+id+"";
        $(selector).val(value);
    });
});