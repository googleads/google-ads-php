<?php

namespace Google\Ads\GoogleAds\Lib\V21;

use Google\ApiCore\Call;
use Google\ApiCore\AgentHeader;
use PHPUnit\Framework\TestCase;

class AdsAssistantHeaderMiddlewareTest extends TestCase
{
    public function testInvokeAppendsHeader()
    {
        $adsAssistant = 'test-assistant-123';
        $initialHeader = 'gl-php/8.4.0 gccl/1.0.0';
        $expectedHeader = $initialHeader . ' gaada/' . $adsAssistant;

        // 1. Create a dummy "next handler" to capture the result
        $nextHandlerCalled = false;
        $capturedOptions = [];
        $nextHandler = function (Call $call, array $options) use (&$nextHandlerCalled, &$capturedOptions) {
            $nextHandlerCalled = true;
            $capturedOptions = $options;
            return "final-result";
        };

        // 2. Instantiate the middleware
        $middleware = new AdsAssistantHeaderMiddleware($nextHandler, $adsAssistant);

        // 3. Prepare mock Call and Options
        $call = $this->createMock(Call::class);
        $options = [
            'headers' => [
                AgentHeader::AGENT_HEADER_KEY => [$initialHeader]
            ]
        ];

        // 4. Run it
        $result = $middleware($call, $options);

        // 5. Assertions
        $this->assertTrue($nextHandlerCalled, 'The next handler was not called.');
        $this->assertEquals("final-result", $result);
        
        $actualHeader = $capturedOptions['headers'][AgentHeader::AGENT_HEADER_KEY][0];
        $this->assertEquals($expectedHeader, $actualHeader);
        $this->assertStringContainsString('gaada/test-assistant-123', $actualHeader);
    }
}