<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;


class ProductApiTest extends TestCase
{
    use RefreshDatabase, WithoutMiddleware;

    public function test_product_creation()
    {
        $productData = [
            'name' => 'Test Product',
            'sku' => 'TESTSKU123',
            'quantity_in_stock' => 50,
            'supplier_id' => 1,
        ];

        $response = $this->postJson('/api/products', $productData);

        $response->assertStatus(201);
        $this->assertDatabaseHas('products', ['name' => 'Test Product']);
    }
}
