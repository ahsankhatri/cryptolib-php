# CryptoLib (PHP)

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ahsankhatri/cryptolib-php.svg?style=flat-square)](https://packagist.org/packages/ahsankhatri/cryptolib-php)
![tests](https://github.com/ahsankhatri/cryptolib-php/actions/workflows/php-test.yml/badge.svg)
[![Total Downloads](https://img.shields.io/packagist/dt/ahsankhatri/cryptolib-php.svg?style=flat-square)](https://packagist.org/packages/ahsankhatri/cryptolib-php)
[![License](https://poser.pugx.org/ahsankhatri/cryptolib-php/license?format=flat-square)](https://packagist.org/packages/ahsankhatri/cryptolib-php)


This is the library for encrypting data with a key (password will be generate as per your parameters set) in PHP.

**WHY ANOTHER LIBRARY?** This was intended to developed for cross-platform AES Encryption [here](https://github.com/skavinvarnan/Cross-Platform-AES) as PHP was missing. My main objective is to create library for `AES-256-CBC` to contribute PHP package for Cross-Platform-AES package, more features will be added whenever I gets time.

### Features

- Support for Random IV (initialization vector) for encryption and decryption. Randomization is crucial for encryption schemes to achieve semantic security, a property whereby repeated usage of the scheme under the same key does not allow an attacker to infer relationships between segments of the encrypted message.
- Support for SHA-256 for hashing the key. Never use plain text as encryption key. Always hash the plain text key and then use for encryption. AES permits the use of 256-bit keys. Breaking a symmetric 256-bit key by brute force requires 2^128 times more computational power than a 128-bit key. A device that could check a billion billion (10^18) AES keys per second would in theory require about 3×10^51 years to exhaust the 256-bit key space.
- PHP-7 Support since `mcrypt` has been deprecated.

## Installation

You can install the package via composer:

```bash
composer require ahsankhatri/cryptolib-php
```

## Dependencies

The bindings require the following extensions in order to work properly:

- [`openssl`](https://secure.php.net/manual/en/book.openssl.php)

If you use Composer, these dependencies should be handled automatically. If you install manually, you'll want to make sure that these extensions are available.

## Usage

#### With Random IV

``` php
$string     = 'The quick brown fox jumps over to the lazy dog.';
$secretyKey = 'BlVssQKxzAHFAUNZbqvwS+yKw/m';

$encryption = new \MrShan0\CryptoLib\CryptoLib();

$cipher  = $encryption->encryptPlainTextWithRandomIV($string, $secretyKey);
echo 'Cipher: ' . $cipher . PHP_EOL;

$plainText = $encryption->decryptCipherTextWithRandomIV($cipher, $secretyKey);
echo 'Decrypted: ' . $plainText . PHP_EOL;
```

#### With Generated IV

``` php
$string     = 'The quick brown fox jumps over to the lazy dog.';
$secretyKey = 'BlVssQKxzAHFAUNZbqvwS+yKw/m';

$encryption = new \MrShan0\CryptoLib\CryptoLib();
$iv         = $encryption->generateRandomIV();

$cipher = $encryption->encrypt($string, $secretyKey, $iv);
echo 'Cipher: ' . $cipher . PHP_EOL;

$plainText = $encryption->decrypt($cipher, $secretyKey, $iv);
echo 'Decrypted: ' . $plainText . PHP_EOL;
```

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email ahsankhatri1992@gmail.com instead of using the issue tracker.

## Credits

- [Ahsaan Muhammad Yousuf](https://ahsaan.me)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
