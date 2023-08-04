<?php

namespace Tests\E2E;

use Utopia\Messaging\Adapters\SMS\Twilio;
use Utopia\Messaging\Messages\SMS;

class TwilioTest extends Base
{
    /**
     * @throws \Exception
     */
    public function testSendSMS()
    {
        $sender = new Twilio(getenv('TWILIO_ACCOUNT_SID'), getenv('TWILIO_AUTH_TOKEN'));

        $message = new SMS(
            to: ['+18034041123'],
            content: 'Test Content',
            from: '+15005550006'
        );

        $result = $sender->send($message);

        $this->assertNotEmpty($result);
    }
}
