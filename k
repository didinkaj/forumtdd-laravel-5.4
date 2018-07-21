warning: CRLF will be replaced by LF in node_modules/css-select-base-adapter/.gitattributes.
The file will have its original line endings in your working directory.
warning: CRLF will be replaced by LF in node_modules/css-select-base-adapter/.npmignore.
The file will have its original line endings in your working directory.
warning: CRLF will be replaced by LF in node_modules/css-select-base-adapter/readme.md.
The file will have its original line endings in your working directory.
warning: CRLF will be replaced by LF in node_modules/css-select-base-adapter/test/data.js.
The file will have its original line endings in your working directory.
warning: CRLF will be replaced by LF in node_modules/css-select-base-adapter/test/implementation.js.
The file will have its original line endings in your working directory.
warning: CRLF will be replaced by LF in node_modules/css-select-base-adapter/test/index.js.
The file will have its original line endings in your working directory.
[1mdiff --git a/composer.json b/composer.json[m
[1mindex eb080e9..4c31c3a 100644[m
[1m--- a/composer.json[m
[1m+++ b/composer.json[m
[36m@@ -25,7 +25,8 @@[m
     "autoload-dev": {[m
         "psr-4": {[m
             "Tests\\": "tests/"[m
[31m-        }[m
[32m+[m[32m        },[m
[32m+[m[32m        "files":["tests/utilities/functions.php"][m
     },[m
     "scripts": {[m
         "post-root-package-install": [[m
[1mdiff --git a/composer.lock b/composer.lock[m
[1mindex ce218a6..932232e 100644[m
[1m--- a/composer.lock[m
[1m+++ b/composer.lock[m
[36m@@ -1,7 +1,7 @@[m
 {[m
     "_readme": [[m
         "This file locks the dependencies of your project to a known state",[m
[31m-        "Read more about it at https://getcomposer.org/doc/01-basic-usage.md#installing-dependencies",[m
[32m+[m[32m        "Read more about it at https://getcomposer.org/doc/01-basic-usage.md#composer-lock-the-lock-file",[m
         "This file is @generated automatically"[m
     ],[m
     "content-hash": "96098e473b028cdb2529580554a1ae3e",[m
[1mdiff --git a/tests/Feature/CreateThreadsTest.php b/tests/Feature/CreateThreadsTest.php[m
[1mindex 6aaf9df..b8e7eff 100644[m
[1m--- a/tests/Feature/CreateThreadsTest.php[m
[1m+++ b/tests/Feature/CreateThreadsTest.php[m
[36m@@ -22,7 +22,7 @@[m [mclass CreateThreadsTest extends TestCase[m
 [m
         $this->expectException('Illuminate\Auth\AuthenticationException');[m
 [m
[31m-        $thread = factory('App\User')->make();[m
[32m+[m[32m        $thread = make('App\Thread');[m
 [m
         $this->post('/threads',$thread->toArray());[m
 [m
[36m@@ -32,9 +32,9 @@[m [mclass CreateThreadsTest extends TestCase[m
     public function an_authenticated_user_can_create_new_forum_threads()[m
     {[m
 [m
[31m-        $this->actingAs(factory('App\User')->create());[m
[32m+[m[32m        $this->actingAs(create('App\User'));[m
 [m
[31m-        $thread = factory('App\Thread')->make();[m
[32m+[m[32m        $thread = make('App\Thread');[m
 [m
         $this->post('/threads',$thread->toArray());[m
 [m
[1mdiff --git a/tests/utilities/functions.php b/tests/utilities/functions.php[m
[1mindex e69de29..0d70286 100644[m
[1m--- a/tests/utilities/functions.php[m
[1m+++ b/tests/utilities/functions.php[m
[36m@@ -0,0 +1,15 @@[m
[32m+[m[32m<?php[m
[32m+[m
[32m+[m[32mfunction create($class, $attributes = [])[m
[32m+[m[32m{[m
[32m+[m
[32m+[m[32m    return factory($class)->create($attributes);[m
[32m+[m
[32m+[m[32m}[m
[32m+[m
[32m+[m[32mfunction make($class, $attribute = [])[m
[32m+[m[32m{[m
[32m+[m
[32m+[m[32m    return factory($class)->make($attribute);[m
[32m+[m
[32m+[m[32m}[m
\ No newline at end of file[m
[1mdiff --git a/vendor/composer/autoload_classmap.php b/vendor/composer/autoload_classmap.php[m
[1mindex fb28423..6999dee 100644[m
[1m--- a/vendor/composer/autoload_classmap.php[m
[1m+++ b/vendor/composer/autoload_classmap.php[m
[36m@@ -3050,8 +3050,9 @@[m [mreturn array([m
     'Symfony\\Polyfill\\Mbstring\\Mbstring' => $vendorDir . '/symfony/polyfill-mbstring/Mbstring.php',[m
     'Symfony\\Polyfill\\Php70\\Php70' => $vendorDir . '/symfony/polyfill-php70/Php70.php',[m
     'Tests\\CreatesApplication' => $baseDir . '/tests/CreatesApplication.php',[m
[32m+[m[32m    'Tests\\Feature\\CreateThreadsTest' => $baseDir . '/tests/Feature/CreateThreadsTest.php',[m
     'Tests\\Feature\\ExampleTest' => $baseDir . '/tests/Feature/ExampleTest.php',[m
[31m-    'Tests\\Feature\\ParticipateInForum' => $baseDir . '/tests/Feature/ParticipateInForumTest.php',[m
[32m+[m[32m    'Tests\\Feature\\ParticipateInForumTest' => $baseDir . '/tests/Feature/ParticipateInForumTest.php',[m
     'Tests\\Feature\\ReadThreadTest' => $baseDir . '/tests/Feature/ReadThreadTest.php',[m
     'Tests\\TestCase' => $baseDir . '/tests/TestCase.php',[m
     'Tests\\Unit\\ExampleTest' => $baseDir . '/tests/Unit/ExampleTest.php',[m
[1mdiff --git a/vendor/composer/autoload_files.php b/vendor/composer/autoload_files.php[m
[1mindex 89e0790..c42dc2d 100644[m
[1m--- a/vendor/composer/autoload_files.php[m
[1m+++ b/vendor/composer/autoload_files.php[m
[36m@@ -17,4 +17,5 @@[m [mreturn array([m
     '801c31d8ed748cfa537fa45402288c95' => $vendorDir . '/psy/psysh/src/functions.php',[m
     'f0906e6318348a765ffb6eb24e0d0938' => $vendorDir . '/laravel/framework/src/Illuminate/Foundation/helpers.php',[m
     '58571171fd5812e6e447dce228f52f4d' => $vendorDir . '/laravel/framework/src/Illuminate/Support/helpers.php',[m
[32m+[m[32m    '6601b0afd52bfb958f4bc80953865ae8' => $baseDir . '/tests/utilities/functions.php',[m
 );[m
[1mdiff --git a/vendor/composer/autoload_static.php b/vendor/composer/autoload_static.php[m
[1mindex 8f17154..a8a74fa 100644[m
[1m--- a/vendor/composer/autoload_static.php[m
[1m+++ b/vendor/composer/autoload_static.php[m
[36m@@ -18,6 +18,7 @@[m [mclass ComposerStaticInit92a99b03773b5b03eaec56895ee63c61[m
         '801c31d8ed748cfa537fa45402288c95' => __DIR__ . '/..' . '/psy/psysh/src/functions.php',[m
         'f0906e6318348a765ffb6eb24e0d0938' => __DIR__ . '/..' . '/laravel/framework/src/Illuminate/Foundation/helpers.php',[m
         '58571171fd5812e6e447dce228f52f4d' => __DIR__ . '/..' . '/laravel/framework/src/Illuminate/Support/helpers.php',[m
[32m+[m[32m        '6601b0afd52bfb958f4bc80953865ae8' => __DIR__ . '/../..' . '/tests/utilities/functions.php',[m
     );[m
 [m
     public static $prefixLengthsPsr4 = array ([m
[36m@@ -3326,8 +3327,9 @@[m [mclass ComposerStaticInit92a99b03773b5b03eaec56895ee63c61[m
         'Symfony\\Polyfill\\Mbstring\\Mbstring' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/Mbstring.php',[m
         'Symfony\\Polyfill\\Php70\\Php70' => __DIR__ . '/..' . '/symfony/polyfill-php70/Php70.php',[m
         'Tests\\CreatesApplication' => __DIR__ . '/../..' . '/tests/CreatesApplication.php',[m
[32m+[m[32m        'Tests\\Feature\\CreateThreadsTest' => __DIR__ . '/../..' . '/tests/Feature/CreateThreadsTest.php',[m
         'Tests\\Feature\\ExampleTest' => __DIR__ . '/../..' . '/tests/Feature/ExampleTest.php',[m
[31m-        'Tests\\Feature\\ParticipateInForum' => __DIR__ . '/../..',[m
[32m+[m[32m        'Tests\\Feature\\ParticipateInForumTest' => __DIR__ . '/../..' . '/tests/Feature/ParticipateInForumTest.php',[m
         'Tests\\Feature\\ReadThreadTest' => __DIR__ . '/../..' . '/tests/Feature/ReadThreadTest.php',[m
         'Tests\\TestCase' => __DIR__ . '/../..' . '/tests/TestCase.php',[m
         'Tests\\Unit\\ExampleTest' => __DIR__ . '/../..' . '/tests/Unit/ExampleTest.php',[m
