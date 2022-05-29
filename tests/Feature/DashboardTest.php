<?php

use App\Models\User;

test('autorizētam lietotājam pieejama lietotnes sākumlapa [/dashboard]', function () {

    $user = User::factory()->make();

    $response = $this->actingAs($user)->get('/dashboard');

    $response->assertStatus(200);
});
