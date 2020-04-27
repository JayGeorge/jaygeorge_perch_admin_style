<?php
    # Side panel
    echo $HTML->side_panel_start();

    echo $HTML->para('In the sidebar you should try and give the user guidance and tips.');
    echo $HTML->para('For content editing pages, presume the user is non-technical editor using the software.');
    echo $HTML->para('For configuration pages, presume the user is the web designer who is setting up the site.');
    
    echo $HTML->side_panel_end();

    # Main panel
    echo $HTML->main_panel_start();
    include('_subnav.php');
    
    echo $HTML->heading1('About the Admin Style app');

    // if (isset($message)) echo $message;
    echo '<p>The <em>Admin Style</em> app styles the Perch admin.<br><strong>All settings for Admin Style are stored in <a href="/yourperchloginpath/core/settings#jaygeorge_perch_admin_style">Settings</a></strong>.</p><p>It&apos;s been tested in the latest versions of Chrome, Safari, Firefox, and Microsoft Edge. It mostly just needs browsers that support CSS variables, which are used extensively in the app.</p><p>This app was developed by Jay George.</p>';

    echo $HTML->heading1('Instructions');

    echo '
    <ol>
        <li>
            <strong>Go to <a href="/yourperchloginpath/core/settings">Settings</a>.</strong> This app assummes a few settings are ticked.</code>
            <ul>
                <li>Tick "Show dedicated back link in sidebar"</li>
                <li>Tick "Hide Perch Branding"</li>
            </ul>
        </li>
        <li>
            <strong>Copy the starter files</strong> in <code>/yourperchloginpath/addons/apps/jaygeorge_perch_admin_style/extra/</code> paste them into <code>/yourperchloginpath/addons/plugins/ui</code>
        </li>
        <li>
            <strong>Add any client-specific admin styling</strong>. You should now use <code>/yourperchloginpath/addons/plugins/ui/custom-admin.css</code> to add client-specific CSS to brand the admin. You may just want to change the variable values.
        </li>
        <li>
            <strong>Add your logo</strong> as <code>/yourperchloginpath/addons/plugins/ui/logo-dark.svg</code>. You should also add a logo that can be used on a white background (for the mobile admin view) as <code>/yourperchloginpath/addons/plugins/ui/logo.svg</code>. It should be a square SVG to ensure the admin works well responsively. Using the site favicon works great.
        </li>
        <li>
            <strong>Add your favicon</strong> as <code>/yourperchloginpath/addons/plugins/ui/favicon.ico</code>
        </li>
        <li>
            <strong>Go through the app <a href="/yourperchloginpath/core/settings#jaygeorge_perch_admin_style">settings</a></strong> page to add extra things like external font stylesheets.
        </li>
    </ol>';

    echo $HTML->heading1('Notes');
    echo '<p>This app contains base styling. To future proof as much as possible this app tries not to touch any layout; only padding and colouring adjustments. Do <em>not</em> change the values of any file in the plugin folder—instead use your new <code>/yourperchloginpath/addons/plugins/ui/custom-admin.css</code> to style the admin.</p>

    <p><sub>v. ' . date('Y-m-d H:i:s',filemtime($_SERVER['DOCUMENT_ROOT'].'/'. PERCH_LOGINPATH . '/addons/apps/jaygeorge_perch_admin_style')) . '</sub></p>';

    if (PerchUtil::count($things)) {

    /* ----------------------------------------- SMART BAR ----------------------------------------- */
    ?>
    <ul class="smartbar">
        <li class="selected"><a href="<?php echo PerchUtil::html($API->app_path()); ?>"><?php echo $Lang->get('All'); ?></a></li>
    </ul>
    <?php
    /* ----------------------------------------- /SMART BAR ----------------------------------------- */


?>
    <table class="d">
        <thead>
            <tr>
                <th class="first"><?php echo $Lang->get('Title'); ?></th>  
                <th><?php echo $Lang->get('Date'); ?></th>
                <th class="action last"></th>
            </tr>
        </thead>
        <tbody>
<?php
    foreach($things as $Thing) {
?>
            <tr>
                <td class="primary"><a href="<?php echo $HTML->encode($API->app_path()); ?>/edit/?id=<?php echo $HTML->encode(urlencode($Thing->id())); ?>"><?php echo $HTML->encode($Thing->admincssTitle()); ?></a></td>
                <td><?php echo $HTML->encode(strftime('%d %B %Y, %l:%M %p', strtotime($Thing->algoliaDateTime()))); ?></td>
                <td><a href="<?php echo $HTML->encode($API->app_path()); ?>/delete/?id=<?php echo $HTML->encode(urlencode($Thing->id())); ?>" class="delete inline-delete"><?php echo $Lang->get('Delete'); ?></a></td>
            </tr>
<?php   
    }
?>
        </tbody>
    </table>
<?php    
       

    } // if things
    
    echo $HTML->main_panel_end();
