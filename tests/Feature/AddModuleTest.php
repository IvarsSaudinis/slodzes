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

test('lietotājs var var izveidot jaunu moduli', function () {

    $user = User::factory()->create();

    $response = $this->actingAs($user)->get('/modules/create');

    $response = $this->post('/modules', [
        'name' => 'Moduļa nosaukums Tests ' . rand(1000, 9999)
    ]);

    $response->assertSessionHas('message', 'Modulis veiksmīgi izveidots!');
});

test('Lietotājs nevar pievienot moduli, ja nav ievadīts nosaukums', function () {

    $user = User::factory()->create();

    $response = $this->actingAs($user)->get('/modules');

    $response = $this->post('/modules', [
         'code' => "nav nozīmes šeit"
    ]);

    $response->assertSessionHasErrors('name');
});
