<?php

namespace Tests\Feature;

use App\Enums\ModuleType;
use App\Models\Module;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ModuleTest extends TestCase
{
    use DatabaseMigrations;

    public function testCreate(): void
    {
        $response = $this->post('/api/modules', ['name' => 'module_1', 'type' => 'TEMP']);
        $response->assertStatus(200);

        $modules = Module::all();

        $this->assertEquals(1, $modules->count());

        $this->assertEquals('module_1', $modules[0]->name);
        $this->assertEquals(ModuleType::Temperature, $modules[0]->type);
    }

    public function testList(): void
    {
        $this->post('/api/modules', ['name' => 'module_1', 'type' => 'TEMP']);
        $this->post('/api/modules', ['name' => 'module_2', 'type' => 'SPEED']);
        $this->post('/api/modules', ['name' => 'module_3', 'type' => 'PRESSURE']);

        $data = $this->getJson('/api/modules')->assertStatus(200)->json();

        $this->assertCount(3, $data);

        $this->assertEquals('module_1', $data[0]['name']);
        $this->assertEquals(ModuleType::Temperature->value, $data[0]['type']);

        $this->assertEquals('module_2', $data[1]['name']);
        $this->assertEquals(ModuleType::Speed->value, $data[1]['type']);

        $this->assertEquals('module_3', $data[2]['name']);
        $this->assertEquals(ModuleType::Pressure->value, $data[2]['type']);
    }
}
