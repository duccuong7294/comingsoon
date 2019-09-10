<?php
/**
 * Created by PhpStorm.
 * User: doduc
 * Date: 21/08/2019
 * Time: 3:04 CH
 */
//use Comingsoon\Controllers\Controller;

//var_dump($aOptions);
?>
<body>
<div class="ui container">
        <h1 style="color: blue;">Coming Soon Setting</h1>
        <hr>
        <form action="<?php echo admin_url('admin.php?page=comingsoon-settings'); ?>"
              method="post" class="ui form">

            <?php do_action('comingsoon/views/coming/after-open-form', $aOptions); ?>

            <div class="field">
                <h2 for="title">Title coming soon </h2>
                <p><i>(Your title of website)</i> <span style="color: red;">*</span></p>
                <input id="title" type="text"
                       name="comingsoon_settings[tTitle]"
                       value="<?php echo esc_attr($aOptions['tTitle']);?>"
                       placeholder="tTitle">
            </div>

            <div class="field">
                <h2  for="Description">Description</h2>
                <p><i>(Description your reason of delay website)</i><span style="color: red;">*</span></p>
                <input id="Description" type="text"
                       value="<?php echo esc_attr($aOptions['dDescription']);?>"
                       name="comingsoon_settings[dDescription]"
                       placeholder="dDescription">
            </div>

            <div class="field">
                <h2 for="Time">Countdown</h2>
                <p><i>(Limit the time to returning website)</i><span style="color: red;">*</span></p>
                <h4>Start : </h4>
                <input type="date" name="comingsoon_settings[sStart]"
                value="<?php echo esc_attr($aOptions['sStart']);?>"
                >
                <h4>End : </h4>
                <input type="date" name="comingsoon_settings[eEnd]"
                value="<?php echo esc_attr($aOptions['eEnd']);?>"
                >
            </div>


<!--            <div class="field">-->
<!--                <label for="day">Countdown(Remain time)</label>-->
<!--                Days:<input id="day" name="day" type="text"-->
<!--                            value="--><?php //echo esc_attr($aOptions["d"]);
//                            ?><!--" placeholder="Days">-->
<!--                <p>* The number is equal or greater than 0</p>-->
<!--                Hours: <select id="h" name="hour">-->
<!--                    --><?php
//                    for ($index = 0; $index < 24; $index++) {
//                        $sSelect = (($aOptions["h"]) == $index) ? "selected":"";
//                        echo "<option"." ".$sSelect.">". $index."</option>";
//                    }
//                    ?>
<!--                </select>-->
<!--                Minutes:<select id="mi" name="min">-->
<!--                    --><?php
//                    for ($index = 0; $index < 60; $index++) {
//                        $sSelect = (($aOptions["mi"]) == $index) ?
//                            "selected":"";
//                        echo "<option"." ".$sSelect.">". $index."</option>";
//                    }
//                    ?>
<!--                </select>-->
<!--                Seconds<select id="s" name="sec">-->
<!--                    --><?php
//                    for ($index = 0; $index < 60; $index++) {
//                        $sSelect = (($aOptions["s"]) == $index) ? "selected":"";
//                        echo "<option"." ".$sSelect.">". $index."</option>";
//                    }
//                    ?>
<!--                </select>-->

<!--                <div class="field">-->
<!--                    <div class="ui calendar">-->
<!--                        <div class="ui input left icon">-->
<!--                            <i class="calendar icon"></i>-->
<!--                            <input type="text" name="date_estimated_arrival" placeholder="Date/Time">-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                </div>-->


            <br>
            <div class="field">
                <h2  for="Description">Note</h2>
                <p><i>(describe your website footer note)</i><span
                            style="color: red;
">*</span></p>
                <input id="Description" type="text"
                       value="<?php echo esc_attr($aOptions['nNote']);?>"
                       name="comingsoon_settings[nNote]"
                       placeholder="nNote">
            </div>

            <div class="field">
                <h2>Status</h2>
                <div class="ui toggle checkbox">
                    <input type="checkbox"
                           name="comingsoon_settings[cCheck]"
                        <?php echo esc_attr((isset($aOptions["cCheck"]) ? "checked" : "")); ?>>
                    <label>Run Plugin</label>
                </div>
            </div>

            <?php do_action('comingsoon/views/coming/before-save-changes', $aOptions); ?>

            <button class="ui button green" type="submit">Save Changes</button>
        </form>
    </div>
<!--<script src="assets/semantic/jquery/jquery-3.2.1.min.js"></script>-->

<script type="text/javascript">
    $container.find('input').daterangepicker({
        buttonClasses: "ui mini button",
        applyClass: "positive",
        cancelClass: "cancel",
        timePicker: true
    });
    // jQuery('.ui.calendar').calendar();
    // (function($) {
    //     $('.ui.calendar').calendar();
    // })(jQuery)
</script>
</body>
<footer>
    <?php wp_footer();?>

</footer>
