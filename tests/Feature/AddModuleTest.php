<?php
use App\Models\User;

test('autorizēts lietotājs var doties uz moduļu sadaļu [/modules/create]', function () {

    $user = User::factory()->create();

    $response = $this->actingAs($user)->get('/modules/create');

    $response->assertStatus(200);
});

test('neautorizēts lietotājs nevar pievienot jaunu moduli [/modules/create]', function () {

    $response = $this->get('/modules/create');

    $response->assertStatus(302);
});

