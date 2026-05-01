<?php

namespace Tests\E2E\Services\Notifications;

use Tests\E2E\Scopes\ProjectCustom;
use Tests\E2E\Scopes\Scope;
use Tests\E2E\Scopes\SideServer;

class NotificationsCustomServerTest extends Scope
{
    use NotificationsBase;
    use ProjectCustom;
    use SideServer;
}
