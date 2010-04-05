<?php
/**
 * OWASP Enterprise Security API (ESAPI)
 *
 * This file is part of the Open Web Application Security Project (OWASP)
 * Enterprise Security API (ESAPI) project.
 *
 * LICENSE: This source file is subject to the New BSD license.  You should read
 * and accept the LICENSE before you use, modify, and/or redistribute this
 * software.
 *
 * @category  OWASP
 * @package   ESAPI
 * @author    Jeff Williams <jeff.williams@aspectsecurity.com>
 * @author    Kevin Wall <kevin.w.wall@gmail.com>
 * @author    Andrew van der Stock <vanderaj@owasp.org>
 * @author    Arnaud Labenne <arnaud.labenne@dotsafe.fr>
 * @copyright 2009-2010 The OWASP Foundation
 * @license   http://www.opensource.org/licenses/bsd-license.php New BSD license
 * @link      http://www.owasp.org/index.php/ESAPI
 * 
 */


/**
 * Implementations will require EncryptionException and IntegrityException.
 */
require_once dirname(__FILE__).'/errors/EncryptionException.php';
require_once dirname(__FILE__).'/errors/IntegrityException.php';


/**
 * The Encryptor interface provides a set of methods for performing common
 * encryption, random number, and hashing operations. Implementations should
 * rely on a strong cryptographic implementation, such as JCE or BouncyCastle.
 * Implementors should take care to ensure that they initialize their
 * implementation with a strong "master key", and that they protect this secret
 * as much as possible.
 * <P>
 * <img src="doc-files/Encryptor.jpg">
 * <P>
 * Possible future enhancements (depending on feedback) might include:
 * <UL>
 * <LI>encryptFile</LI>
 * </UL>
 *
 * PHP version 5.2.9
 *
 * @category  OWASP
 * @package   ESAPI
 * @version   1.0
 * @author    Jeff Williams <jeff.williams@aspectsecurity.com>
 * @author    Kevin Wall <kevin.w.wall@gmail.com>
 * @author    Andrew van der Stock <vanderaj@owasp.org>
 * @author    Arnaud Labenne <arnaud.labenne@dotsafe.fr>
 * @copyright 2009-2010 The OWASP Foundation
 * @license   http://www.opensource.org/licenses/bsd-license.php New BSD license
 * @link      http://www.owasp.org/index.php/ESAPI
 */
interface Encryptor
{
    
    //getCrypto supports 
    const ESAPI_CRYPTO_OP_ENCRYPT_ASCII_HEX = 'ESAPI_CRYPTO_OP_ENCRYPT_ASCII_HEX';
    const ESAPI_CRYPTO_OP_DECRYPT_ASCII_HEX = 'ESAPI_CRYPTO_OP_DECRYPT_ASCII_HEX';
    const ESAPI_CRYPTO_OP_HASH_ASCII_HEX = 'ESAPI_CRYPTO_OP_HASH_ASCII_HEX';
    
    //A long list of supported encryption algorithm
    const ESAPI_CRYPTO_MODE_SHA1 = 'ESAPI_CRYPTO_MODE_SHA1';
    const ESAPI_CRYPTO_MODE_CAST_128_CBC = 'ESAPI_CRYPTO_MODE_CAST-128_CBC';
    const ESAPI_CRYPTO_MODE_CAST_128_CFB = 'ESAPI_CRYPTO_MODE_CAST-128_CFB';
    const ESAPI_CRYPTO_MODE_CAST_128_CTR = 'ESAPI_CRYPTO_MODE_CAST-128_CTR';
    const ESAPI_CRYPTO_MODE_CAST_128_ECB = 'ESAPI_CRYPTO_MODE_CAST-128_ECB';
    const ESAPI_CRYPTO_MODE_CAST_128_NCFB = 'ESAPI_CRYPTO_MODE_CAST-128_NCFB';
    const ESAPI_CRYPTO_MODE_CAST_128_NOFB = 'ESAPI_CRYPTO_MODE_CAST-128_NOFB';
    const ESAPI_CRYPTO_MODE_CAST_128_OFB = 'ESAPI_CRYPTO_MODE_CAST-128_OFB';
    const ESAPI_CRYPTO_MODE_CAST_128_STREAM = 'ESAPI_CRYPTO_MODE_CAST-128_STREAM';
    const ESAPI_CRYPTO_MODE_GOST_CBC = 'ESAPI_CRYPTO_MODE_GOST_CBC';
    const ESAPI_CRYPTO_MODE_GOST_CFB = 'ESAPI_CRYPTO_MODE_GOST_CFB';
    const ESAPI_CRYPTO_MODE_GOST_CTR = 'ESAPI_CRYPTO_MODE_GOST_CTR';
    const ESAPI_CRYPTO_MODE_GOST_ECB = 'ESAPI_CRYPTO_MODE_GOST_ECB';
    const ESAPI_CRYPTO_MODE_GOST_NCFB = 'ESAPI_CRYPTO_MODE_GOST_NCFB';
    const ESAPI_CRYPTO_MODE_GOST_NOFB = 'ESAPI_CRYPTO_MODE_GOST_NOFB';
    const ESAPI_CRYPTO_MODE_GOST_OFB = 'ESAPI_CRYPTO_MODE_GOST_OFB';
    const ESAPI_CRYPTO_MODE_GOST_STREAM = 'ESAPI_CRYPTO_MODE_GOST_STREAM';
    const ESAPI_CRYPTO_MODE_RIJNDAEL_128_CBC = 'ESAPI_CRYPTO_MODE_RIJNDAEL-128_CBC';
    const ESAPI_CRYPTO_MODE_RIJNDAEL_128_CFB = 'ESAPI_CRYPTO_MODE_RIJNDAEL-128_CFB';
    const ESAPI_CRYPTO_MODE_RIJNDAEL_128_CTR = 'ESAPI_CRYPTO_MODE_RIJNDAEL-128_CTR';
    const ESAPI_CRYPTO_MODE_RIJNDAEL_128_ECB = 'ESAPI_CRYPTO_MODE_RIJNDAEL-128_ECB';
    const ESAPI_CRYPTO_MODE_RIJNDAEL_128_NCFB = 'ESAPI_CRYPTO_MODE_RIJNDAEL-128_NCFB';
    const ESAPI_CRYPTO_MODE_RIJNDAEL_128_NOFB = 'ESAPI_CRYPTO_MODE_RIJNDAEL-128_NOFB';
    const ESAPI_CRYPTO_MODE_RIJNDAEL_128_OFB = 'ESAPI_CRYPTO_MODE_RIJNDAEL-128_OFB';
    const ESAPI_CRYPTO_MODE_RIJNDAEL_128_STREAM = 'ESAPI_CRYPTO_MODE_RIJNDAEL-128_STREAM';
    const ESAPI_CRYPTO_MODE_TWOFISH_CBC = 'ESAPI_CRYPTO_MODE_TWOFISH_CBC';
    const ESAPI_CRYPTO_MODE_TWOFISH_CFB = 'ESAPI_CRYPTO_MODE_TWOFISH_CFB';
    const ESAPI_CRYPTO_MODE_TWOFISH_CTR = 'ESAPI_CRYPTO_MODE_TWOFISH_CTR';
    const ESAPI_CRYPTO_MODE_TWOFISH_ECB = 'ESAPI_CRYPTO_MODE_TWOFISH_ECB';
    const ESAPI_CRYPTO_MODE_TWOFISH_NCFB = 'ESAPI_CRYPTO_MODE_TWOFISH_NCFB';
    const ESAPI_CRYPTO_MODE_TWOFISH_NOFB = 'ESAPI_CRYPTO_MODE_TWOFISH_NOFB';
    const ESAPI_CRYPTO_MODE_TWOFISH_OFB = 'ESAPI_CRYPTO_MODE_TWOFISH_OFB';
    const ESAPI_CRYPTO_MODE_TWOFISH_STREAM = 'ESAPI_CRYPTO_MODE_TWOFISH_STREAM';
    const ESAPI_CRYPTO_MODE_ARCFOUR_CBC = 'ESAPI_CRYPTO_MODE_ARCFOUR_CBC';
    const ESAPI_CRYPTO_MODE_ARCFOUR_CFB = 'ESAPI_CRYPTO_MODE_ARCFOUR_CFB';
    const ESAPI_CRYPTO_MODE_ARCFOUR_CTR = 'ESAPI_CRYPTO_MODE_ARCFOUR_CTR';
    const ESAPI_CRYPTO_MODE_ARCFOUR_ECB = 'ESAPI_CRYPTO_MODE_ARCFOUR_ECB';
    const ESAPI_CRYPTO_MODE_ARCFOUR_NCFB = 'ESAPI_CRYPTO_MODE_ARCFOUR_NCFB';
    const ESAPI_CRYPTO_MODE_ARCFOUR_NOFB = 'ESAPI_CRYPTO_MODE_ARCFOUR_NOFB';
    const ESAPI_CRYPTO_MODE_ARCFOUR_OFB = 'ESAPI_CRYPTO_MODE_ARCFOUR_OFB';
    const ESAPI_CRYPTO_MODE_ARCFOUR_STREAM = 'ESAPI_CRYPTO_MODE_ARCFOUR_STREAM';
    const ESAPI_CRYPTO_MODE_CAST_256_CBC = 'ESAPI_CRYPTO_MODE_CAST-256_CBC';
    const ESAPI_CRYPTO_MODE_CAST_256_CFB = 'ESAPI_CRYPTO_MODE_CAST-256_CFB';
    const ESAPI_CRYPTO_MODE_CAST_256_CTR = 'ESAPI_CRYPTO_MODE_CAST-256_CTR';
    const ESAPI_CRYPTO_MODE_CAST_256_ECB = 'ESAPI_CRYPTO_MODE_CAST-256_ECB';
    const ESAPI_CRYPTO_MODE_CAST_256_NCFB = 'ESAPI_CRYPTO_MODE_CAST-256_NCFB';
    const ESAPI_CRYPTO_MODE_CAST_256_NOFB = 'ESAPI_CRYPTO_MODE_CAST-256_NOFB';
    const ESAPI_CRYPTO_MODE_CAST_256_OFB = 'ESAPI_CRYPTO_MODE_CAST-256_OFB';
    const ESAPI_CRYPTO_MODE_CAST_256_STREAM = 'ESAPI_CRYPTO_MODE_CAST-256_STREAM';
    const ESAPI_CRYPTO_MODE_LOKI97_CBC = 'ESAPI_CRYPTO_MODE_LOKI97_CBC';
    const ESAPI_CRYPTO_MODE_LOKI97_CFB = 'ESAPI_CRYPTO_MODE_LOKI97_CFB';
    const ESAPI_CRYPTO_MODE_LOKI97_CTR = 'ESAPI_CRYPTO_MODE_LOKI97_CTR';
    const ESAPI_CRYPTO_MODE_LOKI97_ECB = 'ESAPI_CRYPTO_MODE_LOKI97_ECB';
    const ESAPI_CRYPTO_MODE_LOKI97_NCFB = 'ESAPI_CRYPTO_MODE_LOKI97_NCFB';
    const ESAPI_CRYPTO_MODE_LOKI97_NOFB = 'ESAPI_CRYPTO_MODE_LOKI97_NOFB';
    const ESAPI_CRYPTO_MODE_LOKI97_OFB = 'ESAPI_CRYPTO_MODE_LOKI97_OFB';
    const ESAPI_CRYPTO_MODE_LOKI97_STREAM = 'ESAPI_CRYPTO_MODE_LOKI97_STREAM';
    const ESAPI_CRYPTO_MODE_RIJNDAEL_192_CBC = 'ESAPI_CRYPTO_MODE_RIJNDAEL-192_CBC';
    const ESAPI_CRYPTO_MODE_RIJNDAEL_192_CFB = 'ESAPI_CRYPTO_MODE_RIJNDAEL-192_CFB';
    const ESAPI_CRYPTO_MODE_RIJNDAEL_192_CTR = 'ESAPI_CRYPTO_MODE_RIJNDAEL-192_CTR';
    const ESAPI_CRYPTO_MODE_RIJNDAEL_192_ECB = 'ESAPI_CRYPTO_MODE_RIJNDAEL-192_ECB';
    const ESAPI_CRYPTO_MODE_RIJNDAEL_192_NCFB = 'ESAPI_CRYPTO_MODE_RIJNDAEL-192_NCFB';
    const ESAPI_CRYPTO_MODE_RIJNDAEL_192_NOFB = 'ESAPI_CRYPTO_MODE_RIJNDAEL-192_NOFB';
    const ESAPI_CRYPTO_MODE_RIJNDAEL_192_OFB = 'ESAPI_CRYPTO_MODE_RIJNDAEL-192_OFB';
    const ESAPI_CRYPTO_MODE_RIJNDAEL_192_STREAM = 'ESAPI_CRYPTO_MODE_RIJNDAEL-192_STREAM';
    const ESAPI_CRYPTO_MODE_SAFERPLUS_CBC = 'ESAPI_CRYPTO_MODE_SAFERPLUS_CBC';
    const ESAPI_CRYPTO_MODE_SAFERPLUS_CFB = 'ESAPI_CRYPTO_MODE_SAFERPLUS_CFB';
    const ESAPI_CRYPTO_MODE_SAFERPLUS_CTR = 'ESAPI_CRYPTO_MODE_SAFERPLUS_CTR';
    const ESAPI_CRYPTO_MODE_SAFERPLUS_ECB = 'ESAPI_CRYPTO_MODE_SAFERPLUS_ECB';
    const ESAPI_CRYPTO_MODE_SAFERPLUS_NCFB = 'ESAPI_CRYPTO_MODE_SAFERPLUS_NCFB';
    const ESAPI_CRYPTO_MODE_SAFERPLUS_NOFB = 'ESAPI_CRYPTO_MODE_SAFERPLUS_NOFB';
    const ESAPI_CRYPTO_MODE_SAFERPLUS_OFB = 'ESAPI_CRYPTO_MODE_SAFERPLUS_OFB';
    const ESAPI_CRYPTO_MODE_SAFERPLUS_STREAM = 'ESAPI_CRYPTO_MODE_SAFERPLUS_STREAM';
    const ESAPI_CRYPTO_MODE_WAKE_CBC = 'ESAPI_CRYPTO_MODE_WAKE_CBC';
    const ESAPI_CRYPTO_MODE_WAKE_CFB = 'ESAPI_CRYPTO_MODE_WAKE_CFB';
    const ESAPI_CRYPTO_MODE_WAKE_CTR = 'ESAPI_CRYPTO_MODE_WAKE_CTR';
    const ESAPI_CRYPTO_MODE_WAKE_ECB = 'ESAPI_CRYPTO_MODE_WAKE_ECB';
    const ESAPI_CRYPTO_MODE_WAKE_NCFB = 'ESAPI_CRYPTO_MODE_WAKE_NCFB';
    const ESAPI_CRYPTO_MODE_WAKE_NOFB = 'ESAPI_CRYPTO_MODE_WAKE_NOFB';
    const ESAPI_CRYPTO_MODE_WAKE_OFB = 'ESAPI_CRYPTO_MODE_WAKE_OFB';
    const ESAPI_CRYPTO_MODE_WAKE_STREAM = 'ESAPI_CRYPTO_MODE_WAKE_STREAM';
    const ESAPI_CRYPTO_MODE_BLOWFISH_COMPAT_CBC = 'ESAPI_CRYPTO_MODE_BLOWFISH-COMPAT_CBC';
    const ESAPI_CRYPTO_MODE_BLOWFISH_COMPAT_CFB = 'ESAPI_CRYPTO_MODE_BLOWFISH-COMPAT_CFB';
    const ESAPI_CRYPTO_MODE_BLOWFISH_COMPAT_CTR = 'ESAPI_CRYPTO_MODE_BLOWFISH-COMPAT_CTR';
    const ESAPI_CRYPTO_MODE_BLOWFISH_COMPAT_ECB = 'ESAPI_CRYPTO_MODE_BLOWFISH-COMPAT_ECB';
    const ESAPI_CRYPTO_MODE_BLOWFISH_COMPAT_NCFB = 'ESAPI_CRYPTO_MODE_BLOWFISH-COMPAT_NCFB';
    const ESAPI_CRYPTO_MODE_BLOWFISH_COMPAT_NOFB = 'ESAPI_CRYPTO_MODE_BLOWFISH-COMPAT_NOFB';
    const ESAPI_CRYPTO_MODE_BLOWFISH_COMPAT_OFB = 'ESAPI_CRYPTO_MODE_BLOWFISH-COMPAT_OFB';
    const ESAPI_CRYPTO_MODE_BLOWFISH_COMPAT_STREAM = 'ESAPI_CRYPTO_MODE_BLOWFISH-COMPAT_STREAM';
    const ESAPI_CRYPTO_MODE_DES_CBC = 'ESAPI_CRYPTO_MODE_DES_CBC';
    const ESAPI_CRYPTO_MODE_DES_CFB = 'ESAPI_CRYPTO_MODE_DES_CFB';
    const ESAPI_CRYPTO_MODE_DES_CTR = 'ESAPI_CRYPTO_MODE_DES_CTR';
    const ESAPI_CRYPTO_MODE_DES_ECB = 'ESAPI_CRYPTO_MODE_DES_ECB';
    const ESAPI_CRYPTO_MODE_DES_NCFB = 'ESAPI_CRYPTO_MODE_DES_NCFB';
    const ESAPI_CRYPTO_MODE_DES_NOFB = 'ESAPI_CRYPTO_MODE_DES_NOFB';
    const ESAPI_CRYPTO_MODE_DES_OFB = 'ESAPI_CRYPTO_MODE_DES_OFB';
    const ESAPI_CRYPTO_MODE_DES_STREAM = 'ESAPI_CRYPTO_MODE_DES_STREAM';
    const ESAPI_CRYPTO_MODE_RIJNDAEL_256_CBC = 'ESAPI_CRYPTO_MODE_RIJNDAEL-256_CBC';
    const ESAPI_CRYPTO_MODE_RIJNDAEL_256_CFB = 'ESAPI_CRYPTO_MODE_RIJNDAEL-256_CFB';
    const ESAPI_CRYPTO_MODE_RIJNDAEL_256_CTR = 'ESAPI_CRYPTO_MODE_RIJNDAEL-256_CTR';
    const ESAPI_CRYPTO_MODE_RIJNDAEL_256_ECB = 'ESAPI_CRYPTO_MODE_RIJNDAEL-256_ECB';
    const ESAPI_CRYPTO_MODE_RIJNDAEL_256_NCFB = 'ESAPI_CRYPTO_MODE_RIJNDAEL-256_NCFB';
    const ESAPI_CRYPTO_MODE_RIJNDAEL_256_NOFB = 'ESAPI_CRYPTO_MODE_RIJNDAEL-256_NOFB';
    const ESAPI_CRYPTO_MODE_RIJNDAEL_256_OFB = 'ESAPI_CRYPTO_MODE_RIJNDAEL-256_OFB';
    const ESAPI_CRYPTO_MODE_RIJNDAEL_256_STREAM = 'ESAPI_CRYPTO_MODE_RIJNDAEL-256_STREAM';
    const ESAPI_CRYPTO_MODE_SERPENT_CBC = 'ESAPI_CRYPTO_MODE_SERPENT_CBC';
    const ESAPI_CRYPTO_MODE_SERPENT_CFB = 'ESAPI_CRYPTO_MODE_SERPENT_CFB';
    const ESAPI_CRYPTO_MODE_SERPENT_CTR = 'ESAPI_CRYPTO_MODE_SERPENT_CTR';
    const ESAPI_CRYPTO_MODE_SERPENT_ECB = 'ESAPI_CRYPTO_MODE_SERPENT_ECB';
    const ESAPI_CRYPTO_MODE_SERPENT_NCFB = 'ESAPI_CRYPTO_MODE_SERPENT_NCFB';
    const ESAPI_CRYPTO_MODE_SERPENT_NOFB = 'ESAPI_CRYPTO_MODE_SERPENT_NOFB';
    const ESAPI_CRYPTO_MODE_SERPENT_OFB = 'ESAPI_CRYPTO_MODE_SERPENT_OFB';
    const ESAPI_CRYPTO_MODE_SERPENT_STREAM = 'ESAPI_CRYPTO_MODE_SERPENT_STREAM';
    const ESAPI_CRYPTO_MODE_XTEA_CBC = 'ESAPI_CRYPTO_MODE_XTEA_CBC';
    const ESAPI_CRYPTO_MODE_XTEA_CFB = 'ESAPI_CRYPTO_MODE_XTEA_CFB';
    const ESAPI_CRYPTO_MODE_XTEA_CTR = 'ESAPI_CRYPTO_MODE_XTEA_CTR';
    const ESAPI_CRYPTO_MODE_XTEA_ECB = 'ESAPI_CRYPTO_MODE_XTEA_ECB';
    const ESAPI_CRYPTO_MODE_XTEA_NCFB = 'ESAPI_CRYPTO_MODE_XTEA_NCFB';
    const ESAPI_CRYPTO_MODE_XTEA_NOFB = 'ESAPI_CRYPTO_MODE_XTEA_NOFB';
    const ESAPI_CRYPTO_MODE_XTEA_OFB = 'ESAPI_CRYPTO_MODE_XTEA_OFB';
    const ESAPI_CRYPTO_MODE_XTEA_STREAM = 'ESAPI_CRYPTO_MODE_XTEA_STREAM';
    const ESAPI_CRYPTO_MODE_BLOWFISH_CBC = 'ESAPI_CRYPTO_MODE_BLOWFISH_CBC';
    const ESAPI_CRYPTO_MODE_BLOWFISH_CFB = 'ESAPI_CRYPTO_MODE_BLOWFISH_CFB';
    const ESAPI_CRYPTO_MODE_BLOWFISH_CTR = 'ESAPI_CRYPTO_MODE_BLOWFISH_CTR';
    const ESAPI_CRYPTO_MODE_BLOWFISH_ECB = 'ESAPI_CRYPTO_MODE_BLOWFISH_ECB';
    const ESAPI_CRYPTO_MODE_BLOWFISH_NCFB = 'ESAPI_CRYPTO_MODE_BLOWFISH_NCFB';
    const ESAPI_CRYPTO_MODE_BLOWFISH_NOFB = 'ESAPI_CRYPTO_MODE_BLOWFISH_NOFB';
    const ESAPI_CRYPTO_MODE_BLOWFISH_OFB = 'ESAPI_CRYPTO_MODE_BLOWFISH_OFB';
    const ESAPI_CRYPTO_MODE_BLOWFISH_STREAM = 'ESAPI_CRYPTO_MODE_BLOWFISH_STREAM';
    const ESAPI_CRYPTO_MODE_ENIGMA_CBC = 'ESAPI_CRYPTO_MODE_ENIGMA_CBC';
    const ESAPI_CRYPTO_MODE_ENIGMA_CFB = 'ESAPI_CRYPTO_MODE_ENIGMA_CFB';
    const ESAPI_CRYPTO_MODE_ENIGMA_CTR = 'ESAPI_CRYPTO_MODE_ENIGMA_CTR';
    const ESAPI_CRYPTO_MODE_ENIGMA_ECB = 'ESAPI_CRYPTO_MODE_ENIGMA_ECB';
    const ESAPI_CRYPTO_MODE_ENIGMA_NCFB = 'ESAPI_CRYPTO_MODE_ENIGMA_NCFB';
    const ESAPI_CRYPTO_MODE_ENIGMA_NOFB = 'ESAPI_CRYPTO_MODE_ENIGMA_NOFB';
    const ESAPI_CRYPTO_MODE_ENIGMA_OFB = 'ESAPI_CRYPTO_MODE_ENIGMA_OFB';
    const ESAPI_CRYPTO_MODE_ENIGMA_STREAM = 'ESAPI_CRYPTO_MODE_ENIGMA_STREAM';
    const ESAPI_CRYPTO_MODE_RC2_CBC = 'ESAPI_CRYPTO_MODE_RC2_CBC';
    const ESAPI_CRYPTO_MODE_RC2_CFB = 'ESAPI_CRYPTO_MODE_RC2_CFB';
    const ESAPI_CRYPTO_MODE_RC2_CTR = 'ESAPI_CRYPTO_MODE_RC2_CTR';
    const ESAPI_CRYPTO_MODE_RC2_ECB = 'ESAPI_CRYPTO_MODE_RC2_ECB';
    const ESAPI_CRYPTO_MODE_RC2_NCFB = 'ESAPI_CRYPTO_MODE_RC2_NCFB';
    const ESAPI_CRYPTO_MODE_RC2_NOFB = 'ESAPI_CRYPTO_MODE_RC2_NOFB';
    const ESAPI_CRYPTO_MODE_RC2_OFB = 'ESAPI_CRYPTO_MODE_RC2_OFB';
    const ESAPI_CRYPTO_MODE_RC2_STREAM = 'ESAPI_CRYPTO_MODE_RC2_STREAM';
    const ESAPI_CRYPTO_MODE_TRIPLEDES_CBC = 'ESAPI_CRYPTO_MODE_TRIPLEDES_CBC';
    const ESAPI_CRYPTO_MODE_TRIPLEDES_CFB = 'ESAPI_CRYPTO_MODE_TRIPLEDES_CFB';
    const ESAPI_CRYPTO_MODE_TRIPLEDES_CTR = 'ESAPI_CRYPTO_MODE_TRIPLEDES_CTR';
    const ESAPI_CRYPTO_MODE_TRIPLEDES_ECB = 'ESAPI_CRYPTO_MODE_TRIPLEDES_ECB';
    const ESAPI_CRYPTO_MODE_TRIPLEDES_NCFB = 'ESAPI_CRYPTO_MODE_TRIPLEDES_NCFB';
    const ESAPI_CRYPTO_MODE_TRIPLEDES_NOFB = 'ESAPI_CRYPTO_MODE_TRIPLEDES_NOFB';
    const ESAPI_CRYPTO_MODE_TRIPLEDES_OFB = 'ESAPI_CRYPTO_MODE_TRIPLEDES_OFB';
    const ESAPI_CRYPTO_MODE_TRIPLEDES_STREAM = 'ESAPI_CRYPTO_MODE_TRIPLEDES_STREAM';
    
    /**
    * @param string	$operation 
    * 			the operation to execute
    * @param string	$data 
    * 			the plaintext string to encrypt/decrypt/hash
    * 
    * @return string the encrypted/hashed string representation of 'plaintext'
    * 
    * @throws throw an exception if the operation does not exist
    */
    public function getCrypto($operation, $data);
    
    /**
    * Gets an absolute timestamp representing an offset from the current time to be used by
    * other functions in the library.
    * 
    * @param int $offset 
    * 			the offset to add to the current time
    * 
    * @return 
    * 			the absolute timestamp
    */
    function getRelativeTimeStamp($offset);


    /**
    * Gets a timestamp representing the current date and time to be used by
    * other functions in the library.
    * 
    * @return 
    *              a timestamp representing the current time
    */
    function getTimeStamp();   

}
?>