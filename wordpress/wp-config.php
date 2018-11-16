<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'wordpressArtisan');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', '');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'K1<&&.{1z Z_^glnu||w`^hf1Vj9iR6Q.}fKG;@u6RSrz,AZ(b%3=,f1:HG]-dpE');
define('SECURE_AUTH_KEY',  'ytac;We#kIFc-waj$*W){m;-D7Z|kh)&(_1W9<]8#FaC7>vc1q_=kkj:a`#{*h{d');
define('LOGGED_IN_KEY',    '!EjDk>9hg~GL~1Azs&Cdk]26kxZ9J#r[0H0w0B<ZS!ebp)7A|Ye!mRAXwPIZ:OfG');
define('NONCE_KEY',        '+G-[h;<271qP]_&k|icQTXRcrKr>X c*-0K-d-HO-=Z6(bokw#^;%27?0Ss^iOrz');
define('AUTH_SALT',        '`5|w&eAE.P2@T,syTg4b@LWzKtsrd[,tQi2[<dhb>vf%|tH8t%-NGXY0Pe8hrLlo');
define('SECURE_AUTH_SALT', 'gx%`=YKyWCTOW1Vgs[U~RCrZ^(?#RCXb4PIr;-[0r4qGfH{:fP=uzN3/%2TZ~o3.');
define('LOGGED_IN_SALT',   'skOXCQ/ZsjUAbB<xo5H/VJU+HES* Ju%E[k]E{ xDT,2DK#TI^8 kO/qxBckx|$w');
define('NONCE_SALT',       '>Lm2047b4T?c{BJMrwFT*.A*q7{#.r@X]3J7((2%fF AJxY,OoG]JpWn6*8/i]-o');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');