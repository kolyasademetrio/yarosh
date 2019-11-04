<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'yarosh');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '<Jr)6ix<RQ ?i`sArJ)rFB)v+!A+5?6;dzl4l(%vO+@nQ4o$x}VW;R#uF?4DqgD:');
define('SECURE_AUTH_KEY',  '0MZj83OOVa>gbxq(L;|tV3TJiE2NefW+8@HMne]oW56CKNQ8WUuWi uWcGnN<H5m');
define('LOGGED_IN_KEY',    'IG>$DZ_P!s?iGbkB}NX3WRK~]o-,EVN+hK!n)8%a|UzqwbkNnfTd1G5W7<galT]^');
define('NONCE_KEY',        'eir;{0| RI_a@,O>`u3Qyo)/8a}((2A$wk|TtHhWJJY|9(l0PZ%G=Lf|YBtO(b10');
define('AUTH_SALT',        'bE9M `*5duX5zbl[_4*j,2x+}cry%hHHxGdx$PinP9)RoqK0HJJfJr:0$.UUNKBv');
define('SECURE_AUTH_SALT', 'z:#JGC,=8{~^@$pB80f]235o;4g/+QGcyVFJXr(>b7UY*ACZ%w #tZstW8wPHwx@');
define('LOGGED_IN_SALT',   'Fs]4]7.ioKfhHA{IFtigH}|4.3Hq%aW*P`D$M`)yFrKL9&pQcOZE8R?sB7p.C>ri');
define('NONCE_SALT',       'g|6)R%wYCQFz:q{B#f;pCM,w>BPxA*E.UX8 *>;osK{r(0c.g3xZcTvGzPVSreK)');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', true);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
