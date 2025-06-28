<?php

function create_menu_admin_mail_send_custom() {
    add_menu_page(
        __('VOG correo personalizado', 'vog-mail'),
        __('VOG correo personalizado', 'vog-mail'),
        'manage_options',
        'vog_conf_setup_mail_page',
        'vog_conf_setup_mail_page',
        'dashicons-email',
        10
    );

    add_submenu_page(
        'vog_conf_setup_mail_page',
        __('Configuracion General','vog'),
        __('Configuracion General','vog'),
        'manage_options',
        'vog_conf_setup_mail',
        'vog_conf_setup_mail'
    );

    add_submenu_page(
        'vog_conf_setup_mail_page',
        __('Test de correo','vog'),
        __('Test de correo','vog'),
        'manage_options',
        'vog_test_mail',
        'vog_test_mail'
    );


    remove_submenu_page('vog_conf_setup_mail_page','vog_conf_setup_mail_page');
}

add_action( 'admin_menu', 'create_menu_admin_mail_send_custom' );
