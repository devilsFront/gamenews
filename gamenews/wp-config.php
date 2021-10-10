<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'gamenews' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'MarkAdmin' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', '~U#UGqpy@H4MHX' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'sPe!@(kQY3F%gn&o24*[e&X;|~u.7xY!A`T~Y5sEF.r$fEuQFO~H;/EJ%{+MwN7W' );
define( 'SECURE_AUTH_KEY',  '?1mXdFLY!@z% tU{[DZh^Le{76C?x{yC@#&V5j6]b4Rl&=~s(AM/Mfk/#]LaCmE(' );
define( 'LOGGED_IN_KEY',    'k8N=W&aG)=m:!plfT_RM]*n|*2-gP!6b$p.<GJ}R>gv_D(Lsy)h@.B.bprD30>(}' );
define( 'NONCE_KEY',        '~F#R+rEG;%Gr/q C;F08GmB!]P9VAk@RS{f=MUAk2T2)x-e4C RP6sX1w@Yth8}m' );
define( 'AUTH_SALT',        'GW8cJYdOJy!RibD/V3zTFA%ChLjt;w-e P>W ^t*fvph4P!|-Hw0Wj26XS%pf_/,' );
define( 'SECURE_AUTH_SALT', 'G$)y1FrdY_g%L,bkHz3SY4n.OdIDy@39`,c6[`N|XFH.HuE#`xzV^zrRhdv!3@z}' );
define( 'LOGGED_IN_SALT',   '49LdqmoxEo-0/>Vf|!e$v3,2-JpgJ;oT/).=DR8%P=TD1JL{?Mtomv|rUQ@Z;E`Z' );
define( 'NONCE_SALT',       'kIZLGZ-b79(Vc.O:{)EnWPdZ1}V0uwXWT@2h!OUDYm-s_QdYc0p9}^@`:Qv={oED' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
