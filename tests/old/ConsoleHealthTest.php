<?php

namespace Tests\E2E;

use Tests\E2E\Client;

class ConsoleHealthTest extends BaseConsole
{
    public function testHTTPSuccess(): void
    {
        $response = $this->client->call(Client::METHOD_GET, '/health', array_merge([
            'content-type' => 'application/json',
            'x-appwrite-project' => $this->getProject()['$uid'],
        ], $this->getHeaders()), []);

        $this->assertEquals(200, $response['headers']['status-code']);
        $this->assertEquals('OK', $response['body']['status']);
    }

    public function testDBSuccess(): void
    {
        $response = $this->client->call(Client::METHOD_GET, '/health/db', array_merge([
            'content-type' => 'application/json',
            'x-appwrite-project' => $this->getProject()['$uid'],
        ], $this->getHeaders()), []);

        $this->assertEquals(200, $response['headers']['status-code']);
        $this->assertEquals('OK', $response['body']['status']);
    }

    public function testCacheSuccess(): void
    {
        $response = $this->client->call(Client::METHOD_GET, '/health/db', array_merge([
            'content-type' => 'application/json',
            'x-appwrite-project' => $this->getProject()['$uid'],
        ], $this->getHeaders()), []);

        $this->assertEquals(200, $response['headers']['status-code']);
        $this->assertEquals('OK', $response['body']['status']);
    }

    public function testTimeSuccess(): void
    {
        $response = $this->client->call(Client::METHOD_GET, '/health/time', array_merge([
            'content-type' => 'application/json',
            'x-appwrite-project' => $this->getProject()['$uid'],
        ], $this->getHeaders()), []);

        $this->assertEquals(200, $response['headers']['status-code']);
        $this->assertIsInt($response['body']['remote']);
        $this->assertIsInt($response['body']['local']);
        $this->assertNotEmpty($response['body']['remote']);
        $this->assertNotEmpty($response['body']['local']);
        $this->assertLessThan(10, $response['body']['diff']);
    }

    public function testWebhooksSuccess(): void
    {
        $response = $this->client->call(Client::METHOD_GET, '/health/webhooks', array_merge([
            'content-type' => 'application/json',
            'x-appwrite-project' => $this->getProject()['$uid'],
        ], $this->getHeaders()), []);

        $this->assertEquals(200, $response['headers']['status-code']);
        $this->assertIsInt($response['body']['size']);
        $this->assertLessThan(10, $response['body']['size']);
    }

    public function xtestStorageLocalSuccess(): void
    {
        $response = $this->client->call(Client::METHOD_GET, '/health/storage/local', array_merge([
            'content-type' => 'application/json',
            'x-appwrite-project' => $this->getProject()['$uid'],
        ], $this->getHeaders()), []);

        $this->assertEquals(200, $response['headers']['status-code']);
        $this->assertEquals('OK', $response['body']['status']);
    }

    public function testStorageAntiVirusSuccess(): void
    {
        $response = $this->client->call(Client::METHOD_GET, '/health/storage/anti-virus', array_merge([
            'content-type' => 'application/json',
            'x-appwrite-project' => $this->getProject()['$uid'],
        ], $this->getHeaders()), []);

        $this->assertEquals(200, $response['headers']['status-code']);
        $this->assertEquals('online', $response['body']['status']);
        $this->assertStringStartsWith('ClamAV ', $response['body']['version']);
    }
}
