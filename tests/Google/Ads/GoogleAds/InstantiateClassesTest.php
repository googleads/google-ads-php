<?php
/*
 * Copyright 2019, Google Inc.
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are
 * met:
 *
 *     * Redistributions of source code must retain the above copyright
 * notice, this list of conditions and the following disclaimer.
 *     * Redistributions in binary form must reproduce the above
 * copyright notice, this list of conditions and the following disclaimer
 * in the documentation and/or other materials provided with the
 * distribution.
 *     * Neither the name of Google Inc. nor the names of its
 * contributors may be used to endorse or promote products derived from
 * this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
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
