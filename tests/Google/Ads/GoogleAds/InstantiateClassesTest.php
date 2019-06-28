<?php
/**
 * Copyright 2019 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace Google\Ads\GoogleAds;

use PHPUnit\Framework\TestCase;
use Google\ApiCore\ValidationException;

class InstantiateClassesTest extends TestCase
{
    /**
     * A simple test to instantiate all classes in the repository.
     * This is a minimal test to make sure we don't include generated
     * classes that contain syntax errors.
     *
     * For this reason, we don't really care if classes are instantiated successfully: cases when
     * a class has some required parameters in the constructor and the instantiation fails are
     * fine, we just want to be sure that there are no syntax errors when trying to instantiate,
     * so ArgumentCountErrors and ValidationExceptions can be ignored.
     *
     * @dataProvider classesProvider
     */
    public function testInstantiateClass($class)
    {
        // Prevent phpunit from marking as risky tests that don't perform any assertion.
        $this->assertTrue(true);

        if (strpos($class, 'metadata') !== false || strpos($class, 'Testing') !== false) {
            return;
        }

        $classObject = new \ReflectionClass($class);
        if ($classObject->isInterface() || $classObject->isTrait()) {
            return;
        }

        try {
            $instance = new $class();
        } catch (\ArgumentCountError $error) {
            //Disregard
            return;
        } catch (ValidationException $exception) {
            //Disregard
            return;
        }

        $this->assertNotNull($instance);
    }

    public function classesProvider()
    {
        $dir = new \RecursiveDirectoryIterator('src');
        $it = new \RecursiveIteratorIterator($dir);
        $reg = new \RegexIterator($it, '#.+[^_config]\.php$#', \RecursiveRegexIterator::GET_MATCH);
        foreach ($reg as $files) {
            $file = $files[0];
            $namespace = str_replace("/", "\\", substr($file, 3));
            $class = explode('.', $namespace)[0];
            yield [$class];
        }
    }
}
