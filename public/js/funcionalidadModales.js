$(document).ready(function(){

    $("#search").keyup(function(){
        _this = this;
        // Show only matching TR, hide rest of them
        $.each($("#mytable tbody tr"), function() {
            if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
                $(this).hide();
            else
                $(this).show();
        });
    });

    $("#searchNo").keyup(function(){
        _this = this;

        if ($(_this).val() != "") {
            $("#mytable tbody tr").hide();
            $("#tr"+$(_this).val()).show();
        }else{
            $("#mytable tbody tr").show();
        }
    });

    $("#mas").on('click', function(){
        $("#t").show();
        $("#t").css('visibility', 'visible');
        $("#mas").hide();
        $("#menos").show();
    });

    $("#menos").on('click', function(){
        $("#t").hide();
        $("#t").css('visibility', 'hidden');
        $("#tel2").val('');
        $("#mas").show();
        $("#menos").hide();
    });

    $("#imas").on('click', function(){
        $("#it").show();
        $("#it").css('visibility', 'visible');
        $("#imas").hide();
        $("#imenos").show();
    });

    $("#imenos").on('click', function(){
        $("#it").hide();
        $("#it").css('visibility', 'hidden');
        $("#itel2").val('');
        $("#imas").show();
        $("#imenos").hide();
    });

    $("#mas3").on('click', function(){
        $(".tel2").show();
        $(".tel2").css('visibility', 'visible');
        $("#mas3").hide();
        $("#menos3").show();
    });

    $("#menos3").on('click', function(){
        $(".tel2").hide();
        $(".tel2").css('visibility', 'hidden');
        $("#telefono23").val('');
        $("#mas3").show();
        $("#menos3").hide();
    });

    $("#mas4").on('click', function(){
        $(".tel3").show();
        $(".tel3").css('visibility', 'visible');
        $("#mas4").hide();
        $("#menos4").show();
    });

    $("#menos4").on('click', function(){
        $(".tel3").hide();
        $(".tel3").css('visibility', 'hidden');
        $("#telefono24").val('');
        $("#mas4").show();
        $("#menos4").hide();
    });

    $("#tproblema").change(function(){
        var problema = $(this).val();
        if (problema == "otroProblema") {
            $('.otroProblema').show();
            $('#otroProblema').attr('required', 'required');
        }else{
            $('.otroProblema').hide();
            $('#otroProblema').val('');
            $('#otroProblema').removeAttr('required');
        }
    });

    $(".tproblema").change(function(){
        var problema = $(this).val();
        if (problema == "otroProblema") {
            $('.otroProblema1').show();
            $('#otroProblema1').attr('required', 'required');
        }else{
            $('.otroProblema1').hide();
            $('#otroProblema1').val('');
            $('#otroProblema1').removeAttr('required');
        }
    });
});

var textarea = document.querySelector('#direccion');

textarea.addEventListener('keydown', autosize);
             
function autosize(){
    var el = this;
    setTimeout(function(){
        el.style.cssText = 'height:auto; padding:5';
        el.style.cssText = 'height:' + el.scrollHeight + 'px';
  },0);
}

var textarea = document.querySelector('#referencias');

textarea.addEventListener('keydown', autosize);
             
function autosize(){
    var el = this;
    setTimeout(function(){
        el.style.cssText = 'height:auto; padding:5';
        el.style.cssText = 'height:' + el.scrollHeight + 'px';
  },0);
}

var textarea = document.querySelector('#problema');

textarea.addEventListener('keydown', autosize);
             
function autosize(){
    var el = this;
    setTimeout(function(){
        el.style.cssText = 'height:auto; padding:5';
        el.style.cssText = 'height:' + el.scrollHeight + 'px';
  },0);
}

var textarea = document.querySelector('#observaciones');

textarea.addEventListener('keydown', autosize);
             
function autosize(){
    var el = this;
    setTimeout(function(){
        el.style.cssText = 'height:auto; padding:5';
        el.style.cssText = 'height:' + el.scrollHeight + 'px';
  },0);
}

var textarea = document.querySelector('#direccion1');

textarea.addEventListener('keydown', autosize);
             
function autosize(){
    var el = this;
    setTimeout(function(){
        el.style.cssText = 'height:auto; padding:5';
        el.style.cssText = 'height:' + el.scrollHeight + 'px';
  },0);
}

var textarea = document.querySelector('#caracteristicas');

textarea.addEventListener('keydown', autosize);
             
function autosize(){
    var el = this;
    setTimeout(function(){
        el.style.cssText = 'height:auto; padding:5';
        el.style.cssText = 'height:' + el.scrollHeight + 'px';
  },0);
}

var textarea = document.querySelector('#referencias1');

textarea.addEventListener('keydown', autosize);
             
function autosize(){
    var el = this;
    setTimeout(function(){
        el.style.cssText = 'height:auto; padding:5';
        el.style.cssText = 'height:' + el.scrollHeight + 'px';
  },0);
}

var textarea = document.querySelector('#disponibilidad1');

textarea.addEventListener('keydown', autosize);
             
function autosize(){
    var el = this;
    setTimeout(function(){
        el.style.cssText = 'height:auto; padding:5';
        el.style.cssText = 'height:' + el.scrollHeight + 'px';
  },0);
}

var textarea = document.querySelector('#observaciones1');

textarea.addEventListener('keydown', autosize);
             
function autosize(){
    var el = this;
    setTimeout(function(){
        el.style.cssText = 'height:auto; padding:5';
        el.style.cssText = 'height:' + el.scrollHeight + 'px';
  },0);
}

function sliceSize(dataNum, dataTotal) {
    return (dataNum / dataTotal) * 360;
}

function addSlice(sliceSize, pieElement, offset, sliceID, color) {
    $(pieElement).append(
        "<div class='slice " + sliceID + "'><span></span></div>"
    );
    var offset = offset - 1;
    var sizeRotation = -179 + sliceSize;
    $("." + sliceID).css({
        transform: "rotate(" + offset + "deg) translate3d(0,0,0)"
    });
    $("." + sliceID + " span").css({
        transform: "rotate(" + sizeRotation + "deg) translate3d(0,0,0)",
        "background-color": color
    });
}
function iterateSlices(
    sliceSize,
    pieElement,
    offset,
    dataCount,
    sliceCount,
    color
) {
    var sliceID = "s" + dataCount + "-" + sliceCount;
    var maxSize = 179;
    if (sliceSize <= maxSize) {
        addSlice(sliceSize, pieElement, offset, sliceID, color);
    } else {
        addSlice(maxSize, pieElement, offset, sliceID, color);
        iterateSlices(
            sliceSize - maxSize,
            pieElement,
            offset + maxSize,
            dataCount,
            sliceCount + 1,
            color
        );
    }
}
function createPie(dataElement, pieElement) {
    var listData = [];
    $(dataElement + " span").each(function () {
        listData.push(Number($(this).html()));
    });
    var listTotal = 0;
    for (var i = 0; i < listData.length; i++) {
        listTotal += listData[i];
    }
    var offset = 0;
    var color = [
        "cornflowerblue",
        "olivedrab",
        "orange",
        "tomato",
        "crimson",
        "purple",
        "turquoise",
        "forestgreen",
        "navy",
        "gray"
    ];
    for (var i = 0; i < listData.length; i++) {
        var size = sliceSize(listData[i], listTotal);
        iterateSlices(size, pieElement, offset, i, 0, color[i]);
        $(dataElement + " li:nth-child(" + (i + 1) + ")").css(
            "border-color",
            color[i]
        );
        offset += size;
    }
}
createPie(".pieID.legend", ".pieID.pie");

(function () {
    let optionBtns = document.querySelectorAll(".js-option");

    for (var i = 0; i < optionBtns.length; i++) {

        optionBtns[i].addEventListener("click", function (e) {
        var notificationCard = this.parentNode.parentNode;
        var clickBtn = this;

        requestAnimationFrame(function () {
            archiveOrDelete(clickBtn, notificationCard);
                            
                window.setTimeout(function () {
                    requestAnimationFrame(function () {
                        notificationCard.style.transition = "all .4s ease";
                        notificationCard.style.height = 0;
                        notificationCard.style.margin = 0;
                        notificationCard.style.padding = 0;
                    });

                    window.setTimeout(function () {
                        notificationCard.parentNode.removeChild(notificationCard);
                    }, 1500);
                }, 1500);
            });
        });
    }

    var archiveOrDelete = function (clickBtn, notificationCard) {
        if (clickBtn.classList.contains("archive")) {
            notificationCard.classList.add("archive");
        } else if (clickBtn.classList.contains("delete")) {
            notificationCard.classList.add("delete");
        }
    };
})();