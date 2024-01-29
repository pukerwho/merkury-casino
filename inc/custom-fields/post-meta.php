<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_post_theme_options' );
function crb_post_theme_options() {
  Container::make( 'post_meta', 'More' )
    ->where( 'post_type', '=', 'post' )
    ->add_fields( array(
      Field::make( 'text', 'crb_post_title', 'Title' ),
      Field::make( 'textarea', 'crb_post_description', 'Description' ),
      Field::make( 'text', 'crb_post_keywords', 'Keywords' ),
      Field::make( 'text', 'crb_post_author', 'Автор' ),
      Field::make( 'text', 'crb_post_author_instagram', 'Інстаграм автора' ),
      Field::make( 'text', 'crb_post_author_facebook', 'Фейсбук автора' ),
  ) );
  Container::make( 'post_meta', 'More' )
    ->where( 'post_type', '=', 'slots' )
    ->add_tab( __('Info'), array(
      Field::make( 'image', 'crb_slot_cover', 'Обложка' )->set_value_type( 'url'),
      Field::make( 'text', 'crb_slot_link', 'Посилання' ),
      Field::make( 'textarea', 'crb_slot_opys', 'Короткий опис' ),
      Field::make( 'rich_text', 'crb_slot_rules', 'Правила та стратегія' ),
      Field::make( 'text', 'crb_slot_date', 'Дата створення' ),
      Field::make( 'text', 'crb_slot_rtp', 'RTP' ),
      Field::make( 'text', 'crb_slot_volatilyti', 'Волатильність' ),
      Field::make( 'text', 'crb_slot_maxwin', 'Максимальний виграш' ),
      Field::make( 'text', 'crb_slot_qtyline', 'Кількість ліній' ),
      Field::make( 'text', 'crb_slot_gamepole', 'Ігрове поле' ),
      Field::make( 'text', 'crb_slot_popular', 'Популярність' ),
      Field::make( 'multiselect', 'crb_slot_lang', 'Мова' )
      ->add_options( array(
        'Українська' => 'Українська',
        'Російська' => 'Російська',
        'Англійська' => 'Англійська',
      ) ),
    ))
    ->add_tab( __('Rating'), array(
      Field::make( 'text', 'crb_slot_rating_gameplay', 'Геймплей' ),
      Field::make( 'text', 'crb_slot_rating_theme', 'Загальна тема гри' ),
      Field::make( 'text', 'crb_slot_rating_design', 'Дизайн та графіка' ),
      Field::make( 'text', 'crb_slot_rating_audio', 'Звукові ефекти' ),
      Field::make( 'text', 'crb_slot_rating_music', 'Музика' ),
      Field::make( 'text', 'crb_slot_rating_bonus', 'Бонуси та фічі' ),
      Field::make( 'text', 'crb_slot_rating_difficult', 'Рівень складності' ),
      Field::make( 'text', 'crb_slot_rating_original', 'Оригінальність' ),
      Field::make( 'text', 'crb_slot_rating', 'Рейтинг' ),
      Field::make( 'text', 'crb_slot_rating_qty', 'Кількість відгуків' ),
    ))
    ->add_tab( __('FAQ'), array(
      Field::make( 'complex', 'crb_slot_faq', 'Питання/Відповіді' )
        ->add_fields( array(
          Field::make( 'text', 'crb_slot_faq_question', 'Питання' ),
          Field::make( 'textarea', 'crb_slot_faq_answer', 'Відповідь' ),
      ) ),
    ))
    ->add_tab( __('Переваги/Недоліки'), array(
      Field::make( 'complex', 'crb_slots_pros', 'Переваги' )
        ->add_fields( array(
          Field::make( 'text', 'crb_slots_pros_item', 'Перевага' ),
      ) ),
      Field::make( 'complex', 'crb_slots_cons', 'Недоліки' )
        ->add_fields( array(
          Field::make( 'text', 'crb_slots_cons_item', 'Недолік' ),
      ) ),
  ));

	Container::make( 'post_meta', 'More' )
    ->where( 'post_type', '=', 'casino' )
    ->add_fields( array(
      Field::make( 'html', 'crb_seo_casino_seo', __( 'SEO' ) )->set_html( sprintf( '<b>ℹ️ SEO</b>' ) ),
      Field::make( 'text', 'crb_casino_title', 'Title' ),
      Field::make( 'textarea', 'crb_casino_description', 'Description' ),

      Field::make( 'html', 'crb_seo_casino_settings', __( 'INFO' ) )->set_html( sprintf( '<b>ℹ️ INFO</b>' ) ),
      Field::make( 'image', 'crb_casino_logo', 'Лого' )->set_value_type( 'url'),
      Field::make( 'text', 'crb_casino_link', 'Посилання' ),
      Field::make( 'checkbox', 'crb_casino_check', 'Перевірено' ),
      Field::make( 'checkbox', 'crb_casino_licence', 'Ліцензія' ),
      Field::make( 'text', 'crb_casino_licence_text', 'Ліцензія - текст' ),
      Field::make( 'text', 'crb_casino_country', 'Країна' ),
      Field::make( 'text', 'crb_casino_urname', 'Юридична особа' ),
      Field::make( 'text', 'crb_casino_address', 'Місцезнаходження' ),
      Field::make( 'text', 'crb_casino_site', 'Офіційний сайт' ),
      Field::make( 'multiselect', 'crb_casino_registration', 'Реєстрація' )
      ->add_options( array(
        'Email' => 'Email',
        'Телефоном' => 'Телефоном',
        'Через Google-аккаунт' => 'Google-аккаунт',
        'Через соцмережі' => 'Соцмережі',
      ) ),
      Field::make( 'multiselect', 'crb_casino_verification', 'Верифікація' )
      ->add_options( array(
        'ДІЯ' => 'ДІЯ',
        'BankID' => 'BankID',
        'Паспорт або ID-картка' => 'Паспорт або ID-картка',
      ) ),
      Field::make( 'text', 'crb_casino_minage', 'Мінімальний вік' ),
      Field::make( 'text', 'crb_casino_mindep', 'Мінімальний депозит' ),
      Field::make( 'multiselect', 'crb_casino_platforms', 'Платформи' )
      ->add_options( array(
        'Android' => 'Android',
        'iOS' => 'iOS',
        'Windows' => 'Windows',
        'macOS' => 'macOS',
      ) ),
      Field::make( 'multiselect', 'crb_casino_curruncy', 'Валюта' )
      ->add_options( array(
        'Гривня' => 'Гривня',
        'Доллар' => 'Доллар',
        'Біткоін' => 'Біткоін',
      ) ),
      Field::make( 'text', 'crb_casino_minout', 'Мінімальна виплата' ),
      Field::make( 'multiselect', 'crb_casino_typein', 'Способи поповнення' )
      ->add_options( array(
        'MasterCard' => 'MasterCard',
        'Visa' => 'Visa',
        'Інтернет банкінг' => 'Інтернет банкінг',
        'Платіжні термінали' => 'Платіжні термінали',
        'Google Pay' => 'Google Pay',
        'Apple Pay' => 'Apple Pay',
        'Криптовалюта' => 'Криптовалюта',
      ) ),
      Field::make( 'multiselect', 'crb_casino_typeout', 'Способи виведення' )
      ->add_options( array(
        'MasterCard' => 'MasterCard',
        'Visa' => 'Visa',
        'Інтернет банкінг' => 'Інтернет банкінг',
        'Криптовалюта' => 'Криптовалюта',
      ) ),
      Field::make( 'text', 'crb_casino_speedout', 'Швидкість виводу' ),
      Field::make( 'checkbox', 'crb_casino_demomode', 'Чи є демо-режим' ),
      Field::make( 'multiselect', 'crb_casino_lang', 'Мова' )
      ->add_options( array(
        'Українська' => 'Українська',
        'Російська' => 'Російська',
        'Англійська' => 'Англійська',
      ) ),
      Field::make( 'html', 'crb_rating_casino', __( 'Rating' ) )->set_html( sprintf( '<b>ℹ️ RATING</b>' ) ),
      Field::make( 'text', 'crb_casino_rating_bonus', 'Бонуси та акції' ),
      Field::make( 'text', 'crb_casino_rating_ux', 'Зручність в користуванні' ),
      Field::make( 'text', 'crb_casino_dovira', 'Надійність та довіра' ),
      Field::make( 'text', 'crb_casino_pidtrimka', 'Служба підтримки' ),
      Field::make( 'text', 'crb_casino_rating', 'Рейтинг' ),

      Field::make( 'html', 'crb_faq_casino_settings', __( 'FAQ' ) )->set_html( sprintf( '<b>ℹ️ FAQ</b>' ) ),
      Field::make( 'complex', 'crb_casino_faq', 'Питання/Відповіді' )
        ->add_fields( array(
          Field::make( 'text', 'crb_casino_faq_question', 'Питання' ),
          Field::make( 'textarea', 'crb_casino_faq_answer', 'Відповідь' ),
      ) ),
      
      Field::make( 'complex', 'crb_casino_bonuses', 'Бонуси' )
        ->add_fields( array(
          Field::make( 'text', 'crb_casino_bonus', 'Бонус' ),
      ) ),
      Field::make( 'complex', 'crb_casino_pros', 'Переваги' )
        ->add_fields( array(
          Field::make( 'text', 'crb_casino_pros_item', 'Перевага' ),
      ) ),
      Field::make( 'complex', 'crb_casino_cons', 'Недоліки' )
        ->add_fields( array(
          Field::make( 'text', 'crb_casino_cons_item', 'Недолік' ),
      ) ),
      
  ) );
}

?>