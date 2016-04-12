$(function () {
    $(".day").hide();

    $(".check_day").change(function() {
        if(($(this).val() === "mon"))
        {
            if(this.checked)
                $("#monday").show();
            else
                $("#monday").hide();
        }

        else if(($(this).val() === "tue"))
        {
            if(this.checked)
                $("#tuesday").show();
            else
                $("#tuesday").hide();
        }

        else if(($(this).val() === "wed"))
        {
            if(this.checked)
                $("#wednesday").show();
            else
                $("#wednesday").hide();
        }
        else if(($(this).val() === "thu"))
        {
            if(this.checked)
                $("#thursday").show();
            else
                $("#thursday").hide();
        }
        else if(($(this).val() === "fri"))
        {
            if(this.checked)
                $("#friday").show();
            else
                $("#friday").hide();
        }
        else if(($(this).val() === "sat"))
        {
            if(this.checked)
                $("#saturday").show();
            else
                $("#saturday").hide();
        }
        else if(($(this).val() === "sun"))
        {
            if(this.checked)
                $("#saturday").show();
            else
                $("#saturday").hide();
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

        console.log($(this).val()+'changed');

    });
    
    $("#everyday").change(function () {
        var startValue = $(".startTime").val();
        var endValue = $(".endTime").val();
        $(".day .startTime").val(startValue);
        $(".day .endTime").val(endValue);
    })
})