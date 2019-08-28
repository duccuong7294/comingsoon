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
<div class="ui container">

        <h1 style="color: blue;">Coming Soon Setting</h1>
        <hr>
        <form action="<?php echo admin_url('admin.php?page=comingsoon-settings'); ?>"
              method="post" class="ui form">
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
                    <?php
                    if (isset($aOptions['cCheck']))
                    {?>
                    <input type="checkbox"
                           name="comingsoon_settings[cCheck]" checked = "checked"
                           <?php
                    }
                    ?>
                    <input type="checkbox"
                           name="comingsoon_settings[cCheck]">
                    <label>Run Plugin</label>
                </div>
            </div>
            <button class="ui button green" type="submit">Save Changes</button>
        </form>
    </div>

<script type="text/javascript">
    $container.find('input').daterangepicker({
        buttonClasses: "ui mini button",
        applyClass: "positive",
        cancelClass: "cancel",


        timePicker: true
    });
</script>