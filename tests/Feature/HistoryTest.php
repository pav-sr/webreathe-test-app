<?php

namespace Tests\Feature;

use App\Enums\ModuleStatus;
use App\Models\Module;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class HistoryTest extends TestCase
{
    use DatabaseMigrations;

    public function testCreated(): void
    {
        $response = $this->post('/api/modules', ['name' => 'module_1', 'type' => 'TEMP']);
        $response->assertStatus(200);

        $modules = Module::all();

        $modules[0]->value = 10;
        $modules[0]->status = ModuleStatus::Stopped;

        $modules[0]->saveOrFail();

        $data = $this->getJson('/api/history/'.$modules[0]->id)->json();

        $this->assertCount(1, $data);
        $this->assertEquals($modules[0]->value, $data[0]['value']);
        $this->assertEquals($modules[0]->status->value, $data[0]['status']);
    }
}
