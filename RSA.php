<?php
/**
 * @author alun (http://alunblog.duapp.com)
 * @version 1.0
 * @created 2013-5-17
 */
 
class Rsa
{
private static $PRIVATE_KEY = '-----BEGIN PRIVATE KEY-----
MIICdgIBADANBgkqhkiG9w0BAQEFAASCAmAwggJcAgEAAoGBAM9nUm7rPNhSgvsd
jMuCd5E7IMJB/80A1YY7jYV9fBCKdhVKmqea26QYuw6FW7B00fppEUTSazduSmn9
Yvhx9UOCcI75b0nq9FWm5O4P+Kp8l31M1pwsJ3cm+DceGOrFsl47vh9idiqj+abI
lJ4sTmJmDghmbks9YFlZSndQsIBlAgMBAAECgYAasa6vbgF3yi7niScc7l7bR2Pw
/LOivA+/ZhzR6JO2QUvvc5myJsFMPo6c0Nc7P93iv/EkDX0VNlHHkIBTf79URHXM
gXwMad4pHAeOiqxk5A9w/szDCBoETngtoqQGJq+QINxwPVvDEO4i224Uj3MKg2fo
4SDy3P1GCAAj1ahNoQJBAP4FV9vLWdLOOwOLnBpXt6vru4HT5VIf9fCeBIemuQ4C
/yRtgU38zXWgZ8AAmS6EjBEUDnN/tWid6UBKfgPDwAkCQQDRBP+Y9wIYIaSxeL7B
nHhPT25yAJCGK+l6r2qeaHVQr81O9YjusEi8E2M5OxCRolKxC3L7hrLJX8z1oyOV
dNx9AkBqYGhzpgv+qNiz2mJL8dH8ECMc8lTFeJbw5eu1tw8mHAEnCyisNSMBkGQC
Vv3PKjjR6hlHKwMYRZDpmIh/IRmpAkEAr1soLGaeZSxkhVetgbUJ4k/bct0yYr4Y
ZQshwcAVHBpBforT1JwkiVUim3MIFYY/JbVbQ9XfzL4Ir9OsGMkv6QJAPaQnyNY5
/D0PhXqODOM6jtAHHRfaSi4gve6AZ0iRz6YlB8beJ1ywZaJZWD9Cuw3zy4dDpCOn
A4tBsIdpMMoT+w==
-----END PRIVATE KEY-----';
    /**
    *���ض�Ӧ��˽Կ
    */
    private static function getPrivateKey(){
    
        $privKey = self::$PRIVATE_KEY;
         
        return openssl_pkey_get_private($privKey);     
    }
 
    /**
     * ˽Կ����
     */
    public static function privEncrypt($data)
    {
        if(!is_string($data)){
                return null;
        }          
        return openssl_private_encrypt($data,$encrypted,self::getPrivateKey())? base64_encode($encrypted) : null;
    }
    
    
    /**
     * ˽Կ����
     */
    public static function privDecrypt($encrypted)
    {
        if(!is_string($encrypted)){
                return null;
        }
        return (openssl_private_decrypt(base64_decode($encrypted), $decrypted, self::getPrivateKey()))? $decrypted : null;
    }
}
?>