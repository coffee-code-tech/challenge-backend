<?php return array(
    'root' => array(
        'name' => '__root__',
        'pretty_version' => '0.17.1',
        'version' => '0.17.1.0',
        'reference' => NULL,
        'type' => 'wordpress-plugin',
        'install_path' => __DIR__ . '/../../',
        'aliases' => array(),
        'dev' => true,
    ),
    'versions' => array(
        '__root__' => array(
            'pretty_version' => '0.17.1',
            'version' => '0.17.1.0',
            'reference' => NULL,
            'type' => 'wordpress-plugin',
            'install_path' => __DIR__ . '/../../',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'composer/installers' => array(
            'pretty_version' => 'v1.12.0',
            'version' => '1.12.0.0',
            'reference' => 'd20a64ed3c94748397ff5973488761b22f6d3f19',
            'type' => 'composer-plugin',
            'install_path' => __DIR__ . '/./installers',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'dealerdirect/phpcodesniffer-composer-installer' => array(
            'pretty_version' => 'v0.7.2',
            'version' => '0.7.2.0',
            'reference' => '1c968e542d8843d7cd71de3c5c9c3ff3ad71a1db',
            'type' => 'composer-plugin',
            'install_path' => __DIR__ . '/../dealerdirect/phpcodesniffer-composer-installer',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'filp/whoops' => array(
            'pretty_version' => '2.13.0',
            'version' => '2.13.0.0',
            'reference' => '2edbc73a4687d9085c8f20f398eebade844e8424',
            'type' => 'library',
            'install_path' => __DIR__ . '/../filp/whoops',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'guzzlehttp/psr7' => array(
            'pretty_version' => '1.9.1',
            'version' => '1.9.1.0',
            'reference' => 'e4490cabc77465aaee90b20cfc9a770f8c04be6b',
            'type' => 'library',
            'install_path' => __DIR__ . '/../guzzlehttp/psr7',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'htmlburger/carbon-fields' => array(
            'pretty_version' => 'v3.6.0',
            'version' => '3.6.0.0',
            'reference' => '47f1538cca6cd2860d1b37a040a42c59eb798d76',
            'type' => 'library',
            'install_path' => __DIR__ . '/../htmlburger/carbon-fields',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'htmlburger/wpemerge' => array(
            'pretty_version' => '0.17.0',
            'version' => '0.17.0.0',
            'reference' => '2773fba0b4717f28d40dd3c2013b61385499f7e3',
            'type' => 'library',
            'install_path' => __DIR__ . '/../htmlburger/wpemerge',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'htmlburger/wpemerge-app-core' => array(
            'pretty_version' => '0.17.0',
            'version' => '0.17.0.0',
            'reference' => 'eb6d723e9b9f3efb12125a213ae13b3a7dd3f443',
            'type' => 'library',
            'install_path' => __DIR__ . '/../htmlburger/wpemerge-app-core',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'htmlburger/wpemerge-cli' => array(
            'pretty_version' => '0.17.0',
            'version' => '0.17.0.0',
            'reference' => 'a2546ca1bbafb34d7d934a614ca3f0810847e841',
            'type' => 'library',
            'install_path' => __DIR__ . '/../htmlburger/wpemerge-cli',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'pimple/pimple' => array(
            'pretty_version' => 'v3.5.0',
            'version' => '3.5.0.0',
            'reference' => 'a94b3a4db7fb774b3d78dad2315ddc07629e1bed',
            'type' => 'library',
            'install_path' => __DIR__ . '/../pimple/pimple',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'psr/container' => array(
            'pretty_version' => '1.1.2',
            'version' => '1.1.2.0',
            'reference' => '513e0666f7216c7459170d56df27dfcefe1689ea',
            'type' => 'library',
            'install_path' => __DIR__ . '/../psr/container',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'psr/http-message' => array(
            'pretty_version' => '1.1',
            'version' => '1.1.0.0',
            'reference' => 'cb6ce4845ce34a8ad9e68117c10ee90a29919eba',
            'type' => 'library',
            'install_path' => __DIR__ . '/../psr/http-message',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'psr/http-message-implementation' => array(
            'dev_requirement' => false,
            'provided' => array(
                0 => '1.0',
            ),
        ),
        'psr/log' => array(
            'pretty_version' => '1.1.4',
            'version' => '1.1.4.0',
            'reference' => 'd49695b909c3b7628b6289db5479a1c204601f11',
            'type' => 'library',
            'install_path' => __DIR__ . '/../psr/log',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'psr/log-implementation' => array(
            'dev_requirement' => true,
            'provided' => array(
                0 => '1.0|2.0',
            ),
        ),
        'ralouphie/getallheaders' => array(
            'pretty_version' => '3.0.3',
            'version' => '3.0.3.0',
            'reference' => '120b605dfeb996808c31b6477290a714d356e822',
            'type' => 'library',
            'install_path' => __DIR__ . '/../ralouphie/getallheaders',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'roundcube/plugin-installer' => array(
            'dev_requirement' => false,
            'replaced' => array(
                0 => '*',
            ),
        ),
        'shama/baton' => array(
            'dev_requirement' => false,
            'replaced' => array(
                0 => '*',
            ),
        ),
        'squizlabs/php_codesniffer' => array(
            'pretty_version' => '3.7.2',
            'version' => '3.7.2.0',
            'reference' => 'ed8e00df0a83aa96acf703f8c2979ff33341f879',
            'type' => 'library',
            'install_path' => __DIR__ . '/../squizlabs/php_codesniffer',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'symfony/console' => array(
            'pretty_version' => 'v5.4.26',
            'version' => '5.4.26.0',
            'reference' => 'b504a3d266ad2bb632f196c0936ef2af5ff6e273',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/console',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'symfony/debug' => array(
            'pretty_version' => 'v3.4.47',
            'version' => '3.4.47.0',
            'reference' => 'ab42889de57fdfcfcc0759ab102e2fd4ea72dcae',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/debug',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'symfony/deprecation-contracts' => array(
            'pretty_version' => 'v3.3.0',
            'version' => '3.3.0.0',
            'reference' => '7c3aff79d10325257a001fcf92d991f24fc967cf',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/deprecation-contracts',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'symfony/polyfill-ctype' => array(
            'pretty_version' => 'v1.27.0',
            'version' => '1.27.0.0',
            'reference' => '5bbc823adecdae860bb64756d639ecfec17b050a',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/polyfill-ctype',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'symfony/polyfill-intl-grapheme' => array(
            'pretty_version' => 'v1.27.0',
            'version' => '1.27.0.0',
            'reference' => '511a08c03c1960e08a883f4cffcacd219b758354',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/polyfill-intl-grapheme',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'symfony/polyfill-intl-normalizer' => array(
            'pretty_version' => 'v1.27.0',
            'version' => '1.27.0.0',
            'reference' => '19bd1e4fcd5b91116f14d8533c57831ed00571b6',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/polyfill-intl-normalizer',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'symfony/polyfill-mbstring' => array(
            'pretty_version' => 'v1.27.0',
            'version' => '1.27.0.0',
            'reference' => '8ad114f6b39e2c98a8b0e3bd907732c207c2b534',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/polyfill-mbstring',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'symfony/polyfill-php73' => array(
            'pretty_version' => 'v1.27.0',
            'version' => '1.27.0.0',
            'reference' => '9e8ecb5f92152187c4799efd3c96b78ccab18ff9',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/polyfill-php73',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'symfony/polyfill-php80' => array(
            'pretty_version' => 'v1.27.0',
            'version' => '1.27.0.0',
            'reference' => '7a6ff3f1959bb01aefccb463a0f2cd3d3d2fd936',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/polyfill-php80',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'symfony/process' => array(
            'pretty_version' => 'v5.4.26',
            'version' => '5.4.26.0',
            'reference' => '1a44dc377ec86a50fab40d066cd061e28a6b482f',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/process',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'symfony/service-contracts' => array(
            'pretty_version' => 'v2.5.2',
            'version' => '2.5.2.0',
            'reference' => '4b426aac47d6427cc1a1d0f7e2ac724627f5966c',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/service-contracts',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'symfony/string' => array(
            'pretty_version' => 'v6.3.2',
            'version' => '6.3.2.0',
            'reference' => '53d1a83225002635bca3482fcbf963001313fb68',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/string',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'wp-coding-standards/wpcs' => array(
            'pretty_version' => '2.3.0',
            'version' => '2.3.0.0',
            'reference' => '7da1894633f168fe244afc6de00d141f27517b62',
            'type' => 'phpcodesniffer-standard',
            'install_path' => __DIR__ . '/../wp-coding-standards/wpcs',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'wpeverest/wpeverest-sniffs' => array(
            'pretty_version' => '0.0.1',
            'version' => '0.0.1.0',
            'reference' => '2e61559f889ba4d3b01e4ded277161fb78e74c3f',
            'type' => 'phpcodesniffer-standard',
            'install_path' => __DIR__ . '/../wpeverest/wpeverest-sniffs',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
    ),
);
