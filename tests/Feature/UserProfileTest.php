<?php
use App\Models\User;

test('autorizēts lietotājs var doties uz profila informācijas maiņas lapu [/profile]', function () {

    $user = User::factory()->create();

    $response = $this->actingAs($user)->get('/profile');

    $response->assertStatus(200);
});

test('neautorizēts lietotājs nevar mainīt info [/profile]', function () {

    $response = $this->get('/profile');

    $response->assertStatus(302);
});

test('profila lapā parādās input lauks ar aizpildītu vārdu', function () {

    $user = User::factory()->create();

    $response = $this->actingAs($user)->get('/profile');

    expect($response->getContent())->toContain('id="name" value="'. $user->name . '"');

});

test('profila lapā parādās input lauks ar aizpildītu uzvārdu', function () {

    $user = User::factory()->create();

    $response = $this->actingAs($user)->get('/profile');

    expect($response->getContent())->toContain('id="surname" value="'.$user->surname . '"');

});

test('profila lapā parādās input lauks ar aizpildītu e-pastu', function () {

    $user = User::factory()->create();

    $response = $this->actingAs($user)->get('/profile');

    expect($response->getContent())->toContain('id="email" value="'.$user->email . '"');

});

test('profila lapā parādās input lauks ar aizpildītu amatu', function () {

    $user = User::factory()->create();

    $response = $this->actingAs($user)->get('/profile');

    expect($response->getContent())->toContain('id="job_title" value="'.$user->job_title . '"');

});


test('lietotājs var nomainīt savu paroli', function () {

    $user = User::factory()->create();

    $response = $this->actingAs($user)->get('/profile');

    $response = $this->post('/profile/password', [
        'current_password' => 'password',
        'password' => 'new-password',
        'password2' => 'new-password',
    ]);

    $response->assertSessionHas('message', 'Parole nomainīta');


});
