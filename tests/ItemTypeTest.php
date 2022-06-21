<?php
namespace App\Tests;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;
use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\Client;
use App\Entity\ItemType;
use Hautelook\AliceBundle\PhpUnit\RefreshDatabaseTrait;

class ItemTypeTest extends ApiTestCase
{
    use RefreshDatabaseTrait;
    const TOKEN = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImtpZCI6IkhzcmVVUFpIMGVJdm1pZGVTYkhJRmoyLXZBVkYyV3RwRFpNVTNOSnVhMVkifQ.eyJleHAiOjE5MjEzMzEyODQsImlhdCI6MTYyMTMzMTI4NCwiYXV0aF90aW1lIjoxNjIxMzMwOTIxLCJqdGkiOiJlNjUyNWJiMy01YmQ2LTQ4YmItYmNmNS0yOTljNWJhMmMzMGQiLCJpc3MiOiJodHRwczovL3Nzby5taW5kcy5rOHMvYXV0aC9yZWFsbXMvY3JlYXRpdmUiLCJhdWQiOiJhY2NvdW50Iiwic3ViIjoiMmUxYmI3MjctYTU4Zi00ZjY0LWE1MjAtMTIzZWQwYWY5NDcwIiwidHlwIjoiQmVhcmVyIiwiYXpwIjoiY3NlLXBsYXRmb3JtIiwic2Vzc2lvbl9zdGF0ZSI6IjZiMTc4YzIxLWY0YmQtNDdmMy04NmI3LTQ5YTJkODY4NGM5YSIsImFjciI6IjEiLCJhbGxvd2VkLW9yaWdpbnMiOlsiKiJdLCJyZWFsbV9hY2Nlc3MiOnsicm9sZXMiOlsib2ZmbGluZV9hY2Nlc3MiLCJ1bWFfYXV0aG9yaXphdGlvbiJdfSwicmVzb3VyY2VfYWNjZXNzIjp7ImFjY291bnQiOnsicm9sZXMiOlsibWFuYWdlLWFjY291bnQiLCJ2aWV3LXByb2ZpbGUiXX19LCJzY29wZSI6Im9wZW5pZCB3ZWItb3JpZ2lucyBvZmZpY2UgZW1haWwgcHJvZmlsZSIsImVtYWlsX3ZlcmlmaWVkIjpmYWxzZSwicm9sZXMiOlsiUk9MRV9DT0xMQUJPUkFUT1IiXSwibmFtZSI6Ik9saXZpZXIgQVVCT0lOIiwicHJlZmVycmVkX3VzZXJuYW1lIjoicy5qZWxhc3NpIiwib2ZmaWNlIjoiUmVubmVzIiwiZ2l2ZW5fbmFtZSI6Ik9saXZpZXIiLCJmYW1pbHlfbmFtZSI6IkFVQk9JTiIsImVtYWlsIjoiby5hdWJvaW5AZ3JvdXBlLWNyZWF0aXZlLmZyIn0.YCPzx0o7PawIwnsb3J3YsirsPc-km1X_5YX7Cq3-t9o';

    public function testGetCollection(): void
    {
        // The client implements Symfony HttpClient's `HttpClientInterface`, and the response `ResponseInterface`
        $response = static::createClient([], ['headers' => ['authorization' => 'Bearer '.self::TOKEN]])->request('GET', 'api/item_types');

        $this->assertResponseIsSuccessful();
        // Asserts that the returned content type is JSON-LD (the default)
        $this->assertResponseHeaderSame('content-type', 'application/ld+json; charset=utf-8');

        // Asserts that the returned JSON is a superset of this one
        $this->assertJsonContains([
            '@context' => '/api/contexts/ItemType',
            '@id' => '/api/item_types',
            '@type' => 'hydra:Collection',
            'hydra:totalItems' => 100,
        ]);

        // Because test fixtures are automatically loaded between each test, you can assert on them
        $this->assertCount(30, $response->toArray()['hydra:member']);

        // Asserts that the returned JSON is validated by the JSON Schema generated for this resource by API Platform
        // This generated JSON Schema is also used in the OpenAPI spec!
        $this->assertMatchesResourceCollectionJsonSchema(ItemType::class);
    }
}
