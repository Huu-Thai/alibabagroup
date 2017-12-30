
<div class="container preloaderhide" style="position: fixed;width: 100%;z-index: 1000;height: 100%;background: #fff;">
    <div class="row">
        <div class="col-md-10 col-md-offset-1" style="">
            <div id="examples">
                <div style="padding: 0 15px;margin-top: 20%">
                    <div class="col-sm-12"  style="">
                            <img id="spidermanGrayscale" src="preloader/logos/logo.png" alt="spiderman Logo" class="img-responsive logo" style="margin: 0 auto;" />
                        </div>
                    <div class="col-sm-12 text-center" style="margin-top:10px">
                        <div id="demo-progress-14" style="margin-bottom:10px;font-size:16px;opacity:0;font-weight:bold;">0 %</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "jquery-1.11.2.min.php"; ?>
<?php include "loadgo.php"; ?>


<script type="text/javascript">


var cocacolaInterval, disneyInterval, supermanInterval, batmanInterval, 
jurassicIntervalLR, jurassicIntervalRL, jurassicIntervalBT, jurassicIntervalTB,
spidermanSepiaInterval, spidermanBlurInterval, spidermanInvertInterval, spidermanOpacityInterval, spidermanHueInterval, spidermanGrayscaleInterval;

function playDemo (_id, index, interval) {
    $('#demo-msg-' + index).animate({
        'opacity': '0'
    });
    $('#demo-progress-' + index).animate({
        'opacity': '1'
    });
    var p = 0;
    $('#' + _id).loadgo('resetprogress');
    $('#demo-progress-' + index).html('0%');
    window.setTimeout(function () {
        interval = window.setInterval(function (){
            if ($('#' + _id).loadgo('getprogress') == 100) {
               
                $('.preloaderhide').fadeOut(500);
                 window.clearInterval(interval);
                // $('#demo-msg-' + index).animate({
                //     opacity: '1'
                // });
                // $('#demo-progress-' + index).animate({
                //     opacity: '0'
                // });
            }
            else {
                var prog = p*10;
                $('#' + _id).loadgo('setprogress', prog);
                $('#demo-progress-' + index).html(prog + '%');
                p++;
            }
        }, 100);
    }, 200);
}

$(window).load(function () {

$("#spidermanGrayscale").load(function() {
// Example #5
$('#spidermanGrayscale').loadgo({
    'filter':    'invert'
});
}).each(function() {
    if(this.complete) $(this).load();
});

});


$(document).ready(function() {
    $( window ).load(function() {
        playDemo('spidermanGrayscale', 14, spidermanGrayscaleInterval);

    });
});
</script>
