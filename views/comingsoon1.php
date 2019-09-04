<?php
/**
 * Created by PhpStorm.
 * User: doduc
 * Date: 23/08/2019
 * Time: 3:55 CH
 */
//var_dump($_POST['cms_settings']);
?>

<form method ="post" action="<?php echo admin_url("admin.php?page=comingsoon-settings1");?>">
            <div class="field">
                <input value="<?php echo esc_attr($aSetting['fName']);?>"
                       name="cms_settings[fName]">
            </div>
            <div class="field">
                <input value="<?php echo esc_attr($aSetting['lName']);?>"
                       name="cms_settings[lName]">
            </div>
            <?php
//            do_action('cms_settings', $aSetting);

           $aSocialNetworks  = ['facebook'];
            echo apply_filters('hoa',$aSocialNetworks);
            foreach ($aSocialNetworks as $key => $social) {
                $social
                ?>
                <input name="<?php echo $key?>" value="<?php echo $social;?>"
                       type="text">
                <?php
            }
            ?>
            <button type="submit">submit</button>
        </form>

<?php
