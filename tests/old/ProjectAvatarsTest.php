<?php

namespace Tests\E2E;

use Tests\E2E\Client;

class ProjectAvatarsTest extends BaseProjects
{
    public function testRegisterSuccess(): array
    {
        return $this->initProject([]);
    }

    /**
     * @depends testRegisterSuccess
     */
    public function testAvatarsCCReadSuccess(array $data): array
    {
        $response = $this->client->call(Client::METHOD_GET, '/avatars/credit-cards/visa', [
            'x-appwrite-project' => $this->getProject()['$uid'],
        ]);

        $this->assertEquals(200, $response['headers']['status-code']);
        $this->assertEquals('image/png; charset=UTF-8', $response['headers']['content-type']);
        $this->assertNotEmpty($response['body']);

        $response = $this->client->call(Client::METHOD_GET, '/avatars/credit-cards/visa', [
            'x-appwrite-project' => $this->getProject()['$uid'],
        ], [
            'width' => 200,
            'height' => 200,
        ]);

        $this->assertEquals(200, $response['headers']['status-code']);
        $this->assertEquals('image/png; charset=UTF-8', $response['headers']['content-type']);
        $this->assertNotEmpty($response['body']);

        $response = $this->client->call(Client::METHOD_GET, '/avatars/credit-cards/visa', [
            'x-appwrite-project' => $this->getProject()['$uid'],
        ], [
            'width' => 300,
            'height' => 300,
            'quality' => 30,
        ]);

        $this->assertEquals(200, $response['headers']['status-code']);
        $this->assertEquals('image/png; charset=UTF-8', $response['headers']['content-type']);
        $this->assertNotEmpty($response['body']);

        return $data;
    }

    /**
     * @depends testRegisterSuccess
     */
    public function testAvatarsBrowserReadSuccess(array $data): array
    {
        $response = $this->client->call(Client::METHOD_GET, '/avatars/browsers/ch', [
            'x-appwrite-project' => $this->getProject()['$uid'],
        ]);

        $this->assertEquals(200, $response['headers']['status-code']);
        $this->assertEquals('image/png; charset=UTF-8', $response['headers']['content-type']);
        $this->assertNotEmpty($response['body']);

        $response = $this->client->call(Client::METHOD_GET, '/avatars/browsers/ch', [
            'x-appwrite-project' => $this->getProject()['$uid'],
        ], [
            'width' => 200,
            'height' => 200,
        ]);

        $this->assertEquals(200, $response['headers']['status-code']);
        $this->assertEquals('image/png; charset=UTF-8', $response['headers']['content-type']);
        $this->assertNotEmpty($response['body']);

        $response = $this->client->call(Client::METHOD_GET, '/avatars/browsers/ch', [
            'x-appwrite-project' => $this->getProject()['$uid'],
        ], [
            'width' => 300,
            'height' => 300,
            'quality' => 30,
        ]);

        $this->assertEquals(200, $response['headers']['status-code']);
        $this->assertEquals('image/png; charset=UTF-8', $response['headers']['content-type']);
        $this->assertNotEmpty($response['body']);

        return $data;
    }

    /**
     * @depends testRegisterSuccess
     */
    public function testAvatarsFlagReadSuccess(array $data): array
    {
        $response = $this->client->call(Client::METHOD_GET, '/avatars/flags/us', [
            'x-appwrite-project' => $this->getProject()['$uid'],
        ]);

        $this->assertEquals(200, $response['headers']['status-code']);
        $this->assertEquals('image/png; charset=UTF-8', $response['headers']['content-type']);
        $this->assertNotEmpty($response['body']);

        $response = $this->client->call(Client::METHOD_GET, '/avatars/flags/us', [
            'x-appwrite-project' => $this->getProject()['$uid'],
        ], [
            'width' => 200,
            'height' => 200,
        ]);

        $this->assertEquals(200, $response['headers']['status-code']);
        $this->assertEquals('image/png; charset=UTF-8', $response['headers']['content-type']);
        $this->assertNotEmpty($response['body']);

        $response = $this->client->call(Client::METHOD_GET, '/avatars/flags/us', [
            'x-appwrite-project' => $this->getProject()['$uid'],
        ], [
            'width' => 300,
            'height' => 300,
            'quality' => 30,
        ]);

        $this->assertEquals(200, $response['headers']['status-code']);
        $this->assertEquals('image/png; charset=UTF-8', $response['headers']['content-type']);
        $this->assertNotEmpty($response['body']);

        return $data;
    }

    /**
     * @depends testRegisterSuccess
     */
    public function testAvatarsRemoteImageReadSuccess(array $data): array
    {
        $response = $this->client->call(Client::METHOD_GET, '/avatars/image', [
            'x-appwrite-project' => $this->getProject()['$uid'],
        ], [
            'url' => 'https://appwrite.io/images/apple.png',
        ]);

        $this->assertEquals(200, $response['headers']['status-code']);
        $this->assertEquals('image/png; charset=UTF-8', $response['headers']['content-type']);
        $this->assertNotEmpty($response['body']);

        $response = $this->client->call(Client::METHOD_GET, '/avatars/image', [
            'x-appwrite-project' => $this->getProject()['$uid'],
        ], [
            'url' => 'https://appwrite.io/images/apple.png',
            'width' => 200,
            'height' => 200,
        ]);

        $this->assertEquals(200, $response['headers']['status-code']);
        $this->assertEquals('image/png; charset=UTF-8', $response['headers']['content-type']);
        $this->assertNotEmpty($response['body']);

        $response = $this->client->call(Client::METHOD_GET, '/avatars/image', [
            'x-appwrite-project' => $this->getProject()['$uid'],
        ], [
            'url' => 'https://appwrite.io/images/apple.png',
            'width' => 300,
            'height' => 300,
            'quality' => 30,
        ]);

        $this->assertEquals(200, $response['headers']['status-code']);
        $this->assertEquals('image/png; charset=UTF-8', $response['headers']['content-type']);
        $this->assertNotEmpty($response['body']);

        return $data;
    }

    /**
     * @depends testRegisterSuccess
     */
    public function testAvatarsFaviconReadSuccess(array $data): array
    {
        $response = $this->client->call(Client::METHOD_GET, '/avatars/favicon', [
            'x-appwrite-project' => $this->getProject()['$uid'],
        ], [
            'url' => 'https://appwrite.io/',
        ]);

        $this->assertEquals(200, $response['headers']['status-code']);
        $this->assertEquals('image/png; charset=UTF-8', $response['headers']['content-type']);
        $this->assertNotEmpty($response['body']);

        return $data;
    }

    /**
     * @depends testRegisterSuccess
     */
    public function testAvatarsQRReadSuccess(array $data): array
    {
        $response = $this->client->call(Client::METHOD_GET, '/avatars/qr', [
            'x-appwrite-project' => $this->getProject()['$uid'],
        ], [
            'text' => 'url:https://appwrite.io/',
        ]);

        $this->assertEquals(200, $response['headers']['status-code']);
        $this->assertEquals('image/png; charset=UTF-8', $response['headers']['content-type']);
        $this->assertNotEmpty($response['body']);

        $response = $this->client->call(Client::METHOD_GET, '/avatars/qr', [
            'x-appwrite-project' => $this->getProject()['$uid'],
        ], [
            'text' => 'url:https://appwrite.io/',
            'size' => 200,
        ]);

        $this->assertEquals(200, $response['headers']['status-code']);
        $this->assertEquals('image/png; charset=UTF-8', $response['headers']['content-type']);
        $this->assertNotEmpty($response['body']);

        $response = $this->client->call(Client::METHOD_GET, '/avatars/qr', [
            'x-appwrite-project' => $this->getProject()['$uid'],
        ], [
            'text' => 'url:https://appwrite.io/',
            'size' => 200,
            'margin' => 10,
        ]);

        $this->assertEquals(200, $response['headers']['status-code']);
        $this->assertEquals('image/png; charset=UTF-8', $response['headers']['content-type']);
        $this->assertNotEmpty($response['body']);

        $response = $this->client->call(Client::METHOD_GET, '/avatars/qr', [
            'x-appwrite-project' => $this->getProject()['$uid'],
        ], [
            'text' => 'url:https://appwrite.io/',
            'size' => 200,
            'margin' => 10,
            'download' => 1,
        ]);

        $this->assertEquals(200, $response['headers']['status-code']);
        $this->assertEquals('attachment; filename="qr.png"', $response['headers']['content-disposition']);
        $this->assertEquals('image/png; charset=UTF-8', $response['headers']['content-type']);
        $this->assertNotEmpty($response['body']);

        return $data;
    }
}
