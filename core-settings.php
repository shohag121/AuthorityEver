<?php
add_action( 'admin_menu', 'aevc_add_admin_menu' );
add_action( 'admin_init', 'aevc_settings_init' );


function aevc_add_admin_menu(  ) {

    add_options_page( 'AuthorityEver Core', 'AuthorityEver Core', 'manage_options', 'authorityever_core', 'authorityever_core_options_page' );

}


function aevc_settings_init(  ) {

    register_setting( 'pluginPage', 'aevc_settings' );

    add_settings_section(
        'aevc_pluginPage_section',
        __( 'Amazon Details', 'aevc' ),
        'aevc_settings_section_callback',
        'pluginPage'
    );

    add_settings_field(
        'aevc_select_country',
        __( 'Select Base Affiliate Country', 'aevc' ),
        'aevc_select_country_render',
        'pluginPage',
        'aevc_pluginPage_section'
    );

    add_settings_field(
        'aevc_access_key',
        __( 'Set Access Key', 'aevc' ),
        'aevc_access_key_render',
        'pluginPage',
        'aevc_pluginPage_section'
    );

    add_settings_field(
        'aevc_secret_key',
        __( 'Set Secret Key', 'aevc' ),
        'aevc_secret_key_render',
        'pluginPage',
        'aevc_pluginPage_section'
    );

    add_settings_field(
        'aevc_associate_tag',
        __( 'Set Associate Tag', 'aevc' ),
        'aevc_associate_tag_render',
        'pluginPage',
        'aevc_pluginPage_section'
    );


}


function aevc_select_country_render(  ) {

    $options = get_option( 'aevc_settings' );
    ?>
    <select name='aevc_settings[aevc_select_country]'>
        <option value='com' <?php selected( $options['aevc_select_country'], 'com' ); ?>>United States</option>
        <option value='de' <?php selected( $options['aevc_select_country'], 'de' ); ?>>Germany</option>
        <option value='co.uk' <?php selected( $options['aevc_select_country'], 'co.uk' ); ?>>United Kingdom</option>
        <option value='ca' <?php selected( $options['aevc_select_country'], 'ca' ); ?>>Canada</option>
        <option value='fr' <?php selected( $options['aevc_select_country'], 'fr' ); ?>>France</option>
        <option value='co.jp' <?php selected( $options['aevc_select_country'], 'co.jp' ); ?>>Japan</option>
        <option value='it' <?php selected( $options['aevc_select_country'], 'it' ); ?>>Italy</option>
        <option value='cn' <?php selected( $options['aevc_select_country'], 'cn' ); ?>>China</option>
        <option value='es' <?php selected( $options['aevc_select_country'], 'es' ); ?>>Spain</option>
        <option value='in' <?php selected( $options['aevc_select_country'], 'in' ); ?>>India</option>
    </select>

    <?php

}


function aevc_access_key_render(  ) {

    $options = get_option( 'aevc_settings' );
    ?>
    <input type='text' name='aevc_settings[aevc_access_key]' value='<?php echo $options['aevc_access_key']; ?>'>
    <?php

}


function aevc_secret_key_render(  ) {

    $options = get_option( 'aevc_settings' );
    ?>
    <input type='text' name='aevc_settings[aevc_secret_key]' value='<?php echo $options['aevc_secret_key']; ?>'>
    <?php

}


function aevc_associate_tag_render(  ) {

    $options = get_option( 'aevc_settings' );
    ?>
    <input type='text' name='aevc_settings[aevc_associate_tag]' value='<?php echo $options['aevc_associate_tag']; ?>'>
    <?php

}


function aevc_settings_section_callback(  ) {

    echo __( 'All the details below is required.', 'aevc' );

}


function authorityever_core_options_page(  ) {

    ?>
    <form action='options.php' method='post'>

        <h2>AuthorityEver Core</h2>

        <?php
        settings_fields( 'pluginPage' );
        do_settings_sections( 'pluginPage' );
        submit_button();
        ?>

    </form>
    <?php

}

?>