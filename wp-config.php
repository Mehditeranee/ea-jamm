<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'ea-jamm' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'root' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'Qr|o$^i*~e5&*ehc!wvVgBmyGb2|i+`/9&WK wSC+akc@<8ZGPOfan30oD;]tfb0' );
define( 'SECURE_AUTH_KEY',  '0X^V9C{gHSz(D<m#br[)!%V+H+O]&|h&b^;j9x]i~oMPDGIYQ#gWooA$yAL^B7(j' );
define( 'LOGGED_IN_KEY',    'F~8}KA!fIf3vSP/RAh+Anl6(3w.bPw%(qJ]hQ]!mjz$5=t3{?[Ywxj2ZEn`n[7@_' );
define( 'NONCE_KEY',        'P{,{126ElC4^g*UmMe_kV5QWaed#`SmQ.+Z2rXvP{sqOJbeG}l4Cp#HQKDr!RQjV' );
define( 'AUTH_SALT',        'bJy%IL0<!&FK*sbzmV7)]_Q2xsKj(dRXwyKg}%n)d@rN/cq}$fC}SakbU&yCAVF)' );
define( 'SECURE_AUTH_SALT', 'rxK;XyH=2+J?Oao>L^Q Mo!J_Q=`PMm1pR.PgVt:C~~ P3BJ2<RW&O8kC6t@4*!u' );
define( 'LOGGED_IN_SALT',   '$,IhAIsVhQN.?=%bg&U)Mi-X>c*xW5ud5scjLHg&kp7Sm;Q9WQ!<p@T? V};-d7G' );
define( 'NONCE_SALT',       'gDz|C}fsx-9o|U`&pfZcu*EH9`tJ_:K?{xvs#~P$($r)*LY%9-T+<^}8a>e5i+it' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );
define( 'WP_DEBUG_LOG', false );
define( 'WP_DEBUG_DISPLAY', false);
// @ini_set( 'display_errors',1 );

define( 'WP_MEMORY_LIMIT', '1024M' );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );
